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

/**
 * Vip工具
 */
Route::group(["middleware" => "auth"], function () {
    Route::get("/manager/qq/", "QQEncodesController@index");
    Route::post("/manager/qq/created/", "QQEncodesController@created");
    Route::get("/manager/qq/stop/{id}", "QQEncodesController@stop");
    Route::get("/manager/", "QQEncodesController@index");

    Route::get("/manager/list/", "EncodesController@index");
});