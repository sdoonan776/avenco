<?php

Route::get('/', 'HomeController@index')->name('pages.home');

Route::resource('auth', 'AuthController')->only('index');
Route::get('auth/login', 'AuthController@login');

Route::resource('home', 'HomeController')->only('index');

Route::resource('settings', 'SettingsController')->only('index');

Route::resource('products', 'ProductsController')->only('index', 'show');
