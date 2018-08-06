<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;
use App\Models\RoomPushStream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OBSPushStreamController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {

        $result['code'] = 0;
        $result['msg'] = 'ok';
        $result['data'] = [];
        if (!$request->has('uid')) {
            $result['code'] = 403;
            $result['msg'] = 'uid不能为空';
        }
        $uid = $request->input('uid', 0);
        if ($uid < 1) {
            $result['code'] = 403;
            $result['msg'] = '无效的uid';
        }
        $level = $request->input('level', 1);
        if ($level < 1 || $level > 3) {
            $result['code'] = 403;
            $result['msg'] = '无效的level';
        }
        $refresh = $request->input('refresh', 0);//刷新

        $rps = RoomPushStream::query()->where('uid', $uid)->orderBy('created_at', 'desc')->first();
        if (!isset($rps) || $refresh == 1) {
            $rps = new RoomPushStream();
            $channel = ChannelFactory::createInstance($level, $uid);
            $rps->level = $channel->level;
            $rps->uid = $uid;
            $rps->status = 1;
            $rps->channel_id = $channel->id;
            $rps->channel_name = $channel->name;
            $rps->expiration = $channel->expiration;
            $rps->push_rtmp = $channel->pushURL();
            $rps->push_key = $channel->pushKey();
            $rps->live_flv = $channel->playFLV();
            $rps->live_m3u8 = $channel->playM3U8();
            $rps->live_rtmp = $channel->playRTMP();
            $rps->save();
        }

        $data['uid'] = $rps->uid;
        $data['level'] = $rps->level;
        $data['room_id'] = $rps->id;
        $data['channel_id'] = $rps->channel_id;
        $data['channel_name'] = $rps->channel_name;
        $data['expiration'] = $rps->expiration;
        $data['push_rtmp'] = $rps->push_rtmp;
        $data['push_key'] = $rps->push_key;
        $data['live_flv'] = $rps->live_flv;
        $data['live_m3u8'] = $rps->live_m3u8;
        $data['live_rtmp'] = $rps->live_rtmp;
        $result['data'] = $data;

        return response()->json($result);
    }

    public function test(Request $request)
    {
        $request->input('id', 101);
        $channel = ChannelFactory::createInstanceById($request->id);
        if (isset($channel)) {
            $data['level'] = $channel->level;
            $data['channel_id'] = $channel->id;
            $data['channel_name'] = $channel->name;
            $data['expiration'] = $channel->expiration;
            $data['push_rtmp'] = $channel->pushURL();
            $data['push_key'] = $channel->pushKey();
            $data['live_flv'] = $channel->playFLV();
            $data['live_m3u8'] = $channel->playM3U8();
            $data['live_rtmp'] = $channel->playRTMP();
            $result['data'] = $data;
            $result['code'] = 0;
            $result['msg'] = 'ok';
        } else {
            $result['code'] = 404;
            $result['msg'] = '找不到对应的平台';
        }
        return response()->json($result);
    }
}
