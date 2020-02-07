<?php

Route::get('/', 'HomeController@index')->name('pages.home');
Route::get('about', 'PagesController@about')->name('pages.about');
Route::get('contact', 'PagesController@contact')->name('pages.contact');


Route::group(['namespace' => 'Resources'], function () {
	Route::get('products', 'ProductController@index')->name('product.index');
	Route::get('products/{$category}', 'CategoryController@index')->name('products.category');
	Route::get('product/{$category}/{$id}', 'ProductController@show')->name('product.category.show');
	Route::get('product/{$id}', 'ProductController@show')->name('product.show');
}); 

Route::group(['namespace' => 'Auth'], function () {
	Route::get('login', 'AuthController@index')->name('login');
	Route::get('register', 'RegisterController@index')->name('register');
});

Route::middleware(['auth:api', 'verify'],)->group(function () {
	Route::get('settings', 'SettingsController@index')->name('settings.index');
	Route::get('cart', 'CartController@index')->name('cart.index');
	Route::get('checkout', 'PagesController@checkout')->name('pages.checkout');
});
