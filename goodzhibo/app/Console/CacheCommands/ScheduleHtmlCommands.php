<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/8
 * Time: 15:27
 */

namespace App\Console\CacheCommands;


use App\Http\Controllers\Mobile\Live\HomeController;
use App\Http\Controllers\PC\Index\BasketballController;
use App\Http\Controllers\PC\Index\FootballController;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleHtmlCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule_html_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '足球列表、篮球列表 赛程 页面缓存';

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
        $this->toHtml();
    }

    protected function toHtml() {
        $request = new Request();
        $pcFootball = new FootballController();
        $pcFootballHtml = $pcFootball->schedule($request);
        Storage::disk("public")->put('/static/football/schedule.html', $pcFootballHtml);

        $wapFootball = new HomeController();
        $wapFootballHtml = $wapFootball->result($request);
        Storage::disk("public")->put('/static/m/football/schedule.html', $wapFootballHtml);
//----------------------------------------------------------------------------------------------------------//
        $pcBasketball = new BasketballController();
        $pcBasketballHtml = $pcBasketball->result($request);
        Storage::disk("public")->put('/static/basketball/schedule.html', $pcBasketballHtml);

        $wapBasketball = new \App\Http\Controllers\Mobile\Live\BasketBallController();
        $wapBasketballHtml = $wapBasketball->result($request);
        Storage::disk("public")->put('/static/m/basketball/schedule.html', $wapBasketballHtml);
    }

}