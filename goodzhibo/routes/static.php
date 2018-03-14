<?php
/*
|--------------------------------------------------------------------------
| STATIC Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([],function (){
    Route::get('/result/to_html',"ResultHtmlController@staticHtml");//结果列表静态化html
    Route::get('/schedule/to_html',"ScheduleHtmlController@staticHtml");//赛程列表静态化html

    Route::get('/football/detail/{date}/{id}',"FootballDetailController@flushPcDetailAllCache");//静态化PC足球终端
    Route::get('/football/detail/wap/{date}/{id}',"FootballDetailController@flushWapDetailAllCache");//静态化WAP足球终端

    Route::get('/football/events/by_date', 'FootballEventsController@eventToHtmlByDate');//足球事件静态化
    Route::get('/football/events/{date}/{id}', 'FootballEventsController@eventToHtml');//足球事件静态化

    Route::get('/football/detail/wap_html', 'ResultHtmlController@wapDetailToHtml');//手机足球终端页面静态化
    Route::get('/football/detail/pc_html', 'ResultHtmlController@pcDetailToHtml');//电脑足球终端页面静态化

    Route::get('/basketball/wap/detail/{date}/{id}', 'BasketballController@staticWapDetail');//篮球wap端静态化
});

/**
 * 静态化 社区相关接口
 */
Route::group([], function () {
    Route::get('/community/topic-detail/{id}',"CommunityController@staticTopicDetail");//帖子终端 静态化json
    Route::get('/community/account-info/{id}',"CommunityController@staticAccountInfo");//用户信息 静态化json

});