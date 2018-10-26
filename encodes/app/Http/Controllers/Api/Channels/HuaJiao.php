<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;

class HuaJiao extends Channel
{
    public $id = 318;//平台ID
    public $name = 'huajiao.com';//平台名称
    public $level = 3;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    public function __construct($uid = 0)
    {
        $key = "LC_QH2_non_1316597891".random_int(pow(10, 15), pow(10, 16) - 1)."_OX";
        $this->streamURL = 'rtmp://qh2-publish.live.huajiao.com/live_huajiao_v2/';
        $this->streamKey = $key;
        $this->playFlv = 'http://qh2-flv.live.huajiao.com/live_huajiao_v2/' . $key . '.flv';
        $this->playM3U8 = 'http://qh2-hls.live.huajiao.com/live_huajiao_v2/' . $key . '/index.m3u8';
//        $this->playRTMP = 'rtmp://hdl0903.plures.net/onlive/' . $key;
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