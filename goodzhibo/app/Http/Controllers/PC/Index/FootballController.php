<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/1
 * Time: 19:33
 */

namespace App\Http\Controllers\PC\Index;


use App\Http\Controllers\CommonTool;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Live\HomeController;
use App\Models\Match\Odd;
use App\Models\Shop\Business\GoodsArticles;
use Illuminate\Http\Request;

class FootballController extends Controller
{

    /**
     * 即时
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function immediate(Request $request) {
        //$cks = $request->cookies;
        $homeController = new HomeController();
        $data = $homeController->footballData();
        $data['nav'] = 'football';
        return view('pc.index.immediate', $data);
    }

    /**
     * 结果
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function result(Request $request) {
        $date = $request->input('date', date('Y-m-d', strtotime('-1 days')));
        $homeController = new HomeController();
        $data = $homeController->footballData($date);
        $data['type'] = 'result';
        $data['nav'] = 'football';
        return view('pc.index.result', $data);
    }

    /**
     * 结果
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schedule(Request $request) {
        $date = $request->input('date', date('Y-m-d', strtotime('+1 days')));
        $homeController = new HomeController();
        $data = $homeController->footballData($date);
        $data['nav'] = 'football';
        return view('pc.index.schedule', $data);
    }

//=================================================================================================================================//
//常用方法
    public static function getMatchOdds($handicap, $type, $sport = GoodsArticles::kSportFootball)
    {
        $typeCn = "";
        $typeValue = "";
        $sort = -1;
        if ($type == Odd::k_odd_type_asian) {
            if (!isset($handicap)) {
                $typeCn = "未开盘";
                $typeValue = "Odd_Asia_none";
            } else {
                if ($handicap > 3) {
                    $typeCn = "三球以上";
                    $sort = 13;
                    $typeValue = "Odd_Asia_$sort";
                } else if ($handicap < -3) {
                    $typeCn = "受三球以上";
                    $sort = 13;
                    $typeValue = "Odd_Asia_Negative_$sort";
                } else {
                    $typeCn = CommonTool::getHandicapCn($handicap, '', $type, $sport);
                    $temp = $handicap > 0 ? "Odd_Asia" : "Odd_Asia_Negative";
                    $sort = (abs($handicap) * 4);
                    $typeValue = $temp . "_" . $sort;
                }
            }
        } else if ($type = Odd::k_odd_type_ou) {
            if (!isset($handicap)) {
                $typeCn = "未开盘";
                $typeValue = "Odd_Goal_none";
            } else {
                if ($handicap < 2) {
                    $typeCn = "2球以下";
                    $sort = 7;
                    $typeValue = "Odd_Goal_$sort";
                } else if ($handicap > 4) {
                    $typeCn = "4球以上";
                    $sort = 17;
                    $typeValue = "Odd_Goal_$sort";
                } else {
                    $typeCn = CommonTool::getHandicapCn($handicap, '', $type, $sport) . "球";
                    $sort = (abs($handicap) * 4);
                    $typeValue = "Odd_Goal_" . $sort;
                }
            }
        }
        $matchOdds['sort'] = $sort;
        $matchOdds['typeCn'] = $typeCn;
        $matchOdds['typeValue'] = $typeValue;
        return $matchOdds;
    }


//=================================================================================================================================//
//接口
    public function liveJson(Request $request) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."change/live.json?date=" . time();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
        //$arr = ['1059237'=>['time'=>'20<span>\'</span>', 'score'=>'1-0', 'ch_score'=>'2-1', 'half_score'=>'0-0']];
        //return $arr;
    }


    public function oddRollJson(Request $request) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."api/odd/roll?date=" . time();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
        //return ['1056085'=>['all'=>['1'=>['up'=>'1.2', 'middle'=>'1.25', 'down'=>'0.9'], '2'=>['up'=>'1.9', 'middle'=>'3.5', 'down'=>'0.8']  ]]];
    }

    /**
     * 比赛事件
     * @param Request $request
     * @param $id
     * @param $date
     * @return mixed
     */
    public function eventJson(Request $request, $date, $id) {
        $ch = curl_init();
        //$url = "http://match.liaogou168.com/live-event/" . $date . "/" . $id . ".json";
        $url = 'http://user.liaogou168.com:8089/intf/foot/events/' . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 获取事件的html
     * @param Request $request
     * @param $date
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function eventHtml(Request $request, $date, $id) {
        $data = $this->eventJson($request, $date, $id);
        return view('pc.index.match_event_list', ['events'=>$data]);
    }

}