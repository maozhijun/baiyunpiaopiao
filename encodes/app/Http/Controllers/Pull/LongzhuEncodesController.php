<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LongzhuEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {
            $this->channels[] = '云端直播0##vod_3180361';
            $this->channels[] = '云端直播1##vod_3180362';
            $this->channels[] = '云端直播2##vod_3180363';
            $this->channels[] = '云端直播3##vod_3180364';
            $this->channels[] = '云端直播4##vod_3180365';
            $this->channels[] = '云端直播5##vod_3180366';
            $this->channels[] = '云端直播6##vod_3180367';
            $this->channels[] = '云端直播7##vod_3180368';
            $this->channels[] = '云端直播8##vod_3180369';
            $this->channels[] = '云端直播9##vod_3180370';
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
        $LZLives = $this->getLongzhuLives();
        $ets = EncodeTask::query()->where('from', 'SS')->where('status', 1)->get();
        return view('manager.pull.longzhu', ['lives' => $LZLives, 'ets' => $ets, 'channels' => $this->channels]);
    }

    public function getLiveUrl(Request $request, $id)
    {
        $lines = $this->getLongzhuLines($id);
        if (!empty($lines)) {
            return view('manager.pull.longzhu_lines', ['lines' => $lines]);
        }
        return response('信号还在路上，等会再来看看！');
    }

    public function created(Request $request)
    {
        if ($request->isMethod('post')
            && $request->has('input')
            && $request->has('channel')
            && $request->has('name')
        ) {
            $name = str_replace(' ', '-', $request->input('name'));
            $input = $request->input('input');

            $channel = $request->input('channel');
            list($roomName, $roomId) = explode('##', $channel);
            $rtmp_url = 'rtmp://push.china0736.com/vod/' . $roomId;//获取rtmp地址
            $live_rtmp_url = 'rtmp://live.china0736.com/vod/' . $roomId;//播放rtmp地址
            $live_m3u8_url = 'http://hls.china0736.com/vod/' . $roomId . '.m3u8';//播放m3u8地址

            $fontsize = $request->input('fontsize', 20);
            $watermark = $request->input('watermark', '');
            $location = $request->input('location', 'top');
            $has_logo = $request->input('logo');
            $referer = $request->input('referer', '');
            $header1 = $request->input('header1', '');
            $header2 = $request->input('header2', '');
            $header3 = $request->input('header3', '');
            $size = $request->input('size', 'md');
            $exec = $this->generateFfmpegCmd($input, $rtmp_url, $watermark, $fontsize, $location, $has_logo, $size, $referer, $header1, $header2, $header3);
            Log::info($exec);
            shell_exec($exec);
            $pid = exec('pgrep -f "' . explode('?', $rtmp_url)[0] . '"');
            if (!empty($pid)) {
                $et = new EncodeTask();
                $et->name = $name;
                $et->channel = $channel;
                $et->input = $input;
                $et->rtmp = $rtmp_url;
                $et->out = $live_rtmp_url . "\n" . $live_m3u8_url;
                $et->from = 'Very';
                $et->to = 'Very';
                $et->status = 1;
                $et->save();
            }

        }
        return back();
    }

    public function stop(Request $request, $id)
    {
        $et = EncodeTask::query()->find($id);
        if (isset($et)) {
            $pid = exec('pgrep -f "' . explode('?', $et->rtmp)[0] . '"');
            if (!empty($pid)) {
                exec('kill -9 ' . $pid, $output_array, $return_var);
                if ($return_var == 0) {
                    $et->status = 0;
                    $et->stop_at = date_create();
                    $et->save();
                }
            } else {
                $et->status = 0;
                $et->stop_at = date_create();
                $et->save();
            }
        }
        return back();
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
        if (isset($json) && isset($json['playLines']['urls'])) {
            $urls = $json['playLines']['urls'];
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
