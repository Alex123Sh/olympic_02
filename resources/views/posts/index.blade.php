@extends('layouts.app')

@section('title', 'Статьи')

@section ('content')
@include( 'partials.header')

Это основной контент
 @foreach( $posts as $post )
		@include("partials.post.itemPost", ['post' => $post])
	@endforeach
	
	{{ $posts->links() }}
@endsection