<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PIC_SeminarController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;



Route::get('/', [UsersController::class, 'index']);
Route::get('/dashboard', [UsersController::class, 'index'])->middleware('auth');
Route::get('/profile', [UsersController::class, 'index_profile']);
// Route::get('/edit-user', [UsersController::class, 'index_profile']);
Route::get('/profile/{id}/edit', [UsersController::class, 'edit'])->name('profile.edit-user');
Route::get('/seminar/{id}', [PIC_SeminarController::class, 'show'])->name('dashboard.details-seminar');

Route::get('/users', [UsersController::class, 'users_layout']);
Route::get('/users', [UsersController::class, 'create_layout']);
Route::get('/users', [UsersController::class, 'edit_layout']);
Route::resource('/users', UsersController::class);
// Route::post('/users', [UsersController::class, 'store']);
Route::put('/profile/{id}', [UsersController::class, 'update'])->name('profile.update');
Route::post('/logout', [UsersController::class, 'logout']);
// Route::resource('users/form',UsersController::class);
// Route::post('users/form', [UsersController::class, 'store']);




Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout']);

//Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');