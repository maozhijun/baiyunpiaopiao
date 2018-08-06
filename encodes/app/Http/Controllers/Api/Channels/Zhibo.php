<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;

class Zhibo extends Channel
{
    public $id = 302;//平台ID
    public $name = 'zhibo.tv';//平台名称
    public $level = 3;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    public function __construct($uid = 0)
    {
        $roomId = 's_9' . random_int(111111, 999999);
        $ss = [2, 3, 6];
        $i = $ss[array_rand($ss)];
        switch ($i) {
            case 2: {
                $this->streamURL = 'rtmp://stream2.zhibo.tv/8live/';
                $this->streamKey = $roomId;
                $this->playRTMP = 'rtmp://live2.zhibo.tv/8live/' . $roomId;//播放rtmp地址
                $this->playM3U8 = 'http://hls.live2.zhibo.tv/8live/' . $roomId . '/playlist.m3u8';//播放m3u8地址
                break;
            }
            case 3: {
                $this->streamURL = 'rtmp://stream3.zhibo.tv/8live/';
                $this->streamKey = $roomId;
                $this->playRTMP = 'rtmp://live3.zhibo.tv/8live/' . $roomId;//播放rtmp地址
                $this->playM3U8 = 'http://hls.live3.zhibo.tv/8live/' . $roomId . '/playlist.m3u8';//播放m3u8地址
                break;
            }
            case 6: {
                $this->streamURL = 'rtmp://stream6.zhibo.tv/8live/';
                $this->streamKey = $roomId;
                $this->playRTMP = 'rtmp://live6.zhibo.tv/8live/' . $roomId;//播放rtmp地址
                $this->playM3U8 = 'http://hls.live6.zhibo.tv/8live/' . $roomId . '.m3u8';//播放m3u8地址
                break;
            }
        }
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