<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;

class ZhiboEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {
            $this->channels[] = '中国直播0##s_773580';
            $this->channels[] = '中国直播1##s_773581';
            $this->channels[] = '中国直播2##s_773582';
            $this->channels[] = '中国直播3##s_773583';
            $this->channels[] = '中国直播4##s_773584';
            $this->channels[] = '中国直播5##s_773585';
            $this->channels[] = '中国直播6##s_773586';
            $this->channels[] = '中国直播7##s_773587';
            $this->channels[] = '中国直播8##s_773588';
            $this->channels[] = '中国直播9##s_773589';
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
        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', 'Zhibo')->where('to', 'Zhibo')->where('status', '>=', 1)->get();
        return view('manager.zhibo', ['ets' => $ets, 'channels' => $this->channels]);
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
            $live_rtmp_url = 'rtmp://zhibo.tv/8live/' . $roomId;//播放rtmp地址
            $live_m3u8_url = 'http://hls.live.zhibo.tv/8live/' . $roomId . '/index.m3u8';//播放m3u8地址
            $execs = ['nohup /usr/bin/ffmpeg -re'];
            if (starts_with($input, 'http')) {
                $execs[] = '-user_agent "Mozilla / 5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit / 537.36 (KHTML, like Gecko) Chrome / 63.0.3239.84 Safari / 537.36"';
                if (!empty($request->input('referer'))) {
                    $execs[] = '-headers "Referer:' . $request->input('referer') . '"';
                }
                if (!empty($request->input('header1'))) {
                    $execs[] = '-headers "' . $request->input('header1') . '"';
                }
                if (!empty($request->input('header2'))) {
                    $execs[] = '-headers "' . $request->input('header2') . '"';
                }
                if (!empty($request->input('header3'))) {
                    $execs[] = '-headers "' . $request->input('header3') . '"';
                }
            }
            $execs[] = '-c:v h264_cuvid -i "' . $input . '"';
            $execs[] = '-vcodec h264_nvenc -acodec aac';

            if ($request->has('watermark')) {
                $watermark = $request->input('watermark');
                $location = $request->input('location', 'top');
                if ($location == 'top') {
                    $vf = '-vf "format=yuv444p,drawbox=color=black:x=iw-188:y=23:width=170:height=30:t=fill,drawbox=y=0:color=black@0.4:width=iw:height=48:t=fill,drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $watermark . '\':fontcolor=white:fontsize=24:x=(w-tw)/2:y=12,format=yuv420p"';
                } elseif ($location = 'bottom') {
                    $vf = '-vf "format=yuv444p,drawbox=color=black:x=iw-188:y=23:width=170:height=30:t=fill,drawbox=y=(ih-48):color=black@0.4:width=iw:height=48:t=fill,drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $watermark . '\':fontcolor=white:fontsize=24:x=(w-tw)/2:y=(h-36),format=yuv420p"';
                } else {
                    $vf = '-vf "format=yuv444p,drawbox=color=black:x=iw-188:y=23:width=170:height=30:t=fill,drawbox=y=0:color=black@0.4:width=iw:height=48:t=fill,drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $watermark . '\':fontcolor=white:fontsize=24:x=(w-tw)/2:y=12,format=yuv420p"';
                }
                $execs[] = $vf;
                //logo遮拦
                //,drawbox=color=black:x=iw-188:y=23:width=170:height=30:t=fill
            }

            $execs[] = '-f flv "' . $rtmp_url . '"';
            $date = date('YmdHis');
            $execs[] = "> /tmp/ffmpeg-zhibo-$date.log &";
            $exec = join($execs, ' ');
            shell_exec($exec);
            $pid = exec('pgrep -f "' . explode('?', $rtmp_url)[0] . '"');
            if (!empty($pid)) {
                $et = new EncodeTask();
                $et->name = $name;
                $et->channel = $channel;
                $et->input = $input;
                $et->rtmp = $rtmp_url;
                $et->out = $live_rtmp_url . "\n\n" . $live_m3u8_url;
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
