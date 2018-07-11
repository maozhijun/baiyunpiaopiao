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
//            $longzhus[] = 'long##17172850051?';
//            $longzhus[] = 'long##17169085461?589f283876c13f09b85d0bf1ce85c7ae5e3ea05a37dbabefc45039dbd5495ef930e950f2a536ee572e4d282de49282b586f205d4ea56b2e3';
            $longzhus[] = 'long##17121073721?674545a7323900293af87d61185980ac18938808607ab79877a9ce4654c26704cbadb759a61acfbc03fa823e291ec336514450e36e328c31';
            $longzhus[] = 'long##17172850057?d92217faef38c4c841de66419e739c9f87e6133888d3fb351217270eb71f5455261383a68adcef4e5f3e0019704650b1cf3d3a67a60fee80';
            $longzhus[] = 'long##17177260095?bd3eceb0485e19d7a796bab61e5ecea8e8f7244e2cc1cd9995128b1006d6c0ce2b07b6f040c6a2c79bab7fa6d06eb433f9b84b8ed930b448';
            $longzhus[] = 'long##17177260086?007a60ccff7dea79dc679efeddb096e7f5b4f9b119df368c2d00dbcee58a50210ccf22ce243169266a7f05cc33124e44eaa3ad1e6af53209';
            $this->channels['龙珠'] = $longzhus;

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

//            $memes[] = 'meme-ali##40290111';
//            $memes[] = 'meme-ali##40290222';
//            $memes[] = 'meme-ali##40290333';
//            $memes[] = 'meme-ali##40290444';
//            $this->channels['么么-阿里'] = $memes;

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

//            $pcs = PushChannle::query()
//                ->where(['platform' => '9158'])
//                ->where('status', 0)
//                ->orderBy('updated_at', 'desc')
//                ->take(20)
//                ->get();
//            $_9158s = [];
//            $i = 0;
//            foreach ($pcs as $pc) {
//                if ($i > 10 && $i < 15) {
//                    $_9158s[] = '9158##' . $pc->id;
//                }
//                $i++;
//            }
//            $this->channels['9158'] = $_9158s;
//
//            $pcs = PushChannle::query()
//                ->where(['platform' => 'chushou'])
//                ->where('status', 0)
//                ->orderBy('updated_at', 'desc')
//                ->take(4)
//                ->get();
//            $chushous = [];
//            foreach ($pcs as $pc) {
//                $chushous[] = 'chushou##' . $pc->id;
//            }
//            $this->channels['触手'] = $chushous;

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
                $rtmp_json = $this->startLongZhuLive($token);//开始直播
                $upStreamLines = $this->getLongZhuUpStreamUrl($token);//获取rtmp地址
                foreach ($upStreamLines as $upStreamLine) {
//                    if (empty($push_rtmp) && $upStreamLine['supplier'] == 18) {
//                        $push_rtmp = $upStreamLine['upStreamUrl'];
//                        list($rtmp_push_url) = explode('?', $push_rtmp);
//                        $urls = explode('/', $rtmp_push_url);
//                        $stream_name = array_pop($urls);
//                        $live_lines .= 'http://hdl1801.plures.net/onlive/' . $stream_name . '.flv';
//                        $live_lines .= "\n" . 'http://hdl1802.plures.net/onlive/' . $stream_name . '.m3u8';
//                        $live_lines .= "\n" . 'rtmp://hdl1803.plures.net/onlive/' . $stream_name;
//                    }
                    if (empty($push_rtmp) && $upStreamLine['supplier'] == 9) {
                        $push_rtmp = $upStreamLine['upStreamUrl'];
                        list($rtmp_push_url) = explode('?', $push_rtmp);
                        $urls = explode('/', $rtmp_push_url);
                        $stream_name = array_pop($urls);
                        $live_lines .= 'http://hdl0901.plures.net/onlive/' . $stream_name . '.flv';
                        $live_lines .= "\n" . 'http://hdl0902.plures.net/onlive/' . $stream_name . '/playlist.m3u8';
                        $live_lines .= "\n" . 'rtmp://hdl0903.plures.net/onlive/' . $stream_name;
                    }
                }
//                $push_rtmp = $rtmp_json['upStreamUrl'];

//                $roomId = $rtmp_json['roomId'];

//                $urls = $this->getLongZhuLiveUrl($roomId);
//                foreach ($urls as $url) {
//                    if ($url['ext'] == 'flv') {
//                        $live_lines .= $url['securityUrl'];
//                    } elseif ($url['ext'] == 'rtmp') {
//                        $live_lines .= "\n" . $url['securityUrl'];
//                    } elseif ($url['ext'] == 'm3u8') {
//                        $live_lines .= "\n" . $url['securityUrl'];
//                    }
//                }
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
                $live_lines = "\n" . 'http://aliyun.memeyule.com/memeyule/' . $key . '.flv';//播放rtmp地址
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
        curl_setopt($ch, CURLOPT_URL, 'http://liveapi.plu.cn/liveapp/startlive?address=%E5%B9%BF%E5%BB%BA%E5%A4%A7%E5%8E%A6&bitrate=1500&device=2&fh=768&fw=432&gameId=119&latitude=23.143591&liveSourceType=1&liveStreamType=12&longitude=113.336060&model=iPhone%206S&packageId=3&title=%E6%83%8A%E5%91%86%EF%BC%8C%E8%BF%99%E4%B8%AA%E4%BA%BA%E5%B1%85%E7%84%B6%E2%8B%AF%E2%8B%AF&version=3.3.2&watchDirections=portrait');
//        curl_setopt($ch, CURLOPT_URL, 'https://liveapi.longzhu.com/liveapp/startlive?address=&bitrate=800&bundleId=com.longzhu.tga&device=2&fh=640&fw=360&gameId=119&latitude=&liveSourceType=1&liveStreamType=10&longitude=&model=iPhone%206S&p1uuid=&packageId=1&title=&version=4.6.5&watchDirections=portrait');
        curl_setopt($ch, CURLOPT_COOKIE, "p1u_id=$token;");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_USERAGENT, "Push/3.3.2 (iPhone; iOS 11.4; Scale/2.00)");
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

    private function getLongZhuUpStreamUrl($token)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://star.api.plu.cn/live/GetUpStreamUrl?device=2&packageId=3&streamType=0&version=3.3.2');
//        curl_setopt($ch, CURLOPT_URL, 'https://liveapi.longzhu.com/liveapp/startlive?address=&bitrate=800&bundleId=com.longzhu.tga&device=2&fh=640&fw=360&gameId=119&latitude=&liveSourceType=1&liveStreamType=10&longitude=&model=iPhone%206S&p1uuid=&packageId=1&title=&version=4.6.5&watchDirections=portrait');
        curl_setopt($ch, CURLOPT_COOKIE, "p1u_id=$token;");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_USERAGENT, "Push/3.3.2 (iPhone; iOS 11.4; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json) && isset($json['upStreamLines'])) {
            return $json['upStreamLines'];
        } else {
            return null;
        }
    }

    private function closeLongZhuLive($token)
    {
        $ch = curl_init();
        //http://liveapi.plu.cn/liveapp/endlive?device=2&liveSourceType=1&packageId=3&reason=101&reasonDesp=iOS%3A%3ALongzhu%5B1.0%5D%3A%3AUserClosed&version=3.3.2
        curl_setopt($ch, CURLOPT_URL, 'http://liveapi.plu.cn/liveapp/endlive?device=2&liveSourceType=1&packageId=3&reason=101&reasonDesp=iOS%3A%3ALongzhu%5B1.0%5D%3A%3AUserClosed&version=3.3.2');
//        curl_setopt($ch, CURLOPT_URL, 'https://liveapi.longzhu.com/liveapp/endlive?bundleId=com.longzhu.tga&device=2&liveSourceType=1&p1uuid=&packageId=1&reason=101&reasonDesp=iOS::Qiniu[2.0]::UserClosed&version=4.6.5');
        curl_setopt($ch, CURLOPT_COOKIE, "p1u_id=$token;");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_USERAGENT, "Push/3.3.2 (iPhone; iOS 11.4; Scale/2.00)");
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
