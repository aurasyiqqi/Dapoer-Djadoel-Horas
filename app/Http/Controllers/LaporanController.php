<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Import model Order
use App\Exports\OrdersExport; // Import export class
use Maatwebsite\Excel\Facades\Excel; // Import Excel

class LaporanController extends Controller
{
    public function index()
    {
        $orders = Order::all(); // Ambil semua data dari database
        return view('dashboard-admin.laporan', compact('orders')); // Kirim ke tampilan laporan.blade.php
    }

    public function export()
    {
        return Excel::download(new OrdersExport, 'laporan_orders.xlsx');
    }
}
