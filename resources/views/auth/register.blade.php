<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center text-gray-700">Register</h2>

        {{-- Menampilkan pesan error jika ada
        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded-lg text-sm mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <form action="{{ route('register.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-2">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-yellow-500 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-yellow-500 @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-2">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-yellow-500 @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-yellow-500 @error('password_confirmation') border-red-500 @enderror">
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-600 transition">
                Daftar
            </button>
        </form>
        
        <p class="mt-4 text-sm text-center text-gray-600">Sudah punya akun? <a href="{{ route('login.form') }}" class="text-yellow-600">Login</a></p>
    </div>
</body>
</html>
