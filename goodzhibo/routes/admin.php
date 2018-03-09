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
    Route::get('/', 'AuthorController@sign');//登陆页面
    Route::get('/login.html', 'AuthorController@sign');//登陆页面
    Route::post('/login.html', 'AuthorController@sign');//登陆
    Route::get('/logout', 'AuthorController@logout');//退出登陆
});

Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('/links/list', 'LinkController@index');
    Route::post('/links/save', 'LinkController@saveLink');
    Route::get('/links/del', 'LinkController@delLink');

    //app发现tab
    Route::get('/discover/list', 'DiscoverController@index');
    Route::post('/discover/save', 'DiscoverController@saveLink');
    Route::get('/discover/del', 'DiscoverController@delLink');
});

/**
 * 社区相关
 */
Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('/comm/communities', 'Community\CommunityController@communities');//社区列表
    Route::post('/comm/communities/save', 'Community\CommunityController@saveCommunity');//新建/保存 社区
    Route::get('/comm/communities/change', 'Community\CommunityController@changeCommunity');//隐藏/删除 社区

});
