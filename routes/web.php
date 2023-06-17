<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PIC_SeminarController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UsersController::class, 'index']);
Route::get('/dashboard', [UsersController::class, 'index']);
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
// Route::resource('users/form',UsersController::class);
// Route::post('users/form', [UsersController::class, 'store']);