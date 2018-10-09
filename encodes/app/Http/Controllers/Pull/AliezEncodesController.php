<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use QL\QueryList;

class AliezEncodesController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {

        } elseif (env('APP_NAME') == 'aikq') {

        }
    }

    public function index(Request $request)
    {
        $lines = $this->getLives($request);
        return view('manager.pull.aliez', ['lives' => $lines]);
    }

    public function getLives(Request $request)
    {
        $ql = new QueryList();
        $ql->get('http://aliez.tv/ajax/topch.php', [], [
            //设置超时时间，单位：秒
            'timeout' => 30,
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36',
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
                'accept-encoding' => 'gzip, deflate, br',
                'accept-language' => 'zh-CN,zh;q=0.9,en;q=0.8,ja;q=0.7',
                'upgrade-insecure-requests' => '1',
                'Cookie' => '__cfduid=dce787f2963747b909f60e94639be47841533282800; lng=en'
            ]
        ])->encoding('UTF-8')->removeHead();

        $lives = [];
        $trs = $ql->find('table td')->htmls();
        $qlb = new QueryList();
        foreach ($trs as $tr) {
//            dump($tr);
            $qlb->setHtml($tr);
            $href = $qlb->find('a')->attrs('href')->first();
            $img = $qlb->find('a img')->attrs('src')->first();
            $a['img'] = $img;
            $a['titleshort'] = explode('/', trim($href, '/'))[1];
            $a['line'] = $this->getLines($a['titleshort']);
            $a['href'] = "http://aliez.tv$href";
            $lives[] = $a;
        }
        return $lives;
    }

    private function getLines($titleshort = '')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://aliez.tv/api/api.php?m=getChannelInfo&titleshort=$titleshort&key=83968-77a287ee091eced6f2e240b652a72933");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);
        if (isset($json['cid'])) {
            return "https://aliez-stream.gcdn.co/hls/streama" . $json['cid'] . "/index.m3u8";
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
