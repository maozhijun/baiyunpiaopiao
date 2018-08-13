<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;
use Illuminate\Support\Facades\Redis;

class Weibo extends Channel
{
    const STREAM_LIVE_ID_KEYS = "weibo_last_live_ids";

    public $id = 312;//平台ID
    public $name = 'weibo.com';//平台名称
    public $level = 3;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    private $requestCount;

    public function __construct()
    {
        $result = $this->getStream();
        $this->streamURL = isset($result['stream_url']) ? $result['stream_url'] : '';
        $this->streamKey = isset($result['stream_name']) ? $result['stream_name'] : '';;
        $this->playFlv = isset($result['play_flv']) ? $result['play_flv'] : '';
        $this->playM3U8 = isset($result['play_m3u8']) ? $result['play_m3u8'] : '';
        $this->playRTMP = isset($result['play_rtmp']) ? $result['play_rtmp'] : '';
    }

    public function pushURL()
    {
        return $this->streamURL;
    }

    public function pushKey()
    {
        return $this->streamKey;
    }

    public function playFLV()
    {
        return $this->playFlv;
    }

    public function playRTMP()
    {
        return $this->playRTMP;
    }

    public function playM3U8()
    {
        return $this->playM3U8;
    }

    private function getStream()
    {
        //先关闭上次调用的流，才可以获取新的推流地址（除非重新推流，否则不会断）
        $this->onStreamFinish();

        $result = array();
        foreach (range(0, 5) as $index) {
            if (count($result) > 0) {
                $this->requestCount = $index;
                break;
            } else {
                $result = $this->onStreamCreate();
            }
        }
        if (isset($result['code']) && $result['code'] == 404) {
            return array();
        }
        return $result;
    }

    private function onStreamCreate() {
//        $url = "http://api.weibo.cn/2/live/create?networktype=wifi&moduleID=700&wb_version=3724&c=android&i=83b2637&s=e8f3d64e&ft=0&ua=Meizu-m2%20note__weibo__8.8.0__android__android5.1&wm=9848_0009&aid=01AufVrbaTCXKSczdXZdl7pPDQzsfmJEbBwtizMfBAE1l9uEw.&v_f=2&v_p=63&from=1088095010&gsid=_2A252aR3WDeRxGeBL6FUS8CzEzDSIHXVTPxYerDV6PUJbkdAKLVPxkWpNRw-yQX3wj1Ngu3Lrv5tV4YMGUMiCZx6f&lang=zh_CN&skin=default&oldwm=19005_0019&sflag=1&cum=0D6A7190";
        $url = "http://api.weibo.cn/2/live/create?c=android&s=e8f3d64e&from=1088095010&gsid=_2A252aR3WDeRxGeBL6FUS8CzEzDSIHXVTPxYerDV6PUJbkdAKLVPxkWpNRw-yQX3wj1Ngu3Lrv5tV4YMGUMiCZx6f";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, "id=0&screen_orientation=portrait&name=&gps_position=");
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
//        curl_setopt($ch, CURLOPT_REFERER, 'http://www.inke.cn/live_flow.html');
//        curl_setopt($ch, CURLOPT_USERAGENT, " m2 note_5.1_weibo_8.8.0_android");
//        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
//        curl_exec($ch);
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        $result = [];
        if (!empty($json['data']) && !empty($json['data']['push_url'])) {
            $pushUrl = $json['data']['push_url'];
            if (count(explode("/live/", $pushUrl)) == 2) {
                list($pushHost, $streamName) = explode("/live/", $pushUrl);
                if (str_contains($pushHost, "rtmp://al")) {
                    $result['stream_url'] = $pushHost."/live/";
                    $result['stream_name'] = $streamName;
                    $result['play_flv'] = $json['data']["live_flv_hd"];
                    $result['play_m3u8'] = $json['data']["live_hd"];
                    $result['play_rtmp'] = $json['data']["rtmp_hd"];

                    //把live_id保存到redis
                    $this->saveLastStreamLiveId($json['data']['live_id']);
                }
            }
        } else {
            $result['code'] = 404;
        }
        return $result;
    }

    private function onStreamFinish() {
//        $finishUrl = "http://api.weibo.cn/2/live/finish?networktype=wifi&moduleID=700&wb_version=3724&c=android&i=83b2637&s=e8f3d64e&ft=0&ua=Meizu-m2%20note__weibo__8.8.0__android__android5.1&wm=9848_0009&aid=01AufVrbaTCXKSczdXZdl7pPDQzsfmJEbBwtizMfBAE1l9uEw.&v_f=2&v_p=63&from=1088095010&gsid=_2A252aR3WDeRxGeBL6FUS8CzEzDSIHXVTPxYerDV6PUJbkdAKLVPxkWpNRw-yQX3wj1Ngu3Lrv5tV4YMGUMiCZx6f&lang=zh_CN&skin=default&oldwm=19005_0019&sflag=1&cum=876FECE4&live_id=1042097:592819922_VibQV_tj0nvuClvF";
        $finishUrl = "http://api.weibo.cn/2/live/finish?c=android&s=e8f3d64e&from=1088095010&gsid=_2A252aR3WDeRxGeBL6FUS8CzEzDSIHXVTPxYerDV6PUJbkdAKLVPxkWpNRw-yQX3wj1Ngu3Lrv5tV4YMGUMiCZx6f&live_id=";

        $lastLiveIdStr = Redis::get(self::STREAM_LIVE_ID_KEYS);
//        dump($lastLiveIdStr);
        if ($lastLiveIdStr != null) {
            $lastLiveIds = explode(",", $lastLiveIdStr);
//            dump($lastLiveIds);
            if (is_array($lastLiveIds)) {
                foreach ($lastLiveIds as $lastLiveId) {
                    if ($lastLiveId != null) {
                        $url = $finishUrl.$lastLiveId;

                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        if ($error = curl_error($ch)) {
                            die($error);
                        }
                        curl_close($ch);
//                        dump($response);
                        usleep(1000);
                    }
                }
            }
        }
    }

    private function saveLastStreamLiveId($liveId) {
        //把live_id保存到redis
        $lastLiveIdStr = Redis::get(self::STREAM_LIVE_ID_KEYS);
        if ($lastLiveIdStr == null) {
            $lastLiveIds = array();
        } else {
            $lastLiveIds = explode(",", $lastLiveIdStr);
        }
        if (!is_array($lastLiveIds)) {
            $lastLiveIds = array();
        }
        if (is_array($lastLiveIds) && count($lastLiveIds) > 5) {
            unset($lastLiveIds[0]);
        }
        $lastLiveIds[] = $liveId;
        Redis::set(self::STREAM_LIVE_ID_KEYS, implode(",", $lastLiveIds));
    }
}