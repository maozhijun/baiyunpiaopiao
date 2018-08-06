<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;

class Longzhu extends Channel
{
    public $id = 301;//平台ID
    public $name = 'longzhu.com';//平台名称
    public $level = 3;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    public function __construct($uid = 0)
    {
        $key = str_random(32);
        $this->streamURL = 'rtmp://push12.plures.net/onlive';
        $this->streamKey = $key;
        $this->playFlv = 'http://hdl1201.plures.net/onlive/' . $key . '.flv';
        $this->playM3U8 = 'http://hdl1202.plures.net/onlive/' . $key . '.m3u8';
        $this->playRTMP = 'rtmp://hdl1203.plures.net/onlive/' . $key;
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