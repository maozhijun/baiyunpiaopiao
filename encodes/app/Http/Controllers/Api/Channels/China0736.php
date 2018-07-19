<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;

class China0736 extends Channel
{
    public $id = 107;//平台ID
    public $name = 'china0736.com';//平台名称
    public $level = 1;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    public function __construct()
    {
        $key = 'vod_' . random_int(11111111, 99999999);
        $this->streamURL = 'rtmp://push.china0736.com/vod';
        $this->streamKey = $key;
        $this->playFlv = '';
        $this->playM3U8 = 'http://hls.china0736.com/vod/' . $key . '.m3u8';
        $this->playRTMP = 'rtmp://live.china0736.com/vod/' . $key;
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