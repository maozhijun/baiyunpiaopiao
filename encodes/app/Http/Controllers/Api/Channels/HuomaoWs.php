<?php
/**
 * Created by PhpStorm.
 * User: ricky007
 * Date: 2018/7/31
 * Time: 18:44
 */

namespace App\Http\Controllers\Api\Channels;


use App\Http\Controllers\Api\Channel;

class HuomaoWs  extends Channel
{
    public $id = 309;//平台ID
    public $name = 'huomao.com';//平台名称
    public $level = 2;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    private $huoMaoRoomUrl;

    /**
     * 房间地址：https://www.huomao.com/771852
     * 房间号 771852、268462
     */
    const STREAM_ANCHOR_ROOMS = [
        4428, 8850, 11279, 6734, 8707,
        12073, 233878, 9129, 273504, 5656
    ];
    const STREAM_ANCHOR_IDS = [
        4428=>387678 ,
        8850=>807255,
        11279=>1545383,
        6734=>582923,
        8707=>772032,
        12073=>1858774,
        233878=>15118738,
        9129=>847641,
        273504=>14926750,
        5656=>483539
    ];

    public function __construct()
    {
        $roomId = self::STREAM_ANCHOR_ROOMS[random_int(1, count(self::STREAM_ANCHOR_ROOMS)) - 1];
        $this->huoMaoRoomUrl = "https://www.huomao.com/$roomId";

        $uid = self::STREAM_ANCHOR_IDS[$roomId];
        $result = $this->getStream($uid);
        $this->streamURL = isset($result['stream_url']) ? $result['stream_url'] : '';
        $this->streamKey = isset($result['stream_name']) ? $result['stream_name'] : '';;
        $this->playFlv = isset($result['play_flv']) ? $result['play_flv'] : '';
        $this->playM3U8 = isset($result['play_m3u8']) ? $result['play_m3u8'] : '';
        $this->playRTMP = isset($result['play_rtmp']) ? $result['play_rtmp'] : '';
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

    private function getStream($uid)
    {
        $url = "http://api.huomao.com/stream/getAnchorStream?uid=$uid";
        $refer = "androidLive";
        $url .= "&refer=".$refer;
        $accessToken = md5(random_bytes(10));//随便写的token
        $url .= "&access_token=".$accessToken;
        $expiresTime = strtotime('+3 hours');//随便写的过期时间
        $url .= "&expires_time=".$expiresTime;
        $time = time(); //当前时间（也可以随便写）
        $url .= "&time=".$time;
        $token = md5($accessToken.$expiresTime.$refer.$time.$uid."EU*T*)*(#23ssdfd");
        $url .= "&token=".$token;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_COOKIE, "Hm_lvt_11f833fcd634f41462d9c452077f1776=1530763998; INKEUSERINFO=%7B%22name%22%3A%22NBA%5Cu89e3%5Cu8bf4%22%2C%22pic%22%3A%22http%3A%5C%2F%5C%2Fimage.scale.inke.cn%5C%2Fimageproxy2%5C%2Fdimgm%5C%2FscaleImage%3Furl%3Dhttp%253A%252F%252Fimg2.inke.cn%252FMTUxNTY0OTg0ODQ2MSM0NDAjanBn.jpg%26w%3D100%26h%3D100%26s%3D80%26c%3D0%26o%3D0%22%2C%22view_id%22%3A104099414%2C%22level%22%3A1%2C%22gender%22%3A1%7D; INKEUSERLOGININFO=f7fba40b1ddb13feca4246910d541881bb8989c5d9d4f84b3ff01cb177b0fc9fdf4e929a2f8a26cbec288b389bcad74c2c05cd7c6c4d9c2f2740d4cb1e0e63becaaecd185e7ffd1655bec160a4ed2a481441e27a5f33e34b5de0b2058d63a7838b84253f7de9cd2cc00210e43001b5704a6d6d24676382b267eb27f095f9f01f4a99ff6d86d31b7635a168efbaca6abc892aba5bd7828be03805e2f5935597610a5a18f850d4e2408506bf2928f8cface14a655c2b91d9218ce7b6dcd2294483ea5605ef66e983ae902ad232c14e30d2eef77533faab278924872a7f7e1f9f9da389defa7fa790a46c35683cbcd3348dbc6fcb215401a1502e170d95bab7719ca0f3ec439d93e5e1e82bac6b03443e711ff6240f161dbc3a8a0358ca1928cd5b41ca1428ab1abbf45b20fa3ed80dfb610567ed26ec90e1ce278991b8acf57e6cf9431fdbad611be43fa96321138eee698b60cb3938e9b8c4c434769c9c263838adbacfcdaa853c4ad65aef72979674a8; INKEAPISESSION=a6h13CVqKrbuXGSkmFlmiGaN%2B2SJuVYqgNIPy3kxwdNt%2FF3yJxeNbU6phYss9E4jI%2FLaK9HOp8Oo75SMOziZqwIThCBz5xIwWc1plVOw8Di%2B04vbpJi9GG0DzSxii15wlvThlSSfXBrFVbKTFbNZnrNuymfF5%2Fl0Y62xRtLGaaZFjP%2Bl3PrBhiQOcbv%2F5R1B%2FHWggqg2pkyZsI%2F4y7qfO298VoEQVVx%2BmRJ1qRHTBdiHzwlXKGPvPowxtATkrLQ4ezSLMWniohcpGc82DFHCjs1oAYqD3miOYHgFDPWKtm8saKkWvvuwfhoNGXX%2FZqtDpaZagC7KR1zZvULQpFj6j64K%2FaEddDXXQwvlB37LMMntPsJmuFlbVc0VaR2MBQGZYEN7F275MZP%2FV4CfO2lHZIpazjiqFdBfgSI4iS9snn%2B51lcsYTTb2tUyr%2B8fR4%2B8qYLLAYIsV6R2fOdpX2lBL%2BIDmMopvh9iD7KXHZ%2BCZBs%3D; PHPSESSID=f3572526f955a498cecef6218d35c792; Hm_lpvt_11f833fcd634f41462d9c452077f1776=1530764373");
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, "id=0&screen_orientation=portrait&name=&gps_position=");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
//        curl_setopt($ch, CURLOPT_REFERER, 'http://www.inke.cn/live_flow.html');
        curl_setopt($ch, CURLOPT_USERAGENT, "okhttp/3.8.0");
//        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_exec($ch);
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        $result = [];
        if (!empty($json['data']) && !empty($json['data']['stream'])) {
            $streamId = $json['data']['stream'];

            $streamList = $json['data']['streamList'];
            $pushUrl = "";
            foreach ($streamList as $streamItem) {
                if ($streamItem['name'] == "TX") {
                    $pushUrl = $streamItem['stream'];
                }
            }
            if ($pushUrl != "") {
                list($stream_url, $stream_name) = explode($streamId, $pushUrl);
                $result['stream_url'] = "rtmp://send-e.huomaotv.cn/live/";
                $result['stream_name'] = $streamId.$stream_name;
                $result['play_flv'] = "http://live-js-hdl.huomaotv.cn/live/$streamId.flv";
                $result['play_m3u8'] = "http://live-ws-hls.huomaotv.cn/live/$streamId/playlist.m3u8";
            }
        }
        return $result;
    }
}