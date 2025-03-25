<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ProdukController extends Controller
{
     // Menampilkan halaman daftar produk
     public function index(Request $request)
     {
         $kategori = $request->query('kategori');
     
         if ($kategori && $kategori != 'All Varian') {
             $produks = Produk::where('kategori', $kategori)->get();
         } else {
             $produks = Produk::all();
         }
     
         return view('dashboard-admin.editor', compact('produks'));
     }
     
 
     // Menampilkan form tambah produk (INI YANG KURANG)
     public function create(Request $request) 
     {
     return view('dashboard-admin.produk-create');
     }
     
 
 // Menyimpan produk ke database
 public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|integer|min:1',
        'description' => 'nullable|string',
        'kategori' => 'required|string', // Tambah validasi kategori
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $lastNo = Produk::max('no') ?? 0;
    $newNo = $lastNo + 1;

    $imagePath = $request->hasFile('image') ? $request->file('image')->store('produk', 'public') : null;

    Produk::create([
        'no' => $newNo,
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'kategori' => $request->kategori, // Simpan kategori
        'image' => $imagePath,
        'stock' => $request->stock,
    ]);

    return redirect()->route('admin.editor')->with('success', 'Produk berhasil ditambahkan!');
    }
     
     public function update(Request $request, $no)
     {
        
         $request->validate([
             'name' => 'required|string|max:255',
             'price' => 'required|numeric',
             'stock' => 'required|integer|min:1',
             'description' => 'nullable|string',
             'kategori' => 'required|string', // Validasi kategori
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);
     
         $produk = Produk::where('no', $no)->firstOrFail();
         $data = $request->except('image');
     
         if ($request->hasFile('image')) {
             if ($produk->image) {
                 Storage::delete('public/' . $produk->image);
             }
             $data['image'] = $request->file('image')->store('produk', 'public');
         }
     
         $produk->update($data);
     
         return redirect()->route('admin.editor')->with('success', 'Produk berhasil diperbarui!');
     }

     public function destroy($no)
     {
         // Cari produk berdasarkan 'no' lalu hapus
         $produk = Produk::where('no', $no)->firstOrFail();
         $produk->delete();
     
         // Update ulang nomor urut biar tetap berurutan
         $produks = Produk::orderBy('no')->get(); // Ambil semua produk setelah penghapusan
         foreach ($produks as $index => $item) {
             $item->update(['no' => $index + 1]); // Set nomor urut baru mulai dari 1
         }
     
         return redirect()->route('admin.editor')->with('success', 'Produk berhasil dihapus dan nomor urut diperbarui!');
     }
          // Menampilkan halaman edit produk
          public function edit($no)
          {
              $produk = Produk::where('no', $no)->firstOrFail();
              return view('dashboard-admin/produk-create', compact('produk'));
          }
     
     

     
}; 