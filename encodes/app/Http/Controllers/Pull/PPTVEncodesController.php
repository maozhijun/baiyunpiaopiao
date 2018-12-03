<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use QL\QueryList;

class PPTVEncodesController extends BaseController
{
    const K_PPTV_CIDS_SESSION_KEY = "__pptv_cids__";
    const K_PPTV_STREAM_SESSION_KEY = "__pptv_stream__";
    const K_PPTV_LINES_SESSION_KEY = "__pptv_lines__";

//    private $cookie = "PUID=b76c118ef74441b7ab0d-26a60a544d49; __crt=1538037805673; ppi=302c3332; Hm_lvt_7adaa440f53512a144c13de93f4c22db=1538037800,1538038459,1538214006; Hm_lpvt_7adaa440f53512a144c13de93f4c22db=1538214006";
    /**
     * http://sports.pptv.com   网址下的cookie
     */
//    private $cookie = 'PUID=2366b427ec2444c2e3c3-f84fcd3d785c; ab_cid=0ebf078bdb5a4f6dd17a-31a5ed5b89cb; _df_ud=6d239a85-cbb8-4dc0-aa00-a5990b6bd694; isSuning=0; UDR={"1":"1524987021000"}; ppToken=MwnWnyfKNZmhYOXc1AzwsCj3pvkVedNIm4RzNqCi_FA5ABNt9QYK5rQmfsbO3NMCf50Cb19zvNvP%0D%0AY8Xp-eEwfr12AobeQboZrnxVRKMal65e0YhVe0B7sCaOiAoxAuUM8wlYs-19Td9kfgJoof6_zX2W%0D%0Ao0B2wwtjQ5GoAkOYBxA%0D%0A; ppid=5027277990; isUpgrade=1; PPName=13378681807_180310l88$B71BE42FF7E844AA86A11E2A2C530A67; UDI=0$$0$PP%E6%B8%B8%E6%B0%91$$$$$$http%3A%2F%2Fimage.suning.cn%2Fuimg%2Fcmf%2Fcust_headpic%2F0000000000_01_120x120.jpg$$$$$$$PP%E7%94%A8%E6%88%B7_681807$0$$false$Sun+Apr+29+15; ppi=302c34; website_msg=%257B%2522times%2522%253A0%252C%2522date%2522%253A1538984310573%252C%2522interval%2522%253A3600000%257D; sprotsVipType=2; BubbleName=%25E4%25B8%25AD%25E7%25A7%258B%25E7%25AD%25BE%25E5%2588%25B0; Hm_lvt_7adaa440f53512a144c13de93f4c22db=1538986778; Hm_lpvt_7adaa440f53512a144c13de93f4c22db=1538986778; __ssar=direct%7Cdirect%7C%7C%7C; __ssav=153898677785275832%7C1538986777852%7C1538986777852%7C1538986777853%7C1%7C1%7C1; __ssas=153898677786417699%7C1538986777870%7C1538986777864%7C1; _snvd=1536045425885ieOKYqmOpbt; _snstyxuid=FB62BE72299C5QQ2; sctx=; ab_3d333112_search_algorithm={"sid":"3d333112_search_algorithm","abid":"","sv":"default","errorCode":"3","lsd":1538987216000}; PPKey=SwE0oYg%2Bpf6FwrUYAKPLZBwuxOe1k377D5T%2Bpidgq4w04wuWJFZJgL3vVM%2BNV16T%2BRimfvFz8YETibL5W01HxM1j8kEQBv2WctYEOjNGf2JoaOTK5NLA2dn5wfHsKgUp1S2l6PH0OxxnPZBiGAEoV6f0KC12yUXQeArevSJ34%2FiZ3kc%2FjL%2BdbPaV9BmnEFAS';
    private $cookie = 'PUID=c28f79a845e0490cce81-b02048a46e2b; __crt=1540004304125; _df_ud=dd3cf57a-f543-4783-a3c3-76c812402537; isSuning=0; UDR={"1":"1524987021000"}; ppToken=zbVfxFXQu1XVICRa30qvXvnomt1Os3rMmuRBEt7MJPTW0kHzYMhFdQDAQ6uAECe92jcJgTYBDhjg%0D%0AQudziRrBbpw_Q9B5RneS1vVnw7ZVp4bBdGkCvgDrAGXFCzHVT17yXcNf_0fJZ6Z0fGNr2reGibf2%0D%0AYtKcZa_fAOgnkavu3YI%0D%0A; ppid=5027277990; isUpgrade=1; PPName=13378681807_180310l88$B71BE42FF7E844AA86A11E2A2C530A67; UDI=0$$0$PP%E6%B8%B8%E6%B0%91$$$$$$http%3A%2F%2Fimage.suning.cn%2Fuimg%2Fcmf%2Fcust_headpic%2F0000000000_01_120x120.jpg$$$$$$$PP%E7%94%A8%E6%88%B7_681807$0$$false$Sun+Apr+29+15; sctx=; Hm_lvt_7adaa440f53512a144c13de93f4c22db=1538984903,1540004306,1540194012,1540365428; ppi=302c34; _snstyxuid=6A036172FFEE99UQ; Hm_lpvt_7adaa440f53512a144c13de93f4c22db=1540376844; PPKey=SwE0oYg%2Bpf6FwrUYAKPLZBwuxOe1k377D5T%2Bpidgq4w04wuWJFZJgL3vVM%2BNV16T%2BRimfvFz8YETibL5W01HxD%2FpgMGrsoyYNGDuMMNPy4pYdsatJkFz5QgZAB7PvEWQWnwPvE%2BrHvAge0nM%2F4bnUsgq4qXMeT448HlQ1yC76OySjlYx0HkbI1e64O%2BdcTcd';
    /**
     * http://v.pptv.com    网址下的cookie
     */
//    private $cookie = 'PUID=2366b427ec2444c2e3c3-f84fcd3d785c; _df_ud=6d239a85-cbb8-4dc0-aa00-a5990b6bd694; isSuning=0; UDR={"1":"1524987021000"}; ppToken=MwnWnyfKNZmhYOXc1AzwsCj3pvkVedNIm4RzNqCi_FA5ABNt9QYK5rQmfsbO3NMCf50Cb19zvNvP%0D%0AY8Xp-eEwfr12AobeQboZrnxVRKMal65e0YhVe0B7sCaOiAoxAuUM8wlYs-19Td9kfgJoof6_zX2W%0D%0Ao0B2wwtjQ5GoAkOYBxA%0D%0A; ppid=5027277990; isUpgrade=1; PPName=13378681807_180310l88$B71BE42FF7E844AA86A11E2A2C530A67; UDI=0$$0$PP%E6%B8%B8%E6%B0%91$$$$$$http%3A%2F%2Fimage.suning.cn%2Fuimg%2Fcmf%2Fcust_headpic%2F0000000000_01_120x120.jpg$$$$$$$PP%E7%94%A8%E6%88%B7_681807$0$$false$Sun+Apr+29+15; sprotsVipType=2; BubbleName=%25E4%25B8%25AD%25E7%25A7%258B%25E7%25AD%25BE%25E5%2588%25B0; Hm_lvt_7adaa440f53512a144c13de93f4c22db=1538986778; __ssar=direct%7Cdirect%7C%7C%7C; __ssav=153898677785275832%7C1538986777852%7C1538986777852%7C1538986777853%7C1%7C1%7C1; _snvd=1536045425885ieOKYqmOpbt; idx_player_ap=1; sctx=; _snstyxuid=B76A4692F7CCOP22; website_msg=%257B%2522times%2522%253A0%252C%2522date%2522%253A1539069455520%252C%2522interval%2522%253A3600000%257D; ppi=302c34; PPKey=SwE0oYg%2Bpf6FwrUYAKPLZBwuxOe1k377D5T%2Bpidgq4w04wuWJFZJgL3vVM%2BNV16T%2BRimfvFz8YETibL5W01HxD3ShOpnBgvwWKuFp9tBpuJeSVIofathFiFN5EIwGyx1W4YO9yio3ngtavsaYHtgaOFRZsL5qnPgEHkb4Kqb%2BIfeX2My6Q5yMh4gYf%2FajQ06';
    private $userAgentPC = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36";
    private $userAgentApp = "Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1";

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
        $this->dumpData("getLiveUrl");
        $index = 0;
        $sessionCids = session(self::K_PPTV_CIDS_SESSION_KEY);
        $this->dumpData("sessionCids");
        $this->dumpData($sessionCids);
        if (isset($sessionCids) && isset($sessionCids['sid']) && $sessionCids['sid'] == $sessionId) {
            $cids = $sessionCids['data'];
            $index = $sessionCids['index'];
        } else {
            $cids = $this->convertSectionId2Cid($sessionId);
        }

        $name = $cids[$index]['name'];
        $cid = $cids[$index]['cid'];
        $matchId = isset($cids[$index]['matchId']) ? $cids[$index]['matchId'] : "";
        $isVip = isset($cids[$index]['isVip']) && $cids[$index]['isVip'];

//        $this->getSportWebPlayData($sessionId, "", $cid);
//        return null;

        $sessionStreamInfo = session(self::K_PPTV_STREAM_SESSION_KEY);

        $this->dumpData("sessionStreamInfo");
        $this->dumpData($sessionStreamInfo);

        $streamInfo = array();
        if (isset($sessionStreamInfo) && count($sessionStreamInfo['data']) > 0
            && $sessionStreamInfo['cid'] == $cid)
        {
            $streamInfo = $sessionStreamInfo['data'];
        } else {
            $playInfo = $this->getWebPlayInfo($sessionId, $matchId, $cid);
            if (isset($playInfo['childNodes'])) {
                foreach ($playInfo['childNodes'] as $itemInfo) {
                    if (count($itemInfo) == 4 && array_key_exists("rid", $itemInfo)) {
                        $streamInfo[] = $itemInfo;
                    }
                }
                session([self::K_PPTV_STREAM_SESSION_KEY => ['cid'=>$cid, 'data'=>$streamInfo]]);
            }
        }
        $this->dumpData("streamInfo");
        $this->dumpData($streamInfo);

        if (count($streamInfo) > 0) {
            if ($request->has('cKey')) {
                $currentLines = $this->convertStreamInfo($streamInfo, $request->input('cKey'));
                $sessionLines = session(self::K_PPTV_LINES_SESSION_KEY);
                $this->dumpData("sessionLines");
                $this->dumpData($sessionLines);
                if (isset($sessionLines) && $sessionLines['sid'] == $sessionId) {
                    $lines = $sessionLines['data'];
                }
                $lines[$name]['isVip'] = $isVip;
                $lines[$name]['streams'] = $currentLines;

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
        $this->dumpData("getAppMatches: url = $url");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);//5秒超时
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgentApp);
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
                    $this->dumpData("itemMatches");
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
//                    if (isset($itemMatch['flags'])) {
//                        $isVip = isset($itemMatch['flags']['goldGuessFlag']) && $itemMatch['flags']['goldGuessFlag'] == 1
//                            && isset($itemMatch['flags']['baseFlag']) && $itemMatch['flags']['baseFlag'] == 1;
//                        $sectionInfo['isVip'] = $isVip;
//                    }
                    $isVip = false;
                    if ($sectionInfo['list'] && count($sectionInfo['list']) > 0) {
                        $isVip = true;
                        foreach ($sectionInfo['list'] as $item) {
                            if (isset($item['pay']) && $item['pay'] == 0) {
                                $isVip = false;
                                break;
                            }
                        }
                    }
                    $sectionInfo['isVip'] = $isVip;

                    if (isset($itemMatch['matchInfo']) && isset($itemMatch['matchInfo']['status'])) {
                        $matchInfo = $itemMatch['matchInfo'];
                        $sectionInfo['matchDatetime'] = $matchInfo['matchDatetime'];
                    }
                    //进行时间以主播开播时间为准
                    if (strtotime($startTime) > time()) {
                        $sectionInfo['status'] = 0;
                        $matches[] = $sectionInfo;
                    } else if (strtotime($startTime) <= time() && strtotime($endTime) >= time()) {
                        $sectionInfo['status'] = 1;
                        $matches[] = $sectionInfo;
                    }
                    if (strtotime($endTime) > strtotime("+3 days")) {
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

    private function getWebPlayInfo($sessionId, $matchId, $cid) {

//        $url = "http://web-play.pptv.com/webplay3-0-$cid.xml?version=6&type=mpptv&complete=1&poster=http%3A%2F%2Flive2image0.pplive.cn%2F304341.jpg&kk=c7928161b69b9bf07c30f03c5b773d43-391b-5baf756f&o=m.pptv.com&isVipMovie=0&isSport=0&msiteSourceSite=m_channel_sports&pageUrl=http%3A%2F%2Fm.pptv.com%2Fshow%2F1a8OjPRaygjlTrUbiaw.html&referrer=http%3A%2F%2Fm.pptv.com%2Fshow%2F1a8OjPRaygjlTrUbiaw.html&rcc_id=m.pptv.com&appver=4.0.2&appplt=wap&appid=pptv.wap&vvid=c1e5de63-5a8c-ee2b-220b-252bdacc6541&nddp=1&scver=1&scRandom=5f7a437534362d48487a226f38614d4c&scSignature=c3425a69b0b6c63fdb550b7392ff7bc52915a77b989b44c0da815f519a49b8f3&cb=getPlayEncode";
//        $url = "http://web-play.pptv.com/webplay3-0-$cid.xml?version=6&type=mpptv&complete=1&poster=http%3A%2F%2Flive2image0.pplive.cn%2F303983.jpg&kk=1ac5abfb2db6e82ddc27d594b4474f6b-59b2-5bbc7313&o=m.pptv.com&isVipMovie=0&isSport=0&msiteSourceSite=&pageUrl=http%3A%2F%2Fm.pptv.com%2Fshow%2Fbwpx71e9LWs6jfZczA.html&referrer=http%3A%2F%2Fm.pptv.com%2Fshow%2Fbwpx71e9LWs6jfZczA.html&rcc_id=m.pptv.com&appver=4.0.2&appplt=wap&appid=pptv.wap&token=MwnWnyfKNZmhYOXc1AzwsCj3pvkVedNIm4RzNqCi_FA5ABNt9QYK5rQmfsbO3NMCf50Cb19zvNvP%0D%0AY8Xp-eEwfr12AobeQboZrnxVRKMal65e0YhVe0B7sCaOiAoxAuUM8wlYs-19Td9kfgJoof6_zX2W%0D%0Ao0B2wwtjQ5GoAkOYBxA%0D%0A&username=13378681807_180310l88&vvid=11d7ab1b-58ea-72c1-9426-57eb6e987e95&nddp=1&scver=1&scRandom=7033386a707045596f7d463150506755&scSignature=eb40ae7f24af829a4b04357b1aac595d8abb5b8fb0b25095c858845f8d16f3f5&cb=getPlayEncode";
        $url = "http://web-play.pptv.com/webplay3-0-$cid.xml?version=6&type=mpptv&o=0&isSports=1&sl=1&salt=pv&segment=93ff806c_93ff8234_1503975155&kk=4157af5f5eeb0e81498ef1dcdde67863-613b-59a4e503&referrer=http%3A%2F%2Fsports.pptv.com%2F&pageUrl=http%3A%2F%2Fsports.pptv.com%2Fsportslive%3Fsectionid%3D$sessionId%26matchid%3D$matchId&vts=0&rcc_id=0&appver=4.0.2&appplt=wap&appid=pptv.wap&token=zbVfxFXQu1XVICRa30qvXvnomt1Os3rMmuRBEt7MJPTW0kHzYMhFdQDAQ6uAECe92jcJgTYBDhjg%0D%0AQudziRrBbpw_Q9B5RneS1vVnw7ZVp4bBdGkCvgDrAGXFCzHVT17yXcNf_0fJZ6Z0fGNr2reGibf2%0D%0AYtKcZa_fAOgnkavu3YI%0D%0A&username=13378681807_180310l88&vvid=a4e873d7-43ae-0a39-7d44-a5975218cac7&nddp=1&scver=1&scRandom=3e455b25373e7b4c28733e6a76686b3e&scSignature=b2b9a633f5b1e1b0794f81ae8a5174f0f105bf037770a0694d81a92d577efac8&cb=getPlayEncode";

        $this->dumpData("getWebPlayInfo: url = $url");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);//5秒超时
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgentApp);
        curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);
        curl_setopt($ch, CURLOPT_REFERER, "http://player.aplus.pptv.com/corporate/proxy/proxy.html");

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
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgentApp);
        curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);

        $response = curl_exec ($ch);
        curl_close ($ch);

        $result = json_decode($response, true);
        $this->dumpData("convertSectionId2Cid result");
        $this->dumpData($result);

        if (is_array($result) && array_key_exists('retCode', $result) && $result['retCode'] == 0) {
            $data = $result['data'];
            if (isset($data['sectionInfo']) && isset($data['sectionInfo']['lives'])) {
                $liveDatas = $data['sectionInfo']['lives'];
                $matchId = isset($data['sectionInfo']['matchId']) ? $data['sectionInfo']['matchId'] : "";
                foreach ($liveDatas as $liveData) {
                    $name = "其他";
                    if(isset($liveData['commentator']) && strlen($liveData['commentator']) > 0) {
                        $name = $liveData['commentator'];
                    }
                    $cids[] = ['isVip'=>$liveData['pay']==1, 'name'=>$name, 'cid'=>$liveData['cid'], 'matchId'=>$matchId];
                }
            }
        }
        $this->dumpData("convertSectionId2Cid cids");
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
            } else if ($key == 3) {
                $name = "蓝光";
            }
            $lines[$name] = $this->getM3u8StreamUrls($stream, $cKey);
        }
        return array_reverse($lines);
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

//        if ($isVip) {
//            if (strlen($aliHost) > 0) {
//                $aliHost = "shenhu.live.pptv.com";
//                $urls[] = $this->convertM3u8Url($aliHost, $rid, $cKey);
//            }
//        } else {
            if (strlen($aliHost) > 0) {
                $urls[] = $this->convertM3u8Url($aliHost, $rid, $cKey);
            }
            if (strlen($wsHost) > 0) {
                $urls[] = $this->convertM3u8Url($wsHost, $rid, $cKey);
            }
//        }
        return $urls;
    }

    private function convertM3u8Url($host, $rid, $cKey) {
        $url = "";
        if (strlen($host) > 0 && strlen($rid) > 0 && strlen($cKey) > 0) {
            $url = "http://$host/live/5/60/$rid.m3u8?type=mpptv&k=$cKey";
        }
        return $url;
    }

    /**
     * ===========================================================================
     * 包含会员部分的破解
     * sport.pptv.com
     * http://sports.pptv.com/sportslive?sectionid=147391&matchid=
     * =============================================================================
     */
    private function getSportWebPlayData($sid, $mid, $cid) {
        $url = "http://web-play.pptv.com/webplay3-0-$cid.xml?zone=8&vvid=a3b63117-00d3-a118-543e-a4efe837c292&username=13378681807_180310l88&token=zbVfxFXQu1XVICRa30qvXvnomt1Os3rMmuRBEt7MJPTW0kHzYMhFdQDAQ6uAECe92jcJgTYBDhjg%0D%0AQudziRrBbpw_Q9B5RneS1vVnw7ZVp4bBdGkCvgDrAGXFCzHVT17yXcNf_0fJZ6Z0fGNr2reGibf2%0D%0AYtKcZa_fAOgnkavu3YI%0D%0A&param=type%3Dweb%26ahl_ver%3D1%26ahl_random%3D5471404874543b3d3c353e452a2e3157%26ahl_signa%3Db6ddda74efaa04d774fac200490aa6762231df02f636d1474be174dde1393bf8%26userType%3D0%26o%3D0&ppi=302c34&kk=4157af5f5eeb0e81498ef1dcdde67863-613b-59a4e503&salt=pv&referrer=http%3A%2F%2Fsports.pptv.com%2F&o=0&segment=93ff806c_93ff8234_1503975155&sl=1&isSports=1&vts=0&pageUrl=http%3A%2F%2Fsports.pptv.com%2Fsportslive%3Fsectionid%3D147391%26matchid%3D&type=web&r=1540365477979&version=6&appplt=flp&appid=pptv.flashplayer.live&appver=2.12.44&nddp=1";
        $referee = "http://sports.pptv.com/sportslive?sectionid=$sid&matchid=$mid";

//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL,$url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_TIMEOUT, 5);//5秒超时
//        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
//        curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);
//        curl_setopt($ch, CURLOPT_REFERER, $referee);
//
//        $response = curl_exec ($ch);
//        curl_close ($ch);
//
//        dump($response);

        $ql = new QueryList();
        $ql->get($url, [], [
            //设置超时时间，单位：秒
            'timeout' => 30,
            'headers' => [
                'User-Agent' => $this->userAgentPC,
                'Accept' => '*/*',
                'accept-encoding' => 'gzip, deflate',
                'accept-language' => 'zh-CN,zh;q=0.9',
                'upgrade-insecure-requests' => '1',
                'Cookie' => $this->cookie,
                'Referer' => $referee
            ]
        ])->encoding('UTF-8')->removeHead();

        dump($ql->find('root')->htmls());
    }
}
