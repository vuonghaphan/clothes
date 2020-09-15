<?php
Route::get('dang-nhap','AuthController@getLogin')->name('get.login');
Route::post('dang-nhap', 'AuthController@postLogin')->name('post.login');

Route::get('dang-ky','AuthController@getRegister')->name('get.register');
Route::post('dang-ky', 'AuthController@postRegister')->name('post.register');
?>
