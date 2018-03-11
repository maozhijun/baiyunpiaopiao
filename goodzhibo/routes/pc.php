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
//====================================足球====================================//
Route::group(["namespace" => 'Index'], function () {
    Route::any("/football/immediate.html", 'FootballController@immediate');
    Route::any("/football/result.html", 'FootballController@result');
    Route::any("/football/schedule.html", 'FootballController@schedule');

    Route::any("/football/{date}/result.html", 'FootballController@result');
    Route::any("/football/{date}/schedule.html", 'FootballController@schedule');

    //足球终端相关 开始
    Route::get("/football/detail/{date}/{id}.html", "FootballController@detail");
    Route::get("/football/detail_cell/odd/{id}.html", "FootballController@footballOddCell");//数据分析 赔率指数
    Route::get("/football/detail_cell/corner/{date}/{id}.html", "FootballController@footballCornerCell");//角球数据
    Route::get("/football/detail_cell/chara/{date}/{id}.html", "FootballController@footballCharacteristicCell");//特色数据
    Route::get("/football/detail_cell/base/{date}/{id}.html", "FootballController@footballBaseCell");//比赛状况
    //足球终端相关 结束

    Route::get('/football/detail_odd/{id}.html', 'FootballController@footballOddIndex');//赔率列表
    /**Route::any("/", function (){
        return redirect('/index.html');
    });**/

    //////////////////===============================//////////////////
    /// 异步请求接口
    Route::any('/football/change/live.json', 'FootballController@liveJson');
    Route::any('/football/odd/roll.json', 'FootballController@oddRollJson');
    Route::any('/football/event/{date}/{id}.json', 'FootballController@eventHtml');//异步获取事件HTML

    Route::get('/football/has_live/{id}.json', 'FootballController@footballHasLive');//足球终端，请求判断该比赛是否有足球比赛。
    Route::get('/football/events/{id}.json', 'FootballController@footballEvents');//足球事件接口。
});

//====================================篮球====================================//
Route::group(["namespace" => 'Index'], function () {
    Route::any("/basketball/immediate.html", 'BasketballController@immediate');

    Route::any("/basketball/result.html", 'BasketballController@result');
    Route::any("/basketball/schedule.html", 'BasketballController@schedule');

    Route::any("/basketball/{date}/result.html", 'BasketballController@result');
    Route::any("/basketball/{date}/schedule.html", 'BasketballController@schedule');

    //////////////////===============================//////////////////
    /// 异步请求接口
    Route::any('/basketball/change/live.json', 'BasketballController@liveJson');
    Route::any('/basketball/odd/roll.json', 'BasketballController@oddRollJson');
});

Route::group(["namespace" => 'Live'], function () {
    Route::get('/download.html',"LiveController@download");//下载页面
    Route::get('/lives.html',"LiveController@lives");//直播页面
});

//直播相关
Route::group(["namespace" => 'Live'], function () {
    Route::any("/", function (){
        return redirect('/index.html');
    });
    Route::get('/index.html',"LiveController@lives");//首页
    Route::get('/betting.html',"LiveController@betLives");//竞彩
    Route::get('/football.html',"LiveController@footballLives");//足球
    Route::get('/basketball.html',"LiveController@basketballLives");//篮球

    Route::get('/live/football/{mid}.html',"LiveController@detail");//足球直播页
    Route::get('/live/basketball/{mid}.html',"LiveController@basketDetail");//篮球直播页

    Route::get('/live/player.html',"LiveController@player");//播放器

    Route::get('/live/match_player.html',"LiveController@matchPlayer");//比赛播放器
    Route::get('/live/match_channel.html',"LiveController@matchPlayerChannel");//比赛播放器

//    Route::get('/match/live-multi/{mid}.html',"LiveController@multiLive");//多屏直播页
//    Route::get('/match/live/match-video/{mid}', 'LiveController@multiLiveDiv');//多屏直播添加
//    Route::get('/match/live/basket-match-video/{mid}', 'LiveController@multiBasketLiveDiv');//篮球多屏直播添加
//    Route::get("/live/football/recommend/{mid}.html", "LiveController@getArticleOfFMid");//直播终端足球推荐
//    Route::get("/live/basketball/recommend/{mid}.html", "LiveController@getArticleOfBMid");//直播终端篮球推荐

    //正在直播
    //Route::get('/live/living_match',"LiveController@getLiveMatches");
    //天天直播
    //Route::get("/match/live/url/zb/{id}", 'LiveController@getTTZBLiveUrl');
    //无插件
    //Route::get("/match/live/url/wcj/{id}", 'LiveController@getWCJLiveUrl');

    //channel通用
    Route::get("/match/live/url/channel/mobile/{id}.json", 'LiveController@getLiveUrl');
    Route::get("/match/live/url/channel/{id}.json", 'LiveController@getLiveUrl');
    Route::get("/match/live/url/channel/{id}", 'LiveController@getLiveUrl');
    //match获取channel通用
    Route::get("/match/live/url/match/{id}", 'LiveController@getLiveUrlMatch');

    //分享
    Route::get("/player.html", 'LiveController@share');

    //Route::get("/cache/player/recommend/{mid}", 'LiveController@deleteStaticHtml');//推荐

    //播放失败
    Route::any('/live/url_error',"LiveController@liveError");

    //Route::get("/tv/{id}.html", 'VideoController@tvDetail');//热门频道终端
    //Route::get("/tv/channel/{id}", 'VideoController@tvChannel');//热门频道线路

    //Route::get('/video/player.html',"VideoController@player");//播放器

    //Route::get("/video/{id}.html", 'VideoController@videoDetail');//热门视频终端
    //Route::get("/video/channel/{id}", 'VideoController@videoChannel');//热门频道线路

    //Route::get('/live/ex-link/{id}', 'LiveController@exLink');//外链跳转

    //静态化
    Route::get('/live/player-json/{id}', 'LiveController@staticLiveUrl');//单个json线路接口静态化

    Route::get('/live/cache/live-json', 'LiveController@allLiveJsonStatic');//直播赛事接口静态化
    Route::get('/live/cache/match/detail', 'LiveController@staticLiveDetail');//静态化当前所有比赛的直播终端
    Route::get('/live/cache/player/json', 'LiveController@staticPlayerJson');//静态化所有当前正在比赛的线路
    Route::get('/live/cache/flush', 'LiveController@flushVideoCache');//刷新缓存文件

    //------------------------------------------------------------------------------------------------------//
    Route::get('/live/flush_cache/detail', 'LiveController@flushDetailAndJsonCache');//动态刷新终端页、接口文件。
});

//邀请注册
Route::group([],function (){
   //Route::get('/invitation/{code}',"HomeController@invitation");
});
