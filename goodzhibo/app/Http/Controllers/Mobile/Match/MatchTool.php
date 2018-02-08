<?php
/**
 * Created by PhpStorm.
 * User: ricky
 * Date: 2018/1/12
 * Time: 11:10
 */

namespace App\Http\Controllers\Mobile\Match;


use App\Models\Match\MatchLive;

trait MatchTool
{
    private function isSport($sport) {
        return in_array($sport, [MatchLive::kSportFootball, MatchLive::kSportBasketball]);
    }

    private function isType($type) {
        return in_array($type, ['immediate', 'schedule', 'result', 'matchesByIds']);
    }
}