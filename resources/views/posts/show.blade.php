@extends('layouts.app')

@section('title', $post->title )

@section ('content')
@include( 'partials.header')

Это основной контент
{{ $post->title }} <br>

	{!! $post -> description !!}<br>
	<img src="/storage/posts/{{ $post -> thumbnail}}" >
@endsection