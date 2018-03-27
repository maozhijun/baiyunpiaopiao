<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;

class QQEncodesController extends BaseController
{
    private $ali_host = "";
    private $ali_key = "";
    private $ali_rtmp = "rtmp://video-center.alivecdn.com";
    private $gg_rtmp = "rtmp://msk.goodgame.ru:1940/live/";
    private $ggcdns = [
//        'aikanqiu188' => '141370?pwd=fe2cb6c6f525f295',
        'aikanqiu888' => '141371?pwd=e424794ba6687601',
        'aikanqiu168' => '141373?pwd=b876ef2042dd7474',
        'sportslive001' => '140136?pwd=941cdfeddec09d20',
//        'aizhibo188' => '141427?pwd=ab870a742642f687',
        'aizhibo168' => '141428?pwd=72f23b1b5788d9d3',
        'sportslive168' => '141443?pwd=4725d0025dd63ddb',
//        'sportslive188' => '141444?pwd=fb038eb31899d412',
        'aikanqiu001' => '141445?pwd=bcee1f58bbd860ba',
    ];
    private $alicdns = [
        '10001' => '/lives/10001',
        '10002' => '/lives/10002',
        '10003' => '/lives/10003',
        '10004' => '/lives/10004',
        '10005' => '/lives/10005',
        '10006' => '/lives/10006',
        '10007' => '/lives/10007',
        '10008' => '/lives/10008',
        '10009' => '/lives/10009',
        '10010' => '/lives/10010',
    ];

    public function __construct()
    {
        $this->middleware('filter')->except(['createdAliRoom']);
        $this->ali_host = env('ALI_CDN_HOST', '');
        $this->ali_key = env('ALI_CDN_KEY', '');
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', 'QQ')->where('to', 'AIKQ')->where('status', 1)->get();
        $result['ets'] = $ets;
        $result['ggcdns'] = $this->ggcdns;
        $user = session(AuthController::K_LOGIN_SESSION_KEY);
        if ($user['role'] == 'admin') {
            $result['alicdns'] = $this->alicdns;
        } else {
            $result['alicdns'] = [];
        }
        return view('manager.qq', $result);
    }

    public function created(Request $request)
    {
        if ($request->isMethod('post')
            && $request->has('input')
            && $request->has('channel')
            && $request->has('name')
        ) {
            $name = str_replace(' ', '-', $request->input('name'));
            $input = $request->input('input');
            $channel = $request->input('channel');
            list($type, $value) = explode('##', $channel);
            $rtmp_url = "";
            $output = "";
            if ($type == '阿里云') {
                $timestamp = time() + 10800;
                $sstring = $this->alicdns[$value] . "-$timestamp-0-0-" . $this->ali_key;
                $auth_key = "$timestamp-0-0-" . md5($sstring);
                $rtmp_url = $this->ali_rtmp . $this->alicdns[$value] . '?vhost=' . $this->ali_host . '&auth_key=' . $auth_key;
                $sstring = $this->alicdns[$value] . ".m3u8-$timestamp-0-0-" . $this->ali_key;
                $auth_key = "$timestamp-0-0-" . md5($sstring);
                $output = "http://" . $this->ali_host . $this->alicdns[$value] . ".m3u8?auth_key=" . $auth_key;
            } elseif ($type == 'GG') {
                $rtmp_url = $this->gg_rtmp . $this->ggcdns[$value];
                $output = "https://goodgame.ru/player?" . explode('?', $this->ggcdns[$value])[0];
            }

            $fontsize = $request->input('fontsize', 20);
            $watermark = $request->input('watermark', '');
            $location = $request->input('location', 'top');
            $has_logo = $request->input('logo');
            $referer = $request->input('referer', '');
            $header1 = $request->input('header1', '');
            $header2 = $request->input('header2', '');
            $header3 = $request->input('header3', '');
            $exec = $this->generateFfmpegCmd($input, $rtmp_url, $watermark, $fontsize, $location, $has_logo, $referer, $header1, $header2, $header3);

            shell_exec($exec);
            $pid = exec('pgrep -f "' . explode('?', $rtmp_url)[0] . '"');
            if (!empty($pid)) {
                $et = new EncodeTask();
                $et->name = $name;
                $et->channel = $channel;
                $et->input = $input;
                $et->rtmp = $rtmp_url;
                $et->out = $output;
                $et->from = 'QQ';
                $et->to = 'AIKQ';
                $et->status = 1;
                $et->save();
            }
        }
        return back();
    }

    public function stop(Request $request, $id)
    {
        $et = EncodeTask::query()->find($id);
        if (isset($et)) {
            $pid = exec('pgrep -f "' . explode('?', $et->rtmp)[0] . '"');
            if (!empty($pid)) {
                exec('kill -9 ' . $pid, $output_array, $return_var);
                if ($return_var == 0) {
                    $et->status = 0;
                    $et->stop_at = date_create();
                    $et->save();
                }
            } else {
                $et->status = 0;
                $et->stop_at = date_create();
                $et->save();
            }
        }
        return back();
    }

    public function createdAliRoom(Request $request)
    {
        $roomIds = ['10001', '10002', '10003', '10004', '10005', '10006', '10007', '10008', '10009', '10010'];
        $roomId = array_random($roomIds);
        $timestamp = time() + 10800;
        $sstring = $this->alicdns[$roomId] . "-$timestamp-0-0-" . $this->ali_key;
        $auth_key = "$timestamp-0-0-" . md5($sstring);
        $rtmp = $this->ali_rtmp . $this->alicdns[$roomId] . '?vhost=' . $this->ali_host . '&auth_key=' . $auth_key;

        $sstring = $this->alicdns[$roomId] . ".m3u8-$timestamp-0-0-" . $this->ali_key;
        $auth_key = "$timestamp-0-0-" . md5($sstring);
        $output_m3u8 = "http://" . $this->ali_host . $this->alicdns[$roomId] . ".m3u8?auth_key=" . $auth_key;

        $sstring = $this->alicdns[$roomId] . ".flv-$timestamp-0-0-" . $this->ali_key;
        $auth_key = "$timestamp-0-0-" . md5($sstring);
        $output_flv = "http://" . $this->ali_host . $this->alicdns[$roomId] . ".flv?auth_key=" . $auth_key;
        echo $rtmp . '<br>' . $output_m3u8 . '<br>' . $output_flv;
    }
}
