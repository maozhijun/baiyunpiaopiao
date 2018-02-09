<?php

namespace App\Console;

use App\Console\CacheCommands\BasketballListCommands;
use App\Console\CacheCommands\BasketballLiveJsonCommands;
use App\Console\CacheCommands\FootballDetailCommands;
use App\Console\CacheCommands\FootballListCommands;
use App\Console\CacheCommands\FootballLiveJsonCommands;
use App\Console\CacheCommands\FootballWapDetailCommands;
use App\Console\CacheCommands\ImmediateHtmlCommands;
use App\Console\CacheCommands\ResultHtmlCommands;
use App\Console\CacheCommands\ScheduleHtmlCommands;
use App\Http\Controllers\Mobile\Live\LiveController;
use App\Http\Controllers\StaticHtml\ResultHtmlController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Http\Request;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        IndexCommand::class,
        LiveDetailCommand::class,
        PlayerJsonCommand::class,
        DeleteExpireFileCommand::class,
        MobileDetailCommand::class,
        LivesJsonCommand::class,
        FootballListCommands::class,
        BasketballListCommands::class,
        ImmediateHtmlCommands::class,
        ResultHtmlCommands::class,
        ScheduleHtmlCommands::class,
        FootballLiveJsonCommands::class,
        BasketballLiveJsonCommands::class,
        FootballDetailCommands::class,
        FootballWapDetailCommands::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('live_json_cache:run')->everyMinute();//每分钟刷新一次赛事缓存
        $schedule->command('index_cache:run')->everyMinute();//每分钟刷新主页缓存
        $schedule->command('live_detail_cache:run')->everyFiveMinutes();//每五分钟刷新终端缓存
        $schedule->command('player_json_cache:run')->everyFiveMinutes();//五分钟刷新一次正在直播的比赛的线路内容
        $schedule->command('delete_cache:run')->dailyAt('07:00');//每天删除一次文件

        $schedule->command('mobile_detail_cache:run')->everyFiveMinutes();//每五分钟刷新移动直播终端缓存

        $mController = new LiveController();
        $schedule->call(function() use($mController){
            $mController->matchLiveStatic(new Request());//每分钟刷新比赛状态数据
        })->everyMinute();


        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $schedule->command('fb_list_json_cache:run')->everyMinute();//每分钟执行一次 足球当天列表的定时任务
        $schedule->command('bb_list_json_cache:run')->everyMinute();//每分钟执行一次 篮球当天列表的定时任务

        $schedule->command('imm_html_cache:run')->everyMinute();//即时列表html静态化。
        $schedule->command('result_html_cache:run')->everyFiveMinutes();//赛果列表html静态化。
        $schedule->command('schedule_html_cache:run')->everyThirtyMinutes();//赛程列表html静态化。

        $schedule->command('fb_detail_cache:run')->everyFiveMinutes();//正在比赛的足球赛事终端每分五种静态化一次。
        $schedule->command('fb_wap_detail_cache:run')->everyFiveMinutes();//正在比赛的足球赛事终端每分五种静态化一次。

        //$schedule->command('fb_detail_cache:run')->everyMinute();//足球即时比赛数据、赔率数据
        $schedule->command('bb_live_json_cache:run')->everyMinute();//篮球即时比赛数据、赔率数据
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
