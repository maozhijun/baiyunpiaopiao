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

class LiveHtmlCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'live_html_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '足球列表、篮球列表 直播 页面缓存';

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
        $wapFootball = new HomeController();
        $wapFootballHtml = $wapFootball->lives($request);
        Storage::disk("public")->put('/static/m/football/lives.html', $wapFootballHtml);
//----------------------------------------------------------------------------------------------------------//
        $wapBasketball = new \App\Http\Controllers\Mobile\Live\BasketBallController();
        $wapBasketballHtml = $wapBasketball->lives($request);
        Storage::disk("public")->put('/static/m/basketball/lives.html', $wapBasketballHtml);
    }

}