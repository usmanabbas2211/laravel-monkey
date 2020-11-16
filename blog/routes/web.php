<?php

Route::get('/test',function(){
    return App\category::find(3)->posts;
});

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/posts','postsController@index')->name('posts');
    Route::get('/post/create','postsController@create')->name('post.create');
    Route::post('/post/store','postsController@store')->name('post.store');
    Route::get('/post/delete/{id}','postsController@destroy')->name('post.delete');
    Route::get('/post/edit/{id}','postsController@edit')->name('post.edit');
    Route::get('/posts/trashed','postsController@trashed')->name('posts.trashed');
    Route::get('/post/kill/{id}','postsController@kill')->name('post.kill');
    Route::get('/post/restore/{id}','postsController@restore')->name('post.restore');
    Route::get('/post/update/{id}','postsController@update')->name('post.update');

    //category
    Route::get('/categories','CategoriesController@index')->name('categories');
    Route::get('/category/create','CategoriesController@create')->name('category.create');
    Route::get('/category/store','CategoriesController@store')->name('category.store');
    Route::get('/category/delete/{id}','CategoriesController@destroy')->name('category.delete');
    Route::get('/category/edit/{id}','CategoriesController@edit')->name('category.edit');
    Route::get('/category/update/{id}','CategoriesController@update')->name('category.update');

    Route::get('/tags','TagsController@index')->name('tags');
    Route::get('/tag/create','TagsController@create')->name('tag.create');
    Route::get('/tag/edit/{id}','TagsController@edit')->name('tag.edit');
    Route::get('/tag/update/{id}','TagsController@update')->name('tag.update');
    Route::get('/tag/delete/{id}','TagsController@destroy')->name('tag.delete');
    Route::post('/tag/store','TagsController@store')->name('tag.store');

    Route::get('/users','UsersController@index')->name('users');
    Route::get('/user/create','UsersController@create')->name('user.create');
    Route::post('/user/store','UsersController@store')->name('user.store');
    Route::get('/user/admin/{id}','UsersController@admin')->name('user.admin');
    Route::get('/user/not_admin/{id}','UsersController@not_admin')->name('user.not_admin');
});



Auth::routes();


