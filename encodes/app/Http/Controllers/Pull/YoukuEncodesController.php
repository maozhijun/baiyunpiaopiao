<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use QL\QueryList;

class YoukuEncodesController extends BaseController
{
//    private $cookie = "PUID=b76c118ef74441b7ab0d-26a60a544d49; __crt=1538037805673; ppi=302c3332; Hm_lvt_7adaa440f53512a144c13de93f4c22db=1538037800,1538038459,1538214006; Hm_lpvt_7adaa440f53512a144c13de93f4c22db=1538214006";
    /**
     * http://sports.pptv.com   网址下的cookie
     */
//    private $cookie = 'PUID=2366b427ec2444c2e3c3-f84fcd3d785c; ab_cid=0ebf078bdb5a4f6dd17a-31a5ed5b89cb; _df_ud=6d239a85-cbb8-4dc0-aa00-a5990b6bd694; isSuning=0; UDR={"1":"1524987021000"}; ppToken=MwnWnyfKNZmhYOXc1AzwsCj3pvkVedNIm4RzNqCi_FA5ABNt9QYK5rQmfsbO3NMCf50Cb19zvNvP%0D%0AY8Xp-eEwfr12AobeQboZrnxVRKMal65e0YhVe0B7sCaOiAoxAuUM8wlYs-19Td9kfgJoof6_zX2W%0D%0Ao0B2wwtjQ5GoAkOYBxA%0D%0A; ppid=5027277990; isUpgrade=1; PPName=13378681807_180310l88$B71BE42FF7E844AA86A11E2A2C530A67; UDI=0$$0$PP%E6%B8%B8%E6%B0%91$$$$$$http%3A%2F%2Fimage.suning.cn%2Fuimg%2Fcmf%2Fcust_headpic%2F0000000000_01_120x120.jpg$$$$$$$PP%E7%94%A8%E6%88%B7_681807$0$$false$Sun+Apr+29+15; ppi=302c34; website_msg=%257B%2522times%2522%253A0%252C%2522date%2522%253A1538984310573%252C%2522interval%2522%253A3600000%257D; sprotsVipType=2; BubbleName=%25E4%25B8%25AD%25E7%25A7%258B%25E7%25AD%25BE%25E5%2588%25B0; Hm_lvt_7adaa440f53512a144c13de93f4c22db=1538986778; Hm_lpvt_7adaa440f53512a144c13de93f4c22db=1538986778; __ssar=direct%7Cdirect%7C%7C%7C; __ssav=153898677785275832%7C1538986777852%7C1538986777852%7C1538986777853%7C1%7C1%7C1; __ssas=153898677786417699%7C1538986777870%7C1538986777864%7C1; _snvd=1536045425885ieOKYqmOpbt; _snstyxuid=FB62BE72299C5QQ2; sctx=; ab_3d333112_search_algorithm={"sid":"3d333112_search_algorithm","abid":"","sv":"default","errorCode":"3","lsd":1538987216000}; PPKey=SwE0oYg%2Bpf6FwrUYAKPLZBwuxOe1k377D5T%2Bpidgq4w04wuWJFZJgL3vVM%2BNV16T%2BRimfvFz8YETibL5W01HxM1j8kEQBv2WctYEOjNGf2JoaOTK5NLA2dn5wfHsKgUp1S2l6PH0OxxnPZBiGAEoV6f0KC12yUXQeArevSJ34%2FiZ3kc%2FjL%2BdbPaV9BmnEFAS';
    private $cookie = 'P_sck=3VeSMvWtQnsu9VnkYQBzxr7At1FZFGSFB4SSVLtTtnQdih73YNRuTAN6Nsiw3gbybSjK%2FtCZsJSoOTodLz04Utfl66M8PufjaS1VXwVvYXfzct%2FI09UX%2FJgejfqZwFploW7veYCFYQKsU2PpEjor6TY2t0SlLt385WfUxXAMi9s%3D;P_gck=NA%7CLc5rzHPwovJPr3nn2W7BJQ%3D%3D%7CNA%7C1551927342705;';
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
                $lives = $this->getAppMatches($cookies, $request->input("params"), $request->input("data"));
                if (!empty($lives)) {
                    //检查登录
                    $isLogin = $this->checkLogin();
                    return view('manager.pull.youku', ['lives' => $lives, 'isLogin'=>$isLogin]);
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
                $lines = $this->getStreamInfo($cookies, $request->input("params"), $request->input("data"));
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

    private function getStreamInfo($cookies, $params, $data) {
        if ($cookies) $cookies = urldecode($cookies);
        if ($params) $params = urldecode($params);
//        if ($data) $data = urldecode($data);

        $cookies = $this->cookie.$cookies;

        $url = "http://acs.youku.com/h5/mtop.youku.live.com.liveplaycontrolv2/2.0/?$params&data=".urlencode($data);
        $this->dumpData("getStreamInfo: url = $url");
        $this->dumpData("getStreamInfo: cookies = $cookies");
        $this->dumpData("getStreamInfo: data = $data");

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

    private function getAppMatches($cookies, $params, $data) {
        if ($cookies) $cookies = urldecode($cookies);
        if ($params) $params = urldecode($params);

        $url = "https://acs.youku.com/h5/mtop.youku.sports.show.schedule.list/1.0/?$params&data=".urlencode($data);
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
//                $matches = collect($jsonData['data']['matchsList'])->sortBy('startTime')->all();

                foreach ($jsonData['data']['matchsList'] as $matchDates) {
                    $matches = array_merge($matches, $matchDates['matchs']);
                }
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
     * ===========================登录相关的逻辑======================================
     */
    /**
     * 通过获取用户信息，验证token是否过期
     */
    private function checkLogin() {
        $url = "https://cmstool.youku.com/cms/player/userinfo/user_info";

        $this->dumpData("checkLogin: url = $url");
        $this->dumpData("checkLogin: cookie = $this->cookie");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIE, "$this->cookie");
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

        if ($response && strlen($response) > 0) {
            $this->dumpData($response);
            $jsonData = json_decode($response, true);
            if (isset($jsonData['error']) && $jsonData['error'] == 0) {
                return true;
            }
        }
        return false;
    }
}
