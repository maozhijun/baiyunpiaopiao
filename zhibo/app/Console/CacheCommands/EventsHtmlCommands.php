<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/9
 * Time: 11:08
 */

namespace App\Console\CacheCommands;


use App\Http\Controllers\CacheInterface\FootballInterface;
use App\Http\Controllers\PC\Index\FootballController;
use App\Http\Controllers\StaticHtml\FootballEventsController;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventsHtmlCommands extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '事件缓存';

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
        $jsonStr = $fbIntf->matchListDataJson();//获取即时的比赛信息。
        $json = json_decode($jsonStr, true);
        if (!isset($json)) {
            return "暂无比赛";
        }
        $matches = isset($json['matches']) ? $json['matches'] : [];
        foreach ($matches as $match) {
            $status = $match['status'];
            if ($status > 0) {
                $start_time = $match['time'];
                $date = date('Ymd', strtotime($start_time));
                $id = $match['mid'];
                //echo $start_time . ',' . $id . '。';
                FootballEventsController::curlEventsToHtml($date, $id);
                usleep(500);
            }
        }
    }
}