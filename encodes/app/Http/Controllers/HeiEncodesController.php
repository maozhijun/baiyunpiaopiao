<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;

class HeiEncodesController extends BaseController
{
    private $ali_rtmp = "rtmp://video-center.alivecdn.com";
    private $alicdns = [
        'hei-1' => '/lives/hei-1',
        'hei-2' => '/lives/hei-2',
        'hei-3' => '/lives/hei-3',
        'hei-4' => '/lives/hei-4',
        'hei-5' => '/lives/hei-5',
        'hei-6' => '/lives/hei-6',
        'hei-7' => '/lives/hei-7',
        'hei-8' => '/lives/hei-8',
    ];

    public function __construct()
    {
        $this->middleware('filter')->except(['createdAliRoom']);
        $this->ali_host = env('ALI_CDN_HOST', '');
        $this->ali_key = env('ALI_CDN_KEY', '');
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', 'QQ')->where('to', 'HEITU')->where('status', 1)->get();
        $user = session(AuthController::K_LOGIN_SESSION_KEY);
        if ($user['role'] == 'admin') {
            return view('manager.hei', ['ets' => $ets, 'alicdns' => $this->alicdns]);
        } else {
            return view('manager.hei', ['ets' => $ets, 'alicdns' => []]);
        }
    }

    public function created(Request $request)
    {
        if ($request->isMethod('post')
            && $request->has('input')
            && $request->has('channel')
            && $request->has('name')
        ) {
            $name = str_replace(' ', '-', $request->input('name'));
            $user_agent = '-user_agent "Mozilla / 5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit / 537.36 (KHTML, like Gecko) Chrome / 63.0.3239.84 Safari / 537.36"';
            $referer = '-headers "Referer:http://sports.qq.com/kbsweb/game.htm?mid=100000:1471287"';
            $header = '-headers "X-Requested-With:ShockwaveFlash/28.0.0.126"';
            $encodes = "-vcodec h264_nvenc -acodec aac";
            $input = $request->input('input');
            $watermark = $request->input('watermark');
//            $vf = '-vf "format=yuv444p,drawbox=color=black:x=iw-180:y=20:width=170:height=30:t=fill,drawbox=y=ih/PHI:color=black@0.4:enable=lt(mod(t\,30)\,10):width=iw:height=48:t=fill,drawtext=fontfile=/root/Fangsong.ttf:text=\'' . $watermark . '\':fontcolor=white:fontsize=24:x=(w-tw)/2:y=(h/PHI)+12:enable=lt(mod(t\,30)\,10),format=yuv420p"';
            $location = $request->input('location', 'top');
            if ($location == 'top') {
                $vf = '-vf "scale=800:480,format=pix_fmts=yuv420p,drawbox=color=black:x=iw-188:y=23:width=170:height=30:t=fill,drawbox=y=0:color=black@0.4:width=iw:height=48:t=fill,drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $watermark . '\':fontcolor=white:fontsize=24:x=(w-tw)/2:y=12"';
            } elseif ($location = 'bottom') {
                $vf = '-vf "scale=800:480,format=pix_fmts=yuv420p,drawbox=color=black:x=iw-188:y=23:width=170:height=30:t=fill,drawbox=y=(ih-48):color=black@0.4:width=iw:height=48:t=fill,drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $watermark . '\':fontcolor=white:fontsize=24:x=(w-tw)/2:y=(h-36)"';
            } else {
                $vf = '-vf "scale=800:480,format=pix_fmts=yuv420p,drawbox=color=black:x=iw-188:y=23:width=170:height=30:t=fill,drawbox=y=0:color=black@0.4:width=iw:height=48:t=fill,drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $watermark . '\':fontcolor=white:fontsize=24:x=(w-tw)/2:y=12"';
            }

            $channel = $request->input('channel');
            list($type, $value) = explode('##', $channel);
            $rtmp = "";
            $output = "";
            if ($type == '阿里云') {
                $timestamp = time() + 10800;
                $sstring = $this->alicdns[$value] . "-$timestamp-0-0-" . $this->ali_key;
                $auth_key = "$timestamp-0-0-" . md5($sstring);
                $rtmp = $this->ali_rtmp . $this->alicdns[$value] . '?vhost=' . $this->ali_host . '&auth_key=' . $auth_key;
                $sstring = $this->alicdns[$value] . ".m3u8-$timestamp-0-0-" . $this->ali_key;
                $auth_key = "$timestamp-0-0-" . md5($sstring);
//                $output = "http://" . $this->ali_host . $this->alicdns[$value] . ".m3u8?auth_key=" . $auth_key;
                $output = "http://" . $this->ali_host . $this->alicdns[$value] . ".m3u8?auth_key=" . $auth_key;
            } elseif ($type == 'GG') {
//                $rtmp = $this->gg_rtmp . $this->ggcdns[$value];
//                $output = "https://goodgame.ru/player?" . explode('?', $this->ggcdns[$value])[0];
            }
            $date = date('Y-m-d');
            $exec = "nohup /usr/bin/ffmpeg -re $user_agent $referer $header -c:v h264_cuvid -i \"$input\" $encodes $vf -b:v:0 1200k -pixel_format yuv420p -s 800x480 -f flv  \"$rtmp\" > /tmp/ffmpeg-hei-$date-$channel.log &";
//            dump($exec);
//            dump($output);
            shell_exec($exec);
            $pid = exec('pgrep -f "' . explode('?', $rtmp)[0] . '"');
//            dump($pid);
            if (!empty($pid)) {
                $et = new EncodeTask();
                $et->name = $name;
                $et->channel = $channel;
                $et->input = $input;
                $et->rtmp = $rtmp;
                $et->out = $output;
                $et->from = 'QQ';
                $et->to = 'HEITU';
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

    public function createdAliRoom(Request $request)
    {
        $timestamp = time() + 10800;
        $sstring = $this->alicdns['hei-3'] . "-$timestamp-0-0-" . $this->ali_key;
        $auth_key = "$timestamp-0-0-" . md5($sstring);
        $rtmp = $this->ali_rtmp . $this->alicdns['hei-3'] . '?vhost=' . $this->ali_host . '&auth_key=' . $auth_key;
        $sstring = $this->alicdns['hei-3'] . ".m3u8-$timestamp-0-0-" . $this->ali_key;
        $auth_key = "$timestamp-0-0-" . md5($sstring);
        $output = "http://" . $this->ali_host . $this->alicdns['hei-3'] . ".m3u8?auth_key=" . $auth_key;
        echo $rtmp . '<br>' . $output;
    }
}
