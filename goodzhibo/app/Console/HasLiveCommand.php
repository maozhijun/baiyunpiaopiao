<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/10
 * Time: 17:14
 */

namespace App\Console;

use App\Http\Controllers\StaticJson\JsonController;
use App\Models\Match\MatchLive;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class HasLiveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'has_live_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '是否有直播定时任务';

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
        $patch = '/public' . JsonController::getMatchListStoragePatch('', MatchLive::kSportFootball);
        $liveJson = Storage::get($patch);
        if (empty($liveJson)) {
            echo '数据为空';
            return;
        }
        //echo $liveJson;
        $lives = json_decode($liveJson, true);
        if (is_null($lives) || !isset($lives['matches'])) {
            echo '数据为空';
            return;
        }
        $matches = $lives['matches'];
        foreach ($matches as $live) {
            //["live"=>0, "pc_live"=>0]
            if (!isset($live['mid']) || !isset($live['status']) || (!isset($live['live']) && !isset($live['wap_live'])) ) {
                continue;
            }
            $mid = $live['mid'];
//            echo $mid;
            $status = $live['status'];
            $live = isset($live['live']) ? $live['live'] : false;
            $mLive = isset($live['wap_live']) ? $live['wap_live'] : false;

            $pcLive = ($status > 0 && $live) ? 1 : 0;
            $wapLive = ($status > 0 && $mLive) ? 1 : 0;
            $json = ['live'=>$wapLive , 'pc_live'=>$pcLive];
            ///data/app/goodzhibo/storage/app/public/static/football
            Storage::disk('public')->put('static/football/has_live/' . $mid . '.json', json_encode($json));
        }
    }
}