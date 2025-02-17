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
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')));
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <!-- navigasi -->
    <nav class="fixed top-0 left-0 w-full flex justify-between items-center py-3 px-6 bg-white shadow-md z-50">
        <div class="flex items-center">
            <img src="assets/fastdelivery.jpg" alt="Logo" class="h-12 w-12">
            <a class="text-xl font-bold ml-3">Dapoer Jadoel</a>
        </div>
        <ul class="hidden md:flex space-x-6 text-gray-700 font-semibold">
            <li><a href="#Home" class="hover:text-yellow-500">Home</a></li>
            <li><a href="#About" class="hover:text-yellow-500">About</a></li>
            <li><a href="#Menu" class="hover:text-yellow-500">Menu</a></li>
            <li><a href="#Service" class="hover:text-yellow-500">Service</a></li>
            <li><a href="#Contact" class="hover:text-yellow-500">Contact</a></li>
        </ul>
       <a href="{{ route('login.form') }}" class="hidden md:block bg-yellow-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-yellow-600">
            Login</a> 
         </nav>
    
    <!-- Hero Section -->
    <section id="Home" class="relative flex items-center justify-between px-20 pt-40">
        <!-- Setengah Lingkaran Kiri -->
        <div class="absolute w-96 h-96 bg-yellow-600 right-0 top-1/2 transform -translate-y-1/2 opacity-30 z-0 rounded-l-full mt-16"></div>
    
        <!-- Kontainer Flex -->
        <div class="w-full flex items-center justify-between">
            <!-- Teks (di sebelah kanan) -->
            <div class="relative md:w-1/2 p-8 z-10 text-left">
                <h1 class="text-5xl font-bold text-gray-900">
                    Rasa <span class="text-yellow-500">Otentik</span> <br>
                    Kenangan <br>
                    Setiap <span class="text-yellow-500">Sajian</span>
                </h1>
                <p class="text-gray-700 mt-4">
                    "Dapoer Djadoel menghadirkan kembali kehangatan dan kelezatan hidangan tempo dulu dengan cita rasa autentik yang diwariskan dari generasi ke generasi, membawa kenangan manis dalam setiap suapan."
                </p>               
            </div>
    
            <!-- Gambar atau Ilustrasi (di sebelah kiri teks) -->
            <div class="w-1/2 flex justify-center">
                <img src="assets/landingpagehome.jpg" alt="Gambar Makanan" class="w-64 h-auto">
            </div>
        </div>
    </section>

     <!-- Container utama -->
     <section class=" min-h-screen relative flex items-center justify-center w-3/4 mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        
        <!-- Background Kiri -->
        <div class="absolute left-0 top-0 h-full w-1/4 bg-yellow-500"></div>
        
        <!-- Konten -->
        <div class="relative flex w-full">
            <!-- Gambar -->
            <div class="w-1/2 h-[500px] flex justify-center items-center relative z-10 px-16">
                <img src="{{asset ('assets/bestquality.jpg')}}" alt="Makanan" class="w-[350px] h-auto rounded-lg shadow-md">
            </div>

            <!-- Teks -->
            <div class="w-1/2 p-8 relative z-10">
                <h2 class="text-xl font-bold text-yellow-500">ABOUT <span class="text-black">PRODUCTS</span></h2>
                <p class="text-gray-700 mt-4">
                    "Dapoer Djadoel menghadirkan kembali kehangatan dan kelezatan hidangan tempo dulu dengan cita rasa autentik yang diwariskan dari generasi ke generasi, membawa kenangan manis dalam setiap suapan."
                </p>
                <button class="mt-6 bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-600 transition">
                    ORDER NOW
                </button>
            </div>
        </div>

    </section>  
    

    <section id="Menu" class="w-full px-6 md:px-32 py-10 bg-gray-100">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold">Our Menu</h2>
            <p class="text-4xl font-bold text-yellow-600 mt-2">The most popular</p>
        </div>
        
        <div class="flex flex-col md:flex-row justify-center items-center gap-8">
            <!-- Kotak Pertama -->
            <div class="bg-white shadow-lg rounded-lg p-6 w-full md:w-1/3">
                <img src="{{ asset('assets/landingpagehome.jpg') }}" alt="Feature 1" class="w-full h-32 object-cover rounded-t-lg"> <!-- Gambar di atas -->
                <h3 class="text-xl font-semibold mt-4">Kue Kering</h3>
                <p class="text-gray-600 mt-2">Description of feature 1 goes here. This is a brief overview of what this feature offers.</p>
            </div>
    
            <!-- Kotak Kedua -->
            <div class="bg-white shadow-lg rounded-lg p-6 w-full md:w-1/3">
                <img src="{{ asset('assets/fastdelivery.jpg') }}" alt="Feature 2" class="w-full h-32 object-cover rounded-t-lg"> <!-- Gambar di atas -->
                <h3 class="text-xl font-semibold mt-4">Kue Djadoel</h3>
                <p class="text-gray-600 mt-2">Description of feature 2 goes here. This is a brief overview of what this feature offers.</p>
            </div>
    
            <!-- Kotak Ketiga -->
            <div class="bg-white shadow-lg rounded-lg p-6 w-full md:w-1/3">
                <img src="{{ asset('assets/bestquality.jpg') }}" alt="Feature 3" class="w-full h-32 object-cover rounded-t-lg"> <!-- Gambar di atas -->
                <h3 class="text-xl font-semibold mt-4">Asinan</h3>
                <p class="text-gray-600 mt-2">Description of feature 3 goes here. This is a brief overview of what this feature offers.</p>
            </div>
        </div>
    </section>

    <section id="Service" class="py-12 text-center">
        <h2 class="text-3xl font-bold mb-6">Contact Us</h2>
        <p class="text-gray-600 mb-4">Stay connected with us on social media</p>
        <div class="flex justify-center space-x-6">
            <a href="https://instagram.com" target="_blank" class="text-pink-500 text-3xl">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://facebook.com" target="_blank" class="text-blue-600 text-3xl">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="https://twitter.com" target="_blank" class="text-blue-400 text-3xl">
                <i class="fab fa-twitter"></i>
            </a>
        </div>
    </section>

    <footer class="text-center text-gray-500 text-sm py-4">
        &copy; {{ date('Y') }} All Rights Reserved.
    </footer>
    


    
    
</body>
</html>
