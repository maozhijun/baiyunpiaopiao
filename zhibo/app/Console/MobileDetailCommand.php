<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/22
 * Time: 17:46
 */

namespace App\Console;


use App\Http\Controllers\CommonTool;
use App\Http\Controllers\Mobile\Live\LiveController;
use Illuminate\Console\Command;

class MobileDetailCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mobile_detail_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '移动直播终端缓存';

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

        $mCon = new LiveController();
        $url = '/m/static/detail/';
        //获取今天所有足球赛事
        $json = $mCon->getFootballMatches();
        if (isset($json['matches'])) {
            $matches = $json['matches'];
            foreach ($matches as $time=>$match_array) {
                foreach ($match_array as $match) {
                    if (!isset($match['mid']) || !isset($match['time'])) {
                        continue;
                    }
                    $mid = $match['mid'];
                    $m_time = strtotime($match['time']);
                    if (CommonTool::isExec(60 * 60, 0, $m_time)) {
                        PlayerJsonCommand::execUrl($url . $mid . '-1.html');
                    }
                }
            }
        }
        //获取今天所有篮球赛事
        $json = $mCon->getBasketballMatches();
        if (isset($json['matches'])) {
            $matches = $json['matches'];
            foreach ($matches as $time=>$match_array) {
                foreach ($match_array as $match) {
                    if (!isset($match['mid']) || !isset($match['time'])) {
                        continue;
                    }
                    $mid = $match['mid'];
                    $m_time = strtotime($match['time']);
                    if (CommonTool::isExec(60 * 60, 0, $m_time)) {
                        PlayerJsonCommand::execUrl($url . $mid . '-2.html');
                    }
                }
            }
        }
    }

}