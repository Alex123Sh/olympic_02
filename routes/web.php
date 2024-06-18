<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
/*
// для загрузки файлов
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
*/
//use App\Http\Controllers\ContactController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('home');
}) /*-> middleware("r")* / ->name('home-N');
*/



Route::get('/about', function () {
    return view('about');
}) -> name('about-N');

Route::get('/contact', function () {
    return view('contact');
}) -> name('contact-N');

Route::get( '/contact_all/{id}', 'App\Http\Controllers\ContactController@oneMessage') -> name('contactOneMessage');
Route::get('/contact_all', 'App\Http\Controllers\ContactController@f_allData') -> name('about-Out-N');

Route::post('/contact/submit', 'App\Http\Controllers\ContactController@fSubmit') -> name('contactForm-N');

//CutCode
Route::get('/', [ App\Http\Controllers\IndexController::class, 'index'] ) /*-> middleware("r")*/ ->name('home');
Route::get('/posts', [ App\Http\Controllers\PostController::class, 'index'] ) /*-> middleware("r")*/ ->name('posts.index');
Route::get('/posts/{id}', [ App\Http\Controllers\PostController::class, 'show'] ) /*-> middleware("r")*/ ->name('posts.show');
// 



Route::middleware("auth") -> group(function() // Действия авторизированных пользователей
{	//	Все про авторизацию и вокруг нее
	Route::get('/logout', [ \App\Http\Controllers\AuthController::class, 'logout'] ) ->name('logout');

});

Route::middleware("guest") -> group(function() // Действия не авторизированных пользователей
{
	Route::get('/forgot', function () {    return  'Забыли пароль? [forgot]+ ' ;} ) ->name('forgot');		
	Route::get('/login', [ \App\Http\Controllers\AuthController::class, 'showLoginForm'] ) ->name('login');
	
	Route::post('/login_process', [ \App\Http\Controllers\AuthController::class, 'login'] ) ->name('login_process');
	
	Route::post('/authorizationAjax',[ \App\Http\Controllers\AuthController::class, 'authorizationAjax'] );// ->name('login_process');
	
	
	Route::get('/register', [ \App\Http\Controllers\AuthController::class, 'showRegisterForm'] ) ->name('register');
	Route::post('/register_process', [ \App\Http\Controllers\AuthController::class, 'register'] ) ->name('register_process');
	//Route::post('/register_process',  function () {dd ('753-register');} ) ->name('register_process');
});

// Основные страницы
							
	//Олимпиады ОПК
	Route::get('/opk', '\App\Http\Controllers\OlympiadController@opkShowStart')	-> name('opkShowStart');	
	Route::get('/opk/{id}', '\App\Http\Controllers\OlympiadController@opkShowSingle')	-> name('opkShowSingle');	
	
	//Олимпиады Аксиос
	Route::get('/aksios', '\App\Http\Controllers\OlympiadController@aksiosShowStart')	-> name('aksiosShowStart'); 
	Route::get('/aksios/{id}', '\App\Http\Controllers\OlympiadController@aksiosShowSingle')	-> name('aksiosShowSingle'); 	
	
	//Олимпиады Наше наследие
	Route::get('/ovio', '\App\Http\Controllers\OlympiadController@ovioShowStart')	-> name('ovioShowStart');
	Route::get('/ovio/{id}', '\App\Http\Controllers\OlympiadController@ovioShowSingle')	-> name('ovioShowSingle');	

	// Персональная страница олимпиады single
	Route::get('/olympiad/single/{id}', '\App\Http\Controllers\OlympiadController@olympiadSingle')	-> name('olympiadSingle');
	
// Файловый менеджер + визуальный редактор - обшее стартовое демо
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

	 
 

// типовые решения 
Route::get('/sandbox', function () { return view('sandbox/sandbox');}) -> name('sandbox'); 

Route::get('/sandbox/excelINP', function () { return view('sandbox/ExcelINP');}) -> name('sandboxExcelINP'); 
Route::post('/sandbox/excel/processINP', '\App\Http\Controllers\office\ExcelExportFormController@export') -> name('sandboxExcelProcessINP'); 
Route::get('/sandbox/excelOUT', '\App\Http\Controllers\office\ExcelImportArrController@import') -> name('sandboxExcelOUT'); 


Route::get('/sandbox/word', function () { return view('sandbox/sandboxWord');}) -> name('sandboxWord'); 
Route::post('/sandbox/word/create', '\App\Http\Controllers\office\wordController@createWord') -> name('sandboxWordCreate'); 
//Route::post('/sandbox/word/create', function () {dd('sandbox/sandbox');}) -> name('sandboxWordCreate'); 
// Вспомогательное
// Загрузка AJAX Файла
Route::post('/uploadFile', function (Request $request) { \App\Http\Controllers\AdditionalController::uploadFile( $request, 'public/temp' ); }  ) -> name('uploadFile'); 

Route::get('/test3', [\App\Http\Controllers\office\ExcelExportController::class, 'export'] ) -> name('test3'); 
Route::get('/test4', [\App\Http\Controllers\office\ExcelImportController::class, 'import'] ) -> name('test3'); 
