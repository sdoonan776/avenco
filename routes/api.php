<?php

Route::group(['namespace' => 'Auth'], function () {
	Route::group(['middleware' => 'guest:api'], function () {
		Route::post('auth/login', 'AuthController@login')->name('api.login');
		Route::post('auth/register', 'RegisterController@register')->name('api.register');
	});

	Route::get('auth/user', 'AuthController@user');
	Route::post('auth/logout', 'AuthController@logout')->name('api.logout');
});