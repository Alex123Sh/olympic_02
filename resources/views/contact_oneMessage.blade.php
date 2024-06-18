@extends('layouts.app')

@section('titleHeader')
Контакты Title
@endsection


@section('content')
	<h1>Контакты Персональная запись</h1>
	Имя = {{ $data-> nameUser}}<br>
	Почта = {{$data-> email}}<br>	
	

<a href="#">детальнее</a>

@endsection