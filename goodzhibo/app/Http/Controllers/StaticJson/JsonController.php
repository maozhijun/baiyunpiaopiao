<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/7
 * Time: 12:38
 */

namespace App\Http\Controllers\StaticJson;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Live\BasketBallController;
use App\Http\Controllers\Mobile\Live\HomeController;
use App\Http\Controllers\PC\Index\FootballController;
use App\Models\Match\Match;
use App\Models\Match\MatchLive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * 静态化JSON的类
 * Class JsonController
 * @package App\Http\Controllers\StaticJson
 */
class JsonController extends Controller
{

    /**
     * 足球获取即时比分的json
     * 每五秒执行一次。即一分钟内执行12次。
     * 访问路径 /football/change/live.json
     */
    public function staticFootballLiveJson() {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."change/live.json?date=" . time();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        $json = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        if ($code >= 400 || empty($json)) return;
        Storage::disk("public")->put("/static/football/change/live.json", $json);
    }

    /**
     * 足球即时赔率数据
     * 每五秒执行一次。即一分钟内执行12次。
     * 访问路径 /football/odd/roll.json
     */
    public function staticFootballRollJson() {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."api/odd/roll?date=" . time();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        $json = curl_exec ($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        if ($code >= 400 || empty($json)) return;
        Storage::disk("public")->put("/static/football/odd/roll.json", $json);
    }

    /**
     * 未开时的比赛不做处理，已结束的比赛处理一次（第一次取10天内打完的比赛静态化）。正在比赛的每5分钟处理一次。
     * 获取比赛事件的html
     * 访问路径 /football/event/{date}/{id}.json
     * @param Request $request
     */
    public function staticFootballEventHtml(Request $request) {
        //TODO

        $fc = new FootballController();
        $fc->eventHtml($request);
    }

    /**
     * 足球比赛列表数据。
     * @param Request $request
     * @param string $date
     */
    public function staticFootballMatchesJson(Request $request, $date = '') {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."intf/foot/data?date=" . $date;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $json = curl_exec ($ch);
        curl_close ($ch);
        if (empty($json) || $code >= 400) {
            echo 'http_code：' . $code . ', 或者返回html为空';
            return;
        }
        $patch = self::getMatchListStoragePatch($date, MatchLive::kSportFootball);
        Storage::disk("public")->put($patch, $json);
    }

    //--------------------------------//

    /**
     * 获取缓存路径
     * @param $date = ''   时间格式：2018-01-01
     * @param $sport = 1   竞技类型 1.足球，2.篮球
     * @return string 返回缓存的路径
     */
    public static function getMatchListStoragePatch($date = '', $sport = 1) {
        if (empty($date)) {
            $date = date('Ymd');
        } else {
            $date = date('Ymd', strtotime($date));
        }
        if ($sport == MatchLive::kSportBasketball) {
            $sport = 'basketball';
        } else {
            $sport = 'football';
        }
        $patch = '/static/json/' . $sport . '/list/' . $date . '/data.json';
        return $patch;
    }

    //=================================================================================================================================//

    /**
     * 篮球比赛列表数据。
     * @param Request $request
     * @param string $date 时间
     */
    public function staticBasketballMatchesJson(Request $request, $date = '') {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."intf/basket/data?date=" . $date;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $json = curl_exec ($ch);
        curl_close ($ch);

        if (empty($json) || $code >= 400) {
            echo 'http_code：' . $code . ', 或者返回html为空';
            return;
        }
        $patch = self::getMatchListStoragePatch($date, MatchLive::kSportBasketball);
        Storage::disk("public")->put($patch, $json);
    }

    /**
     * 篮球获取即时比分的json
     * 每五秒执行一次。即一分钟内执行12次。
     * 访问路径 /basketball/change/live.json
     */
    public function staticBasketballLiveJson() {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."change/basket.json?date=" . time();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $json = curl_exec ($ch);
        curl_close ($ch);
        if ($code >= 400 || empty($json)) return;
        Storage::disk("public")->put("/static/basketball/change/live.json", $json);
    }

    /**
     * 足球即时赔率数据
     * 每五秒执行一次。即一分钟内执行12次。
     * 访问路径 /basketball/odd/roll.json
     */
    public function staticBasketballRollJson() {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."api/odd/roll_b?date=" . time();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $json = curl_exec ($ch);
        curl_close ($ch);
        if ($code >= 400 || empty($json)) return;
        Storage::disk("public")->put("/static/basketball/odd/roll.json", $json);
    }

    //=================================================================================================================================//
}