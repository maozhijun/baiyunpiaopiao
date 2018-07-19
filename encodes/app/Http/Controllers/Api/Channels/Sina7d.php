<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;

class Sina7d extends Channel
{
    public $id = 204;//平台ID
    public $name = 'sina.7d';//平台名称
    public $level = 2;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    public function __construct()
    {
        $key = time();
        $this->streamURL = 'rtmp://video-center.alivecdn.com/live';
        $this->streamKey = $key . '?vhost=7dcdn.ivideo.sina.com.cn';
        $this->playFlv = '';
        $this->playM3U8 = '';
        $this->playRTMP = 'rtmp://7dcdn.ivideo.sina.com.cn/live/' . $key;
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