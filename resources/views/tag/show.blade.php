{{ $tag->title }}
<br>
{{ $tag->slug }}
<br>
<a href="/tag/{{$tag->id}}/edit">Update</a>
<form action="/tag/{{ $tag->id }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>


