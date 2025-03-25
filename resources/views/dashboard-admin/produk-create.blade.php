@extends('layouts/dashboard-admin')

@section('content')

<div class="ml-40">

<!-- Form Ngapung di Tengah & Pas di Layar -->

<div class="ml-40">
<a href="{{ route('admin.editor') }}" class="absolute top-6 left-6 flex items-center text-blue-500 hover:text-blue-700">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
    </svg>
    Kembali
</a>
</div>

<div class="max-w-4xl mx-auto p-6 rounded-lg ml-50">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-2xl w-full h-auto max-h-[90vh] overflow-y-auto">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">
            {{ isset($produk) ? 'Edit Produk' : 'Tambah Produk' }}
        </h2>
        <form action="{{ isset($produk) ? route('admin.produk.update', $produk->id) : route('admin.produk.store') }}" 
            method="POST" enctype="multipart/form-data">
          @csrf
          @isset($produk)
              @method('PUT')
          @endisset
      
      
            <!-- Input Fields -->
            <div class="mb-4">
                <label for="category" class="block text-gray-700 font-bold mb-2">Kategori</label>
                <select name="category" id="category" class="w-full px-3 py-2 border rounded">
                    <option value="Pilih Kategori" {{ isset($produk) && $produk->category == 'Pilih Kategori' ? 'selected' : '' }}>Pilih Katergori</option>
                    <option value="Manisan" {{ isset($produk) && $produk->category == 'Manisan' ? 'selected' : '' }}>Manisan</option>
                    <option value="Kue Jadul" {{ isset($produk) && $produk->category == 'Kue Jadul' ? 'selected' : '' }}>Kue Jadul</option>
                </select>
            </div>            
            
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-1" for="name">Nama Produk</label>
                    <input type="text" name="name" id="name" required 
                           value="{{ old('name', $produk->name ?? '') }}" 
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label class="block text-gray-700 font-bold mb-1" for="price">Harga</label>
                        <input type="number" name="price" id="price" required 
                               value="{{ old('price', $produk->price ?? '') }}" 
                               class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div class="w-1/2">
                        <label class="block text-gray-700 font-bold mb-1" for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" required
                               value="{{ old('stock', $produk->stock ?? '') }}" 
                               class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400">
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-1" for="image">Upload Gambar</label>
                    <input type="file" name="image" id="image"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400">     
                    @if(isset($produk) && $produk->image)
                        <p class="text-sm text-gray-500 mt-2">Gambar saat ini:</p>
                        <img src="{{ asset('storage/' . $produk->image) }}" class="w-32 h-32 object-cover mt-2 rounded-lg shadow">
                    @endif
                </div>

            <!-- Tombol Submit -->
            <div class="mt-6 flex justify-end">
                <button type="submit" 
                    class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition-all">
                    {{ isset($produk) ? 'Update Produk' : 'Tambah Produk' }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
