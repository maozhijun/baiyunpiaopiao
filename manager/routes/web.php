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

Route::match(["get", "post"], "/login", 'AuthController@index');//登录
Route::match(["get", "post"], "/register", 'AuthController@register');//注册

Route::get("/", 'AuthController@host')->middleware('auth'); //首页
//Route::get("/", 'AuthController@host'); //首页

Route::group(["middleware" => "auth"], function () {
    /*组*/
    Route::get("/{roleStr}/groups", 'ManagerController@groups'); //组列表
    Route::post("/{roleStr}/group/create", 'ManagerController@groupCreate'); //创建组
    Route::post("/{roleStr}/group/edit", 'ManagerController@groupEdit'); //编辑组
    Route::post("/{roleStr}/group/delete", 'ManagerController@groupDelete'); //删除组

    /*成员*/
    Route::get("/{roleStr}/members", 'ManagerController@members'); //组成员列表
    Route::match(["get", "post"], "/{roleStr}/member/create", 'ManagerController@memberCreate'); //创建组成员
    Route::post("/{roleStr}/member/edit", 'ManagerController@memberEdit'); //编辑组成员
    Route::post("/{roleStr}/member/delete", 'ManagerController@memberDelete'); //删除组成员

    /*客户*/
    Route::get("/{roleStr}/customers", 'ManagerController@customers'); //客户列表
    Route::match(["get", "post"], "/{roleStr}/customer/create", 'ManagerController@customerCreate'); //创建客户
    Route::post("/{roleStr}/customer/edit", 'ManagerController@customerEdit'); //编辑客户
    Route::post("/{roleStr}/customer/delete", 'ManagerController@customerDelete'); //删除客户

    Route::get("/{roleStr}", 'ManagerController@index')->middleware('auth'); //管理员自己的首页
});