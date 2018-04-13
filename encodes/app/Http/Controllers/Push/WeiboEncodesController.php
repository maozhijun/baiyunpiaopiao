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
            $this->channels[] = '微博直播1##b848d9b3ede2fc12df68510646266a65?auth_key=1523878343-0-0-6f0d40f1ac2b95a255786e1ff85a0633';
            $this->channels[] = '微博直播2##2d03f93105438d6ecb077aa7fadbe23b?auth_key=1523878397-0-0-a299fb2ad2f6d71935ae504f8fabd0a5';
            $this->channels[] = '微博直播3##9ed5a0ee53b217561a27070ee1a85a89?auth_key=1523878137-0-0-d9321d3c25853f933b7a41a4cd3c9e4c';
            $this->channels[] = '微博直播4##707110e94198d75143284f0130fa1b88?auth_key=1523878434-0-0-6550363ea9c3a462de63518ac7f4607a';
            $this->channels[] = '微博直播5##06c5bea6ae185f01bd782e71658d87c9?auth_key=1523878469-0-0-bbab050e8cc82577a38f6dc733a0cf00';
            $this->channels[] = '微博直播6##d70d2c6971daac49b928b6645341def6?auth_key=1523878518-0-0-3dda89a4105c84433e58522bbbd12b4e';
            $this->channels[] = '微博直播7##32d417179229aee654e98fdd58667da1?auth_key=1523878598-0-0-cfc8c33190b3c995370cd1526ca264f2';
            $this->channels[] = '微博直播8##f213d7bbe605ddb0f825820b109c8724?auth_key=1523878639-0-0-fbd7b7ed1dc713711a0eb178ade37630';
            $this->channels[] = '微博直播9##8b835518db37e2bf453966139ac97eab?auth_key=1523878674-0-0-e82e52a8b3cbb03756464f3f5ea2aef5';
        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('to', 'Weibo')->where('status', '>=', 1)->get();
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
                $et->out = $live_rtmp_url . "\n" . $live_m3u8_url;
                $et->from = 'Weibo';
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
