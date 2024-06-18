<?php
// Пользователь авторизирован, роль:10 (Ученик)
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;


Route::middleware("admin20") -> group(function() // Действия авторизированных пользователей роль:10 (Ученик)
{
	
});
