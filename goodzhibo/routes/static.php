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

    Route::get('/test', 'ResultHtmlController@test');

});
