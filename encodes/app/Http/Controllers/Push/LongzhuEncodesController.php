<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LongzhuEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {

        } elseif (env('APP_NAME') == 'aikq') {
            $this->channels[] = '老铁扣波666##b38380a747d9bc78da41a9858437055bfb47c75a5e6d67990159a7903a445deb0bcd1261d0aaccb0fc18ea1ba9e486570ab62b68daaf4586';
            $this->channels[] = '17053909336##1d85d629baf54120ff0d156edb7ebaf76904dd63b0cfe882fd08a58180298f5c795879797ddc82455b68851deacaeacad0c92e6d5a2cd825';
            $this->channels[] = '17053904825##b43d50c00e46f8f8b0054058b77d8ba6a7d521069a048ad8a8aa59705e496adb9066eb3699bea38b99f62174559d0ccd232870f0cfd1b0aa';
            $this->channels[] = '17121075951##b26db27b727ed633f841dae7cf51ec6135b54eb39abf72b9c8f0e8d23a4151471aaad1ae103e245025e6ffa130e618162ea4c140548fd045';
            $this->channels[] = '17121073783##aeb411ed6c388ef2f1bb8f43880c69683e1e4d23540e06dc47181357dd9a1a5e07e5b59e4213593cbf39f58d91d716b77220e2ab65266a79';
            $this->channels[] = '17172859893##2d0f3f8dabf8f95b49f1ae9646419ab6a8136edf15b1a38a40630f59601c98f9d5170c13cf925f9279586b99e293f9dc1c42e0422fec1367';
            $this->channels[] = '17177260092##88323bf2b921839a2020a45fbbf6eb8e0d52f261656448fa0eec6d5298d0ac2d1a0abe86973c46e59be6a1e8a375a8f7dc1a503be62dab69';
            $this->channels[] = '17177260082##dd7d0ffb816ca86362c7d869e7161989e3c279a4b31e722f7aa0ec5cb0bdc6a24bebdb7cf3dada9a06b91dd00679632ef86e4ce3bfbdcb5c';

        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('to', 'Longzhu')->where('status', '>=', 1)->get();
        return view('manager.push.longzhu', ['ets' => $ets, 'channels' => $this->channels]);
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
            list($roomName, $token) = explode('##', $channel);
            $rtmp_json = $this->startLive($token);//获取rtmp地址
            $rtmp_url = $rtmp_json['upStreamUrl'];
            $roomId = $rtmp_json['roomId'];

            $urls = $this->getLiveUrl($roomId);
            $live_url = '';
            foreach ($urls as $url) {
                if ($url['ext'] == 'flv') {
                    $live_url .= $url['securityUrl'];
                } elseif ($url['ext'] == 'rtmp') {
                    $live_url .= "\n" . $url['securityUrl'];
                } elseif ($url['ext'] == 'm3u8') {
                    $live_url .= "\n" . $url['securityUrl'];
                }
            }

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
                $et->channel = $roomName;
                $et->input = $input;
                $et->rtmp = $rtmp_url;
                $et->out = $live_url;
                $et->from = 'Longzhu';
                $et->to = 'Longzhu';
                $et->status = 1;
                $et->save();
            }
            sleep(2);
            $this->closeLive($token);
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

    private function startLive($token)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://liveapi.longzhu.com/liveapp/startlive?address=&bitrate=800&bundleId=com.longzhu.tga&device=2&fh=640&fw=360&gameId=119&latitude=&liveSourceType=1&liveStreamType=10&longitude=&model=iPhone%206S&p1uuid=&packageId=1&title=&version=4.6.5&watchDirections=portrait');
        curl_setopt($ch, CURLOPT_COOKIE, "p1u_id=$token;");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLOPT_USERAGENT, "longzhu/4.6.5 (iPhone; iOS 11.2.6; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json) && isset($json['result']) && $json['result'] == 1) {
            return $json;
        } else {
            return null;
        }
    }

    private function closeLive($token)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://liveapi.longzhu.com/liveapp/endlive?bundleId=com.longzhu.tga&device=2&liveSourceType=1&p1uuid=&packageId=1&reason=101&reasonDesp=iOS::Qiniu[2.0]::UserClosed&version=4.6.5');
        curl_setopt($ch, CURLOPT_COOKIE, "p1u_id=$token;");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLOPT_USERAGENT, "longzhu/4.6.5 (iPhone; iOS 11.2.6; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json) && isset($json['result']) && $json['result'] == 1) {
            return $json;
        } else {
            return null;
        }
    }

    private function getLiveUrl($roomId)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://livestream.longzhu.com/live/GetLivePlayUrl?appId=5001&bundleId=com.longzhu.tga&device=2&p1uuid=&packageId=1&roomId=$roomId&version=4.6.5");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLOPT_USERAGENT, "longzhu/4.6.5 (iPhone; iOS 11.2.6; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (!empty($json['playLines']) && !empty(array_first($json['playLines'])['urls'])) {
            return array_first($json['playLines'])['urls'];
        } else {
            return null;
        }
    }

    public function test()
    {
//        $this->startLive('d5426c54d0e05f72779b6deb8ac786c7625b26848edd89a38b40674048863f349cd8fe6588aa47d0bdbf9c8c7f9d13b165775a7f7671c893');
        $urls = $this->getLiveUrl(2295037);
        $live_url = '';
        foreach ($urls as $url) {
            if ($url['ext'] == 'flv') {
                $live_url .= $url['securityUrl'];
            } elseif ($url['ext'] == 'rtmp') {
                $live_url .= "\n\n" . $url['securityUrl'];
            } elseif ($url['ext'] == 'm3u8') {
                $live_url .= "\n\n" . $url['securityUrl'];
            }
        }
        dump($live_url);
        $this->closeLive('d5426c54d0e05f72779b6deb8ac786c7625b26848edd89a38b40674048863f349cd8fe6588aa47d0bdbf9c8c7f9d13b165775a7f7671c893');
    }
}
