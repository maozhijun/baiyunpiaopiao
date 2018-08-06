<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;

class Xiaoka extends Channel
{
    public $id = 203;//平台ID
    public $name = 'xiaoka.tv';//平台名称
    public $level = 2;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    public function __construct($uid = 0)
    {
        $key = str_random(16);
        $this->streamURL = 'rtmp://video-center.alivecdn.com/live';
        $this->streamKey = $key . '?vhost=al01.alcdn.hls.xiaoka.tv';
        $this->playFlv = 'https://al01.alcdn.hls.xiaoka.tv/live/' . $key . '.flv';
        $this->playM3U8 = '';
        $this->playRTMP = 'rtmp://al01.alcdn.hls.xiaoka.tv/live/' . $key;
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