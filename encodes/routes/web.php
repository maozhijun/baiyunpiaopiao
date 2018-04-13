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
Route::get("/manager/list/", "EncodesController@index");

Route::group(["middleware" => "auth", "namespace" => "Push"], function () {
    if (env('APP_NAME') == 'good') {
        Route::get("/manager/", "HeiEncodesController@index");
        Route::get("/manager/hei/", "HeiEncodesController@index");
        Route::post("/manager/hei/created/", "HeiEncodesController@created");
        Route::get("/manager/hei/stop/{id}", "HeiEncodesController@stop");
        Route::get("/manager/hei/ali-live-room", "HeiEncodesController@createdAliRoom");
    } elseif (env('APP_NAME') == 'aikq') {
        Route::get("/manager/", "QQEncodesController@index");
        Route::get("/manager/qq/", "QQEncodesController@index");
        Route::post("/manager/qq/created/", "QQEncodesController@created");
        Route::get("/manager/qq/stop/{id}", "QQEncodesController@stop");
        Route::get("/manager/ali-live-room", "QQEncodesController@createdAliRoom");
    } else {
        Route::get("/manager/", "OtherEncodesController@index");
    }

    Route::get("/manager/other/", "OtherEncodesController@index");
    Route::post("/manager/other/created/", "OtherEncodesController@created");
    Route::get("/manager/other/stop/{id}", "OtherEncodesController@stop");

    Route::get("/manager/zhibo/", "ZhiboEncodesController@index");
    Route::post("/manager/zhibo/created/", "ZhiboEncodesController@created");
    Route::get("/manager/zhibo/stop/{id}", "ZhiboEncodesController@stop");

    Route::get("/manager/very/", "VeryEncodesController@index");
    Route::post("/manager/very/created/", "VeryEncodesController@created");
    Route::get("/manager/very/stop/{id}", "VeryEncodesController@stop");

    Route::get("/manager/weibo/", "WeiboEncodesController@index");
    Route::post("/manager/weibo/created/", "WeiboEncodesController@created");
    Route::get("/manager/weibo/stop/{id}", "WeiboEncodesController@stop");

    Route::get("/manager/kuku/", "KukuEncodesController@index");
    Route::post("/manager/kuku/created/", "KukuEncodesController@created");
    Route::get("/manager/kuku/stop/{id}", "KukuEncodesController@stop");

    Route::get("/manager/longzhu/", "LongzhuEncodesController@index");
    Route::post("/manager/longzhu/created/", "LongzhuEncodesController@created");
    Route::get("/manager/longzhu/stop/{id}", "LongzhuEncodesController@stop");
    Route::get("/manager/longzhu/test", "LongzhuEncodesController@test");

    Route::get("/manager/quanmin/", "QuanminEncodesController@index");
    Route::post("/manager/quanmin/created/", "QuanminEncodesController@created");
    Route::get("/manager/quanmin/stop/{id}", "QuanminEncodesController@stop");

    Route::get("/manager/qie/", "QieEncodesController@index");
    Route::post("/manager/qie/created/", "QieEncodesController@created");
    Route::get("/manager/qie/stop/{id}", "QieEncodesController@stop");
    Route::get("/manager/qie/stopQie/{id}", "QieEncodesController@stopQie");
    Route::get("/manager/qie/test", "QieEncodesController@test");

});

Route::group(["middleware" => "auth", "namespace" => "Pull"], function () {
    Route::get("/resources/", "KBallEncodesController@index");

    Route::get("/resources/kball/", "KBallEncodesController@index");

    Route::get("/resources/leisu/", "LeisuEncodesController@index");
    Route::get("/resources/leisu/get_live_url/{id}", "LeisuEncodesController@getLiveUrl");

    Route::get("/resources/ssports/", "SSportsEncodesController@index");
    Route::get("/resources/ssports/get_live_url/{id}", "SSportsEncodesController@getLiveUrl");

    Route::get("/resources/longzhu/", "LongzhuEncodesController@index");
    Route::get("/resources/longzhu/get_live_url/{id}", "LongzhuEncodesController@getLiveUrl");

    Route::get("/resources/cntv/", "CNTVEncodesController@index");
    Route::get("/resources/cntv/get_live_url/{id}", "CNTVEncodesController@getLiveUrl");

    Route::get("/resources/baitv/", "BaiTVEncodesController@index");
    Route::get("/resources/baitv/get_live_url/{id}", "BaiTVEncodesController@getLiveUrl");

    Route::get("/resources/cctv5/", "CCTV5EncodesController@index");
    Route::get("/resources/cctv5/get_live_url/{id}", "CCTV5EncodesController@getLiveUrl");

    Route::get("/resources/sportlive/", "SportLiveEncodesController@index");
    Route::get("/resources/sportlive/get_live_url/{id}", "SportLiveEncodesController@getLiveUrl");
});

//定时任务
Route::get("/manager/check-ffmpeg", 'CrontabController@checkFFMPEG');