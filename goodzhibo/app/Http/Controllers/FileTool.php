<?php
/**
 * Created by PhpStorm.
 * User: ricky
 * Date: 2017/11/20
 * Time: 18:26
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;

class FileTool extends Controller
{
    private static function putFile($disk, $filePatch, $data) {
        try {
            Storage::disk($disk)->put($filePatch, $data);
        } catch (\Exception $exception) {
//            dump($exception->getMessage());
        }
    }

    private static function getFile($disk, $filePath) {
        $data = null;
        try {
            $data = Storage::disk($disk)->get($filePath);
        } catch (\Exception $exception) {
//            dump($exception->getMessage());
        }
        return $data;
    }

    //============比赛列表静态化===========================
    public static function getMatchesData($sport, $type, $date = null) {
        $date = isset($date) ? $date : date("Ymd");
        return self::getFile('matches', "/$date/$sport/$type.json");
    }

    //============比赛详情静态化===========================
    public static function getMatchDetailData($sport, $mid, $type, $date = null) {
        $date = isset($date) ? $date : date("Ymd");
        return self::getFile('detail', "/$date/$sport/$mid/$type.json");
    }
}