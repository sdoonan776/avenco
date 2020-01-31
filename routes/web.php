<?php

Route::get('/', 'HomeController@index')->name('pages.home');
Route::get('/product/{$id}', 'ProductController@show')->name('show.product');

Route::group(['namespace' => 'Auth'], function () {
	Route::get('login', 'AuthController@index')->name('auth.login');
	Route::get('register', 'RegisterController@index')->name('auth.register');
});
