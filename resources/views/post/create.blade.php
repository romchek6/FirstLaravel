@extends('layouts.main')
@section('content')
<div class="container" style="height: 100vh">
    <div class="col-8">
        <form method="post" action="/post" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="title"  placeholder="Title">
            </div>
            <textarea name="content" id="" cols="100" rows="5"></textarea>
            <div class="form-group">
                <label for="exampleInputEmail1">img</label>
                <input type="file" class="form-control" id="exampleInputEmail1" name="img"  placeholder="img">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
   </div>
</div>
@endsection

