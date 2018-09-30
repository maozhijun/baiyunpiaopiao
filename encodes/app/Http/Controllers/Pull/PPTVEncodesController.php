<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;

class PPTVEncodesController extends BaseController
{
    const K_PPTV_CIDS_SESSION_KEY = "__pptv_cids__";
    const K_PPTV_STREAM_SESSION_KEY = "__pptv_stream__";
    const K_PPTV_LINES_SESSION_KEY = "__pptv_lines__";

    private $cookie = "PUID=b76c118ef74441b7ab0d-26a60a544d49; __crt=1538037805673; ppi=302c3332; Hm_lvt_7adaa440f53512a144c13de93f4c22db=1538037800,1538038459,1538214006; Hm_lpvt_7adaa440f53512a144c13de93f4c22db=1538214006";
    private $userAgent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36";

    private $isDebug = false;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
    }

    public function index(Request $request)
    {
        $lives = $this->getAppMatches();

        return view('manager.pull.pptv', ['lives' => $lives]);
    }

    public function getLiveUrl(Request $request, $sessionId)
    {
        $index = 0;
        $sessionCids = session(self::K_PPTV_CIDS_SESSION_KEY);
        $this->dumpData($sessionCids);
        if (isset($sessionCids) && isset($sessionCids['sid']) && $sessionCids['sid'] == $sessionId) {
            $cids = $sessionCids['data'];
            $index = $sessionCids['index'];
        } else {
            $cids = $this->convertSectionId2Cid($sessionId);
        }

        $name = $cids[$index]['name'];
        $cid = $cids[$index]['cid'];

        $sessionStreamInfo = session(self::K_PPTV_STREAM_SESSION_KEY);
        $this->dumpData($sessionStreamInfo);

        $streamInfo = array();
        if (isset($sessionStreamInfo) && count($sessionStreamInfo['data']) > 0
            && $sessionStreamInfo['cid'] == $cid)
        {
            $streamInfo = $sessionStreamInfo['data'];
            $this->dumpData(000);
        } else {
            $playInfo = $this->getWebPlayInfo($cid);
            if (isset($playInfo['childNodes'])) {
                foreach ($playInfo['childNodes'] as $itemInfo) {
                    if (count($itemInfo) == 4 && array_key_exists("rid", $itemInfo)) {
                        $streamInfo[] = $itemInfo;
                    }
                }
                session([self::K_PPTV_STREAM_SESSION_KEY => ['cid'=>$cid, 'data'=>$streamInfo]]);
            }
            $this->dumpData(111);
        }
        $this->dumpData($streamInfo);

        if (count($streamInfo) > 0) {
            if ($request->has('cKey')) {
                $this->dumpData(222);

                $currentLines = $this->convertStreamInfo($streamInfo, $request->input('cKey'));
                $sessionLines = session(self::K_PPTV_LINES_SESSION_KEY);
                $this->dumpData($sessionLines);
                if (isset($sessionLines) && $sessionLines['sid'] == $sessionId) {
                    $lines = $sessionLines['data'];
                }
                $lines[$name] = $currentLines;

                if ($index == count($cids) - 1 && count($lines) >= 0) {
                    return view('manager.pull.pptv_lines', ['lines' => $lines]);
                } else {
                    $index++;
                    $sessionCids = ['sid' => $sessionId, 'index' => $index, 'data' => $cids];
                    session([self::K_PPTV_CIDS_SESSION_KEY => $sessionCids]);

                    session([self::K_PPTV_LINES_SESSION_KEY=>['sid'=>$sessionId, 'data'=>$lines]]);

                    return redirect('/resources/pptv/get_live_url/'.$sessionId);
                }
            } else {
                $this->dumpData(333);
                $key = $this->getItemStrValue($streamInfo[0], [3, 0]);
                if (strlen($key) > 0) {
                    return view('manager.pull.pptv_lines', ['key' => $key]);
                }
            }
        }

        return response('信号还在路上，等会再来看看！');
    }

    private function getAppMatches() {
        $url = "https://sportlive.suning.com/slsp-web/lms/list/v1218/hot.do?app=android&timeSort=1&version=2&_source=ppsports&apptype=android&appversion=5.2.2";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);//5秒超时
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求 不验证证书和hosts
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        $response = curl_exec ($ch);
        curl_close ($ch);

        $response = json_decode($response, true);

        $matches = array();
        if (isset($response) && isset($response['retCode']) && $response['retCode'] == 0) {
            $dataList = $response['data']['list'];
            $matchList = array();
            foreach ($dataList as $date=>$itemMatches) {
                if ($date == date('Ymd')) {
                    $this->dumpData($itemMatches);
                }
                $matchList = array_merge($matchList, $itemMatches);
            }
            foreach ($matchList as $index=>$itemMatch) {
                if (isset($itemMatch['sectionInfo'])) {
                    $sectionInfo = $itemMatch['sectionInfo'];

                    $startTime = $sectionInfo['startTime'];
                    $endTime = $sectionInfo['endTime'];

                    $title = trim($sectionInfo['title']);
                    if (str_contains($title, " ")) {
                        list($league, $matchVs) = explode(" ", $title, 2);
                    } else {
                        $league = "其他";
                        $matchVs = $title;
                    }
                    $sectionInfo['league'] = $league;
                    $sectionInfo['matchVs'] = $matchVs;

                    //判断是否是会员才可观看
                    if (isset($itemMatch['flags'])) {
                        $isVip = isset($itemMatch['flags']['goldGuessFlag']) && $itemMatch['flags']['goldGuessFlag'] == 1
                            && isset($itemMatch['flags']['baseFlag']) && $itemMatch['flags']['baseFlag'] ==1;
                        $sectionInfo['isVip'] = $isVip;
                    }

                    if (isset($itemMatch['matchInfo'])) {
                        $matchInfo = $itemMatch['matchInfo'];
                        if (isset($matchInfo['status']) && $matchInfo['status'] < 2) {
                            $status = $matchInfo['status'];
                            $sectionInfo['status'] = $status;
                            $sectionInfo['matchDatetime'] = $matchInfo['matchDatetime'];
                            $matches[] = $sectionInfo;
                        }
                    } else if (strtotime($startTime) <= time() && strtotime($endTime) >= time()) {
                        $sectionInfo['status'] = 1;
                        $this->dumpData($sectionInfo);
                        $matches[] = $sectionInfo;
                    }
                    if (strtotime($endTime) > strtotime("+2 days")) {
                        $this->dumpData($index);
                        break;
                    }
                } else {
                    $this->dumpData("sectionInfo is null!");
                    $this->dumpData($itemMatch);
                }
            }
        }
        $this->dumpData($matches);
        return $matches;
    }

    private function getWebPlayInfo($cid) {
        $url = "http://web-play.pptv.com/webplay3-0-$cid.xml?version=6&type=mpptv&complete=1&poster=http%3A%2F%2Flive2image0.pplive.cn%2F304341.jpg&kk=c7928161b69b9bf07c30f03c5b773d43-391b-5baf756f&o=m.pptv.com&isVipMovie=0&isSport=0&msiteSourceSite=m_channel_sports&pageUrl=http%3A%2F%2Fm.pptv.com%2Fshow%2F1a8OjPRaygjlTrUbiaw.html&referrer=http%3A%2F%2Fm.pptv.com%2Fshow%2F1a8OjPRaygjlTrUbiaw.html&rcc_id=m.pptv.com&appver=4.0.2&appplt=wap&appid=pptv.wap&vvid=c1e5de63-5a8c-ee2b-220b-252bdacc6541&nddp=1&scver=1&scRandom=5f7a437534362d48487a226f38614d4c&scSignature=c3425a69b0b6c63fdb550b7392ff7bc52915a77b989b44c0da815f519a49b8f3&cb=getPlayEncode";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);//5秒超时
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);

        $response = curl_exec ($ch);
        curl_close ($ch);

        //去除头部多余的部分
        while (!starts_with($response, "{")) {
            $response = substr($response, 1);
        }
        //去除尾部多余的部分
        while (!ends_with($response, "}")) {
            $response = substr($response, 0, strlen($response) - 1);
        }
        $result = json_decode($response, true);
        $this->dumpData($result);
        return $result;
    }

    private function convertSectionId2Cid($sectionId) {
        $cids = array();

        $url = "http://sportlive.suning.com/slsp-web/cms/competitionschedule/v1/detail/section.do?sectionid=$sectionId";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);//5秒超时
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);

        $response = curl_exec ($ch);
        curl_close ($ch);

        $result = json_decode($response, true);
        $this->dumpData($result);

        if (is_array($result) && array_key_exists('retCode', $result) && $result['retCode'] == 0) {
            $data = $result['data'];
            if (isset($data['sectionInfo']) && isset($data['sectionInfo']['lives'])) {
                $liveDatas = $data['sectionInfo']['lives'];
                foreach ($liveDatas as $liveData) {
                    $name = "其他";
                    if(isset($liveData['commentator']) && strlen($liveData['commentator']) > 0) {
                        $name = $liveData['commentator'];
                    }
                    $cids[] = ['name'=>$name, 'cid'=>$liveData['cid']];
                }
            }
        }
        $this->dumpData($cids);

        return $cids;
    }

    private function dumpData($data) {
        if ($this->isDebug) {
            dump($data);
        }
    }

    /**
     * =========================================================================================
     * 解析数据部分
     * ==========================================================================================
     */

    private function convertStreamInfo($streamInfo, $cKey) {
        $lines = array();
        $name = "其他";
        foreach ($streamInfo as $key=>$stream) {
            if ($key == 0) {
                $name = "流畅";
            } else if ($key == 1) {
                $name = "清晰";
            } else if ($key == 2) {
                $name = "超清";
            }
            $lines[$name] = $this->getM3u8StreamUrls($stream, $cKey);
        }
        return $lines;
    }

    private function getItemChildNodes($stream) {
        $nodes = array();
        if (array_key_exists("childNodes", $stream)) {
            $nodes = $stream["childNodes"];
        }
        return $nodes;
    }

    private function getNodesItem($stream, array $indexes = [0]) {
        foreach ($indexes as $index) {
            $nodes = $this->getItemChildNodes($stream);
            if (isset($nodes[$index])) {
                $stream = $nodes[$index];
            }
        }
        return $stream;
    }

    private function getItemStrValue($stream, array $indexes = [0]) {
        $strValue = "";
        $value = $this->getNodesItem($stream, $indexes);
        if (is_string($value) && strlen($value) > 0) {
            $strValue = $value;
        }
        return $strValue;
    }

    private function getStreamRid($stream) {
        $rid = "";
        if (array_key_exists("rid", $stream)) {
            $rid = $stream["rid"];
        }
        return $rid;
    }

    private function getM3u8StreamUrls($stream, $cKey) {
        $rid = $this->getStreamRid($stream);

        $urls = array();
        $aliHost = $this->getItemStrValue($stream, [0, 0]);
        $wsHost = $this->getItemStrValue($stream, [4, 0]);

        if (strlen($aliHost) > 0) {
            $urls[] = $this->convertM3u8Url($aliHost, $rid, $cKey);
        }
        if (strlen($wsHost) > 0) {
            $urls[] = $this->convertM3u8Url($wsHost, $rid, $cKey);
        }
        return $urls;
    }

    private function convertM3u8Url($host, $rid, $cKey) {
        $url = "";
        if (strlen($host) > 0 && strlen($rid) > 0 && strlen($cKey) > 0) {
            $url = "http://$host/live/5/60/$rid.m3u8?type=mpptv&k=$cKey";
        }
        return $url;
    }
}
