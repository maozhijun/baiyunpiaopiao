<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QieEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {

        } elseif (env('APP_NAME') == 'aikq') {
            $this->channels[] = '老铁扣波666##10061563##3c4068b47d194772';
        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('to', 'Qie')->where('status', '>=', 1)->get();
        return view('manager.push.qie', ['ets' => $ets, 'channels' => $this->channels]);
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

                    $fontsize = $request->input('fontsize', 20);
                    $watermark = $request->input('watermark', '');
                    $location = $request->input('location', 'top');
                    $has_logo = $request->input('logo');
                    $referer = $request->input('referer', '');
                    $header1 = $request->input('header1', '');
                    $header2 = $request->input('header2', '');
                    $header3 = $request->input('header3', '');
                    $size = $request->input('size', 'md');
                    $exec = $this->generateFfmpegCmd($input, $rtmp_url, $watermark, $fontsize, $location, $has_logo, $size, $referer, $header1, $header2, $header3);
                    Log::info($exec);
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

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://www.zhangyu.tv/home/mychannel');
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_COOKIE, 'u=1705905; p=1b083f34a16446c373e1e755fc7f1065;');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $rtmp_url = 'rtmp://upload.rtmp.kukuplay.com/live/' . explode('"', explode('直播码', $response)[1])[3];
        dump($rtmp_url);
        return '';
    }
}
