<?php

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('pages.home');

Route::get('shop', 'ShopController@index')->name('shop.index');
Route::get('shop/{product}', 'ShopController@show')->name('shop.show');

Route::group(['middleware' => 'auth'], function () {
	// cart
	Route::get('cart', 'CartController@index')->name('cart.index');
	Route::post('cart/{product}', 'CartController@store')->name('cart.store');
	Route::patch('cart/{product}', 'CartController@update')->name('cart.update');
	Route::delete('cart/{product}', 'CartController@destroy')->name('cart.destroy');

	// coupons
	Route::post('/coupon', 'CouponController@store')->name('coupon.store');
	Route::delete('/coupon', 'CouponController@destroy')->name('coupon.destroy');

	// profile
	Route::get('settings', 'SettingsController@index')->name('settings.index');
	Route::put('settings/{user}', 'SettingsController@update')->name('settings.update');
	
	// checkout
	Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
	Route::post('checkout', 'CheckoutController@store')->name('checkout.store');
});
