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
    Route::get('/football/detail/{date}/{id}.html',"HomeController@footballDetail");

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
    Route::get('/lives/cache/details', 'LiveController@liveDetailsStatic');//篮球直播页面列表

    /////////////////======================================================================/////////////////
    //Route::get('/', 'Live\LiveController@lives');
    //Route::get('/index.html', 'LiveController@lives');
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

//    Route::get('/lives/player.html', function () {return view('mobile.live.player');});
//    Route::get("/lives/roll/{time}/{id}.html", "LiveController@roll");//直播滚球
//    Route::get("/lives/data/{time}/{id}.html", "LiveController@match_data");//直播数据
//    Route::get("/lives/tip/{time}/{id}.html", "LiveController@matchTip");//直播提点数据
    Route::get("/lives/data/refresh.json", "LiveController@match_live");//比赛比分数据

//    Route::get("/live/football/recommend/{mid}", "LiveController@getArticleOfFMid");//直播终端足球推荐
//    Route::get("/live/basketball/recommend/{mid}", "LiveController@getArticleOfBMid");//直播终端篮球推荐

//    //天天直播
//    Route::get("/match/live/url/zb/{id}", 'LiveController@getTTZBLiveUrl');
//    //无插件
//    Route::get("/match/live/url/wcj/{id}", 'LiveController@getWCJLiveUrl');
//    //channel通用
//    Route::get("/match/live/url/channel/{id}.json", 'LiveController@getLiveUrl');
});

//app相关
Route::group(["namespace" => 'Match'], function () {
    Route::get("/app/matches/{sport}/{type}", "MatchesController@index");
    Route::get("/app/match/{sport}/detail", "MatchDetailController@index");

    //足球比赛详情
    Route::get("/app/football/tab/{tab}/{id}", "MatchDetailController@footballDetailTab");
});