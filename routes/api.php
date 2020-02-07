<?php

Route::post('/authenticate', 'Api\V1\Auth\AuthenticateController@authenticate')->name('authenticate');
