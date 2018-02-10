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
class FootballDetailInterface
{

    const detail_base_patch = 'public/json/detail/';

    protected function getDataFromCache($date, $mid, $suffix) {
        $sport = 1;
        $patch = self::detail_base_patch . $date . '/' . $sport . '/' . $mid . '/' . $suffix . '.json';
        $jsonPatch = CacheTool::getCacheJsonPatch($patch);
        $json = CacheTool::getFileContent($jsonPatch);
        return $json;
    }

    /**
     * @param $date
     * @param $mid
     * @return bool|null|string
     */
    public function getCornerDataFromCache($date, $mid) {
        return $this->getDataFromCache($date, $mid, 'corner');
    }

    /**
     * @param $date
     * @param $mid
     * @return bool|null|string
     */
    public function getStyleDataFromCache($date, $mid) {
        return $this->getDataFromCache($date, $mid, 'style');
    }

    public function getBaseDataFromCache($date, $mid) {
        return $this->getDataFromCache($date, $mid, 'base');
    }

    public function getOddDataFromCache($date, $mid) {
        return $this->getDataFromCache($date, $mid, 'odd');
    }

    public function getEventFromCache($date, $mid) {
        return $this->getDataFromCache($date, $mid, 'event');
    }
}