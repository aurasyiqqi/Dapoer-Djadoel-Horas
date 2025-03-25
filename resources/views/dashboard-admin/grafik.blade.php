@extends('layouts.dashboard-admin')

@section('content')
 <!-- Main Content -->
 <main class="flex-1 p-10 flex flex-col gap-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold">Hi, Admin</h1>
            <p class="text-gray-600">Ready to start your day with some pitch decks?</p>
        </div>
        <div class="flex items-center space-x-4">
            <button class="p-2 bg-gray-200 rounded-full">✉️</button>
            <button class="p-2 bg-gray-200 rounded-full">🔔</button>
        </div>
    </div>

    <!-- Grafik Pendapatan -->
    <div class="w-full p-6 bg-white shadow-md rounded-lg h-[400px]">
        <h2 class="text-2xl font-bold mb-4">Grafik Pendapatan Per Kategori</h2>

        <!-- Dropdown Select -->
        <label for="categorySelect" class="font-semibold">Pilih Kategori:</label>
        <select id="categorySelect" class="border p-2 rounded">
            <option value="all">All Variasi</option>
            <option value="kue-kering">Kue Kering</option>
            <option value="kue-jadul">Kue Jadul</option>
            <option value="manisan">Manisan</option>
        </select>

        <canvas id="revenueChart" class="w-full h-full"></canvas>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');

    const dataKategori = {
        "all": [
            { label: 'All Variasi', data: [12000, 15000, 13000, 17000, 14000, 16000, 19000, 18000, 20000, 22000, 21000, 23000], backgroundColor: 'rgba(54, 162, 235, 0.6)' }
        ],
        "kue-kering": [
            { label: 'Kue Kering', data: [8000, 9000, 7000, 11000, 9500, 10200, 12000, 11500, 13000, 14000, 13500, 15000], backgroundColor: 'rgba(255, 99, 132, 0.6)' }
        ],
        "kue-jadul": [
            { label: 'Kue Jadul', data: [6000, 7500, 6200, 8000, 7200, 7800, 9000, 8800, 10000, 10500, 10200, 11000], backgroundColor: 'rgba(255, 206, 86, 0.6)' }
        ],
        "manisan": [
            { label: 'Manisan', data: [5000, 6200, 5800, 7000, 6500, 6800, 7500, 7200, 8500, 8900, 8700, 9000], backgroundColor: 'rgba(75, 192, 192, 0.6)' }
        ]
    };

    let revenueChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: dataKategori["all"]
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

    document.getElementById('categorySelect').addEventListener('change', function() {
        let selectedCategory = this.value;
        revenueChart.data.datasets = dataKategori[selectedCategory];
        revenueChart.update();
    });
</script>
@endsection
