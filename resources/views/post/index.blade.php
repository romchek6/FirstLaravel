@extends('layouts.main')
@section('content')
    @foreach($posts as $key=>$value)

        <a href="/post/{{$value->id}}">{{ $value->title }}</a>
        <br>
    @endforeach
@endsection

