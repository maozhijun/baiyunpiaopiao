<?php

namespace App\Http\Controllers\Stream;

use App\Http\Controllers\ChushouStream;
use Illuminate\Routing\Controller as BaseController;
use App\Models\PushChannle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CrontabStreamController extends BaseController
{
    use ChushouStream;
    private $chushous;

    public function __construct()
    {
        $this->chushous['17031505710'] = [
            'get_stream_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/get-rookie-push-url.htm?_appVersion=2.8.0&_appkey=CSRecIos&_identifier=40677F57-ED05-45DE-A42D-1201162FB42A&_ltn=1531298039592&_modelName=iPhone8%2C1&_sign=d4d1f0db9375119e862caadb46eda3f9&token=fe09f076ba486f02g520695fe',
                'method' => 'get',
                'param' => '',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'online_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/online.htm',
                'method' => 'post',
                'param' => '_appVersion=2.8.0&_appkey=CSRecIos&_identifier=40677F57-ED05-45DE-A42D-1201162FB42A&_ltn=1531298042092&_modelName=iPhone8%2C1&_sign=8f771fb699c8018e4fc2e7130284c3cc&_t=1531298041839&bitrate=2000&gameName=%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80&isPrivate=1&liveSourceId=8&roomId=80522518&roomName=%E5%90%A7%E5%95%A6%E5%93%94%E5%93%A9bolo&style=0&token=fe09f076ba486f02g520695fe',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'get_play_url' => [
                'url' => 'https://chushou.tv/room/m-80522518.htm?hmsr=share&hmpl=unknow&hmcu=unknow&hmkw=&hmci=',
                'method' => 'get',
                'param' => '',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 MicroMessenger/6.7.0 NetType/WIFI Language/zh_CN',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'get_flv_play_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/get-play-url.htm?_appEnv=1&_appSource=811&_appVersion=5.0.3.27028&_appkey=CSIos&_identifier=DAF4A4E4-3268-4D30-801D-69C5EB976BF6&_idfa=4044A747-5BF0-4465-A894-99E2FEBAC4C1&_locRadius=10.000000&_locType=bd09ll&_sign=57956dfcac619e07d01b4ef0eedfd304&_t=1543560472069&_wsign=52feded3617378380e5e084efecd52710fa4967a&_xappVersion=10504&device_cs=311d8fbc2bf1f715cfd982d1d0931ce6&device_ds=DAF4A4E4-3268-4D30-801D-69C5EB976BF6&device_es=he196bcebd0450458a9eec275b786d490&device_model=iPhone8%2C1&device_ram=2105016320&device_release=11.4&device_user=%E2%80%9C%E6%AF%9B%E5%BF%97%E5%86%9B%E2%80%9D%E7%9A%84%20iPhone&protocols=1%2C2%2C101%2C102&roomId=80522518&token=74789c318d0cf918g52067018',
                'method' => 'get',
                'param' => '',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'offline_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/offline.htm',
                'method' => 'post',
                'param' => '_appVersion=2.8.0&_appkey=CSRecIos&_identifier=40677F57-ED05-45DE-A42D-1201162FB42A&_ltn=1531298078278&_modelName=iPhone8%2C1&_sign=0dbffa4fe841b4d9d139a400abb48f2f&_t=1531298076025&roomId=80522518&token=fe09f076ba486f02g520695fe',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
        ];
        $this->chushous['17073355245'] = [
            'get_stream_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/get-rookie-push-url.htm?_appVersion=2.8.0&_appkey=CSRecIos&_identifier=40677F57-ED05-45DE-A42D-1201162FB42A&_ltn=1531304579175&_modelName=iPhone8%2C1&_sign=116ef7bee9fcc5e394c0721aa3552fdd&token=17dd6622a7294a4eg51e1174e',
                'method' => 'get',
                'param' => '',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'online_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/online.htm',
                'method' => 'post',
                'param' => '_appVersion=2.8.0&_appkey=CSRecIos&_identifier=40677F57-ED05-45DE-A42D-1201162FB42A&_ltn=1531304580319&_modelName=iPhone8%2C1&_sign=c220eef81fb0829ed37fba4e94cb05f8&_t=1531304579857&bitrate=1000&gameName=%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80&isPrivate=1&liveSourceId=51&roomId=79898715&roomName=%E7%94%A8%E6%88%B7_1373706062&style=0&token=17dd6622a7294a4eg51e1174e',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'get_play_url' => [
                'url' => 'https://chushou.tv/room/m-79898715.htm?hmsr=share&hmpl=unknow&hmcu=unknow&hmkw=&hmci=',
                'method' => 'get',
                'param' => '',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 MicroMessenger/6.7.0 NetType/WIFI Language/zh_CN',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'get_flv_play_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/get-play-url.htm?_appEnv=1&_appSource=811&_appVersion=5.0.3.27028&_appkey=CSIos&_identifier=DAF4A4E4-3268-4D30-801D-69C5EB976BF6&_idfa=4044A747-5BF0-4465-A894-99E2FEBAC4C1&_locRadius=10.000000&_locType=bd09ll&_sign=6e8b74c7f1258fa25a418bf81ca82ca8&_t=1543560430078&_wsign=63a7e2089614112a5c97aa8fa9cf3bcb88b6c84c&_xappVersion=10504&device_cs=311d8fbc2bf1f715cfd982d1d0931ce6&device_ds=DAF4A4E4-3268-4D30-801D-69C5EB976BF6&device_es=he196bcebd0450458a9eec275b786d490&device_model=iPhone8%2C1&device_ram=2105016320&device_release=11.4&device_user=%E2%80%9C%E6%AF%9B%E5%BF%97%E5%86%9B%E2%80%9D%E7%9A%84%20iPhone&protocols=1%2C2%2C101%2C102&roomId=79898715&token=74789c318d0cf918g52067018',
                'method' => 'get',
                'param' => '',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'offline_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/offline.htm',
                'method' => 'post',
                'param' => '_appVersion=2.8.0&_appkey=CSRecIos&_identifier=40677F57-ED05-45DE-A42D-1201162FB42A&_ltn=1531304594460&_modelName=iPhone8%2C1&_sign=08a18d1b2b1cfb4b93ab74d409494fb7&_t=1531304593022&roomId=79898715&token=17dd6622a7294a4eg51e1174e',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
        ];
        $this->chushous['15584445409'] = [
            'get_stream_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/get-rookie-push-url.htm?_appVersion=2.8.0&_appkey=CSRecIos&_identifier=40677F57-ED05-45DE-A42D-1201162FB42A&_ltn=1531304871085&_modelName=iPhone8%2C1&_sign=b9e2f3edf3b94649b42ed919124ad914&token=f050754b0ad1fd3ag52077dc6',
                'method' => 'get',
                'param' => '',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'online_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/online.htm',
                'method' => 'post',
                'param' => '_appVersion=2.8.0&_appkey=CSRecIos&_identifier=40677F57-ED05-45DE-A42D-1201162FB42A&_ltn=1531304872119&_modelName=iPhone8%2C1&_sign=93acd2093816efb9bbc4ad23b67b14e5&_t=1531304871718&bitrate=1000&gameName=%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80&isPrivate=1&liveSourceId=51&roomId=80512823&roomName=%E7%94%A8%E6%88%B7_1376222662&style=0&token=f050754b0ad1fd3ag52077dc6',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'get_play_url' => [
                'url' => 'https://chushou.tv/room/m-80512823.htm?hmsr=share&hmpl=unknow&hmcu=unknow&hmkw=&hmci=',
                'method' => 'get',
                'param' => '',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 MicroMessenger/6.7.0 NetType/WIFI Language/zh_CN',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'get_flv_play_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/get-play-url.htm?_appEnv=1&_appSource=811&_appVersion=5.0.3.27028&_appkey=CSIos&_identifier=DAF4A4E4-3268-4D30-801D-69C5EB976BF6&_idfa=4044A747-5BF0-4465-A894-99E2FEBAC4C1&_locRadius=10.000000&_locType=bd09ll&_sign=cb2e843da89028d058c681ae77de62d9&_t=1543560398690&_wsign=1a683fc710dbfadb2e76f79ce971b67b28cd7c36&_xappVersion=10504&device_cs=311d8fbc2bf1f715cfd982d1d0931ce6&device_ds=DAF4A4E4-3268-4D30-801D-69C5EB976BF6&device_es=he196bcebd0450458a9eec275b786d490&device_model=iPhone8%2C1&device_ram=2105016320&device_release=11.4&device_user=%E2%80%9C%E6%AF%9B%E5%BF%97%E5%86%9B%E2%80%9D%E7%9A%84%20iPhone&protocols=1%2C2%2C101%2C102&roomId=80512823&token=74789c318d0cf918g52067018',
                'method' => 'get',
                'param' => '',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'offline_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/offline.htm',
                'method' => 'post',
                'param' => '_appVersion=2.8.0&_appkey=CSRecIos&_identifier=40677F57-ED05-45DE-A42D-1201162FB42A&_ltn=1531304883910&_modelName=iPhone8%2C1&_sign=da7219d51be560921da7f474a067d5e1&_t=1531304882443&roomId=80512823&token=f050754b0ad1fd3ag52077dc6',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
        ];
        $this->chushous['17134263258'] = [
            'get_stream_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/get-rookie-push-url.htm?_appVersion=2.8.0&_appkey=CSRecIos&_identifier=40677F57-ED05-45DE-A42D-1201162FB42A&_ltn=1531305076088&_modelName=iPhone8%2C1&_sign=7765a5d7f5515f22fbecfe3d38b79d1c&token=97903f8d9b5c3be8g52067018',
                'method' => 'get',
                'param' => '',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'online_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/online.htm',
                'method' => 'post',
                'param' => '_appVersion=2.8.0&_appkey=CSRecIos&_identifier=40677F57-ED05-45DE-A42D-1201162FB42A&_ltn=1531305077307&_modelName=iPhone8%2C1&_sign=bc22d8575e8deb9874673e07331fce2b&_t=1531305077006&bitrate=1000&gameName=%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80&isPrivate=1&liveSourceId=51&roomId=80527065&roomName=%E4%B8%BD%E4%B8%BD%E6%9C%89%E7%94%B7%E7%9B%86%E5%8F%8B%E4%BA%86&style=0&token=97903f8d9b5c3be8g52067018',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'get_play_url' => [
                'url' => 'https://chushou.tv/room/m-80527065.htm?hmsr=share&hmpl=unknow&hmcu=unknow&hmkw=&hmci=',
                'method' => 'get',
                'param' => '',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 MicroMessenger/6.7.0 NetType/WIFI Language/zh_CN',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'get_flv_play_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/get-play-url.htm?_appEnv=1&_appSource=811&_appVersion=5.0.3.27028&_appkey=CSIos&_identifier=DAF4A4E4-3268-4D30-801D-69C5EB976BF6&_idfa=4044A747-5BF0-4465-A894-99E2FEBAC4C1&_locRadius=10.000000&_locType=bd09ll&_sign=82e87550cf11b4cba4ba34fb15a95139&_t=1543560302450&_wsign=879d43a11f169c1d865c55c37a9d2abf3d84801d&_xappVersion=10504&device_cs=311d8fbc2bf1f715cfd982d1d0931ce6&device_ds=DAF4A4E4-3268-4D30-801D-69C5EB976BF6&device_es=he196bcebd0450458a9eec275b786d490&device_model=iPhone8%2C1&device_ram=2105016320&device_release=11.4&device_user=%E2%80%9C%E6%AF%9B%E5%BF%97%E5%86%9B%E2%80%9D%E7%9A%84%20iPhone&protocols=1%2C2%2C101%2C102&roomId=80527065&token=74789c318d0cf918g52067018',
                'method' => 'get',
                'param' => '',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
            'offline_url' => [
                'url' => 'https://api.chushou.tv/api/live-room/offline.htm',
                'method' => 'post',
                'param' => '_appVersion=2.8.0&_appkey=CSRecIos&_identifier=40677F57-ED05-45DE-A42D-1201162FB42A&_ltn=1531305086749&_modelName=iPhone8%2C1&_sign=b14787a49395b5a02c856477c7945c5d&_t=1531305085196&roomId=80527065&token=97903f8d9b5c3be8g52067018',
                'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15F79 iOS ChushouRec/2.8.0',
                'cookie' => '_i7=7f9a6f6e90744f64a5d055044a70c5ef'
            ],
        ];
    }

    public function get9158Rooms()
    {
        $page = 1;
        $totalPage = 1;
        $rooms = [];
        do {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://live.9158.com/Room/GetHotLive_v2?isNewapp=1&page=$page&type=1");
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36");
            curl_setopt($ch, CURLOPT_COOKIESESSION, true);
            $response = curl_exec($ch);
            if ($error = curl_error($ch)) {
                die($error);
            }
            curl_close($ch);
//        dump($response);
            $json = json_decode($response, true);
//        dump($json);
            if (!empty($json['data']) && !empty($json['data']['list'])) {
                $totalPage = $json['data']['totalPage'];
                $rooms = array_merge($rooms, $json['data']['list']);
            }
            $page++;
        } while ($page < $totalPage);
//        dump($rooms);
        foreach ($rooms as $room) {
//            dump($room);
            $flv = $room['flv'];
            $roomid = $room['roomid'];
            $push_rtmp = str_replace('http://hdl', 'rtmp://push', $flv);
            $push_rtmp = str_replace('.flv', '', $push_rtmp);
            $m3u8 = str_replace('http://hdl', 'http://hls', $flv);
            $m3u8 = str_replace('.flv', '/playlist.m3u8', $m3u8);
            $pc = PushChannle::query()->where(['platform' => '9158', 'channel' => $roomid])->first();
            if (empty($pc)) {
                $pc = new PushChannle();
                $pc->channel = $roomid;
                $pc->platform = '9158';
            }
            $pc->name = $room['useridx'];
            $pc->push_rtmp = $push_rtmp;
            $pc->live_lines = $flv . "\n" . $m3u8;
            $pc->status = -1;
            $pc->updated_at = date_create();
            $pc->save();
        }
    }

    public function test9158Rooms()
    {
        $pcs = PushChannle::query()
            ->where(['platform' => '9158'])
            ->where('status', -1)
            ->orderBy('updated_at', 'asc')
            ->take(20)
            ->get();
        foreach ($pcs as $pc) {
            list($flv, $m3u8) = explode("\n", $pc->live_lines);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $flv);
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1); // connect timeout
            curl_setopt($ch, CURLOPT_TIMEOUT, 1); // curl timeout
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // curl timeout

            $status = 0;
            if (FALSE === curl_exec($ch)) {
                dump('open ' . $flv . ' failed' . "\n");
            } else {
                $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                dump('HTTP return code=' . $retcode . "\n");
                if ($retcode == 200) {
                    $status = -1;
                }
            }
            curl_close($ch);
            $pc->status = $status;
            $pc->updated_at = date_create();
            $pc->save();
        }
    }

    public function getChushouRooms()
    {
        $tokens = [
            '5b223be8f779744eg51e1174e',
            '212df6b646f2b7c6g52077dc6',
            'fe09f076ba486f02g520695fe',
            '74789c318d0cf918g52067018',
//            '',
//            '',
//            '',
//            '',
        ];
        foreach ($tokens as $token) {
            $pushUrl = '';
            $count = 0;
            $m3u8 = '';
            do {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://api.chushou.tv/api/live-room/get-rookie-push-url.htm?token=$token");
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
                curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36");
                curl_setopt($ch, CURLOPT_COOKIESESSION, true);
                $response = curl_exec($ch);
                if ($error = curl_error($ch)) {
                    die($error);
                }
                curl_close($ch);
//        dump($response);
                $json = json_decode($response, true);
//        dump($json);
                if (isset($json['data']['pushUrl']) && str_contains($json['data']['pushUrl'], 'up6.kascend.com')) {
                    $pushUrl = $json['data']['pushUrl'];
                    $m3u8 = explode('?', $pushUrl)[0];
                    $m3u8 = str_replace('rtmp://up6', 'http://hls6', $m3u8);
                    $m3u8 = $m3u8 . '.m3u8';
                    dump($pushUrl);
                }
                $count++;
            } while (empty($pushUrl) && $count < 10);

            if (!empty($pushUrl)) {
                $pc = PushChannle::query()->where(['platform' => 'chushou', 'channel' => $token])->first();
                if (empty($pc)) {
                    $pc = new PushChannle();
                    $pc->channel = $token;
                    $pc->platform = 'chushou';
                    $pc->name = $token;
                    $pc->status = 0;
                }
                $pc->push_rtmp = $pushUrl;
                $pc->live_lines = $m3u8;
                $pc->updated_at = date_create();
                $pc->save();
            }
        }
    }

    public function getChangbaRooms()
    {
        $rooms = [];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.changbalive.com/api_room.php?ac=gethotrank&curuserid=3310830&channelsrc=appstore&version=2.1.0&token=T286eb57e154dffd&bless=0&macaddress=4044A747-5BF0-4465-A894-99E2FEBAC4C1&ismember=0&openudid=69a214bdb8e3628de54a8ac70a773a87943377ce&systemversion=11.4&device=iPhone8,1&broken=0&build=2.1.0.1&gender=2&secret=9b1d35c3ae");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (!empty($json['result']) && !empty($json['result']['sessioninfos'])) {
            $rooms = $json['result']['sessioninfos'];
        }
//        dump($rooms);
        foreach ($rooms as $room) {
//            dump($room);
            $roomid = $room['anchorid'];
            $flv = explode('?', $room['rtmp_url']['subscribe_url'])[0];
            $push_rtmp = $room['rtmp_url']['publish_url'];
            if (str_contains($push_rtmp, 'rtmp://wspush')) {
                $m3u8 = str_replace('http://wspull', 'http://hwspull', $flv);
                $m3u8 = str_replace('.flv', '/playlist.m3u8', $m3u8);
                $pc = PushChannle::query()->where(['platform' => 'changba', 'channel' => $roomid])->first();
                if (empty($pc)) {
                    $pc = new PushChannle();
                    $pc->channel = $roomid;
                    $pc->platform = 'changba';
                }
                $pc->name = $roomid;
                $pc->push_rtmp = $push_rtmp;
                $pc->live_lines = $flv . "\n" . $m3u8;
                $pc->status = -1;
//                $pc->updated_at = date_create();
                $pc->save();

            }
        }
    }

    public function testChangbaRooms()
    {
        $pcs = PushChannle::query()
            ->where(['platform' => 'changba'])
            ->where('status', -1)
            ->orderBy('updated_at', 'asc')
            ->take(20)
            ->get();
        foreach ($pcs as $pc) {
            list($flv, $m3u8) = explode("\n", $pc->live_lines);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $flv);
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1); // connect timeout
            curl_setopt($ch, CURLOPT_TIMEOUT, 1); // curl timeout
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // curl timeout

            $status = 0;
            if (FALSE === curl_exec($ch)) {
                dump('open ' . $flv . ' failed' . "\n");
            } else {
                $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                dump('HTTP return code=' . $retcode . "\n");
                if ($retcode == 200) {
                    $status = -1;
                }
            }
            curl_close($ch);
            $pc->status = $status;
            $pc->updated_at = date_create();
            $pc->save();
        }
    }

    public function chushou(Request $request, $room)
    {
        $param = $this->chushous[$room];
        $rtmp_push_url = $this->getChushouStream($param['get_stream_url']);
//        dump($stream);
        $this->choushouOnline($param['online_url']);
        $flv = $this->getChushouFlvPlay($param['get_flv_play_url']);
        $play = $this->getChushouPlay($param['get_play_url']);
        $this->choushouOffline($param['offline_url']);
//        dump($play);
        $urls = explode('/', $rtmp_push_url);
        $stream_name = array_pop($urls);
        $stream_url = join('/', $urls);
        dump('#############################   推流   ################################');
        dump('URL：' . $stream_url);
        dump('流名称：' . $stream_name);
        dump('#############################   播放   ################################');
        dump('FLV：' . $flv);
        dump('M3U8：' . $play);
    }

    public function hotsoon()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://hotsoon.snssdk.com/hotsoon/room/?app_name=live_stream");
        curl_setopt($ch, CURLOPT_COOKIE, "sid_tt=2f05186a3234d4da3be36d2589e19136;");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "cover_uri=&title=");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
        curl_setopt($ch, CURLOPT_USERAGENT, "LiveStreaming/4.1.3 (iPhone; iOS 11.4; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
//        curl_exec($ch);
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (!empty($json['data']) && !empty($json['data']['stream_url']['rtmp_push_url'])) {
            $rtmp_push_url = $json['data']['stream_url']['rtmp_push_url'];
            $rtmp_pull_url = $json['data']['stream_url']['rtmp_pull_url'];
            $urls = explode('/', $rtmp_push_url);
            $stream_name = array_pop($urls);
            $stream_url = join('/', $urls);
            dump('#############################   推流   ################################');
            dump('URL：' . $stream_url);
            dump('流名称：' . $stream_name);
            dump('#############################   播放   ################################');
            dump('PC播放地址：' . $rtmp_pull_url);
            $m3u8 = str_replace('flv-l6', 'hls-l6', $rtmp_pull_url);
            $m3u8 = str_replace('.flv', '/index.m3u8', $m3u8);
            $m3u8 = str_replace('flv-l1', 'hls-l1', $m3u8);
            $m3u8 = str_replace('.flv', '/playlist.m3u8', $m3u8);
            dump('M3U8播放地址：' . $m3u8);
        }
    }

    public function qianfan()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://mbl.56.com/play/v2/applyShow.ios?roomId=592203354");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
        curl_setopt($ch, CURLOPT_USERAGENT, "zhibo/5.8.1 (iPhone; iOS 11.4; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIE, "member_id=shunm_56109343822%4056.com; pass_hex=00475fd070d99d888bd362bc271563a123148be3; qfInfo=%7B%22typePatriarch%22%3A%22%22%2C%22qfLogin%22%3A1%7D");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        dump($response);
//        curl_setopt($ch, CURLOPT_URL, "https://mbl.56.com/play/v1/stopShow.ios?roomId=592044434");
        curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);
        if (isset($json['message']['pushUrl'])) {
            //https://hls-v-ngb.qf.56.com/live/592044434_1528710076092/playlist.m3u8
            //https://v-ngb.qf.56.com/live/592044434_1528710076092.flv
            $rtmp_push_url = $json['message']['pushUrl'];
            $urls = explode('/', $rtmp_push_url);
            $stream_name = array_pop($urls);
            $stream_url = join('/', $urls);
            dump('URL：' . $stream_url);
            dump('流名称：' . $stream_name);
            dump('==========================================================================');
            $m3u8Url = str_replace('rtmp://up-ngb', 'https://hls-v-ngb', explode('?', $rtmp_push_url)[0]) . '/playlist.m3u8';
            dump('M3U8播放地址：' . $m3u8Url);
            $flvUrl = str_replace('rtmp://up-ngb', 'https://v-ngb', explode('?', $rtmp_push_url)[0]) . '.flv';
            dump('PC播放地址：' . $flvUrl);
//            return $json['message']['pushUrl'];
        } else {
            return null;
        }
    }

    public function weibo()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://ing.weibo.com/api/protoweb/getcreateparams");
        curl_setopt($ch, CURLOPT_COOKIE, "LIVE-G0=5353d40b740d677d1f8edf8408955b65; WBStorage=201807040031|undefined; login_sid_t=f317719f69ba49ae46c45b6baa998c87; cross_origin_proto=SSL; _s_tentry=-; Apache=121035831212.49706.1530635556751; SINAGLOBAL=121035831212.49706.1530635556751; ULV=1530635556761:1:1:1:121035831212.49706.1530635556751:; SCF=AmKW-d8Zq4uyOZp1wsNOR7nge-alqfJygwBg6ckboxkVJ1W3Os8dsA08OOpFSyLDDtVxPI2E6CoSjbuoNiRwZVk.; SUB=_2A252P9VpDeRhGedH61UZ8CzNwjmIHXVVTUGhrDV8PUNbmtAKLXT6kW9NUPbxf1krouhfKDQOAkDPvTvsJbw81rOh; SUBP=0033WrSXqPxfM725Ws9jqgMF55529P9D9WWmajPEkfJqO7g_ws.3yQ685JpX5KzhUgL.Fo24ehMRehzp1K-2dJLoIpzLxKqL122L122LxK-L1-zL1-zt; SUHB=079ilJbrM8Iobh; ALF=1562171577; SSOLoginState=1530635578; wvr=6");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "is_premium=0");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
        curl_setopt($ch, CURLOPT_REFERER, 'https://ing.weibo.com/p/proto/admin?page=create');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
//        curl_exec($ch);
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (!empty($json['data']) && !empty($json['data']['push_url'])) {
            $rtmp_push_url = $json['data']['push_url'];
            $flv_pull_url = $json['data']['live_flv_hd'];
//            $rtmp_pull_hd = $json['data']['rtmp_hd'];
            $hls_pull_url = $json['data']['live_hd'];
            $urls = explode('/', $rtmp_push_url);
            $stream_name = array_pop($urls);
            $stream_url = join('/', $urls);
            dump('URL：' . $stream_url);
            dump('流名称：' . $stream_name);
            dump('==================================================================');
            dump('PC播放地址：' . $flv_pull_url);
            dump('M3U8播放地址：' . $hls_pull_url);
        }
    }

    public function inke()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://openact.busi.inke.cn/stream/get_pull_stream");
        curl_setopt($ch, CURLOPT_COOKIE, "Hm_lvt_11f833fcd634f41462d9c452077f1776=1530763998; INKEUSERINFO=%7B%22name%22%3A%22NBA%5Cu89e3%5Cu8bf4%22%2C%22pic%22%3A%22http%3A%5C%2F%5C%2Fimage.scale.inke.cn%5C%2Fimageproxy2%5C%2Fdimgm%5C%2FscaleImage%3Furl%3Dhttp%253A%252F%252Fimg2.inke.cn%252FMTUxNTY0OTg0ODQ2MSM0NDAjanBn.jpg%26w%3D100%26h%3D100%26s%3D80%26c%3D0%26o%3D0%22%2C%22view_id%22%3A104099414%2C%22level%22%3A1%2C%22gender%22%3A1%7D; INKEUSERLOGININFO=f7fba40b1ddb13feca4246910d541881bb8989c5d9d4f84b3ff01cb177b0fc9fdf4e929a2f8a26cbec288b389bcad74c2c05cd7c6c4d9c2f2740d4cb1e0e63becaaecd185e7ffd1655bec160a4ed2a481441e27a5f33e34b5de0b2058d63a7838b84253f7de9cd2cc00210e43001b5704a6d6d24676382b267eb27f095f9f01f4a99ff6d86d31b7635a168efbaca6abc892aba5bd7828be03805e2f5935597610a5a18f850d4e2408506bf2928f8cface14a655c2b91d9218ce7b6dcd2294483ea5605ef66e983ae902ad232c14e30d2eef77533faab278924872a7f7e1f9f9da389defa7fa790a46c35683cbcd3348dbc6fcb215401a1502e170d95bab7719ca0f3ec439d93e5e1e82bac6b03443e711ff6240f161dbc3a8a0358ca1928cd5b41ca1428ab1abbf45b20fa3ed80dfb610567ed26ec90e1ce278991b8acf57e6cf9431fdbad611be43fa96321138eee698b60cb3938e9b8c4c434769c9c263838adbacfcdaa853c4ad65aef72979674a8; INKEAPISESSION=a6h13CVqKrbuXGSkmFlmiGaN%2B2SJuVYqgNIPy3kxwdNt%2FF3yJxeNbU6phYss9E4jI%2FLaK9HOp8Oo75SMOziZqwIThCBz5xIwWc1plVOw8Di%2B04vbpJi9GG0DzSxii15wlvThlSSfXBrFVbKTFbNZnrNuymfF5%2Fl0Y62xRtLGaaZFjP%2Bl3PrBhiQOcbv%2F5R1B%2FHWggqg2pkyZsI%2F4y7qfO298VoEQVVx%2BmRJ1qRHTBdiHzwlXKGPvPowxtATkrLQ4ezSLMWniohcpGc82DFHCjs1oAYqD3miOYHgFDPWKtm8saKkWvvuwfhoNGXX%2FZqtDpaZagC7KR1zZvULQpFj6j64K%2FaEddDXXQwvlB37LMMntPsJmuFlbVc0VaR2MBQGZYEN7F275MZP%2FV4CfO2lHZIpazjiqFdBfgSI4iS9snn%2B51lcsYTTb2tUyr%2B8fR4%2B8qYLLAYIsV6R2fOdpX2lBL%2BIDmMopvh9iD7KXHZ%2BCZBs%3D; PHPSESSID=f3572526f955a498cecef6218d35c792; Hm_lpvt_11f833fcd634f41462d9c452077f1776=1530764373");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "id=0&screen_orientation=portrait&name=&gps_position=");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
        curl_setopt($ch, CURLOPT_REFERER, 'http://www.inke.cn/live_flow.html');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_setopt($ch, CURLOPT_URL, "http://openact.busi.inke.cn/stream/live_stop");
        curl_exec($ch);
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (!empty($json['data']) && !empty($json['data']['pull_stream_url'])) {
            $rtmp_push_url = $json['data']['pull_stream_url'];
            $urls = explode('/', $rtmp_push_url);
            $stream_name = array_pop($urls);
            $stream_url = join('/', $urls);
            dump('URL：' . $stream_url);
            dump('流名称：' . $stream_name);
            dump('==================================================================');
            list($stream_id) = explode('?', $stream_name);
            $flv_pull_url = 'rtmp://wssource.pull.inke.cn/live/' . $stream_id;
            $hls_pull_url = 'http://wssource.hls.inke.cn/live/' . $stream_id . '/playlist.m3u8';
            dump('PC播放地址：' . $flv_pull_url);
            dump('M3U8播放地址：' . $hls_pull_url);
        }
    }

    public function test()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://mbl.56.com/play/v2/applyShow.ios?roomId=592044434");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
        curl_setopt($ch, CURLOPT_USERAGENT, "zhibo/5.8.1 (iPhone; iOS 11.4; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIE, "member_id=qq-109084804%4056.com; pass_hex=004073e6e98812e82cb024e8699a23038dc0ec29; qfInfo=%7B%22typePatriarch%22%3A%22%22%2C%22qfLogin%22%3A1%7D");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
//        dump($response);
//        curl_setopt($ch, CURLOPT_URL, "https://mbl.56.com/play/v1/stopShow.ios?roomId=592044434");
        curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);
        if (isset($json['message']['pushUrl'])) {
            //https://hls-v-ngb.qf.56.com/live/592044434_1528710076092/playlist.m3u8
            //https://v-ngb.qf.56.com/live/592044434_1528710076092.flv
            $pushUrl = $json['message']['pushUrl'];
            dump($pushUrl);
            $m3u8Url = str_replace('rtmp://up-ngb', 'https://hls-v-ngb', explode('?', $pushUrl)[0]) . '/playlist.m3u8';
            dump($m3u8Url);
            $flvUrl = str_replace('rtmp://up-ngb', 'https://v-ngb', explode('?', $pushUrl)[0]) . '.flv';
            dump($flvUrl);
//            return $json['message']['pushUrl'];
        } else {
            return null;
        }
    }
}
