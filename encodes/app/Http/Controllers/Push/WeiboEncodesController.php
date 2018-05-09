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
            $this->channels[] = '微博直播1##1744208ff0af62c076caf3c505d856dd?auth_key=1526384916-0-0-7d03575231bca6d29ee01460ad89d88d';
            $this->channels[] = '微博直播2##222c77a1b8049d1320f184912c31dd4c?auth_key=1526385178-0-0-d7e62b7c3a2f04bc060028f6e561cfa0';
            $this->channels[] = '微博直播3##c6e9437031ab0ab4e5090049e73f0f84?auth_key=1526385235-0-0-fced4b4768568313c19a57c047a907c2';
            $this->channels[] = '微博直播4##2fbda75ae2ca90f326db219c6ed1535a?auth_key=1526387159-0-0-712fce6f1f390f390f821f4b0d6289d7';
            $this->channels[] = '微博直播5##f997793ad46e8034905fffe2c6770740?auth_key=1526387215-0-0-765cf0ee459ecf67c7f69a774a555620';
            $this->channels[] = '微博直播6##53d7ab742e892424cf7c0c03f10e0ae4?auth_key=1526387307-0-0-6fbe289f40e8d6afd0d6ce8b609eea2e';
            $this->channels[] = '微博直播7##e77210b3574eaa472fed6e51892f0fc3?auth_key=1526387363-0-0-3185a664578e85af8b09ce016c4dee3f';
            $this->channels[] = '微博直播8##e33b544d6e732ef10187f4330d521910?auth_key=1526387397-0-0-95eac0241b99a88b3919e6b2f0fe2a57';
        } elseif (env('APP_NAME') == 'aikq1') {
            $this->channels[] = '微博直播1##4c39ab679371a91fe0285cdf59f2d2fa?auth_key=1526024325-0-0-e659a27523bd14d7bbc9a091e16fea8a';
            $this->channels[] = '微博直播2##6d58e8c7a9f0d68b9cbe5dec0dbfae1a?auth_key=1526024363-0-0-2e0d14515724c87ea10ada54632b6920';
            $this->channels[] = '微博直播3##d7774ebfe68a6c16e2771e2841f8b087?auth_key=1526024398-0-0-132f655873c8c98f9fda14c1a6a4841e';
            $this->channels[] = '微博直播4##1783deb2a6b2bfcc2cac2f374fac05b4?auth_key=1526024426-0-0-3a308c8b1f3c457fb90b2106a4e1d583';
            $this->channels[] = '微博直播5##c1d01193d082bb7717f3864139a75f3e?auth_key=1526024480-0-0-fd8269e070554b5551b6dfc518e8c715';
            $this->channels[] = '微博直播6##51092da99c791c83305566f16beef9a4?auth_key=1526024626-0-0-d9427a07cbe75b9c7291d53a4353ac96';
            $this->channels[] = '微博直播7##3010acdc38eaa25f5e054b526d98ae95?auth_key=1526024826-0-0-b240ab2dd28455f0d8a5fa9d254211c5';
            $this->channels[] = '微博直播8##5cea5fd25289c858443e0f55e88b935a?auth_key=1526024862-0-0-99f6ad38824fcf2c9c54875be429f0fa';
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
        $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Weibo')->where('created_at', '>', date_create('-3 hour'))->whereIn('status', [1, 2, -1])->get();
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

//            $channel = $request->input('channel');
            $channel = $request->input('channel');
            $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Weibo')->where('created_at', '>', date_create('-3 hour'))->whereIn('status', [1, 2, -1])->inRandomOrder()->get();
            if ($ets->contains('channel', $channel)) {
                foreach ($this->channels as $ch) {
                    if (!$ets->contains('channel', $ch)) {
                        $channel = $ch;
                    }
                }
            }
            if (empty($channel)) {
                return back()->with(['error' => '没有可用的直播间咯']);
            }
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
            if (!empty($pid) && is_numeric($pid) && $pid > 0) {
                $et = new EncodeTask();
                $et->name = $name;
                $et->channel = $channel;
                $et->input = $input;
                $et->rtmp = $rtmp_url;
                $et->exec = $exec;
                $et->pid = $pid;
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
