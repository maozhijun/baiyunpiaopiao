<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/3/14
 * Time: 11:38
 */

namespace App\Http\Controllers\PC\Index;


use App\Http\Controllers\Controller;

class DataController extends Controller
{

    /**
     * 足球比赛终端数据
     * @param $id
     * @return mixed
     */
    public function footballDetailData($id) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."intf/foot/detail/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $this->convertEmptyJson($json);
    }

    public function footballCornerData($id) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."intf/foot/corner/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $this->convertEmptyJson($json);
    }


    /**
     * PC比赛终端 特殊数据
     * @param $id
     * @return mixed
     */
    public function footballCharacteristicData($id) {
        $ch = curl_init();
        $prifex = env('LIAOGOU_URL');
        $url = $prifex . "intf/foot/characteristic/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $this->convertEmptyJson($json);
    }

    /**
     * 获取PC足球比赛终端页的 基本状况数据。
     * @param $id
     * @return mixed
     */
    public function footballBaseData4PC($id) {
        $ch = curl_init();
        $prifex = env('LIAOGOU_URL');//'http://user.liaogou168.com:8089/';//
        $url = $prifex . "intf/foot/base_pc/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $this->convertEmptyJson($json);
    }

    /**
     * 足球比赛是否又直播。
     * @param $id
     * @return mixed
     */
    public function footballMatchIsLive($id) {
        $ch = curl_init();
        $prifex = env('LIAOGOU_URL');'http://user.liaogou168.com:8089/';//
        $url = $prifex . "api/match/live/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $this->convertEmptyJson($json);
    }


    /**
     * 比赛赔率指数
     * @param $id
     * @param $platform
     * @return mixed
     */
    public function footballOddIndexData($id, $platform = '') {
        $ch = curl_init();
        $param = $platform == 'pc' ? '?platform=pc' : '';
        $prefix = env('LIAOGOU_URL');
        $url = $prefix . "intf/foot/odd_index/" . $id . $param;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $this->convertEmptyJson($json);
    }


    private function convertEmptyJson($json) {
        if (is_null($json)) {
            return [];
        }
        return $json;
    }

}