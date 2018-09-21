<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(["get", "post"], "/login", 'AuthController@index');//登录
//Route::get("/manager/list/", "EncodesController@index");

Route::group(["middleware" => "auth", "namespace" => "Push"], function () {
    if (env('APP_NAME') == 'good') {
//        Route::get("/manager/", "HeiEncodesController@index");
//        Route::get("/manager/hei/", "HeiEncodesController@index");
//        Route::post("/manager/hei/created/", "HeiEncodesController@created");
//        Route::get("/manager/hei/stop/{id}", "HeiEncodesController@stop");
//        Route::get("/manager/hei/ali-live-room", "HeiEncodesController@createdAliRoom");
    } elseif (env('APP_NAME') == 'aikq' || env('APP_NAME') == 'aikq1') {
//        Route::get("/manager/", "QQEncodesController@index");
        Route::get("/manager/aikqali/", "QQEncodesController@index");
        Route::post("/manager/aikqali/created/", "QQEncodesController@created");
        Route::get("/manager/aikqali/stop/{id}", "QQEncodesController@stop");
        Route::get("/manager/aikqali/repeat/{id}", "QQEncodesController@repeat");
//        Route::get("/manager/ali-live-room", "QQEncodesController@createdAliRoom");

        Route::get("/manager/aikqws/", "AikqWSEncodesController@index");
        Route::post("/manager/aikqws/created/", "AikqWSEncodesController@created");
        Route::get("/manager/aikqws/stop/{id}", "AikqWSEncodesController@stop");
        Route::get("/manager/aikqws/repeat/{id}", "AikqWSEncodesController@repeat");
    } else {
        Route::get("/manager/", "OtherEncodesController@index");
    }

    Route::get("/", function () {
        return redirect('/manager/longzhu/');
    });

    Route::get("/manager/other/", "OtherEncodesController@index");
    Route::post("/manager/other/created/", "OtherEncodesController@created");
    Route::get("/manager/other/stop/{id}", "OtherEncodesController@stop");
    Route::get("/manager/other/repeat/{id}", "OtherEncodesController@repeat");

    Route::get("/manager/zhibo/", "ZhiboEncodesController@index");
    Route::post("/manager/zhibo/created/", "ZhiboEncodesController@created");
    Route::get("/manager/zhibo/stop/{id}", "ZhiboEncodesController@stop");
    Route::get("/manager/zhibo/repeat/{id}", "ZhiboEncodesController@repeat");

    Route::get("/manager/very/", "VeryEncodesController@index");
    Route::post("/manager/very/created/", "VeryEncodesController@created");
    Route::get("/manager/very/stop/{id}", "VeryEncodesController@stop");
    Route::get("/manager/very/repeat/{id}", "VeryEncodesController@repeat");

    Route::get("/manager/weibo/", "WeiboEncodesController@index");
    Route::post("/manager/weibo/created/", "WeiboEncodesController@created");
    Route::get("/manager/weibo/stop/{id}", "WeiboEncodesController@stop");
    Route::get("/manager/weibo/repeat/{id}", "WeiboEncodesController@repeat");

    Route::get("/manager/kuku/", "KukuEncodesController@index");
    Route::post("/manager/kuku/created/", "KukuEncodesController@created");
    Route::get("/manager/kuku/stop/{id}", "KukuEncodesController@stop");
    Route::get("/manager/kuku/repeat/{id}", "KukuEncodesController@repeat");

    Route::get("/manager/longzhu/", "LongzhuEncodesController@index");
    Route::post("/manager/longzhu/created/", "LongzhuEncodesController@created");
    Route::get("/manager/longzhu/stop/{id}", "LongzhuEncodesController@stop");
    Route::get("/manager/longzhu/repeat/{id}", "LongzhuEncodesController@repeat");
    Route::get("/manager/longzhu/test", "LongzhuEncodesController@test");

    Route::get("/manager/zhangyu/", "ZhangyuEncodesController@index");
    Route::post("/manager/zhangyu/created/", "ZhangyuEncodesController@created");
    Route::get("/manager/zhangyu/stop/{id}", "ZhangyuEncodesController@stop");
    Route::get("/manager/zhangyu/repeat/{id}", "ZhangyuEncodesController@repeat");

    Route::get("/manager/netease/", "NeteaseEncodesController@index");
    Route::post("/manager/netease/created/", "NeteaseEncodesController@created");
    Route::get("/manager/netease/stop/{id}", "NeteaseEncodesController@stop");
    Route::get("/manager/netease/repeat/{id}", "NeteaseEncodesController@repeat");

    Route::get("/manager/custom/", "CustomEncodesController@index");
    Route::post("/manager/custom/created/", "CustomEncodesController@created");
    Route::get("/manager/custom/stop/{id}", "CustomEncodesController@stop");
    Route::get("/manager/custom/repeat/{id}", "CustomEncodesController@repeat");

    Route::get("/manager/huajiao/", "HuajiaoEncodesController@index");
    Route::post("/manager/huajiao/created/", "HuajiaoEncodesController@created");
    Route::get("/manager/huajiao/stop/{id}", "HuajiaoEncodesController@stop");
    Route::get("/manager/huajiao/repeat/{id}", "HuajiaoEncodesController@repeat");

    Route::get("/manager/inke/", "InkeEncodesController@index");
    Route::post("/manager/inke/created/", "InkeEncodesController@created");
    Route::get("/manager/inke/stop/{id}", "InkeEncodesController@stop");
    Route::get("/manager/inke/repeat/{id}", "InkeEncodesController@repeat");

    Route::get("/manager/qxiu/", "QXiuEncodesController@index");
    Route::post("/manager/qxiu/created/", "QXiuEncodesController@created");
    Route::get("/manager/qxiu/stop/{id}", "QXiuEncodesController@stop");
    Route::get("/manager/qxiu/repeat/{id}", "QXiuEncodesController@repeat");

    Route::get("/manager/mi/", "MiEncodesController@index");
    Route::post("/manager/mi/created/", "MiEncodesController@created");
    Route::get("/manager/mi/stop/{id}", "MiEncodesController@stop");
    Route::get("/manager/mi/repeat/{id}", "MiEncodesController@repeat");

    Route::get("/manager/huomao/", "HuoMaoEncodesController@index");
    Route::post("/manager/huomao/created/", "HuoMaoEncodesController@created");
    Route::get("/manager/huomao/stop/{id}", "HuoMaoEncodesController@stop");
    Route::get("/manager/huomao/repeat/{id}", "HuoMaoEncodesController@repeat");

});

Route::group(["middleware" => "auth", "namespace" => "Pull"], function () {
    Route::get("/resources/", "KBallEncodesController@index");

    Route::get("/resources/kball/", "KBallEncodesController@index");

    Route::get("/resources/leisu/", "LeisuEncodesController@index");
    Route::get("/resources/leisu/get_live_url/{id}", "LeisuEncodesController@getLiveUrl");

    Route::get("/resources/xbet/", "XBetEncodesController@index");
    Route::get("/resources/xbet/get_live_url/{id}", "XBetEncodesController@getLiveUrl");
    Route::get("/resources/xbet/get_slive_url", "XBetEncodesController@getSStreamUrl");
    Route::get("/resources/xbet/test", "XBetEncodesController@test");

    Route::get("/resources/ssports/", "SSportsEncodesController@index");
    Route::get("/resources/ssports/get_live_url/{id}", "SSportsEncodesController@getLiveUrl");

    Route::get("/resources/longzhu/", "LongzhuEncodesController@index");
    Route::get("/resources/longzhu/get_live_url/{id}", "LongzhuEncodesController@getLiveUrl");

    Route::get("/resources/qq/", "QQEncodesController@index");
    Route::get("/resources/qq/get_live_url/{id}", "QQEncodesController@getLiveUrl");

    Route::get("/resources/cntv/", "CNTVEncodesController@index");
    Route::get("/resources/cntv/get_live_url/{id}", "CNTVEncodesController@getLiveUrl");

    Route::get("/resources/baitv/", "BaiTVEncodesController@index");
    Route::get("/resources/baitv/get_live_url/{id}", "BaiTVEncodesController@getLiveUrl");

    Route::get("/resources/cctv5/", "CCTV5EncodesController@index");
    Route::get("/resources/cctv5/get_live_url/{id}", "CCTV5EncodesController@getLiveUrl");

    Route::get("/resources/ballbar/", "BallbarEncodesController@index");
    Route::get("/resources/ballbar/get_live_url/{id}", "BallbarEncodesController@getLiveUrl");

    Route::get("/resources/sportlive/", "SportLiveEncodesController@index");

    Route::get("/resources/aliez/", "AliezEncodesController@index");
});

Route::group(["middleware" => "auth", "namespace" => "Record"], function () {
    Route::get("/records/qq/", "QQEncodesController@index");
    Route::get("/records/qq/get_record_url/{id}", "QQEncodesController@getRecordUrl");

});

Route::group(["middleware" => "auth", "namespace" => "Stream"], function () {
    Route::get("/obs/stream/", "PushStreamController@index");
    Route::post("/obs/stream/take-stream/", "PushStreamController@takeStream");
    Route::get("/obs/stream/release-stream/{id}", "PushStreamController@releaseStream");
    Route::get("/obs/stream/close-long-stream/{id}", "PushStreamController@closeStreamLongZhu");
});

Route::group(["middleware" => "auth", "namespace" => "Setting"], function () {
    Route::get("/setting/video/", "VideoSettingController@index");
    Route::post("/setting/video/save", "VideoSettingController@save");

    //主播推流源测试
    Route::get("/setting/anchor/channels", "AnchorChannelsSettingController@channels");
    Route::post("/setting/anchor/channels/save", "AnchorChannelsSettingController@save");

});

Route::group(["namespace" => "Stream"], function () {
    Route::get("/crontab/stream/9158/", "CrontabStreamController@get9158Rooms");
    Route::get("/crontab/stream/9158/test/", "CrontabStreamController@test9158Rooms");

    Route::get("/crontab/stream/changba/", "CrontabStreamController@getChangbaRooms");
    Route::get("/crontab/stream/changba/test/", "CrontabStreamController@testChangbaRooms");

//    Route::get("/crontab/stream/chushou/", "CrontabStreamController@getChushouRooms");
    Route::get("/crontab/stream/chushou/{room}", "CrontabStreamController@chushou");

    Route::get("/crontab/stream/hotsoon/", "CrontabStreamController@hotsoon");
    Route::get("/crontab/stream/qianfan/", "CrontabStreamController@qianfan");
    Route::get("/crontab/stream/weibo/", "CrontabStreamController@weibo");
    Route::get("/crontab/stream/inke/", "CrontabStreamController@inke");

    Route::get("/crontab/stream/test/", "CrontabStreamController@test");

    Route::get("/obs/stream/{name}", "OBSPushStreamController@index");
});

//定时任务
Route::get("/manager/check-ffmpeg", 'CrontabController@checkFFMPEG');

//测试用的接口
Route::get("/test/channels", 'TestController@onTest');

Route::get("/home/info", 'TestController@homeInfo');
Route::get("/speak", 'TestController@speak');