<?php

/**
 * Created by PhpStorm.
 * User: ricky
 * Date: 2018/2/2
 * Time: 18:11
 */

namespace App\Http\Controllers\Mobile\Match;

use App\Http\Controllers\FileTool;
use App\Models\Match\MatchLive;

trait MatchDetailTool
{
    /**
     * 足球终端页
     * @param $id
     * @param $name
     * @return array
     */
    private function matchDetailData($sport, $id, $name){
        $json = FileTool::getFileFromTerminal($sport, $id, $name);
        if (!isset($json)) {
            $ch = curl_init();
            $url = env('MATCH_URL') . "/static/terminal/$sport/" . substr($id, 0, 2) . "/" . substr($id, 2, 2) . "/$id/$name.json";
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($ch);
            curl_close($ch);
            $json = json_decode($json, true);
        }
        return $json;
    }

    //====================篮球比赛部分=========================================
    /**
     * 足球终端页
     * @param $id
     * @param $name
     * @return array
     */
    public function basketballDetailData($id, $name){
        return $this->matchDetailData(MatchLive::kSportBasketball, $id, $name);
    }

    /**
     * 篮球终端页
     * @param $id
     * @return array
     */
    public function basketballDetailMatchData($id){
        return $this->basketballDetailData($id, "match");
    }

    /**
     * 篮球终端页
     * @param $id
     * @return array
     */
    public function basketballDetailAnalyseData($id){
        return $this->basketballDetailData($id, "analyse");
    }

    /**
     * 篮球比赛赔率
     * @param $id
     * @return mixed
     */
    public function basketballOddData($id) {
        return $this->basketballDetailData($id, "odd");
    }

    //====================足球比赛部分=========================================

    /**
     * 足球终端页
     * @param $id
     * @param $name
     * @return array
     */
    public function footballDetailData($id, $name){
        return $this->matchDetailData(MatchLive::kSportFootball, $id, $name);
    }

    /**
     * 足球终端页
     * @param $id
     * @return array
     */
    public function footballDetailMatchData($id){
        return $this->footballDetailData($id, 'match');
    }

    /**
     * 足球终端 分析数据
     * @param $id
     * @return array
     */
    public function footballDetailAnalyseData($id){
        return $this->footballDetailData($id, 'analyse');
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
     * 足球 统计数据 + 比赛事件
     * @param $id
     * @return mixed
     */
    public function footballTechData($id) {
        return $this->footballDetailData($id, 'tech');
    }

    /**
     * 足球 阵容数据
     * @param $id
     * @return mixed
     */
    public function footballLineupData($id) {
        return $this->footballDetailData($id, 'lineup');
    }

    /**
     * 足球 滚球数据
     * @param $id
     * @return mixed
     */
    public function footballRollData($id) {
        return $this->footballDetailData($id, 'roll');
    }

    /**
     * 足球比赛赔率
     * @param $id
     * @return mixed
     */
    public function footballOddData($id) {
        return $this->footballDetailData($id, 'odd');
    }
}