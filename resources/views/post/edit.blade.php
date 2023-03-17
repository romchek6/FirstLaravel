@extends('layouts.main')
@section('content')
    <div class="container" style="height: 100vh">
        <div class="col-8">
            <form method="post" action="/post/{{ $post->id }}" >
                @csrf
                @method('patch')
{{--                <input type="hidden" name="id" value="{{ $post->id  }}" >--}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{ $post->title }}"  placeholder="Title">
                </div>
                <textarea name="text" id="" cols="100" rows="5">{{ $post->content }}</textarea>
                <div class="form-group">
                    <label for="exampleInputEmail1">img</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="img" placeholder="Title">
                    <img src="/storage/{{ $post->img  }}" alt="">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection


