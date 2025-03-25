@extends('layouts.dashboard-admin')
@section('content')
 <!-- Main Content -->
 <main class="flex-1 p-10">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
<h1 class="text-3xl font-bold">Hi, Admin</h1>
<p class="text-gray-600">Ready to start your day with some pitch decks?</p>
</div>
<div class="flex items-center space-x-4">
<button class="p-2 bg-gray-200 rounded-full">✉️</button>
<button class="p-2 bg-gray-200 rounded-full">🔔</button>

<!-- Logout Icon -->
<div class="relative inline-block">
    <button id="logoutButton">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
            <path d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/>
        </svg>    
    </button>

 

    <!-- Dropdown Menu -->
    <div id="logoutDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg">
        <form action="{{ route('logout') }}" method="POST" class="block w-full">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">
                Logout
            </button>
        </form>
        <a href="{{ url('/') }}" class="block w-full px-4 py-2 text-gray-700 hover:bg-gray-200">
            Home
        </a>
    </div>
</div>

<script>
    document.getElementById('logoutButton').addEventListener('click', function() {
        let dropdown = document.getElementById('logoutDropdown');
        dropdown.classList.toggle('hidden');
    });

    // Menutup dropdown jika klik di luar
    document.addEventListener('click', function(event) {
        let dropdown = document.getElementById('logoutDropdown');
        let button = document.getElementById('logoutButton');

        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
</div>
</div>
<div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-4">Laporan Pesanan</h2>

    <div class="mb-4 flex items-center gap-4">
    <input type="text" id="searchInput" placeholder="Search" class="p-2 border rounded-md w-1/2">
    <a href="{{ route('export.orders') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 9.75V18a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 18V9.75m3.75 3L12 15.75m0 0l3.75-3m-3.75 3V4.5" />
        </svg>
        Export
    </a>
</div>

    
    

    <table class="w-full border-collapse border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">No</th>
                <th class="border p-2">Nama</th>
                <th class="border p-2">No WhatsApp</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Jumlah</th>
                <th class="border p-2">Harga</th>
                <th class="border p-2">Ekspedisi</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @foreach ($orders as $index => $order)
                <tr class="text-center">
                    <td class="border p-2">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                    <td class="border p-2">{{ $order->nama }}</td>
                    <td class="border p-2">{{ $order->whatsapp }}</td>
                    <td class="border p-2">{{ $order->email }}</td>
                    <td class="border p-2">{{ $order->jumlah }}</td>
                    <td class="border p-2">Rp {{ number_format($order->harga, 0, ',', '.') }}</td>
                    <td class="border p-2">{{ $order->ekspedisi }}</td>
                    <td class="border p-2">
                        <span class="px-3 py-1 rounded-lg text-white {{ $order->status == 'Pending' ? 'bg-red-400' : 'bg-green-400' }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td class="border p-2">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded-md">Detail</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#tableBody tr");

        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>
@endsection
