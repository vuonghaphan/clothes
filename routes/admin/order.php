<?php
Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'order'], function () {
        Route::get('', [
            'as' => 'order.index',
            'uses' => 'OrderController@index',
        ]);
        Route::get('{id}', [
            'as' => 'show.order',
            'uses' => 'OrderController@show',
        ]);
        Route::put('cancel/{id}', [
            'as' => 'del.order',
            'uses' => 'OrderController@cancelOrder'
        ]);
        Route::delete('del/{id}', [
           'as' => 'del.order',
           'uses' => 'OrderController@destroy'
        ]);
    });
});

?>
