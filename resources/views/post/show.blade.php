{{ $post->title }}
<br>
{{ $post->content }}
<br>
{{ $post->slug }}
<br>
<img src="/storage/{{ $post->img  }}" alt="123">
<br>
<a href="/post/{{$post->id}}/edit">Update</a>
<form action="/post/{{ $post->id }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>


