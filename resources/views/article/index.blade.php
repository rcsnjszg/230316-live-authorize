@extends('layouts.main')


@section('title', $title)

@section('content')
    <h1>{{$title}}</h1>
    
    @foreach($articles as $article)
        <h2>{{$article->title}}</h2>
        @can('update-article',$article)  
            <a href="{{route("article.edit",['id' => $article->id])}}" class="btn btn-primary">Szerkesztés</a>
        @endcannot
    @endforeach
@endsection    