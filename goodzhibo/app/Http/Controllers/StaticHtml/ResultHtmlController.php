<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/8
 * Time: 16:17
 */

namespace App\Http\Controllers\StaticHtml;


use App\Http\Controllers\CacheInterface\CacheTool;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Live\HomeController;
use App\Http\Controllers\PC\Index\BasketballController;
use App\Http\Controllers\PC\Index\FootballController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class ResultHtmlController extends Controller
{
    const KEY = "BYPP";
    const Redis_key_pre = "Redis_key_pre_";
    public function staticHtml(Request $request) {
        $key = $request->input('key');//验证密钥
        if ($key != self::KEY) {
            return "参数错误";
        }
        $date = $request->input('date');//从第几天前开始。
        $yesterday = date('Y-m-d', strtotime('-1 days'));
        if (empty($date)) {
            $date = $yesterday;
        }

        $date_patch = '';
        $yes_time = strtotime($yesterday);
        if ($yes_time != strtotime($date)) {
            $date_patch = date('Ymd', strtotime($date)) . '/';
        }
        $request = new Request();
        $pcFootball = new FootballController();
        $pcFootballHtml = $pcFootball->result($request, $date);
        Storage::disk("public")->put('/static/football/' . $date_patch . 'result.html', $pcFootballHtml);

        $wapFootball = new HomeController();
        $wapFootballHtml = $wapFootball->result($request, $date);
        Storage::disk("public")->put('/static/m/football/' . $date_patch . 'result.html', $wapFootballHtml);
//----------------------------------------------------------------------------------------------------------//
        $pcBasketball = new BasketballController();
        $pcBasketballHtml = $pcBasketball->result($request, $date);
        Storage::disk("public")->put('/static/basketball/' . $date_patch . 'result.html', $pcBasketballHtml);

        $wapBasketball = new \App\Http\Controllers\Mobile\Live\BasketBallController();
        $wapBasketballHtml = $wapBasketball->result($request, $date);
        Storage::disk("public")->put('/static/m/basketball/' . $date_patch . 'result.html', $wapBasketballHtml);
    }


    public function wapDetailToHtml(Request $request) {
        $paramDate = $request->input('date');
        if (empty($paramDate)) {
            return "参数错误";
        }

        $home = new HomeController();
        $json = $home->footballData($paramDate);
        $matches = isset($json['matches']) ? $json['matches'] : [];
        $key = self::Redis_key_pre . 'WAP_' . $paramDate;
        $exc_array = json_decode(Redis::get($key));
        if (is_null($exc_array)) $exc_array = [];
        foreach ($matches as $match) {
            $start_time = $match['time'];
            $id = $match['mid'];
            if (in_array($id, $exc_array)) {
                continue;
            }
            $date = date('Ymd', strtotime($start_time));
            echo $match['hname'] . ' VS ' . $match['aname'] . ' time : ' . $match['time'];
            $start = time();
            $this->toHtml($date, $id);
            echo '请求时间：' . (time() - $start) . '</br>';
            $exc_array[] = $id;
            Redis::set($key, json_encode($exc_array));
        }
        echo '<br/>完成!!!!!';
    }

    public function pcDetailToHtml(Request $request) {
        $paramDate = $request->input('date');
        if (empty($paramDate)) {
            return "参数错误";
        }

        $home = new HomeController();
        $json = $home->footballData($paramDate);
        $matches = isset($json['matches']) ? $json['matches'] : [];
        $key = self::Redis_key_pre . 'PC_' . $paramDate;
        $exc_array = json_decode(Redis::get($key));
        if (is_null($exc_array)) $exc_array = [];
        foreach ($matches as $match) {
            $start_time = $match['time'];
            $id = $match['mid'];
            if (in_array($id, $exc_array)) {
                continue;
            }
            $date = date('Ymd', strtotime($start_time));
            echo $match['hname'] . ' VS ' . $match['aname'] . ' time : ' . $match['time'];
            $start = time();
            //$this->toHtml($date, $id);
            FootballDetailController::curlToHtml($date, $id);
            echo '请求时间：' . (time() - $start) . '</br>';
            $exc_array[] = $id;
            Redis::set($key, json_encode($exc_array));
        }
        echo '<br/>完成!!!!!';
    }

    protected function toHtml($date, $mid) {
        $ch = curl_init();
        $url = 'http://goodzhibo.com/static/football/detail/wap/' . $date . '/' . $mid;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_exec ($ch);
        curl_close ($ch);
    }

}