<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use QL\QueryList;

class BallbarEncodesController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
    }

    public function index(Request $request)
    {
        $lives = $this->getBallbarLives();
        return view('manager.pull.ballbar', ['lives' => $lives]);
    }

    public function getLiveUrl(Request $request, $id)
    {
        $url = $this->getBallbarLive($id);
        if (!empty($url)) {
            return response($url);
        }
        return response('404');
    }

    private function getBallbarLives()
    {
        $ql = new QueryList();
        $ql->get('https://m.b8b8.tv', [], [
//            'proxy' => 'http://222.141.11.17:8118',
            //设置超时时间，单位：秒
            'timeout' => 30,
            'headers' => [
                'Referer' => 'https://m.b8b8.tv',
                'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36',
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
                'accept-encoding' => 'gzip, deflate, br',
                'accept-language' => 'zh-CN,zh;q=0.9,en;q=0.8,ja;q=0.7',
                'upgrade-insecure-requests' => '1',
                'Cookie' => '_ga=GA1.2.681749934.1513324254; UM_distinctid=1617fcbc42ffa-0086fc9eb17e1-32607400-fa000-1617fcbc43172a; Hm_lvt_73fed32a3c365c85a9a5313be34a1790=1522144311; _gid=GA1.2.2061057574.1524450396; Hm_lvt_d4e5f9ab49e8cb4e425268179b76a2fc=1524450492; _gat_gtag_UA_76409055_1=1; _gat_gtag_UA_101929895_1=1; Hm_lpvt_d4e5f9ab49e8cb4e425268179b76a2fc=1524468129; Hm_lpvt_73fed32a3c365c85a9a5313be34a1790=1524468146'
            ]
        ])->encoding('UTF-8')->removeHead();

        $lives = [];
        $boxes = $ql->find('.box')->htmls();
        foreach ($boxes as $box) {
            $qlb = new QueryList();
            $qlb->setHtml($box);
            $date = $qlb->find('.dateHeader')->texts()->first();

            $lis = $qlb->find('.match-container li')->htmls();
            foreach ($lis as $li) {
                $qll = new QueryList();
                $qll->setHtml($li);
                $live['time'] = $qll->find('.time')->texts()->first();
                $live['league'] = $qll->find('.league')->texts()->first();
                $live['match_name'] = $qll->find('.match-name')->texts()->first();
                $live['url'] = $qll->find('.match-name')->attrs('href')->first();
//                if (!starts_with($live['url'], 'http')) {
//                    $live['url'] = 'https:' . $live['url'];
//                }
                $live['id'] = array_last(explode('/', $live['url']));
                $live['url'] = 'https://v.ballbar.cc/v/' . $live['id'];
                $lives[$date][] = $live;
            }
        }
//        dump($lives);
        return $lives;
    }


    private function getBallbarLive($id)
    {
        $ql = new QueryList();
        $ql->post('https://v.ballbar.cc/data/LivePlayerNew.php', [
            'id' => $id,
            'rnd' => random_int(10000, 99999),
        ], [
//            'proxy' => 'http://222.141.11.17:8118',
            //设置超时时间，单位：秒
            'timeout' => 30,
            'headers' => [
                'Referer' => 'https://v.ballbar.cc',
                'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36',
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
                'accept-encoding' => 'gzip, deflate, br',
                'accept-language' => 'zh-CN,zh;q=0.9,en;q=0.8,ja;q=0.7',
                'content-type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                'x-requested-with' => 'XMLHttpRequest',
                'Cookie' => '_ga=GA1.2.681749934.1513324254; UM_distinctid=1617fcbc42ffa-0086fc9eb17e1-32607400-fa000-1617fcbc43172a; Hm_lvt_73fed32a3c365c85a9a5313be34a1790=1522144311; _gid=GA1.2.2061057574.1524450396; Hm_lvt_d4e5f9ab49e8cb4e425268179b76a2fc=1524450492; _gat_gtag_UA_76409055_1=1; _gat_gtag_UA_101929895_1=1; Hm_lpvt_d4e5f9ab49e8cb4e425268179b76a2fc=1524468129; Hm_lpvt_73fed32a3c365c85a9a5313be34a1790=1524468146'
            ]
        ]);//->encoding('UTF-8');
        $html = $ql->getHtml();
        $BOM = chr(239) . chr(187) . chr(191);
        $html = str_replace($BOM, '', $html);
        $json = json_decode($html, true);
        if (!empty($json['playurl'])) {
            return urldecode($json['playurl']);
        }
        return '';
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