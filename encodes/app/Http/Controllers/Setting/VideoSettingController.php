<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class VideoSettingController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {

        } elseif (env('APP_NAME') == 'aikq') {

        } elseif (env('APP_NAME') == 'leqiuba') {

        }
    }

    public function index(Request $request)
    {
        return view('manager.setting.video');
    }

    public function save(Request $request)
    {
        if ($request->isMethod('post')
            && $request->has('watermark')
            && $request->has('logo_text')
            && $request->has('location')
            && $request->has('logo_position')
        ) {
            $watermark = $request->input('watermark', '');
            $location = $request->input('location', 'top');
            $has_logo = $request->input('logo','0');
            $logo_position = $request->input('logo_position', '');
            $logo_text = $request->input('logo_text', '');
            $size = $request->input('size', 'md');
            Redis::set('watermark', $watermark);
            Redis::set('logo_text', $logo_text);
            Redis::set('logo_position', $logo_position);
            Redis::set('location', $location);
            Redis::set('size', $size);
            Redis::set('has_logo', $has_logo);
        }
        return back();
    }

}
