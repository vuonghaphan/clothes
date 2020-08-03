<?php

use GuzzleHttp\Middleware;

Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'member'], function () {

        Route::get('',[
            'as' => 'member.index',
            'uses' => 'MemberController@index',
            'Middleware' => 'can:member_list'
        ]);
        Route::get('create',[
            'as' => 'member.create',
            'uses' => 'MemberController@create',
            'Middleware' => 'can:member_add'
        ]);
        Route::post('',[
            'as' => 'member.store',
            'uses' => 'MemberController@store'
        ]);
        Route::get('{member}/edit',[
            'as' => 'member.edit',
            'uses' => 'MemberController@edit',
            'Middleware' => 'can:member_edit'
        ]);
        Route::put('{member}',[
            'as' => 'member.update',
            'uses' => 'MemberController@update'
        ]);
        Route::delete('{member}',[
            'as' => 'member.destroy',
            'uses' => 'MemberController@destroy',
            'Middleware' => 'can:member_delete'
        ]);
    });
})


?>
