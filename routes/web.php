<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Admin\GrafikController;
use App\Http\Controllers\LaporanController;


// Halaman utama
Route::get('/', function () {
    return view('welcome'); // Ganti ke halaman utama yang sesuai
});

// **Auth Routes**
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// **Dashboard Admin (Harus Login)**
Route::middleware('auth')->group(function () {
    Route::get('/dashboard-admin', [AdminController::class, 'admin'])->name('dashboard.admin');
    Route::get('/admin-editor', [AdminController::class, 'editor'])->name('admin.editor');
// **Dashboard User (Harus Login)**
    Route::get('/dashboard-user', function () {
        return view('user.dashboard'); 
    })->name('dashboard.user');

    

    Route::prefix('admin/produk')->group(function () {
        Route::get('/admin/editor', [ProdukController::class, 'index'])->name('admin.editor'); // Menampilkan daftar produk
        Route::get('/admin/produk/create', [ProdukController::class, 'create'])->name('admin.produk.create'); // Form tambah produk
        Route::post('/', [ProdukController::class, 'store'])->name('admin.produk.store'); // Simpan produk baru
        Route::delete('/{no}/delete', [ProdukController::class, 'destroy'])->name('admin.produk.destroy'); // Hapus produk
        Route::get('/{no}/edit', [ProdukController::class, 'edit'])->name('admin.produk.edit'); // Form edit produk
        Route::put('/{no}/update', [ProdukController::class, 'update'])->name('admin.produk.update'); // Update produk
    });


         // **Routes Grafik**
    Route::get('/admin/grafik', [GrafikController::class, 'index'])->name('admin.grafik');

    //**Route Laporan */
    Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan'); 
    Route::get('/export-orders', [LaporanController::class, 'export'])->name('export.orders');
    });    
