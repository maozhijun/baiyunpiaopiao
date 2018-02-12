<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/9
 * Time: 11:08
 */

namespace App\Console\CacheCommands;


use App\Http\Controllers\Mobile\Live\HomeController;
use App\Http\Controllers\StaticHtml\FootballEventsController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class EventsHtmlResultCommands extends Command
{
    const Redis_Key_Prefix = "EventsHtmlResultCommands_";

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events_result_cache:run';//完场赛事事件静态化

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '完场赛事事件静态化';

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
        $home = new HomeController();
        $match_date = date('Y-m-d', strtotime('-1 days'));
        $json = $home->footballData($match_date);
        $matches = isset($json['matches']) ? $json['matches'] : [];

        $key = self::Redis_Key_Prefix . $match_date;
        $excMidStr = Redis::get($key);
        $excArray = json_decode($excMidStr, true);;
        if (is_null($excArray)) {
            $excArray = [];
        }
        $excIndex = 0;

        foreach ($matches as $match) {
            if ($excIndex >= 20) {
                break;
            }
            $id = $match['mid'];
            if (in_array($id, $excArray)) {
                continue;
            }
            $excArray[] = $id;

            $start_time = $match['time'];
            $date = date('Ymd', strtotime($start_time));
            FootballEventsController::curlEventsToHtml($date, $id);
            $excIndex++;
            usleep(300);
        }
        Redis::setEx($key, 24 * 60 * 60, json_encode($excArray));
        //echo $excIndex . ',' . json_encode($excArray);
    }
}