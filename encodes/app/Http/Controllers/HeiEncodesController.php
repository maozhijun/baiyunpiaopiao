<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;

class HeiEncodesController extends BaseController
{
    private $ali_host = "";
    private $ali_key = "";
    private $ali_rtmp = "rtmp://video-center.alivecdn.com";
    private $alicdns = [
        'hei-1' => '/lives/hei-1',
        'hei-2' => '/lives/hei-2',
        'hei-3' => '/lives/hei-3',
        'hei-4' => '/lives/hei-4',
        'hei-5' => '/lives/hei-5',
        'hei-6' => '/lives/hei-6',
        'hei-7' => '/lives/hei-7',
        'hei-8' => '/lives/hei-8',
    ];

    public function __construct()
    {
        $this->middleware('filter')->except(['createdAliRoom']);
        $this->ali_host = env('ALI_CDN_HOST', '');
        $this->ali_key = env('ALI_CDN_KEY', '');
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', 'QQ')->where('to', 'HEITU')->where('status', 1)->get();
        $user = session(AuthController::K_LOGIN_SESSION_KEY);
        if ($user['role'] == 'admin') {
            return view('manager.hei', ['ets' => $ets, 'alicdns' => $this->alicdns]);
        } else {
            return view('manager.hei', ['ets' => $ets, 'alicdns' => []]);
        }
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
//                $rtmp = $this->gg_rtmp . $this->ggcdns[$value];
//                $output = "https://goodgame.ru/player?" . explode('?', $this->ggcdns[$value])[0];
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
//            dump($pid);
            if (!empty($pid)) {
                $et = new EncodeTask();
                $et->name = $name;
                $et->channel = $channel;
                $et->input = $input;
                $et->rtmp = $rtmp_url;
                $et->out = $output;
                $et->from = 'QQ';
                $et->to = 'HEITU';
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
        $timestamp = time() + 10800;
        $sstring = $this->alicdns['hei-3'] . "-$timestamp-0-0-" . $this->ali_key;
        $auth_key = "$timestamp-0-0-" . md5($sstring);
        $rtmp = $this->ali_rtmp . $this->alicdns['hei-3'] . '?vhost=' . $this->ali_host . '&auth_key=' . $auth_key;
        $sstring = $this->alicdns['hei-3'] . ".m3u8-$timestamp-0-0-" . $this->ali_key;
        $auth_key = "$timestamp-0-0-" . md5($sstring);
        $output = "http://" . $this->ali_host . $this->alicdns['hei-3'] . ".m3u8?auth_key=" . $auth_key;
        echo $rtmp . '<br>' . $output;
    }
}
