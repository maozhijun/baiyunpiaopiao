<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OtherEncodesController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Other')->where('created_at', '>', date_create('-24 hour'))->whereIn('status', [1, 2, -1])->get();
        return view('manager.push.other', ['ets' => $ets]);
    }

    public function created(Request $request)
    {
        if ($request->isMethod('post')
            && !empty($request->input('input'))
            && !empty($request->input('channel'))
            && !empty($request->input('output'))
            && !empty($request->input('name'))
        ) {
            $name = str_replace(' ', '-', $request->input('name'));
            $input = $request->input('input');
            $rtmp_url = $request->input('channel');
            $output = $request->input('output');

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
                $et->channel = 'Other';
                $et->input = $input;
                $et->rtmp = $rtmp_url;
                $et->exec = $exec;
                $et->pid = $pid;
                $et->out = $output;
                $et->from = env('APP_NAME');
                $et->to = 'Other';
                $et->status = 1;
                $et->save();
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
