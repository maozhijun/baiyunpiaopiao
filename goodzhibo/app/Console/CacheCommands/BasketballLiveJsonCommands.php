<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/8
 * Time: 18:30
 */

namespace App\Console\CacheCommands;

use App\Http\Controllers\StaticJson\JsonController;
use Illuminate\Console\Command;

class BasketballLiveJsonCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bb_live_json_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '篮球比赛即时数据静态化';

    /**
     * Create a new command instance.
     * HotMatchCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 定时任务，将进行中的比赛静态化。
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $fb = new JsonController();
        $seconds = 60;
        $sleep_time = 5;
        for ($time = 0; $time < $seconds;) {
            $start = time();
            $fb->staticBasketballLiveJson();//每五秒一次。
            sleep(1);
            $fb->staticBasketballRollJson();
            $exc_time = time() - $start;
            if ($exc_time < $sleep_time) {
                sleep($sleep_time - $exc_time);
            }
            $exc_time = time() - $start;
            $time += $exc_time;
            echo $time . ',,,';
        }
    }
}