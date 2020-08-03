<?php

use GuzzleHttp\Middleware;

Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'category'], function () {

        Route::get('',[
            'as' => 'category.index',
            'uses' => 'CategoryController@index',
            'Middleware' => 'can:category_list'
        ]);
        Route::get('create',[
            'as' => 'category.Create',
            'uses' => 'CategoryController@create',
            'Middleware' => 'can:category_add'

        ]);
        Route::post('',[
            'as' => 'category.store',
            'uses' => 'CategoryController@store'
        ]);
        Route::get('{category}/edit',[
            'as' => 'category.edit',
            'uses' => 'CategoryController@edit',
            'Middleware' => 'can:category_update'
        ]);
        Route::put('{category}',[
            'as' => 'category.update',
            'uses' => 'CategoryController@update'
        ]);
        Route::delete('{category}',[
            'as' => 'category.destroy',
            'uses' => 'CategoryController@destroy',
            'Middleware' => 'can:category_delete'
        ]);
    });
});

?>
