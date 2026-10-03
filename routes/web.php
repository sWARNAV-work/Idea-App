<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return view('welcome');
});

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::get('/login', [SessionsController::class, 'create']);