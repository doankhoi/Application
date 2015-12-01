
<?php

//Admin auth
Route::group(['middleware' => 'admin'], function () {

    Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);

    //Group for site
    Route::group(['prefix' => 'site'], function() {
        Route::get('/', ['as' => 'site.index', 'uses' => 'AdminController@siteInfo']);
        Route::group(['prefix' => 'edit/{id}', 'where' => ['id' => '[0-9]+'], 'as' => 'site.edit'], function(){
            Route::get('/', 'AdminController@siteEdit');
            Route::match(['put', 'patch'], '/', ['as' => 'site.update', 'uses' => 'AdminController@siteUpdate']);
        });
    });
    
    //Group for users
    Route::group(['prefix' => 'users'], function() {

        Route::get('/', ['as' => 'users.index', 'uses' => 'UserController@index']);
        Route::get('/seenUser/{id}', ['as' => 'users.seen', 'uses' => 'UserController@seenUser']);
        Route::get('/showUser/{id}', ['as' => 'users.show', 'uses' => 'UserController@show']);
        Route::get('/destroyUser/{id}', ['as' => 'users.delete', 'uses' => 'UserController@destroy']);

        Route::get('/sort/{slug}', ['as' => 'users.sort', 'uses' => 'UserController@sortUser']);
        Route::post('/checkAllUser', ['as' => 'users.checkall', 'uses' => 'UserController@checkAll']);

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

    //Group for contacts
    Route::group(['prefix' => 'contacts'], function(){
        Route::get('/', ['as' => 'contacts.index', 'uses' => 'ContactController@index']);
        Route::get('/seenContact/{id}', ['as' => 'contacts.seen', 'uses' => 'ContactController@seenContact']);
        Route::get('/allCheck', ['as' => 'contacts.checkall', 'uses' => 'ContactController@checkAll']);
    });

    //Group for comments
    Route::group(['prefix' => 'comments'], function(){
        Route::get('/', ['as' => 'comments.index', 'uses' => 'CommentController@index']);
        Route::get('/seenComment/{id}', ['as' => 'comments.seen', 'uses' => 'CommentController@seenComment']);
        Route::get('/destroy/{id}', ['as' => 'comments.delete', 'uses' => 'CommentController@destroy']);
        Route::post('/checkAllComment', ['as' => 'comments.checkall', 'uses' => 'CommentController@checkAll']);
    });

});