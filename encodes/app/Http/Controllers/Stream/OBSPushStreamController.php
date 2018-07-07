<?php

namespace App\Http\Controllers\Stream;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OBSPushStreamController extends BaseController
{
    private $ali_host = "";
    private $ali_key = "";
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);

        $this->ali_host = env('ALI_CDN_HOST', '');
        $this->ali_key = env('ALI_CDN_KEY', '');
        if (env('APP_NAME') == 'good') {

        } elseif (env('APP_NAME') == 'aikq') {
//            $this->channels['zhibo1'] = 'meme-ali##40290555';
//            $this->channels['zhibo2'] = 'meme-ali##40290666';
//            $this->channels['zhibo3'] = 'meme-ali##40290777';
//            $this->channels['zhibo4'] = 'meme-ali##40290888';
//            $this->channels['zhibo5'] = 'meme-ali##40290999';

            $this->channels['zhibo6'] = 'maobo-ali##300222111';
            $this->channels['zhibo7'] = 'maobo-ali##300222222';
            $this->channels['zhibo8'] = 'maobo-ali##300222333';
            $this->channels['zhibo9'] = 'maobo-ali##300222444';
            $this->channels['zhibo10'] = 'maobo-ali##300222555';

//            $this->channels['zhibo11'] = 'qt-ali##30022211';
//            $this->channels['zhibo12'] = 'qt-ali##30022222';
//            $this->channels['zhibo13'] = 'qt-ali##30022233';
//            $this->channels['zhibo14'] = 'qt-ali##30022244';
//            $this->channels['zhibo15'] = 'qt-ali##30022255';

//            $this->channels['zhibo16'] = 'huoxing-ks##29589911';
//            $this->channels['zhibo17'] = 'huoxing-ks##29589922';
//            $this->channels['zhibo18'] = 'huoxing-ks##29589933';
//            $this->channels['zhibo19'] = 'huoxing-ks##29589944';
//            $this->channels['zhibo20'] = 'huoxing-ks##29589955';

//            $this->channels['zhibo21'] = 'bohe-ws##735f725292624dfd98d117664bb02460';
//            $this->channels['zhibo22'] = 'bohe-ws##3c53b37b83f042c6a96656a11dd496cf';
//            $this->channels['zhibo23'] = 'bohe-ws##e1956de55d1e44c4bd2552216b11edc0';
//            $this->channels['zhibo24'] = 'bohe-ws##bebf1bdf215e493cb4877832aa2c2c64';
//
//            $this->channels['zhibo25'] = 'bohe-ws##2d3a669fdba1447197bfbb0e80a29ce4';
//            $this->channels['zhibo26'] = 'bohe-ws##f278f353e1e2403582d83a18db22ac69';
//            $this->channels['zhibo27'] = 'bohe-ws##2178442ea8f44ed6992b468530bbad57';
//            $this->channels['zhibo28'] = 'bohe-ws##1c652c45e5a14c879575802605b60fdb';
//            $this->channels['zhibo29'] = 'bohe-ws##6c162a2b52034586a360e0c95abf0e5e';

            $this->channels['zhibo101'] = 'akq-ali##300222111';
            $this->channels['zhibo102'] = 'akq-ali##300222222';
            $this->channels['zhibo103'] = 'akq-ali##300222333';
            $this->channels['zhibo104'] = 'akq-ali##300222444';
            $this->channels['zhibo105'] = 'akq-ali##300222555';
            $this->channels['zhibo106'] = 'akq-ali##300222666';
            $this->channels['zhibo107'] = 'akq-ali##300222777';
            $this->channels['zhibo108'] = 'akq-ali##300222888';
            $this->channels['zhibo109'] = 'akq-ali##300222999';
        } elseif (env('APP_NAME') == 'aikq1') {

        } elseif (env('APP_NAME') == 'leqiuba') {

        }
    }

    public function index(Request $request, $name)
    {
        $channel = $this->channels[$name];
        if (empty($channel)) {
            dump('无此房间');
        }
        list($type, $key) = explode('##', $channel);

        $params = [];
        switch ($type) {
            case 'meme-ali': {
                $params['push_rtmp'] = 'rtmp://video-center.alivecdn.com/memeyule';//流地址
                $params['push_key'] = $key . '?vhost=aliyun.memeyule.com';//流名称
                $params['live_flv'] = 'http://aliyun.memeyule.com/memeyule/' . $key . '.flv';//flv播放地址
                $params['live_m3u8'] = 'http://aliyun.memeyule.com/memeyule/' . $key . '.m3u8';//m3u8播放地址
                $params['live_rtmp'] = '-';//rtmp播放地址
                break;
            }
            case 'maobo-ali': {
                $params['push_rtmp'] = 'rtmp://push.maobotv.com/maozhua/';//流地址
                $params['push_key'] = $key;//流名称
                $params['live_flv'] = 'http://flv.maobotv.com/maozhua/' . $key . '.flv';//flv播放地址
                $params['live_m3u8'] = 'http://hls.maobotv.com/maozhua/' . $key . '/index.m3u8';//播放m3u8地址
                $params['live_rtmp'] = '-';//rtmp播放地址
                break;
            }
            case 'qt-ali': {
                $params['push_rtmp'] = 'rtmp://video-center.alivecdn.com/sei';//流地址
                $params['push_key'] = 'stream' . $key . '?vhost=qt1.alivecdn.com';//流名称
                $params['live_flv'] = 'http://qt1.alivecdn.com/sei/stream' . $key . '.flv';//flv播放地址
                $params['live_m3u8'] = 'http://qt1.alivecdn.com/sei/stream' . $key . '.m3u8';//播放m3u8地址
                $params['live_rtmp'] = '-';//rtmp播放地址
                break;
            }
            case 'huoxing-ks': {
                $params['push_rtmp'] = 'rtmp://kspush01.live.changbalive.com/live';//流地址
                $params['push_key'] = $key;//流名称
                $params['live_flv'] = 'http://hdlkspull01.live.changbalive.com/live/' . $key . '.flv';//flv播放地址
                $params['live_m3u8'] = 'http://hkspull01.live.changbalive.com/live/' . $key . '/index.m3u8';//播放m3u8地址
                $params['live_rtmp'] = '-';//rtmp播放地址
                break;
            }
            case 'bohe-ws': {
                $params['push_rtmp'] = 'rtmp://pbohetec2.live.126.net/live';//流地址
                $params['push_key'] = $key;//流名称
                $params['live_flv'] = 'http://flvbohetec2.live.126.net/live/' . $key . '.flv';//flv播放地址
                $params['live_m3u8'] = 'http://pullhlsbohetec2.live.126.net/live/' . $key . '/playlist.m3u8';//播放m3u8地址
                $params['live_rtmp'] = '-';//rtmp播放地址
                break;
            }
            case 'akq-ali': {

                $timestamp = time() + 10800;

                $sstring = '/live/' . $key . "-$timestamp-0-0-" . $this->ali_key;
                $auth_key = "$timestamp-0-0-" . md5($sstring);
                $params['push_rtmp'] = 'rtmp://video-center.alivecdn.com/live';//流地址
                $params['push_key'] = $key . '?vhost=' . $this->ali_host . '&auth_key=' . $auth_key;//流名称

                $sstring = '/live/' . $key . ".flv-$timestamp-0-0-" . $this->ali_key;
                $auth_key = "$timestamp-0-0-" . md5($sstring);
                $params['live_flv'] = 'http://' . $this->ali_host . '/live/' . $key . '.flv?auth_key=' . $auth_key;//flv播放地址

                $sstring = '/live/' . $key . ".m3u8-$timestamp-0-0-" . $this->ali_key;
                $auth_key = "$timestamp-0-0-" . md5($sstring);
                $params['live_m3u8'] = 'http://' . $this->ali_host . '/live/' . $key . '.m3u8?auth_key=' . $auth_key;//播放m3u8地址

                $params['live_rtmp'] = '-';//rtmp播放地址
                break;
            }
        }
        if (!empty($params['push_rtmp'])) {
            dump('#############################   推流   ################################');
            dump('URL: ' . $params['push_rtmp']);
            dump('流名称: ' . $params['push_key']);
            dump('#############################   播放   ################################');
            dump('m3u8: ' . $params['live_m3u8']);
            dump('flv: ' . $params['live_flv']);
            dump('rtmp: ' . $params['live_rtmp']);
        }
//        return view('manager.obs.stream', ['params' => $params]);
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
