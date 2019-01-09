<?php
/**
 * Created by PhpStorm.
 * User: ricky007
 * Date: 2018/9/2
 * Time: 0:25
 */

namespace App\Console;


use App\Http\Controllers\Api\Channels\JustFun;
use Illuminate\Console\Command;

class TestCommand extends Command
{

    protected $signature = "test:run";

    protected $name = "测试一下";

    public function __construct()
    {
        parent::__construct();
    }

    private $expiration;
    private $ali_key = "wpnUuhE298";
    private $ali_host = "zhibo1.duitoukeji.com";

    public function handle()
    {
//        dump(new JustFun(0, "", 242501));
//        $key = "wpnUuhE298";
//        $roomName = "30020176";
//        $timestamp = time();
//        $sstring = '/live/' . $roomName . "-$timestamp-0-0-" . $key;
//        $auth_key = "$timestamp-0-0-" . md5($sstring);
//        $url = 'rtmp://video-center.alivecdn.com/live/'.$roomName.'?vhost=zhibo1.duitoukeji.com&auth_key=' . $auth_key;//流名称
//
//        $sstring = '/live/' . $roomName . ".m3u8-$timestamp-0-0-" . $key;
//        $m3u8Key = "$timestamp-0-0-" . md5($sstring);
//        $m3u8Url = "http://zhibo1.duitoukeji.com/live/$roomName.m3u8?auth_key=$m3u8Key";

//        dump($url, $m3u8Url);

        $this->expiration = time() + 10800;
//        $this->ali_host = env('ALI_CDN_HOST', '');
//        $this->ali_key = env('ALI_CDN_KEY', '');
//        $key = random_int(111111, 999999);
        $key = 30020175;
        $timestamp = $this->expiration;

        $sstring = '/live/' . $key . "-$timestamp-0-0-" . $this->ali_key;
        $auth_key = "$timestamp-0-0-" . md5($sstring);
        $streamURL = 'rtmp://video-center.alivecdn.com/live';//流地址
        $streamKey = $key . '?vhost=' . $this->ali_host . '&auth_key=' . $auth_key;//流名称

        $sstring = '/live/' . $key . ".flv-$timestamp-0-0-" . $this->ali_key;
        $auth_key = "$timestamp-0-0-" . md5($sstring);
        $playFlv = 'http://' . $this->ali_host . '/live/' . $key . '.flv?auth_key=' . $auth_key;//flv播放地址

        $sstring = '/live/' . $key . ".m3u8-$timestamp-0-0-" . $this->ali_key;
        $auth_key = "$timestamp-0-0-" . md5($sstring);
        $playM3U8 = 'http://' . $this->ali_host . '/live/' . $key . '.m3u8?auth_key=' . $auth_key;//播放m3u8地址

        dump($streamURL.'/'.$streamKey, $playM3U8, $playFlv);
    }

    public static function execUrl($url, $timeout = 5, $isHttps = false)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);//8秒超时
        if ($isHttps) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求 不验证证书和hosts
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $server_out = curl_exec($ch);
        curl_close($ch);
        return $server_out;
    }

}