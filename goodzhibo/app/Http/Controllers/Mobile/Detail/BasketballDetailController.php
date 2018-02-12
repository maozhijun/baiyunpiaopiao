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
        $result = array_merge([], $match);
        if (count($result) == 0) {
            return "";
        }
        return view('mobile.basketball_detail_cell.base_cell', $result);
    }
    //====================================================================================//


}