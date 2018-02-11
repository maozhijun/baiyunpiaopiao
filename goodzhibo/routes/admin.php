<?php
/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([], function (){
    Route::get('/', 'AuthorController@sign');
    Route::get('/login.html', 'AuthorController@sign');
    Route::post('/login.html', 'AuthorController@sign');
});

Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('/links/list', 'LinkController@index');
    Route::post('/links/save', 'LinkController@saveLink');
    Route::get('/links/del', 'LinkController@delLink');
});
