<?php
/**
 * Created by PhpStorm.
 * User: ricky007
 * Date: 2018/9/2
 * Time: 0:25
 */

namespace App\Console;


use App\Http\Controllers\Api\Channels\Weibo;
use Illuminate\Console\Command;

class TestCommand extends Command
{

    protected $signature = "test:run";

    protected $name = "测试一下";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
//        $weibo = new Weibo();
//        dump($weibo);
    }

    public static function execUrl($url, $timeout = 5, $isHttps = false) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);//8秒超时
        if ($isHttps) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求 不验证证书和hosts
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $server_out = curl_exec ($ch);
        curl_close ($ch);
        return $server_out;
    }

}