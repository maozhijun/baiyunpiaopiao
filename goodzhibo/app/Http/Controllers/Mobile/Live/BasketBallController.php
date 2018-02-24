<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/1
 * Time: 16:48
 */

namespace App\Http\Controllers\Mobile\Live;


use App\Http\Controllers\CacheInterface\BasketballInterface;
use App\Http\Controllers\CacheInterface\CacheTool;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Match\MatchDetailTool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class BasketBallController extends Controller
{
    use MatchDetailTool;

    /**
     * 即时篮球赛事列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function immediate(Request $request) {
        $json = $this->basketballData();
        $json['type'] = 'immediate';
        $json['date'] = empty($date) ? date('Y-m-d') : $date;
        return view('mobile.basketIndex', $json);
    }

    /**
     * 赛果篮球赛事列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function result(Request $request) {
        $date = $request->input('date', date('Y-m-d', strtotime('-1 days')));
        $json = $this->basketballData($date);
        $json['type'] = 'result';
        $json['date'] = empty($date) ? date('Y-m-d') : $date;
        return view('mobile.basketIndex', $json);
    }

    /**
     * 篮球比赛赛程列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schedule(Request $request) {
        $date = $request->input('date', date('Y-m-d', strtotime('+1 days')));
        $json = $this->basketballData($date);
        $json['type'] = 'schedule';
        $json['date'] = empty($date) ? date('Y-m-d') : $date;
        return view('mobile.basketIndex', $json);
    }

    /**
     * 篮球直播列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function lives(Request $request) {
        $date = $request->input('date', '');
        $json = $this->basketballData($date);
        $matches = [];
        if (isset($json['matches'])) {
            foreach ($json['matches'] as $match) {
                if ($match['wap_live']) {
                    $matches[] = $match;
                }
            }
        }
        $json['matches'] = $matches;
        $json['type'] = 'lives';
        $json['date'] = empty($date) ? date('Y-m-d') : $date;
        return view('mobile.basketIndex', $json);
    }

    /**
     * 篮球终端页
     * @param Request $request
     * @param $sp   比赛id的前2位数字
     * @param $id   比赛id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function basketballDetail(Request $request, $sp, $id){
        $data = $this->basketballDetailData($id);
        dump($data);
        return view('mobile.basketballDetail', ['match'=>$data]);
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function basketballData($date = '') {
        $cacheInterface = new BasketballInterface();
        $cacheJson = $cacheInterface->matchListDataJson($date);
        if (!empty($cacheJson)) {
            $json = json_decode($cacheJson, true);
            return $json;
        }

        $ch = curl_init();
        $url = env('LIAOGOU_URL')."/intf/basket/data?date=" . $date;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 篮球比赛终端数据 先从缓存文件获取数据，如果没有则从接口中获取。
     * @param $id
     * @return mixed
     */
    public function basketballDetailData($id) {
        //先从缓存文件获取
//        $patch = CacheTool::getCacheJsonPatch('public/json/detail/0/2/' . $id . '/match.json');
//        $json = CacheTool::getFileContent($patch);
//        if (!is_null($json)) {
//            return json_decode($json);
//        }
        $json = $this->basketballDetailMatchData($id);
        return $json;
    }

}