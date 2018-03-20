<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/9
 * Time: 19:07
 */

namespace App\Http\Controllers\CacheInterface;


class CacheTool
{

    /**
     * 获取缓存文件的路径。
     * @param string $patch   从 public/json 开始写到 文件的路径。
     * @return null|string|string[]
     */
    public static function getCacheJsonPatch($patch = '') {
        $detail_patch = base_path($patch);
        if ('/' != DIRECTORY_SEPARATOR) {
            $detail_patch = preg_replace('/\//', DIRECTORY_SEPARATOR, $detail_patch);
        }
        return $detail_patch;
    }

    /**
     *  获取文件内容，如果文件不存在、读取出错 则返回 null，否则返回文件内容。
     * @param $patch
     * @return bool|null|string
     */
    public static function getFileContent($patch) {
        try {
            $json = file_get_contents($patch);
            return $json;
        } catch (\Exception $exception) {
            $msg = $exception->getMessage();
            if (preg_match('/No such file or directory/', $msg)) {
                //echo '该文件不存在';
            }
            return null;
        }
    }
}