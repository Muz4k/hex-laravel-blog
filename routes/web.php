<?php

use App\Articles\ArticlesRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about','PageController@about');

Route::get('/articles', function () {
    return view('article.index', [
        'articles' => App\Article::all(),
    ]);
});

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

Route::get('search', function (ArticlesRepository $repository) {
    $articles = $repository->search(request('q'));

    return view('article.index', [
        'articles' => $articles,
    ]);
});
