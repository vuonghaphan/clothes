<?php
Route::group(['prefix' => 'gio-hang'], function() {
    Route::get('','CartController@getList')->name('list.cart');
    Route::get('add/{id}','CartController@addCart')->name('add.cart');
    Route::delete('/{id}','CartController@delCart')->name('del.cart');
    Route::get('update','CartController@updateCart')->name('update.cart');
    Route::get('thanh-toan','CartController@checkout')->middleware('CheckLoginWeb')->name('checkout.cart');
    Route::post('thanh-toan','CartController@saveOrder')->middleware('CheckLoginWeb')->name('saveOrder.cart');
    Route::get('thanh-cong','CartController@complete')->middleware('CheckLoginWeb')->name('complete.cart');
});
