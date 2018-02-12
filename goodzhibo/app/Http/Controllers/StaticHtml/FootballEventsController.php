<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/12
 * Time: 11:01
 */

namespace App\Http\Controllers\StaticHtml;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Live\HomeController;
use App\Http\Controllers\PC\Index\FootballController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class FootballEventsController extends Controller
{
    const Redis_prefix_Key = 'FootballEventsController_HTML_';
    public static function curlEventsToHtml($date, $mid) {
        $ch = curl_init();
        $url = asset('/static/football/events/' . $date . '/' . $mid);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $json = curl_exec ($ch);
        //echo $json . '111111<br/>';
        curl_close ($ch);
    }

    public function eventToHtml(Request $request, $date, $id) {
        $pc = new FootballController();
        $eventHtml = $pc->eventHtml($request, $date, $id);
        $patch = '/static/football/event/' . $date . '/' . $id . '.json';
        Storage::disk("public")->put($patch, $eventHtml);
    }


    public function eventToHtmlByDate(Request $request) {
        $date = $request->input('date');
        if (empty($date)) {
            return "参数错误";
        }
        $home = new HomeController();
        $json = $home->footballData($date);
        $matches = isset($json['matches']) ? $json['matches'] : [];

        $key = self::Redis_prefix_Key . $date;
        $exc_array = json_decode(Redis::get($key));
        if (is_null($exc_array)) $exc_array = [];
        $index = 0;
        foreach ($matches as $match) {
            if ($index > 10) {
                break;
            }
            $id = $match['mid'];
            if (in_array($id, $exc_array)) {
                continue;
            }
            $start_time = $match['time'];
            $date = date('Ymd', strtotime($start_time));
            echo $match['hname'] . ' VS ' . $match['aname'] . ' at ' . $start_time . ',' . $id . '。';
            FootballEventsController::curlEventsToHtml($date, $id);
            $exc_array[] = $id;
            Redis::set($key, json_encode($exc_array));
            $index++;
        }
        echo '共静态化' . $index . '个比赛事件<br/>完成!!!!!';
    }

}