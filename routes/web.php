<?php

// auth routes
Auth::routes(['verify' => true]);

// home
Route::get('/', 'Site\HomeController')->name('home.index');

// shop
Route::get('shop', 'Site\ShopController@index')->name('shop.index');
Route::get('shop/{product}', 'Site\ShopController@show')->name('shop.show');

Route::group(['middleware' => 'auth'], function () {
	// cart
	Route::get('cart', 'Site\CartController@index')->name('cart.index');
	Route::post('cart/{product}', 'Site\CartController@store')->name('cart.store');
	Route::patch('cart/{product}', 'Site\CartController@update')->name('cart.update');
	Route::delete('cart/{product}', 'Site\CartController@destroy')->name('cart.destroy');
	Route::delete('cart', 'Site\CartController@clearCart')->name('cart.clearCart');
	Route::post('cart/switchToSaveForLater/{product}', 'Site\CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');
	Route::delete('saveForLater/{product}', 'Site\SaveForLaterController@destroy')->name('saveForLater.destroy');
	Route::post('saveForLater/switchToCart/{product}', 'Site\SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

	// coupons
	Route::post('coupon', 'Site\CouponController@store')->name('coupon.store');
	Route::delete('coupon', 'Site\CouponController@destroy')->name('coupon.destroy');

	// profile
	Route::get('profile/edit', 'Site\UserController@edit')->name('user.edit');
	Route::patch('profile/update', 'Site\UserController@update')->name('user.update');

	// orders 
	Route::get('orders', 'Site\OrderController@index')->name('order.index');
	Route::get('orders/{order}', 'Site\OrderController@show')->name('order.show');
	
	// checkout
	Route::get('checkout', 'Site\CheckoutController@index')->name('checkout.index');
	Route::post('checkout/order', 'Site\CheckoutController@store')->name('checkout.store');

	// Order Confirmation
	Route::get('checkout/order/confirmation', 'Site\ConfirmationController')->name('checkout.order-confirmation');
});