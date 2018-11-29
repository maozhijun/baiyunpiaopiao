<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InkeEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {

        } elseif (env('APP_NAME') == 'aikq') {
            $this->channels[] = '映客直播1##1541070384696312?sign=364c99d464fbf258MjAwLWlzdHJlYW0uaW5rZS5jbi0xMDQwOTk0MTQ=&ver=2&uid=&ikAppState=0&ikBeauty=1&dd_type=0';
            $this->channels[] = '映客直播2##1541062343234801?sign=364c99d464fbf258MjAwLWlzdHJlYW0uaW5rZS5jbi0xMDQwOTk0MTQ=&ver=2&uid=&ikAppState=0&ikBeauty=1&dd_type=0';
            $this->channels[] = '映客直播3##1541150626753977?sign=364c99d464fbf258MjAwLWlzdHJlYW0uaW5rZS5jbi0xMDQwOTk0MTQ=&ver=2&uid=&ikAppState=0&ikBeauty=1&dd_type=0';
            $this->channels[] = '映客直播4##1541150645385007?sign=364c99d464fbf258MjAwLWlzdHJlYW0uaW5rZS5jbi0xMDQwOTk0MTQ=&ver=2&uid=&ikAppState=0&ikBeauty=1&dd_type=0';
            $this->channels[] = '映客直播5##1541150655903875?sign=364c99d464fbf258MjAwLWlzdHJlYW0uaW5rZS5jbi0xMDQwOTk0MTQ=&ver=2&uid=&ikAppState=0&ikBeauty=1&dd_type=0';
            $this->channels[] = '映客直播6##1541150668253001?sign=364c99d464fbf258MjAwLWlzdHJlYW0uaW5rZS5jbi0xMDQwOTk0MTQ=&ver=2&uid=&ikAppState=0&ikBeauty=1&dd_type=0';
            $this->channels[] = '映客直播7##1541150681525306?sign=364c99d464fbf258MjAwLWlzdHJlYW0uaW5rZS5jbi0xMDQwOTk0MTQ=&ver=2&uid=&ikAppState=0&ikBeauty=1&dd_type=0';
            $this->channels[] = '映客直播8##1541150691699506?sign=364c99d464fbf258MjAwLWlzdHJlYW0uaW5rZS5jbi0xMDQwOTk0MTQ=&ver=2&uid=&ikAppState=0&ikBeauty=1&dd_type=0';
        } elseif (env('APP_NAME') == 'aikq1') {
//            $this->channels[] = '映客直播1##1541070384696312rtmp://pl.live.weibo.com/alicdn/f035e0c4cfcc49d0e7d86e9a4f2d4fcasign=364c99d464fbf258MjAwLWlzdHJlYW0uaW5rZS5jbi0xMDQwOTk0MTQ=&ver=2&uid=&ikAppState=0&ikBeauty=1&dd_type=0, ';
//            $this->channels[] = '映客直播2##';
//            $this->channels[] = '映客直播3##';
//            $this->channels[] = '映客直播4##';
//            $this->channels[] = '映客直播5##';
//            $this->channels[] = '映客直播6##';
//            $this->channels[] = '映客直播7##';
//            $this->channels[] = '映客直播8##';
        } elseif (env('APP_NAME') == 'leqiuba') {
        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Inke')->where('created_at', '>', date_create('-48 hour'))->whereIn('status', [1, 2, -1])->get();
        return view('manager.push.inke', ['ets' => $ets, 'channels' => $this->channels]);
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
            $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Inke')->where('created_at', '>', date_create('-48 hour'))->whereIn('status', [1, 2, -1])->inRandomOrder()->get();
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
            $rtmp_url = 'rtmp://istream.inke.cn/live/' . $roomId;//获取rtmp地址
            $live_flv_url = 'http://wssource.pull.inke.cn/live/' . explode('?', $roomId)[0] . '.flv';//flv地址
            $live_rtmp_url = 'rtmp://wssource.pull.inke.cn/live/' . explode('?', $roomId)[0];//rtmp地址
            $live_m3u8_url = 'http://wssource.hls.inke.cn/live/' . explode('?', $roomId)[0] . '/playlist.m3u8';//m3u8地址

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
                $et->to = 'Inke';
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
