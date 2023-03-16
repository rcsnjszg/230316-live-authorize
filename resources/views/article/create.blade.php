@extends('layouts.main')


@section('title', $title)

@section('content')
    <h1>{{$title}}</h1>

    <form action="{{route("article.store")}}" method="post">
        @csrf

        <input type="text" name="title" value="Új Cikk">
        <input type="text" name="content" value="Tartalom">

        <input type="submit" value="">
    </form>
    
   
@endsection    