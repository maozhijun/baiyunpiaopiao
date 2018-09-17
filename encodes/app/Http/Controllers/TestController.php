<?php
/**
 * Created by PhpStorm.
 * User: ricky007
 * Date: 2018/8/1
 * Time: 10:51
 */

namespace App\Http\Controllers;


use App\Http\Controllers\Api\Channels\HuomaoQiniu;
use App\Http\Controllers\Api\Channels\HuomaoWs;
use App\Http\Controllers\Api\Channels\Uplive;

class TestController extends Controller
{
    public function onTest() {
//        $huomaoQn = new HuomaoQiniu();
//        dump($huomaoQn);
//
//        $huomaoWs = new HuomaoWs();
//        dump($huomaoWs);
        dump(new Uplive());
    }
}