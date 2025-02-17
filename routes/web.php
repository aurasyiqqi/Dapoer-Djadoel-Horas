<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('welcome'); // Ganti ke halaman utama yang sesuai
});

// Route::get('/logins', function () {
//     return 'sahndjsandja';  
// })->name('login');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard-admin', [AdminController::class, 'admin'])->name('dashboard.admin');
Route::get('/admin-editor', [AdminController::class, 'editor'])->name('admin.editor');

