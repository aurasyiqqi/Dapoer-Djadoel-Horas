<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Untuk menampilkan layout dashboard admin
    public function admin() {
        return view('dashboard-admin.beranda');
    }

    //Untuk menampilkan halaman editor
    public function editor() {
        return view('dashboard-admin.editor');
    }
}
