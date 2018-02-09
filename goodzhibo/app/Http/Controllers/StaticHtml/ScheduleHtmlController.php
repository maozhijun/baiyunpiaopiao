<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/8
 * Time: 16:17
 */

namespace App\Http\Controllers\StaticHtml;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Live\HomeController;
use App\Http\Controllers\PC\Index\BasketballController;
use App\Http\Controllers\PC\Index\FootballController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleHtmlController extends Controller
{
    const KEY = "BYPP";
    public function staticHtml(Request $request) {
        $key = $request->input('key');//验证密钥
        if ($key != self::KEY) {
            return "参数错误";
        }
        $date = $request->input('date');//从第几天前开始。
        $tomorrow = date('Y-m-d', strtotime('+1 days'));
        if (empty($date)) {
            $date = $tomorrow;
        }

        $date_patch = '';
        $tom_time = strtotime($tomorrow);
        if ($tom_time != strtotime($date)) {
            $date_patch = date('Ymd', strtotime($date)) . '/';
        }

        $request = new Request();
        $pcFootball = new FootballController();
        $pcFootballHtml = $pcFootball->schedule($request, $date);
        Storage::disk("public")->put('/static/football/' . $date_patch . 'schedule.html', $pcFootballHtml);

        $wapFootball = new HomeController();
        $wapFootballHtml = $wapFootball->schedule($request, $date);
        Storage::disk("public")->put('/static/m/football/' . $date_patch . 'schedule.html', $wapFootballHtml);
//----------------------------------------------------------------------------------------------------------//
        $pcBasketball = new BasketballController();
        $pcBasketballHtml = $pcBasketball->schedule($request, $date);
        Storage::disk("public")->put('/static/basketball/' . $date_patch . 'schedule.html', $pcBasketballHtml);

        $wapBasketball = new \App\Http\Controllers\Mobile\Live\BasketBallController();
        $wapBasketballHtml = $wapBasketball->schedule($request, $date);
        Storage::disk("public")->put('/static/m/basketball/' . $date_patch . 'schedule.html', $wapBasketballHtml);
    }

}