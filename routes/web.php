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
	
	Route::delete('cart', 'CartController@clearCart')->name('cart.clearCart');

	// coupons
	Route::post('coupon', 'CouponController@store')->name('coupon.store');
	Route::delete('coupon', 'CouponController@destroy')->name('coupon.destroy');

	// profile
	Route::get('profile', 'ProfileController@edit')->name('profile.edit');
	Route::patch('profile', 'ProfileController@update')->name('profile.update');

	// orders 
	Route::get('orders', 'OrdersController@index')->name('orders.index');
	Route::get('orders/{order}', 'OrdersController@show')->name('orders.show');
	
	// checkout
	Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
	Route::post('checkout', 'CheckoutController@store')->name('checkout.store');
});

