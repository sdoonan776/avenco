<?php

Route::get('/', 'Admin\AdminController@index')->name('index');

Route::resource('/users', 'Admin\UserController');
Route::resource('/products', 'Admin\ProductController');
Route::resource('/orders', 'Admin\OrderController');
Route::resource('/categories', 'Admin\CategoryController');
Route::resource('/coupons', 'Admin\CouponController');



