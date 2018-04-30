<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class XBetEncodesController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
    }

    public function index(Request $request)
    {
//        $LSLives = $this->getXBetLives();
        $lives = $this->getXBetLives();
//        foreach ($LSLives['matches'] as $live) {
//            if ($live[10] == 1 && $live[2] <= 4) {
//                $lives[] = $live;
//            }
//        }
//        $leagues = $LSLives['events'];
//        dump($lives);
//        dump($leagues);
//        $ets = EncodeTask::query()->where('from', 'LS')->where('status', 1)->get();
        return view('manager.pull.xbet', ['lives' => $lives]);
    }

    public function getLiveUrl(Request $request, $id)
    {
        $lives = $this->getXBetLines($id);
        if (!empty($lives)) {
            return response($lives);
        }
        return response('404');
    }

    private function getXBetLives()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://1xbet.com/LiveFeed/GetLeftMenuShort?lng=cn&sports=0&partner=24');
        curl_setopt($ch, CURLOPT_COOKIE, 'SESSION=3f4c84d61480e6077680acd4645c3470; is_rtl=1; lng=cn');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
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
        if (isset($json) && !empty($json['Value'])) {
            return $json['Value'];
        } else {
            return null;
        }
    }

    private function getXBetLines($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://sstream365.com/player.php?id=$id");
        curl_setopt($ch, CURLOPT_COOKIE, 'SERVERID=e8e4d482877771492d8d82843185eeb8|1522664175|1522659461; public_token=leisu_test;');
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
        $response = str_replace("\x00", '', $response);
        $lines = explode("\n", $response);
        $eval = '';
        foreach ($lines as $line) {
            if (str_contains($line, 'eval(function')) {
                $eval = $line;
            }
        }

        if (!empty($eval)) {
            $scripts = [];
            $scripts[] = '<script>';
            $scripts[] = 'var vServer=""';
            $scripts[] = 'var vMp4url=""';
            $scripts[] = 'var vIosurl=""';
            $scripts[] = $eval;
            $scripts[] = 'document.write("<p><label>rtmp源:</label><input value=\""+vServer+"/"+vMp4url+"\" size=\"120\"></p>")';
            $scripts[] = 'document.write("<p><label>m3u8源:</label><input value=\""+vIosurl+"\" size=\"120\"></p>")';
            $scripts[] = '</script>';
            $script = join("\n", $scripts);
            return $script;
        }
        return '';
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
