@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="min-h-screen flex bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg">
        <div class="p-6 text-lg font-bold text-purple-700">
            <span class="text-yellow-500">Pitch</span>.io
        </div>
        <nav class="mt-6">
            <a href="{{ route('dashboard.admin') }}" 
               class="block py-2.5 px-6 text-gray-700 hover:bg-yellow-200 {{ request()->routeIs('dashboard.admin') ? 'bg-yellow-300' : '' }}">
               Dashboard</a>
    
            <a href="{{ route('admin.editor') }}" 
               class="block py-2.5 px-6 text-gray-700 hover:bg-yellow-200 {{ request()->routeIs('admin.editor') ? 'bg-yellow-300' : '' }}">
               Tambah Produk</a>
    
            <a href="{{ route('admin.grafik')}}" 
               class="block py-2.5 px-6 text-gray-700 hover:bg-yellow-200 {{ request()->routeIs('admin.grafik') ? 'bg-yellow-300' : '' }}">
               Grafik</a>
            
            <a href="{{ route('admin.laporan')}}" 
            class="block py-2.5 px-6 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('admin.laporan') ? 'bg-yellow-300' : '' }}">
            Laporan</a>
        </nav>

        <div class="p-6">
            <button class="w-full bg-purple-500 text-white py-2 rounded-lg hover:bg-purple-600">Upgrade</button>
        </div>
    </aside>

    <!-- dropdown icon logout di profile-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let logoutButton = document.getElementById('logoutButton');
            let dropdown = document.getElementById('logoutDropdown');
            
            if (logoutButton && dropdown) {
                logoutButton.addEventListener('click', function() {
                    dropdown.classList.toggle('hidden');
                });
    
                // Menutup dropdown jika klik di luar
                document.addEventListener('click', function(event) {
                    if (!logoutButton.contains(event.target) && !dropdown.contains(event.target)) {
                        dropdown.classList.add('hidden');
                    }
                });
            }
        });
    </script>

    @yield('content')
</div>