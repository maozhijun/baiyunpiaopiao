<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/9
 * Time: 19:12
 */

namespace App\Http\Controllers\Mobile\Detail;


use App\Http\Controllers\CacheInterface\BasketballDetailInterface;
use App\Http\Controllers\CacheInterface\BasketballInterface;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Live\HomeController;
use App\Http\Controllers\Mobile\Match\MatchDetailTool;
use App\Http\Controllers\PC\Index\BasketballController;
use Illuminate\Http\Request;

class BasketballDetailController extends Controller
{
    use MatchDetailTool;

    public function detailCell(Request $request, $type, $index, $id) {
        $match = $this->basketballDetailMatchData($id);
        $date = date('Ymd', $match['time']);
        switch ($type) {
            case 'base' :
                return $this->baseCell($request, $date, $id,$match);//base
                break;
            case 'odd'://暂时用home的接口。 后面需要需求为同一套
                $con = new BasketballController();
                return $con->basketballOddIndex($request, $date, $id);
                break;
            case 'analyse':
                return $this->analyseCell($request, $date, $id);//base
                break;
            default:
                return "";
        }
    }

    /**
     * 篮球终端 赛况页面
     * @param Request $request
     * @param $date
     * @param $id
     * @param $match
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function baseCell(Request $request, $date, $id, $match = []) {
        $result = array('match'=>$match);
        if (count($result) == 0) {
            return "";
        }
        return view('mobile.basketball_detail_cell.base_cell', $result);
    }

    /**
     * 终端分析页面
     * @param Request $request
     * @param $date
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function analyseCell(Request $request, $date, $id) {
        $base = $this->analyseBaseData($date, $id);
        $odd = $this->analyseOddData($date, $id);

        $result['odd'] = $odd;
        $result['base'] = $base;
        if (count($result) == 0) {
            return "";
        }
        return view('mobile.basketball_detail_cell.analyse_cell', $result);
    }

    //====================================================================================//


    /**
     * 分析页面 赔率数据
     * @param $date
     * @param $id
     * @return mixed
     */
    public function analyseOddData($date, $id) {
        $cacheInterface = new BasketballDetailInterface();
        $json = $cacheInterface->getOddDataFromCache($date, $id);
        if (isset($json)) {
            return json_decode($json, true);
        }
        return $this->basketballOddData($id, $date);
    }

    /**
     * 分析页面基础数据
     * @param $date
     * @param $id
     * @return array|mixed
     */
    public function analyseBaseData($date, $id) {
        $cacheInterface = new BasketballDetailInterface();
        $json = $cacheInterface->getBaseDataFromCache($date, $id);
        if (isset($json)) {
            return json_decode($json, true);
        }
        return $this->basketballDetailBaseData($id, $date);
    }
}