<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify']);

Route::get('/', 'HomeController')->name('home.index');

Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

Route::group(['middleware' => 'auth:web'], function () {
	
	Route::get('/cart', 'CartController@index')->name('cart.index');
	Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
	Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
	Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
	Route::delete('/cart', 'CartController@clearCart')->name('cart.clearCart');
	Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');
	Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
	Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

	Route::post('/coupon', 'CouponController@store')->name('coupon.store');
	Route::delete('/coupon', 'CouponController@destroy')->name('coupon.destroy');

	Route::get('/profile/edit', 'UserController@edit')->name('user.edit');
	Route::patch('/profile/update', 'UserController@update')->name('user.update');
 
	Route::get('/orders', 'OrderController@index')->name('order.index');
	Route::get('/orders/{order}', 'OrderController@show')->name('order.show');
	
	Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
	Route::post('/checkout/order', 'CheckoutController@store')->name('checkout.store');

	Route::get('/checkout/order/confirmation', 'ConfirmationController')->name('checkout.order-confirmation');
});