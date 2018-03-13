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
    /**
     * 根据比赛id截取前面的部分
     */
    public static function getMidIndex1($mid) {
        return substr($mid, 0, 2);
    }
    public static function getMidIndex2($mid) {
        return substr($mid, 2, 2);
    }

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

    //============比赛列表数据===========================
    public static function getFileFromSchedule($date, $sport, $type) {
        if (isset($date)) {
            $date = date("Ymd", strtotime($date));
        } else {
            $date = date("Ymd");
        }
        return self::getFile('schedule', "/$date/$sport/$type.json");
    }

    //============比赛详情数据===========================
    public static function getFileFromTerminal($sport, $mid, $name) {
        $firstTag = substr($mid, 0, 2);
        $secondTag = substr($mid, 2, 2);
        return self::getFile('terminal', "/$sport/$firstTag/$secondTag/$mid/$name.json");
    }

    //==============实时更改部分=======================
    public static function getFileFromChange($sport, $name) {
        return self::getFile('change', "/$sport/$name.json");
    }

    //==============赛事相关部分=======================
    public static function getFileFromLeague($sport, $lid) {
        return self::getFile('league', "/$sport/$lid.json");
    }
}