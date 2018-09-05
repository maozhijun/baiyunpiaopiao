<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;
use Illuminate\Support\Facades\Redis;

class LiveMe extends Channel
{
    public $id = 313;//平台ID
    public $name = 'liveme.com';//平台名称
    public $level = 3;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    public function __construct($uid = 0)
    {
        $key = "1536113".(random_int(pow(10, 12), pow(10, 13) - 1));
        $this->streamURL = 'rtmp://pe.live.ksmobile.net/yolo';
        $this->streamKey = $key;
        $this->playFlv = 'http://ter.live.ksmobile.net/yolo/' . $key . '.flv';
        $this->playM3U8 = 'http://hlslive.live.ksmobile.net/yolo/' . $key . '/playlist.m3u8';
        $this->playRTMP = '';
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