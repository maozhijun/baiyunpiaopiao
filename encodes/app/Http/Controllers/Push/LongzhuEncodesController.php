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
            $this->channels[] = '17177260082##7a2dac005a337af39b5dfd6ff5d306b6a83f905cc3ef13ef108af4fe8572863caa2f2cb62f7aace22322684f21727865dd9e60886409b465';
            $this->channels[] = '17121073721##7e3d993e9ff8099b3133b52d6f8d461b14a54b593d7f6c0cd8dda031c79c22e89c72abc60f962fe8d403e91a37245c90626accbdd42c162e';
//            $this->channels[] = '17053903117##a45e71d11080f5b061ccd8421ddbb393c68c2a9f51f919dcf37028926989bfe2300788313f1b11632539da843341c957996c70e242f5952c';//未开包
        } elseif (env('APP_NAME') == 'aikq1') {
            $this->channels[] = '17172850051##8387d763363fa5a873b608f18567e8a0d30045f570c361a8343a5be1ac8ad0dd4e002c8fff43121a1e7ee7c969a0bb14cf02047b5134fcc3';//未开包
            $this->channels[] = '17172850057##056bdde1c8d1fb7d46d801c85e2afd619fd3278efac21d6f1de153c00e21f08792ff2cac52d2f90cdee352d864903484d797b5d26fb6039f';//未开包
            $this->channels[] = '17177260095##f2aebab1104e17b29f8176c539366454ca5c31ae34975265f3bfafde64c0ac9099db5600928a6955ed2923ec5569d2f598583e6dd2f76d70';//未开包
            $this->channels[] = '17177260086##6556704feaaea41bd18020e8421a5b9319a7d84ce62b14217d35f789966e0e3c3e4de62cbdfa8ef2ff89490773803566b6cf37a7772b45a5';//未开包
            $this->channels[] = '17139230362##da29927e480ebdd68a3e67a2d6d02cd82bac7a75b2fb77e5594129673cdb16728b703370b2ec575d26cbc5ac50c85d92e4e244d9fc503aac';//未开包
            $this->channels[] = '17151290942##862286b485c30cf9dd87ff06b9d62a96f28fece293f91f39ead40e3f7a26256eb478c2ca21afdf00453e3a74bc1bc130d140e513f1cbcd91';//未开包
            $this->channels[] = '17165142105##2f7c09340b4dca2dd36895bad9f798007ca848f394724b1a8545b940485327ae19494c68be954bdd16a973041931883d5e737f9225a94bf5';//未开包
            $this->channels[] = '17177160082##8d9c77462fc912374a2f9d4965562b69912ebd6ff2658fc5f73f5f8dc8966a4ab620403cdf3d3fcd7be005c2f74ddde0bf36e83bdc5076ae';//未开包
        } elseif (env('APP_NAME') == 'leqiuba') {
            $this->channels[] = '17160980733##a91ab51a50ce08d1936c863529846dcbb5c0be90212f1eafa08c594bace3170c87702b900232abb8f38e8609c105cc262c1e783f85a90bc3';
//            $this->channels[] = '17082248663##';
            $this->channels[] = '17177306341##6874ae707391b0e72d2c407a3009de845bab28b9f8fa9ede90ccbfc3a178e0bfbd05dfbe387e3a669f699fe95511fa64460220b3bdb99599';
            $this->channels[] = '17046169471##8fd617c2f94ce3b3968f00a7095d602631b8b537c7ccc52ee9adc77ba6682f338b82f4d50fc6897dee687614e66f5faaec6e437cef894f09';
            $this->channels[] = '17046165504##c59d5c6509f7568c63007634e4eb93bee0e98c448bb10defab95ca19d7ac09813dfd7aa3245969f9ece34555de35e783ef6cdbaea4d0928f';
            $this->channels[] = '17071111418##e3091cb1fd82b026f72235ed48581a8b7f109ad6058519ae70ccb02640eadb37e65f3e5f9570e052cef3eb94e2a79ddd6e05e270e0fdd5aa';
            $this->channels[] = '17071111887##ab1ce0c74c86c6e4861d5f16aacecdd6e808df5c7c7a014978ba02ce11ee72716bcdbf8597a18587d6c37bf61028cd669f8d5833951e1d0f';
            $this->channels[] = '17071111558##5b35c4b75cc69b068481f2ba0d53aeb6a9c9a2d15f3b774a724e3e6245bd8799204320ca8ab27fd10bb4eebe1eae8011c448eeb8f70496df';
            $this->channels[] = '17071111596##149ba57711bda2f98aabe4525e9af999b6f8b35262e5fbb9f3b9e4fc2ac2ccc9237db5fe2def4e044e8e143ab1d6e16971840f8b25317393';
//            $this->channels[] = '17120593903##';
        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Longzhu')->where('created_at', '>', date_create('-3 hour'))->whereIn('status', [1, 2, -1])->get();
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
            $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Longzhu')->where('created_at', '>', date_create('-3 hour'))->whereIn('status', [1, 2, -1])->inRandomOrder()->get();
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
