<?php

namespace App\Models\Match;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public $connection = "match";

    const k_genre_all = 1;//全部
    const k_genre_yiji = 2;//一级
    const k_genre_zucai = 4;//足彩
    const k_genre_jingcai = 8;//竞彩
    const k_genre_beijing = 16;//北京单场

    public $timestamps = false;

    protected $hidden = ['id'];


    //判断比赛是否在中场休息前(包括未开始)
    public function isBeforeHalf() {
        return $this->status == 0 || $this->status == 1;
    }

    public static function getStatusTextCn($status) {
        switch ($status) {
            case 0:
                return "未开始";
            case 1:
                return "上半场";
            case 2:
                return "中场";
            case 3:
                return "下半场";
            case 4:
                return "加时";
            case -1:
                return "已结束";
            case -14:
                return "推迟";
            case -11:
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

    /**
     * 比赛是否有比分
     * @return bool
     */
    public function isShowScore()
    {
        $status = $this->status;
        return ($status == 1 || $status == 2 || $status == 3 || $status == -1);
    }

    /**
     * 获取今天比赛 开始结束日期
     * @return array
     */
    public static function getMatchTodayClock()
    {
        $todayTenHour = strtotime(date('Y-m-d') . " 10:00:00");
        $now = time();
        if ($now < $todayTenHour) {//凌晨时分
            $start = date('Y-m-d', strtotime('-1 days')) . " 10:00:00";
            $end = date('Y-m-d') . " 09:59:59";
        } else {
            $start = date('Y-m-d') . " 10:00:00";
            $end = date('Y-m-d', strtotime("+1 days")) . " 09:59:59";
        }
        return ["start" => $start, "end" => $end];
    }

    public static function getScoreText($status, $hscore, $ascore, $withSpace = false) {
        if ($status == 0) {
            return "VS";
        } else if ($status == -1 || $status > 0) {
            if ($withSpace) {
                return $hscore . ' - ' . $ascore;
            } else {
                return $hscore . '-' . $ascore;
            }
        } else {
            return self::getStatusText($status);
        }
    }

    public static function getStatusText($status) {
        //0未开始,1上半场,2中场休息,3下半场,-1已结束,-14推迟,-11待定,-10一支球队退赛
        return self::getStatusTextCn($status);
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

    public function getMatchTimeMin() {
        $time = strtotime(isset($this->timehalf)? $this->timehalf : $this->time);
        $timehalf = strtotime($this->timehalf);
        $now = strtotime(date('Y-m-d H:i:s'));
        $status = $this->status;
        if ($status < 0) {
            $matchTime = 90;
        } elseif ($status == 2) {
            $matchTime = 45;
        } elseif ($status == 4) {
            $matchTime = 90;
        }elseif ($this->status == 1) {
            $diff = ($now - $time) > 0 ? ($now - $time) : 0;
            $matchTime = ((floor(($diff) % 86400 / 60)) > 45 ? 45 : (floor(($diff) % 86400 / 60)));
        } elseif ($this->status == 3) {
            $diff = ($now - $timehalf) > 0 ? ($now - $timehalf) : 0;
            $matchTime = ((floor(($diff) % 86400 / 60)) > 45 ? 90 : (floor(($diff) % 86400 / 60) + 45));
        } else {
//            $matchTime = substr($match->time, 11, 5);
            $matchTime = -1;
        }
        return $matchTime;
    }

    public function getCurMatchTime($isApp = false) {
        return self::getMatchCurrentTime($this->time, $this->timehalf, $this->status, $isApp);
    }

    //获取足球比赛的即时时间
    public static function getMatchCurrentTime($time, $timehalf, $status, $isApp = false)
    {
        $time = strtotime(isset($timehalf)? $timehalf : $time);
        $timehalf = strtotime($timehalf);
        $now = strtotime(date('Y-m-d H:i:s'));
        if ($status < 0 || $status == 2 || $status == 4) {
            $matchTime = self::getStatusTextCn($status);
        }elseif ($status == 1) {
            $diff = ($now - $time) > 0 ? ($now - $time) : 0;
            if ($isApp) {
                $matchTime = (floor(($diff) % 86400 / 60)) > 45 ? ('45\'+') : ((floor(($diff) % 86400 / 60)) . '\'');
            } else {
                $matchTime = (floor(($diff) % 86400 / 60)) > 45 ? ('45+' . '<span class="minute">' . '\'') : ((floor(($diff) % 86400 / 60)) . '<span class="minute">' . '\'');
            }
        } elseif ($status == 3) {
            $diff = ($now - $timehalf) > 0 ? ($now - $timehalf) : 0;
            if ($isApp) {
                $matchTime = (floor(($diff) % 86400 / 60)) > 45 ? ('90\'+') : ((floor(($diff) % 86400 / 60) + 45) . '\'');
            } else {
                $matchTime = (floor(($diff) % 86400 / 60)) > 45 ? ('90+' . '<span class="minute">' . '\'') : ((floor(($diff) % 86400 / 60) + 45) . '<span class="minute">' . '\'');
            }
        } else {
            $matchTime = '';
        }
        return $matchTime;
    }
}
