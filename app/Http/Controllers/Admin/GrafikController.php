<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function index()
    {
        // Data dummy untuk grafik batang pendapatan per kategori
        $data = [
            'labels' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            'pendapatan' => [
                'All Variasi' => [500, 700, 800, 600, 900, 1000, 750, 820, 890, 920, 870, 950],
                'Kue Kering' => [300, 400, 500, 450, 600, 700, 580, 620, 690, 720, 680, 750],
                'Kue Jadul' => [200, 300, 400, 350, 500, 600, 480, 520, 590, 620, 580, 650],
                'Manisan' => [100, 200, 300, 250, 400, 500, 380, 420, 490, 520, 480, 550],
            ],
        ];

        return view('dashboard-admin.grafik', compact('data'));
    }
}
