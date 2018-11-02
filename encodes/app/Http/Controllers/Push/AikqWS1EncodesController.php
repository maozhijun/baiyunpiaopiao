<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Api\Channels\AikqWS1;
use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AikqWS1EncodesController extends BaseController
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
        $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'AikqWS')->where('created_at', '>', date_create('-24 hour'))->whereIn('status', [1, 2, -1])->get();
        return view('manager.push.aikqws1', ['ets' => $ets]);
    }

    public function created(Request $request)
    {
        if ($request->isMethod('post')
            && $request->has('input')
            && $request->has('name')
        ) {

            $t20 = strtotime(date("Y-m-d 17:00:00"));
            $t23 = strtotime(date("Y-m-d 23:30:00"));
            $t = time();
            if ($t > $t20 && $t < $t23) {
                return response('<h1 style="padding-top: 100px;width: 100%;text-align: center;">兄dei，现在是晚高峰，不要用网宿，记住哟！</h1>');
            }

            $name = str_replace(' ', '-', $request->input('name'));
            $input = $request->input('input');

            $aikqWs = new AikqWS1(99999);

            $rtmp_url = $aikqWs->pushURL() . '/' . $aikqWs->pushKey();//获取rtmp地址
            $live_flv_url = $aikqWs->playFLV();//flv地址
            $live_rtmp_url = $aikqWs->playRTMP();//rtmp地址
            $live_m3u8_url = $aikqWs->playM3U8();//m3u8地址

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
                $et->channel = 'aikqws##99999';
                $et->input = $input;
                $et->rtmp = $rtmp_url;
                $et->exec = $exec;
                $et->pid = $pid;
                $et->out = $live_flv_url . "\n" . $live_rtmp_url . "\n" . $live_m3u8_url;
                $et->from = env('APP_NAME');
                $et->to = 'AikqWS';
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
