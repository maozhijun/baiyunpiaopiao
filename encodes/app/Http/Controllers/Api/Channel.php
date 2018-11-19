<?php
/**
 * Created by PhpStorm.
 * User: maozhijun
 * Date: 2018/7/19
 * Time: 11:40
 */

namespace App\Http\Controllers\Api;


abstract class Channel
{
    public $id = 0;//平台ID
    public $name = '';//平台名称
    public $level = 1;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    public abstract function pushURL();

    public abstract function pushKey();

    public abstract function playFLV();

    public abstract function playRTMP();

    public abstract function playM3U8();

    public function playFLVHD(){
        return $this->playFLV();
    }

    public function playRTMPHD(){
        return $this->playRTMP();
    }

    public function playM3U8HD(){
        return $this->playM3U8();
    }

    public function pushWholeUrl() {
        $pushUrl = $this->pushURL();
        if ($pushUrl == null || strlen($pushUrl) <= 0) return $pushUrl;
        if (ends_with($pushUrl, '/')) {
            return $pushUrl.$this->pushKey();
        } else {
            return $pushUrl."/".$this->pushKey();
        }
    }

    public function playAllUrl() {
        $flv = $this->playFLV();
        $rtmp = $this->playRTMP();
        $m3u8 = $this->playM3U8();

        $text = "";
        if ($flv != null && strlen($flv) > 0) {
            $text .= $flv. "\n";
        }
        if ($rtmp != null && strlen($rtmp) > 0) {
            $text .= $rtmp. "\n";
        }
        if ($m3u8 != null && strlen($m3u8) > 0) {
            $text .= $m3u8. "\n";
        }
        return trim($text);
    }

    /**
     * 请求网络数据的通用方法
     * @param $url
     * @param int $timeout
     * @param bool $isHttps
     * @return mixed
     */
    protected function execUrl($url, $timeout = 5, $isHttps = false) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);//8秒超时
        if ($isHttps) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求 不验证证书和hosts
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $server_out = curl_exec ($ch);
        curl_close ($ch);
        return $server_out;
    }
}
