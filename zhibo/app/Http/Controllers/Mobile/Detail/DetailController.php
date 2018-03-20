<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/9
 * Time: 19:12
 */

namespace App\Http\Controllers\Mobile\Detail;


use App\Http\Controllers\CacheInterface\FootballDetailInterface;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Live\HomeController;
use App\Http\Controllers\Mobile\Match\MatchDetailTool;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    use MatchDetailTool;

    public function detailCell(Request $request,$index1,$index2,$id,$tab) {
        $match = $this->footballDetailMatchData($id);
        $data['match'] = $match;
        $views = "";
        switch ($tab) {
            case "base":
                $tech = $this->footballTechData($id);
                $lineup = $this->footballLineupData($id);
                if (isset($lineup) && count($lineup) > 0) {
                    $data['lineup'] = $lineup;
                } else {
                    $data['lineup']['home'] = null;
                    $data['lineup']['away'] = null;
                }
                if (isset($tech) && count($tech) > 0) {
                    $data['tech'] = isset($tech['tech']) ? $tech['tech'] : null;
                    if (isset($tech['event'])) {
                        $event = $tech['event'];
                        $data['events'] = $event['events'];
                        $data['last_event_time'] = $event['last_event_time'];
                    } else {
                        $data['events'] = null;
                    }
                } else {
                    $data['tech'] = null;
                    $data['events'] = null;
                }
                $views = 'mobile.football_detail_cell.base_cell';
                break;
            case "analyse":
                $analyse = $this->footballDetailAnalyseData($id);
                $oddData = $this->footballOddData($id);
                ksort($oddData);
                $data['base'] = $analyse;
                $data['bankers'] = $oddData;
                $views = 'mobile.football_detail_cell.analyse_cell';
                break;
            case "team":
                $analyse = $this->footballDetailAnalyseData($id);
                $data['base'] = $analyse;
                $views = 'mobile.football_detail_cell.team_cell';
                break;
            case "odd":
                $oddData = $this->footballOddData($id);
                ksort($oddData);
                $data['odds'] = $oddData;
                $views = 'mobile.cell.football_detail_odd_index';
                break;
            case "same_odd":
                $analyse = $this->footballDetailAnalyseData($id);
                $data['base'] = $analyse;
                $views = 'mobile.cell.football_detail_same_odd';
                break;
        }
        return view($views, $data);
    }
}