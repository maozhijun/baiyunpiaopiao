<?php
/**
 * Created by PhpStorm.
 * User: yaya
 * Date: 2018/1/21
 * Time: 19:40
 */

namespace App\Console;


use App\Http\Controllers\PC\Live\LiveController;
use App\Models\Match\MatchLiveChannel;
use Illuminate\Console\Command;

class PlayerJsonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'player_json_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '终端页json异步请求';

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
        $liveController = new LiveController();
        $json = $liveController->getLivesCache();

        $matches = $json['matches'];
        $url = '/live/player-json/';
        $now = time();//现在时间
        foreach ($matches as $match_array) {
            foreach ($match_array as $match) {
                if (isset($match) && isset($match['channels']) && isset($match['time'])) {
                    $m_time = strtotime($match['time']);

                    $flg1 = $now < $m_time && $now + 60 * 60 > $m_time;//比赛前一小时
                    $flg2 = false;//$now > $m_time && $m_time + 3 * 60 * 60 > $now;//比赛开始后3小时内

                    if ($flg1 || $flg2) {
                        $channels = $match['channels'];
                        foreach ($channels as $channel) {
                            if ($channel['type'] != MatchLiveChannel::kTypeTTZB) {//天天不做静态化。
                                $ch_id = $channel['id'];
                                self::execUrl($url . $ch_id);
                            }
                        }
                    }
                }
            }
        }
    }


    public static function execUrl($url, $timeout = 5) {
        $ch = curl_init();
        $url = asset($url);
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_exec ($ch);
        curl_close ($ch);
    }

}