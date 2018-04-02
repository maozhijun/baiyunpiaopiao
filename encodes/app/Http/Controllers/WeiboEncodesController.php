<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeiboEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {
        } elseif (env('APP_NAME') == 'aikq') {
            $this->channels[] = '微博直播3##a373bf0f54fb7af96ccdee26da2e333f?auth_key=1523248893-0-0-b43875786b3f26e420086f64ceb0079e';
            $this->channels[] = '微博直播4##bd96ebcee8163a354765023e2233c6a9?auth_key=1523248979-0-0-b7a0460075ea05ae379427b01ed4ff3b';
            $this->channels[] = '微博直播5##6e4b8cb076e781fc6441559d1f240df8?auth_key=1523249016-0-0-d5de2d7330d2d50cd7e1f3826722c409';
            $this->channels[] = '微博直播6##0caf46e2a0a49f4dd88e0eb49673ccf5?auth_key=1523249067-0-0-f57da90f1f1c667c35f8214fc1180d15';
            $this->channels[] = '微博直播7##69f18fd96b68724ddbb6f92dd8e09c17?auth_key=1523249108-0-0-97166bc840f48f883fd4fe32e68fb5fc';
            $this->channels[] = '微博直播8##93cc150f6a8061e0bc5320bd816246a6?auth_key=1523249151-0-0-4c48d1706472bb60735d272b77e3cc04';
            $this->channels[] = '微博直播9##9246a027a69d9d987b2bbadb6168bd10?auth_key=1523249190-0-0-bebd62a82416fa42971a36c0aa5c10ba';
//            $this->channels[] = '微博直播1##0b22872125a654d6f377a57aaa985f62?auth_key=1522836208-0-0-799c578571c2d9827df425ddbffaf82c';
//            $this->channels[] = '微博直播2##e48c8c66077fb1e584c9277d697d4df5?auth_key=1522858370-0-0-a49051ecce80e4ddfaf3911c499a80e7';
        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('to', 'Weibo')->where('status', '>=', 1)->get();
        return view('manager.weibo', ['ets' => $ets, 'channels' => $this->channels]);
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
            $rtmp_url = 'rtmp://ps.live.weibo.com/alicdn/' . $roomId;//获取rtmp地址
            $live_rtmp_url = 'rtmp://pl.live.weibo.com/alicdn/' . explode('?', $roomId)[0] . '_wb720';//播放rtmp地址
            $live_m3u8_url = 'https://pl.live.weibo.com/alicdn/' . explode('?', $roomId)[0] . '_wb720.m3u8';//播放m3u8地址

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
                $et->from = 'Weibo';
                $et->to = 'Weibo';
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
