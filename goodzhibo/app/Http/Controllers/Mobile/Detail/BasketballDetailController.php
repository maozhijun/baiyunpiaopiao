<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/9
 * Time: 19:12
 */

namespace App\Http\Controllers\Mobile\Detail;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Match\MatchDetailTool;
use Illuminate\Http\Request;

class BasketballDetailController extends Controller
{
    use MatchDetailTool;

    public function detailCell(Request $request,$index1,$index2,$id,$tab) {
        $match = $this->basketballDetailMatchData($id);
        $data['match'] = $match;

        $views = "";
        switch ($tab) {
            case 'base' :
                $data['tech'] = $this->basketballDetailData($id, 'tech');
                $data['players'] = $this->basketballDetailData($id, 'player');
                $views = "mobile.basketball_detail_cell.base_cell";
                break;
            case 'odd'://暂时用home的接口。 后面需要需求为同一套
                $odds = $this->basketballOddData($id);
                if (isset($odds) && count($odds) > 0) {
                    ksort($odds);
                    $data['odds'] = $odds;
                } else {
                    $data['odds'] = null;
                }
                $data['isBasket'] = true;
                $views = "mobile.cell.football_detail_odd_index";
                break;
            case 'analyse':
                $odds = $this->basketballOddData($id);
                if (isset($odds) && count($odds) > 0) {
                    ksort($odds);
                    $data['odds'] = $odds;
                } else {
                    $data['odds'] = null;
                }
                $data['base'] = $this->basketballDetailAnalyseData($id);
                $views = "mobile.basketball_detail_cell.analyse_cell";
                break;
        }
        return view($views, $data);
    }
}