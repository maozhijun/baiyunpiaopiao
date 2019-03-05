<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use QL\QueryList;

class YoukuEncodesController extends BaseController
{
    const K_PPTV_CIDS_SESSION_KEY = "__pptv_cids__";
    const K_PPTV_STREAM_SESSION_KEY = "__pptv_stream__";
    const K_PPTV_LINES_SESSION_KEY = "__pptv_lines__";

//    private $cookie = "PUID=b76c118ef74441b7ab0d-26a60a544d49; __crt=1538037805673; ppi=302c3332; Hm_lvt_7adaa440f53512a144c13de93f4c22db=1538037800,1538038459,1538214006; Hm_lpvt_7adaa440f53512a144c13de93f4c22db=1538214006";
    /**
     * http://sports.pptv.com   网址下的cookie
     */
//    private $cookie = 'PUID=2366b427ec2444c2e3c3-f84fcd3d785c; ab_cid=0ebf078bdb5a4f6dd17a-31a5ed5b89cb; _df_ud=6d239a85-cbb8-4dc0-aa00-a5990b6bd694; isSuning=0; UDR={"1":"1524987021000"}; ppToken=MwnWnyfKNZmhYOXc1AzwsCj3pvkVedNIm4RzNqCi_FA5ABNt9QYK5rQmfsbO3NMCf50Cb19zvNvP%0D%0AY8Xp-eEwfr12AobeQboZrnxVRKMal65e0YhVe0B7sCaOiAoxAuUM8wlYs-19Td9kfgJoof6_zX2W%0D%0Ao0B2wwtjQ5GoAkOYBxA%0D%0A; ppid=5027277990; isUpgrade=1; PPName=13378681807_180310l88$B71BE42FF7E844AA86A11E2A2C530A67; UDI=0$$0$PP%E6%B8%B8%E6%B0%91$$$$$$http%3A%2F%2Fimage.suning.cn%2Fuimg%2Fcmf%2Fcust_headpic%2F0000000000_01_120x120.jpg$$$$$$$PP%E7%94%A8%E6%88%B7_681807$0$$false$Sun+Apr+29+15; ppi=302c34; website_msg=%257B%2522times%2522%253A0%252C%2522date%2522%253A1538984310573%252C%2522interval%2522%253A3600000%257D; sprotsVipType=2; BubbleName=%25E4%25B8%25AD%25E7%25A7%258B%25E7%25AD%25BE%25E5%2588%25B0; Hm_lvt_7adaa440f53512a144c13de93f4c22db=1538986778; Hm_lpvt_7adaa440f53512a144c13de93f4c22db=1538986778; __ssar=direct%7Cdirect%7C%7C%7C; __ssav=153898677785275832%7C1538986777852%7C1538986777852%7C1538986777853%7C1%7C1%7C1; __ssas=153898677786417699%7C1538986777870%7C1538986777864%7C1; _snvd=1536045425885ieOKYqmOpbt; _snstyxuid=FB62BE72299C5QQ2; sctx=; ab_3d333112_search_algorithm={"sid":"3d333112_search_algorithm","abid":"","sv":"default","errorCode":"3","lsd":1538987216000}; PPKey=SwE0oYg%2Bpf6FwrUYAKPLZBwuxOe1k377D5T%2Bpidgq4w04wuWJFZJgL3vVM%2BNV16T%2BRimfvFz8YETibL5W01HxM1j8kEQBv2WctYEOjNGf2JoaOTK5NLA2dn5wfHsKgUp1S2l6PH0OxxnPZBiGAEoV6f0KC12yUXQeArevSJ34%2FiZ3kc%2FjL%2BdbPaV9BmnEFAS';
    private $cookie = '__ysuid=1541747078955y52; gray_mark=36; cna=3jzxE7x/HXkCAbcHr9BgQH63; juid=01d4pk26ll1ruk; timerun_8020477=1350.589135; timerun_8020615=1907.935669; timerun_8020756=0; __aysid=1551661678228P5H; __ayft=1551671673761; __arycid=cms-00-1519-27244-0; __ayscnt=1; __arcms=cms-00-1519-27244-0; seid=01d53ddia82jva; referhost=; ypvid=1551671675232Fwekok; yseid=15516716752335ObwW1; ysestep=1; yseidcount=5; yseidtimeout=1551678875234; ycid=0; ystep=8; seidtimeout=1551673476237; P_ck_ctl=3BD8679E900F5314D33EA6412C5FAA23; _m_h5_tk=6b0a612863519cb68858e2995cbb35db_1551683205157; _m_h5_tk_enc=94e37cb31921481a993b6e5376907c57; isg=BMbGrfAV5q23fLJCflAlYSDmArxCIi77AwXTo7DvuOnEs2bNGbVr8GkKi6_aIQL5; __arpvid=1551678375836NazGNR-1551678375851; __aypstp=9; __ayspstp=12';
    /**
     * http://v.pptv.com    网址下的cookie
     */
//    private $cookie = 'PUID=2366b427ec2444c2e3c3-f84fcd3d785c; _df_ud=6d239a85-cbb8-4dc0-aa00-a5990b6bd694; isSuning=0; UDR={"1":"1524987021000"}; ppToken=MwnWnyfKNZmhYOXc1AzwsCj3pvkVedNIm4RzNqCi_FA5ABNt9QYK5rQmfsbO3NMCf50Cb19zvNvP%0D%0AY8Xp-eEwfr12AobeQboZrnxVRKMal65e0YhVe0B7sCaOiAoxAuUM8wlYs-19Td9kfgJoof6_zX2W%0D%0Ao0B2wwtjQ5GoAkOYBxA%0D%0A; ppid=5027277990; isUpgrade=1; PPName=13378681807_180310l88$B71BE42FF7E844AA86A11E2A2C530A67; UDI=0$$0$PP%E6%B8%B8%E6%B0%91$$$$$$http%3A%2F%2Fimage.suning.cn%2Fuimg%2Fcmf%2Fcust_headpic%2F0000000000_01_120x120.jpg$$$$$$$PP%E7%94%A8%E6%88%B7_681807$0$$false$Sun+Apr+29+15; sprotsVipType=2; BubbleName=%25E4%25B8%25AD%25E7%25A7%258B%25E7%25AD%25BE%25E5%2588%25B0; Hm_lvt_7adaa440f53512a144c13de93f4c22db=1538986778; __ssar=direct%7Cdirect%7C%7C%7C; __ssav=153898677785275832%7C1538986777852%7C1538986777852%7C1538986777853%7C1%7C1%7C1; _snvd=1536045425885ieOKYqmOpbt; idx_player_ap=1; sctx=; _snstyxuid=B76A4692F7CCOP22; website_msg=%257B%2522times%2522%253A0%252C%2522date%2522%253A1539069455520%252C%2522interval%2522%253A3600000%257D; ppi=302c34; PPKey=SwE0oYg%2Bpf6FwrUYAKPLZBwuxOe1k377D5T%2Bpidgq4w04wuWJFZJgL3vVM%2BNV16T%2BRimfvFz8YETibL5W01HxD3ShOpnBgvwWKuFp9tBpuJeSVIofathFiFN5EIwGyx1W4YO9yio3ngtavsaYHtgaOFRZsL5qnPgEHkb4Kqb%2BIfeX2My6Q5yMh4gYf%2FajQ06';
//    private $userAgentPC = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36";
    private $userAgentPC = "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.26 Safari/537.36 Core/1.63.6799.400 QQBrowser/10.3.2908.400";
    private $userAgentApp = "Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1";

    private $isDebug = false;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
    }

    public function index(Request $request)
    {
        $yk_rq_count = session("yk_rq_count");
        if ($request->has('cookies')) {
            $cookies = $request->input('cookies');
            if (strlen($cookies) > 0) {
                $lives = $this->getAppMatches($cookies, $request->input("params"));
                if (!empty($lives)) {
                    return view('manager.pull.youku', ['lives' => $lives]);
                }
                $yk_rq_count++;
            } else {
                $yk_rq_count = 0;
            }
        } else {
            $yk_rq_count = 0;
        }
        session(['yk_rq_count'=>$yk_rq_count]);
        if ($yk_rq_count < 3) {
            return redirect("http://test.youku.com/resources/youku/fake_detail");
        } else {
            return response('信号还在路上，等会再来看看！');
        }
    }

    public function getLiveUrl(Request $request, $id)
    {
        if ($request->has('cookies')) {
            $cookies = $request->input('cookies');
            if (strlen($cookies) > 0) {
                $lines = $this->getStreamInfo($cookies, $request->input("params"));
                return view('manager.pull.youku_lines', ['lines' => $lines]);
            } else {
                return response('信号还在路上，等会再来看看！');
            }
        }
        return redirect("http://test.youku.com/resources/youku/fake_detail?id=$id");
    }

    public function fakeDetail(Request $request)
    {
        $id = $request->input('id');
        return view('manager.pull.youku_fake_detail', ['id'=>$id]);
    }

    private function getStreamInfo($cookies, $params) {
        if ($cookies) $cookies = urldecode($cookies);
        if ($params) $params = urldecode($params);

        $url = "http://acs.youku.com/h5/mtop.youku.live.com.liveplaycontrolv2/2.0/?$params";
        $this->dumpData("getAppMatches: url = $url");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIE, "$cookies");
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, "id=0&screen_orientation=portrait&name=&gps_position=");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
//        curl_setopt($ch, CURLOPT_REFERER, 'https://sports.youku.com/');
        curl_setopt($ch, CURLOPT_USERAGENT, "$this->userAgentPC");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);

        $response = curl_exec ($ch);
        curl_close ($ch);

        $streams = array();
        if ($response && strlen($response) > 0) {
            $jsonData = json_decode($response, true);

            $this->dumpData($jsonData);
            if (isset($jsonData['data']['data']['qualities'])) {
                $streams = $jsonData['data']['data']['qualities'];
            }
        }
        $this->dumpData($streams);
        return $streams;
    }

    private function getAppMatches($cookies, $params) {
        if ($cookies) $cookies = urldecode($cookies);
        if ($params) $params = urldecode($params);

        $url = "https://acs.youku.com/h5/mtop.youku.sports.show.schedule.drawer.list/1.0/?$params";
        $this->dumpData("getAppMatches: url = $url");
        $this->dumpData("getAppMatches: cookie = $cookies");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIE, "$cookies");
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, "id=0&screen_orientation=portrait&name=&gps_position=");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
        curl_setopt($ch, CURLOPT_REFERER, 'https://sports.youku.com/');
        curl_setopt($ch, CURLOPT_USERAGENT, "$this->userAgentPC");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);

        $response = curl_exec ($ch);
        curl_close ($ch);

        $this->dumpData($response);

        $matches = array();
        if ($response && strlen($response) > 0) {
            $jsonData = json_decode($response, true);

            if (isset($jsonData['data']['matchsList'])) {
                $matches = collect($jsonData['data']['matchsList'])->sortBy('startTime')->all();
            }
        }
        $this->dumpData($matches);
        return $matches;
    }

    private function dumpData($data) {
        if ($this->isDebug) {
            dump($data);
        }
    }

    /**
     * =========================================================================================
     * 解析数据部分
     * ==========================================================================================
     */

    private function convertStreamInfo($streamInfo, $cKey) {
        $lines = array();
        $name = "其他";
        foreach ($streamInfo as $key=>$stream) {
            if ($key == 0) {
                $name = "流畅";
            } else if ($key == 1) {
                $name = "清晰";
            } else if ($key == 2) {
                $name = "超清";
            } else if ($key == 3) {
                $name = "蓝光";
            }
            $lines[$name] = $this->getM3u8StreamUrls($stream, $cKey);
        }
        return array_reverse($lines);
    }

    private function getItemChildNodes($stream) {
        $nodes = array();
        if (array_key_exists("childNodes", $stream)) {
            $nodes = $stream["childNodes"];
        }
        return $nodes;
    }

    private function getNodesItem($stream, array $indexes = [0]) {
        foreach ($indexes as $index) {
            $nodes = $this->getItemChildNodes($stream);
            if (isset($nodes[$index])) {
                $stream = $nodes[$index];
            }
        }
        return $stream;
    }

    private function getItemStrValue($stream, array $indexes = [0]) {
        $strValue = "";
        $value = $this->getNodesItem($stream, $indexes);
        if (is_string($value) && strlen($value) > 0) {
            $strValue = $value;
        }
        return $strValue;
    }

    private function getStreamRid($stream) {
        $rid = "";
        if (array_key_exists("rid", $stream)) {
            $rid = $stream["rid"];
        }
        return $rid;
    }

    private function getM3u8StreamUrls($stream, $cKey) {
        $rid = $this->getStreamRid($stream);

        $urls = array();
        $aliHost = $this->getItemStrValue($stream, [0, 0]);
        $wsHost = $this->getItemStrValue($stream, [4, 0]);

//        if ($isVip) {
//            if (strlen($aliHost) > 0) {
//                $aliHost = "shenhu.live.pptv.com";
//                $urls[] = $this->convertM3u8Url($aliHost, $rid, $cKey);
//            }
//        } else {
            if (strlen($aliHost) > 0) {
                $urls[] = $this->convertM3u8Url($aliHost, $rid, $cKey);
            }
            if (strlen($wsHost) > 0) {
                $urls[] = $this->convertM3u8Url($wsHost, $rid, $cKey);
            }
//        }
        return $urls;
    }

    private function convertM3u8Url($host, $rid, $cKey) {
        $url = "";
        if (strlen($host) > 0 && strlen($rid) > 0 && strlen($cKey) > 0) {
            $url = "http://$host/live/5/60/$rid.m3u8?type=mpptv&k=$cKey";
        }
        return $url;
    }

    /**
     * ===========================================================================
     * 包含会员部分的破解
     * sport.pptv.com
     * http://sports.pptv.com/sportslive?sectionid=147391&matchid=
     * =============================================================================
     */
    private function getSportWebPlayData($sid, $mid, $cid) {
        $url = "http://web-play.pptv.com/webplay3-0-$cid.xml?zone=8&vvid=a3b63117-00d3-a118-543e-a4efe837c292&username=13378681807_180310l88&token=zbVfxFXQu1XVICRa30qvXvnomt1Os3rMmuRBEt7MJPTW0kHzYMhFdQDAQ6uAECe92jcJgTYBDhjg%0D%0AQudziRrBbpw_Q9B5RneS1vVnw7ZVp4bBdGkCvgDrAGXFCzHVT17yXcNf_0fJZ6Z0fGNr2reGibf2%0D%0AYtKcZa_fAOgnkavu3YI%0D%0A&param=type%3Dweb%26ahl_ver%3D1%26ahl_random%3D5471404874543b3d3c353e452a2e3157%26ahl_signa%3Db6ddda74efaa04d774fac200490aa6762231df02f636d1474be174dde1393bf8%26userType%3D0%26o%3D0&ppi=302c34&kk=4157af5f5eeb0e81498ef1dcdde67863-613b-59a4e503&salt=pv&referrer=http%3A%2F%2Fsports.pptv.com%2F&o=0&segment=93ff806c_93ff8234_1503975155&sl=1&isSports=1&vts=0&pageUrl=http%3A%2F%2Fsports.pptv.com%2Fsportslive%3Fsectionid%3D147391%26matchid%3D&type=web&r=1540365477979&version=6&appplt=flp&appid=pptv.flashplayer.live&appver=2.12.44&nddp=1";
        $referee = "http://sports.pptv.com/sportslive?sectionid=$sid&matchid=$mid";

//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL,$url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_TIMEOUT, 5);//5秒超时
//        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
//        curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);
//        curl_setopt($ch, CURLOPT_REFERER, $referee);
//
//        $response = curl_exec ($ch);
//        curl_close ($ch);
//
//        dump($response);

        $ql = new QueryList();
        $ql->get($url, [], [
            //设置超时时间，单位：秒
            'timeout' => 30,
            'headers' => [
                'User-Agent' => $this->userAgentPC,
                'Accept' => '*/*',
                'accept-encoding' => 'gzip, deflate',
                'accept-language' => 'zh-CN,zh;q=0.9',
                'upgrade-insecure-requests' => '1',
                'Cookie' => $this->cookie,
                'Referer' => $referee
            ]
        ])->encoding('UTF-8')->removeHead();

        dump($ql->find('root')->htmls());
    }
}
