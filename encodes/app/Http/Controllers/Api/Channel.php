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
}
