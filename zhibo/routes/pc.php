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

Route::group(["namespace" => 'Live'], function () {
//    Route::get('/download.html',"LiveController@download");//下载页面
//    Route::get('/lives.html',"LiveController@lives");//直播页面
});

//直播相关
Route::group(["namespace" => 'Live'], function () {
    Route::any("/", function (){
        return redirect('/index.html');
    });
    Route::get('/index.html',"LiveController@lives");//首页
//    Route::get('/betting.html',"LiveController@betLives");//竞彩
//    Route::get('/football.html',"LiveController@footballLives");//足球
//    Route::get('/basketball.html',"LiveController@basketballLives");//篮球

    Route::get('/live/football/{mid}.html',"LiveController@detail");//足球直播页
    Route::get('/live/basketball/{mid}.html',"LiveController@basketDetail");//篮球直播页

    Route::get('/live/player.html',"LiveController@player");//播放器
    Route::get('/live/match_channel.html',"LiveController@matchPlayerChannel");//比赛播放器

    //channel通用
    Route::get("/match/live/url/channel/mobile/{id}.json", 'LiveController@getLiveUrl');
    Route::get("/match/live/url/channel/{id}.json", 'LiveController@getLiveUrl');
    Route::get("/match/live/url/channel/{id}", 'LiveController@getLiveUrl');

    //播放失败
    Route::any('/live/url_error',"LiveController@liveError");

    //静态化
    Route::get('/live/player-json/{id}', 'LiveController@staticLiveUrl');//单个json线路接口静态化
    Route::get('/live/flush/pc-detail/{id}-{sport}.html', 'LiveController@staticPcDetail');//单个pc终端静态化
    Route::get('/live/static/player', 'LiveController@staticPlayer');//
    //------------------------------------------------------------------------------------------------------//
    Route::get('/live/flush_cache/detail', 'LiveController@flushDetailAndJsonCache');//动态刷新终端页、接口文件。
});

//邀请注册
Route::group(["namespace" => 'Live'],function (){
   //Route::get('/invitation/{code}',"HomeController@invitation");
    Route::post('/live/valid/code', 'LiveController@validCode');//验证高清验证码
});
