<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about','PageController@about');

Route::get('/articles', 'ArticleController@index')
    ->name('articles.index');

Route::get('/articles/{id}', 'ArticleController@show')
    ->name('article.show');