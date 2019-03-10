<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use QL\QueryList;

class GunQiuEncodesController extends BaseController
{
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
        $livesInfo = $this->getLiveInfos();
        $matchesInfo = $this->getMatchesInfo();
        return view('manager.pull.gunqiu', ['livesInfo' => $livesInfo, 'matchesInfo'=>$matchesInfo]);
    }

    public function getLiveUrl(Request $request)
    {
        $url = $request->input('url');
        if (strlen($url) > 0) {
            $lines = $this->getStreamInfo($url);
            return view('manager.pull.gunqiu_lines', ['lines' => $lines]);
        } else {
            return response('信号还在路上，等会再来看看！');
        }
    }

    private function getStreamInfo($url) {
        //转换一下链接
        $url = $this->convertGunqiuUrl($url);

        $this->dumpData("getStreamInfo: url = $url");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_COOKIE, "$cookies");
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

//        $this->dumpData($response);
        $streams = array();
        if ($response && strlen($response) > 0) {
            preg_match("/var playCode = \\[(.*?)\\];/is", $response, $playCodeStr);
            $playCodeStr = (isset($playCodeStr) && isset($playCodeStr[1])&& isset($playCodeStr[1])) ? $playCodeStr[1] : "";

            if (isset($playCodeStr) && strlen($playCodeStr) > 0) {
                $jsonData = json_decode("[".$playCodeStr.']', true);
                $this->dumpData($jsonData);

                $ql = new QueryList();
                foreach ($jsonData as $key=>$item) {
                    $html = $item['pCode'];
                    $ql->setHtml($html);
                    if ($ql->find('iframe')) {
                        $src = $ql->find('iframe')->attrs('src')->first();
                        if (isset($src)) {
                            $streamItem = $this->getStreamIframeInfo($src);
                            $streamItem['name'] = $item['name'].($key+1);
                            $streams[] = $streamItem;
                        }
                    }
                }
            }
        }
        $this->dumpData($streams);
        return $streams;
    }

    private function getStreamIframeInfo($url) {
        $this->dumpData("getStreamIframeInfo: url = $url");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_COOKIE, "$cookies");
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

        $streamItem = array();
        if (isset($response) && strlen($response) > 0) {
            $this->dumpData($response);
            preg_match("/var videoObject = \\{(.*?)\\};/is", $response, $videoStr);
            $videoStr = (isset($videoStr) && isset($videoStr[1])&& isset($videoStr[1])) ? $videoStr[1] : "";
            if (isset($videoStr) && strlen($videoStr) > 0) {
                preg_match("/video:\\'(.*?)\\'/is", $videoStr, $m3u8Url);
                $m3u8Url = (isset($m3u8Url) && isset($m3u8Url[1])&& isset($m3u8Url[1])) ? $m3u8Url[1] : "";
                $streamItem['playUrl'] = $m3u8Url;
            }
        }
        return $streamItem;
    }

    private function convertGunqiuUrl($gunqiuUrl) {
        $this->dumpData("convertGunqiuUrl");
        if (!$gunqiuUrl || !str_contains($gunqiuUrl, "www.gunqiu.com")) {
            return $gunqiuUrl;
        }
        $this->dumpData($gunqiuUrl);

        $id = str_replace("http://www.gunqiu.com/match_live/", "", $gunqiuUrl);
        $url = "http://mobile.gunqiu.com/interface/v3.6/livestv/listForPc?mid=$id";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_COOKIE, "$cookies");
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

        if ($response && strlen($response) > 0) {
            $this->dumpData($response);
            $jsonData = json_decode($response, true);
            if (isset($jsonData['data']['heibaiUrl'])) {
                return $jsonData['data']['heibaiUrl'];
            }
        }
        return $gunqiuUrl;
    }

    private function getLiveInfos() {
        $url = "http://mobile.gunqiu.com/interface/v3.6/livestv/index";
        $this->dumpData("getLiveInfos: url = $url");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_COOKIE, "$cookies");
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

//        $this->dumpData($response);

        $liveInfos = array();
        if ($response && strlen($response) > 0) {
            $jsonData = json_decode($response, true);

//            $this->dumpData($jsonData);
            if (isset($jsonData['data'])) {
//                $matches = collect($jsonData['data'])->where("isOut", true)->values()->all();
                $matches = $jsonData['data'];
                $liveInfos = collect($matches)->mapWithKeys(function ($item){
                    return [$item['sid']=>$item['heibaiUrl']];
                })->all();
            }
        }
        $this->dumpData($liveInfos);
        return $liveInfos;
    }

    private function getMatchesInfo() {
        $url = "http://mobile.gunqiu.com/interface/v3.6/bifen2/live";
        $this->dumpData("getMatchesInfo: url = $url");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_COOKIE, "$cookies");
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

        $matchInfos = array();
        if ($response && strlen($response) > 0) {
            $jsonData = json_decode($response, true);

//            $this->dumpData($jsonData);
            if (isset($jsonData['data']['matchs'])) {
//                $matches = collect($jsonData['data'])->where("isOut", true)->values()->all();
                $matches = $jsonData['data']['matchs'];

                $matchInfos = collect($matches)
                    ->where('islive', true)
                    ->where('matchstate', '>=', 0)
                    ->sortBy('matchtimex')->values()->all();
            }
        }
        $this->dumpData($matchInfos);
        return $matchInfos;
    }
//
//    private function getPcMatches($appMatchIdes) {
//        $ql = new QueryList();
//        $ql->get('http://www.gunqiu.com/', [], [
//            //设置超时时间，单位：秒
//            'timeout' => 30,
//            'headers' => [
//                'User-Agent' => $this->userAgentPC,
//                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
//                'accept-encoding' => 'gzip, deflate, br',
//                'accept-language' => 'zh-CN,zh;q=0.9,en;q=0.8,ja;q=0.7',
//                'upgrade-insecure-requests' => '1',
////                'Cookie' => '__cfduid=d913bf68f903853b3c1697c9c29733ba31532567654'
//            ]
//        ])->encoding('UTF-8')->removeHead();
//
////        $this->dumpData($ql);
////        $lives = [];
////        $lis = $ql->find('ol li')->getElements();
//        $matchIds = $ql->find('ol li')->attrs("id");
//        $matchStatus = $ql->find('ol li')->attrs("matchstate");
//        $leagueNames = $ql->find("span.league")->texts();
//        $matchTimes = $ql->find("span.time")->texts();
//        $matchHnames = $ql->find(".gleft i.teamname")->texts();
//        $matchAnames = $ql->find(".gright i.teamname")->texts();
//
////        $this->dumpData($lis);
////        $ql_li = new QueryList();
//
//        $matchInfos = array();
//        foreach ($matchIds as $key=>$id) {
//            if (in_array($id, $appMatchIdes)) {
////                $ql_li->setHtml($liHtmls[$key]);
////                $matchInfo['leagueName'] = $ql_li->find("span.league")->texts()->first();
////                $matchInfo['time'] = $ql_li->find("span.time")->texts()->first();
////                $matchInfo['status'] = $ql_li->find("span.status")->texts()->first();
////                $matchInfo['hname'] = $ql_li->find("i.teamname")->texts()->first();
////                $matchInfo['aname'] = $ql_li->find("i.teamname")->texts()->last();
//
//                $status = $matchStatus[$key];
//                if ($status == -1) continue; //如果比赛结束了，不再操作
//
//                $matchInfo['leagueName'] = $leagueNames[$key+2];
//                $matchInfo['time'] = $matchTimes[$key+2];
//                $matchInfo['status'] = $status;
//                $matchInfo['hname'] = $matchHnames[$key];
//                $matchInfo['aname'] = $matchAnames[$key];
//
//                $matchInfos[$id] = $matchInfo;
//            }
//        }
//        return $matchInfos;
//    }

    private function dumpData($data)
    {
        if ($this->isDebug) {
            dump($data);
        }
    }
}
