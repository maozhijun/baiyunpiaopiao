<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QQEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {
        } elseif (env('APP_NAME') == 'aikq') {
            $this->channels[] = '云端直播0##vod_3183361';
            $this->channels[] = '云端直播1##vod_3183362';
            $this->channels[] = '云端直播2##vod_3183363';
            $this->channels[] = '云端直播3##vod_3183364';
            $this->channels[] = '云端直播4##vod_3183365';
            $this->channels[] = '云端直播5##vod_3183366';
            $this->channels[] = '云端直播6##vod_3183367';
            $this->channels[] = '云端直播7##vod_3183368';
            $this->channels[] = '云端直播8##vod_3183369';
            $this->channels[] = '云端直播9##vod_3183370';
        }
    }

    public function index(Request $request)
    {
        $QQLives = $this->getQQLives();
        $lives = [];
        $records = [];
        foreach ($QQLives as $dlives) {
            foreach ($dlives['list'] as $live) {
                if ($live['matchInfo']['liveType'] == 3 && ($live['matchInfo']['livePeriod'] == 0 || $live['matchInfo']['livePeriod'] == 1)) {
                    $lives[] = $live;
                }
            }
        }
//        dump($LZLives);
        $ets = EncodeTask::query()->where('from', 'LZ')->where('status', 1)->get();
        return view('manager.pull.qq', ['lives' => $lives, 'ets' => $ets, 'channels' => $this->channels]);
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
//        curl_setopt($ch, CURLOPT_COOKIE, 'p1u_id=5fc97c48e734ff8eb36a14e55af63cfe367deb720797d377f13e9873422df0e1e1b98cee2eb7520e353496dcc940db7f3d78ec51246414bb; pluguest=9E21C4BB628F901529EC8EFDBF9D5FD615E69E45DBC440106608C6866EE926C95DB7E094C9C5B2AB3EA5DAD675F58AB853C2645C694D6D69; _ma=OREN.2.1361566749.1520689312; UM_distinctid=16210256f2d3ec-0c1806c5bf42758-48635939-3d10d-16210256f2e3f6');
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
//        curl_setopt($ch, CURLOPT_COOKIE, 'p1u_id=5fc97c48e734ff8eb36a14e55af63cfe367deb720797d377f13e9873422df0e1e1b98cee2eb7520e353496dcc940db7f3d78ec51246414bb; pluguest=9E21C4BB628F901529EC8EFDBF9D5FD615E69E45DBC440106608C6866EE926C95DB7E094C9C5B2AB3EA5DAD675F58AB853C2645C694D6D69; _ma=OREN.2.1361566749.1520689312; UM_distinctid=16210256f2d3ec-0c1806c5bf42758-48635939-3d10d-16210256f2e3f6');
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
