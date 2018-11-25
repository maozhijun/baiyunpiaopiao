<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VeryEncodesController extends BaseController
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
        } elseif (env('APP_NAME') == 'aikq1') {
            $this->channels[] = '云端直播0##vod_3183661';
            $this->channels[] = '云端直播1##vod_3183662';
            $this->channels[] = '云端直播2##vod_3183663';
            $this->channels[] = '云端直播3##vod_3183664';
            $this->channels[] = '云端直播4##vod_3183665';
            $this->channels[] = '云端直播5##vod_3183666';
            $this->channels[] = '云端直播6##vod_3183667';
            $this->channels[] = '云端直播7##vod_3183668';
            $this->channels[] = '云端直播8##vod_3183669';
            $this->channels[] = '云端直播9##vod_3183670';
        } elseif (env('APP_NAME') == 'leqiuba') {
            $this->channels[] = '云端直播0##vod_3173361';
            $this->channels[] = '云端直播1##vod_3173362';
            $this->channels[] = '云端直播2##vod_3173363';
            $this->channels[] = '云端直播3##vod_3173364';
            $this->channels[] = '云端直播4##vod_3173365';
            $this->channels[] = '云端直播5##vod_3173366';
            $this->channels[] = '云端直播6##vod_3173367';
            $this->channels[] = '云端直播7##vod_3173368';
            $this->channels[] = '云端直播8##vod_3173369';
            $this->channels[] = '云端直播9##vod_3173370';
        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Very')->where('created_at', '>', date_create('-48 hour'))->whereIn('status', [1, 2, -1])->get();
        return view('manager.push.very', ['ets' => $ets, 'channels' => $this->channels]);
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

//            $channel = $request->input('channel');
            $channel = $request->input('channel');
            $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Very')->where('created_at', '>', date_create('-48 hour'))->whereIn('status', [1, 2, -1])->inRandomOrder()->get();
            if ($ets->contains('channel', $channel)) {
                foreach ($this->channels as $ch) {
                    if (!$ets->contains('channel', $ch)) {
                        $channel = $ch;
                    }
                }
            }
            if (empty($channel)) {
                return back()->with(['error' => '没有可用的直播间咯']);
            }
            list($roomName, $roomId) = explode('##', $channel);
            $rtmp_url = 'rtmp://push.china0736.com/vod/' . $roomId;//获取rtmp地址
            $live_rtmp_url = 'rtmp://live.china0736.com/vod/' . $roomId;//播放rtmp地址
            $live_m3u8_url = 'http://hls.china0736.com/vod/' . $roomId . '.m3u8';//播放m3u8地址

            $fontsize = $request->input('fontsize', 18);
            $watermark = $request->input('watermark', '');
            $location = $request->input('location', 'top');
            $has_logo = $request->input('logo');
            $logo_position = $request->input('logo_position', '');
            $logo_text = $request->input('logo_text', '');
            $referer = $request->input('referer', '');
            $header1 = $request->input('header1', '');
            $header2 = $request->input('header2', '');
            $header3 = $request->input('header3', '');
            $size = $request->input('size', 'md');
            $exec = $this->generateFfmpegCmd($input, $rtmp_url, $watermark, $fontsize, $location, $has_logo, $size, $referer, $header1, $header2, $header3, $logo_position, $logo_text);
            Log::info($exec);
            shell_exec($exec);
            $pid = exec('pgrep -f "' . explode('?', $rtmp_url)[0] . '"');
            if (!empty($pid) && is_numeric($pid) && $pid > 0) {
                $et = new EncodeTask();
                $et->name = $name;
                $et->channel = $channel;
                $et->input = $input;
                $et->rtmp = $rtmp_url;
                $et->exec = $exec;
                $et->pid = $pid;
                $et->out = $live_rtmp_url . "\n" . $live_m3u8_url;
                $et->from = env('APP_NAME');
                $et->to = 'Very';
                $et->status = 1;
                $et->save();
            }

        }
        return back();
    }

    public function stop(Request $request, $id)
    {
        $this->stopPush($id);
        return back();
    }

    public function repeat(Request $request, $id)
    {
        $this->repeatPush($id);
        return back();
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
