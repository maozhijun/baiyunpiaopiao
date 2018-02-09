<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;

class OtherEncodesController extends BaseController
{

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', 'Other')->where('to', 'Other')->where('status', 1)->get();
        return view('manager.other', ['ets' => $ets]);
    }

    public function created(Request $request)
    {
        if ($request->isMethod('post')
            && $request->has('input')
            && $request->has('channel')
            && $request->has('output')
            && $request->has('name')
        ) {
            $name = str_replace(' ', '-', $request->input('name'));
            $input = $request->input('input');
            $channel = $request->input('channel');
            $output = $request->input('output');

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
            $execs[] = '-i "' . $input . '"';
            $execs[] = '-vcodec h264_nvenc -acodec aac';

            if ($request->has('watermark')) {
                $watermark = $request->input('watermark');
                $vf = '-vf "format=yuv444p,drawbox=y=0:color=black@0.4:width=iw:height=48:t=fill,drawtext=fontfile=/root/Fangsong.ttf:text=\'' . $watermark . '\':fontcolor=white:fontsize=24:x=(w-tw)/2:y=12,format=yuv420p"';
                $execs[] = $vf;
                //logo遮拦
                //,drawbox=color=black:x=iw-188:y=23:width=170:height=30:t=fill
            }

            $execs[] = '-f flv "' . $channel . '"';
            $date = date('YmdHis');
            $execs[] = "> /tmp/ffmpeg/other-$date.log &";
            $exec = join($execs, ' ');
//            dump($exec);
            exec("mkdir -p /tmp/ffmpeg/");
            shell_exec($exec);
            $pid = exec('pgrep -f "' . explode('?', $channel)[0] . '"');
//            dump($pid);
            if (!empty($pid)) {
                $et = new EncodeTask();
                $et->name = $name;
                $et->channel = 'Other';
                $et->input = $input;
                $et->rtmp = $channel;
                $et->out = $output;
                $et->from = 'Other';
                $et->to = 'Other';
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

}
