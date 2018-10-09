<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;
use Protos\AnchorCreate_Request;
use Protos\ResultResponse;

/**
 * 基本不用看了，接口做了验证配置，拿不到推流地址了
 */
class Uplive extends Channel
{
    const UPLIVE_TOKENS = [
        "61jDgsKa16589d3DCq8",
        "61iG2zS417a1332GHuM",
        "61jMOJUeb1b9703DCq8",
        "61jf6Nf5039ea63VuuJ",
        "61jfx3y5aa8fb53WP74",
        "61jfxK4b4dca3d3WPNA",
        "61jfxRJ9869f353WPUP", //账号被封了
        "61jfxXxa744e023WPb3", //账号被封了
    ];

    public $id = 315;//平台ID
    public $name = 'up.live';//平台名称
    public $level = 3;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    public function __construct($uid = 0, $index = 0)
    {
        $pushStreamUrl = $this->getPushStreamUrl(self::UPLIVE_TOKENS[$index]);
        if (strlen($pushStreamUrl) > 0 && starts_with($pushStreamUrl, "rtmp://")) {
            $liveChannel = ""; $streamUrl = ""; $key = "";$playFlv = "";$palyM3u8 = "";
            if (str_contains($pushStreamUrl, "/ws/")) { //网宿的推流地址
                $liveChannel = "ws";
                list($streamUrl, $key) = explode("/$liveChannel/", $pushStreamUrl, 2);
                list($roomName, $sign) = explode("?", $key, 2);
                $playFlv = str_replace("rtmp://wspush", "http://wsflv", $streamUrl)."/$liveChannel/$roomName.flv";
                $palyM3u8 = str_replace("rtmp://wspush", "http://wshls", $streamUrl)."/$liveChannel/$roomName/playlist.m3u8";
            } else if (str_contains($pushStreamUrl, "/pepperexpiry/")) { //七牛的推流地址
                $liveChannel = "pepperexpiry";
                list($streamUrl, $key) = explode("/$liveChannel/", $pushStreamUrl, 2);
                list($roomName, $sign) = explode("?", $key, 2);
                $playFlv = str_replace("rtmp://pili-publish", "http://pili-live-hdl", $streamUrl)."/$liveChannel/$roomName.flv";
                $palyM3u8 = str_replace("rtmp://pili-publish", "http://pili-live-hls", $streamUrl)."/$liveChannel/$roomName.m3u8";
            }
            if (strlen($liveChannel) > 0) {
                $this->streamURL = "$streamUrl/$liveChannel";
                $this->streamKey = $key;
                $this->playFlv = $playFlv;
                $this->playM3U8 = $palyM3u8;
            }
        }
    }

    private function getPushStreamUrl($token) {
        $request = new AnchorCreate_Request();
        $request->setLiveType(40);
        $request->setContinueFlag(2);

        $requestStr = $request->serializeToString();

        $url = "https://a.upliveapp.com/room/room/anchor/create";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);//8秒超时
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求 不验证证书和hosts
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestStr);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Charset: UTF-8", "userToken: $token", "Content-Type: application/x-protobuf", "Accept: application/x-protobuf"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec ($ch);

        if (strlen($response) <= 0) return "";

        list($header, $body) = explode("\r\n\r\n", $response, 2);
        curl_close ($ch);

        $response = new ResultResponse();
        try {
            $response->parseFromString($body);

            $data = $response->getData()->getValue();

            $liveMsg = $data->getLiveMsg();
            $jsonMsg = json_decode($liveMsg, true);
            return $jsonMsg['40'];
        } catch (\Exception $ex) {
            return "";
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