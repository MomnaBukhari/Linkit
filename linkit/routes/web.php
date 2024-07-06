<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    $user = Auth::user();
    return view('dashboard', compact('user'));
})->middleware('auth')->name('dashboard');

Route::get('/inbox', function () {
    return view('inbox');
})->middleware('auth')->name('inbox');


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register-save', [UserController::class, 'registerSave'])->name('registerSave');
Route::post('/login-match', [UserController::class, 'login'])->name('loginMatch');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/chat', [App\Http\Controllers\ChatsController::class, 'index']);
Route::get('/messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages']);
Route::post('/messages', [App\Http\Controllers\ChatsController::class, 'sendMessage']);
