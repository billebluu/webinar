<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PIC_SeminarController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\RegisterAdminController;


Route::get('/', function () {
    return view('landing-page');
});
// Route::get('/', [UsersController::class, 'index']);
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
// Route::post('/logout', [UsersController::class, 'logout']);
// Route::resource('users/form',UsersController::class);
// Route::post('users/form', [UsersController::class, 'store']);




// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/login', [LoginController::class, 'index']);
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout']);

//Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// partnya billa
Route::get('/pic-seminar', [PIC_SeminarController::class, 'index']);
Route::get('/pic-seminar/create-seminar', [PIC_SeminarController::class, 'create_seminar'])->name('pic-seminar.create-seminar');
Route::get('/pic-seminar/create-sertifikat/{id}', [PIC_SeminarController::class, 'create_sertifikat'])->name('pic-seminar.create-sertifikat');
Route::get('/pic-seminar/create-pembicara/{id}', [PIC_SeminarController::class, 'create_pembicara'])->name('pic-seminar.create-pembicara');
Route::post('/pic-seminar/store-seminar', [PIC_SeminarController::class, 'store_seminar']);
Route::post('/pic-seminar/store-pembicara', [PIC_SeminarController::class, 'store_pembicara']);
Route::post('/pic-seminar/store-pembicara-edited', [PIC_SeminarController::class, 'store_pembicara_edited']);
Route::post('/pic-seminar/store-sertifikat', [PIC_SeminarController::class, 'store_sertifikat']);
Route::get('/pic-seminar/view-pembicara/{id}', [PIC_SeminarController::class, 'view_pembicara'])->name('pic-seminar.view-pembicara');
Route::get('/pic-seminar/view-peserta-seminar/{id}', [PIC_SeminarController::class, 'view_peserta'])->name('pic-seminar.view-peserta-seminar');
Route::get('/pic-seminar/view-sertifikat/{id}', [PIC_SeminarController::class, 'view_sertifikat'])->name('pic-seminar.view-sertifikat');
Route::post('/pic-seminar/search', [PIC_SeminarController::class, 'search']);
Route::get('/pic-seminar/edit-status-peserta/{id}', [PIC_SeminarController::class, 'edit_status_peserta'])->name('pic-seminar.edit-status-peserta');
Route::get('/pic-seminar/edit-pembicara/{id}', [PIC_SeminarController::class, 'edit_pembicara'])->name('pic-seminar.edit-pembicara');
Route::get('/pic-seminar/upload-ulang-materi/{id}', [PIC_SeminarController::class, 'upload_ulang_materi'])->name('pic-seminar.upload-ulang-materi');
Route::post('/pic-seminar/store-status-peserta', [PIC_SeminarController::class, 'store_status_peserta']);
Route::post('/pic-seminar/store-ulang-materi', [PIC_SeminarController::class, 'store_ulang_materi']);
Route::delete('/pic-seminar/delete-pembicara/{id}', [PIC_SeminarController::class, 'delete_pembicara'])->name('pembicara.delete');

//ADMIN
Route::get('/dashboard-admin', [AdminController::class, 'index']);
Route::get('/event-details', [AdminController::class, 'show_event'])->name('admin.event-details')->middleware('role');
Route::get('/event-approval-request', [AdminController::class, 'show_event_approval'])->name('admin.event-approval-request')->middleware('role');
Route::get('/user-details', [AdminController::class, 'show_user'])->name('admin.user-details')->middleware('role');
Route::get('/event-details/{id}', [AdminController::class, 'show_more_details'])->name('admin.more-details')->middleware('role');
Route::delete('/event-details/{seminar}', [AdminController::class, 'destroy_event'])->name('seminar.destroy');
Route::delete('/user-details/{user}', [AdminController::class, 'destroy_user'])->name('user.destroy');
Route::post('/seminar/approve/{id}', [AdminController::class, 'approve'])->name('approve');
Route::delete('/seminar/reject/{id}', [AdminController::class, 'reject'])->name('reject');
// Route::get('/login-admin',[LoginAdminController::class,'index'])->middleware('guest');
// Route::post('/login-admin',[LoginAdminController::class,'authenticate']);
// Route::get('/register-admin',[RegisterAdminController::class,'index'])->middleware('guest');
// Route::post('/register-admin',[RegisterAdminController::class,'store']);
// Route::post('/logout-admin',[LoginAdminController::class,'logout']);


// Route::get('/dashboard-admin', [AdminController::class, 'index']);
// Route::get('/dashboard-admin', [AdminController::class, 'index']);



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//login register
Auth::routes();

Route::get('/home', [App\Http\Controllers\UsersController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'show_event'])->name('admin-home')->middleware('role');//daftar
Route::get('/pendaftaran', [UsersController::class, 'register_seminar']);

Route::post('/submitpendaftaran', [PendaftaranController::class,'insert']);

//tambah
Route::get('/unduh-sertifikat/{id_pic_seminar}', [PendaftaranController::class, 'unduhSertifikat'])->name('unduh-sertifikat');
Route::get('/unduh-materi/{id_pembicara}', [PembicaraController::class, 'unduhMateriSeminar'])->name('unduh-materi');
// Route::get('/pendaftaran/{id_pic_seminar}/{id_users}', [PendaftaranController::class, 'create'])->name('pendaftaran.create')->middleware('auth');

Route::get('/pendaftaran/{id_pic_seminar}/{id_users}', [PendaftaranController::class, 'create'])
    ->name('pendaftaran.create')
    ->middleware('auth');

Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');