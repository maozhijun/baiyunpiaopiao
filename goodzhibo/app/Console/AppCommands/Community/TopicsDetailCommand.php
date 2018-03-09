<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/3/9
 * Time: 15:30
 */

namespace App\Console\AppCommands\Community;


use App\Models\Community\Topic;
use Illuminate\Console\Command;

class TopicsDetailCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app_community_topics_detail_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'app帖子终端缓存';

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
        //静态化 1小时内有变动内容的帖子
        $update_date = date('Y-m-d H:i:s', strtotime('-15 minutes'));
        $query = Topic::query()->where('updated_at', '>', $update_date);
        $topics = $query->get();
        foreach ($topics as $topic) {
            $url = asset('/static/community/topic-detail/' . $topic->id);
            echo self::execUrl($url);
        }
    }

    public static function execUrl($url, array $headers = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (!isset($headers) && count($headers) > 0) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_exec($ch);
        curl_close($ch);
    }

}