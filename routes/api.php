<?php

Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
	Route::group(['middleware' => 'guest:api'], function () {
		Route::post('login', 'AuthController@login')->name('api.login');
		Route::post('register', 'RegisterController@register')->name('api.register');
	});

	Route::get('user', 'AuthController@user');
	Route::post('logout', 'AuthController@logout')->name('api.logout');
});