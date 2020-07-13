@extends('layouts.app')

@section('content')
    <h1>{{$article->name}}</h1>
    <div>{{$article->body}}</div>

    <h3><a href="{{ route('articles.edit', $article) }}">Редактировать статью</a></h3>

    <h3><a href="{{ route('articles.destroy', $article) }}" data-method="delete" data-confirm="Вы уверены?" rel="nofollow">Удалить статью</a></h3>
@endsection