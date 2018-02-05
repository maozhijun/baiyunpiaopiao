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
        $homeController = new HomeController();
        $data = $homeController->footballData();
        dump($data);
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
}