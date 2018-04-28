<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BaiTVEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {
        } elseif (env('APP_NAME') == 'aikq') {
            $this->channels[] = '云端直播0##vod_3183361';
            $this->channels[] = '云端直播1##vod_3183362';
            $this->channels[] = '云端直播2##vod_3183363';
            $this->channels[] = '云端直播3##vod_3183364';
            $this->channels[] = '云端直播4##vod_3183365';
            $this->channels[] = '云端直播5##vod_3183366';
            $this->channels[] = '云端直播6##vod_3183367';
            $this->channels[] = '云端直播7##vod_3183368';
            $this->channels[] = '云端直播8##vod_3183369';
            $this->channels[] = '云端直播9##vod_3183370';
        }
    }

    public function index(Request $request)
    {
        $lives = [
//            ['name' => '赛事通道1', 'channel' => '78', 'desc' => 'NBA|英超'],
//            ['name' => '赛事通道2', 'channel' => '79', 'desc' => 'NBA|英超'],
//            ['name' => '赛事通道3', 'channel' => '80', 'desc' => 'NBA|英超'],
//            ['name' => '赛事通道4', 'channel' => '81', 'desc' => 'NBA|英超'],
//            ['name' => '赛事通道5', 'channel' => '82', 'desc' => 'NBA|英超'],
//            ['name' => '赛事通道6', 'channel' => '83', 'desc' => 'NBA|英超'],
//            ['name' => '赛事通道7', 'channel' => '84', 'desc' => 'NBA|英超'],
//            ['name' => '赛事通道10', 'channel' => '92', 'desc' => 'NBA|英超'],
//            ['name' => '赛事通道11', 'channel' => '93', 'desc' => 'NBA|英超'],
            ['name' => '超级体育频道', 'channel' => '90', 'desc' => '超级体育频道'],
            ['name' => '幸福彩', 'channel' => '100', 'desc' => '专业赌球频道'],
            ['name' => '五星体育', 'channel' => '74', 'desc' => '五星体育'],
            ['name' => '游戏风云', 'channel' => '38', 'desc' => '游戏风云'],
        ];
        $lines = $this->getLiveChannel();
        foreach ($lines as $line) {
            if (!empty($line['title'])) {
                $lives[] = ['name' => $line['name'], 'channel' => $line['tid'], 'desc' => $line['title']];
            }
        }
        $ets = EncodeTask::query()->where('from', 'SS')->where('status', 1)->get();
        return view('manager.pull.baitv', ['lives' => $lives, 'ets' => $ets, 'channels' => $this->channels]);
    }

    public function getLiveUrl(Request $request, $id)
    {
        $lines = $this->getLiveLines($id);
        if (!empty($lines)) {
            return response($lines['live']);
//            return view('manager.pull.cntv_lines', ['lines' => $lines]);
        }
        return response('信号还在路上，等会再来看看！');
    }

    private function getLiveChannel()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://bestvapi.bestv.cn/video/tv_list?app=ios&cid=3&token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkZXZpY2VJZCI6ImlQaG9uZTgsMV8wX0VBMTcwRTY0LTRBMEMtNDM3Ny04NDc0LUU5RTFGQThBQTM0RiIsInRpbWVzdGFtcCI6MTUyMzM0MjkxNSwiY2hhbm5lbElkIjoiY2QxNTE2OTUtYThjYi00MDhkLWExYjAtYWI2MTU1NmNlNWE1In0.wdqdIRBAyfk2532OA7m4TGX8IoR08HrbaVU8fx8LKHs');
        curl_setopt($ch, CURLOPT_COOKIE, 'PHPSESSID=m74odlt972oksvpfjphrbd25h3');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //跳过证书检查
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_USERAGENT, "BesTV/1 CFNetwork/897.15 Darwin/17.5.0");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
//        curl_setopt($ch, CURLOPT_VERBOSE, true);
//        $verbose = fopen('php://temp', 'w+');
//        curl_setopt($ch, CURLOPT_STDERR, $verbose);
        $response = curl_exec($ch);
//        dump($response);
//        rewind($verbose);
//        $verboseLog = stream_get_contents($verbose);
//        echo "Verbose information:\n<pre>", htmlspecialchars($verboseLog), "</pre>\n";
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);
//        dump($json);
        if (!empty($json['data']['list'])) {
            return $json['data']['list'];
        } else {
            return null;
        }
    }

    private function getLiveLines($channelID)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://bestvapi.bestv.cn/video/live_rate?app=ios&tid=' . $channelID . '&token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkZXZpY2VJZCI6ImlQaG9uZTgsMV8wX0VBMTcwRTY0LTRBMEMtNDM3Ny04NDc0LUU5RTFGQThBQTM0RiIsInRpbWVzdGFtcCI6MTUyMzM0MjkxNSwiY2hhbm5lbElkIjoiY2QxNTE2OTUtYThjYi00MDhkLWExYjAtYWI2MTU1NmNlNWE1In0.wdqdIRBAyfk2532OA7m4TGX8IoR08HrbaVU8fx8LKHs');
        curl_setopt($ch, CURLOPT_COOKIE, 'PHPSESSID=m74odlt972oksvpfjphrbd25h3');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (env('APP_ENV') == 'production') {//
            curl_setopt($ch, CURLOPT_PROXY, '172.18.233.204');
            curl_setopt($ch, CURLOPT_PROXYPORT, '11111');
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //跳过证书检查
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_USERAGENT, "BesTV/1 CFNetwork/897.15 Darwin/17.5.0");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);
//        dump($json);
        if (!empty($json['data'])) {
            $data = array_pop($json['data']);
            if (empty($data['live'])) {
                $data = array_pop($json['data']);
            }
            if (empty($data['live'])) {
                $data = array_pop($json['data']);
            }
            return $data;
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
