<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});
Route::get('/register', function(){
    return view('register');
});
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', function(){
    return view('login');
});
Route::post('/login', [AuthController::class, 'login']);

Route::get('/admin', [PostController::class, 'dashboard'])->name('admin');
Route::get('/post-new', [PostController::class, 'new']);
Route::post('/post-save',[PostController::class, 'save']);