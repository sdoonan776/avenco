<?php

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('pages.home');
Route::get('about', 'PagesController@about')->name('pages.about');
Route::get('contact', 'PagesController@contact')->name('pages.contact');

Route::resource('products', 'ProductController')->only('index', 'show');
Route::resource('categories', 'CategoryController')->only('index');

Route::group(['middleware' => 'auth:api'], function () {
	Route::get('settings', 'SettingsController@index')->name('settings.index');
	Route::group(['namespace' => 'User'], function () {
		Route::get('cart', 'CartController@index')->name('cart.index');
		Route::get('checkout', 'CartController@checkout')->name('cart.checkout');
	});
});
