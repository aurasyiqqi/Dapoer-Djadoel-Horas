@extends('layouts.dashboard-admin')
@section('content')
<main class="flex-1 p-10">
    <div class="flex justify-between items-center mb-6">
        <div>
            @if(session('success'))
                <div class="bg-green-500 text-white p-3 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <h1 class="text-3xl font-bold">Hi, Admin</h1>
            <p class="text-gray-600">Ready to start your day with some pitch decks?</p>
        </div>
        <a href="{{ route('admin.produk.create') }}" 
           class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
            + Tambah Barang
        </a>
    </div>
    <form method="GET" action="{{ route('admin.editor') }}">
        <select name="kategori" class="border p-2 rounded" onchange="this.form.submit()">
            <option value="All Varian">kategori</option>
            <option value="Manisan" {{ request('kategori') == 'Manisan' ? 'selected' : '' }}>Manisan</option>
            <option value="Kue Jadul" {{ request('kategori') == 'Kue Jadul' ? 'selected' : '' }}>Kue Jadul</option>
        </select>
    </form>
    

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Overview</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left">NO</th>
                        <th class="py-2 px-4 text-left">IMAGE</th>
                        <th class="py-2 px-4 text-left">PRODUCT NAME</th>
                        <th class="py-2 px-4 text-left">PRICE</th>
                        <th class="py-2 px-4 text-left">STOCK</th>
                        <th class="py-2 px-4 text-left">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($produks) && $produks->count() > 0)
                        @foreach ($produks as $index => $produk)
                            <tr class="border-t">
                                <td class="py-2 px-4">{{ $loop->iteration }}</td> 
                                <td class="py-2 px-4">
                                    <img src="{{ asset('storage/' . $produk->image) }}" class="w-10 h-10"/>
                                </td>
                                <td class="py-2 px-4">{{ $produk->name }}</td>
                                <td class="py-2 px-4 text-blue-500">¥ {{ number_format($produk->price, 2) }}</td>
                                <td class="py-2 px-4 text-purple-500">{{ $produk->stock }}</td>
                                <td class="py-2 px-4 flex gap-2">
                                    <a href="{{ route('admin.produk.edit', $produk->no) }}" 
                                       class="bg-blue-500 text-white px-4 py-2 rounded-lg">Edit</a>
                                       <form action="{{ route('admin.produk.destroy', $produk->no) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                            Hapus
                                        </button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center py-4">Tidak ada produk tersedia.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
