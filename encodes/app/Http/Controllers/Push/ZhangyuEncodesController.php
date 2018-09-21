<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Api\Channels\Zhangyu;
use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ZhangyuEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {

        } elseif (env('APP_NAME') == 'aikq') {
            $this->channels[] = 'zhangyu?1';
            $this->channels[] = 'zhangyu?2';
            $this->channels[] = 'zhangyu?3';
            $this->channels[] = 'zhangyu?4';
            $this->channels[] = 'zhangyu?5';
            $this->channels[] = 'zhangyu?6';
            $this->channels[] = 'zhangyu?7';
            $this->channels[] = 'zhangyu?8';
            $this->channels[] = 'zhangyu?9';
        } elseif (env('APP_NAME') == 'aikq1') {
            $this->channels[] = 'zhangyu?a';
            $this->channels[] = 'zhangyu?b';
            $this->channels[] = 'zhangyu?c';
            $this->channels[] = 'zhangyu?d';
            $this->channels[] = 'zhangyu?e';
            $this->channels[] = 'zhangyu?f';
            $this->channels[] = 'zhangyu?g';
            $this->channels[] = 'zhangyu?h';
            $this->channels[] = 'zhangyu?i';

        } elseif (env('APP_NAME') == 'leqiuba') {
        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Zhangyu')->where('created_at', '>', date_create('-24 hour'))->whereIn('status', [1, 2, -1])->get();
        return view('manager.push.zhangyu', ['ets' => $ets, 'channels' => $this->channels]);
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
            $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Zhangyu')->where('created_at', '>', date_create('-24 hour'))->whereIn('status', [1, 2, -1])->inRandomOrder()->get();
            if ($ets->contains('channel', $channel)) {
                foreach ($this->channels as $ch) {
                    if (!$ets->contains('channel', $ch)) {
                        $channel = $ch;
                    }
                }
            }
            if (empty($channel)) {
                return back()->with(['error' => '没有可用的直播间咯']);
            }

            list($roomName, $keyword) = explode('?', $channel);

            $live_lines = '';
            $zhangyu = new Zhangyu(0, $keyword);
            $rtmp_url = $zhangyu->pushURL();
            $index = 0;
            while (strlen($rtmp_url) <= 0 && $index < 5) {
                $zhangyu = new Zhangyu(0, $channel);
                $rtmp_url = $zhangyu->pushURL();
                $index++;
            }
            $rtmp_url = $rtmp_url."/".$zhangyu->pushKey();
            $live_lines .= $zhangyu->playFLV();
            $live_lines .= "\n" . $zhangyu->playM3U8();
            $roomName = $channel;

            if (!empty($rtmp_url)) {
                $fontsize = $request->input('fontsize', 18);
                $watermark = $request->input('watermark', '');
                $location = $request->input('location', 'top');
                $has_logo = $request->input('logo');
                $logo_position = $request->input('logo_position', '');
                $logo_text = $request->input('logo_text', '');
                $referer = $request->input('referer', '');
                $header1 = $request->input('header1', '');
                $header2 = $request->input('header2', '');
                $header3 = $request->input('header3', '');
                $size = $request->input('size', 'md');
                $exec = $this->generateFfmpegCmd($input, $rtmp_url, $watermark, $fontsize, $location, $has_logo, $size, $referer, $header1, $header2, $header3, $logo_position, $logo_text);
                Log::info($exec);
                shell_exec($exec);
                $pid = exec('pgrep -f "' . explode('?', $rtmp_url)[0] . '"');
                if (!empty($pid) && is_numeric($pid) && $pid > 0) {
                    $et = new EncodeTask();
                    $et->name = $name;
                    $et->channel = $roomName;
                    $et->input = $input;
                    $et->rtmp = $rtmp_url;
                    $et->out = $live_lines;
                    $et->exec = $exec;
                    $et->pid = $pid;
                    $et->from = env('APP_NAME');
                    $et->to = 'Zhangyu';
                    $et->status = 1;
                    $et->save();
                }
            }
        }
        return back();
    }

    public function stop(Request $request, $id)
    {
        $this->stopPush($id);
        return back();
    }

    public function repeat(Request $request, $id)
    {
        $this->repeatPush($id);
        return back();
    }
}
