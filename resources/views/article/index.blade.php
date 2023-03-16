@extends('layouts.main')


@section('title', $title)

@section('content')
    <h1>{{$title}}</h1>
    
    @foreach($articles as $article)
        <h2>{{$article->title}}</h2>
    @endforeach
@endsection    