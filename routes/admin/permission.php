<?php

use GuzzleHttp\Middleware;

Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'permission'], function () {
        Route::get('',[
            'as' => 'permission.index',
            'uses' => 'permissionController@index',
            'Middleware' => 'can:permission_list'
        ]);
        Route::get('create',[
            'as' => 'permission.create',
            'uses' => 'permissionController@create',
            'Middleware' => 'can:permission_add'
        ]);
        Route::post('',[
            'as' => 'permission.store',
            'uses' => 'permissionController@store'
        ]);
        Route::get('{permission}/edit',[
            'as' => 'permission.edit',
            'uses' => 'permissionController@edit',
            'Middleware' => 'can:permission_edit'
        ]);
        Route::put('{permission}',[
            'as' => 'permission.update',
            'uses' => 'permissionController@update'
        ]);
        Route::delete('{permission}',[
            'as' => 'permission.destroy',
            'uses' => 'permissionController@destroy',
            'Middleware' => 'can:permission_delete'
        ]);
    });
});


