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

Route::match(["get", "post"], "/login", 'AuthController@login');//登录

/**
 * Vip工具
 */
Route::group(["middleware" => "auth"], function () {
    Route::get("/encodes/qq/", "QQEncodesController@index");
    Route::post("/encodes/qq/created/", "QQEncodesController@created");
    Route::get("/encodes/qq/stop/{id}", "QQEncodesController@stop");
    Route::get("/encodes/", "EncodesController@index");
});