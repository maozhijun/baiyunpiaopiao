<?php
/**
 * Created by PhpStorm.
 * User: yaya
 * Date: 2018/1/21
 * Time: 19:24
 */

namespace App\Console;


use App\Http\Controllers\CommonTool;
use App\Http\Controllers\PC\Live\LiveController;
use App\Models\Match\MatchLive;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class UnStartLiveDetailCommand extends Command
{

    const UnStartLiveDetailCommandKey = 'UnStartLiveDetailCommandKey';
    const UnStartLiveDetailCommandTimeKey = 'UnStartLiveDetailCommandTimeKey';//执行时间key

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'un_start_live_detail_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '未开赛直播终端静态化（wap、pc）';

    /**
     * Create a new command instance.
     * HotMatchCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $star_time = time();

        $liveCon = new LiveController();
        $json = $liveCon->getLivesCache();
        $json = $json['matches'];
        $url_pre = '/live/flush_cache/detail';
        $exc_index = 0;
        $once_exc_total = 25;

        $exc_time = Redis::get(self::UnStartLiveDetailCommandTimeKey);
        if (empty($exc_time)) $exc_time = 0;

        $cache = Redis::get(self::UnStartLiveDetailCommandKey);
        $exc_json = !empty($cache) ? json_decode($cache) : [];
        if (is_null($exc_json)) $exc_json = [];

        $now = time();

        foreach ($json as $index=>$datas){
            foreach ($datas as $match){
                if (!isset($match['mid']) || !isset($match['time']) || !isset($match['sport'])) {
                    continue;
                }
                $mid = $match['mid'];
                $m_time = strtotime($match['time']);
                $sport = $match['sport'];
                if ($exc_index < $once_exc_total && $m_time > $now + 60 * 60 && !in_array($mid, $exc_json)) {
                    $exc_json[] = $mid;
                    $exc_index++;
                    $url = $url_pre . '?id=' . $mid . '&sport=' . $sport;
                    PlayerJsonCommand::execUrl($url, 10);
                }
            }
        }
        $exc_time += 5;
        //echo 'exc_time:' . $exc_time . ' ,index:' . $exc_index;
        //echo json_encode($exc_json);
        if ($exc_time > 60) {
            $exc_time = 0;
            Redis::setEx(self::UnStartLiveDetailCommandKey, 1, json_encode($exc_json));
        } else {
            Redis::setEx(self::UnStartLiveDetailCommandKey, 60 * 60, json_encode($exc_json));
        }

        Redis::set(self::UnStartLiveDetailCommandTimeKey, $exc_time);
        echo '本次执行时间：' . (time() - $star_time) . '秒';
    }

}