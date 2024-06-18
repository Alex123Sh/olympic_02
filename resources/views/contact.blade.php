@extends('layouts.app')

@section('titleHeader')
Контакты Title
@endsection


@section('content')
<h1>Контакты H1</h1>

<form action="{{ route('contactForm-N')}}" method="post">
	@csrf
	Имя name='nameUser'<br><input type="text" name='nameUser'><hr>
	Почта name='email))'<br><input type="text" name='email'><hr>	
	Тема сообщения name='subject'<br><input type="text" name='subject'><hr>
	
	Текст сообщения name='comment'<br><textarea name='comment'></textarea><hr>
	<button type='submit' > Отправить</button>
</form>	
@endsection