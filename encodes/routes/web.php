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

Route::group(["middleware" => "auth"], function () {
    Route::get("/manager/", "QQEncodesController@index");

    Route::get("/manager/qq/", "QQEncodesController@index");
    Route::post("/manager/qq/created/", "QQEncodesController@created");
    Route::get("/manager/qq/stop/{id}", "QQEncodesController@stop");
    Route::get("/manager/ali-live-room", "QQEncodesController@createdAliRoom");

    Route::get("/manager/hei/", "HeiEncodesController@index");
    Route::post("/manager/hei/created/", "HeiEncodesController@created");
    Route::get("/manager/hei/stop/{id}", "HeiEncodesController@stop");
    Route::get("/manager/hei/ali-live-room", "HeiEncodesController@createdAliRoom");

    Route::get("/manager/other/", "OtherEncodesController@index");
    Route::post("/manager/other/created/", "OtherEncodesController@created");
    Route::get("/manager/other/stop/{id}", "OtherEncodesController@stop");

    Route::get("/manager/list/", "EncodesController@index");

    Route::get("/manager/qie/", "QieEncodesController@index");
    Route::post("/manager/qie/created/", "QieEncodesController@created");
    Route::get("/manager/qie/stop/{id}", "QieEncodesController@stop");
    Route::get("/manager/qie/stopQie/{id}", "QieEncodesController@stopQie");

    Route::get("/manager/qie/test", "QieEncodesController@test");
});

//定时任务
Route::get("/manager/check-ffmpeg", 'CrontabController@checkFFMPEG');