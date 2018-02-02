<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/20
 * Time: 12:52
 */

namespace App\Models\Match;


use Illuminate\Database\Eloquent\Model;

class MatchLive extends Model
{
    protected $connection = 'match';
    const kSportFootball = 1, kSportBasketball = 2;
    const kShow = 1, kHide = 2;
    const kPlatformAll = 1, kPlatformPc = 2, kPlatformPhone = 3;
}