<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/8
 * Time: 18:12
 */

namespace App\Http\Controllers\StaticHtml;


use App\Http\Controllers\CacheInterface\FootballInterface;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Live\HomeController;
use App\Http\Controllers\PC\Index\FootballController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FootballDetailController extends Controller
{

    public function staticHtml(Request $request) {
        $fbIntf = new FootballInterface();
        $jsonStr = $fbIntf->matchListDataJson();//获取即时的比赛信息。
        $json = json_decode($jsonStr, true);
        if (!isset($json)) {
            return "赛事为空";
        }
        $matches = isset($json['matches']) ? $json['matches'] : [];
        $pc = new FootballController();
        foreach ($matches as $match) {
            $status = $match['status'];
            $start_time = $match['time'];
            $date = date('Ymd', strtotime($start_time));
            $id = $match['mid'];
            $detail_html = $pc->detail($request, $date, $id);
            $patch = '/static/football/detail/' . $date . '/' . $id . '.html';
            Storage::disk('public')->put($patch, $detail_html);
            echo $patch . '</br>';
            usleep(100);
        }
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
        $wap = new HomeController();
        foreach ($matches as $match) {
            $status = $match['status'];
            if ($status > 0) {
                $start_time = $match['time'];
                $date = date('Ymd', strtotime($start_time));
                $id = $match['mid'];
                try {
                    $this->wapDetailHtml($request, $date, $id, $wap);
                    $this->wapOddHtml($request, $date, $id, $wap);
                    $this->wapCornerHtml($request, $date, $id, $wap);
                    $this->wapStyleHtml($request, $date, $id, $wap);
                    $this->wapOddIndexHtml($request, $date, $id, $wap);
                    $this->wapSameOddHtml($request, $date, $id, $wap);
                } catch (\Exception $exception) {
                    echo 'exception : FootballWapDetailCommands ' . $id . '   ....';
                }
            }
        }
        //首先加载pc终端
    }

    /**
     * 刷新单个WAP 足球终端 缓存。
     * @param Request $request
     * @param $date
     * @param $id
     */
    public function flushWapDetailAllCache(Request $request, $date, $id) {
        $wap = new HomeController();
        $this->wapDetailHtml($request, $date, $id, $wap);
//        $this->wapOddHtml($request, $date, $id, $wap);
//        $this->wapCornerHtml($request, $date, $id, $wap);
//        $this->wapStyleHtml($request, $date, $id, $wap);
//        $this->wapOddIndexHtml($request, $date, $id, $wap);
//        $this->wapSameOddHtml($request, $date, $id, $wap);
    }

    /**
     * 刷新单个PC 足球终端 缓存。
     * @param Request $request
     * @param $date
     * @param $id
     */
    public function flushPcDetailAllCache(Request $request, $date, $id) {
        $pc = new FootballController();
        $this->pcDetailHtml($request, $date, $id, $pc);//分析数据
//        $this->pcBaseHtml($request, $date, $id, $pc);//基本赛况
//        $this->pcCornerHtml($request, $date, $id, $pc);//角球数据
//        $this->pcCharaHtml($request, $date, $id, $pc);//特色数据
    }

    /**
     * 通过请求自己的链接静态化pc终端，主要是解决 文件权限问题。
     * @param $date
     * @param $mid
     */
    public static function curlToHtml($date, $mid) {
        $ch = curl_init();
        $url = asset('/static/football/detail/' . $date . '/' . $mid);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 25);
        curl_exec ($ch);
        curl_close ($ch);
    }

    /**
     * wap 静态化足球终端文件
     * @param $date
     * @param $mid
     */
    public static function curlToWapHtml($date, $mid) {
        $ch = curl_init();
        $url = asset('/static/football/detail/wap/' . $date . '/' . $mid);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_exec ($ch);
        curl_close ($ch);
    }

    //-------------------------------------------------------------------------------------//

    /**
     * 终端页HTML
     * @param $request
     * @param $date
     * @param $id
     * @param $wap
     */
    protected function wapDetailHtml($request, $date, $id, $wap) {
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
    protected function wapOddHtml($request, $date, $id, $wap) {
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
    protected function wapCornerHtml($request, $date, $id, $wap) {
        $cornerHtml = $wap->footballDetailCorner($request, $date, $id);
        $patch = '/static/m/football/detail/corner/' . $date . '/' . $id . '.html';
        Storage::disk('public')->put($patch, $cornerHtml);
    }

    /**
     * 终端页 风格
     * @param $request
     * @param $date
     * @param $id
     * @param $wap
     */
    protected function wapStyleHtml($request, $date, $id, $wap) {
        $styleHtml = $wap->footballDetailStyle($request, $date, $id);
        $patch = '/static/m/football/detail/style/' . $date . '/' . $id . '.html';
        Storage::disk('public')->put($patch, $styleHtml);
    }

    /**
     * 终端页 风格
     * @param $request
     * @param $date
     * @param $id
     * @param $wap
     */
    protected function wapOddIndexHtml($request, $date, $id, $wap) {
        $oddIndexHtml = $wap->footballOddIndex($request, $date, $id);
        $patch = '/static/m/football/detail/odd_index/' . $date . '/' . $id . '.html';
        Storage::disk('public')->put($patch, $oddIndexHtml);
    }

    /**
     * 终端页 通赔
     * @param $request
     * @param $date
     * @param $id
     * @param $wap
     */
    protected function wapSameOddHtml($request, $date, $id, $wap) {
        $sameOddHtml = $wap->footballSameOdd($request, $date, $id);
        $patch = '/static/m/football/detail/same_odd/' . $date . '/' . $id . '.html';
        Storage::disk('public')->put($patch, $sameOddHtml);
    }

    //--------------------------------------------------------------------------------------------------------------------------//


    /**
     * 开始的终端数据
     * @param $request
     * @param $date
     * @param $id
     * @param $controller
     */
    public function pcDetailHtml($request , $date, $id, $controller) {
        try {
            $detail_html = $controller->detail($request, $date, $id);
            $patch = '/static/football/detail/' . $date . '/' . $id . '.html';
            Storage::disk('public')->put($patch, $detail_html);
        } catch (Exception $e) {
            echo 'pcDetailHtml error' . $e->getMessage();
        }
    }

    /**
     * 终端角球数据
     * @param $request
     * @param $date
     * @param $id
     * @param $controller
     */
    public function pcCornerHtml($request, $date, $id, $controller) {
        try {
            $cornerHtml = $controller->footballCornerCell($request, $date, $id);
            $patch = '/static/football/detail_cell/corner/' . $date . '/' . $id . '.html';
            Storage::disk('public')->put($patch, $cornerHtml);
        } catch (\Exception $exception) {
            echo ' exception pcCornerHtml : ' . $id . $exception->getMessage() . ' ,,';
        }
    }

    /**
     * 终端特色数据
     * @param $request
     * @param $date
     * @param $id
     * @param $controller
     */
    public function pcCharaHtml($request, $date, $id, $controller) {
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
    public function pcBaseHtml($request, $date, $id, $controller) {
        try {
            $baseHtml = $controller->footballBaseCell($request, $date, $id);
            $patch = '/static/football/detail_cell/base/' . $date . '/' . $id . '.html';
            Storage::disk('public')->put($patch, $baseHtml);
        } catch (\Exception $exception) {
            echo ' exception baseHtml : ' . $id . ' ,,';
        }
    }

}