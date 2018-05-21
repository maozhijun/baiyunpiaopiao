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
//            $longzhus[] = 'long##18346395094?f9da6c9eec936002a1dc4db17924d9e03e66ed4e4ad69e1a1abd6227238dd6c05eb8f820098718ae2edd7e2daef8ef35399fba3dfea587b9';
//            $longzhus[] = 'long##18249335694?8da6ae8eafc4d5e5d6e7a25763c16fd9833eba61e3bc24af704323f23cd6a1f746633230bc1f3db5b9c7f28df4a0cf94bedc98ce44436c8d';
//            $longzhus[] = 'long##18346335974?9a90c4041bb3b840c36a70ee719aaa00c32fcaa409f7e2d2a96c1de0e0d7e48db42b56683615c263f9293fc8cd1d3e9e8b81403404b49116';
//            $longzhus[] = 'long##17121073689?390f18b68c6f949674d9ffa5f529dda11606f9cdde9f4ab8bc3d447438591e6e941bf15a32ec74bff783ef9fe18ed5dea209bbc588f9a55b';
            $longzhus[] = 'long##17121073721?6953291a869cc486290b8338660271389e6796f22c88ac2c0824533afae8d4b4ca31cdee5321ed146e540b4ae8e628f6621cc708b9f20a9b';
            $longzhus[] = 'long##17169085461?767103cc093871c01344898faafd56b18d207e81ae9efd7ccfa1356dc8ef528ec48325fd416c5d9e6421bdded4c2b7f29f47ba9d769ed606';
            $longzhus[] = 'long##17172850051?2954c96facb54d5c73b6ab40b6dd93e76dc79280adfc11648d60c10209162be0fec853ae1a60a5207094c0c3630a8852b23988ab2845a9e5';
            $longzhus[] = 'long##17172850057?827ad68e3a4dadd0e3ec727d5cd75a27c53ce6d7d70aa5ef18f2ffbf2c3dbf9bb2e852defb7ba71827cffeff3ca01bf23493a3ff0bd53042';
            $longzhus[] = 'long##17177260095?2ecab7166e7174b7e95b140dc24625d272f9a5526338b5c85b2fc28c792b7b9a444df06b54fc8f78a001b4508e9757349527f1dd4cbc92a3';
            $longzhus[] = 'long##17177260086?d990b4fd8adc1b4314f25cf6ec26b285fa3926ea0e5800f135e7ae43c1043c13069d016e126ce54634bd267066fb83b3f46eca818895992c';
            $this->channels['龙珠'] = $longzhus;

//            $xiaomis[] = 'mi##cid201804241141222051111';
//            $xiaomis[] = 'mi##cid201804241141222052222';
//            $xiaomis[] = 'mi##cid201804241141222053333';
//            $xiaomis[] = 'mi##cid201804241141222054444';
//            $this->channels['小米'] = $xiaomis;

            $huajiaos[] = 'hua##_LC_AL1_5832731615253162591491111';
            $huajiaos[] = 'hua##_LC_AL1_5832731615253162591492222';
            $huajiaos[] = 'hua##_LC_AL1_5832731615253162591493333';
            $huajiaos[] = 'hua##_LC_AL1_5832731615253162591494444';
            $this->channels['花椒'] = $huajiaos;
        } elseif (env('APP_NAME') == 'aikq1') {

        } elseif (env('APP_NAME') == 'leqiuba') {
            //17124574019 as1231230  龙珠登录
//            $longzhus[] = 'long##17124574019?008a055f2dbe7cd5aa752639a41dfaec5df63534b535a31447e9cfdb51893734114471d1024858b985577711d23c9dfbe843ceda3eb67df2';
            //13285701420 hn12021  微博登录
            $longzhus[] = 'long##13285701420?c12ad66482732f5848ae72afd186712d05e1b0a558b5578a776bac193d2a2420369b3b3bf27f6380bbcad5ac1fd93fe0497773e92a8058c1';
            //13282093498 hn12021  微博登录
            $longzhus[] = 'long##13282093498?1fe2a951ef8edf74cdc5f61f24e32a0afaf80bb115bc9d5e57dcc8e3c27129a9b8a079afbf57662a1dae1f8e5937401301cd1d185362143d';
            //18708185105 aa123321 苏宁登录
            $longzhus[] = 'long##18708185105?ca492c5fe807e35b57a5f7c2f54e6289d12432d7df557fb43490ebbb2d3a18dc355b152e3010a696179ad35ba1ff4e0e4609eb1adf25bd71';
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
                $push_rtmp = 'rtmp://xy1.live.huajiao.com/live_huajiao_v2/' . $key;//获取rtmp地址
                $live_lines = 'http://xy1-flv.live.huajiao.com/live_huajiao_v2/' . $key . '.flv';//flv地址
                $live_lines .= "\n" . 'http://xy1-hls.live.huajiao.com/live_huajiao_v2/' . $key . '.m3u8';//m3u8地址
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
