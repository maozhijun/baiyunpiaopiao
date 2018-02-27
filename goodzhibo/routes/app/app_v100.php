<?php

Route::group([], function () {
    //资讯首页
    Route::get("app/topic/home", 'GoodsTopicController@homeIndex');
    //资讯分类信息
    Route::get('app/topic/types', 'GoodsTopicController@topicTypes');
    //资讯分类列表
    Route::get('app/topic/list', 'GoodsTopicController@topicTypeList');
    //资讯终端
    Route::get('app/topic/detail', 'GoodsTopicController@topicDetailV140');
    //资讯终端其他推荐阅读
    Route::get('app/topic/detailOthers', 'GoodsTopicController@topicDetailOthersV140');

    //发现频道
    Route::get('app/discover/list', 'DiscoverController@appLinks');
    //资讯根据id获取(我关注的资讯用)
    Route::get('app/topic/getMerchantTopicByIds', 'GoodsTopicController@getMerchantTopicByIdsV140');

    //发送验证码
    Route::post('app/user/sendVerifyCode', 'AuthController@sendVerifyCode');
    //注册
    Route::post('app/user/register', 'AuthController@register');
    //修改密码
    Route::post('app/user/forget_password', 'AuthController@forget');
    //登录
    Route::post('app/user/login', 'AuthController@login');
    //获取用户信息
    Route::get("/app/user/info", 'AuthController@getInfo');
});

//config
Route::group([], function () {
    Route::post("/app/config/device", 'ConfigController@device');
    Route::get("/app/config/check", 'ConfigController@check');
});