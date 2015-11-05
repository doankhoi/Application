
<?php

//Admin guest
Route::group(['middleware' => 'admin.guest'], function () {

	/** 
	* Page login
	*/
	Route::group(['prefix' => 'login', 'as' => 'login'], function () {
		Route::get('/', ['uses' => 'AuthController@getLogin']);
		Route::post('/', ['uses' => 'AuthController@postLogin']);
	});
});