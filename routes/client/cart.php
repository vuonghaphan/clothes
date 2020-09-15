<?php
Route::group(['prefix' => 'gio-hang'], function() {
//    Route::get('','CartController@getList')->name('list.cart');
    Route::get('add/{id}','CartController@addCart')->name('add.cart');
});
