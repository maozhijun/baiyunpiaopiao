<?php

namespace App\Http\Controllers\Lehu;

use App\Http\Controllers\Api\Channels\AikqWS;
use App\Http\Controllers\Api\Channels\AikqWS1;
use App\Http\Controllers\Api\Channels\AikqWS2;
use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LehuStreamController extends BaseController
{

    /**
     * LehuStreamController constructor.
     *
     * 主播列表GET
     * http://console.lehuzhibo.com/api/rooms/robot.json
     *
     * 分类GET
     * http://console.lehuzhibo.com/api/rooms/types
     *
     * 修改机器人房间信息POST
     * http://console.lehuzhibo.com/api/rooms/robot/save
     * id=id，title="房间标题"，notice="房间公共"，liveType=type_id，liveTypeChild=children_id
     *
     */

    public function __construct()
    {
        parent::__construct();
        $this->random_logo = '';
        $this->middleware('filter')->except([]);
    }

    public function index(Request $request)
    {

        $roomStr = file_get_contents('http://console.lehuzhibo.com/api/rooms/robot.json');
        $rooms = json_decode($roomStr);

        $typeStr = file_get_contents('http://console.lehuzhibo.com/api/rooms/types');
        $types = json_decode($typeStr);

        $ets = EncodeTask::query()
            ->where('from', env('APP_NAME'))
            ->where('to', 'Lehu')
            ->where('created_at', '>', date_create('-24 hour'))
            ->whereIn('status', [1, 2, -1])
            ->get();
        return view('manager.lehu.index', ['ets' => $ets, 'rooms' => $rooms, 'types' => $types]);
    }

    public function created(Request $request)
    {
        if ($request->isMethod('post')
            && $request->has('room') && !empty($request->room)
            && $request->has('type') && !empty($request->type)
            && $request->has('title') && !empty($request->title)
            && $request->has('platform') && !empty($request->platform)
            && $request->has('input') && !empty($request->input)
        ) {
            list($room_id, $room_num, $room_nickname) = explode('-', $request->room);
            $input = $request->input;
            $name = $request->title;
            switch ($request->platform) {
                case 1: {
                    $aikqWs = new AikqWS($room_num);
                    break;
                }
                case 2: {
                    $t20 = strtotime(date("Y-m-d 17:00:00"));
                    $t23 = strtotime(date("Y-m-d 23:30:00"));
                    $t = time();
                    if ($t > $t20 && $t < $t23) {
                        return response('<h1 style="padding-top: 100px;width: 100%;text-align: center;">兄dei，现在是晚高峰，不要用网宿，记住哟！</h1>');
                    }
                    $aikqWs = new AikqWS1($room_num);
                    break;
                }
                case 3: {
                    $aikqWs = new AikqWS2($room_num);
                    break;
                }
                default: {
                    return response('<h1 style="padding-top: 100px;width: 100%;text-align: center;">兄dei，无效的计费类型哟！</h1>');
                }
            }
            $rtmp_url = $aikqWs->pushURL() . '/' . $aikqWs->pushKey();//获取rtmp地址
            $live_flv_url = $aikqWs->playFLV();//flv地址
            $live_rtmp_url = $aikqWs->playRTMP();//rtmp地址
            $live_m3u8_url = $aikqWs->playM3U8();//m3u8地址

            $fontsize = $request->input('fontsize', 18);
            $watermark = $request->input('watermark', '');
            $location = $request->input('location', 'top');
            $has_logo = $request->input('logo', false);
            $logo_position = $request->input('logo_position', 'right');
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
                $et->channel = $room_nickname;
                $et->input = $input;
                $et->rtmp = $rtmp_url;
                $et->exec = $exec;
                $et->pid = $pid;
                $et->out = $live_flv_url . "\n" . $live_rtmp_url . "\n" . $live_m3u8_url;
                $et->from = env('APP_NAME');
                $et->to = "Lehu";
                $et->status = 1;
                $et->save();

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'http://console.lehuzhibo.com/api/rooms/robot/save');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_POST, 1);
                list($type, $subtype) = explode('-', $request->type);
                $post_data = array(
                    "id" => $room_id,
                    "title" => $name,
                    "liveType" => $type,
                    "liveTypeChild" => $subtype,
                );
                curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
                $data = curl_exec($curl);
                curl_close($curl);
                sleep(3);//休息3秒
            }
        }
        return back();
    }

    public function test()
    {
//        list($roomName, $roomId, $token) = explode('##', '老铁扣波666##10061563##3c4068b47d194772');
//        $rtmp_json = $this->getRtmp($token);
//        $fms_val = $rtmp_json['fms_val'];
//        $rtmp_id = array_first(array_keys($rtmp_json['list']));
//        $rtmp_url = array_first(array_values($rtmp_json['list']));
//        if ($this->startLive($token, $fms_val, $rtmp_id)) {//开播成功
//            $flvUrl = $this->getFlv($roomId);
//            $m3u8Url = $this->getM3u8($roomId);
//            dump($rtmp_url);
//            dump($flvUrl);
//            dump($m3u8Url);
//        }
    }
}
