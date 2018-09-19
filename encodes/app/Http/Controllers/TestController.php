<?php
/**
 * Created by PhpStorm.
 * User: ricky007
 * Date: 2018/8/1
 * Time: 10:51
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Api\Channels\Uplive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function onTest()
    {
//        $huomaoQn = new HuomaoQiniu();
//        dump($huomaoQn);
//
//        $huomaoWs = new HuomaoWs();
//        dump($huomaoWs);
        dump(new Uplive());
    }

    public function homeInfo()
    {
//        $rest['_id'] = array_random([3218471, 3506713, 2530625, 3499736, 3336951, 460640, 362747, 2204064, 1380167, 1297035]);
//        $rest['uname'] = random_int(111111, 999999);//array_random(['送终鸡66'.random_int(111111,999999),'23242526'.random_int(111,999),'喵大哥'.random_int(111,999),'弘历下诏'.random_int(111,999),'x素人'.random_int(111,999),'南欲'.random_int(111,999)]);


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://www.zhangyu.tv/mobile/getAllChannels');
        curl_setopt($ch, CURLOPT_COOKIE, 'uni_id=uuizxn3y395031565gyvabbn72102749; y_id=uwkjl8yr17317358oi5qi3fm72103121; Hm_lvt_c50ba092b44e656b90290095c0481e61=1537272104; u=3304029; p=f1967cff3f85396050c48a3ff952115f; y_id=uwkjl8yr17317358oi5qi3fm72103121; JSESSIONID=02ec0e912f5b8a0f4e6069da8210; Hm_lpvt_c50ba092b44e656b90290095c0481e61=1537332940; _fmdata=LUhb%2F%2F6T3E%2FjQB6CvSRMq9ToiRBUszVSqSFv2fNwL7riEDJrmncEokOq%2FBndfPUn5Ju%2B5k2%2FsogPcKIq%2FCru4otXSGKaJuiam2mq8AuH2Tw%3D; XSRF-TOKEN=eyJpdiI6IlBDSTFpcVptYXRRUnpWTTVTaHl6ZGc9PSIsInZhbHVlIjoiQnJWR2JocUVhVTVSV29OMkVBdWdcLzliMFNGcmQ3NHk0bXpWSU0rYUNUN2xhYUZnejhockErT2NtSUxqdDRSMVhzdEFLb2kwNmQ1QXJ3U2JxU2Z4UU9nPT0iLCJtYWMiOiI3M2Q2ZmQyMGYzZmE0OWIzN2FlZDIwYTMwMTI0NDFhODllZWM1Y2Q2Nzg2YzUxM2M0NDk0MDM5ZjdhMWJkMDI1In0%3D; aikq_session=eyJpdiI6IkEyRDNpbXhEYXEwWlMrbXpWTzZ4VHc9PSIsInZhbHVlIjoibWp1aXFad09VUjZcL1hxRHFKWGl2WGNXTkFSTDdkUFFvOW1TdGhxME45SW9Xem5WNVwvMjZkVnhpZk9rUEV1MVV1MHpKK2d2dnB6MTRsd1VVNzNMRFBzdz09IiwibWFjIjoiZjRhYjNjYmNiM2E3NDBiNTlmMmJhY2QwNDU2NGU5MTMxZTE0YzM0NjA5ZTM3NzMxODRmYjkzMjMxYTk0YmM5MSJ9; CONTAINERID=ea08bfa5a0f0c165cf8a1061a937a5228cdd531d48ff406ef9705597f0b71272|W6HYd|W6HG1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);

        $user = array_random($json);
        $zyid = Redis::get('zyid_' . $user['_id']);
        $i = 0;
        while (!empty($zyid) && $i++ < 10) {
            $user = array_random($json);
            $zyid = Redis::get('zyid_' . $user['_id']);
        }
        Redis::setex('zyid_' . $user['_id'], 300, 1);
        $rest['_id'] = $user['_id'];
        $rest['uname'] = $user['uname'];

        $rest['figurl'] = 'http://pic.zhangyu.tv/upload/152743517542081.png';
        $rest['isanchor'] = true;
        $rest['coverUrl'] = "";
        $rest['phone'] = "13670535800";
        $rest['applystatus'] = 1;
        $rest['money'] = 3271043;
        $rest['rmb'] = 3271043;
        $rest['senddm'] = true;
        return json_encode($rest);
    }

    public function speak(Request $request)
    {
        $id = $request->input('id', 0);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://www.zhangyu.tv/channel/info?vip=true&cid=' . $id);
        curl_setopt($ch, CURLOPT_COOKIE, 'uni_id=uuizxn3y395031565gyvabbn72102749; y_id=uwkjl8yr17317358oi5qi3fm72103121; Hm_lvt_c50ba092b44e656b90290095c0481e61=1537272104; u=3304029; p=f1967cff3f85396050c48a3ff952115f; y_id=uwkjl8yr17317358oi5qi3fm72103121; JSESSIONID=02ec0e912f5b8a0f4e6069da8210; Hm_lpvt_c50ba092b44e656b90290095c0481e61=1537332940; _fmdata=LUhb%2F%2F6T3E%2FjQB6CvSRMq9ToiRBUszVSqSFv2fNwL7riEDJrmncEokOq%2FBndfPUn5Ju%2B5k2%2FsogPcKIq%2FCru4otXSGKaJuiam2mq8AuH2Tw%3D; XSRF-TOKEN=eyJpdiI6IlBDSTFpcVptYXRRUnpWTTVTaHl6ZGc9PSIsInZhbHVlIjoiQnJWR2JocUVhVTVSV29OMkVBdWdcLzliMFNGcmQ3NHk0bXpWSU0rYUNUN2xhYUZnejhockErT2NtSUxqdDRSMVhzdEFLb2kwNmQ1QXJ3U2JxU2Z4UU9nPT0iLCJtYWMiOiI3M2Q2ZmQyMGYzZmE0OWIzN2FlZDIwYTMwMTI0NDFhODllZWM1Y2Q2Nzg2YzUxM2M0NDk0MDM5ZjdhMWJkMDI1In0%3D; aikq_session=eyJpdiI6IkEyRDNpbXhEYXEwWlMrbXpWTzZ4VHc9PSIsInZhbHVlIjoibWp1aXFad09VUjZcL1hxRHFKWGl2WGNXTkFSTDdkUFFvOW1TdGhxME45SW9Xem5WNVwvMjZkVnhpZk9rUEV1MVV1MHpKK2d2dnB6MTRsd1VVNzNMRFBzdz09IiwibWFjIjoiZjRhYjNjYmNiM2E3NDBiNTlmMmJhY2QwNDU2NGU5MTMxZTE0YzM0NjA5ZTM3NzMxODRmYjkzMjMxYTk0YmM5MSJ9; CONTAINERID=ea08bfa5a0f0c165cf8a1061a937a5228cdd531d48ff406ef9705597f0b71272|W6HYd|W6HG1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);
        if (empty($json['fengyuncid'])) {
            return response('无效的ID', 404);
        }
        return view('test.speak', ['json' => $json]);
    }
}