<?php
Route::group(['middleware' => 'redac'], function() {

    Route::get('/', ['as' => 'index'], function() {
        return redirect(route('redac.posts.index'));
    });

	/**
	 * Group for posts
	 */
	Route::group(['prefix' => 'posts'], function() {
        
        Route::get('/', ['uses' => 'PostController@index', 'as' => 'posts.index']);
        Route::get('/publishedPost/{idPost}', ['uses' => 'PostController@publishedPost', 'as' => 'posts.published']);
        Route::get('/seenPost/{idPost}', ['uses' => 'PostController@seenPost', 'as' => 'posts.seen']);

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