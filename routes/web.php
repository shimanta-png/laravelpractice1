<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::get('/', [PostController::class, 'index_posts']);
Route::get('/test1', function () {
    return view('test1');
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
// Route::get('/post-new', [PostController::class, 'new']);
Route::get('/post-new', function(){
    return view('admin.new');
})->middleware('auth');
Route::post('/post-save',[PostController::class, 'save']);
Route::get('/post/{slug}', [PostController::class, 'post_view']);
Route::get('/search', [PostController::class, 'search_res']);
Route::get('/export-pdf', [PostController::class, 'generate_pdf']);