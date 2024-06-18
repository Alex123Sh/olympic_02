@extends('layouts.app')

@section('titleHeader')
Контакты Title
@endsection


@section('content')
	<h1>Контакты ВСе  READ</h1>

	@foreach( $data as $el )
		<h4>{{ $el->subject }}</h4>
<a href="{{ route('contactOneMessage', $el -> id ) }}">детальнее</a>
	@endforeach
@endsection