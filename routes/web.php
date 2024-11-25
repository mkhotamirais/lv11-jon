<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('posts.index');
// })->name('index');

// ada 3 cara untuk proteksi route
// 1. menempelkan langsung di web.php route;
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
// 2. menggunakan implement HasMiddleware
// 3. menggunakan cara berikut yang diterapkan di sini

// Route::view('/', 'posts.index')->name('index');
Route::redirect('/', '/posts')->name('index');

Route::resource('posts', PostController::class);
Route::get('/{user}/posts', [DashboardController::class, 'userPosts'])->name('posts.user');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});
