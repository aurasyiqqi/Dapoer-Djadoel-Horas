@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="min-h-screen flex bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg">
        <div class="p-6 text-lg font-bold text-purple-700">
            <span class="text-yellow-500">Pitch</span>.io
        </div>
        <nav class="mt-6">
            <a href="{{ route('dashboard.admin') }}" class="block py-2.5 px-6 text-gray-700 hover:bg-gray-200">Dashboard</a>
            <a href="{{ route('admin.editor') }}" class="block py-2.5 px-6 text-gray-700 hover:bg-gray-200">Editor</a>
            <a href="#" class="block py-2.5 px-6 text-gray-700 hover:bg-gray-200">Leads</a>
            <a href="#" class="block py-2.5 px-6 text-gray-700 hover:bg-gray-200">Settings</a>
            <a href="#" class="block py-2.5 px-6 text-gray-700 hover:bg-gray-200">Preview</a>
        </nav>
        <div class="p-6">
            <button class="w-full bg-purple-500 text-white py-2 rounded-lg hover:bg-purple-600">Upgrade</button>
        </div>
    </aside>

    @yield('content')
</div>
