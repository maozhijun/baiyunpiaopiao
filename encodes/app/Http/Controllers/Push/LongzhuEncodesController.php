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
            $this->channels[] = '17053909336##3f4472f27974c8fb36fdf4db189e494b98c9b8a73d3a23bb35990d357a4a8c44414b68616aa639ec46f6dc719d6f591642bf6cadf4d3918e';
            $this->channels[] = '17121075951##b26db27b727ed633f841dae7cf51ec6135b54eb39abf72b9c8f0e8d23a4151471aaad1ae103e245025e6ffa130e618162ea4c140548fd045';
            $this->channels[] = '17121073783##aeb411ed6c388ef2f1bb8f43880c69683e1e4d23540e06dc47181357dd9a1a5e07e5b59e4213593cbf39f58d91d716b77220e2ab65266a79';
            $this->channels[] = '17172859893##2d0f3f8dabf8f95b49f1ae9646419ab6a8136edf15b1a38a40630f59601c98f9d5170c13cf925f9279586b99e293f9dc1c42e0422fec1367';
            $this->channels[] = '17177260092##88323bf2b921839a2020a45fbbf6eb8e0d52f261656448fa0eec6d5298d0ac2d1a0abe86973c46e59be6a1e8a375a8f7dc1a503be62dab69';
            $this->channels[] = '17177260082##dd7d0ffb816ca86362c7d869e7161989e3c279a4b31e722f7aa0ec5cb0bdc6a24bebdb7cf3dada9a06b91dd00679632ef86e4ce3bfbdcb5c';
            $this->channels[] = '17121073721##5603bb4007d0c0dd00c1c70a03220f4f13bfe3595bf11c3cea703ea4bed441209355b17bfcb561e078e89f493507f7dceb1efa4ff4fd12fc';
            $this->channels[] = '17053903117##5f9f94756f28cb05dcc6d478ab41bf2b051bd1dca9e060da8cd093d11b106cb01837b89c42e2cd3363c70c2cf5cbb20ee1c6abf0b61b9eef';//未开包
        } elseif (env('APP_NAME') == 'aikq1') {
            $this->channels[] = '17172850051##632b880368e10d7e482fe6bd5393609a73ee8c47fe0766ed2de143f12a35d5f53ad98c03d5bfa27a72667f933d5d27fea44b6c0bd537854d';//未开包
            $this->channels[] = '17172850057##c43839c1c8191a6a6d041fb531ddb5800a032296fd8cdef802bda48724d111e8b8eb26436bef41dd31d2a2597237f177bf7b25de9408d8da';//未开包
            $this->channels[] = '17177260095##df58b2fca6fa2dca89aff9f5f6ca60c0140fbfd610422011cc974f04ebc0240c8b9d958aac7b11a07b0b4e022998dcb55304dc9fb4fd1292';//未开包
            $this->channels[] = '17177260086##49487a7d4a3bb1ad36b7fdb00c3ec2c7870906e59b799f283b97cbf32c089fd40d788f8989483f7bf6ae03d54115b0d4fb6fe020a8ef7dab';//未开包
            $this->channels[] = '17139230362##da29927e480ebdd68a3e67a2d6d02cd82bac7a75b2fb77e5594129673cdb16728b703370b2ec575d26cbc5ac50c85d92e4e244d9fc503aac';//未开包
            $this->channels[] = '17151290942##589ada982cab2a8b10c09e1733ec67bc2c020eeb175979d0d8b1136c52a51db1cec200855d9f675ed767cfd4c15c9392bed3cbf0f8e5aaf3';//未开包
            $this->channels[] = '17165142105##76eb7bf7c8d722b6ede5554f543ef8203a3fcb3a086904b55af2d2d8c9a0eaf3376576a1ec020f6a9d298d50fef1f424a20e88c80fe779ee';//未开包
            $this->channels[] = '17177160082##8d9c77462fc912374a2f9d4965562b69912ebd6ff2658fc5f73f5f8dc8966a4ab620403cdf3d3fcd7be005c2f74ddde0bf36e83bdc5076ae';//未开包
        } elseif (env('APP_NAME') == 'leqiuba') {
            $this->channels[] = '17160980733##6bcd216d1ebb3357f8665c43e3e38ae2838aa313b489c18418a792bb70c520c886cd9a62ab792c84d1e05b2bceb146577d95ca21323f933f';
            $this->channels[] = '17082248663##01ca7ce667b9d5c185893e28c9301c9a4ec9b48dcdcfe2654fec78aa661b36ee05d333471dc7059328545688f1986b6be2c9f4d45544b7d1';
            $this->channels[] = '17177306341##6622001455a64f411da9571a652791f54edebd74b632eb871144bbe06062463f73ef41115d77349612875bccef2e84fd8d5f9d483aabafa4';
            $this->channels[] = '17046169471##72bd71fe2fb3074be8021505dd1b68dc568f2df297e6b368d75cb646026000bcd72112a8778f51661018696af95c23dea0b6434c5ff998d4';
            $this->channels[] = '17046165504##c6f14ba4fa174426a27afc687f69945a3e1667213b3b969d6fe60ce70ad8fc81285ed4c7ee678ec1f0f1aef33462504ecf3642df1f2c96e8';
            $this->channels[] = '17071111418##aa12974ccbf698ba703e011547cd6e0c5dd1fa1ff989e4de73329be7e3e1874b30f52edc94618e2908278460bb628037cea11745190a4e12';
            $this->channels[] = '17071111887##c47ac9debe9c3d21be95eac3e1836d31d1a19487038d2a7a5b10060f75e905fa070a980c6de932544128f677f865cf1209385715b0429e4b';
            $this->channels[] = '17071111558##c8ec7567bb888f77ba427773624ef80ae316f008b73dc832dd2fc4502d4e25dc622b8913a60c07fe260f5b42065acba362407be9adfc0691';
//            $this->channels[] = '17071111596##';
//            $this->channels[] = '17120593903##';
        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Longzhu')->where('status', '>=', 1)->get();
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
            $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Longzhu')->where('status', '>=', 1)->inRandomOrder()->get();
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
