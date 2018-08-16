<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LongzhuEncodesController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {
        } elseif (env('APP_NAME') == 'aikq') {
        }
    }

    public function index(Request $request)
    {
        $LZLives = $this->getLongzhuLives();
//        dump($LZLives);
//        $ets = EncodeTask::query()->where('from', 'LZ')->where('status', 1)->get();
        return view('manager.pull.longzhu', ['lives' => $LZLives]);
    }

    public function getLiveUrl(Request $request, $id)
    {
        $lines = $this->getLongzhuLines($id);
        if (!empty($lines)) {
            return view('manager.pull.longzhu_lines', ['lines' => $lines]);
        }
        return response('信号还在路上，等会再来看看！');
    }

    private function getLongzhuLines($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://livestream.longzhu.com/live/GetLivePlayUrl?appId=5001&bundleId=com.longzhu.tga&device=2&p1uuid=135796461&packageId=1&roomId=$id&version=4.6.5");
        curl_setopt($ch, CURLOPT_COOKIE, 'p1u_id=5fc97c48e734ff8eb36a14e55af63cfe367deb720797d377f13e9873422df0e1e1b98cee2eb7520e353496dcc940db7f3d78ec51246414bb; pluguest=9E21C4BB628F901529EC8EFDBF9D5FD615E69E45DBC440106608C6866EE926C95DB7E094C9C5B2AB3EA5DAD675F58AB853C2645C694D6D69; _ma=OREN.2.1361566749.1520689312; UM_distinctid=16210256f2d3ec-0c1806c5bf42758-48635939-3d10d-16210256f2e3f6');
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-CorrelationId: 97A40AEA1F594F5C998C0EEE453A03DA', 'x-b3-traceid: dafdb25b762b6b4a1ed3aef9ce1741c7', 'x-b3-spanid: 0522BAF66', 'x-b3-sampled: true']);
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "longzhu/4.6.5 (iPhone; iOS 11.2.6; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);
//        dump($json);

        if (isset($json) && isset(array_last($json['playLines'])['urls'])) {
            $urls = array_last($json['playLines'])['urls'];
            return $urls;
        } else {
            return null;
        }
    }

    private function getLongzhuLives()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://sportsapi.longzhu.com/sportv2/EventNoticeListForIndex?bundleId=com.longzhu.tga&device=2&leagueId=0&p1uuid=135796461&packageId=1&version=4.6.5');
        curl_setopt($ch, CURLOPT_COOKIE, 'p1u_id=5fc97c48e734ff8eb36a14e55af63cfe367deb720797d377f13e9873422df0e1e1b98cee2eb7520e353496dcc940db7f3d78ec51246414bb; pluguest=9E21C4BB628F901529EC8EFDBF9D5FD615E69E45DBC440106608C6866EE926C95DB7E094C9C5B2AB3EA5DAD675F58AB853C2645C694D6D69; _ma=OREN.2.1361566749.1520689312; UM_distinctid=16210256f2d3ec-0c1806c5bf42758-48635939-3d10d-16210256f2e3f6');
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "longzhu/4.6.5 (iPhone; iOS 11.2.6; Scale/2.00)");
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
        if (!empty($json)) {
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
