<?php
/**
 * Created by PhpStorm.
 * User: maozhijun
 * Date: 2018/7/19
 * Time: 11:59
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\Channels\AikqAli;
use App\Http\Controllers\Api\Channels\AikqWS;
use App\Http\Controllers\Api\Channels\China0736;
use App\Http\Controllers\Api\Channels\Fd00cdn;
use App\Http\Controllers\Api\Channels\HuomaoQiniu;
use App\Http\Controllers\Api\Channels\HuomaoWs;
use App\Http\Controllers\Api\Channels\Inke;
use App\Http\Controllers\Api\Channels\Longzhu;
use App\Http\Controllers\Api\Channels\Sina7d;
use App\Http\Controllers\Api\Channels\Syyba123;
use App\Http\Controllers\Api\Channels\WoleW;
use App\Http\Controllers\Api\Channels\Xiaoka;
use App\Http\Controllers\Api\Channels\Zhibo;

class ChannelFactory
{
    public static $channels = [
        '1' => [//野鸡平台推野鸡赛
//            AikqAli::class,
//            Sina7d::class,
//            Syyba123::class,
//            China0736::class,
//            HuomaoQiniu::class,
            AikqWS::class,
        ],
        '2' => [//小平台推小比赛
//            Xiaoka::class,
//            Fd00cdn::class,
//            WoleW::class,
            AikqWS::class,
        ],
        '3' => [//大平台推大比赛
//            Zhibo::class,
//            Longzhu::class,
//            Inke::class,
            AikqWS::class,
//            HuomaoWs::class,
        ],
    ];

    /**
     * @param $level
     * @return Channel
     */
    public static function createInstance($level, $uid)
    {
        $cs = self::$channels[$level];
        if (count($cs) > 0) {
            return new $cs[array_rand($cs)]($uid);
        } else {
            return null;
        }
    }

    /**
     * @param $id
     * @return Channel
     */
    public static function createInstanceById($id)
    {
        foreach (self::$channels as $channel) {
            foreach ($channel as $ch) {
                $c = new $ch;
                if ($c->id == $id) {
                    return $c;
                }
            }
        }
        return null;
    }
}