<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OffertController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/dashboard', function () {
    if (!session('user_id')) return redirect()->route('login');
    return view('dashboard');
})->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/offerts/create', [OffertController::class, 'create'])->name('offerts.create');
Route::post('/offerts', [OffertController::class, 'store'])->name('offerts.store');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');