<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\Models\User; // !!

use Illuminate\Support\Facades\Auth; // !!


class AuthController extends Controller
{

    public function showLoginForm()
	{
		return view("auth.login");
	}
	
    public function login( Request $request )
	{

		// \request() - Хелпер Ларавела - аналог Request $request
		$data = $request -> validate([ // При ошибках валидации - редирект с выводом ошибок для каждого поля
			"email" => [ "required", "email"], //  "unique:users,email" - проверка уникальности email в таблице users
			"password" => ["required"]
		 
		]);

		
		if( auth( "web") -> attempt($data))
		{
			return redirect( route( "home"));
		}
		
		// Авторизация не пройдена
		return redirect( route( "login")) -> withErrors([ "email" => "AuthController.php -> Пользователь не найден" ] );
	}

    public function authorizationAjax( Request $request )
	{	/*
		Авторизация через AJAX , валидация, редирект - просто нафиг 
		*/
		$data = [];
		$data['email'] = $request -> email;
		$data['password'] = $request -> password;
		
		if( auth( "web") -> attempt($data))
		{
			//	Успешная авторизация
			return auth()->user()->name ;
		}
		else
		{
			return "authorizationERR";
		}

	}	
	 	
    public function logout()
	{
		
/*  
		dump( Auth::user() );
		dd( 'Line36');
	*/	
		
		auth("web") -> logout();
	//	dd('1');
		return redirect(route("home"));
	}
		
    public function showRegisterForm()
	{
		return view("auth.register");
	}	

	
    public function register( Request $request )
	{
		// \request() - Хелпер Ларавела - аналог Request $request
		$data = $request -> validate([
			//"name" => [ "required", "string"],
			"email" => [ "required", "email", "string", "unique:users,email"], //  "unique:users,email" - проверка уникальности email в таблице users
			"password" => ["required", "confirmed"]
		 
		]);
		
		$data['role'] = $request -> role;
		
		$user = \App\Models\User::create([
			//"name" => $data["name"],
			"email" => $data["email"],
			"password" => $data["password"], 
			"role" => $data["role"], 
		]);
		
		if( $user) {
			auth( "web") ->login( $user );
		}
		
		return redirect( route( "home"));
	}	
	
	
	
	
	
	
	
	
	
	
}
