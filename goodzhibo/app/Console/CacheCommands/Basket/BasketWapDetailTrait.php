<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/3/14
 * Time: 10:31
 */

namespace App\Console\CacheCommands\Basket;


use App\Console\PlayerJsonCommand;
use App\Http\Controllers\Mobile\Live\BasketBallController;
use Illuminate\Support\Facades\Redis;

trait BasketWapDetailTrait
{

    /**
     * 静态化
     * @param $date 格式 Ymd
     * @param int $once_exc_total  一次执行条数
     * @param $ex_key
     * @param bool $isMatchIng 是否正在比赛
     */
    public function staticWapDetail($date, $once_exc_total = 20, $ex_key = '', $isMatchIng = false) {
        //
        $key_pre = 'BasketWapDetailTrait_WapDetail_Key_';
        $index = 0;
        $bCon = new BasketBallController();
        $data = $bCon->basketballData($date);
        $matches = isset($data['matches']) ? $data['matches'] : [];
        $key = $key_pre . $date . date('H') . $ex_key;//默认每小时缓存
        //echo $key;
        $cache = Redis::get($key);
        if (!empty($cache)) {
            $cache_array = json_decode($cache, true);
        }
        $cache_array = isset($cache_array) ? $cache_array : [];
        //echo 'match_count : ' . count($matches) . '=========';
        foreach ($matches as $match) {
            //echo ' ==== status ==== ' . $match['status'] . '====';
            if (!isset($match['time']) || !isset($match['mid']) || ($isMatchIng && (!isset($match['status']) || $match['status'] < 1) ) ) {
                continue;
            }

            $date = date('Ymd', strtotime($match['time']));
            $mid = $match['mid'];
            if ($index < $once_exc_total && !in_array($mid, $cache_array)) {
                $index++;
                $cache_array[] = $mid;
                $url = '/static/basketball/wap/detail/' . $date . '/' . $mid;
                //echo $url . '....!!!---';
                PlayerJsonCommand::execUrl($url);
            }
        }
        //echo implode(',', $cache_array) . '!!!';
        Redis::setEx($key, 1 * 60 * 60, json_encode($cache_array));
        //echo $index . '....' . $time;
    }

}