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
                $pc = PushChannle::query()->where(['platform' => '9158', 'channel' => $token])->first();
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
