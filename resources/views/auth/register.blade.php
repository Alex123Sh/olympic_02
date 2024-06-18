@extends('layouts.app')

@section('title', 'Регистрация')

@section ('content')
	
		<div class='row'>
			<div class="col-xxl-5 col-lg-7  col-md-8  col-sm-10  mx-auto " >
				<div class="mx-2 widgetWhite01 ">
					<h2 class="mt-3 mb-1  px-3  pt-2">Базовая регистрация</h2>	
					<form action="{{ route('register_process') }}" class="space-y-5 mt-5" method='post'>
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
						<div class="inputWrapper @error('password_confirmation') ERR @enderror">
							<div class="inputHelp">Ваш Пароль повторно</div>
							<div class="inputErr">	@error('password_confirmation')	{{  $message }}	@enderror </div>
							<input name='password_confirmation' type="password" class="form-control" placeholder="Ваш Пароль">
						</div>
						<div class="inputWrapper">
							<div class="inputHelp">Ваш статус в системе:</div>
							<div class="inputErr">Сообшение об ошибке</div>
							<select name="role" id="pet-select" class="form-select form-select-sm">
							  <option value="10">Ученик</option>
							  <option value="20">Педагог</option>
							  <option value="30">Администратор</option>
							</select>
						</div>
						<div class="text-center">
							<button type="submit" class="btn  btn-sm btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i> Зарегистрироваться </button>
						</div>
					</form>	
				</div>
			</div>
		</div>
		
@endsection