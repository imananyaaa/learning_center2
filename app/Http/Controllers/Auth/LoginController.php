<?php
// FILE: app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login
     */
    public function showLoginForm()
    {
        // Jika sudah login, redirect sesuai role
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user());
        }
        return view('auth.login');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
        ]);

        $credentials = $request->only('email', 'password');
        $remember    = $request->boolean('remember');

        // Coba login
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Cek apakah user aktif (jika ada kolom is_active)
            // if (!$user->is_active) {
            //     Auth::logout();
            //     return back()->withErrors(['email' => 'Akun Anda tidak aktif.'])->onlyInput('email');
            // }

            // Redirect berdasarkan role
            return $this->redirectByRole($user);
        }

        // Login gagal
        return back()
            ->withErrors(['email' => 'Email atau password salah.'])
            ->onlyInput('email');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Anda berhasil keluar.');
    }

    /**
     * Redirect berdasarkan role user
     */
    private function redirectByRole($user)
    {
        // Sesuaikan dengan nama role di database Anda
        switch ($user->role) {
            case 'super_admin':
            case 'superadmin':
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Selamat datang, Super Admin!');

            case 'admin':
            case 'admin_lc':
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Selamat datang, ' . $user->name . '!');

            default:
                // Role tidak dikenal — logout dan kembalikan ke login
                Auth::logout();
                return redirect()->route('login')
                    ->withErrors(['email' => 'Anda tidak memiliki akses ke panel admin.']);
        }
    }
}
