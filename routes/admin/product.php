<?php

use GuzzleHttp\Middleware;

Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'product'], function () {

        Route::get('',[
            'as' => 'product.index',
            'uses' => 'ProductController@index',
            'Middleware' => 'can:product_list'
        ]);
        Route::get('create',[
            'as' => 'product.create',
            'uses' => 'ProductController@create',
            'Middleware' => 'can:product_add'
        ]);
         Route::post('',[
             'as' => 'product.store',
             'uses' => 'ProductController@store'

         ]);
        Route::get('{product}/edit',[
            'as' => 'product.edit',
            'uses' => 'ProductController@edit',
            'Middleware' => 'can:product_edit'
        ]);
        Route::put('{product}',[
            'as' => 'product.update',
            'uses' => 'ProductController@update'
        ]);
        Route::delete('{product}',[
            'as' => 'product.destroy',
            'uses' => 'ProductController@destroy',
            'Middleware' => 'can:product_delete'
        ]);
        Route::get('image/{product}',[
            'as' => 'product.image',
            'uses' => 'ProductController@imageProduct',
//            'Middleware' => 'can:product_list'
        ]);
        Route::get('add-image',[
            'as' => 'product.create.image',
            'uses' => 'ProductController@createImageProduct',
//            'Middleware' => 'can:product_list'
        ]);
        Route::post('image',[
            'as' => 'product.add.image',
            'uses' => 'ProductController@uploadImageProduct',
//            'Middleware' => 'can:product_list'
        ]);
        Route::get('delImage/{id}',[
            'as' => 'product.delete.image',
            'uses' => 'ProductController@delImage'
        ]);
    });
})

?>
