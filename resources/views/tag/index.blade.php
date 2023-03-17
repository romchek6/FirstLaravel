@extends('layouts.main')
@section('content')
    <a href="/tag/create">Добавить</a>
    @foreach($tags as $key=>$value)

        <a href="/tag/{{$value->id}}">{{ $value->title }}</a>
        <br>
    @endforeach
@endsection

