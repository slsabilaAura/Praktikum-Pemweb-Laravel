<?php

use App\Http\Controllers\PermintaanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\PeminjamanController;
use App\Models\Permintaan;
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

Route::get('/', function () {
    return view('welcome');




});

// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);
// Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
Route::get('/dashboard', [UserController::class, 'index']);
Route::get('/profile', [UserController::class, 'index_profile'])->name('profile.view');
// Route::get('/profile/{id}/edit', [UserController::class, 'edit'])->name('profile.edit-user');

Route::get('/profile/{user}', [UserController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}', [UserController::class, 'update'])->name('profile.update');

//ruangan
Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');

//permintaan 
Route::get('/form', [PermintaanController::class, 'index']);
Route::get('/ruangan/{id}', [PermintaanController::class, 'show'])->name('ruangan.show');
Route::post('/peminjaman}', [PermintaanController::class, 'store'])->name('peminjaman.store');
Route::get('/peminjaman/{ruangan_id}/{user_id}', [PermintaanController::class, 'create'])
    ->name('peminjaman.create')
    ->middleware('auth');
//daftarpermintaan
// Route::get('/daftar-permintaan/{user_id}/{ruangan_id}', [PermintaanController::class, 'daftarPermintaan'])->name('daftar-permintaan');
Route::get('/daftar-permintaan', [PermintaanController::class, 'daftarPermintaan'])->name('daftar-permintaan')->middleware('auth');


//admin
Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin-home')->middleware('role');//daftar
Route::get('/dashboard-admin', [AdminController::class, 'index']);
//admin approval
Route::get('/pengajuan-ruangan', [AdminController::class, 'list'])->name('pengajuan.index');
Route::put('/pengajuan-ruangan/{id}', [AdminController::class, 'update'])->name('pengajuan.update');

//adminlist space 
Route::get('/admin/search', [AdminController::class, 'ruang'])->name('admin.ruang');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::get('/admin/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{id}', [AdminController::class, 'updatelist'])->name('admin.updatelist');
//login regis 
Auth::routes();