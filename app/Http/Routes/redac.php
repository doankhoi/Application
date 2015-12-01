<?php
Route::group(['middleware' => 'redac'], function() {

    Route::get('/', ['as' => 'index'], function() {
        return redirect(route('redac.posts.index'));
    });

    Route::get('/media', ['as' => 'media', 'uses' => 'RedacController@filemanager']);
	/**
	 * Group for posts
	 */
	Route::group(['prefix' => 'posts'], function() {
        
        Route::get('/', ['uses' => 'PostController@index', 'as' => 'posts.index']);
        Route::get('/publishedPost/{idPost}', ['uses' => 'PostController@publishedPost', 'as' => 'posts.published']);
        Route::get('/seenPost/{idPost}', ['uses' => 'PostController@seenPost', 'as' => 'posts.seen']);
        Route::get('/delete/{id}', ['uses' => 'PostController@destroy', 'as'=>'posts.delete']);

        Route::group(['prefix' => 'create', 'as' => 'posts.create'], function() {
            Route::get('/', 'PostController@create');
            Route::post('/', 'PostController@store');
        });

        Route::group(['prefix' => 'edit/{id}', 'where' => ['id' => '[0-9]+'], 'as' => 'posts.edit'], function() {
            Route::get('/', 'PostController@edit');
            Route::match(['put', 'patch'], '/', ['uses' => 'PostController@update', 'as' => 'redac.posts.update']);
        });
    });
});