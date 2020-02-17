<?php

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('pages.home');

Route::get('shop', 'ShopController@index')->name('shop.index');
Route::get('shop/{product}', 'ShopController@show')->name('shop.show');

Route::group(['middleware' => 'auth'], function () {
	Route::get('cart', 'CartController@index')->name('cart.index');
	Route::post('cart/{product}', 'CartController@store')->name('cart.store');
	Route::patch('cart/{product}', 'CartController@update')->name('cart.update');
	Route::delete('cart/{product}', 'CartController@destroy')->name('cart.destroy');

	Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
	Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

	Route::get('settings', 'SettingsController@index')->name('settings.index');
	Route::get('checkout', 'CartController@checkout')->name('cart.checkout');
});
