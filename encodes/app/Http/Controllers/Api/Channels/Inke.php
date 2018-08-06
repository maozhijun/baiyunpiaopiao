<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;

class Inke extends Channel
{
    public $id = 208;//平台ID
    public $name = 'inke.com';//平台名称
    public $level = 2;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    public function __construct($uid = 0)
    {
        $result = $this->getInkeStream();
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

    private function getInkeStream()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://openact.busi.inke.cn/stream/get_pull_stream");
        curl_setopt($ch, CURLOPT_COOKIE, "Hm_lvt_11f833fcd634f41462d9c452077f1776=1530763998; INKEUSERINFO=%7B%22name%22%3A%22NBA%5Cu89e3%5Cu8bf4%22%2C%22pic%22%3A%22http%3A%5C%2F%5C%2Fimage.scale.inke.cn%5C%2Fimageproxy2%5C%2Fdimgm%5C%2FscaleImage%3Furl%3Dhttp%253A%252F%252Fimg2.inke.cn%252FMTUxNTY0OTg0ODQ2MSM0NDAjanBn.jpg%26w%3D100%26h%3D100%26s%3D80%26c%3D0%26o%3D0%22%2C%22view_id%22%3A104099414%2C%22level%22%3A1%2C%22gender%22%3A1%7D; INKEUSERLOGININFO=f7fba40b1ddb13feca4246910d541881bb8989c5d9d4f84b3ff01cb177b0fc9fdf4e929a2f8a26cbec288b389bcad74c2c05cd7c6c4d9c2f2740d4cb1e0e63becaaecd185e7ffd1655bec160a4ed2a481441e27a5f33e34b5de0b2058d63a7838b84253f7de9cd2cc00210e43001b5704a6d6d24676382b267eb27f095f9f01f4a99ff6d86d31b7635a168efbaca6abc892aba5bd7828be03805e2f5935597610a5a18f850d4e2408506bf2928f8cface14a655c2b91d9218ce7b6dcd2294483ea5605ef66e983ae902ad232c14e30d2eef77533faab278924872a7f7e1f9f9da389defa7fa790a46c35683cbcd3348dbc6fcb215401a1502e170d95bab7719ca0f3ec439d93e5e1e82bac6b03443e711ff6240f161dbc3a8a0358ca1928cd5b41ca1428ab1abbf45b20fa3ed80dfb610567ed26ec90e1ce278991b8acf57e6cf9431fdbad611be43fa96321138eee698b60cb3938e9b8c4c434769c9c263838adbacfcdaa853c4ad65aef72979674a8; INKEAPISESSION=a6h13CVqKrbuXGSkmFlmiGaN%2B2SJuVYqgNIPy3kxwdNt%2FF3yJxeNbU6phYss9E4jI%2FLaK9HOp8Oo75SMOziZqwIThCBz5xIwWc1plVOw8Di%2B04vbpJi9GG0DzSxii15wlvThlSSfXBrFVbKTFbNZnrNuymfF5%2Fl0Y62xRtLGaaZFjP%2Bl3PrBhiQOcbv%2F5R1B%2FHWggqg2pkyZsI%2F4y7qfO298VoEQVVx%2BmRJ1qRHTBdiHzwlXKGPvPowxtATkrLQ4ezSLMWniohcpGc82DFHCjs1oAYqD3miOYHgFDPWKtm8saKkWvvuwfhoNGXX%2FZqtDpaZagC7KR1zZvULQpFj6j64K%2FaEddDXXQwvlB37LMMntPsJmuFlbVc0VaR2MBQGZYEN7F275MZP%2FV4CfO2lHZIpazjiqFdBfgSI4iS9snn%2B51lcsYTTb2tUyr%2B8fR4%2B8qYLLAYIsV6R2fOdpX2lBL%2BIDmMopvh9iD7KXHZ%2BCZBs%3D; PHPSESSID=f3572526f955a498cecef6218d35c792; Hm_lpvt_11f833fcd634f41462d9c452077f1776=1530764373");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "id=0&screen_orientation=portrait&name=&gps_position=");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
        curl_setopt($ch, CURLOPT_REFERER, 'http://www.inke.cn/live_flow.html');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_setopt($ch, CURLOPT_URL, "http://openact.busi.inke.cn/stream/live_stop");
        curl_exec($ch);
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        $result = [];
        if (!empty($json['data']) && !empty($json['data']['pull_stream_url'])) {
            $rtmp_push_url = $json['data']['pull_stream_url'];
            $urls = explode('/', $rtmp_push_url);
            $stream_name = array_pop($urls);
            $stream_url = join('/', $urls);
            $result['stream_url'] = $stream_url;
            $result['stream_name'] = $stream_name;

            list($stream_id) = explode('?', $stream_name);
            $flv_pull_url = 'rtmp://wssource.pull.inke.cn/live/' . $stream_id;
            $hls_pull_url = 'http://wssource.hls.inke.cn/live/' . $stream_id . '/playlist.m3u8';
            $result['play_rtmp'] = $flv_pull_url;
            $result['play_m3u8'] = $hls_pull_url;
        }
        return $result;
    }
}