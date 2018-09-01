<?php
/**
 * Created by PhpStorm.
 * User: ricky007
 * Date: 2018/9/2
 * Time: 0:25
 */

namespace App\Console;


use App\Http\Controllers\Api\Channels\Xiaomi;
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
//        $xiaomi = new Xiaomi();
//        dump($xiaomi);
    }

}