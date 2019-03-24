<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KBallEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
    }

    public function index(Request $request)
    {
//        $KBLives = $this->getKBallLives();
//        $lives = [];
//        foreach ($KBLives as $live) {
//            if (!empty($live['list'])) {
//                $lives = array_merge($lives, $live['list']);
//            }
//        }
////        dump($lives);
//        $ets = EncodeTask::query()->where('from', 'KB')->where('status', 1)->get();
//        return view('manager.pull.kball', ['lives' => $lives, 'ets' => $ets, 'channels' => $this->channels]);

//        $KBLives = $this->getKBallAppLives();
//        $lives = [];
//        if (isset($KBLives) && count($KBLives) > 0) {
//            foreach ($KBLives as $live) {
//                if ($live['componentCode'] == "recomMatch") {
//                    $lives = $live['recomMatch'];
//                    break;
//                }
//            }
//        }

        $lives = $this->getKBallAppLives();
        $lives = array_merge($lives, $this->getKBallAppLives(2));

//        dump($lives);
        return view('manager.pull.kball2', ['lives' => $lives]);
    }

    private function getKBallLives()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://rest.winpowerdata.com.cn/v1/games?cid=&date=' . date('Y-m-d'));
//        curl_setopt($ch, CURLOPT_COOKIE, 'language=zh-cn;');
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "KBallProject/1.1.6 (iPhone; iOS 11.2.6; Scale/2.00)");
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
        if (isset($json) && isset($json['status']) && $json['status'] == 200) {
            return $json['data'];
        } else {
            return null;
        }
    }

    private function getKBallAppLives($liveStatus = 1) {
//        $url = "https://api.kqiu.cn/content/v1/recommendations/1";
        $url = "https://api.kqiu.cn/match/v1/games?gameStatus=$liveStatus&pageNum=1&pageSize=100";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_COOKIE, 'language=zh-cn;');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
//        curl_setopt($ch, CURLOPT_USERAGENT, "okhttp/3.10.0");
//        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'AndroidVersion: 1001014'
        ));

        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);

        if (isset($json) && isset($json['msg']) && $json['msg'] == "SUCCESS") {
            return $json['data'];
        } else {
            return null;
        }
    }

    public function kBallRtmpUrl(Request $request) {
        $gid = $request->input('gid');
        if (!$gid || strlen($gid) < 0) return response('信号还在路上，等会再来看看！');

        $url = "https://api.kqiu.cn/live/v1/lives/$gid";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_COOKIE, 'language=zh-cn;');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "okhttp/3.10.0");
//        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);

        $json = json_decode($response, true);
        if (isset($json) && isset($json['msg']) && $json['msg'] == "SUCCESS") {
            $rtmpUrl = $json['data'][0]['liveHighLink'];
            $m3u8Url = str_replace("rtmp://", "http://", $rtmpUrl).".m3u8";
            $flvUrl = str_replace("rtmp://", "http://", $rtmpUrl).".flv";

            return response($rtmpUrl."<br><br><a target='_blank' href='$flvUrl'>$flvUrl</a><br><br>"."<a target='_blank' href='$m3u8Url'>$m3u8Url</a>");
        } else {
            return response('信号还在路上，等会再来看看！');
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
