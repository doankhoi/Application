<?php

Route::get('/', ['as' => 'index', 'uses' => 'WebsiteController@index']);
Route::get('/about', ['as' => 'about', 'uses' => 'WebsiteController@about']);
Route::post('/search', ['as'=>'search', 'uses' => 'WebsiteController@search']);

Route::group(['middleware' => 'comment'], function() {
	Route::post('/comment', ['as' => 'comment', 'uses' => 'WebsiteController@comment']);
});

Route::group(['prefix' => 'contact'], function(){
	Route::get('/', ['as' => 'contact.index', 'uses' => 'WebsiteController@contact']);
	Route::post('/', 'WebsiteController@storeContact');
});

Route::group(['prefix' => 'posts', 'where' => ['id' => '[0-9]+']], function() {
	Route::get('/show/{id}', ['uses' => 'WebsiteController@show', 'as' => 'posts.show']);
	Route::get('/tag/{tag}', ['uses' => 'WebsiteController@searchTag', 'as' => 'posts.tag']);
	Route::get('/category/{id}', ['uses' => 'WebsiteController@searchCategory', 'as' => 'posts.category']);
});
