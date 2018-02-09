<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/8
 * Time: 14:15
 */

namespace App\Console\CacheCommands;


use App\Http\Controllers\StaticJson\JsonController;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class BasketballListCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bb_list_json_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '篮球列表页缓存';

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
        //每分钟执行该定时任务，一分钟本方法将缓存2次比赛列表。
        $jc = new JsonController();
        $request = new Request();
        $jc->staticBasketballMatchesJson($request);//缓存当天的 篮球列表数据
        //sleep(20);
        $jc->staticBasketballMatchesJson($request);//缓存当天的 篮球列表数据
    }
}