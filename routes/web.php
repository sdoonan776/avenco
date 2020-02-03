<?php

Route::get('/', 'HomeController@index')->name('pages.home');

Route::group(['namespace' => 'Resources'], function () {
	Route::get('product/{id}', 'ProductController')->name('product.show');
}); 

Route::group(['namespace' => 'Auth'], function () {
	Route::get('login', 'AuthController@index')->name('auth.login');
	Route::get('register', 'RegisterController@index')->name('auth.register');
});
