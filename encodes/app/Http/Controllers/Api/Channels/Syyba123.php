<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;

class Syyba123 extends Channel
{
    public $id = 106;//平台ID
    public $name = 'syyba123.com';//平台名称
    public $level = 1;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    public function __construct()
    {
        $key = 'le' . random_int(1111, 9999) . time() . random_int(1111111, 9999999);
        $this->streamURL = 'rtmp://pushabc2018aa.yjyc-ask.com/live';
        $this->streamKey = $key;
        $this->playFlv = 'http://rtmppullabc2018aa.yjyc-ask.com/live/' . $key . '.flv';
        $this->playM3U8 = 'http://rtmppullabc2018aa.yjyc-ask.com/live/' . $key . '/playlist.m3u8';
        $this->playRTMP = 'rtmp://rtmppullabc2018aa.yjyc-ask.com/live/' . $key;
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