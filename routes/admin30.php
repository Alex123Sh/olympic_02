<?php
// Пользователь авторизирован, роль:30 (Администратор)
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

//// В пути уже есть /admin30


Route::middleware("admin30") -> group(function() // Действия авторизированных пользователей роль:30 (Администратор)
{
	Route::get('/olympicCreate', function ()
	{	//	Создание Олимпиады - Вывод формы
		return view('layouts.admin30.olympicCreate');
	}) -> name('admin30/olympicCreate');
	
	// Добавление новой Олимпиады
	Route::post('/olympicAdd', '\App\Http\Controllers\admin\Admin30Controller@olympicAdd')	-> name('admin30/olympicAdd');	

	// Запись отредактированной  Олимпиады
	Route::post('/olympicUpdate', '\App\Http\Controllers\admin\Admin30Controller@olympicUpdate')	-> name('admin30/olympicUpdate');
	
	// Вывод для редактирования сушествующей Олимпиады
	Route::get('/olympicEdit/{id}', '\App\Http\Controllers\admin\Admin30Controller@olympicShow')	-> name('admin30/olympicEdit');	
	
	// Удаление сушествующей Олимпиады
	Route::get('/olympicDelete/{id}-{type}', '\App\Http\Controllers\admin\Admin30Controller@olympicDelete')	-> name('admin30/olympicDelete');		
	
	// Добавление Тура к сушествующей Олимпиаде - только создание записи!!!!
	Route::get('/olympicTourNew/{id}-{type}-{name}', '\App\Http\Controllers\admin\Admin30Controller@olympicTourNew')-> name('admin30/olympicTourNew');	

	// Вывод на редактирование  Тура у сушествующей Олимпиады
	Route::get('/olympicTourEdit/{id}-{type}-{name}-{id_tour}', '\App\Http\Controllers\admin\Admin30Controller@olympicTourEdit')-> name('admin30/olympicTourEdit');	
	
	// Обновление/запись   Тура у сушествующей Олимпиады
	Route::post('/olympicTourUpdate/{id}-{type}-{name}-{id_tour}', '\App\Http\Controllers\admin\Admin30Controller@olympicTourUpdate')-> name('admin30/olympicTourUpdate');	
	
	// Удаление  Тура у сушествующей Олимпиады
	Route::get('/olympicTourDelete/{id}-{type}-{name}', '\App\Http\Controllers\admin\Admin30Controller@olympicTourDelete')-> name('admin30/olympicTourDelete');	
	
	// Загрузка документов/файлов для Туров
	Route::post('/fileUpdateTour', function (Request $request) { \App\Http\Controllers\AdditionalController::uploadFileOriginalName( $request, 'public/tourExercise' ); }  ) -> name('admin30/fileUpdateTour');

	//	Удаление файлов у туров
	Route::post('/fileTourDelete', function (Request $request) { \App\Http\Controllers\admin\Admin30Controller::fileTourDelete( $request ); }  ) -> name('admin30/fileTourDelete');
	
	// Контроль ролей пользователей
	Route::get('/userControl', '\App\Http\Controllers\admin\Admin30Controller@userControl')	-> name('admin30/userControl');

});