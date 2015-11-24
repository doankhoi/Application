<?php
Route::group(['middleware' => 'redac'], function() {

    Route::get('/', function() {
        return redirect(route('redac.posts.index'));
    });

	/**
	 * Group for posts
	 */
	Route::group(['prefix' => 'posts'], function() {
        
        Route::get('/', ['uses' => 'PostController@index', 'as' => 'posts.index']);

        Route::group(['prefix' => 'create', 'as' => 'posts.create'], function() {
            Route::get('/', 'PostController@create');
            Route::post('/', 'PostController@store');
        });

        Route::group(['prefix' => 'edit/{id}', 'where' => ['id' => '[0-9]+'], 'as' => 'posts.edit'], function() {
            Route::get('/', 'PostController@edit');
            Route::post('/', 'PostController@update');
        });
    });
});