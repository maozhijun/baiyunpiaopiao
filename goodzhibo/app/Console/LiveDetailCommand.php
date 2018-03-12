<?php
/**
 * Created by PhpStorm.
 * User: yaya
 * Date: 2018/1/21
 * Time: 19:24
 */

namespace App\Console;


use App\Http\Controllers\CommonTool;
use App\Http\Controllers\PC\Live\LiveController;
use App\Models\Match\MatchLive;
use Illuminate\Console\Command;

class LiveDetailCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'live_detail_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '直播终端缓存';

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
        $liveCon = new LiveController();
        $json = $liveCon->getLivesCache();
        $json = $json['matches'];
        $url_pre = '/live/flush/pc-detail/';
        foreach ($json as $index=>$datas){
            foreach ($datas as $match){
                if (!isset($match['mid']) || !isset($match['time']) || !isset($match['sport'])) {
                    continue;
                }
                $mid = $match['mid'];
                $m_time = strtotime($match['time']);
                $sport = $match['sport'];
                $after_time = $sport == MatchLive::kSportFootball ? 2 * 60 * 60 : 3 * 60 * 60;
                if (CommonTool::isExec(60 * 60, $after_time, $m_time)) {
                    //echo $match['time'] . '   ' . $sport .' url ' . $url_pre . $mid . '-' . $sport . '.html' . '...' ;
                    PlayerJsonCommand::execUrl($url_pre . $mid . '-' . $sport . '.html');
                }
            }
        }
    }

}