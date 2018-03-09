<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/3/9
 * Time: 17:41
 */

namespace App\Console\AppCommands\Community;


use App\Models\User\Account;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class AccountInfoCommand extends Command
{
    const AccountInfoTimeKey = "AccountInfoTimeKey";

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app_account_info_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '用户终端静态化';

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
        $now = time();
        $lastTime = Redis::get(self::AccountInfoTimeKey);
        $query = Account::query();
        if (!empty($lastTime)) {
            $update_date = date('Y-m-d H:i:s', $lastTime);
            $query->where('updated_at', '>', $update_date);
        }
        $topics = $query->get();
        foreach ($topics as $topic) {
            $url = asset('/static/community/account-info/' . $topic->id);
            TopicsDetailCommand::execUrl($url);
        }
        Redis::set(self::AccountInfoTimeKey, $now);
    }

}