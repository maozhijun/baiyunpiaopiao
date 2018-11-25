<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class KukuEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
//        if (env('APP_NAME') == 'good') {
//
//        } elseif (env('APP_NAME') == 'aikq') {
//            $this->channels[] = '酷酷直播1##12163331_12163331';
//            $this->channels[] = '酷酷直播2##12163332_12163332';
//            $this->channels[] = '酷酷直播3##12163333_12163333';
//            $this->channels[] = '酷酷直播4##12163334_12163334';
//            $this->channels[] = '酷酷直播5##12163335_12163335';
//            $this->channels[] = '酷酷直播6##12163336_12163336';
//            $this->channels[] = '酷酷直播7##12163337_12163337';
//            $this->channels[] = '酷酷直播8##12163338_12163338';
//            $this->channels[] = '酷酷直播9##12163339_12163339';
//        } elseif (env('APP_NAME') == 'aikq1') {
//            $this->channels[] = '酷酷直播1##12166331_12166331';
//            $this->channels[] = '酷酷直播2##12166332_12166332';
//            $this->channels[] = '酷酷直播3##12166333_12166333';
//            $this->channels[] = '酷酷直播4##12166334_12166334';
//            $this->channels[] = '酷酷直播5##12166335_12166335';
//            $this->channels[] = '酷酷直播6##12166336_12166336';
//            $this->channels[] = '酷酷直播7##12166337_12166337';
//            $this->channels[] = '酷酷直播8##12166338_12166338';
//            $this->channels[] = '酷酷直播9##12166339_12166339';
//        } elseif (env('APP_NAME') == 'leqiuba') {
//            $this->channels[] = '酷酷直播1##11163331_11163331';
//            $this->channels[] = '酷酷直播2##11163332_11163332';
//            $this->channels[] = '酷酷直播3##11163333_11163333';
//            $this->channels[] = '酷酷直播4##11163334_11163334';
//            $this->channels[] = '酷酷直播5##11163335_11163335';
//            $this->channels[] = '酷酷直播6##11163336_11163336';
//            $this->channels[] = '酷酷直播7##11163337_11163337';
//            $this->channels[] = '酷酷直播8##11163338_11163338';
//            $this->channels[] = '酷酷直播9##11163339_11163339';
//        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Kuku')->where('created_at', '>', date_create('-48 hour'))->whereIn('status', [1, 2, -1])->get();
        return view('manager.push.kuku', ['ets' => $ets, 'channels' => $this->channels]);
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
            $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Kuku')->where('created_at', '>', date_create('-48 hour'))->whereIn('status', [1, 2, -1])->inRandomOrder()->get();
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
            $rtmp_url = 'rtmp://rtmp.zhubo123.com/kuxing/' . $roomId;//获取rtmp地址
            $live_rtmp_url = 'rtmp://rtmplive.zhubo123.com/kuxing/' . $roomId;//播放rtmp地址
            $live_m3u8_url = 'http://hlslive.zhubo123.com/kuxing/' . $roomId . '.m3u8';//播放m3u8地址

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
                $et->to = 'Kuku';
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
