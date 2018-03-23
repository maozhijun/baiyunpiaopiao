<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/10
 * Time: 17:14
 */

namespace App\Console\Manual;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class FlushGoodZhiBoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flush_good_zhi_bo:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '刷新good';

    /**
     * Create a new command instance.
     * HotMatchCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->flushGoodZhiBo();
    }

    public function flushGoodZhiBo() {
        $ch = curl_init();
        //$url = "http://www.liaogou168.com/intf/foot/data?date=" . date('Ymd', strtotime('+1 days'));//足球数据
        $url = "http://www.liaogou168.com/intf/basket/data?date=" . date('Ymd', strtotime('+1 days'));//篮球数据
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        $server_output = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        $matches = json_decode($server_output, true);
        if (is_null($matches)) {
            echo $server_output;
            return;
        }
        //dump($matches);
//        echo $server_output;
//        return;

        $host = "http://www.goodzhibo.com";
        $matches = $matches['matches'];
        $total = count($matches);
        $index = 1;
        foreach ($matches as $m) {
//            foreach ($ms as $m) {
//                dump($m);
            if ( !isset($m['mid']) || !isset($m['time']) ){// !isset($m['sport']) ||
//                    echo dump($m);
                continue;
            }
            $sport = 2;//$m['sport'];
            $mid = $m['mid'];
            $date = strtotime($m['time']);
            $date = date('Ymd', $date);

//                $url = $host . "/m/static/detail/" . $mid . "/" . $sport . ".html";
//                $this->execUrl($url);//刷新 wap 直播终端
//                usleep(300);
//                $url = $host . "/live/flush/pc-detail/" . $mid . '-' . $sport . '.html';
//                $this->execUrl($url);//刷新 pc 直播终端
//                usleep(300);

//            $url = $host . '/static/football/detail/' . $date . '/' . $mid;
//            $this->execUrl($url);//刷新 pc 足球终端
//            usleep(300);
//            $url = $host . '/static/football/detail/wap/' . $date . '/' . $mid;
//            $this->execUrl($url);//刷新 wap 足球终端
//                usleep(300);
                $url = $host . '/static/basketball/wap/detail/' . $date . '/' . $mid;
                $this->execUrl($url);//刷新 wap 篮球终端
                usleep(300);
            echo "flush good zhi bo " . date('YmdHi', strtotime($m['time'])) . " " . $mid . ' ' . $sport . " 进度： " . $index++ .'/' . $total . "\n";
            Log::info("flush good zhi bo " . date('YmdHi', strtotime($m['time'])) . " " . $mid . ' ' . $sport . " 进度： " . $index .'/' . $total . "\n");
//            }
        }
        echo "执行完毕";
    }

    public function execUrl($url, $timeout = 25) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_exec ($ch);
        curl_close ($ch);
    }

}