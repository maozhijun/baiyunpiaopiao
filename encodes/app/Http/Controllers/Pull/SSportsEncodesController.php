<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SSportsEncodesController extends BaseController
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
        $SSLives = $this->getSSportsLives();
        $lives = [];
        foreach ($SSLives as $live) {
            if (isset($live['matchId'])) {
                $lives[] = $live;
            }
        }
        $ets = EncodeTask::query()->where('from', 'SS')->where('status', 1)->get();
        return view('manager.pull.ssports', ['lives' => $lives, 'ets' => $ets, 'channels' => $this->channels]);
    }

    public function getLiveUrl(Request $request, $id)
    {
        $keys = $this->getSSKeys($id);
        $lines = $this->getSSM3U8Lines($id, $keys);
        if (!empty($lines)) {
            return view('manager.pull.ssports_lines', ['lines' => $lines]);
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

    private function getSSM3U8Lines($id, $keys)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://json.ssports.com/matchinfo/app/matchinfo_$id.json");
//        curl_setopt($ch, CURLOPT_COOKIE, 'SERVERID=e8e4d482877771492d8d82843185eeb8|1522664175|1522659461; public_token=leisu_test;');
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
//        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Referer:http://live.leisu.com/stream-' . $id, 'Upgrade-Insecure-Requests:1']);
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "%E6%96%B0%E8%8B%B1%E4%BD%93%E8%82%B2/226 CFNetwork/894 Darwin/17.4.0");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json) && !empty($json['retData']['security'])) {
            $security = $json['retData']['security'];
            $lines = [];
            $rooms = $security['language_list'];
            foreach ($rooms as $room) {
                foreach ($room['rooms'] as $r) {
                    if (!isset($lines[$r]['language'])) {
                        $lines[$r]['language'] = $room['title'];
                    }
                }
            }
            foreach ($lines as $room => &$value) {
                $roomInfo = $security[$room];
                $value['commentary'] = $roomInfo['commentary'];
                foreach ($security['clarity'] as $c) {
                    if (isset($roomInfo['line_1_' . $c['format']]) && isset($keys[$room]['line_1'])) {
                        $value['line_1'][$c['format']] = $roomInfo['line_1_' . $c['format']] . '?' . $keys[$room]['line_1'];
                    }
                    if (isset($roomInfo['line_2_' . $c['format']]) && isset($keys[$room]['line_2'])) {
                        $value['line_2'][$c['format']] = $roomInfo['line_2_' . $c['format']] . '?' . $keys[$room]['line_2'];
                    }
                }
            }
            return $lines;
        } else {
            return null;
        }
    }

    private function getSSKeys($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://security.ssports.com/api/channel/v3/watchMatch/match/$id/device/app?userId=17951244&uuid=36695AD5D460A8D1D6CB8850DB58AF7B");
//        curl_setopt($ch, CURLOPT_COOKIE, 'SERVERID=e8e4d482877771492d8d82843185eeb8|1522664175|1522659461; public_token=leisu_test;');
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "%E6%96%B0%E8%8B%B1%E4%BD%93%E8%82%B2/226 CFNetwork/894 Darwin/17.4.0");
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
        if (isset($json) && !empty($json['retData']['security'])) {
            $keys = [];

            $security = $json['retData']['security'];
            foreach ($security as $s) {
                if (isset($s['line_1'])) {
                    $keys[$s['room']]['line_1'] = $s['line_1'];
                }
                if (isset($s['line_2'])) {
                    $keys[$s['room']]['line_2'] = $s['line_2'];
                }
            }
            return $keys;
        } else {
            return null;
        }
    }

    private function getSSportsLives()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://json.ssports.com/matchData/appMatchList_recommend_1.json');
//        curl_setopt($ch, CURLOPT_COOKIE, 'SERVERID=e8e4d482877771492d8d82843185eeb8|1522664175|1522659461; public_token=leisu_test;');
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "%E6%96%B0%E8%8B%B1%E4%BD%93%E8%82%B2/226 CFNetwork/894 Darwin/17.4.0");
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
        if (isset($json) && !empty($json['retData']) && !empty($json['retData']['list'])) {
            return $json['retData']['list'];
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
