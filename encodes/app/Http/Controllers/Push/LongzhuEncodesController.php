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
//            $this->channels[] = '老铁扣波666##223c97b99cb3f4e1e1ca2fea94dbe89787cdec0dff3ea23877552ff965317750ee0760d805edecc0b03fce3ace1e15cbaa1b56423a64fe41';
//            $this->channels[] = '17053904825##';//禁言
//            $this->channels[] = '17053909336##';//停封
            $this->channels[] = '17121075951##b26db27b727ed633f841dae7cf51ec6135b54eb39abf72b9c8f0e8d23a4151471aaad1ae103e245025e6ffa130e618162ea4c140548fd045';
            $this->channels[] = '17121073783##aeb411ed6c388ef2f1bb8f43880c69683e1e4d23540e06dc47181357dd9a1a5e07e5b59e4213593cbf39f58d91d716b77220e2ab65266a79';
            $this->channels[] = '17172859893##2d0f3f8dabf8f95b49f1ae9646419ab6a8136edf15b1a38a40630f59601c98f9d5170c13cf925f9279586b99e293f9dc1c42e0422fec1367';
            $this->channels[] = '17177260092##88323bf2b921839a2020a45fbbf6eb8e0d52f261656448fa0eec6d5298d0ac2d1a0abe86973c46e59be6a1e8a375a8f7dc1a503be62dab69';
            $this->channels[] = '17177260082##dc77c81c559188121252c04219dc528d30d6e7a19b1a8ab24e55b63d0cb0675a679b9fc821b88e5b72af80129d44df1f74fb6a2d3e6f9fdf';
            $this->channels[] = '17121073721##8174a8cb73c8c22a1381077308578bbd46f75f0cc9eac6b17737cf5b40535b30b2e25a79b26b428aa3214d68f87ad2af8744669c9542fabb';
//            $this->channels[] = '17053903117##';//停封
        } elseif (env('APP_NAME') == 'aikq1') {
            $this->channels[] = '17172850051##9d76d26ae6f9dd0ff1742ccc14e2635fc810ad00d07dce88c943608d9ef038a463e19ae45c63d297c02229952ccc1b37694a6f3c1062dce0';
            $this->channels[] = '17172850057##3ad8adc3021768d11d033300ee4ed631093a80f518e94a341db25792a45e4f393cebae77924e91f4e6264dce0104fbdd7b0438ba0e1ae3c5';
            $this->channels[] = '17177260095##b0aa4442d0ccbe1376bc3356fc513f42d9dfa926fd15788666295fee93cb560e14130a319b44d2c5bb6b51d6a822df8bd46fdc08539496a5';
            $this->channels[] = '17177260086##11a0eeda50618c319203f833704a3a78e2dfbe937170da1fefe0fb0d52975a62c202d7ed14d23d9029907a474a0fea6fd86c3adc50d634a1';
            $this->channels[] = '17139230362##da29927e480ebdd68a3e67a2d6d02cd82bac7a75b2fb77e5594129673cdb16728b703370b2ec575d26cbc5ac50c85d92e4e244d9fc503aac';
            $this->channels[] = '17151290942##c51bac79f8fa90e5f05e15099c04b77d5e94be548b25ebd1ea79fce10f7c4f79534e8fac98b34f3337a175c081cce16107aed50ac97166e2';
            $this->channels[] = '17165142105##c011b58436ac77fdedd2da4285fbed90bf2597bc0175e20afc19e5483525506d1bcb8c6fd4313c2e4b3704e33eeacdee6118ef9733c9d02e';
            $this->channels[] = '17177160082##8d9c77462fc912374a2f9d4965562b69912ebd6ff2658fc5f73f5f8dc8966a4ab620403cdf3d3fcd7be005c2f74ddde0bf36e83bdc5076ae';
        } elseif (env('APP_NAME') == 'leqiuba') {
//            $this->channels[] = '17160980733##';//待确认
//            $this->channels[] = '17082248663##';//封
            $this->channels[] = '17177306341##c9dbe41e3e176c25374435d1ce61a0a731349423cc95c7a335c90cf32a9b7ae04f6b5f67c368f37ee068741ca9a74dd78fd7dee65b62c06a';
//            $this->channels[] = '17046169471##';//待确认
            $this->channels[] = '17046165504##73b501dc5cd8ee7c2b714bb53aedfdae587b86e9a2e3a17e41cb28d7c1581a4ba4ec74ce7b73e4f61a406c1a605e23bc29890f5bd7884298';
            $this->channels[] = '17071111418##a916f33c41efc4a3e3f9ab16ad33cbad1bb9579203288eddc4eef6d841038cb898f4aa8f7e366e16c04803bd956ffec4f823183c9f1599aa';
            $this->channels[] = '17071111887##5e17ea19873ff511760a7c9274cef1e275053d4ca5a699da14d257bf0a857b93983174daaac555672aff55c57a5f9a3084b330991e97f068';
            $this->channels[] = '17071111558##287db22f9e73da567ba58e09829b9396c43dd48aaf9bf137b29b790ea58688f8451a66ad6013c8c22aa62703cf08bbd4cd4a1d960db5a64e';
            $this->channels[] = '17071111596##d74080cc9f66edb5bcffdca4fbf3791a4bef8c488ce302a7464801e3b2666ac6ac076c74bd93f9d6fafab287a20645020b5a7dacd103f646';
//            $this->channels[] = '17120593903##';//封
            $this->channels[] = '13408482084##88fb6dc6e3ddf5cf8a02d570b8604a1675c0d2dd169aa1b1c3ddbe0939a2fdf94ed50a229fa9fd61d1546c9362e6893e6c14ba60fbb15d94';
            $this->channels[] = '18482344138##a6fb1e93bf72faf64024c0cb9debea3644b1733567219ef8cb8a7ec465efa6b71e531777ca7e369aca8488a55910f083173879894a7f34df';
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
                $et->out = $live_url;
                $et->exec = $exec;
                $et->pid = $pid;
                $et->from = env('APP_NAME');
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
