<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/8
 * Time: 14:15
 */

namespace App\Console\DetailCommands\Basketball;


use Illuminate\Console\Command;

class BasketScheduleHtmlCommands extends Command
{
    use BasketballDetailCommonCommand;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basket_detail_schedule_html:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '比赛终端赛程部分比赛的缓存（base）';

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
        $this->onTabHtmlStatic(['base'], date('Ymd', strtotime('+1 day')));
    }
}