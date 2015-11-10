
<?php

//Admin guest
Route::group(['middleware' => 'admin.guest'], function () {

	Route::get('/', ['as' => 'admin.users.index', 'uses' => 'UserController@index']);

	Route::group(['prefix' => 'create', 'as' => 'admin.users.create'], function () {
		Route::get('/', 'UserController@create');
		Route::post('/', 'UserController@store');
	});

	
	/** 
	* Page login
	*/
	Route::group(['prefix' => 'login', 'as' => 'login'], function () {
		Route::get('/', ['uses' => 'AuthController@getLogin']);
		Route::post('/', ['uses' => 'AuthController@postLogin']);
	});
});