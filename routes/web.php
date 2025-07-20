<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GunungController,
    AdminController,
    AdminGunungController,
    AdminPengalamanController,
    AdminTourController,
    AdminUserController,
    TourController,
    PengalamanController,
    UserController
};

// Halaman publik tanpa login
Route::get('/', [GunungController::class, 'index'])->name('beranda');
Route::get('/jelajah', [GunungController::class, 'jelajah'])->name('jelajah');
Route::get('/gunung/{id}', [GunungController::class, 'show'])->name('gunung.show');

// Register & Login untuk User (guest only)
Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.store');

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.store');

// Logout untuk user (harus login)
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Halaman khusus user yang harus login
Route::middleware('auth:web')->group(function () {

    Route::get('/akun', [UserController::class, 'akun'])->name('akun');
    Route::get('/akun/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/akun/update', [UserController::class, 'update'])->name('user.update');

    Route::get('/cuaca', [GunungController::class, 'cuaca'])->name('cuaca');

    // web.php
    Route::post('/gunung/favorit/{id}', [GunungController::class, 'favorit'])->name('gunung.favorit');
    Route::delete('/gunung/favorit/{id}', [GunungController::class, 'hapusFavorit'])->name('gunung.favorit.hapus');


    Route::get('/pengalaman/tambah', [PengalamanController::class, 'create'])->name('pengalaman.create');
    Route::post('/gunung/{id}/pengalaman', [PengalamanController::class, 'store'])->name('pengalaman.store');

    Route::post('/gunung/{id}/tour', [TourController::class, 'store'])->name('tour.store');
});


/*
    ===========================
    ADMIN ROUTES
    ===========================
    */
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// Logout admin (harus login admin)
Route::post('admin/logout', [AdminController::class, 'logout'])->middleware('auth:admin')->name('admin.logout');

// Semua route admin yang harus login admin
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('index', [AdminController::class, 'index'])->name('index');

    Route::resource('gunung', AdminGunungController::class);
    Route::resource('pengalaman', AdminPengalamanController::class);
    Route::resource('tour', AdminTourController::class);
    Route::resource('user', AdminUserController::class);
});
