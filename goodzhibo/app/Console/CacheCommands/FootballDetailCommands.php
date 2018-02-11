<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/8
 * Time: 18:00
 */

namespace App\Console\CacheCommands;

use App\Http\Controllers\CacheInterface\FootballInterface;
use App\Http\Controllers\PC\Index\FootballController;
use App\Http\Controllers\StaticHtml\FootballDetailController;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FootballDetailCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fb_detail_cache:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '足球终端页缓存';

    /**
     * Create a new command instance.
     * HotMatchCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 定时任务，将进行中的比赛静态化。
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $request = new Request();
        $fbIntf = new FootballInterface();
        $jsonStr = $fbIntf->matchListDataJson();//获取即时的比赛信息。
        $json = json_decode($jsonStr, true);
        if (!isset($json)) {
            return "暂无比赛";
        }
        $matches = isset($json['matches']) ? $json['matches'] : [];
//        $pc = new FootballController();
        foreach ($matches as $match) {
            $status = $match['status'];
            if ($status > 0) {
                $start_time = $match['time'];
                $date = date('Ymd', strtotime($start_time));
                $id = $match['mid'];
                FootballDetailController::curlToHtml($date, $id);
            }
        }
        //首先加载pc终端
    }

    /**
     * 开始的终端数据
     * @param $id
     * @param $request
     * @param $controller
     * @param $date
     */
    public function detailHtml($id, $request, $controller, $date) {
        $detail_html = $controller->detail($request, $date, $id);
        $patch = '/static/football/detail/' . $date . '/' . $id . '.html';
        Storage::disk('public')->put($patch, $detail_html);
    }

    /**
     * 终端角球数据
     * @param $request
     * @param $date
     * @param $id
     * @param $controller
     */
    public function cornerHtml($request, $date, $id, $controller) {
        try {
            $cornerHtml = $controller->footballCornerCell($request, $date, $id);
            $patch = '/static/football/detail_cell/corner/' . $date . '/' . $id . '.html';
            Storage::disk('public')->put($patch, $cornerHtml);
        } catch (\Exception $exception) {
            echo ' exception cornerHtml : ' . $id . ' ,,';
        }
    }

    /**
     * 终端特色数据
     * @param $request
     * @param $date
     * @param $id
     * @param $controller
     */
    public function charaHtml($request, $date, $id, $controller) {
        try {
            $charaHtml = $controller->footballCharacteristicCell($request, $date, $id);
            $patch = '/static/football/detail_cell/chara/' . $date . '/' . $id . '.html';
            Storage::disk('public')->put($patch, $charaHtml);
        } catch (\Exception $exception) {
            echo ' exception charaHtml : ' . $id . ' ,,';
        }
    }

    /**
     * 终端比赛概括
     * @param $request
     * @param $date
     * @param $id
     * @param $controller
     */
    public function baseHtml($request, $date, $id, $controller) {
        try {
            $baseHtml = $controller->footballBaseCell($request, $date, $id);
            $patch = '/static/football/detail_cell/base/' . $date . '/' . $id . '.html';
            ///football/detail_cell/base/{date}/{id}.html
            Storage::disk('public')->put($patch, $baseHtml);
        } catch (\Exception $exception) {
            echo ' exception baseHtml : ' . $id . ' ,,';
            dump($exception);
        }
    }
}