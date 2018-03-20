<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/3/13
 * Time: 18:38
 */

namespace App\Console\CacheCommands\Basket;


use App\Console\PlayerJsonCommand;
use App\Http\Controllers\Mobile\Live\BasketBallController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class BasketScheduleWapDetailCommands extends Command
{
    use BasketWapDetailTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basket_schedule_wap_detail_html:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'wap赛程篮球终端页面静态化';

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
        $this->staticWapDetail(date('Ymd', strtotime('+1 days')));
    }

}