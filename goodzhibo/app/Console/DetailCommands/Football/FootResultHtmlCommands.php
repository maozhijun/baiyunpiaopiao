<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/8
 * Time: 14:15
 */

namespace App\Console\DetailCommands\Football;


use Illuminate\Console\Command;

class FootResultHtmlCommands extends Command
{
    use FootballDetailCommonCommand;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'foot_detail_result_html:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '比赛终端完结部分比赛的缓存（base、odd、same_odd）';

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
        $this->onTabHtmlStatic(['base', 'odd', 'same_odd'], date('Ymd', strtotime('-1 day')));
    }
}