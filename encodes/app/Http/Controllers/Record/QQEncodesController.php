<?php

namespace App\Http\Controllers\Record;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QQEncodesController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
    }

    public function index(Request $request)
    {
        $date = $request->input('date', date('Y-m-d',strtotime('-1 day')));
//        dump($date);
//        dump(date('Y-m-d',strtotime('-3 day',strtotime($date))));
        $QQLives = $this->getQQLives($date);
        $records = [];
        foreach ($QQLives as $dlives) {
            foreach ($dlives['list'] as $live) {
                if (($live['matchInfo']['liveType'] == 1 || $live['matchInfo']['liveType'] == 4) && ($live['matchInfo']['livePeriod'] == 0 || $live['matchInfo']['livePeriod'] == 2)) {
                    $records[] = $live;
                }
            }
        }
//        date_add(date_create($date),new \DateInterval('+3day'));
        return view('manager.record.qq', ['records' => $records, 'date' => $date]);
    }

    public function getRecordUrl(Request $request, $id)
    {
        $detail = $this->getDetail($id);
        if (!empty($detail)) {
            return view('manager.record.qq_detail', ['detail' => $detail]);
        }
        return response('信号还在路上，等会再来看看！');
    }

    private function getDetail($id)
    {

        $url = "https://app.sports.qq.com/match/detailRelatedInfo?appvid=5.8.1&mid=$id";
//        dump($url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIE, 'business=1001; guid=0DEA21909F244210941DCD2B272735D0; lskey=0003000029da41bc6c76aea60fef32cb474dc8ca9f17d510e8dc7ffb6abcc43539c1c190db8a617bbeae7328; luin=o0373566342; main_login=qq; skey=M6AEoAJvHT; uid=1537651510241919015; uin=o0373566342');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
//        curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-CorrelationId: 97A40AEA1F594F5C998C0EEE453A03DA', 'x-b3-traceid: dafdb25b762b6b4a1ed3aef9ce1741c7', 'x-b3-spanid: 0522BAF66', 'x-b3-sampled: true']);
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "QQSportsV3/com.tencent.sportskbs/5.8.1.10 (iPhone(iPhone8,1); iOS 11.3; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);
//        dump($json);

        if (isset($json['data'])) {
            return $json['data'];
        } else {
            return null;
        }
    }

    private function getQQLives($date)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://app.sports.qq.com/match/hotMatchList?appvid=5.8.1&date=$date");
        curl_setopt($ch, CURLOPT_COOKIE, 'business=1001; guid=0DEA21909F244210941DCD2B272735D0; lskey=0003000029da41bc6c76aea60fef32cb474dc8ca9f17d510e8dc7ffb6abcc43539c1c190db8a617bbeae7328; luin=o0373566342; main_login=qq; skey=M6AEoAJvHT; uid=1537651510241919015; uin=o0373566342');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "QQSportsV3/com.tencent.sportskbs/5.8.1.10 (iPhone(iPhone8,1); iOS 11.3; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json['data']['matches'])) {
            return $json['data']['matches'];
        } else {
            return null;
        }
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
