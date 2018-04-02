<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LeisuEncodesController extends BaseController
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
        return view('manager.leisu', ['lives' => $lives, 'leagues' => $leagues, 'ets' => $ets, 'channels' => $this->channels]);
    }

    public function getRtmp(Request $request, $id)
    {
        $pcurl = $this->getLeiSuLivestream($id);
        if (!empty($pcurl)){
            $rtmp = $this->getLeiSuRtmp($id, $pcurl);
            return response($rtmp);
        }
        return response('404');
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
            $exec = $this->generateFfmpegCmd($input, $rtmp_url, $watermark, $fontsize, $location, $has_logo, $referer, $header1, $header2, $header3);
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

    private function getLeiSuRtmp($id, $liveurl)
    {
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
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        preg_match('#\"(rtmp://live\S+)\"#', $response, $matches);
        if (!empty($matches)) {
            return array_last($matches);
        }
        return '';
    }

    private function getLeiSuLivestream($id)
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
        if (isset($json) && !empty($json['url'])) {
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
