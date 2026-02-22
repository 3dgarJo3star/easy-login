<?php

use App\Http\Controllers\{AuthController, PostController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('posts', PostController::class);
    
    Route::get(
        'posts/{post}/delete',
        [PostController::class, 'confirmDelete']
    )->name('posts.confirmDelete');

});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

