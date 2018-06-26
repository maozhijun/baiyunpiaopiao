<?php

namespace App\Http\Controllers\Stream;

use Illuminate\Routing\Controller as BaseController;
use App\Models\PushChannle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CrontabStreamController extends BaseController
{

    public function __construct()
    {

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
        curl_exec($ch);
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
            dump('URL：' . $stream_url);
            dump('流名称：' . $stream_name);
            dump('==================================================================');
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
