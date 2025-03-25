<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Untuk menampilkan layout dashboard admin
    public function admin() {
        // Data Dummy Pendapatan per Bulan
        $revenueData = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'data' => [5000, 7000, 8000, 12000, 15000, 14000, 18000, 22000, 25000, 23000, 28000, 30000]
        ];
    
        // Kirim data ke view dashboard-admin.beranda
        return view('dashboard-admin.beranda', compact('revenueData'));
    }    

    //Untuk menampilkan halaman editor
    public function editor() {
        return view('dashboard-admin.editor');
    }
    
};
