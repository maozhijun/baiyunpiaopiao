<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;

class Esport007 extends Channel
{
    //推流没问题，但是播放必须设置referee
    const REFEREE = "http://www.esport007.com/";

    public $id = 316;//平台ID
    public $name = 'esport007.com';//平台名称
    public $level = 3;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    public function __construct($uid = 0)
    {
        $host = "live007.zyjrvan.cn";

        $key = strtolower(str_random(32));
        $this->streamURL = 'rtmp://video-center.alivecdn.com/esport007';
        $this->streamKey = $key."?vhost=$host";
        $this->playFlv = 'http://'.$host.'/esport007/' . $key . '.flv';
        $this->playM3U8 = 'http://'.$host.'/esport007/' . $key . '.m3u8';
        $this->playRTMP = 'rtmp://'.$host.'/esport007/' . $key;
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