<?php

// home
Route::get('/', 'HomeController')->name('home.index');

// shop
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
	Route::post('coupon/store', 'CouponController@store')->name('coupon.store');
	Route::delete('coupon/destory', 'CouponController@destroy')->name('coupon.destroy');

	// profile
	Route::get('profile', 'UserController@edit')->name('user.edit');
	Route::patch('profile', 'UserController@update')->name('user.update');

	// orders 
	Route::get('orders', 'OrderController@index')->name('order.index');
	Route::get('orders/{order}', 'OrderController@show')->name('order.show');
	
	// checkout
	Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
	Route::post('checkout/order', 'CheckoutController@store')->name('checkout.store');
	Route::get('checkout/order/confirmation', 'CheckoutController@confirmation')->name('checkout.order-confirmation');
});

// Authentication Routes...
Route::group(['middleware' => 'guest'], function () {
	// auth
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'Auth\RegisterController@register');

	// reset password
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
});

// logout
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function() {
	
	// verify email
	Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
	Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify')->middleware(['signed', 'throttle:6,1']);
	Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend')->middleware('throttle:6,1');

	// confirm password
	Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
	Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
});
