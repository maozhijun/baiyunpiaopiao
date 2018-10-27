<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AliRandomController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {

        } elseif (env('APP_NAME') == 'aikq') {

        } elseif (env('APP_NAME') == 'aikq1') {

        } elseif (env('APP_NAME') == 'leqiuba') {

        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'AliRandom')->where('created_at', '>', date_create('-24 hour'))->whereIn('status', [1, 2, -1])->get();
        return view('manager.push.alirandom', ['ets' => $ets]);
    }

    public function created(Request $request)
    {
        if ($request->isMethod('post')
            && $request->has('input')
            && $request->has('name')
            && $request->has('stream')
        ) {
            $streamUrl = $request->input("stream");
            $tempUrl = "";
            if (starts_with($streamUrl, "http://")
                || starts_with($streamUrl, "https://")
                || starts_with($streamUrl, "rtmp://")) {
                $tempUrl = str_replace("http://", "", $streamUrl);
                $tempUrl = str_replace("https://", "", $tempUrl);
                $tempUrl = str_replace("rtmp://", "", $tempUrl);
            }
            if (strlen($tempUrl) <= 0) return;

            list($host, $app, $other) = explode("/", $tempUrl);

            $name = str_replace(' ', '-', $request->input('name'));
            $input = $request->input('input');

            $index = random_int(pow(10, 7), pow(10, 8) - 1);
            $key = "live$index";

            $rtmp_url = "rtmp://video-center.alivecdn.com/$app/$key?vhost=$host";//获取rtmp地址
            $live_flv_url = "http://$host/$app/$key.flv";//flv地址
            $live_rtmp_url = "rtmp://$host/$app/$key";//rtmp地址
            $live_m3u8_url = "http://$host/$app/$key.m3u8";//m3u8地址

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
                $et->channel = "alirandom##$index";
                $et->input = $input;
                $et->rtmp = $rtmp_url;
                $et->exec = $exec;
                $et->pid = $pid;
                $et->out = $live_flv_url . "\n" . $live_rtmp_url . "\n" . $live_m3u8_url;
                $et->from = env('APP_NAME');
                $et->to = 'AliRandom';
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
