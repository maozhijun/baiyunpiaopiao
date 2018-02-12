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
use Illuminate\Support\Facades\Redis;

class FootballWapDetailScheduleCommands extends Command
{

    const PC_REDIS_KEY = 'FootballWapDetailScheduleCommandsKey';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wap_schedule_detail_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '赛程足球终端缓存';

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
        $match_date = date('Y-m-d', strtotime('+1 days'));
        $jsonStr = $fbIntf->matchListDataJson($match_date);//获取即时的比赛信息。
        $json = json_decode($jsonStr, true);
        if (!isset($json)) {
            $home = new HomeController();
            $json =$home->footballData($match_date);
        }
        $matches = isset($json['matches']) ? $json['matches'] : [];
        $excMidStr = Redis::get(self::PC_REDIS_KEY);
        $excArray = json_decode($excMidStr, true);;
        if (is_null($excArray)) {
            $excArray = [];
        }
        $excIndex = 0;
        //每10分钟一次，一次缓存5场比赛。
        foreach ($matches as $match) {
            if ($excIndex > 4) break;
            $id = $match['mid'];
            if (in_array($id, $excArray)) {
                continue;
            }
            $excArray[] = $id;
            $start_time = $match['time'];
            $date = date('Ymd', strtotime($start_time));
            FootballDetailController::curlToWapHtml($date, $id);
            $excIndex++;
            sleep(1);
        }
        //echo $excIndex . ',,' . json_encode($excArray);
        Redis::setEx(self::PC_REDIS_KEY, 24 * 60 * 60, json_encode($excArray));
    }
}