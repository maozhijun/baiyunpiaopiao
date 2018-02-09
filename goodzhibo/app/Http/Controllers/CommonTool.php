<?php
/**
 * Created by PhpStorm.
 * User: ricky
 * Date: 2017/10/19
 * Time: 17:26
 */

namespace App\Http\Controllers;


use App\Models\Match\BasketOdds;
use App\Models\Match\MatchLive;
use App\Models\Match\Odd;
use App\Models\Shop\Business\GoodsArticles;

class CommonTool
{
    /**
     * 根据解读id返回路径
     * @param $mid
     * @param $dateString
     * @return string
     */
    public static function articlePathWithId($mid,$dateString,$name_en){
        $path = '';
        if ($mid > 0) {
            $first = date_format(date_create($dateString),'Ymd');
            $path = '/news/'.$name_en.'/' . $first . '/'  . $mid . '.html';
        }
        return $path;
    }

    /**
     * 根据文章id返回path
     * @param $id
     * @param $dateString
     * @return mixed
     */
    public static function recommendPathWithId($id,$dateString){
        $path = '';
        if ($id > 0) {
            $first = date_format(date_create($dateString),'Ymd');
            $path = '/article_detail/' . $first . '/'  . $id . '.html';
        }
        return $path;
    }

    /**
     * 根据比赛id返回path
     * @param $mid
     * @param $dateString
     * @param $sport
     * @return mixed
     */
    public static function matchPathWithId($mid, $dateString, $sport = MatchLive::kSportFootball){
        $path = '';
        if ($mid > 1000) {
            $first = date_format(date_create($dateString), 'Ymd');
            if ($sport == 2) {
                $path = '/basketball/detail/' . $first . '/' . $mid . '.html';
            } else {
                $path = '/football/detail/' . $first . '/' . $mid . '.html';
            }
        }
        return $path;
    }

    /**
     * 根据比赛id返回path
     * @param $mid
     * @param $dateString
     * @param $sport
     * @return mixed
     */
    public static function matchLivePathWithId($mid,$sport=MatchLive::kSportFootball){
        $path = '';
        if ($mid > 0) {
//            $first = date_format(date_create($dateString),'Ymd');
            $path = '/match/live/' . $sport . '/'  . $mid . '.html';
        }
        return $path;
    }

    public static function matchLiveFullPathWithId($mid, $sport = MatchLive::kSportFootball){
        $path = '';
        if ($mid > 0) {
            if (MatchLive::kSportBasketball == $sport) {
                $path = '/live/basketball/' . $mid . '.html';
            } else if (MatchLive::kSportFootball == $sport) {
                $path = '/live/football/' . $mid . '.html';
            }
        }
        return $path;
    }

    public static function getImg($img_url) {
        if (!empty($img_url)) {
            $prefix = env('IMG_URL', 'http://img.liaogou168.com/');
            if (!str_contains($prefix, "http")) {
                $prefix = "http:" . $prefix;
            }
            return $prefix . $img_url;
        }
        return "";
    }

    /**
     * 前端盘口显示
     * @param $handicap
     * @param string $default
     * @param int $type
     * @param $sport
     * @param bool $isHome
     * @return float|string
     */
    public static function getHandicapCn($handicap, $default = "", $type = Odd::k_odd_type_asian, $sport = GoodsArticles::kSportFootball, $isHome = true)
    {
        if ($sport == GoodsArticles::kSportFootball) {
            if ($type == Odd::k_odd_type_asian) {
                return Odd::panKouText($handicap, !$isHome);
            } else if ($type == Odd::k_odd_type_ou) {//大小球
                if ($handicap * 100 % 100 == 0) {
                    return round($handicap);
                }
                $handicap = round($handicap, 2);
                if ($handicap * 100 % 50 == 0) {//尾数为0.5的直接返回
                    return $handicap;
                }
                $tempHandicap = round($handicap);//四舍五入
                $intHandicap = floor($handicap);//取整
                if ($tempHandicap == $intHandicap) {//比较 四舍五入 与 取整大小，尾数为 0.25 则为相同
                    return $intHandicap . '/' . $intHandicap . '.5';
                } else {//否则尾数为0.75
                    return $intHandicap . '.5/' . ($intHandicap + 1);
                }
            } else if ($type == Odd::k_odd_type_europe) {//竞彩
                if ($handicap > 0) {
                    return "+" . $handicap;
                } else if ($handicap == 0) {
                    return "不让球";
                } else {
                    return $handicap;
                }
            }
        } elseif ($sport == GoodsArticles::kSportBasketball) {
            if ($type == Odd::k_odd_type_asian) {
                return BasketOdds::panKouText($handicap, !$isHome);
            } else if ($type == Odd::k_odd_type_ou) {//大小球
                return (($handicap * 100 % 100 == 0) ? round($handicap) : round($handicap, 2));
            } else if ($type == Odd::k_odd_type_europe) {//竞彩
                if ($handicap > 0) {
                    return "+" . $handicap;
                } else if ($handicap == 0) {
                    return "不让分";
                } else {
                    return $handicap;
                }
            } elseif ($type == GoodsArticles::kTypeBettingBall) {
                return (($handicap * 100 % 100 == 0) ? round($handicap) : round($handicap, 2));
            }
        }
        return $default;
    }

    /**
     * @param $float float 传入的小数
     * @param $notKeepZero boolean 是否不保留小数后的0
     * @return float 返回的保留两位有效数字后的结果
     */
    public static function float2Decimal($float, $notKeepZero = false){
        if (isset($float)) {
            if ($notKeepZero) {
                return round($float, 2);
            } else {
                return sprintf('%.2f', round($float, 2));
            }
        }
        return '-';
    }

    public static function colorOfUpDown($up1,$up2){
        if ($up2 > $up1){
            return 'red';
        }
        elseif ($up2 < $up1){
            return 'green';
        }
        return '';
    }

    public static function object_to_array($obj) {
        $object =  json_decode( json_encode( $obj),true);
        return  $object;
    }

    //根据传入的路径，创建或获取对应的storage下的目录
    public static function getStorageDir($dir) {
        $document_root = str_replace("public", "storage", $_SERVER['DOCUMENT_ROOT']);
        $directs = explode('/', $dir);
        $fileDir = $document_root;
        $hasDir = false;
        $i = 0; $length = count($directs);
        foreach ($directs as $direct) {
            $i++;
            $fileDir .= "/$direct";
            if (!file_exists($fileDir)) {
                $hasDir = mkdir($fileDir);
            } else {
                $hasDir = ($i >= $length);
            }
        }
        return $hasDir ? $fileDir : "";
    }

    //根据赛事id返回背景色(rgb)
    public static function getLeagueBgRgb($lid) {
        if (isset($lid)) {
            $r = ($lid * 141) % 26 + ($lid * 71) % 121 + 0;
            $g = ($lid * 141) % 26 + ($lid * 71) % 51 + 0;
            $b = ($lid * 141) % 36 + ($lid * 71) % 86 + 0;
        } else {
            $r = 0;
            $g = 0;
            $b = 0;
        }

        return ['r'=>$r, 'g'=>$g, 'b'=>$b];
    }

    public static function objtoarr($obj){
        $ret = array();
        if (isset($obj)) {
            foreach ($obj as $key => $value) {
                if (gettype($value) == 'array' || gettype($value) == 'object') {
                    $ret[$key] = self::objtoarr($value);
                } else {
                    $ret[$key] = $value;
                }
            }
        }
        return $ret;
    }
}