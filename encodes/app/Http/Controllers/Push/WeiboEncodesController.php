<?php

namespace App\Http\Controllers\Push;

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
            $this->channels[] = '微博直播1##cb4200bd9e741b6a9aa2867113964b65?auth_key=1525140281-0-0-e158d94ccf356544bfc762de1fe2781f';
            $this->channels[] = '微博直播2##1f35e14ad95eaa162c2cf1dfe23e4af2?auth_key=1525140396-0-0-7d7288ad0f1439ab0c45952a29bcce72';
            $this->channels[] = '微博直播3##081723d42cf99fcfa88bd9372ddef20b?auth_key=1525140434-0-0-cb3cbf2ea77982ee870a1a825452696c';
            $this->channels[] = '微博直播4##33782e1aac65e5b1613d83b1bbc6cce7?auth_key=1525140468-0-0-6ee3b78d339c0aecf49e3e9abb211ab7';
            $this->channels[] = '微博直播5##6dc55a448b10a7beccb41c29cfc582a5?auth_key=1525140502-0-0-06d6958bd9d55b47edae07bf7f4e2ba9';
            $this->channels[] = '微博直播6##63490e1095b8485769e6aa6e53ae2733?auth_key=1525140538-0-0-620fedc34f36fee41e3ae231d13d7370';
//            $this->channels[] = '微博直播7##';
//            $this->channels[] = '微博直播8##';
//            $this->channels[] = '微博直播9##';
        } elseif (env('APP_NAME') == 'leqiuba') {
            $this->channels[] = '微博直播1##c919b926ff7562f37c67257eff58c434?auth_key=1524545325-0-0-dc68dce56ba4136d4fdf7cdbfd9b86ea';
            $this->channels[] = '微博直播2##088b5b8df70cdcddbda9e532f78f1543?auth_key=1524545381-0-0-e95f5fb4866b332c11f733e760074a10';
            $this->channels[] = '微博直播3##a09ef424038947e012bfe76bcd972fc0?auth_key=1524545401-0-0-d543f804d93f4417476a250846d143a8';
            $this->channels[] = '微博直播4##e8aa03be8a6fdfc60ec917c0780b9804?auth_key=1524545419-0-0-b1e823c23563a932c934d1f351b5cf27';
            $this->channels[] = '微博直播5##80497a4b57aa1ba070db8a7f7e157de2?auth_key=1524545435-0-0-c184c310ea7bdd296339bda81afec66d';
            $this->channels[] = '微博直播6##1963ec187be7a238d735866c5f9f829c?auth_key=1524545454-0-0-ebfd9d9fe5a68b7cabca41254d2b8df0';
            $this->channels[] = '微博直播7##91c127d720b3c4e640305208760d4cd8?auth_key=1524545472-0-0-2a2440b1654234d58c6c8ad8eed4a153';
            $this->channels[] = '微博直播8##41b12f0028bdccba21c14e02505c4461?auth_key=1524545487-0-0-7b6e35d4e03822bbec82a300f92a98a9';
            $this->channels[] = '微博直播9##a741d1aaa68e2472cc0549f64e0a2f74?auth_key=1524545510-0-0-e2acb2a2903c2539c6c6d30298258bbf';
            $this->channels[] = '微博直播10##2ad18f433e08d160a4cef41b9ac1f5e8?auth_key=1524545528-0-0-71f8f09c773befbb00f1bf5d1476d6dc';
        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Weibo')->where('status', '>=', 1)->get();
        return view('manager.push.weibo', ['ets' => $ets, 'channels' => $this->channels]);
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
                $et->from = env('APP_NAME');
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
