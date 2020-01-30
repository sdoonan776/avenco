<?php

Route::group(['namespace' => 'Auth'], function () {
	Route::get('login', 'AuthController@login');
	Route::get('register', 'RegisterController@register');

	Route::get('refresh', 'AuthController@refresh');
	Route::get('user', 'AuthController@user');
	Route::get('logout', 'AuthController@logout');
});