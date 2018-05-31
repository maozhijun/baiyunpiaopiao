<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QXiuEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {

        } elseif (env('APP_NAME') == 'aikq') {
            $this->channels[] = '齐齐直播1##1525761';
            $this->channels[] = '齐齐直播2##1525762';
            $this->channels[] = '齐齐直播3##1525763';
            $this->channels[] = '齐齐直播4##1525764';
            $this->channels[] = '齐齐直播5##1525765';
            $this->channels[] = '齐齐直播6##1525766';
            $this->channels[] = '齐齐直播7##1525767';
            $this->channels[] = '齐齐直播8##1525768';
        } elseif (env('APP_NAME') == 'aikq1') {
            $this->channels[] = '齐齐直播1##1525921';
            $this->channels[] = '齐齐直播2##1525922';
            $this->channels[] = '齐齐直播3##1525923';
            $this->channels[] = '齐齐直播4##1525924';
            $this->channels[] = '齐齐直播5##1525925';
            $this->channels[] = '齐齐直播6##1525926';
            $this->channels[] = '齐齐直播7##1525927';
            $this->channels[] = '齐齐直播8##1525928';
        } elseif (env('APP_NAME') == 'leqiuba') {
            $this->channels[] = '齐齐直播1##1525911';
            $this->channels[] = '齐齐直播2##1525912';
            $this->channels[] = '齐齐直播3##1525913';
            $this->channels[] = '齐齐直播4##1525914';
        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'QXiu')->where('created_at', '>', date_create('-24 hour'))->whereIn('status', [1, 2, -1])->get();
        return view('manager.push.qxiu', ['ets' => $ets, 'channels' => $this->channels]);
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
            $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'QXiu')->where('created_at', '>', date_create('-24 hour'))->whereIn('status', [1, 2, -1])->inRandomOrder()->get();
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
            $rtmp_url = 'rtmp://up.rtmp.qxiu.com/live/' . $roomId;//获取rtmp地址
            $live_flv_url = 'http://down.hdl.qxiu.com/live/' . explode('?', $roomId)[0] . '.flv';//flv地址
            $live_rtmp_url = 'rtmp://down.rtmp.qxiu.com/live/' . explode('?', $roomId)[0];//rtmp地址
            $live_m3u8_url = 'http://down.hls.qxiu.com/live/' . explode('?', $roomId)[0] . '/index.m3u8';//m3u8地址

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
                $et->out = $live_flv_url . "\n" . $live_rtmp_url . "\n" . $live_m3u8_url;
                $et->from = env('APP_NAME');
                $et->to = 'QXiu';
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
