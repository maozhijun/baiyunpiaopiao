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
use App\Http\Controllers\Api\Channels\Weibo;
use App\Http\Controllers\Api\Channels\WoleW;
use App\Http\Controllers\Api\Channels\Xiaoka;
use App\Http\Controllers\Api\Channels\Xiu9;
use App\Http\Controllers\Api\Channels\Xiu95;
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
//            AikqWS::class,
        ],
        '2' => [//小平台推小比赛
//            Xiaoka::class,
//            Fd00cdn::class,
//            WoleW::class,
//            Xiu95::class,
//            Xiu9::class,
//            AikqWS::class,
        ],
        '3' => [//大平台推大比赛
//            Zhibo::class,
            Longzhu::class,
            Xiaoka::class,
            Fd00cdn::class,
            WoleW::class,
            Xiu95::class,
            Xiu9::class,
            Sina7d::class,
            Syyba123::class,
            China0736::class,
//            Inke::class,
//            AikqWS::class,
            Weibo::class,
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
            $channel = new $cs[array_rand($cs)]($uid);
            if ($channel instanceof Channel && !empty($channel->pushURL())) {
                return $channel;
            }
        }
        return null;
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

    /**
     * 测试用的方法
     */
    public function onChannelTest() {
        foreach (self::$channels as $key=>$channelItems) {
            dump("======= 平台：".$key."======");
            foreach ($channelItems as $channelItem) {
                dump(new $channelItem(0));
            }
        }
    }
}