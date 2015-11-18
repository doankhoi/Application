<?php

Route::group(['prefix' => 'login', 'as' => 'login'], function () {
	Route::get('/', ['uses' => 'AuthController@getLogin']);
	Route::post('/', ['uses' => 'AuthController@postLogin']);
});