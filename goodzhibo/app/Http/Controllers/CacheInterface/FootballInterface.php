<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/8
 * Time: 12:32
 */

namespace App\Http\Controllers\CacheInterface;


use App\Http\Controllers\StaticJson\JsonController;
use App\Models\Match\MatchLive;
use Illuminate\Support\Facades\Storage;

class FootballInterface
{

    /**
     * 获取列表json
     * @param string $date
     * @return mixed
     */
    public function matchListDataJson($date = '') {
        try {
            $patch = JsonController::getMatchListStoragePatch($date, MatchLive::kSportFootball);
            $patch = '/public' . $patch;
            return Storage::get($patch);
        } catch (\Exception $exception) {
            return null;
        }
    }

}