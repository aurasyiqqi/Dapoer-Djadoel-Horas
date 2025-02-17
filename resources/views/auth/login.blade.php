<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold text-center text-gray-700">Login</h2>
        
        @if (session('success'))
            <div class="text-green-600 text-center">{{ session('success') }}</div>
        @endif
        
        <form action="{{ route('login.store') }}" method="POST" class="mt-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-100">
            </div>
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-100">
            </div>
            <a href="{{ route('dashboard.admin') }}" class="block w-full mt-6 bg-yellow-500 text-white py-2 text-center rounded-lg hover:bg-yellow-600 transition">
                Login
            </a>                        
        </form>
        <p class="mt-4 text-sm text-center text-gray-600">Belum punya akun? <a href="{{ route('register.form') }}" class="text-yellow-600">Daftar</a></p>
    </div>
</body>
</html>