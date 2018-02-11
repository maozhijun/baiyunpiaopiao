<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/8
 * Time: 19:34
 */

namespace App\Console\CacheCommands;


use App\Http\Controllers\CacheInterface\FootballInterface;
use App\Http\Controllers\Mobile\Live\HomeController;
use App\Http\Controllers\StaticHtml\FootballDetailController;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FootballWapDetailCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fb_wap_detail_cache:run';

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
        foreach ($matches as $match) {
            $status = $match['status'];
            if ($status > 0) {
                $start_time = $match['time'];
                $date = date('Ymd', strtotime($start_time));
                $id = $match['mid'];
                try {
                    FootballDetailController::curlToWapHtml($date, $id);
                } catch (\Exception $exception) {
                    echo 'exception : FootballWapDetailCommands ' . $id . '   ....';
                }
            }
        }
        //首先加载pc终端
    }

    /**
     * 终端页HTML
     * @param $request
     * @param $date
     * @param $id
     * @param $wap
     */
    protected function detailHtml($request, $date, $id, $wap) {
        $detailHtml = $wap->footballDetail($request, $date, $id);
        $patch = '/static/m/football/detail/' . $date . '/' . $id . '.html';
        Storage::disk('public')->put($patch, $detailHtml);
    }

    /**
     * 终端页 分析赔率
     * @param $request
     * @param $date
     * @param $id
     * @param $wap
     */
    protected function oddHtml($request, $date, $id, $wap) {
        $oddHtml = $wap->footballOdd($request, $date, $id);
        $patch = '/static/m/football/detail/odd/' . $date . '/' . $id . '.html';
        Storage::disk('public')->put($patch, $oddHtml);
    }

    /**
     * 终端页 分析赔率
     * @param $request
     * @param $date
     * @param $id
     * @param $wap
     */
    protected function cornerHtml($request, $date, $id, $wap) {
        $cornerHtml = $wap->footballDetailCorner($request, $date, $id);
        $patch = '/static/m/football/corner/odd/' . $date . '/' . $id . '.html';
        Storage::disk('public')->put($patch, $cornerHtml);
    }

    /**
     * 终端页 风格
     * @param $request
     * @param $date
     * @param $id
     * @param $wap
     */
    protected function styleHtml($request, $date, $id, $wap) {
        $styleHtml = $wap->footballDetailCorner($request, $date, $id);
        $patch = '/static/m/football/corner/style/' . $date . '/' . $id . '.html';
        Storage::disk('public')->put($patch, $styleHtml);
    }

    /**
     * 终端页 风格
     * @param $request
     * @param $date
     * @param $id
     * @param $wap
     */
    protected function oddIndexHtml($request, $date, $id, $wap) {
        $oddIndexHtml = $wap->footballDetailCorner($request, $date, $id);
        $patch = '/static/m/football/corner/odd_index/' . $date . '/' . $id . '.html';
        Storage::disk('public')->put($patch, $oddIndexHtml);
    }

    /**
     * 终端页 通赔
     * @param $request
     * @param $date
     * @param $id
     * @param $wap
     */
    protected function sameOddHtml($request, $date, $id, $wap) {
        $sameOddHtml = $wap->footballDetailCorner($request, $date, $id);
        $patch = '/static/m/football/corner/same_odd/' . $date . '/' . $id . '.html';
        Storage::disk('public')->put($patch, $sameOddHtml);
    }

}