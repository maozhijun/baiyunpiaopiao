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
use App\Http\Controllers\Api\Channels\Esport007;
use App\Http\Controllers\Api\Channels\Fd00cdn;
use App\Http\Controllers\Api\Channels\HuomaoQiniu;
use App\Http\Controllers\Api\Channels\HuomaoWs;
use App\Http\Controllers\Api\Channels\Inke;
use App\Http\Controllers\Api\Channels\KittyLive;
use App\Http\Controllers\Api\Channels\LiveMe;
use App\Http\Controllers\Api\Channels\Longzhu;
use App\Http\Controllers\Api\Channels\Sina7d;
use App\Http\Controllers\Api\Channels\Syyba123;
use App\Http\Controllers\Api\Channels\Uplive;
use App\Http\Controllers\Api\Channels\Weibo;
use App\Http\Controllers\Api\Channels\WoleW;
use App\Http\Controllers\Api\Channels\Xiaoka;
use App\Http\Controllers\Api\Channels\Xiaomi;
use App\Http\Controllers\Api\Channels\Xiu9;
use App\Http\Controllers\Api\Channels\Xiu95;
use App\Http\Controllers\Api\Channels\Zhangyu;
use App\Http\Controllers\Api\Channels\Zhibo;
use Illuminate\Support\Facades\Redis;

class ChannelFactory
{
    const REDIS_DISABLE_KEY = "channels_disable_key";

    const ID_CHANNELS = [
        106 => Syyba123::class,
        107 => China0736::class,
        203 => Xiaoka::class,
        204 => Sina7d::class,
        205 => Fd00cdn::class,
        209 => WoleW::class,
        208 => Inke::class,
        210 => Xiu95::class,
        211 => Xiu9::class,
        301 => Longzhu::class,
        302 => Zhibo::class,
        309 => HuomaoWs::class,
        311 => Xiaomi::class,
        312 => Weibo::class,
        313 => LiveMe::class,
        314 => KittyLive::class,
        315 => Uplive::class,
        316 => Esport007::class,
        317 => Zhangyu::class,
        998 => AikqWS::class,
    ];

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
            AikqWS::class,
            AikqAli::class,
//            Zhibo::class,
            Longzhu::class,
            Xiaomi::class,
            Syyba123::class,
            LiveMe::class,
//            Uplive::class,
//            Zhangyu::class,
            Esport007::class,
            KittyLive::class,
            Xiu9::class,
            Xiaoka::class,
            Fd00cdn::class,
            WoleW::class,
            Xiu95::class,
            Sina7d::class,
            China0736::class,
//            Weibo::class,
//            Inke::class,
//            HuomaoWs::class,
        ],
    ];

    /**
     * @param $level
     * @return Channel
     */
    public static function createInstance($level, $uid)
    {
        $cs = self::getFilterChannels()[$level];
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
        foreach (self::getFilterChannels() as $channel) {
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
     * 获取无法推流了的平台id
     * @return array
     */
    public static function getDisableChannelIds()
    {
        $disableIds = array();
        $disableIdStr = Redis::get(self::REDIS_DISABLE_KEY);
        if ($disableIdStr != null && strlen($disableIdStr) > 0) {
            $disableIds = explode(",", $disableIdStr);
        }
        return $disableIds;
    }

    /**
     * 保存无法推流的平台id（如果不可以推，变成可以退，也可以保存）
     * @param $id
     * @param $isDisable
     */
    public static function saveDisableChannelId($id, $isDisable)
    {
        $disableIds = self::getDisableChannelIds();
        if ($isDisable && !in_array($id, $disableIds)) {
            $disableIds[] = $id;
        } else if (!$isDisable && in_array($id, $disableIds)) {
            $disableIds = self::unsetArrayItemByValue($disableIds, $id);
        }
        Redis::set(self::REDIS_DISABLE_KEY, implode(",", $disableIds));
    }

    /**
     * 获取经后台筛选后的可用平台
     */
    private static function getFilterChannels()
    {
        $disableIds = self::getDisableChannelIds();

        if (count($disableIds) > 0) {
            $level1Channels = self::$channels["1"];
            $level2Channels = self::$channels["2"];
            $level3Channels = self::$channels["3"];

            foreach ($disableIds as $id) {
                if (array_key_exists($id, self::ID_CHANNELS)) {
                    $disableClazz = self::ID_CHANNELS[$id];

                    $level1Channels = self::unsetArrayItemByValue($level1Channels, $disableClazz);
                    $level2Channels = self::unsetArrayItemByValue($level2Channels, $disableClazz);
                    $level3Channels = self::unsetArrayItemByValue($level3Channels, $disableClazz);
                }
            }
            self::$channels["1"] = $level1Channels;
            self::$channels["2"] = $level2Channels;
            self::$channels["3"] = $level3Channels;
        }
        return self::$channels;
    }

    /**
     * 根据value，去除array中的某项
     * @param array $array
     * @param $value
     * @return array
     */
    private static function unsetArrayItemByValue(array $array, $value)
    {
        $key = array_search($value, $array);
        if (!is_bool($key) && array_key_exists($key, $array)) {
            unset($array[$key]);
        }
        return $array;
    }

    /**
     * 获取所有需要测试的平台
     */
    public static function getTestChannels($isAllTest = true)
    {
        $allChannels = array();
        $channels = $isAllTest ? self::$channels : self::getFilterChannels();

        foreach ($channels as $key => $channelItems) {
            $levelChannels = array();
            foreach ($channelItems as $channelItem) {
                $levelChannels[] = new $channelItem(0);
            }
            $allChannels[$key] = $levelChannels;
        }
        return $allChannels;
    }

    /**
     * 测试用的方法
     */
    public function onChannelTest()
    {
        dump(self::getTestChannels(false));
    }
}