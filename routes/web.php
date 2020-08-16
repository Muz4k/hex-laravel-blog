<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about','PageController@about');

Route::get('/articles', 'ArticleController@index')
    ->name('articles.index');

Route::post('/articles', 'ArticleController@store')
    ->name('articles.store');

Route::get('/articles/create', 'ArticleController@create')
    ->name('articles.create');

Route::get('/articles/{id}', 'ArticleController@show')
    ->name('article.show');

Route::patch('/articles/{id}', 'ArticleController@update')
    ->name('articles.update');

Route::get('/articles/{id}/edit', 'ArticleController@edit')
    ->name('articles.edit');

Route::delete('/articles/{id}', 'ArticleController@destroy')
    ->name('articles.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
