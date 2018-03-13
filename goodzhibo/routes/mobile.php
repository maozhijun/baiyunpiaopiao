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
    Route::get('/',"HomeController@immediate");
    Route::get('/index.html',"HomeController@immediate");
    Route::get('/football/immediate.html',"HomeController@immediate");
    Route::get('/football/result.html',"HomeController@result");
    Route::get('/football/schedule.html',"HomeController@schedule");
    Route::get('/football/lives.html',"HomeController@lives");
    Route::get('/football/detail/{id}.html',"HomeController@footballDetail");

    Route::get('/football/detail/odd/{date}/{id}.html', 'HomeController@footballOdd');
    Route::get('/football/detail/corner/{date}/{id}.html', 'HomeController@footballDetailCorner');
    Route::get('/football/detail/style/{date}/{id}.html', 'HomeController@footballDetailStyle');
    Route::get('/football/detail/odd_index/{date}/{id}.html', 'HomeController@footballOddIndex');
    Route::get('/football/detail/same_odd/{date}/{id}.html', 'HomeController@footballSameOdd');

    /////////////////======================================================================/////////////////
    Route::get('/basketball/immediate.html', 'BasketBallController@immediate');//篮球即时页面列表
    Route::get('/basketball/result.html', 'BasketBallController@result');//篮球赛果页面列表
    Route::get('/basketball/schedule.html', 'BasketBallController@schedule');//篮球赛程页面列表
    Route::get('/basketball/lives.html', 'BasketBallController@lives');//篮球直播页面列表

    Route::get('/lives/cache/details', 'LiveController@liveDetailsStatic');//直播终端静态化

    Route::get('/basketball/detail/{id}.html',"BasketBallController@basketballDetail");//篮球终端页面

    /////////////////======================================================================/////////////////
    //Route::get('/', 'Live\LiveController@lives');
    //Route::get('/index.html', 'LiveController@lives');
});

/**
 * 足球WAP终端页面相关
 */
Route::group(["namespace" => 'Detail'], function () {
    Route::get('/football/detail/{index1}/{index2}/{id}/wap{tab}.html', 'DetailController@detailCell');

    Route::get('/football/detail/team_cell/{date}/{id}.html', 'DetailController@teamCell');
    Route::get('/football/detail/analyse_cell/{date}/{id}.html', 'DetailController@analyseCell');
    Route::get('/football/detail/base_cell/{date}/{id}.html', 'DetailController@baseCell');
});

/**
 * 篮球WAP终端页面相关
 */
Route::group(["namespace" => 'Detail'], function () {

    Route::get("/basketball/detail/tab/{index1}/{index2}/{id}/wap{tab}.html", "BasketballDetailController@detailCell");
});


/**
 * 直播入口
 */
Route::group(["namespace" => 'Live'], function () {
    //Route::any("/", function (){
        //return redirect('/m/lives.html');
    //});
    Route::get("/lives.html", "LiveController@lives");//直播列表
    Route::get("/football.html", "LiveController@footballLives");//直播列表
    Route::get("/basketball.html", "LiveController@basketballLives");//直播列表

    Route::get("/live/football/{id}.html", "LiveController@footballdetail");//直播终端
    Route::get("/live/basketball/{id}.html", "LiveController@basketballDetail");//直播终端

    Route::get("/lives/data/refresh.json", "LiveController@match_live");//比赛比分数据
    Route::get("/static/detail/{mid}-{sport}.html", 'LiveController@liveDetailStatic');//静态化单个移动终端页
});

//app相关
Route::group(["namespace" => 'Match'], function () {
    Route::get("/app/matches/{sport}/{type}", "MatchesController@index");
    Route::get("/app/match/{sport}/detail", "MatchDetailController@index");

    //足球比赛详情
    Route::get("/football/detail/tab/{index1}/{index2}/{id}/app{tab}.html", "MatchDetailController@footballDetailTab");

    //篮球比赛详情
    Route::get("/basketball/detail/tab/{index1}/{index2}/{id}/app{tab}.html", "MatchDetailController@basketballDetailTab");
});