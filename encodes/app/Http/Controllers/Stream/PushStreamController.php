<?php

namespace App\Http\Controllers\Stream;

use App\Http\Controllers\Controller as BaseController;
use App\Models\PushChannle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PushStreamController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {

        } elseif (env('APP_NAME') == 'aikq') {
//            $longzhus[] = 'long##18346395094?';
//            $longzhus[] = 'long##18249335694?';
//            $longzhus[] = 'long##18346335974?';
//            $longzhus[] = 'long##17121073689?';
//            $longzhus[] = 'long##17169085461?767103cc093871c01344898faafd56b18d207e81ae9efd7ccfa1356dc8ef528ec48325fd416c5d9e6421bdded4c2b7f29f47ba9d769ed606';
//            $longzhus[] = 'long##17121073721?063d41cd55a3f8a5c989e7cab5d0e5bc21052154850184809cfd74123667b9e84ea0c077bbcb667de84585a4e2c9410cb8ba8ddc27291f30';
//            $longzhus[] = 'long##17172850051?b4741b90affbbb195d625a79d87b3cbff5c922ba9faae1c820afc418777cb9e3c0bcad1e4329056b949acea4556a9aa0616f0e09354909dd';
//            $longzhus[] = 'long##17172850057?511ec45902a8b983e56825bbf565537131272ca3184e3329755fe5b14300b6629b9dc413ac1d3ebcb2162e254b5a820475cb5e7f8ac69031';
//            $longzhus[] = 'long##17177260095?cd5545ff9e71f2da40b22572472a90813c12451ecf4dc41ff9c2688935d9d844ec6c2ba5ea6bb8506e512406b3ff2dadd23ff33e265552a8';
//            $longzhus[] = 'long##17177260086?2914a2e92753683983bd50c2a52513eafcd1249eb427bf02501197ebf9c7297c6905566b597c4fbc6132bcf23312b0fce1d3164fb38460bf';
//            $this->channels['龙珠'] = $longzhus;

//            $xiaomis[] = 'mi##cid201804241141222051111';
//            $xiaomis[] = 'mi##cid201804241141222052222';
//            $xiaomis[] = 'mi##cid201804241141222053333';
//            $xiaomis[] = 'mi##cid201804241141222054444';
//            $this->channels['小米'] = $xiaomis;

//            $huajiaos[] = 'hua##_LC_AL1_5832731615253162591491111';
//            $huajiaos[] = 'hua##_LC_AL1_5832731615253162591492222';
//            $huajiaos[] = 'hua##_LC_AL1_5832731615253162591493333';
//            $huajiaos[] = 'hua##_LC_AL1_5832731615253162591494444';
//            $this->channels['花椒'] = $huajiaos;

            $memes[] = 'meme-ali##40290111';
            $memes[] = 'meme-ali##40290222';
            $memes[] = 'meme-ali##40290333';
            $memes[] = 'meme-ali##40290444';
            $this->channels['么么-阿里'] = $memes;

            $pcs = PushChannle::query()
                ->where(['platform' => 'changba'])
                ->where('status', 0)
                ->orderBy('updated_at', 'desc')
                ->take(20)
                ->get();
            $changbas = [];
            $i = 0;
            foreach ($pcs as $pc) {
                if ($i > 10 && $i < 15) {
                    $changbas[] = 'changba##' . $pc->id;
                }
                $i++;
            }
            $this->channels['唱吧-网速'] = $changbas;

            $pcs = PushChannle::query()
                ->where(['platform' => '9158'])
                ->where('status', 0)
                ->orderBy('updated_at', 'desc')
                ->take(20)
                ->get();
            $_9158s = [];
            $i = 0;
            foreach ($pcs as $pc) {
                if ($i > 10 && $i < 15) {
                    $_9158s[] = '9158##' . $pc->id;
                }
                $i++;
            }
            $this->channels['9158'] = $_9158s;

            $pcs = PushChannle::query()
                ->where(['platform' => 'chushou'])
                ->where('status', 0)
                ->orderBy('updated_at', 'desc')
                ->take(4)
                ->get();
            $chushous = [];
            foreach ($pcs as $pc) {
                $chushous[] = 'chushou##' . $pc->id;
            }
            $this->channels['触手'] = $chushous;

        } elseif (env('APP_NAME') == 'aikq1') {

        } elseif (env('APP_NAME') == 'leqiuba') {
            //17124574019 as1231230  龙珠登录
//            $longzhus[] = 'long##17124574019?';//封
            //13285701420 hn12021  微博登录
//            $longzhus[] = 'long##13285701420?';//待确认
            //13282093498 hn12021  微博登录
            $longzhus[] = 'long##13282093498?1fe2a951ef8edf74cdc5f61f24e32a0afaf80bb115bc9d5e57dcc8e3c27129a9b8a079afbf57662a1dae1f8e5937401301cd1d185362143d';
            //18708185105 aa123321 苏宁登录
            $longzhus[] = 'long##18708185105?ca492c5fe807e35b57a5f7c2f54e6289d12432d7df557fb43490ebbb2d3a18dc355b152e3010a696179ad35ba1ff4e0e4609eb1adf25bd71';

            //苏宁登录
            $longzhus[] = 'long##15876484156?5f495d6abc23471f2ea3b6de73b20894fbac0ed2d4eb635703c0a3ab9a6b7601965804c2aee94a9fbad4b396dc8519d60007f30fd06e77d8';
            $longzhus[] = 'long##13469134772?5a7dd07af8158ab8c839c86ad2eaf57617568d31a1545d32aa90771c02350f92d71170ea0b8c7a3afcf3c3bca4294c52e702c5be96c4bef2';
            $longzhus[] = 'long##15073409830?3b216b45113e7b9bb39bc4f14442b16cc665fca3722014727cd5d3d8a4827a269335d94143841bacb7d339df8c30a477bf4c883311786363';
            $longzhus[] = 'long##18390507364?86893f3bb80f0b13c90af3cab07c23b39eb7fab184b1aa552cb775133c9e6fa3933064ce96d80d060d07dde28fa23449ea8e28320cba75de';
            $longzhus[] = 'long##15360134281?0c1602076a890253cca95cf993e46465325ba8f89591af17b1c2821b31cc9e1b852163fa9d4a2567881ec4c09575cf56ed90447ec67c26b1';
            $this->channels['龙珠'] = $longzhus;
        }
    }

    public function index(Request $request)
    {
        $streams = PushChannle::query()->where('status', '>=', 1)->get();
        return view('manager.obs.stream', ['streams' => $streams, 'channels' => $this->channels]);
    }

    //获取流地址
    public function takeStream(Request $request)
    {
        if ($request->isMethod('post')
            && $request->has('channel')
            && $request->has('name')
        ) {
            $name = str_replace(' ', '-', $request->input('name'));

            $channel = $request->input('channel');
            $streams = PushChannle::query()->where('status', '=', 1)->get();
            if ($streams->contains('channel', $channel)) {
                foreach ($this->channels as $ch) {
                    if (!$streams->contains('channel', $ch)) {
                        $channel = $ch;
                    }
                }
            }
            if (empty($channel)) {
                return back()->with(['error' => '没有可用的直播间咯']);
            }
            list($platform, $key) = explode('##', $channel);

            $push_rtmp = '';
            $live_lines = '';
            if ($platform == 'long') {
                list($phone, $token) = explode('?', $key);
                $this->closeLongZhuLive($token);
                $rtmp_json = $this->startLongZhuLive($token);//获取rtmp地址
                $push_rtmp = $rtmp_json['upStreamUrl'];
                $roomId = $rtmp_json['roomId'];

                $urls = $this->getLongZhuLiveUrl($roomId);
                foreach ($urls as $url) {
                    if ($url['ext'] == 'flv') {
                        $live_lines .= $url['securityUrl'];
                    } elseif ($url['ext'] == 'rtmp') {
                        $live_lines .= "\n" . $url['securityUrl'];
                    } elseif ($url['ext'] == 'm3u8') {
                        $live_lines .= "\n" . $url['securityUrl'];
                    }
                }
//                $this->closeLongZhuLive($token);
            } elseif ($platform == 'mi') {
                $push_rtmp = 'rtmp://r1.zb.mi.com/live/' . $key;//获取rtmp地址
                $live_lines = 'http://v2.zb.mi.com/live/' . $key . '.flv';//flv地址
                $live_lines .= "\n" . 'http://hls.zb.mi.com/live/' . $key . '/playlist.m3u8';//m3u8地址
            } elseif ($platform == 'hua') {
                $push_rtmp = 'rtmp://ps1.live.huajiao.com/live_huajiao_v2/' . $key;//获取rtmp地址
                $live_lines = 'http://pl1.live.huajiao.com/live_huajiao_v2/' . $key . '.flv';//flv地址
                $live_lines .= "\n" . 'http://pl1-hls.live.huajiao.com/live_huajiao_v2/' . $key . '/index.m3u8';//m3u8地址
            } elseif ($platform == 'meme-ali') {
                $push_rtmp = 'rtmp://video-center.alivecdn.com/memeyule/' . $key . '?vhost=aliyun.memeyule.com';//获取rtmp地址
                $live_lines = 'http://aliyun.memeyule.com/memeyule/' . $key . '.flv';//播放rtmp地址
                $live_lines .= 'http://aliyun.memeyule.com/memeyule/' . $key . '.m3u8';//播放m3u8地址
            } elseif ($platform == '9158') {
                $pc = PushChannle::query()->find($key);
                if (isset($pc)) {
                    $pc->status = 1;
                    $pc->save();
                }
            } elseif ($platform == 'chushou') {
                $pc = PushChannle::query()->find($key);
                if (isset($pc)) {
                    $pc->status = 1;
                    $pc->save();
                }
            } elseif ($platform == 'changba') {
                $pc = PushChannle::query()->find($key);
                if (isset($pc)) {
                    $pc->status = 1;
                    $pc->save();
                }
            }

            if (!empty($push_rtmp) && !empty($live_lines)) {
                $pc = new PushChannle();
                $pc->name = $name;
                $pc->channel = $channel;
                $pc->platform = $platform;
                $pc->push_rtmp = $push_rtmp;
                $pc->live_lines = $live_lines;
                if ($pc->platform == 'long') {
                    $pc->status = 2;
                } else {
                    $pc->status = 1;
                }
                $pc->save();
            }
        }
        return back();
    }

    //释放
    public function closeStreamLongZhu(Request $request, $id)
    {
        $pc = PushChannle::query()->find($id);
        if (isset($pc) && $pc->platform == 'long') {
            list($phone, $token) = explode('?', $pc->channel);
            $this->closeLongZhuLive($token);
            $pc->status = 1;
            $pc->save();
        }
        return back();
    }

    //释放
    public function releaseStream(Request $request, $id)
    {
        $pc = PushChannle::query()->find($id);
        if (isset($pc)) {
            $pc->status = 0;
            $pc->save();
        }
        return back();
    }

    private function startLongZhuLive($token)
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

    private function closeLongZhuLive($token)
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

    private function getLongZhuLiveUrl($roomId)
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
