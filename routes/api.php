<?php

Route::group(['namespace' => 'Auth'], function () {
	Route::group(['middleware' => 'guest:api'], function () {
		Route::post('auth/login', 'AuthController@login');
		Route::post('auth/register', 'RegisterController@register');
	});

	Route::post('auth/refresh', 'AuthController@refresh');
	Route::get('auth/user', 'AuthController@user');
	Route::post('auth/logout', 'AuthController@logout');
});