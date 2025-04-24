<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('productos', ProductoController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('blogs', \App\Http\Controllers\BlogController::class);
});

Route::get('/producto', [ProductoController::class, 'publicIndex'])->name('producto');

Route::get('/blog', [BlogController::class, 'publicIndex'])->name('blog');

Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('users.update');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
