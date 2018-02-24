<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/1
 * Time: 16:48
 */

namespace App\Http\Controllers\Mobile\Live;


use App\Console\DetailCommands\Football\FootballDetailCommonCommand;
use App\Http\Controllers\CacheInterface\BasketballInterface;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Detail\BasketballDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class BasketBallController extends Controller
{
    use FootballDetailCommonCommand;
    /**
     * 即时篮球赛事列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function immediate(Request $request) {
        $json = $this->basketballData();
        $json['type'] = 'immediate';
        $json['date'] = empty($date) ? date('Y-m-d') : $date;
        return view('mobile.basketIndex', $json);
    }

    /**
     * 赛果篮球赛事列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function result(Request $request) {
        $date = $request->input('date', date('Y-m-d', strtotime('-1 days')));
        $json = $this->basketballData($date);
        $json['type'] = 'result';
        $json['date'] = empty($date) ? date('Y-m-d') : $date;
        return view('mobile.basketIndex', $json);
    }

    /**
     * 篮球比赛赛程列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schedule(Request $request) {
        $date = $request->input('date', date('Y-m-d', strtotime('+1 days')));
        $json = $this->basketballData($date);
        $json['type'] = 'schedule';
        $json['date'] = empty($date) ? date('Y-m-d') : $date;
        return view('mobile.basketIndex', $json);
    }

    /**
     * 篮球直播列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function lives(Request $request) {
        $date = $request->input('date', '');
        $json = $this->basketballData($date);
        $matches = [];
        if (isset($json['matches'])) {
            foreach ($json['matches'] as $match) {
                if ($match['wap_live']) {
                    $matches[] = $match;
                }
            }
        }
        $json['matches'] = $matches;
        $json['type'] = 'lives';
        $json['date'] = empty($date) ? date('Y-m-d') : $date;
        return view('mobile.basketIndex', $json);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function basketballData($date = '') {
        $cacheInterface = new BasketballInterface();
        $cacheJson = $cacheInterface->matchListDataJson($date);
        if (!empty($cacheJson)) {
            $json = json_decode($cacheJson, true);
            return $json;
        }

        $ch = curl_init();
        $url = env('LIAOGOU_URL')."/intf/basket/data?date=" . $date;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 篮球终端页
     * @param Request $request
     * @param $date
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function basketballDetail(Request $request, $date, $id){
        $data = $this->basketballDetailData($id);
        if (!isset($data['match'])) {
            // abort(404);
        }

        $controller = new BasketballDetailController();
        $base = $controller->analyseBaseData($date, $id);
        $data = $base;
        $data['id'] = $id;
        return view('mobile.basketballDetail', $data);
    }

    /**
     * 篮球比赛终端数据
     * @param $id
     * @return mixed
     */
    public function basketballDetailData($id) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."intf/basket/detail/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
//        dump($url);
        return $this->convertEmptyJson($json);
    }

    /**
     * 比赛赔率指数
     * @param $id
     * @param $platform
     * @return mixed
     */
    public function basketballOddIndexData($id, $platform = '') {
        $ch = curl_init();
        $param = $platform == 'pc' ? '?platform=pc' : '';
        $prefix = env('LIAOGOU_URL');
        $url = $prefix . "intf/basket/odd_index/" . $id . $param;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $this->convertEmptyJson($json);
    }

    /**
     *
     * @param Request $request
     * @param $date
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function basketballOddIndex(Request $request, $date, $id) {
        $json = $this->basketballOddIndexData($id);
        return view('mobile.cell.football_detail_odd_index', $json);
    }

    private function convertEmptyJson($json) {
        if (is_null($json)) {
            return [];
        }
        return $json;
    }

    /**
     * 足球终端也赔率数据html
     * @param Request $request
     * @param $date
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function basketballOdd(Request $request, $date, $id) {
        $data = $this->basketballOddData($id);
        //dump($data);
        if (!isset($data['bankers']) || count($data['bankers']) == 0) {
            return "";
        }
//        dump($data);
        return view('mobile.cell.football_detail_odd', $data);
    }

    /**
     * 足球比赛赔率
     * @param $id
     * @return mixed
     */
    public function basketballOddData($id) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."intf/basket/odd/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $this->convertEmptyJson($json);
    }
}