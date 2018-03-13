<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/1/30
 * Time: 13:27
 */

namespace App\Http\Controllers\Mobile\Live;


use App\Http\Controllers\CacheInterface\FootballInterface;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Match\MatchDetailTool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    use MatchDetailTool;

    const WEEK_CN_ARRAY = ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'];
    /**
     * 手机首页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function immediate(Request $request) {
        $json = $this->footballData();
        $json['type'] = 'immediate';
        return view('mobile.indexPhone', $json);
    }

    /**
     * 赛果
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function result(Request $request) {
        $date = $request->input('date', date('Y-m-d', strtotime('-1 days')));
        $json = $this->footballData($date);
        $json['type'] = 'result';
        $json['date'] = $date;
        $json['week'] = self::WEEK_CN_ARRAY[date('w', strtotime($date))];
        return view('mobile.indexPhone', $json);
    }

    /**
     * 赛程
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schedule(Request $request) {
        $date = $request->input("date", date('Y-m-d', strtotime('+1 days')));
        $json = $this->footballData($date);
        $json['type'] = 'schedule';
        $json['date'] = $date;
        $json['week'] = self::WEEK_CN_ARRAY[date('w', strtotime($date))];
        return view('mobile.indexPhone', $json);
    }

    /**
     * 有直播的直播赛事
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function lives(Request $request) {
        $date = $request->input("date", '');
        $json = $this->footballData($date);
        if (empty($date)) {
            $date = date('Y-m-d');
        }
        $matches = isset($json['matches']) ? $json['matches'] : [];
        $live_matches = [];
        foreach ($matches as $match) {
            if ($match['wap_live']) {
                $live_matches[] = $match;
            }
        }

        $json['type'] = 'lives';
        $json['matches'] = $live_matches;
        $json['date'] = $date;
        $json['week'] = self::WEEK_CN_ARRAY[date('w', strtotime($date))];
        return view('mobile.indexPhone', $json);
    }


    /**
     * 足球终端页
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function footballDetail(Request $request, $id){
        $match = $this->footballDetailMatchData($id);
        if (!isset($match)) {
            abort(404);
        }

        $data['id'] = $id;
        $base = $this->footballDetailAnalyseData($id);
        $odds = $this->footballOddData($id);
        $tech = $this->footballTechData($id);
        $lineup = $this->footballLineupData($id);
        if (isset($lineup) && count($lineup) > 0) {
            $data['lineup'] = $lineup;
        } else {
            $data['lineup']['home'] = null;
            $data['lineup']['away'] = null;
        }
        if (isset($tech) && count($tech) > 0) {
            $data['tech'] = $tech['tech'];
            if (isset($tech['event'])) {
                $event = $tech['event'];
                $data['events'] = $event['events'];
                $data['last_event_time'] = $event['last_event_time'];
            } else {
                $data['events'] = null;
            }
        } else {
            $data['tech'] = null;
            $data['events'] = null;
        }

        $data['match'] = $match;
        $data['base'] = $base;
        $data['odds'] = $odds;
        return view('mobile.footballDetail', $data);
    }
}