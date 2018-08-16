<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LeisuEncodesController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
    }

    public function index(Request $request)
    {
        $LSLives = $this->getLeiSuLives();
        $lives = [];
        foreach ($LSLives['matches'] as $live) {
            if ($live[10] == 1 && $live[2] <= 4) {
                $lives[] = $live;
            }
        }
        $leagues = $LSLives['events'];
//        dump($lives);
//        dump($leagues);
        $ets = EncodeTask::query()->where('from', 'LS')->where('status', 1)->get();
        return view('manager.pull.leisu', ['lives' => $lives, 'leagues' => $leagues]);
    }

    public function getLiveUrl(Request $request, $id)
    {
        $pcurl = $this->getLeiSuLiveStream($id);
        if (!empty($pcurl)){
            $rtmp = $this->getLeiSuRtmp($id, $pcurl);
            return response($rtmp);
        }
        return response('404');
    }

    private function getLeiSuRtmp($id, $liveurl)
    {
//        dump($liveurl);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $liveurl);
//        curl_setopt($ch, CURLOPT_COOKIE, 'SERVERID=e8e4d482877771492d8d82843185eeb8|1522664175|1522659461; public_token=leisu_test;');
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Referer:http://live.leisu.com/stream-' . $id, 'Upgrade-Insecure-Requests:1']);
        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
//        preg_match('#\"(rtmp://\S+)\"#', $response, $matches);

        preg_match('#(eval.+)#', $response, $matches);
        if (!empty($matches)) {
//            dump(array_last($matches));
            return '<script src="/js/jquery.js"></script><script type="text/javascript">try{'.array_last($matches).'}catch(err){}setTimeout(function(){document.write(decodeURIComponent(flashvars.f))},100);</script>';
//            return '<script type="text/javascript">'.array_last($matches).';document.write(decodeURIComponent(flashvars.f))</script>';
        }
        return '';
    }

    private function getLeiSuLiveStream($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.leisu.com/api/livestream?app=0&platform=2&sid=' . $id . '&time=1522661124&type=1&ver=2.6.2');
        curl_setopt($ch, CURLOPT_COOKIE, 'SERVERID=e8e4d482877771492d8d82843185eeb8|1522664175|1522659461; public_token=leisu_test;');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "Sports/2.6.2 (iPhone; iOS 11.2.6; Scale/2.00)");
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
        if (isset($json) && !empty($json['url']['pc'])) {
            return $json['url']['pc'];
        } else {
            return null;
        }
    }

    private function getLeiSuLives()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.leisu.com/app/live/live?app=0&lang=0&platform=2&ver=2.6.2');
        curl_setopt($ch, CURLOPT_COOKIE, 'SERVERID=e8e4d482877771492d8d82843185eeb8|1522664175|1522659461; public_token=leisu_test;');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "Sports/2.6.2 (iPhone; iOS 11.2.6; Scale/2.00)");
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
        if (isset($json) && !empty($json['matches'])) {
            return $json;
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
