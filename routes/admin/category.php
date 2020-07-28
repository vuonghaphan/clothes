<?php
Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'category'], function () {

        Route::get('',[
            'as' => 'category.index',
            'uses' => 'CategoryController@index'
        ]);
        Route::get('create',[
            'as' => 'category.Create',
            'uses' => 'CategoryController@create'
        ]);
        Route::post('',[
            'as' => 'category.store',
            'uses' => 'CategoryController@store'
        ]);
        Route::get('{category}/edit',[
            'as' => 'category.edit',
            'uses' => 'CategoryController@edit'
        ]);
        Route::put('{category}',[
            'as' => 'category.update',
            'uses' => 'CategoryController@update'
        ]);
        Route::delete('{category}',[
            'as' => 'category.destroy',
            'uses' => 'CategoryController@destroy'
        ]);
    });
});

?>
