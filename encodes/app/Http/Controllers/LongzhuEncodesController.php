<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;

class LongzhuEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {

        } elseif (env('APP_NAME') == 'aikq') {
            $this->channels[] = '老铁扣波666##d5426c54d0e05f72779b6deb8ac786c7625b26848edd89a38b40674048863f349cd8fe6588aa47d0bdbf9c8c7f9d13b165775a7f7671c893';
            $this->channels[] = '17053909336##b549ea62aeed49629c366ddad87184a87a596abbf93f85ba60f61738a39204f68cf7254bcb936c6b579d05a4bb091dd44eb9f14bb0b82fb9';
            $this->channels[] = '17053904825##c4753865f18d1f43c3cdf90b1389f8ca09ce99a65cf3cdd118e3333f6f2509b61f757c7e09b01fe7b0204517e2a73ff8b24993520bb67c35';
            $this->channels[] = '17121075951##cab81477be823772f0a238f07a4a1bf167e550823f16c4e0ed7d45bc2c803dd20bb50395073f13ad28e6bfb1d3c07960f3c344d07519a995';
            $this->channels[] = '17121073783##d8a0e48a72400e3f7f3362e563800ddeb9cb8ae0a956411e80d5a2dda1124ae3a3c4d2c840d3cc5fed70be41f5d03318afae7a6a8c8c19fa';
            $this->channels[] = '17172859893##0502b197c9f355535d3cfc790cbee1b5cbf58c32106ec74c911095a4d09b903b3f08ac26f750b2317ecd0bdea61c65921f9353cfe99e245c';
            $this->channels[] = '17177260092##56335925bb2d19f933810415c92ab37b28bd669d0859cef15cf28039eb98c3abfa93c7346cee0c80821d363673608e0bc69be98ae43cd825';
            $this->channels[] = '17177260082##5fc97c48e734ff8eb36a14e55af63cfe367deb720797d377f13e9873422df0e1e1b98cee2eb7520e353496dcc940db7f3d78ec51246414bb';
        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', 'Longzhu')->where('to', 'Longzhu')->where('status', '>=', 1)->get();
        return view('manager.longzhu', ['ets' => $ets, 'channels' => $this->channels]);
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
                    $live_url .= "\n\n" . $url['securityUrl'];
                } elseif ($url['ext'] == 'm3u8') {
                    $live_url .= "\n\n" . $url['securityUrl'];
                }
            }

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
                    $vf = '-vf "scale=800:480,format=pix_fmts=yuv420p,drawbox=color=black:x=iw-188:y=23:width=170:height=30:t=fill,drawbox=y=0:color=black@0.4:width=iw:height=48:t=fill,drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $watermark . '\':fontcolor=white:fontsize=24:x=(w-tw)/2:y=12"';
                } elseif ($location = 'bottom') {
                    $vf = '-vf "scale=800:480,format=pix_fmts=yuv420p,drawbox=color=black:x=iw-188:y=23:width=170:height=30:t=fill,drawbox=y=(ih-48):color=black@0.4:width=iw:height=48:t=fill,drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $watermark . '\':fontcolor=white:fontsize=24:x=(w-tw)/2:y=(h-36)"';
                } else {
                    $vf = '-vf "scale=800:480,format=pix_fmts=yuv420p,drawbox=color=black:x=iw-188:y=23:width=170:height=30:t=fill,drawbox=y=0:color=black@0.4:width=iw:height=48:t=fill,drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $watermark . '\':fontcolor=white:fontsize=24:x=(w-tw)/2:y=12"';
                }
                $execs[] = $vf;
            }

            $execs[] = '-b:v:0 1200k -pixel_format yuv420p -s 800x480 -f flv "' . $rtmp_url . '"';

            $date = date('YmdHis');
            $execs[] = "> /tmp/ffmpeg-longzhu-$date.log &";
            $exec = join($execs, ' ');
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
