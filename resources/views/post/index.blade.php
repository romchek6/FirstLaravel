@extends('layouts.main')
@section('content')
    <a href="/post/create">Добавить</a>
    @foreach($posts as $key=>$value)

        <a href="/post/{{$value->id}}">{{ $value->title }}</a>
        <br>
    @endforeach
@endsection

