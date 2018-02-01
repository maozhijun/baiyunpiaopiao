<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/7
 * Time: 19:29
 */

namespace App\Models\Match;

use Illuminate\Database\Eloquent\Model;

class BasketMatch extends Model
{
    public $connection = "match";

    const kStatusNoStart = 0, kStatusFirst = 1, kStatusSecond = 2, kStatusThird = 3, kStatusFourth = 4, kStatusEnd = -1;//比赛状态(0未开始,1第一节,2第二节,3第三节,4第四节,-1已结束

    //判断比赛是否在中场休息前(包括未开始)
    public function isBeforeHalf() {
        return $this->status == 0 || $this->status == 1 || $this->status == 2;
    }

    public function getStatusText()
    {
        //0未开始,1上半场,2中场休息,3下半场,-1已结束,-14推迟,-11待定,-10一支球队退赛
        $status = $this->status;
        return self::getStatusTextCn($status);
    }

    public static function getStatusTextCn($status) {
        switch ($status) {
            case 0:
                return "未开始";
            case 1:
                return "第一节";
            case 2:
                return "第二节";
            case 3:
                return "第三节";
            case 4:
                return "第四节";
            case 5:
                return "加时1";
            case 6:
                return "加时2";
            case 7:
                return "加时3";
            case 50:
                return "中场";
            case -1:
                return "已结束";
            case -5:
                return "推迟";
            case -2:
                return "待定";
            case -12:
                return "腰斩";
            case -10:
                return "退赛";
            case -99:
                return "异常";
        }
        return '';
    }

    public function getScoreText($withSpace = false) {
        $status = $this->status;
        if ($status == 0) {
            return "VS";
        } else if ($status == -1 || $status > 0) {
            if ($withSpace) {
                return $this->hscore . ' - ' . $this->ascore;
            } else {
                return $this->hscore . '-' . $this->ascore;
            }
        } else {
            return $this->getStatusText();
        }
    }

    public static function getScoreTextCn($status, $hscore, $ascore, $withSpace = false) {
        if ($status == 0) {
            return "VS";
        } else if ($status == -1 || $status > 0) {
            return $hscore.($withSpace ? ' - ' : '-').$ascore;
        } else {
            return self::getStatusTextCn($status);
        }
    }

    /**
     * 比赛是否有比分
     * @return bool
     */
    public function isShowScore()
    {
        $status = $this->status;
        return ($status > 0 || $status == -1);
    }

    //判断赛制是否是半全场
    public static function isHalfFormat($format) {
        return $format == 1;
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
                $timeStr = self::getStatusTextCn($status);
                break;
        }
        return $timeStr;
    }
}