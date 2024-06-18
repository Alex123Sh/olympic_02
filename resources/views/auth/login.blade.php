@extends('layouts.app')

@section('title', 'Авторизация')

@section ('content')
        <!--div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
            <div class="bg-white w-96 shadow-xl rounded p-5">
                <h1 class="text-3xl font-medium">Вход</h1>

                <form method='post' action='{{ route("login_process") }}' class="space-y-5 mt-5">
					@csrf
					@error('email')
						<p class="text-red-500">{{  $message }}</p>
					@enderror
                    <input name="email" value="{{ old('email') }}" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('email') border-red-500 @enderror" placeholder="Email" />
					
					@error('password')
						<p class="text-red-500">{{  $message }}</p>
					@enderror				
                    <input name='password' value="{{ old('password') }}" type="password" class="w-full h-12 border border-gray-800 rounded px-3 @error('password') border-red-500 @enderror" placeholder="Пароль" />
					

                    <div>
                        <a href="#" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Забыли пароль?</a>
                    </div>

                    <div>
                        <a href="{{ route('register') }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Регистрация</a>
                    </div>

                    <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Войти</button>
                </form>
            </div>
        </div>
		
		<hr-->
		<div class='row'>
			<div class="col-xxl-5 col-lg-7  col-md-8  col-sm-10  mx-auto " >
				<div class="mx-2 widgetWhite01 ">
					<h2 class="mt-3 mb-1  px-3  pt-2">Вход</h2>	
					<form action="{{ route('login_process') }}" class="space-y-5 mt-5" method='post'>
						@csrf
						<div class="inputWrapper  @error('email') ERR @enderror">
							<div class="inputHelp">Ваш email</div>
							<div class="inputErr">	@error('email')	{{  $message }}	@enderror </div>
							<input name='email'  value="{{ old('email') }}" type="text" class="form-control" placeholder="Ваш email">
						</div>
						<div class="inputWrapper @error('password') ERR @enderror">
							<div class="inputHelp">Ваш Пароль</div>
							<div class="inputErr">	@error('password')	{{  $message }}	@enderror </div>
							<input name='password' type="password" class="form-control" placeholder="Ваш Пароль">
						</div>
						<div class="text-center">
							<a href="{{ route('forgot') }}" class="btn   btn-sm btnWhite bgGreyLight colorBlueDark ubuntu-400">Восстановить пароль</a>
							<a href="{{ route('register') }}" class="btn   btn-sm btnWhite bgGreyLight colorBlueDark ubuntu-400">Регистрация</a><br>
						
							<button type="submit" class="btn  btn-sm btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i>Войти</button>
						</div>
					</form>	
				</div>
			</div>
		</div>
@endsection