@extends('layouts.main')
@section('content')
<div class="container" style="height: 100vh">
    <div class="col-8">
        <form method="post" action="/tag">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="title"  placeholder="Title">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
   </div>
</div>
@endsection

