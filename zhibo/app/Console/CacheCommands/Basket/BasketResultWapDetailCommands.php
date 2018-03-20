<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/3/13
 * Time: 18:38
 */

namespace App\Console\CacheCommands\Basket;

use Illuminate\Console\Command;


class BasketResultWapDetailCommands extends Command
{

    use BasketWapDetailTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basket_result_wap_detail_html:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'wap篮球终端页面静态化';

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
        $this->staticWapDetail(date('Ymd', strtotime('-1 days')));
    }

}