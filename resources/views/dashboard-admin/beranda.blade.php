@extends('layouts.dashboard-admin')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Main Content -->
<main class="flex-1 p-4 md:p-10">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
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
        </div>
    </div>

    <select name="" id="" class="p-3 mb-5 border rounded focus:ring focus:ring-gray-200">
        <option value="Kategori">Kategori</option>
        <option value="">Kue Kering</option>
        <option value="">Kue Jadol</option>
        <option value="">Asinan</option>
    </select>
    
    <!-- Overview Stats -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="h-24 flex items-center justify-center bg-yellow-300 text-white rounded-lg text-center p-2">
            110 Penjualan 
        </div>
        <div class="h-24 flex items-center justify-center bg-purple-500 text-white rounded-lg text-center p-2">
            Sisa Produk
        </div>
        <div class="h-24 flex items-center justify-center bg-gray-400 text-white rounded-lg text-center p-2">
            91 Terjual
        </div>
        <div class="h-24 flex items-center justify-center bg-gray-300 text-gray-700 rounded-lg text-center p-2">
            126 Total Views
        </div>
    </div>

    <!-- Grafik Pendapatan -->
    <div class="w-full bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Grafik Pendapatan</h2>
        <div class="w-full">
            <canvas id="revenueChart" class="w-full h-[400px]"></canvas>
        </div>
    </div>
</main>
    
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const revenueData = @json($revenueData);
        const ctx = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: revenueData.labels,
                datasets: [{
                    label: 'Pendapatan (IDR)',
                    data: revenueData.data,
                    backgroundColor: 'rgba(103, 58, 183, 0.2)',
                    borderColor: 'rgba(103, 58, 183, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
<script>
    document.getElementById('logoutButton').addEventListener('click', function() {
        let dropdown = document.getElementById('logoutDropdown');
        dropdown.classList.toggle('hidden');
    });

    document.addEventListener('click', function(event) {
        let dropdown = document.getElementById('logoutDropdown');
        let button = document.getElementById('logoutButton');
        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
@endsection
