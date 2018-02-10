<?php
/**
 * Created by PhpStorm.
 * User: ricky
 * Date: 2018/2/10
 * Time: 17:17
 */

namespace App\Console\DetailCommands\Football;


use App\Http\Controllers\FileTool;
use App\Http\Controllers\Mobile\Detail\DetailController;
use App\Http\Controllers\Mobile\Match\MatchDetailController;
use App\Models\Match\MatchLive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Exception;

trait FootballDetailCommonCommand
{
    /**
     * @param $tabs array
     * @param $date string Ymd格式的时间
     * @param int $saveCount
     */
    public function onTabHtmlStatic($tabs, $date, $saveCount = 20) {
        $json = json_decode(FileTool::getMatchesData(MatchLive::kSportFootball, 'first', $date), true);
        $matches = isset($json['matches']) ? $json['matches'] : [];
        if (count($matches) <= 0) return;
        
        $curDate = date('Ymd');
        if (strtotime($date) == strtotime($curDate)) {
            $status = 1;
        } else if (strtotime($date) < strtotime($curDate)) {
            $status = -1;
        } else {
            $status = 0;
        }
        $key = "football_tab_$status"."_$status"."_$date"."_html";
        $savedMids = json_decode(Redis::get($key));
        if (is_null($savedMids)) {
            $savedMids = [];
        }
        //上次总共保存的比赛数量
        $lastSaveCount = count($savedMids);
        dump($savedMids);

        $appDetailController = new MatchDetailController();
        $matchDetailController = new DetailController();
        $request = new Request();

        $count = 0;
        foreach ($matches as $match) {
            if ($count >= $saveCount) break;

            $mid = $match['mid'];
            if (!in_array($mid, $savedMids)) {
                foreach ($tabs as $tab) {
                    $tabHtml = $matchDetailController->detailCell($request, $tab, $mid);
                    $appTabHtml = $appDetailController->footballDetailTabDetail($tab, $tabHtml);

                    $index = substr($mid, 0, 3);
                    $patch = "/static/m/football/detail/tab/$tab/$index/$mid.html";
                    $appPatch = "/static/m/app/football/detail/tab/$tab/$index/$mid.html";
                    try {
                        Storage::disk("public")->put($patch, $tabHtml);
                        Storage::disk("public")->put($appPatch, $appTabHtml);
                    } catch (\Exception $e) {
                        dump($e->getMessage());
                    }
                }
                $count++;
                $savedMids[] = $mid;
            }
        }
        $curSaveCount = count($savedMids);
        if ($curSaveCount - $lastSaveCount < $saveCount) {
            $length = $curSaveCount - $saveCount;
            if ($length > 0) {
                $savedMids = array_slice($savedMids, $saveCount, $length);
            } else {
                $savedMids = [];
            }
        }
        dump($savedMids);
        Redis::set($key,json_encode($savedMids));
        //设置过期时间 24小时
        Redis::expire($key, 24*60*60);
    }
}