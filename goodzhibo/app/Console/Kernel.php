<?php

namespace App\Console;

use App\Console\AppCommands\AppTopicCommand;
use App\Console\AppCommands\Community\AccountInfoCommand;
use App\Console\AppCommands\Community\TopicsDetailCommand;
use App\Console\CacheCommands\Basket\BasketImmWapDetailCommands;
use App\Console\CacheCommands\Basket\BasketIngWapDetailCommands;
use App\Console\CacheCommands\Basket\BasketResultWapDetailCommands;
use App\Console\CacheCommands\Basket\BasketScheduleWapDetailCommands;
use App\Console\CacheCommands\BasketballListCommands;
use App\Console\CacheCommands\BasketballLiveJsonCommands;
use App\Console\CacheCommands\EventsHtmlCommands;
use App\Console\CacheCommands\EventsHtmlResultCommands;
use App\Console\CacheCommands\FootballDetailCommands;
use App\Console\CacheCommands\FootballDetailResultCommands;
use App\Console\CacheCommands\FootballDetailScheduleCommands;
use App\Console\CacheCommands\FootballListCommands;
use App\Console\CacheCommands\FootballLiveJsonCommands;
use App\Console\CacheCommands\FootballWapDetailCommands;
use App\Console\CacheCommands\FootballWapDetailResultCommands;
use App\Console\CacheCommands\FootballWapDetailScheduleCommands;
use App\Console\CacheCommands\ImmediateHtmlCommands;
use App\Console\CacheCommands\LiveHtmlCommands;
use App\Console\CacheCommands\MatchesDataCommands;
use App\Console\CacheCommands\ResultHtmlCommands;
use App\Console\CacheCommands\ScheduleHtmlCommands;
use App\Console\DetailCommands\Basketball\BasketImmediateHtmlCommands;
use App\Console\DetailCommands\Basketball\BasketResultHtmlCommands;
use App\Console\DetailCommands\Basketball\BasketScheduleHtmlCommands;
use App\Console\DetailCommands\Football\FootImmediateHtmlCommands;
use App\Console\DetailCommands\Football\FootResultHtmlCommands;
use App\Console\DetailCommands\Football\FootScheduleHtmlCommands;
use App\Http\Controllers\Mobile\Live\LiveController;
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
        IndexCommand::class,//直播首页静态化
        LiveDetailCommand::class,//PC直播终端静态化
        MobileDetailCommand::class,//手机直播终端静态化
        UnStartLiveDetailCommand::class,//开赛时间大于当前时间1小时的比赛终端（PC\WAP）静态化
        PlayerJsonCommand::class,//线路接口静态化
        PlayerHtmlCommand::class,//player 页面静态化
        DeleteExpireFileCommand::class,//删除过期文件

        LivesJsonCommand::class,//直播数据静态化
        FootballListCommands::class,//即时足球json数据静态化
        BasketballListCommands::class,//即时篮球json数据静态化

        ImmediateHtmlCommands::class,//篮球、足球 即时列表 静态化
        ResultHtmlCommands::class,//篮球、足球 结果列表 静态化
        ScheduleHtmlCommands::class,//篮球、足球 赛程列表 静态化
        LiveHtmlCommands::class,//篮球、足球 直播列表 静态化

        FootballLiveJsonCommands::class,//足球直播json数据静态化
        BasketballLiveJsonCommands::class,//篮球直播json数据静态化

        EventsHtmlCommands::class,//即时事件缓存
        EventsHtmlResultCommands::class,//赛果（昨天的事件缓存）

        MatchesDataCommands::class,//3天前-3天后的比赛数据静态化

        FootImmediateHtmlCommands::class,//app足球 即时终端页面静态化
        FootScheduleHtmlCommands::class,//app足球 赛事终端页面静态化
        FootResultHtmlCommands::class,//app足球 赛程终端页面静态化

        FootballDetailCommands::class,//即时赛事静态化
        FootballDetailScheduleCommands::class,//赛程终端静态化
        FootballDetailResultCommands::class,//赛果终端静态化
        FootballWapDetailCommands::class,//即时赛事静态化
        FootballWapDetailResultCommands::class,//wap赛果终端静态化
        FootballWapDetailScheduleCommands::class,//wap赛程终端静态化

        BasketImmediateHtmlCommands::class,//app篮球 即时终端静态化
        BasketResultHtmlCommands::class,//app篮球 赛果终端静态化
        BasketScheduleHtmlCommands::class,//app篮球 赛程终端静态化

        BasketResultWapDetailCommands::class,//wap 篮球赛果终端静态化
        BasketScheduleWapDetailCommands::class,//wap 篮球赛程终端静态化
        BasketImmWapDetailCommands::class,//wap 篮球即时赛事终端静态化
        BasketIngWapDetailCommands::class,//wap 篮球正在比赛的赛事终端静态化

        AppTopicCommand::class,//app资讯静态化
        TopicsDetailCommand::class, //帖子终端json静态化
        AccountInfoCommand::class,  //用户信息json静态化
        HasLiveCommand::class,//是否有直播定时任务
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

        $schedule->command('player_json_cache:run')->everyFiveMinutes();//五分钟刷新一次正在直播的比赛的线路内容
        $schedule->command('player_html_cache:run')->everyFiveMinutes();//五分钟刷新一次player.html  页面

        $schedule->command('delete_cache:run')->dailyAt('07:00');//每天删除一次文件

        $schedule->command('live_detail_cache:run')->everyFiveMinutes();//每五分钟刷新终端缓存
        $schedule->command('mobile_detail_cache:run')->everyFiveMinutes();//每五分钟刷新移动直播终端缓存
        //每五分钟刷新 pc、wap 未开始且开始时间距离现在大于1小时的比赛 每次执行35条。1小时后重更新执行
        $schedule->command('un_start_live_detail_cache:run')->everyFiveMinutes();

        $mController = new LiveController();
        $schedule->call(function() use($mController){
            $mController->matchLiveStatic(new Request());//每分钟刷新比赛状态数据
        })->everyMinute();

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $schedule->command('fb_live_json_cache:run')->everyMinute();//每分钟执行一次 足球当天列表的定时任务
        $schedule->command('bb_live_json_cache:run')->everyMinute();//篮球即时比赛数据、赔率数据

        $schedule->command('has_live_cache:run')->everyMinute();//生成判断是否有直播的静态文件.

        $schedule->command('fb_list_json_cache:run')->everyMinute();//每分钟执行一次 足球当天列表的定时任务
        $schedule->command('bb_list_json_cache:run')->everyMinute();//每分钟执行一次 篮球当天列表的定时任务
        $schedule->command('matches_data_cache:run')->hourly();//足球列表、篮球列表数据（3天前 - 3天后）缓存

        $schedule->command('imm_html_cache:run')->everyMinute();//即时列表html静态化。
        $schedule->command('result_html_cache:run')->everyFiveMinutes();//赛果列表html静态化。
        $schedule->command('schedule_html_cache:run')->everyThirtyMinutes();//赛程列表html静态化。
        $schedule->command('live_html_cache:run')->everyFiveMinutes();//m站 直播列表html静态化。

        $schedule->command('events_cache:run')->everyFiveMinutes();//每五分钟刷新一次正在比赛的足球赛事事件。
        $schedule->command('events_result_cache:run')->everyTenMinutes();//每10分钟刷新一次昨天已结束的足球赛事事件。

        $schedule->command('fb_detail_cache:run')->everyFiveMinutes();//正在比赛的足球赛事终端每分五种静态化一次。
        $schedule->command('fb_wap_detail_cache:run')->everyFiveMinutes();//正在比赛的足球赛事终端每分五种静态化一次。

        ////////
        $schedule->command('schedule_detail_cache:run')->everyTenMinutes();//每10分钟执行一次 每次缓存5个页面
        $schedule->command('result_detail_cache:run')->everyTenMinutes();//每10分钟执行一次 每次缓存5个页面

        $schedule->command('wap_schedule_detail_cache:run')->everyTenMinutes();//每10分钟执行一次 每次缓存5个页面
        $schedule->command('wap_result_detail_cache:run')->everyTenMinutes();//每10分钟执行一次 每次缓存5个页面
        ///////

        //$schedule->command('fb_detail_cache:run')->everyMinute();//足球即时比赛数据、赔率数据

        //足球终端页面缓存 app
        $schedule->command('foot_detail_immediate_html:run')->everyMinute();
        $schedule->command('foot_detail_result_html:run')->everyTenMinutes();
        $schedule->command('foot_detail_schedule_html:run')->everyTenMinutes();

        //篮球终端页面缓存 app
        $schedule->command('basket_detail_immediate_html:run')->everyMinute();
        $schedule->command('basket_detail_result_html:run')->everyTenMinutes();
        $schedule->command('basket_detail_schedule_html:run')->everyTenMinutes();

        //篮球终端页面静态化 wap 开始
        $schedule->command('basket_result_wap_detail_html:run')->everyFiveMinutes();//赛果终端
        $schedule->command('basket_schedule_wap_detail_html:run')->everyFiveMinutes();//赛程终端
        $schedule->command('basket_imm_wap_detail_html:run')->everyFiveMinutes();//即时赛事终端
        $schedule->command('basket_ing_wap_detail_html:run')->everyMinute();//正在比赛的赛事终端静态化
        //篮球终端页面静态化 wap 结束

        $schedule->command('app_topic_list_cache:run')->everyFiveMinutes();

        //社区相关定时任务 开始
        $schedule->command('app_community_topics_detail_cache:run')->everyTenMinutes();
        $schedule->command('app_account_info_cache:run')->everyTenMinutes();
        //社区相关定时任务 结束
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
