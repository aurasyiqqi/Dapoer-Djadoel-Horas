<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => [
            'required',
            'min:6',
            'confirmed',
            'regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/'
        ],
    ], [
        'name.regex' => 'Nama hanya boleh mengandung huruf dan spasi.',
        'email.unique' => 'Email sudah terdaftar, silakan gunakan email lain.',
        'password.regex' => 'Password harus mengandung minimal satu huruf dan satu angka.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
    ]);

    // Tambahkan role default sebagai "user"
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user', // Default role user
    ]);

    return redirect()->route('login.form')->with('success', 'Registrasi berhasil! Silakan login.');
}

    

    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $user = Auth::user();

        // Redirect berdasarkan role
        if ($user->role == 'admin') {
            return redirect()->route('dashboard.admin');
        } else {
            return redirect()->route('/');
        }
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->withInput();
}



    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('success', 'Anda telah logout.');
    }
};