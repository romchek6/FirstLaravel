@extends('layouts.main')
@section('content')
    @foreach($tags as $key=>$value)

        <a href="/tag/{{$value->id}}">{{ $value->title }}</a>
        <br>
    @endforeach
@endsection

