<?php
Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'permission'], function () {
        Route::get('',[
            'as' => 'permission.index',
            'uses' => 'permissionController@index'
        ]);
        Route::get('create',[
            'as' => 'permission.create',
            'uses' => 'permissionController@create'
        ]);
        Route::post('',[
            'as' => 'permission.store',
            'uses' => 'permissionController@store'
        ]);
        Route::get('{permission}/edit',[
            'as' => 'permission.edit',
            'uses' => 'permissionController@edit'
        ]);
        Route::put('{permission}',[
            'as' => 'permission.update',
            'uses' => 'permissionController@update'
        ]);
        Route::delete('{permission}',[
            'as' => 'permission.destroy',
            'uses' => 'permissionController@destroy'
        ]);
    });
});


