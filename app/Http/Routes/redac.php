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

    Route::group(['prefix' => 'category'], function() {
        Route::get('/', ['uses' => 'CategoryController@index', 'as' => 'category.index']);
        Route::get('/delete/{id}', ['uses' => 'CategoryController@destroy', 'as' => 'category.delete']);
        Route::get('/publishedCate/{id}', ['uses' => 'CategoryController@publishedCate', 'as' => 'category.published']);

        Route::group(['prefix' => 'create', 'as' => 'category.create'], function() {
            Route::get('/', 'CategoryController@create');
            Route::post('/', 'CategoryController@store');
        });

        Route::group(['prefix' => 'edit/{id}', 'where' => ['id' => '[0-9]+'], 'as' => 'category.edit'], function() {
            Route::get('/', 'CategoryController@edit');
            Route::match(['put', 'patch'], '/', ['uses' => 'CategoryController@update', 'as' => 'redac.category.update']);
        });
    });
});