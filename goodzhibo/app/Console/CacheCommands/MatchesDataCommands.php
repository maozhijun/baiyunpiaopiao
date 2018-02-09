<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/9
 * Time: 11:34
 */

namespace App\Console\CacheCommands;


use App\Http\Controllers\StaticJson\JsonController;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class MatchesDataCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'matches_data_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '足球列表、篮球列表数据（3天前 - 3天后）缓存';

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
        $jsonCon = new JsonController();
        $request = new Request();
        for ($day = -3; $day < 4; $day++) {
            $fromDate = date('Y-m-d', strtotime($day . ' days'));
            echo $fromDate . ',';
            $jsonCon->staticFootballMatchesJson($request, $fromDate);
            sleep(1);
            $jsonCon->staticBasketballMatchesJson($request, $fromDate);
        }
    }

}
