<?php
/**
 * Created by PhpStorm.
 * User: ricky
 * Date: 2018/1/12
 * Time: 11:05
 */

namespace App\Http\Controllers\Mobile\Match;


use App\Http\Controllers\Mobile\AppCommonResponse;
use App\Http\Controllers\Mobile\Detail\DetailController;
use App\Models\Match\MatchLive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MatchDetailController
{
    use MatchTool, MatchDetailTool;

    public function index(Request $request, $sport) {
        if (!$this->isSport($sport)) {
            return Response::json(AppCommonResponse::createAppCommonResponse(404, '路径错误'));
        }
        if ($sport == MatchLive::kSportBasketball) {
            return $this->basketballDetail($request);
        } elseif ($sport == MatchLive::kSportFootball) {
            return $this->footballDetail($request);
        }
    }

    public function footballDetailTab(Request $request, $tab, $id) {
        $detailController = new DetailController();
        if ($tab == "sameOdd") {
            $tabHtml = $detailController->detailCell($request, 'same_odd', $id);
        } else {
            $tabHtml = $detailController->detailCell($request, $tab, $id);
        }
        $data['html'] = $tabHtml;
        $views = "";
        switch ($tab) {
            case "base":
                $views = 'app.football.match_detail_base';
                break;
            case "analyse":
                $views = 'app.football.match_detail_analyse';
                break;
            case "team":
                $views = 'app.football.match_detail_team';
                break;
            case "odd":
                $views = 'app.football.match_detail_odd';
                break;
            case "sameOdd":
                $views = 'app.football.match_detail_same_odd';
                break;
        }
        return view($views, $data);
    }

    //原有的逻辑，暂时保留
    public function footballDetailTab2(Request $request, $tab, $id) {
        $match = $this->footballDetailMatchData($id);
        $date = date('Ymd', $match['time']);

        $views = "";
        $data = $this->footballDetailBaseData($id, $date);
        if (is_null($data)) {
            $data = [];
        }
        switch ($tab) {
            case "base":
                $event = $this->footballEventData($id, $date);
                if (isset($event)) {
                    $data = array_merge($data, $event);
                }
                $data['match']['hicon'] = $match['hicon'];
                $data['match']['aicon'] = $match['aicon'];
                $views = 'app.football.match_detail_base';
                break;
            case "analyse":
                $oddData = $this->footballOddData($id, $date);
                if (isset($oddData)) {
                    $data = array_merge($data, $oddData);
                }
                $views = 'app.football.match_detail_analyse';
                break;
            case "team":
                $cornerData = $this->footballCornerData($id, $date);
                if (isset($cornerData)) {
                    $data = array_merge($data, $cornerData);
                }
                $styleData = $this->footballStyleData($id, $date);
                if (isset($styleData)) {
                    $data = array_merge($data, $styleData);
                }
                $views = 'app.football.match_detail_team';
                break;
            case "odd":
                $oddIndex = $this->footballOddIndexData($id, $date);
                if (isset($oddIndex)) {
                    $data = array_merge($data, $oddIndex);
                }
                $views = 'app.football.match_detail_odd';
                break;
            case "sameOdd":
                $data = array_merge($data, $this->footballSameOddData($id, $date));
                $views = 'app.football.match_detail_same_odd';
                break;
        }
        return view($views, $data);
    }

        //足球比赛终端
    private function footballDetail(Request $request) {
        $mid = $request->input("id");
        $match = $this->footballDetailMatchData($mid);
        if (is_null($match)) {
            return Response::json(AppCommonResponse::createAppCommonResponse(500, '参数错误'));
        }
        $match['liveUrl'] = 'http://www.goodzhibo.com/m/live/football/'.$mid.'.html';
        $reset = $match;

        //终端底部tab
        $reset['tabs'] = [
            ["name"=>"分析", "url"=>env('APP_URL')."/m/app/football/tab/analyse/$mid"],
            ["name"=>"赛况", "url"=>env('APP_URL')."/m/app/football/tab/base/$mid"],
            ["name"=>"球队", "url"=>env('APP_URL')."/m/app/football/tab/team/$mid"],
            ["name"=>"指数", "url"=>env('APP_URL')."/m/app/football/tab/odd/$mid"],
            ["name"=>"同赔", "url"=>env('APP_URL')."/m/app/football/tab/sameOdd/$mid"],
        ];
        return Response::json(AppCommonResponse::createAppCommonResponse(0, '', $reset, false));
    }

    //==============================================================

    //篮球比赛终端
    private function basketballDetail(Request $request) {
        $mid = $request->input("id");
        $match = $this->basketballDetailMatchData($mid);
        if (is_null($match)) {
            return Response::json(AppCommonResponse::createAppCommonResponse(500, '参数错误'));
        }
        $match['liveUrl'] = 'http://www.goodzhibo.com/m/live/basketball/'.$mid.'.html';
        $reset = $match;
        //终端底部tab
        $reset['tabs'] = [
//            ["name"=>"赛况", "url"=>"https://www.liaogou168.com/basket_detail/$tempStr.html#Match_Event"],
//            ["name"=>"分析", "url"=>"https://www.liaogou168.com/basket_detail/$tempStr.html#Data_Strength"],
//            ["name"=>"指数", "url"=>"https://www.liaogou168.com/basket_detail/$tempStr.html#Data_Odd"],
//            ["name"=>"推荐", "url"=>"https://www.liaogou168.com/basket_detail/$tempStr.html#Corner_Data"]
        ];
        return Response::json(AppCommonResponse::createAppCommonResponse(0, '', $reset, false));
    }
}