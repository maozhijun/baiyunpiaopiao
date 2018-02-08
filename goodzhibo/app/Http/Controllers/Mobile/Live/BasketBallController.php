<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/1
 * Time: 16:48
 */

namespace App\Http\Controllers\Mobile\Live;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BasketBallController extends Controller
{
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
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."/intf/basket/data?date=" . $date;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }
}