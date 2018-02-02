<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/7
 * Time: 19:31
 */

namespace App\Models\Match;


use Illuminate\Database\Eloquent\Model;

class BasketOdds extends Model
{

    public $connection = "match";

    /**
     * 获取数据库名
     */
    public static function getDatabaseName(){
        return env('DB_DATABASE_MATCH', 'moro');
    }

    public function getPanKouText() {
        $text = $this->middle2;
        if ($this->type == BasketOddsAfter::k_odd_type_asian) {
            if ($this->middle2 == 0) {
                return "平手";
            }
            $text = self::panKouText($text);
        }
        return $text;
    }

    /**
     * @param $middle float 盘口
     * @param bool $isAway 是否是客队
     * @param bool $isGoal 是否是大小球
     * @return string
     */
    public static function panKouText($middle, $isAway = false, $isGoal = false) {
        if ($isGoal || $middle == 0){
            $prefix = "";
        } else{
            if ($isAway){
                $prefix = $middle < 0 ? "让" : "受让";
            }else{
                $prefix = $middle < 0 ? "受让" : "让";
            }
        }
        return $prefix . abs($middle) . '分';
    }

}