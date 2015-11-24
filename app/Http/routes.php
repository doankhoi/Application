<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
*   Define group for admin control
*/
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function() {
    require app_path('Http/Routes/admin.php');
});

/**
* Define group for member
*/
Route::group(['prefix' => 'member', 'namespace' => 'Member', 'as'=> 'member.'], function() {
    require app_path('Http/Routes/member.php');
});

/**
* Define group for website
*/
Route::group(['prefix' => 'website', 'namespace' => 'Website', 'as' => 'website.'], function() {
    require app_path('Http/Routes/website.php');
});

Route::group(['prefix' => 'redac', 'namespace' => 'Redac', 'as' => 'redac.'], function() {
    require app_path('Http/Routes/redac.php');
});

/**
* Define group for API
*/
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function() {
    require app_path('Http/Routes/api.php');
});


Route::get('/', function () {
    return redirect(route('website.index'));
});


/**
* Auth
*/

//Login
Route::get('/auth/login', function() {
	return view('auth.login');
});

//Forget password
Route::get('/password/email', function() {
	return view('auth/password');
});

//Forget password
Route::get('/auth/register', function() {
	return view('auth/register');
});

//Confirm user
Route::get('/auth/confirm/{register_token}', 'Website\WebsiteController@confirmUser');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);