<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;

class Xiu9 extends Channel
{
    public $id = 211;//平台ID
    public $name = '9xiu.com';//平台名称
    public $level = 2;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    public function __construct($uid = 0)
    {
        $key = str_random(10);
        $this->streamURL = 'rtmp://publish.qn.9xiu.com/9xiu/';
        $this->streamKey = $key;
        $this->playFlv = 'https://live-hls-qn.9xiu.com/9xiu/' . $key . '.flv';
        $this->playM3U8 = 'https://live-hls-qn.9xiu.com/9xiu/'. $key. ".m3u8";
        $this->playRTMP = "rtmp://live-rtmp.qn.9xiu.com/9xiu/".$key;
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