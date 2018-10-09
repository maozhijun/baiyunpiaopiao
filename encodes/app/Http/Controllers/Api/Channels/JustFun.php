<?php

namespace App\Http\Controllers\Api\Channels;

use App\Http\Controllers\Api\Channel;
use App\Http\Controllers\ASBase64Decoder;

class JustFun extends Channel
{
    public $id = 318;//平台ID
    public $name = 'justfun.live';//平台名称
    public $level = 3;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    const ZHANGYU_HOST = "http://www.zhangyu.tv";
    const JUSTFUN_HOST = "http://www.justfun.live";
    const MIN_FAVOR_COUNT = 5; //用来筛选关注数非常少的主播

    private $streamURL;
    private $streamKey;

    private $playFlv;
    private $playRTMP;
    private $playM3U8;

    public function __construct($uid = 0, $keyword = "", $cid = 0)
    {
        if ($cid == 0) {
            if (strlen($keyword) <= 0) {
                $keyword = strtolower(str_random(1));
            }
            $cid = $this->getJustFunCid($keyword);
        }
        if ($cid > 0) {
            $zy_cid = $this->setPushUrl($cid);
            if (strlen($zy_cid) > 0) {
//                sleep(1);
//                $this->setFlvUrl($zy_cid);
                $this->setM3u8Url($zy_cid);
            }
        }
    }

    private function getJustFunCid($keyword) {
        $url = self::JUSTFUN_HOST."/live-channel-search/search/query?keyword=$keyword";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "device=android_phone&platform=android&deviceId=35a666f8-d865-32be-96fb-034884a90876&version=3.1.4&keyword=star&num=50&from=android&page=1");
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0; ZYTV/3.1.4)");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/x-www-form-urlencoded;charset=UTF-8"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);//5秒超时
        $dataStr = curl_exec ($ch);
        curl_close ($ch);

        $data = json_decode($dataStr, true);
        $cid = 0;
        if (is_array($data) && array_key_exists('items', $data)) {
            $items = $data['items'];
            foreach ($items as $item) {
                if (!$item['mobileStatus'] && !$item['isClose'] && $item['favorite'] < self::MIN_FAVOR_COUNT) {
                    $cid = $item['_id'];
                    break;
                }
            }
        }
        return $cid;
    }

    private function setPushUrl($cid) {
        $url = self::JUSTFUN_HOST."/live-channel-info/channel/info?cid=$cid&stream=1";
        $dataStr = $this->execUrl($url);
        $data = json_decode($dataStr, true);
        $zy_cid = "";
        if (is_array($data) && array_key_exists('fengyuncid', $data)) {
            $zy_cid = $data['fengyuncid'];
            list($streamUrl, $streamCode) = explode("/".$zy_cid, $data['uploadUrl'], 2);
            $this->streamURL = $streamUrl;
            $this->streamKey = $zy_cid.$streamCode;
        }
        return $zy_cid;
    }

    private function setFlvUrl($cid) {

        $url = self::ZHANGYU_HOST."/SourceManager/live?cid=$cid&rtmpurl=play.justfun.live";
        $result = $this->execUrl($url);
        $dataStr = $this->decodNew($result);
//        dump($cid, "=====", $result, "==========", $dataStr);
        $data = json_decode($dataStr, true);
        if (is_array($data) && array_key_exists('rtmpurl', $data)) {
            $this->playFlv = $data['rtmpurl'];
        }
    }

    private function setM3u8Url($cid) {
        $url = "http://m.justfun.live/tv/$cid";
        $useAgent = "Mozilla/5.0 (iPhone; CPU iPhone OS 10_3 like Mac OS X) AppleWebKit/602.1.50 (KHTML, like Gecko) CriOS/56.0.2924.75 Mobile/14E5239e Safari/602.1";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $useAgent);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);//8秒超时
        $server_out = curl_exec ($ch);
        curl_close ($ch);

        preg_match_all("/<video _src='(.*?)' class=/is", $server_out, $tempItems);
        if (is_array($tempItems) && count($tempItems) >= 2 && isset($tempItems[1])) {
            $this->playM3U8 = $tempItems[1][0];
        }
    }

    protected function decodNew($str) {
        $bytes = array();
        $oldBytes = str_split($str);
        $index = 0;
        while ($index < count($oldBytes) - 1){
            $bytes[$index] = $oldBytes[$index + 1] ^ $str;
            ++$index;
        }
        return implode($bytes);
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