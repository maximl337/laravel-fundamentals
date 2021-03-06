<?php


Route::get('foo', 'FooController@foo');

Route::get('/', 'PagesController@index');

Route::get('about', 'PagesController@about');

Route::get('contact', 'PagesController@contact');

Route::resource('articles', 'ArticlesController');

Route::controllers([

    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
    
    ]);

Route::get('tags/{tags}', 'TagsController@show');
