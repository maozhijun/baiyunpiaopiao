<?php
/**
 * Created by PhpStorm.
 * User: ricky
 * Date: 2017/10/20
 * Time: 16:34
 */

namespace App\Http\Controllers\PC;


use App\Models\Match\BasketMatch;

trait MatchTool
{
    //php获取中文字符拼音首字母
    private function getFirstCharter($str)
    {
        if (empty($str)) {
            return '';
        }
        $fchar = ord($str{0});
        if ($fchar >= ord('A') && $fchar <= ord('z')) return strtoupper($str{0});
        $s1 = iconv('UTF-8', 'gbk//ignore', $str);
        $s2 = iconv('gbk', 'UTF-8', $s1);
        $s = $s2 == $str ? $s1 : $str;
        $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
        if ($asc >= -20319 && $asc <= -20284) return 'A';
        if ($asc >= -20283 && $asc <= -19776) return 'B';
        if ($asc >= -19775 && $asc <= -19219) return 'C';
        if ($asc >= -19218 && $asc <= -18711) return 'D';
        if ($asc >= -18710 && $asc <= -18527) return 'E';
        if ($asc >= -18526 && $asc <= -18240) return 'F';
        if ($asc >= -18239 && $asc <= -17923) return 'G';
        if ($asc >= -17922 && $asc <= -17418) return 'H';
        if ($asc >= -17417 && $asc <= -16475) return 'J';
        if ($asc >= -16474 && $asc <= -16213) return 'K';
        if ($asc >= -16212 && $asc <= -15641) return 'L';
        if ($asc >= -15640 && $asc <= -15166) return 'M';
        if ($asc >= -15165 && $asc <= -14923) return 'N';
        if ($asc >= -14922 && $asc <= -14915) return 'O';
        if ($asc >= -14914 && $asc <= -14631) return 'P';
        if ($asc >= -14630 && $asc <= -14150) return 'Q';
        if ($asc >= -14149 && $asc <= -14091) return 'R';
        if ($asc >= -14090 && $asc <= -13319) return 'S';
        if ($asc >= -13318 && $asc <= -12839) return 'T';
        if ($asc >= -12838 && $asc <= -12557) return 'W';
        if ($asc >= -12556 && $asc <= -11848) return 'X';
        if ($asc >= -11847 && $asc <= -11056) return 'Y';
        if ($asc >= -11055 && $asc <= -10247) return 'Z';
        return null;
    }

    //获取篮球比赛的即时时间
    public static function getBasketCurrentTime($status, $liveStr, $isHalfFormat = false) {
        switch ($status) {
            case -1:
                $timeStr = '已结束';
                break;
            case 0:
                $timeStr = '';
                break;
            case 1:
                $timeStr = ($isHalfFormat ? '上半场 ' : '第一节 ').$liveStr;
                break;
            case 2:
                $timeStr = '第二节 '.$liveStr;
                break;
            case 3:
                $timeStr = ($isHalfFormat ? '下半场 ' : '第三节 ').$liveStr;
                break;
            case 4:
                $timeStr = '第四节 '.$liveStr;
                break;
            case 5:
                $timeStr = '加时1 '.$liveStr;
                break;
            case 6:
                $timeStr = '加时2 '.$liveStr;
                break;
            case 7:
                $timeStr = '加时3 '.$liveStr;
                break;
            case 8:
                $timeStr = '加时4 '.$liveStr;
                break;
            case 50:
            default:
                $timeStr = BasketMatch::getStatusTextCn($status);
                break;
        }
        return $timeStr;
    }

    //获取篮球比赛 单个球队的半场分数
    public static function getBasketHalfScoreTxt($match, $isHome = true) {
        $status = $match['status'];
        if ($isHome) {
            $halfScore = $status == -1 ? ($match['hscore_1st'] + $match['hscore_2nd']) . " / " . ($match['hscore_3rd'] + $match['hscore_4th']) : ($status > 2 ? ($match['hscore_1st'] + $match['hscore_2nd']) . " / -" : ($status > 0 ? '-' : ''));
        } else {
            $halfScore = $status == -1 ? ($match['ascore_1st'] + $match['ascore_2nd']) . " / " . ($match['ascore_3rd'] + $match['ascore_4th']) : ($status > 2 ? ($match['ascore_1st'] + $match['ascore_2nd']) . " / -" : ($status > 0 ? '-' : ''));
        }
        return $halfScore;
    }

    public static function getBasketScoreTxt($match, $isHalf = false, $isDiff = true) {
        $status = $match['status'];
        if ($isHalf) {
            if ($isDiff) {
                $txt = ($status == -1 || $status > 2) ? '半：' . ($match['hscore_1st'] + $match['hscore_2nd'] - $match['ascore_1st'] - $match['ascore_2nd']) : '';
            } else {
                $txt = ($status == -1 || $status > 2) ? '半：'.($match['hscore_1st'] + $match['hscore_2nd'] + $match['ascore_1st'] + $match['ascore_2nd']) : '';
            }
        } else {
            if ($isDiff) {
                $txt = $status == -1 ? '全：' . ($match['hscore'] - $match['ascore']) : '';
            } else {
                $txt = $status == -1 ? '全：'.($match['hscore'] + $match['ascore']) : '';
            }
        }
        return $txt;
    }

    //获取篮球比赛的加时
    public static function getBasketOtScore($ots) {
        return (isset($ots) && strlen($ots) > 0) ? explode(',', $ots) : [];
    }

    public static function getBasketScore($score) {
        if (isset($score)) return $score;
        return '';
    }

}