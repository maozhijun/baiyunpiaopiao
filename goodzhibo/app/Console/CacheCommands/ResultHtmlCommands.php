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

class ResultHtmlCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'result_html_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '足球列表、篮球赛果列表页面缓存';

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
        $pcFootballHtml = $pcFootball->result($request);
        Storage::disk("public")->put('/static/football/result.html', $pcFootballHtml);

        $wapFootball = new HomeController();
        $wapFootballHtml = $wapFootball->result($request);
        Storage::disk("public")->put('/static/m/football/result.html', $wapFootballHtml);
//----------------------------------------------------------------------------------------------------------//
        $pcBasketball = new BasketballController();
        $pcBasketballHtml = $pcBasketball->result($request);
        Storage::disk("public")->put('/static/basketball/result.html', $pcBasketballHtml);

        $wapBasketball = new \App\Http\Controllers\Mobile\Live\BasketBallController();
        $wapBasketballHtml = $wapBasketball->result($request);
        Storage::disk("public")->put('/static/m/basketball/result.html', $wapBasketballHtml);
    }

}