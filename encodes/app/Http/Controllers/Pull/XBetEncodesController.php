<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use QL\QueryList;

class XBetEncodesController extends BaseController
{
    const K_SESSION_X_BET_HLS = "k_session_x_bet_hls";

    const K_X_BET_USER_AGENT = "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.26 Safari/537.36 Core/1.63.6726.400 QQBrowser/10.2.2265.400";

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
    }

    public function index(Request $request)
    {
//        $lives = $this->getXBetLives();
//        return view('manager.pull.xbet', ['lives' => $lives]);
        $lives = $this->getSStreamLives();
        $upcomings = $this->getSStreamUpcomingLives();
        return view('manager.pull.sstream365', ['lives' => $lives, 'upcomings' => $upcomings]);
    }

    public function getSStreamUrl(Request $request)
    {
        if ($request->has("hlsUrl")) {
            $hlsUrl = $request->input("hlsUrl");
//            $hlsUrl = base64_decode($hlsUrl);
//            $hlsUrl = urldecode($hlsUrl);
            return response($hlsUrl);
        } else {
            $eval = $this->getNewSStreamLines($request->input('url'));
//            dump($eval);
            return view('manager.pull.xbet_lines', ['eval' => $eval]);
        }

//        $lives = $this->getSStreamLines($request->input('url'));
//        if (!empty($lives)) {
//            return response($lives);
//        }
//        return response('404');
    }

    public function getLiveUrl(Request $request, $id)
    {
        $lives = $this->getXBetLines($id);
        if (!empty($lives)) {
            return response($lives);
        }
        return response('404');
    }

    private function getXBetLives()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://1xbet.com/LiveFeed/GetLeftMenuShort?lng=cn&sports=0&partner=24');
        curl_setopt($ch, CURLOPT_COOKIE, 'SESSION=3f4c84d61480e6077680acd4645c3470; is_rtl=1; lng=cn');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, self::K_X_BET_USER_AGENT);
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
        if (isset($json) && !empty($json['Value'])) {
            return $json['Value'];
        } else {
            return null;
        }
    }

    private function getSStreamLives()
    {
        $ql = new QueryList();
        $ql->get('http://sstream365.com/', [], [
            //设置超时时间，单位：秒
            'timeout' => 30,
            'headers' => [
                'User-Agent' => self::K_X_BET_USER_AGENT,
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
                'accept-encoding' => 'gzip, deflate, br',
                'accept-language' => 'zh-CN,zh;q=0.9,en;q=0.8,ja;q=0.7',
                'upgrade-insecure-requests' => '1',
                'Cookie' => '__cfduid=d913bf68f903853b3c1697c9c29733ba31532567654'
            ]
        ])->encoding('UTF-8')->removeHead();

        $lives = [];
        $trs = $ql->find('tbody tr')->htmls();
        foreach ($trs as $tr) {
            $qlb = new QueryList();
            $qlb->setHtml($tr);
            $type = $qlb->find('td b')->texts()->last();
//            dump($type);
            if ($type == '足球' || $type == '篮球') {
//          if ($type == '足球' || $type == '篮球' || $type == '网球') {
                $a['type'] = $type;
                $league = $qlb->find('td b')->texts()->first();
                $a['league'] = $league;
//                dump($league);
                $name = $qlb->find('td a')->texts()[1];
                $a['name'] = $name;
//                dump($name);
                $link = 'http://sstream365.com' . $qlb->find('td a')->attrs('href')[1];
                $a['link'] = $link;
//                dump($link);
//                $date = $qlb->find('td')->texts()->last();
//                $a['date'] = $date;
                $date = $qlb->find('td')->texts()->first();
                $a['date'] = explode(' ',$date)[0];
//                dump($date);
                $lives[] = $a;
            }
        }
        return $lives;
    }

    private function getSStreamUpcomingLives()
    {
        $ql = new QueryList();
        $ql->get('http://sstream365.com/upcoming/', [], [
            //设置超时时间，单位：秒
            'timeout' => 30,
            'headers' => [
                'User-Agent' => self::K_X_BET_USER_AGENT,
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
                'accept-encoding' => 'gzip, deflate, br',
                'accept-language' => 'zh-CN,zh;q=0.9,en;q=0.8,ja;q=0.7',
                'upgrade-insecure-requests' => '1',
                'Cookie' => '__cfduid=d913bf68f903853b3c1697c9c29733ba31532567654'
            ]
        ])->encoding('UTF-8')->removeHead();

        $lives = [];
        $trs = $ql->find('tbody tr')->htmls();
        foreach ($trs as $tr) {
            if (count($lives) >= 10) break;
//            dump($tr);
            $qlb = new QueryList();
            $qlb->setHtml($tr);
//            dump($qlb->find('td a'));
//            dump($qlb->find('td b')->texts());
            $type = $qlb->find('td b')->texts()->last();
            if ($type == '足球' || $type == '篮球') {
//          if ($type == '足球' || $type == '篮球' || $type == '网球') {
                $a['type'] = $type;
                $league = $qlb->find('td b')->texts()->first();
                $a['league'] = $league;
//                dump($league);
                $name = $qlb->find('td a')->texts()[1];
                $a['name'] = $name;
//                dump($name);
                $link = 'http://sstream365.com' . $qlb->find('td a')->attrs('href')[1];
                $a['link'] = $link;
//                dump($link);
                $date = $qlb->find('td')->texts()->first();
                $a['date'] = explode(' ',$date)[1];
//                dump($date);
                $lives[] = $a;
            }
        }
        return $lives;
    }

    private function getSStreamLines($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$url");
        curl_setopt($ch, CURLOPT_COOKIE, 'SERVERID=e8e4d482877771492d8d82843185eeb8|1522664175|1522659461; public_token=leisu_test;');
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $response = str_replace("\x00", '', $response);
        $lines = explode("\n", $response);
        $eval = '';
        foreach ($lines as $line) {
            if (str_contains($line, 'eval(function')) {
                $eval = $line;
            }
        }

        if (!empty($eval)) {
            $scripts = [];
//            $scripts[] = '<script>';
//            $scripts[] = 'var vServer=""';
//            $scripts[] = 'var vMp4url=""';
//            $scripts[] = 'var vIosurl=""';
            $scripts[] = $eval;
//            $scripts[] = 'document.write("<p><label>rtmp源:</label><input value=\""+vServer+"/"+vMp4url+"\" size=\"120\"></p>")';
//            $scripts[] = 'document.write("<p><label>m3u8源:</label><input value=\""+vIosurl+"\" size=\"120\"></p>")';
            $scripts[] = '</script>';
            $script = join("\n", $scripts);
            return $script;
        }
        return '';
    }

    private function getNewSStreamLines($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$url");
//        curl_setopt($ch, CURLOPT_COOKIE, 'SERVERID=e8e4d482877771492d8d82843185eeb8|1522664175|1522659461; public_token=leisu_test;');
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_REFERER, 'http://sstream365.com/');
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, self::K_X_BET_USER_AGENT);
//        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $response = str_replace("\x00", '', $response);
        $lines = explode("\n", $response);
        $eval = '';
        foreach ($lines as $line) {
            if (str_contains($line, 'eval(function')) {
                $eval = $line;
            }
        }
        return $eval.'</SCRIPT>';
    }

    private function getXBetLines($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://sstream365.com/player.php?id=$id");
        curl_setopt($ch, CURLOPT_COOKIE, 'SERVERID=e8e4d482877771492d8d82843185eeb8|1522664175|1522659461; public_token=leisu_test;');
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, self::K_X_BET_USER_AGENT);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $response = str_replace("\x00", '', $response);
        $lines = explode("\n", $response);
        $eval = '';
        foreach ($lines as $line) {
            if (str_contains($line, 'eval(function')) {
                $eval = $line;
            }
        }

        if (!empty($eval)) {
            $scripts = [];
//            $scripts[] = '<script>';
//            $scripts[] = 'var vServer=""';
//            $scripts[] = 'var vMp4url=""';
//            $scripts[] = 'var vIosurl=""';
            $scripts[] = $eval;
            $scripts[] = 'document.write("<p><label>rtmp源:</label><input value=\""+vServer+"/"+vMp4url+"\" size=\"120\"></p>")';
            $scripts[] = 'document.write("<p><label>m3u8源:</label><input value=\""+vIosurl+"\" size=\"120\"></p>")';
            $scripts[] = '</script>';
            $script = join("\n", $scripts);
            return $script;
        }
        return '';
    }

    public function test()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://aliez-stream.gcdn.co/hls/streama71710/index.m3u8");
//        curl_setopt($ch, CURLOPT_COOKIE, 'SERVERID=e8e4d482877771492d8d82843185eeb8|1522664175|1522659461; public_token=leisu_test;');
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
//            'Origin: http://emb.aliez.me',
//            'Host: a3.aliez.me:8080',
//            'x-playback-session-id: 3A991DC8-2FD4-434D-8382-0141D13913E7',
//            'Accept-Language: zh-CN,zh;q=0.9,en;q=0.8,ja;q=0.7',
//            'Accept: */*',
//            'If-Modified-Since: Thu, 02 Aug 2018 07:48:53 GMT',
//            'If-None-Match: "5b62b765-c3"',
        ]);
        curl_setopt($ch, CURLOPT_REFERER, 'http://emb.aliez.me/');
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
//        curl_setopt($ch, CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_USERAGENT, "AppleCoreMedia/1.0.0.15G77 (iPhone; U; CPU OS 11_4_1 like Mac OS X; zh_cn)");
//        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
//        $verbose = fopen(dirname(__FILE__).'/errorlog.txt', 'w+');
//        curl_setopt($ch, CURLOPT_STDERR, $verbose);
//        $info = curl_getinfo($ch);
//        dump($info);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        dump($response);
    }
}
