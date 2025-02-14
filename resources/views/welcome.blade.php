<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <!-- navigasi -->
    <nav class="bg-gray-100 py-4 flex justify-center relative">
        <div class="container flex items-center justify-between mx-auto">
            <!-- Logo di Kiri -->
            <a class="text-xl font-bold">Dapoer Jadoel</a>
    
            <!-- Menu di Tengah -->
            <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 flex space-x-6">
                <a class="text-gray-700 hover:text-red-900" href="#">Home</a>
                <a class="text-gray-700 hover:text-red-900" href="#">Service</a>
                <a class="text-gray-700 hover:text-gray-900" href="#">About</a>
                <a class="text-gray-700 hover:text-gray-900" href="#">Menu</a>
                <a class="text-gray-700 hover:text-gray-900" href="#">Contact</a>
            </div>
    
            <!-- Tombol di Kanan -->
            <button class="bg-yellow-500 text-grey px-4 py-2 rounded-lg hover:bg-yellow-300 ">Register</button>
        </div>
    </nav>

    <!-- hero section -->
    <section class="flex items-center justify-between w-full px-20 mt-12">
        <!-- Teks di Kiri -->
        <div class="w-1/2 text-left">
            <h1 class="text-5xl font-bold leading-tight">
                <span>Enjoy Your</span>  
                <span class="block">Delicious <span class="text-yellow-500">Food</span></span>
            </h1>
            <p class="text-lg font-bold text-gray-600 mt-4">
                We will fill your yummy with Delicious  
                <span class="block">food with fast delivery</span> 
            </p>
        </div>
    
        <!-- Gambar di Kanan -->
        <div class="w-1/2 flex justify-end">
            <img src="{{ asset('assets/landingpagehome.jpg') }}" alt="Delicious Food" class="w-96 rounded-lg shadow-lg">
        </div>
    </section>
    
    
</body>
</html>
