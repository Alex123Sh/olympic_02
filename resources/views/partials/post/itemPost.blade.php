 <p>id={{$post -> id}}</p>
<h4>{{ $post -> title}}</h4>
<p>{!! $post -> preview !!}</p>
<a href="{{ route("posts.show", $post->id) }}" >
<img src="/storage/posts/{{ $post -> thumbnail}}" >
</a>
<hr>