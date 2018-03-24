<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;

class QieEncodesController extends BaseController
{
    private $channels = [
        '老铁扣波666##10061563##3c4068b47d194772',
    ];

    public function __construct()
    {
        $this->middleware('filter')->except([]);
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', 'Qie')->where('to', 'Qie')->where('status', '>=', 1)->get();
        return view('manager.qie', ['ets' => $ets, 'channels' => $this->channels]);
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
            list($roomName, $roomId, $token) = explode('##', $channel);
            $rtmp_json = $this->getRtmp($token);//获取rtmp地址
            if (isset($rtmp_json['fms_val']) && isset($rtmp_json['list'])) {
                $fms_val = $rtmp_json['fms_val'];
                $rtmp_id = array_first(array_keys($rtmp_json['list']));
                $rtmp_url = array_first(array_values($rtmp_json['list']));
                if ($this->startLive($token, $fms_val, $rtmp_id)) {//开播成功
                    $flvUrl = $this->getFlv($roomId);
                    $m3u8Url = $this->getM3u8($roomId);
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
                    $execs[] = "> /tmp/ffmpeg-other-$date.log &";
                    $exec = join($execs, ' ');
                    shell_exec($exec);
                    $pid = exec('pgrep -f "' . explode('?', $rtmp_url)[0] . '"');
                    if (!empty($pid)) {
                        $et = new EncodeTask();
                        $et->name = $name;
                        $et->channel = $channel;
                        $et->input = $input;
                        $et->rtmp = $rtmp_url;
                        $et->out = $flvUrl . "\n" . $m3u8Url;
                        $et->from = 'Qie';
                        $et->to = 'Qie';
                        $et->status = 1;
                        $et->save();
                    }
                }
            } else {
                $this->closeLive($token);
                return response(json_encode($rtmp_json));
            }
        }
        return back();
    }

    public function stop(Request $request, $id)
    {
        $et = EncodeTask::query()->find($id);
        if (isset($et)) {
            $token = array_last(explode('##', $et->channel));
            $this->closeLive($token);

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

    public function stopQie(Request $request, $id)
    {
        $et = EncodeTask::query()->find($id);
        if (isset($et)) {
            $token = array_last(explode('##', $et->channel));
            if ($this->closeLive($token)) {
                $et->status = 2;
                $et->save();
            }
        }
        return back();
    }

    private function getRtmp($token)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.qiecdn.com/api/v1/get_rtmplist');
        curl_setopt($ch, CURLOPT_POST, true);
        $data = array('aid' => 'dytoolm2', 'client_sys' => 'ios', 'token' => $token);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_COOKIE, 'language=zh-cn;');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "QEZB/4.4.0 (iPhone; iOS 11.2.6; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json) && isset($json['error']) && $json['error'] == 0) {
            return $json['data'];
        } else {
            return null;
        }
    }

    private function startLive($token, $fms_val, $rtmp_id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.qiecdn.com/api/v1/startLive');
        curl_setopt($ch, CURLOPT_POST, true);
        $data = array(
            'aid' => 'dytoolm2',
            'client_sys' => 'ios',
            'token' => $token,
            'fms_val' => $fms_val,
            'rtmp_id' => $rtmp_id,
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_COOKIE, 'language=zh-cn;');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "QEZB/4.4.0 (iPhone; iOS 11.2.6; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json) && isset($json['error']) && $json['error'] == 0) {
            return true;
        } else {
            return false;
        }
    }

    private function closeLive($token)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.qiecdn.com/api/v1/closeLive');
        curl_setopt($ch, CURLOPT_POST, true);
        $data = array(
            'code' => 1,
            'token' => $token,
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_COOKIE, 'language=zh-cn;');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "QEZB/4.4.0 (iPhone; iOS 11.2.6; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json) && isset($json['error']) && $json['error'] == 0) {
            return true;
        } else {
            return false;
        }
    }

    private function getFlv($roomId)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.qiecdn.com/app_api/app_room/get_rtmp/' . $roomId);
//        curl_setopt($ch, CURLOPT_URL, 'https://api.qiecdn.com/api/v1/room/'.$roomId);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "QEZB/4.4.0 (iPhone; iOS 11.2.6; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json) && isset($json['error']) && $json['error'] == 0) {
            return $json['data']['rtmp_url'] . '/' . $json['data']['rtmp_live'];
        } else {
            return '';
        }
    }

    private function getM3u8($roomId)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://m.live.qq.com/' . $roomId);
//        curl_setopt($ch, CURLOPT_URL, 'https://api.qiecdn.com/api/v1/room/'.$roomId);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "QEZB/4.4.0 (iPhone; iOS 11.2.6; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        list($temp, $m3u8Url) = explode('"hls_url":"', $response);
        if (starts_with($m3u8Url, 'http')) {
            list($m3u8Url) = explode('"', $m3u8Url);
            return $m3u8Url;
        }
        return '';
    }

    public function test()
    {
        list($roomName, $roomId, $token) = explode('##', '老铁扣波666##10061563##3c4068b47d194772');
        $rtmp_json = $this->getRtmp($token);
        $fms_val = $rtmp_json['fms_val'];
        $rtmp_id = array_first(array_keys($rtmp_json['list']));
        $rtmp_url = array_first(array_values($rtmp_json['list']));
        if ($this->startLive($token, $fms_val, $rtmp_id)) {//开播成功
            $flvUrl = $this->getFlv($roomId);
            $m3u8Url = $this->getM3u8($roomId);
            dump($rtmp_url);
            dump($flvUrl);
            dump($m3u8Url);
        }
    }
}
