<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/5
 * Time: 14:52
 */

namespace App\Http\Controllers\PC\Index;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BasketballController extends Controller
{

    /**
     * 篮球即时页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function immediate(Request $request) {
        $bCon = new \App\Http\Controllers\Mobile\Live\BasketBallController();
        $data = $bCon->basketballData();
        $data['nav'] = 'basketball';
        return view('pc.index.basketball.immediate', $data);
    }

    /**
     * 赛果
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function result(Request $request) {
        $default_date = date('Y-m-d', strtotime('-1 days'));
        $date = $request->input('date', $default_date);
        $bCon = new \App\Http\Controllers\Mobile\Live\BasketBallController();
        $data = $bCon->basketballData($date);
        $data['date'] = $date == $default_date ? '' : $date;
        $data['nav'] = 'basketball';
        return view('pc.index.basketball.result', $data);
    }

    /**
     * 赛程
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schedule(Request $request) {
        $default_date = date('Y-m-d', strtotime('+1 days'));
        $date = $request->input('date', $default_date);
        $bCon = new \App\Http\Controllers\Mobile\Live\BasketBallController();
        $data = $bCon->basketballData($date);
        $data['date'] = $date == $default_date ? '' : $date;
        $data['nav'] = 'basketball';
        return view('pc.index.basketball.schedule', $data);
    }


    ////////////////////////////////////////////////////////////////////////////////////////
    ///接口
    public function liveJson(Request $request) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."change/basket.json?date=" . time();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }
}