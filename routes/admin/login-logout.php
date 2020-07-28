<?php
Route::group(['prefix' => 'admin'], function () {
    Route::get('login',[
        'as' => 'get.admin.login',
        'uses' => 'AuthController@getLogin'
    ]);
    Route::post('login',[
        'as' => 'post.admin.login',
        'uses' => 'AuthController@postLogin'
    ]);
    Route::get('logout',[
        'as' => 'get.admin.logout',
        'uses' => 'AuthController@getlogout'
    ]);
});

