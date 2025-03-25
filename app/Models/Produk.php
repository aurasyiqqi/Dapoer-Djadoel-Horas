<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks'; // Nama tabel di database
    protected $primaryKey = 'no'; // Pakai 'no' sebagai primary key
    public $incrementing = false; // Karena 'no' bukan auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'no',
        'name',
        'price',
        'description',
        'image',
        'stock',
        'kategori',
    ];
}
