@extends('layouts.app')

@section('content')
    <h1>{{$article->name}}</h1>
    <div>{{$article->body}}</div>

    <h3><a href="{{ route('articles.edit', $article) }}">Редактировать статью</a></h3>
@endsection