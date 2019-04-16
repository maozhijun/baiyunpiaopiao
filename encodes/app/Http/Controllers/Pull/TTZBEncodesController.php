<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use QL\QueryList;

class TTZBEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
    }

    public function index(Request $request)
    {
        $lives = $this->getLives();
        return view('manager.pull.ttzb', ['lives' => $lives]);
    }

    private function getLives()
    {
        $ql = QueryList::get('http://www.tiantianzhibo.com/');
        $divs = $ql->find('div.datelist');

        $datas = array();
        for ($i = 0 ; $i < $divs->length() ; $i++) {
            $tmp = $divs->eq($i)->children()->map(function ($item) {
                //用is判断节点类型
                if ($item->is('div')) {
                    //切割时间 2017年12月12日
                    $timeStr = $item->text();
                    $time = date_format(date_create_from_format('Y年m月d日', explode(' ', $timeStr)[0]), 'Y-m-d');
                    return array('type' => 'div', 'data' => $time);
                } elseif ($item->is('ul')) {
                    //切割时间 主客队
                    return array('type' => 'ul', 'data' => $item);
                }
            });
            $datas = array_merge($datas,$tmp->toArray());
        }

        $timeStr = 'error';
        $result = array();
        foreach ($datas as $data){
            if ($data['type'] == 'div'){
                $timeStr = $data['data'];
                $result[$timeStr] = array();
            }
            if ($data['type'] == 'ul'){
                $result[$timeStr][] = $data['data'];
            }
        }
        $countNotMatch = 0;

        $bj = array();

        foreach ($result as $key=>$uls){
            foreach ($uls as $ul){
                $timeStr = $ul->find('li.t1')->eq(0)->text();
                $teamStr = $ul->find('li.t4')->eq(0)->text();
                $leagueStr = $ul->find('li.t3')->eq(0)->text();
                $liveCSS = $ul->find('li.t5 a')->eq(0)->style;
                $living = false;
                if (stristr($liveCSS,'red')){
                    $living = true;
                }
                $liveStr = $ul->find('li.t5 a')->eq(0)->href;
                $liveStr = explode('/',$liveStr);
                $liveStr = $liveStr[count($liveStr) - 1];
                $liveStr = explode('.',$liveStr)[0];

                if (strstr($liveStr,'ttzb')){

                }else{
                    $liveStr = '';
                }

                if (strlen($timeStr) > 0 && strlen($teamStr) > 0 && strlen($liveStr) > 0){
                    $timeStr = $key .' '. $timeStr;
                    $teamStr = str_replace(' ','',$teamStr);
                    $teamStr2 = explode('VS',$teamStr);
                    if (count($teamStr2) == 2) {
                        $host = $teamStr2[0];
                        $away = $teamStr2[1];
                        $bj[] = array(
                            'homeTeamName'=>$host,
                            'awayTeamName'=>$away,
                            'matchDate'=>$timeStr,
                            'living'=>$living,
                            'competitionNameZh'=>$leagueStr,
                            'liveStr'=>$liveStr
                            );
                    }
                    else{
                        $teamStr2 = explode('vs',$teamStr);
                        if (count($teamStr2) == 2) {
                            $host = $teamStr2[0];
                            $away = $teamStr2[1];
                            $bj[] = array(
                                'homeTeamName'=>$host,
                                'awayTeamName'=>$away,
                                'matchDate'=>$timeStr,
                                'living'=>$living,
                                'competitionNameZh'=>$leagueStr,
                                'liveStr'=>$liveStr
                            );
                        }
                    }
                }
            }
        }
        return $bj;
    }

    public function getTTZBLiveUrl(Request $request,$key){
        if (is_null($key) || strlen($key) == 0){
            return Response::json(array('code'=>-3));
        }

        $ch = curl_init();

        $key = explode('-',$key);

        $url = "https://www.04stream.tv/player.html?ch=".$key[1]."&p=ws&v=".$key[2]."&rnd=".date_create()->getTimestamp().'000';
//        dump($url);

        curl_setopt($ch, CURLOPT_URL,$url);
        //        curl_setopt($ch, CURLOPT_POST, 1);
        //        curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//        $headers = [
//            'Accept:application/json, text/javascript, */*; q=0.01',
//            'Accept-Language:zh-CN,zh;q=0.9,en;q=0.8',
//            'Cache-Control:no-cache',
//            'Connection:keep-alive',
//            'Host:m.tiantianzhibo.com',
////'Referer:http://m.tiantianzhibo.com/channel/cctv5.html',
//            'requestKey:ghl6seMfbp0PmFjSlFja1QkzMYqi8VMZ',
//            'User-Agent:Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1',
//            'X-Requested-With:XMLHttpRequest',
//        ];

        $headers = [
            'authority: www.04stream.tv',
            'method: GET',
            'path: /player.html?ch=ttzb1&p=ws&v=564&rnd='.date_create()->getTimestamp().'000',
            'scheme: https',
            'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3',
            'accept-encoding: gzip, deflate, br',
            'accept-language: zh-CN,zh;q=0.9,en;q=0.8',
            'cache-control: no-cache',
            'cookie: __cfduid=dec57232f5e40ed8d09a34e87152b62ac1555171162; __cfduid=dec57232f5e40ed8d09a34e87152b62ac1555171162; _jsuid=3824154059; no_tracky_100885073=1',
            'pragma: no-cache',
            'referer: https://www.tiantianzhibo.com/zuqiuzhibo/jiekeu21/20190415/82009-ttzb1-564.html',
            'upgrade-insecure-requests: 1',
            'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36'
        ];

//        dump($headers);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $server_output = curl_exec ($ch);
//        dump($server_output);

        $url = curl_getinfo($ch)['redirect_url'];
//        dump(curl_getinfo($ch)['redirect_url']);

        curl_close ($ch);

//        dump($server_output);
//        return;
//
//        $result = json_decode($server_output, true);
//        $v = 'v0';
//        if (isset($result['v0'])){
//            $v = 'v0';
//        }
//        else if (isset($result['v1'])){
//            $v = 'v1';
//        }
//        else if (isset($result['v2'])){
//            $v = 'v2';
//        }
//        else if (isset($result['v3'])){
//            $v = 'v3';
//        }
//        else if (isset($result['v4'])){
//            $v = 'v4';
//        }
//        $url = 'https://m.tiantianzhibo.com/player.html?ch='.$key.'&p='.$result[$v][0]['player'].'&v='.$result[$v][0]['sid'].'&k='.$result['key'].'&w=375&h=251';

        $ch = curl_init();
        //            $url= 'http://m.tiantianzhibo.com/player/ck/ck.php?url=Pi5xz%2FLvTnTCVst0wQaEm6VZlh1EbQ1wSN3psSsGfB%2BEw6aOxdhZLfY7XhG%2F8CxihBL6uwoFAUMSew8dUATa7dHmQIYVxagMfdzOVqzpi5e35QPFzoFdO%2BOn3oFGD107%2BOBD7A%2B%2BakzcrjO%2FQBY3O94Upb%2BMJMZohV%2BoIL0cHV34VBHBalVHFDtA3wGdNQ2Cynnd6kNPjJx8OkDJ35StxA%3D%3D&title=&h=251&w=375&t=m3u8&rnd=1512803239000&sid=v564&ch=ttzb1';
        curl_setopt($ch, CURLOPT_URL,$url);
        //        curl_setopt($ch, CURLOPT_POST, 1);
        //        curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            'authority: www.04stream.tv',
            'method: GET',
            'path: '.str_replace('https://www.04stream.tv','',$url),
            'scheme: https',
//            'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3',
//            'accept-encoding: gzip, deflate',
            //'accept-language: zh-CN,zh;q=0.9,en;q=0.8',
            'cache-control: no-cache',
            'cookie: __cfduid=dec57232f5e40ed8d09a34e87152b62ac1555171162; __cfduid=dec57232f5e40ed8d09a34e87152b62ac1555171162; _jsuid=3824154059; _first_pageview=1; no_tracky_100885073=1',
            'pragma: no-cache',
            'upgrade-insecure-requests: 1',
            'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36',
        ];

//        if (stristr($key,'ttzb')) {
//        }
//        else{
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//        }
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $server_output = curl_exec ($ch);

//        $tmps = explode('\r\n',$server_output);
//        foreach ($tmps as $tmp){
//            dump($tmp);
//        }

        curl_close ($ch);
        //$server_output = mb_convert_encoding($server_output, 'utf-8','GB2312');
        //echo $server_output;
        if (count(explode('<script type="text/javascript">',$server_output)) >= 2) {
            $tmps = explode('<script type="text/javascript">', $server_output)[1];
            $tmps = explode('</script>', $tmps)[0];
            //            dump($tmps);
            $source = $tmps;

            $unpacker = new BJ();

            $js = $unpacker->unpack($source);  // console.log('hello world');
            $js = explode('function ckcpt',$js)[0];
//            dump($js);
            $js = explode(';function randPlayurl',$js)[0];
//            dump($js);
            return view('manager.pull.ttzb_url',array('js'=>$js));
        }
        else{
            return \Illuminate\Support\Facades\Response::json(array('code'=>-4));
        }
    }

    //m3u8
    public function getTTZBLiveUrl2(Request $request,$key){
        if (is_null($key) || strlen($key) == 0){
            return Response::json(array('code'=>-3));
        }

        $ch = curl_init();

        $url = "https://m.tiantianzhibo.com/api/signallist.php?ch=".$key;
        dump($url);

        curl_setopt($ch, CURLOPT_URL,$url);
        //        curl_setopt($ch, CURLOPT_POST, 1);
        //        curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            'Accept:application/json, text/javascript, */*; q=0.01',
            'Accept-Language:zh-CN,zh;q=0.9,en;q=0.8',
            'Cache-Control:no-cache',
            'Connection:keep-alive',
            'Host:m.tiantianzhibo.com',
//'Referer:http://m.tiantianzhibo.com/channel/cctv5.html',
            'requestKey:ghl6seMfbp0PmFjSlFja1QkzMYqi8VMZ',
            'User-Agent:Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1',
            'X-Requested-With:XMLHttpRequest',
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $server_output = curl_exec ($ch);
//        dump($server_output);

        curl_close ($ch);

        dump($server_output);

        $result = json_decode($server_output, true);
        $v = 'v0';
        if (isset($result['v0'])){
            $v = 'v0';
        }
        else if (isset($result['v1'])){
            $v = 'v1';
        }
        else if (isset($result['v2'])){
            $v = 'v2';
        }
        else if (isset($result['v3'])){
            $v = 'v3';
        }
        else if (isset($result['v4'])){
            $v = 'v4';
        }
        $url = 'https://m.tiantianzhibo.com/player.html?ch='.$key.'&p='.$result[$v][0]['player'].'&v='.$result[$v][0]['sid'].'&k='.$result['key'].'&w=375&h=251';

        $ch = curl_init();
        //            $url= 'http://m.tiantianzhibo.com/player/ck/ck.php?url=Pi5xz%2FLvTnTCVst0wQaEm6VZlh1EbQ1wSN3psSsGfB%2BEw6aOxdhZLfY7XhG%2F8CxihBL6uwoFAUMSew8dUATa7dHmQIYVxagMfdzOVqzpi5e35QPFzoFdO%2BOn3oFGD107%2BOBD7A%2B%2BakzcrjO%2FQBY3O94Upb%2BMJMZohV%2BoIL0cHV34VBHBalVHFDtA3wGdNQ2Cynnd6kNPjJx8OkDJ35StxA%3D%3D&title=&h=251&w=375&t=m3u8&rnd=1512803239000&sid=v564&ch=ttzb1';
        curl_setopt($ch, CURLOPT_URL,$url);
        //        curl_setopt($ch, CURLOPT_POST, 1);
        //        curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
            'Accept-Encoding:utf-8, deflate',
            'Accept-Language:zh-CN,zh;q=0.9,en;q=0.8',
            'Cache-Control:no-cache',
            'Connection:keep-alive',
            'Host:m.tiantianzhibo.com',
            'Pragma:no-cache',
            'Referer:http://m.tiantianzhibo.com/channel/cctv5.html',
            'Upgrade-Insecure-Requests:1',
            'User-Agent:Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1',
        ];

        if (stristr($key,'ttzb')) {
        }
        else{
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $server_output = curl_exec ($ch);

//        $tmps = explode('\r\n',$server_output);
//        foreach ($tmps as $tmp){
//            dump($tmp);
//        }

        curl_close ($ch);
        dump($server_output);
        if (count(explode('<script type="text/javascript">',$server_output)) >= 2) {
            $tmps = explode('<script type="text/javascript">', $server_output)[1];
            $tmps = explode('</script>', $tmps)[0];
            //            dump($tmps);
            $source = $tmps;

            $unpacker = new BJ();

            $js = $unpacker->unpack($source);  // console.log('hello world');
            $js = explode('function ckcpt',$js)[0];
            dump($js);
            return view('manager.pull.ttzb_url',array('js'=>$js));
        }
        else{
            return \Illuminate\Support\Facades\Response::json(array('code'=>-4));
        }
    }
}
