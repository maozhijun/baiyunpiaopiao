<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/10
 * Time: 17:14
 */

namespace App\Console;


use App\Http\Controllers\App\GoodsTopicController;
use App\Http\Controllers\PC\Live\LiveController;
use App\Http\Controllers\PC\RecommendsController;
use App\Http\Controllers\PC\TaskController;
use App\Http\Controllers\PC\TopicController;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class AppTopicCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app_topic_list_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'app资讯列表缓存';

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
        $home = new GoodsTopicController();
        $home->staticData();
    }
}