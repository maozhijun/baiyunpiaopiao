<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/9
 * Time: 16:38
 */

namespace App\Http\Controllers\CacheInterface;

/**
 * Class WapFootballDetailInterface
 * @package App\Http\Controllers\CacheInterface
 */
class BasketballDetailInterface
{

    const detail_base_patch = 'public/json/detail/';

    protected function getDataFromCache($date, $mid, $suffix) {
        $sport = 2;
        $patch = self::detail_base_patch . $date . '/' . $sport . '/' . $mid . '/' . $suffix . '.json';
        $jsonPatch = CacheTool::getCacheJsonPatch($patch);
        $json = CacheTool::getFileContent($jsonPatch);
        return $json;
    }

    public function getBaseDataFromCache($date, $mid) {
        return $this->getDataFromCache($date, $mid, 'base');
    }

    /**
     * 获取比赛数据
     * @param $id
     * @return bool|null|string
     */
    public function getMatchDataFromCache($id) {
        $patch = 'public/json/match/detail/0/2/' . $id . '/match.json';
        $jsonPatch = CacheTool::getCacheJsonPatch($patch);
        $json = CacheTool::getFileContent($jsonPatch);
        return $json;
    }

    public function getOddDataFromCache($date, $mid) {
        return $this->getDataFromCache($date, $mid, 'odd');
    }
}