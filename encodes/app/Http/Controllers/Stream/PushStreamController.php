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
            $longzhus[] = 'long##18346395094?6ecf4a8b3163dbf1801014e28c15e6821525fd219ab7f4aad7c66e5801254e0f7526992071219d5c0832947d28b72768e146525530319c07';
            $longzhus[] = 'long##18249335694?b40dfd4e774b9baa0b921df3d7ed370fd247ff1af7577b0fb768098c1095ecbfd61b81fcd59e7d553d14f79484f0beb7d5c7181b3e0feb5e';
            $longzhus[] = 'long##18346335974?17dbabd2015141d6e386f1649e5df3efb744a223b28a8c86d0350850a6acca1e50f3d955a3c43a684263c41850bd2376a6a31d9c7346a79f';
            $longzhus[] = 'long##17121073689?f599c1550d6d3e104a8a0f4bf26ab59602bbd113252823a9a94e9fe8b47a7f6f01ca16f7f6640e35443bd5d30097ea27dc92ee445696e010';
            $longzhus[] = 'long##17121073721?d836bdb81511f7f1d554245d4ebf0436dce336bf723f000d47915b46b5cb4ad460f9e824e72266bb8039c944fa8bb6707673d5ee870ed1e9';
            $this->channels['龙珠'] = $longzhus;

            $xiaomis[] = 'mi##cid201804241141222051111';
            $xiaomis[] = 'mi##cid201804241141222052222';
            $xiaomis[] = 'mi##cid201804241141222053333';
            $xiaomis[] = 'mi##cid201804241141222054444';
            $this->channels['小米'] = $xiaomis;

            $huajiaos[] = 'hua##_LC_AL1_5832731615253162591491111';
            $huajiaos[] = 'hua##_LC_AL1_5832731615253162591492222';
            $huajiaos[] = 'hua##_LC_AL1_5832731615253162591493333';
            $huajiaos[] = 'hua##_LC_AL1_5832731615253162591494444';
            $this->channels['花椒'] = $huajiaos;
        } elseif (env('APP_NAME') == 'aikq1') {

        } elseif (env('APP_NAME') == 'leqiuba') {

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
                $push_rtmp = 'rtmp://al1.live.huajiao.com/live_huajiao_v2/' . $key;//获取rtmp地址
                $live_lines = 'http://al1-flv.live.huajiao.com/live_huajiao_v2/' . $key . '.flv';//flv地址
                $live_lines .= "\n" . 'http://al1-hls.live.huajiao.com/live_huajiao_v2/' . $key . '.m3u8';//m3u8地址
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
