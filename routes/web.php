<?php

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('pages.home');
Route::get('about', 'PagesController@about')->name('pages.about');
Route::get('contact', 'PagesController@contact')->name('pages.contact');

Route::resource('products', 'ProductController')->only('index', 'show');
Route::resource('categories', 'CategoryController')->only('index');

// Route::get('product/{$category}/{$id}', 'ProductController@show')->name('product.category.show');

Route::middleware(['auth:api', 'verify'],)->group(function () {
	Route::get('settings', 'SettingsController@index')->name('settings.index');
	Route::group(['namespace' => 'User'], function () {
		Route::get('cart', 'CartController@index')->name('cart.index');
	});
	Route::get('checkout', 'PagesController@checkout')->name('pages.checkout');
});
