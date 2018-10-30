<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;

class AikqWS extends Channel
{
    public $id = 998;//平台ID
    public $name = '网宿(带宽)';//平台名称
    public $level = 1;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $push_host = "";
    private $hls_host = "";
    private $hdl_host = "";
    private $ws_key = "";

    private $streamURL = '';
    private $streamKey = '';

    private $playFlv = '';
    private $playRTMP = '';
    private $playM3U8 = '';

    private $playFlvSD = '';
    private $playRTMPSD = '';
    private $playM3U8SD = '';

    public function __construct($uid = 0)
    {
        $this->expiration = time() + 21600;
        $this->push_host = env('WS_PUSH_HOST', '');
        $this->hls_host = env('WS_HLS_HOST', '');
        $this->hdl_host = env('WS_HDL_HOST', '');
        $this->ws_key = env('WS_PUSH_KEY', '');
        $key = 'stream-' . $uid . '-' . time() . '-' . random_int(111111, 999999);
//        if ($uid == 0) {
//            $key = 'stream-' . $uid . '-' . time() . '-' . random_int(111111, 999999);
//        } else {
//            $key = 'stream-' . $uid;
//        }
        $timestamp = $this->expiration;

        $sstring = $this->ws_key . '/live/' . $key . "$timestamp";
        $auth_key = md5($sstring);
        $this->streamURL = "rtmp://$this->push_host/live";//流地址
        $this->streamKey = $key . '?wsSecret=' . $auth_key . '&wsABSTime=' . $timestamp;//流名称

        $sstring = $this->ws_key . '/live/' . $key . ".flv$timestamp";
        $auth_key = md5($sstring);
        $this->playFlv = 'http://' . $this->hdl_host . '/live/' . $key . '.flv?wsSecret=' . $auth_key . '&wsABSTime=' . $timestamp;//flv播放地址

        $sstring = $this->ws_key . '/live/' . $key . "-sd.flv$timestamp";
        $auth_key = md5($sstring);
        $this->playFlvSD = 'http://' . $this->hdl_host . '/live/' . $key . '-sd.flv?wsSecret=' . $auth_key . '&wsABSTime=' . $timestamp;//flv播放地址

        $sstring = $this->ws_key . '/live/' . $key . "/playlist.m3u8$timestamp";
        $auth_key = md5($sstring);
        $this->playM3U8 = 'http://' . $this->hls_host . '/live/' . $key . '/playlist.m3u8?wsSecret=' . $auth_key . '&wsABSTime=' . $timestamp;//播放m3u8地址

        $sstring = $this->ws_key . '/live/' . $key . "-sd/playlist.m3u8$timestamp";
        $auth_key = md5($sstring);
        $this->playM3U8SD = 'http://' . $this->hls_host . '/live/' . $key . '-sd/playlist.m3u8?wsSecret=' . $auth_key . '&wsABSTime=' . $timestamp;//播放m3u8地址
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
//        return $this->playFlv;
        return $this->playFlvSD;
    }

    public function playRTMP()
    {
//        return $this->playRTMP;
        return $this->playRTMPSD;
    }

    public function playM3U8()
    {
//        return $this->playM3U8;
        return $this->playM3U8SD;
    }
}