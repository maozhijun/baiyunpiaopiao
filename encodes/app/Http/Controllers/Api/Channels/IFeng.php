<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;
use Illuminate\Support\Facades\Redis;

class IFeng extends Channel
{
    public $id = 321;//平台ID
    public $name = 'ifeng.com';//平台名称
    public $level = 3;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    public function __construct($uid = 0, $key = "")
    {
        if (strlen($key) <= 0) {
            $key = "1vaAWyy000e_" . (random_int(pow(10, 4), pow(10, 5) - 1));
        }
        $this->streamURL = 'rtmp://push-ali.ifeng.com/live';
        $this->streamKey = $key;
        $this->playFlv = 'http://play-ali.ifeng.com/live/' . $key . '.flv';
        $this->playM3U8 = 'http://play-ali.ifeng.com/live/' . $key . '.m3u8';
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