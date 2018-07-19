<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["namespace" => "Api"], function () {
    Route::get("/v1/get_push_stream", "OBSPushStreamController@index");
    Route::get("/v1/get_push_stream/test", "OBSPushStreamController@test");
});


