<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('posts.index');
// })->name('index');

Route::view('/', 'posts.index')->name('index');

Route::view('/register', 'auth.register')->name('register');
