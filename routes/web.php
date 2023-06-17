<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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
Route::get('/profile', [UsersController::class, 'index_profile']);
Route::get('/users', [UsersController::class, 'users_layout']);
Route::get('/users', [UsersController::class, 'create_layout']);
Route::get('/users', [UsersController::class, 'edit_layout']);
Route::resource('/users', UsersController::class);
Route::post('/users', [UsersController::class, 'store']);
// Route::resource('users/form',UsersController::class);
// Route::post('users/form', [UsersController::class, 'store']);