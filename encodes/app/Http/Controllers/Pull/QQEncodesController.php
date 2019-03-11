<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QQEncodesController extends BaseController
{
    private $liveCookies = 'pgv_info=ssid=s6530940256; pgv_pvid=33185143; pgv_pvi=9165895680; pgv_si=s9348592640; RK=eFwNzsj1HO; ptcz=96bbe3970213d8dde5f1a95314239688602e87b0d7bd430b6d3c4dd8e89d2ff9; ts_uid=6423183072; tvfe_boss_uuid=3af30f8728a3ce25; ptag=www_nball_cc|; ukey=154362666193927278; p_uin=o1104646637; pt4_token=phYmAg*B3En1PqzvLSCAgI8NaDbWDJSTV2xOBgkxtOI_; p_skey=Wp4ZruLTA6oMA8bHlh019OKkmTtyYD1Ajq4dyV7YC-8_; bossv2_isvip=-1; ptisp=ctc; o_cookie=2080989735; pac_uid=1_2080989735; sensorsdata2015jssdkcross=%7B%22distinct_id%22%3A%221671fca5d23f9-0794e77db431ac-35667407-1024000-1671fca5d25b14%22%2C%22%24device_id%22%3A%221671fca5d23f9-0794e77db431ac-35667407-1024000-1671fca5d25b14%22%2C%22props%22%3A%7B%22%24latest_traffic_source_type%22%3A%22%E7%9B%B4%E6%8E%A5%E6%B5%81%E9%87%8F%22%2C%22%24latest_referrer%22%3A%22%22%2C%22%24latest_referrer_host%22%3A%22%22%2C%22%24latest_search_keyword%22%3A%22%E6%9C%AA%E5%8F%96%E5%88%B0%E5%80%BC_%E7%9B%B4%E6%8E%A5%E6%89%93%E5%BC%80%22%7D%7D; ts_refer=v.qq.com/; mobileUV=1_16937c70ff8_618bd; ts_last=sports.qq.com/kbsweb/';
    private $lineCookies = 'sensorsdata2015jssdkcross=%7B%22distinct_id%22%3A%221671fca5d23f9-0794e77db431ac-35667407-1024000-1671fca5d25b14%22%2C%22%24device_id%22%3A%221671fca5d23f9-0794e77db431ac-35667407-1024000-1671fca5d25b14%22%2C%22props%22%3A%7B%22%24latest_traffic_source_type%22%3A%22%E5%BC%95%E8%8D%90%E6%B5%81%E9%87%8F%22%2C%22%24latest_referrer%22%3A%22http%3A%2F%2Fwww.dongqiuzhibo.com%2Fny%2Fmz%2Fzqzx.html%22%2C%22%24latest_referrer_host%22%3A%22www.dongqiuzhibo.com%22%2C%22%24latest_search_keyword%22%3A%22%E6%9C%AA%E5%8F%96%E5%88%B0%E5%80%BC%22%7D%7D; pgv_info=ssid=s6530940256; pgv_pvid=33185143; pgv_pvi=9165895680; pgv_si=s9348592640; RK=eFwNzsj1HO; ptcz=96bbe3970213d8dde5f1a95314239688602e87b0d7bd430b6d3c4dd8e89d2ff9; tvfe_boss_uuid=3af30f8728a3ce25; ptisp=cnc; ptui_loginuin=1104646637; pt2gguin=o1104646637; uin=o1104646637; skey=@jlcskmVil; luin=o1104646637; lskey=000100003ad8c226c0d0bc8d08597597fb7f6c3b897f7ee98e1819f540680fa12ff49ff8ef961f79b4cced31; uid=264611124; o_cookie=1104646637';

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
    }

    public function index(Request $request)
    {
//        $QQLives = $this->getQQLives();
        $QQLives = $this->getWebQQLives();
        $lives = [];
        foreach ($QQLives as $dlives) {
            foreach ($dlives as $live) {
//                foreach ($dlives['list'] as $live) {
                if ($live['liveType'] == 3 && ($live['livePeriod'] == 0 || $live['livePeriod'] == 1)) {
//                    if ($live['matchInfo']['liveType'] == 3 && ($live['matchInfo']['livePeriod'] == 0 || $live['matchInfo']['livePeriod'] == 1)) {
                    $lives[] = $live;
                }
            }
        }
//        dump($LZLives);
        return view('manager.pull.qq', ['lives' => $lives]);
    }

    public function getLiveUrl(Request $request, $id)
    {
        if ($request->has('cKey')) {
            $lines = $this->getQQLines($id, $request->cKey, $request->encryptVer, $request->tm, $request->sdtfrom, $request->platform);
            if (!empty($lines)) {
                return view('manager.pull.qq_lines', ['lines' => $lines]);
            }
            return response('信号还在路上，等会再来看看！');
        } else {
            return view('manager.pull.qq_lines', ['liveId' => $id]);
        }
    }

    private function getQQLines($liveId, $cKey, $encryptVer, $tm, $sdtfrom, $platform)
    {

        $url = "http://info.zb.video.qq.com/?cmd=2&cnlid=$liveId&stream=2&system=3&encryptVer=$encryptVer&defn=shd&fntick=$tm&tm=$tm&sdtfrom=$sdtfrom&platform=$platform&cKey=$cKey";
//        dump($url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIE, $this->lineCookies);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
//        curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-CorrelationId: 97A40AEA1F594F5C998C0EEE453A03DA', 'x-b3-traceid: dafdb25b762b6b4a1ed3aef9ce1741c7', 'x-b3-spanid: 0522BAF66', 'x-b3-sampled: true']);
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);
//        dump($json);

        if (isset($json['playurl']) && !empty($json['backurl_list'])) {
            $urls[] = $json['playurl'];
            foreach ($json['backurl_list'] as $url) {
                $urls[] = $url['url'];
            }
            return $urls;
        } else {
            return null;
        }
    }

    private function getQQLives()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://app.sports.qq.com/match/hotMatchList');
        curl_setopt($ch, CURLOPT_COOKIE, $this->liveCookies);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json['data']['matches'])) {
            return $json['data']['matches'];
        } else {
            return null;
        }
    }

    private function getWebQQLives()
    {
        $ch = curl_init();
        $start = date('Y-m-d', strtotime('-3 day'));
        $end = date('Y-m-d', strtotime('+3 day'));
        $timestamp = time() * 1000;
//        dump("https://matchweb.sports.qq.com/matchUnion/list?startTime=$start&endTime=$end&columnId=hot&index=0&timestamp=$timestamp");
        curl_setopt($ch, CURLOPT_URL, "https://matchweb.sports.qq.com/matchUnion/list?startTime=$start&endTime=$end&columnId=hot&index=0&timestamp=$timestamp");
        curl_setopt($ch, CURLOPT_COOKIE, $this->liveCookies);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json['data'])) {
            return $json['data'];
        } else {
            return null;
        }
    }


    public function test()
    {
//        list($roomName, $roomId, $token) = explode('##', '老铁扣波666##10061563##3c4068b47d194772');
//        $rtmp_json = $this->getRtmp($token);
//        $fms_val = $rtmp_json['fms_val'];
//        $rtmp_id = array_first(array_keys($rtmp_json['list']));
//        $rtmp_url = array_first(array_values($rtmp_json['list']));
//        if ($this->startLive($token, $fms_val, $rtmp_id)) {//开播成功
//            $flvUrl = $this->getFlv($roomId);
//            $m3u8Url = $this->getM3u8($roomId);
//            dump($rtmp_url);
//            dump($flvUrl);
//            dump($m3u8Url);
//        }
    }
}
