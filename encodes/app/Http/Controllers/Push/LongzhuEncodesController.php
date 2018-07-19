<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\LongzhuStream;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LongzhuEncodesController extends BaseController
{
    use LongzhuStream;

    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {

        } elseif (env('APP_NAME') == 'aikq') {
//            $this->channels[] = '老铁扣波666##223c97b99cb3f4e1e1ca2fea94dbe89787cdec0dff3ea23877552ff965317750ee0760d805edecc0b03fce3ace1e15cbaa1b56423a64fe41';
//            $this->channels[] = '17053904825##';//禁言
//            $this->channels[] = '17053909336##';//停封
//            $this->channels[] = '17121075951##97258d8b4e59cf780333855ec74967ef973c67a24bdd7b06c556bd3b2540b50c39ea047a2bf367f63b464c34cf1dfe59ae5a4287e19bf0c5';
//            $this->channels[] = '17121073783##6d1104079267f9b3ea56291e0e0e20c8a24b7a89039d9afcf22b347415debd8ac296ede0b30c40d9d8ac2b80c6e89fb98a56093b51d89433';
//            $this->channels[] = '17172859893##3111be7af8254e46c06610ad3b00f0b364f69ea929d03ccbc646017fe8da062180da8b982a11420fe093c1f1b219f7089bc195c1616f737d';
//            $this->channels[] = '17177260092##054f292ca07b1167fb2a9275d5e23b74e1638cb0d64ebebfc3d485f5fa5ee83f471ea1ddef07909862008a033e311dc67f650d07226db9d1';
//            $this->channels[] = '17177260082##6c16f9e308e708ffbddec21bf46844038da6eabddcb4f1e95adafd98a87592c9072ee1d03c5b400962411b33824a402fe67132b56f7b8992';
//            $this->channels[] = '17121073721##b6e58ff1d47c632b3896a05b005f4ac56f2fdd8ba1da02d2a57e21f020d81dd7134a549875c5c13cbf9e8e107563efb06443353c463d15cf';

            $this->channels[] = 'longzhu12?aba9bd53152c4bb4945f11ae16ad5911';
            $this->channels[] = 'longzhu12?aba9bd53152c4bb4945f11ae16ad5922';
            $this->channels[] = 'longzhu12?aba9bd53152c4bb4945f11ae16ad5933';
            $this->channels[] = 'longzhu12?aba9bd53152c4bb4945f11ae16ad5944';
            $this->channels[] = 'longzhu12?aba9bd53152c4bb4945f11ae16ad5955';
            $this->channels[] = 'longzhu12?aba9bd53152c4bb4945f11ae16ad5966';

//            $this->channels[] = '17053903117##';//停封
        } elseif (env('APP_NAME') == 'aikq1') {
//            $this->channels[] = '17172850051##';
//            $this->channels[] = '17172850057##';
//            $this->channels[] = '17177260095##';
//            $this->channels[] = '17177260086##';
//            $this->channels[] = '17139230362##';
//            $this->channels[] = '17151290942##';
//            $this->channels[] = '17165142105##';
//            $this->channels[] = '17177160082##';

            $this->channels[] = 'longzhu12?aba9bd53152c4bb4945f11ae16ad5511';
            $this->channels[] = 'longzhu12?aba9bd53152c4bb4945f11ae16ad5522';
            $this->channels[] = 'longzhu12?aba9bd53152c4bb4945f11ae16ad5533';
            $this->channels[] = 'longzhu12?aba9bd53152c4bb4945f11ae16ad5544';
            $this->channels[] = 'longzhu12?aba9bd53152c4bb4945f11ae16ad5555';
            $this->channels[] = 'longzhu12?aba9bd53152c4bb4945f11ae16ad5566';

        } elseif (env('APP_NAME') == 'leqiuba') {
//            $this->channels[] = '17160980733##';//待确认
//            $this->channels[] = '17082248663##';//封
            $this->channels[] = '17177306341##';
//            $this->channels[] = '17046169471##';//待确认
            $this->channels[] = '17046165504##';
            $this->channels[] = '17071111418##';
            $this->channels[] = '17071111887##';
            $this->channels[] = '17071111558##';
            $this->channels[] = '17071111596##';
//            $this->channels[] = '17120593903##';//封
            $this->channels[] = '13408482084##';
            $this->channels[] = '18482344138##';
        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Longzhu')->where('created_at', '>', date_create('-24 hour'))->whereIn('status', [1, 2, -1])->get();
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
            $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Longzhu')->where('created_at', '>', date_create('-24 hour'))->whereIn('status', [1, 2, -1])->inRandomOrder()->get();
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

            list($roomName, $token) = explode('?', $channel);
//            list($roomName, $token) = explode('##', $channel);
            $rtmp_url = '';
            $live_lines = '';
            if ($roomName == 'longzhu12') {
                $rtmp_url = 'rtmp://push12.plures.net/lzlive/' . $token;
                $live_lines .= 'http://hdl1201.plures.net/lzlive/' . $token . '.flv';
                $live_lines .= "\n" . 'http://hdl1202.plures.net/lzlive/' . $token . '.m3u8';
                $live_lines .= "\n" . 'rtmp://hdl1203.plures.net/lzlive/' . $token;
                $roomName = $channel;
            } else {
                $this->closeLongZhuLive($token);
                $rtmp_json = $this->startLongZhuLive($token);//开始直播
                $upStreamLines = $this->getLongZhuUpStreamUrl($token);//获取rtmp地址
//                dump($upStreamLines);
                foreach ($upStreamLines as $upStreamLine) {
//                if (empty($rtmp_url) && $upStreamLine['supplier'] == 18) {
//                    $rtmp_url = $upStreamLine['upStreamUrl'];
//                    list($rtmp_push_url) = explode('?', $rtmp_url);
//                    $urls = explode('/', $rtmp_push_url);
//                    $stream_name = array_pop($urls);
//                    $live_lines .= 'http://hdl1801.plures.net/onlive/' . $stream_name . '.flv';
//                    $live_lines .= "\n" . 'http://hdl1802.plures.net/onlive/' . $stream_name . '.m3u8';
//                    $live_lines .= "\n" . 'rtmp://hdl1803.plures.net/onlive/' . $stream_name;
//                }
                    if (empty($rtmp_url) && $upStreamLine['supplier'] == 9) {
                        $rtmp_url = $upStreamLine['upStreamUrl'];
                        list($rtmp_push_url) = explode('?', $rtmp_url);
                        $urls = explode('/', $rtmp_push_url);
                        $stream_name = array_pop($urls);
                        $live_lines .= 'http://hdl0901.plures.net/onlive/' . $stream_name . '.flv';
                        $live_lines .= "\n" . 'http://hdl0902.plures.net/onlive/' . $stream_name . '/playlist.m3u8';
                        $live_lines .= "\n" . 'rtmp://hdl0903.plures.net/onlive/' . $stream_name;
                    }
                }
//            $rtmp_json = $this->startLive($token);//获取rtmp地址
//            $rtmp_url = $rtmp_json['upStreamUrl'];
//            $roomId = $rtmp_json['roomId'];
//
//            $urls = $this->getLiveUrl($roomId);
//            $live_url = '';
//            foreach ($urls as $url) {
//                if ($url['ext'] == 'flv') {
//                    $live_url .= $url['securityUrl'];
//                } elseif ($url['ext'] == 'rtmp') {
//                    $live_url .= "\n" . $url['securityUrl'];
//                } elseif ($url['ext'] == 'm3u8') {
//                    $live_url .= "\n" . $url['securityUrl'];
//                }
//            }

            }

            if (!empty($rtmp_url)) {
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
                    $et->channel = $roomName;
                    $et->input = $input;
                    $et->rtmp = $rtmp_url;
                    $et->out = $live_lines;
                    $et->exec = $exec;
                    $et->pid = $pid;
                    $et->from = env('APP_NAME');
                    $et->to = 'Longzhu';
                    $et->status = 1;
                    $et->save();
                }
                if ($roomName != 'longzhu12') {
                    sleep(2);
                    $this->closeLongZhuLive($token);
                }
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
//        $urls = $this->getLiveUrl(2295037);
//        $live_url = '';
//        foreach ($urls as $url) {
//            if ($url['ext'] == 'flv') {
//                $live_url .= $url['securityUrl'];
//            } elseif ($url['ext'] == 'rtmp') {
//                $live_url .= "\n\n" . $url['securityUrl'];
//            } elseif ($url['ext'] == 'm3u8') {
//                $live_url .= "\n\n" . $url['securityUrl'];
//            }
//        }
//        dump($live_url);
//        $this->closeLive('d5426c54d0e05f72779b6deb8ac786c7625b26848edd89a38b40674048863f349cd8fe6588aa47d0bdbf9c8c7f9d13b165775a7f7671c893');

        $dst_url = 'http://hdl.9158.com/live/22227c7e7efe9eafd6957da277b27a6d.flv';
// create a new cURL resource
        $ch = curl_init();
// set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $dst_url);
// This changes the request method to HEAD
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2); // connect timeout
        curl_setopt($ch, CURLOPT_TIMEOUT, 2); // curl timeout
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // curl timeout
// grab URL and pass it to the browser
        if (FALSE === curl_exec($ch)) {
            echo('open ' . $dst_url . ' failed' . "\n");
        } else {
            // Fetch the HTTP-code (cred: @GZipp)
            $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            echo('HTTP return code=' . $retcode . "\n");
        }
// close cURL resource, and free up system resources
        curl_close($ch);

    }
}
