@extends('layouts.main')


@section('title', $title)

@section('content')
    <h1>{{$title}}</h1>
    
    @foreach($articles as $article)
        <h2>{{$article->title}}</h2>
        <a href="{{route("article.edit",['id' => $article->id])}}" class="btn btn-primary @cannot('update-article',$article) disabled @endcannot">Szerkesztés</a>
    @endforeach
@endsection    