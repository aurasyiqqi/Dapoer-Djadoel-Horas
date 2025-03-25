<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Order::all(['id', 'nama', 'no_whatsapp', 'email', 'jumlah', 'harga', 'ekspedisi', 'status']);
    }

    public function headings(): array
    {
        return ["ID", "Nama", "No WhatsApp", "Email", "Jumlah", "Harga", "Ekspedisi", "Status"];
    }
}
