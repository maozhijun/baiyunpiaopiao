<?php

/**
 * Created by PhpStorm.
 * User: ricky
 * Date: 2018/2/2
 * Time: 18:11
 */

namespace App\Http\Controllers\Mobile\Match;

trait MatchDetailTool
{
    //====================篮球比赛部分=========================================
    /**
     * 篮球终端页
     * @param $id
     * @return array
     */
    public function basketballDetailMatchData($id){
        $ch = curl_init();
        $url = env('MATCH_URL')."/app/match/detail/0/2/$id/match.json";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }


    //====================足球比赛部分=========================================

    /**
     * 足球终端页
     * @param $id
     * @return array
     */
    public function footballDetailMatchData($id){
        $ch = curl_init();
        $url = env('MATCH_URL')."/app/match/detail/0/1/$id/match.json";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);

        return $json;
    }

    /**
     * 足球终端页
     * @param $id
     * @return array
     */
    public function footballDetailBaseData($id, $date){
        $ch = curl_init();
        $url = env('MATCH_URL')."/app/match/detail/$date/1/$id/base.json";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);

        return $json;
    }


    /**
     * @param string $date
     * @return mixed
     */
    public function footballData($date = '') {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."/intf/foot/data?date=" . $date;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);

        return $json;
    }

    /**
     * 足球比赛终端数据
     * @param $id
     * @return mixed
     */
    public function footballDetailData($id) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."/intf/foot/detail/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 足球比赛赔率
     * @param $id
     * @return mixed
     */
    public function footballEventData($id, $date) {
        $ch = curl_init();
        $url = env('MATCH_URL')."/app/match/detail/$date/1/$id/event.json";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 足球比赛赔率
     * @param $id
     * @return mixed
     */
    public function footballOddData($id, $date) {
        $ch = curl_init();
        $url = env('MATCH_URL')."/app/match/detail/$date/1/$id/odd.json";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 比赛终端事件、统计数据
     * @param $id
     * @return mixed
     */
    public function footballBaseData($id) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."/intf/foot/base/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    public function footballCornerData($id, $date) {
        $ch = curl_init();
        $url = env('MATCH_URL')."/app/match/detail/$date/1/$id/corner.json";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 足球终端、球队风格数据。
     * @param $id
     * @return mixed
     */
    public function footballStyleData($id, $date) {
        $ch = curl_init();
        $url = env('MATCH_URL')."/app/match/detail/$date/1/$id/style.json";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 比赛赔率指数
     * @param $id
     * @return mixed
     */
    public function footballOddIndexData($id, $date) {
        $ch = curl_init();
        $url = env('MATCH_URL')."/app/match/detail/$date/1/$id/oddIndex.json";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 比赛赔率指数
     * @param $id
     * @return mixed
     */
    public function footballSameOddData($id, $date) {
        $ch = curl_init();
        $url = env('MATCH_URL')."/app/match/detail/$date/1/$id/sameOdd.json";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }
}