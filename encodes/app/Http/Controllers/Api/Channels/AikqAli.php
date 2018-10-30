<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;

class AikqAli extends Channel
{
    public $id = 999;//平台ID
    public $name = '阿里(流量包)';//平台名称
    public $level = 1;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $ali_host = "";
    private $ali_key = "";

    private $streamURL = '';
    private $streamKey = '';

    private $playFlv = '';
    private $playRTMP = '';
    private $playM3U8 = '';

    public function __construct($uid = 0)
    {
        $this->expiration = time() + 21600;
        $this->ali_host = env('ALI_CDN_HOST', '');
        $this->ali_key = env('ALI_CDN_KEY', '');
        $key = 'stream-' . $uid . '-' . time() . '-' . random_int(111111, 999999);
        $timestamp = $this->expiration;

        $sstring = '/live/' . $key . "-$timestamp-0-0-" . $this->ali_key;
        $auth_key = "$timestamp-0-0-" . md5($sstring);
        $this->streamURL = 'rtmp://video-center.alivecdn.com/live';//流地址
        $this->streamKey = $key . '?vhost=' . $this->ali_host . '&auth_key=' . $auth_key;//流名称

        $sstring = '/live/' . $key . ".flv-$timestamp-0-0-" . $this->ali_key;
        $auth_key = "$timestamp-0-0-" . md5($sstring);
        $this->playFlv = 'http://' . $this->ali_host . '/live/' . $key . '.flv?auth_key=' . $auth_key;//flv播放地址

        $sstring = '/live/' . $key . ".m3u8-$timestamp-0-0-" . $this->ali_key;
        $auth_key = "$timestamp-0-0-" . md5($sstring);
        $this->playM3U8 = 'http://' . $this->ali_host . '/live/' . $key . '.m3u8?auth_key=' . $auth_key;//播放m3u8地址
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
}