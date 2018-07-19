<?php
/**
 * Created by PhpStorm.
 * User: maozhijun
 * Date: 2018/7/19
 * Time: 11:59
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\Channels\AikqAli;
use App\Http\Controllers\Api\Channels\China0736;
use App\Http\Controllers\Api\Channels\Fd00cdn;
use App\Http\Controllers\Api\Channels\Inke;
use App\Http\Controllers\Api\Channels\Longzhu;
use App\Http\Controllers\Api\Channels\Sina7d;
use App\Http\Controllers\Api\Channels\Syyba123;
use App\Http\Controllers\Api\Channels\Xiaoka;
use App\Http\Controllers\Api\Channels\Zhibo;
use phpDocumentor\Reflection\Types\Integer;

class ChannelFactory
{
    public static $channels = [
        '1' => [//野鸡平台推野鸡赛
//            AikqAli::class,
            Sina7d::class,
            Syyba123::class,
            China0736::class,
        ],
        '2' => [//小平台推小比赛
            Xiaoka::class,
            Fd00cdn::class,
        ],
        '3' => [//大平台推大比赛
//            Zhibo::class,
            Longzhu::class,
            Inke::class,
        ],
    ];

    /**
     * @param $level
     * @return Channel
     */
    public static function createInstance($level)
    {
        $cs = self::$channels[$level];
        if (count($cs) > 0) {
            return new $cs[array_rand($cs)];
        } else {
            return null;
        }
    }
}