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
    Route::get('/result/to_html',"ResultHtmlController@staticHtml");
    Route::get('/schedule/to_html',"ScheduleHtmlController@staticHtml");
    Route::get('/football/detail/to_html',"FootballDetailController@staticHtml");
});
