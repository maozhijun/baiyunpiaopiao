<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CCTV5EncodesController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
    }

    public function index(Request $request)
    {
        $lines = $this->getLines();
        $asianLines = $this->getAsianLines();
        if (!empty($asianLines) && !empty($lines)) {
            $lines = array_merge($lines, $asianLines);
            $lines = array_sort($lines,function ($value){
                return $value['starttime'];
            });
//            dump($lines);
        }
        return view('manager.pull.cctv5', ['lives' => $lines]);
    }

    public function getLiveUrl(Request $request, $id)
    {
        $lines = $this->getCCTV5LiveUrl($id);
//        dump($lines);
        if (!empty($lines)) {
            $urls = [];
            foreach ($lines as $name => $line) {
//                $url = $this->getCCTV5LiveUrlAuth($line);
//                $urls['m3u8_' . $name] = $url;
//                $line = str_replace("http://", "rtmp://", $line);
                $line = str_replace('/playlist.m3u8', '.flv', $line);
//                $line = str_replace('/playlist.m3u8', '', $line);
                $url = $this->getCCTV5LiveUrlAuth($line);
                $urls['flv_' . $name] = $url;
            }
            return view('manager.pull.cctv5_lines', ['lines' => $urls]);
        }
        return response('信号还在路上，等会再来看看！');
    }

    private function getLines($day = '')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://api.5club.cctv.cn/mobileinf/rest/oly/duration');
        curl_setopt($ch, CURLOPT_POST, true);
        $data = array(
            'code' => $day,
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_COOKIE, 'acw_tc=AQAAAMwdxgy83AUA4ioEt0fJhPfNWZRv; aliyungf_tc=AQAAAFgSgGlasAUA4ioEt5pv00doG6iR;');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "CCTVFive/2.4.2 (iPhone; iOS 11.2.6; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json) && isset($json['error_code']) && $json['error_code'] == 0) {
            return $json['videolivelist'];
        } else {
            return false;
        }
    }

    private function getAsianLines()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://api.5club.cctv.cn/mobileinf/rest/asian/liveduration');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'json=%7B%0A%20%20%22date_time%22%20%3A%20%22%22%2C%0A%20%20%22competitions_id%22%20%3A%20%22%22%0A%7D');
        curl_setopt($ch, CURLOPT_COOKIE, 'aliyungf_tc=AQAAAMvsYQR1yQ4AkyoEt4yeNZ48JYFj;');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "CCTVFive/2.6.2 (iPhone; iOS 11.4.1; Scale/2.00)");
//        curl_setopt($ch, CURLINFO_CONTENT_LENGTH_UPLOAD, 101);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Length'=>'101',
            'X-Tingyun-Id'=>'lOO3v-LaMio;c=2;r=598381378',
        ]);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json) && isset($json['error_code']) && $json['error_code'] == 0) {
            return $json['videolivelist'];
        } else {
            return false;
        }
    }

    private function getCCTV5LiveUrl($id = '')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://api.5club.cctv.cn/mobileinf/rest/oly/videolive');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'json=' . urlencode(json_encode(['videolive' => $id])));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-Tingyun-Id: lOO3v-LaMio;c=2;r=1296233254']);
        curl_setopt($ch, CURLOPT_COOKIE, 'acw_tc=AQAAAMwdxgy83AUA4ioEt0fJhPfNWZRv; aliyungf_tc=AQAAAFgSgGlasAUA4ioEt5pv00doG6iR;');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "CCTVFive/2.4.2 (iPhone; iOS 11.2.6; Scale/2.00)");
//        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
//        curl_setopt($ch, CURLOPT_VERBOSE, true);
//        $verbose = fopen('php://temp', 'w+');
//        curl_setopt($ch, CURLOPT_STDERR, $verbose);
//        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        $response = curl_exec($ch);
//        dump($response);
//        rewind($verbose);
//        $verboseLog = stream_get_contents($verbose);
//        echo "Verbose information:\n<pre>", htmlspecialchars($verboseLog), "</pre>\n";

        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json['videolive']['livestream'])) {
            return $json['videolive']['livestream'];
        } else {
            return null;
        }
    }

    private function getCCTV5LiveUrlAuth($url = '')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://api.cctv.cn/cctvmobileinf/rest/cctv/videoliveUrl/getstream');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'url=' . str_replace(':', '%3A', $url));
//        dump('url=' . str_replace(':', '%3A', $url));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Refer: api.cctv.cn', 'UID: 269482797625189']);
        curl_setopt($ch, CURLOPT_COOKIE, 'acw_tc=AQAAALNPL1XoOQgA4ioEt/zneHCLrF3u; aliyungf_tc=AQAAAO/bfmMGEAgA4ioEt5bFhXwptOnI');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "cctv_app_phone_cctv5");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json['url'])) {
            return $json['url'];
        } else {
            return false;
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
