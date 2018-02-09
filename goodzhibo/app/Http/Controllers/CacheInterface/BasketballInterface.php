<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/8
 * Time: 12:49
 */

namespace App\Http\Controllers\CacheInterface;


use App\Http\Controllers\StaticJson\JsonController;
use App\Models\Match\MatchLive;
use Illuminate\Support\Facades\Storage;

class BasketballInterface
{

    public function matchListDataJson($date = '') {
        try {
            $patch = JsonController::getMatchListStoragePatch($date, MatchLive::kSportBasketball);
            $patch = '/public' .$patch;
            $cache = Storage::get($patch);
            return $cache;
        } catch (\Exception $exception) {
            return null;
        }
    }

}