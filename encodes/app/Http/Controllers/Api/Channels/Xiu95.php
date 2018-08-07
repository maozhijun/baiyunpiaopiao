<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;

class Xiu95 extends Channel
{
    public $id = 210;//平台ID
    public $name = '95xiu.com';//平台名称
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
        $this->streamURL = 'rtmp://pub.95xiu.com/app/';
        $this->streamKey = $key;
        $this->playFlv = 'http://play.95xiu.com/app/' . $key . '.flv';
        $this->playM3U8 = '';
        $this->playRTMP = "";
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