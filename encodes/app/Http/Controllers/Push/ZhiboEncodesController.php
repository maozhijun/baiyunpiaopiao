<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ZhiboEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {
//            $this->channels[] = '中国直播0##s_773580';
//            $this->channels[] = '中国直播1##s_773581';
//            $this->channels[] = '中国直播2##s_773582';
//            $this->channels[] = '中国直播3##s_773583';
//            $this->channels[] = '中国直播4##s_773584';
//            $this->channels[] = '中国直播5##s_773585';
//            $this->channels[] = '中国直播6##s_773586';
//            $this->channels[] = '中国直播7##s_773587';
//            $this->channels[] = '中国直播8##s_773588';
//            $this->channels[] = '中国直播9##s_773589';
        } elseif (env('APP_NAME') == 'aikq') {
            $this->channels[] = '中国直播0##s_873580';
            $this->channels[] = '中国直播1##s_873581';
            $this->channels[] = '中国直播2##s_873582';
            $this->channels[] = '中国直播3##s_873583';
            $this->channels[] = '中国直播4##s_873584';
            $this->channels[] = '中国直播5##s_873585';
            $this->channels[] = '中国直播6##s_873586';
            $this->channels[] = '中国直播7##s_873587';
            $this->channels[] = '中国直播8##s_873588';
            $this->channels[] = '中国直播9##s_873589';
        } elseif (env('APP_NAME') == 'leqiuba') {
            $this->channels[] = '中国直播0##s_673580';
            $this->channels[] = '中国直播1##s_673581';
            $this->channels[] = '中国直播2##s_673582';
            $this->channels[] = '中国直播3##s_673583';
            $this->channels[] = '中国直播4##s_673584';
            $this->channels[] = '中国直播5##s_673585';
            $this->channels[] = '中国直播6##s_673586';
            $this->channels[] = '中国直播7##s_673587';
            $this->channels[] = '中国直播8##s_673588';
            $this->channels[] = '中国直播9##s_673589';
        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('to', 'Zhibo')->where('status', '>=', 1)->get();
        return view('manager.push.zhibo', ['ets' => $ets, 'channels' => $this->channels]);
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
            $rtmp_url = 'rtmp://stream.bo8.tv/8live/' . $roomId;//获取rtmp地址
            $live_rtmp_url = 'rtmp://live.zhibo.tv/8live/' . $roomId;//播放rtmp地址
            $live_m3u8_url = 'http://hls.live.zhibo.tv/8live/' . $roomId . '/index.m3u8';//播放m3u8地址

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
            if (!empty($pid)) {
                $et = new EncodeTask();
                $et->name = $name;
                $et->channel = $channel;
                $et->input = $input;
                $et->rtmp = $rtmp_url;
                $et->out = $live_rtmp_url . "\n" . $live_m3u8_url;
                $et->from = 'Zhibo';
                $et->to = 'Zhibo';
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
