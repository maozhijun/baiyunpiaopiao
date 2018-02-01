<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/1/30
 * Time: 13:27
 */

namespace App\Http\Controllers\Mobile\Live;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
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
     * @param $date
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function footballDetail(Request $request, $date, $id){
        $key = 'footballDetail_' . $id;
        $cache = Redis::get($key);
        //$cache = '';
        if (!empty($cache)) {
            $data = json_decode($cache, true);
        } else {
            $data = $this->footballDetailData($id);
            Redis::setex($key, 60 * 60, json_encode($data));
        }
        if (!isset($data['match'])) {
           // abort(404);
        }
        //dump($data);
        if (isset($data['match'])) {
            $match = $data['match'];
            $match['h_y_p'] = $this->dataPercent($match, 'h_yellow', 'a_yellow');
            $match['a_y_p'] = $this->dataPercent($match, 'a_yellow', 'h_yellow');
            $match['h_r_p'] = $this->dataPercent($match, 'h_red', 'a_red');
            $match['a_r_p'] = $this->dataPercent($match, 'a_red', 'h_red');
            $match['h_cor_p'] = $this->dataPercent($match, 'h_corner', 'a_corner');
            $match['a_cor_p'] = $this->dataPercent($match, 'a_corner', 'h_corner');
            $match['h_sh_p'] = $this->dataPercent($match, 'h_shoot', 'a_shoot');
            $match['a_sh_p'] = $this->dataPercent($match, 'a_shoot', 'h_shoot');
            $match['h_sht_p'] = $this->dataPercent($match, 'h_shoot_target', 'a_shoot_target');
            $match['a_sht_p'] = $this->dataPercent($match, 'a_shoot_target', 'h_shoot_target');
            $match['h_con_p'] = $this->dataPercent($match, 'h_control', 'a_control');
            $match['a_con_p'] = $this->dataPercent($match, 'a_control', 'h_control');
            $match['h_hcon_p'] = $this->dataPercent($match, 'h_half_control', 'h_half_control');
            $match['a_hcon_p'] = $this->dataPercent($match, 'a_half_control', 'a_half_control');
            $data['match'] = $match;
        }
        $data['id'] = $id;
        return view('mobile.footballDetail', $data);
    }

    protected function dataPercent($match, $hkey, $akey) {
        if (!isset($match) || empty($hkey) || empty($akey) || !isset($match[$hkey]) || !isset($match[$akey])
            || ($match[$hkey] + $match[$akey]) == 0
        ) {
            return 0;
        }
        return $match[$hkey] / ($match[$hkey] + $match[$akey]);
    }

    /**
     * 足球终端也赔率数据html
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function footballOdd(Request $request, $id) {
        $data = $this->footballOddData($id);
        //dump($data);
        if (!isset($data['bankers']) || count($data['bankers']) == 0) {
            return "";
        }
        return view('mobile.cell.football_detail_odd', $data);
    }

    /**
     * 足球比赛终端，球队角球数据。
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function footballDetailCorner(Request $request, $id) {
        $data = $this->footballCornerData($id);
        //dump($data);
        return view('mobile.cell.football_detail_corner', $data);
    }

    /**
     * 球队终端球队风格数据
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function footballDetailStyle(Request $request, $id) {
        $data = $this->footballStyleData($id);
        return view('mobile.cell.football_detail_style', $data);
    }

    /**
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function footballOddIndex(Request $request, $id) {
        $json = $this->footballOddIndexData($id);
        return view('mobile.cell.football_detail_odd_index', $json);
    }

    /**
     * 赛事得历史同赔
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function footballSameOdd(Request $request, $id) {
        $json = $this->footballSameOddData($id);
        return view('mobile.cell.football_detail_same_odd', $json);
    }
    //==============================================================================================================================================//

    /**
     * @param string $date
     * @return mixed
     */
    public function footballData($date = '') {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."/intf/foot/data?date=" . $date;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 足球比赛终端数据
     * @param $id
     * @return mixed
     */
    public function footballDetailData($id) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."/intf/foot/detail/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 足球比赛赔率
     * @param $id
     * @return mixed
     */
    public function footballOddData($id) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."/intf/foot/odd/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 比赛终端事件、统计数据
     * @param $id
     * @return mixed
     */
    public function footballBaseData($id) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."/intf/foot/base/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    public function footballCornerData($id) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."/intf/foot/corner/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 足球终端、球队风格数据。
     * @param $id
     * @return mixed
     */
    public function footballStyleData($id) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."/intf/foot/team_style/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 比赛赔率指数
     * @param $id
     * @return mixed
     */
    public function footballOddIndexData($id) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."/intf/foot/odd_index/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 比赛赔率指数
     * @param $id
     * @return mixed
     */
    public function footballSameOddData($id) {
        $ch = curl_init();
        $url = env('LIAOGOU_URL')."/intf/foot/same_odd/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

}