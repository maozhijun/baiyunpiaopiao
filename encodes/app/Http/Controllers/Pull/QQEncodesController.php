<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QQEncodesController extends BaseController
{
    private $liveCookies = 'pgv_info=ssid=s7866718830; pgv_pvid=7865605630; tvfe_boss_uuid=103555142f249363; mobileUV=1_162c24f104c_15db0; pgv_pvi=9041552384; pgv_si=s1556067328; RK=+UZJmPvkdS; ptcz=d37d7929ab69cf6ac10c2a660f61cca3e29bf2dc9db10f796095ed5d4ffaeb1e; eas_sid=f1K5E3M0G0M8v9V1c4y1b6C706; qv_swfrfh=v.yunfan.com; qv_swfrfc=v20; qv_swfrfu=http://v.yunfan.com/play/320919020503332242.html; sd_userid=23651533262727840; sd_cookie_crttime=1533262727840; ts_uid=5771111850; sensorsdata2015jssdkcross=%7B%22distinct_id%22%3A%221655a61481d1ce-0132061f745c12-34677908-1024000-1655a61481e2f%22%2C%22%24device_id%22%3A%221655a61481d1ce-0132061f745c12-34677908-1024000-1655a61481e2f%22%2C%22props%22%3A%7B%22%24latest_traffic_source_type%22%3A%22%E8%87%AA%E7%84%B6%E6%90%9C%E7%B4%A2%E6%B5%81%E9%87%8F%22%2C%22%24latest_referrer%22%3A%22https%3A%2F%2Fwww.baidu.com%2Flink%22%2C%22%24latest_referrer_host%22%3A%22www.baidu.com%22%2C%22%24latest_search_keyword%22%3A%22%E6%9C%AA%E5%8F%96%E5%88%B0%E5%80%BC%22%7D%7D; 3g_guest_id=-8713105140778790912; g_ut=2; verifysession=h01f4bb2b3fcae9b07a7b9a929c8deefd84fe16cfd6006ead742da4e808f636dda46de10b534e575931; midas_openid=373566342; midas_openkey=@bWrAILDjI; ptui_loginuin=1104646637; pt2gguin=o1104646637; uin=o1104646637; skey=@qvpMmfMET; ptisp=cnc; luin=o1104646637; lskey=0001000090fb48f98e437cafc37edba8f4cf481fdc190863697308616b9be623dc8dafa2ea02b592d6e06ef2; p_uin=o1104646637; pt4_token=QUmSdmuANWtkD-kZ9zODvIFl9uMIy1jruS2BZoEeig4_; p_skey=2N9EXhk-u2FMbZYPPVGhxuu-8ifsuzEFbD05fG0eGxI_; p_luin=o1104646637; p_lskey=00040000118933800caa8294d7b78240486e8e140ff99578c08a01db2328f6fd1cdcf804c41480da8a02f7ae; main_login=qq; uid=264611124; o_cookie=1104646637; ukey=153819291243843229; boss_user=loginType%3D1%26nbaVipType%3D0%26qq%3D1104646637%26wxOpenId%3D%26wxAppId%3D%26uKey%3D153819291243843229; ts_last=sports.qq.com/kbsweb/game.htm; bossv2_isvip=2';
    private $lineCookies = 'pgv_info=ssid=s7866718830; pgv_pvid=7865605630; tvfe_boss_uuid=103555142f249363; mobileUV=1_162c24f104c_15db0; pgv_pvi=9041552384; pgv_si=s1556067328; RK=+UZJmPvkdS; ptcz=d37d7929ab69cf6ac10c2a660f61cca3e29bf2dc9db10f796095ed5d4ffaeb1e; eas_sid=f1K5E3M0G0M8v9V1c4y1b6C706; qv_swfrfh=v.yunfan.com; qv_swfrfc=v20; qv_swfrfu=http://v.yunfan.com/play/320919020503332242.html; sd_userid=23651533262727840; sd_cookie_crttime=1533262727840; sensorsdata2015jssdkcross=%7B%22distinct_id%22%3A%221655a61481d1ce-0132061f745c12-34677908-1024000-1655a61481e2f%22%2C%22%24device_id%22%3A%221655a61481d1ce-0132061f745c12-34677908-1024000-1655a61481e2f%22%2C%22props%22%3A%7B%22%24latest_traffic_source_type%22%3A%22%E8%87%AA%E7%84%B6%E6%90%9C%E7%B4%A2%E6%B5%81%E9%87%8F%22%2C%22%24latest_referrer%22%3A%22https%3A%2F%2Fwww.baidu.com%2Flink%22%2C%22%24latest_referrer_host%22%3A%22www.baidu.com%22%2C%22%24latest_search_keyword%22%3A%22%E6%9C%AA%E5%8F%96%E5%88%B0%E5%80%BC%22%7D%7D; 3g_guest_id=-8713105140778790912; g_ut=2; verifysession=h01f4bb2b3fcae9b07a7b9a929c8deefd84fe16cfd6006ead742da4e808f636dda46de10b534e575931; midas_openid=373566342; midas_openkey=@bWrAILDjI; ptui_loginuin=1104646637; pt2gguin=o1104646637; uin=o1104646637; skey=@qvpMmfMET; ptisp=cnc; luin=o1104646637; lskey=0001000090fb48f98e437cafc37edba8f4cf481fdc190863697308616b9be623dc8dafa2ea02b592d6e06ef2; uid=264611124; o_cookie=1104646637';

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
        $start = date('Y-m-d');
        $end = date('Y-m-d', strtotime('+3 day'));
        curl_setopt($ch, CURLOPT_URL, "http://matchweb.sports.qq.com/matchUnion/list?startTime=$start&endTime=$end&columnId=all");
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
