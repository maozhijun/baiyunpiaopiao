<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/11
 * Time: 17:48
 */

namespace App\Console\CacheCommands;


use App\Http\Controllers\CacheInterface\FootballInterface;
use App\Http\Controllers\Mobile\Live\HomeController;
use App\Http\Controllers\StaticHtml\FootballDetailController;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class FootballDetailResultCommands extends Command
{

    const PC_REDIS_KEY = "PC_FOOTBALL_DETAIL_RESULT_KEY";
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'result_detail_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '赛果的足球终端缓存';

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
        $fbIntf = new FootballInterface();
        $match_date = date('Y-m-d', strtotime('-1 days'));
        $jsonStr = $fbIntf->matchListDataJson($match_date);//获取即时的比赛信息。
        $json = json_decode($jsonStr, true);
        if (!isset($json)) {
            $home = new HomeController();
            $json =$home->footballData($match_date);
        }
        $matches = isset($json['matches']) ? $json['matches'] : [];
        $key = self::PC_REDIS_KEY . date('Ymd') . (date('H') > 12 ? 1 : 0);
        $excMidStr = Redis::get($key);
        $excArray = json_decode($excMidStr, true);;
        if (is_null($excArray)) {
            $excArray = [];
        }
        $excIndex = 0;
        $excTotal = 6;

        //每10分钟一次，一次缓存5场比赛。
        foreach ($matches as $match) {
            if ($excIndex > $excTotal) break;
            $id = $match['mid'];
            if (in_array($id, $excArray)) {
                continue;
            }
            $excArray[] = $id;
            $start_time = $match['time'];
//            echo 'time: ' . $start_time . "\n";
            $date = date('Ymd', strtotime($start_time));
            FootballDetailController::curlToHtml($date, $id);
            $excIndex++;
            sleep(1);
        }
        Redis::setEx($key, 12 * 60 * 60, json_encode($excArray));
//        echo 'cache : ' . json_encode($excArray);
    }
}