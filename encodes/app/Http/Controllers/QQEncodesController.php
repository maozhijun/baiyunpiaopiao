<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;

class QQEncodesController extends BaseController
{
    private $ali_host = "hls.cdn.vcgood.net";
    private $ali_key = "6dUCKVycRs";
    private $ali_rtmp = "rtmp://video-center.alivecdn.com";
    private $gg_rtmp = "rtmp://msk.goodgame.ru:1940/live/";
    private $alicdns = [
        '10000' => '/lives/10000',
        '10001' => '/lives/10001',
        '10002' => '/lives/10002',
        '10003' => '/lives/10003',
        '10004' => '/lives/10004',
    ];
    private $ggcdns = [
        'kanqiuma' => '139524?pwd=f27e5c8111feefc9',
        'lg310' => '139523?pwd=6bdd6e706bceafa7',
        'footballlive' => '139525?pwd=9fc7768b9ac7358b',
        'lgzhibo' => '139526?pwd=1b83cab1d5881746'
    ];

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('status', 1)->get();

        return view('manager.qq', ['ets' => $ets, 'alicdns' => $this->alicdns, 'ggcdns' => $this->ggcdns]);
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
            $vf = '-vf "format=yuv444p,drawbox=color=black:x=iw-188:y=23:width=170:height=30:t=fill,drawbox=y=0:color=black@0.4:width=iw:height=48:t=fill,drawtext=fontfile=/root/Fangsong.ttf:text=\'' . $watermark . '\':fontcolor=white:fontsize=24:x=(w-tw)/2:y=12,format=yuv420p"';
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
                $output = "http://" . $this->ali_host . $this->alicdns[$value] . ".m3u8?auth_key=" . $auth_key;
            } elseif ($type == 'GG') {
                $rtmp = $this->gg_rtmp . $this->ggcdns[$value];
                $output = "https://goodgame.ru/player?" . explode('?', $this->ggcdns[$value])[0];
            }
            $date = date('Y-m-d');
            exec("mkdir -p /tmp/ffmpeg/$date/");
            $exec = "nohup /usr/bin/ffmpeg -re $user_agent $referer $header -i \"$input\" $encodes $vf -f flv  \"$rtmp\" > /tmp/ffmpeg/$date/$channel.log &";
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
