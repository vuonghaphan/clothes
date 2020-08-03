<?php

use GuzzleHttp\Middleware;

Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'role'], function () {

        Route::get('',[
            'as' => 'role.index',
            'uses' => 'RoleController@index',
            'Middleware' => 'can:role_list'
        ]);
        Route::get('create',[
            'as' => 'role.create',
            'uses' => 'RoleController@create',
            'Middleware' => 'can:role_add'
        ]);
        Route::post('store',[
            'as' => 'role.store',
            'uses' => 'RoleController@store'
        ]);
        Route::get('{role}/edit',[
            'as' => 'role.edit',
            'uses' => 'RoleController@edit',
            'Middleware' => 'can:role_edit'
        ]);
        Route::put('{role}/update',[
            'as' => 'role.update',
            'uses' => 'RoleController@update'
        ]);
        Route::delete('/{role}',[
            'as' => 'role.destroy',
            'uses' => 'RoleController@destroy',
            'Middleware' => 'can:role_delete'
        ]);
    });
});


