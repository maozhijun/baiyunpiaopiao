<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Api\ChannelFactory;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;

class AnchorChannelsSettingController extends BaseController
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

    public function channels(Request $request)
    {
        $disableIds = ChannelFactory::getDisableChannelIds();
        $channels = ChannelFactory::getTestChannels();

        return view('manager.setting.anchor_channels', ['disableIds'=> $disableIds, 'channels'=>$channels]);
    }

    public function save(Request $request)
    {
        if ($request->isMethod('post')
            && $request->has('id')
            && $request->has('disable')
        ) {
            $id = $request->input('id', '');
            $isDisable = $request->input('disable', 1) == 1;

            ChannelFactory::saveDisableChannelId($id, $isDisable);
        }
        return back();
    }

}
