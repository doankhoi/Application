
<?php

//Admin auth
Route::group(['middleware' => 'admin'], function () {

    Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);

    Route::group(['prefix' => 'users'], function() {

        Route::get('/', ['as' => 'users.index', 'uses' => 'UserController@index']);

        Route::group(['prefix' => 'create', 'as' => 'users.create'], function () {
            Route::get('/', 'UserController@create');
            Route::post('/', 'UserController@store');
        });

        Route::group(['prefix' => 'edit/{id}', 'where' => ['id' => '[0-9]+'], 'as' => 'users.edit'], function() {
            Route::get('/', 'UserController@edit');
            Route::match(['put', 'path'], '/', ['uses' => 'UserController@update', 'as' => 'users.update']);
        });

        Route::delete('/{id}', ['uses' => 'UserController@destroy']);
    });

});