<?php

Route::get('/', 'Admin\AdminController@index')->name('index');

Route::resource('/users', 'Admin\UserController');
Route::resource('/products', 'Admin\ProductController');
Route::resource('/orders', 'Admin\OrderController')->except(['create', 'store']);
Route::resource('/categories', 'Admin\CategoryController');
Route::resource('/coupons', 'Admin\CouponController');

Route::post('/products/{id}/edit/image', 'Admin\ProductController@uploadImage')->name('products.edit.imageUpload'); 

