<?php
/**
 * Created by PhpStorm.
 * User: maozhijun
 * Date: 2018/7/19
 * Time: 11:40
 */

namespace App\Http\Controllers\Api;


abstract class Channel
{
    public $id = 0;//平台ID
    public $name = '';//平台名称
    public $level = 1;//平台级别，1:野鸡，2:一般，3:大平台
    public $expiration = -1;//过期时间，单位秒，-1表示不过期

    public abstract function pushURL();

    public abstract function pushKey();

    public abstract function playFLV();

    public abstract function playRTMP();

    public abstract function playM3U8();
}
