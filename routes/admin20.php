<?php
// Пользователь авторизирован, роль:20 (Педагог)
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

Route::middleware("admin20") -> group(function() // Действия авторизированных пользователей роль:20 (Педагог)
{
	
});