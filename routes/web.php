<?php

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('pages.home');
Route::get('contact', 'PagesController@contact')->name('pages.contact');

Route::get('shop', 'ShopController@index')->name('shop.index');
Route::get('shop/{slug}', 'ShopController@show')->name('shop.show');

// Route::resource('categories', 'CategoryController')->only('index');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('cart', 'CartController')->except(['edit', 'create']);
	Route::get('settings', 'SettingsController@index')->name('settings.index');
	Route::get('checkout', 'CartController@checkout')->name('cart.checkout');
});
