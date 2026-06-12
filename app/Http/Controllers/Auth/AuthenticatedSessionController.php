<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan halaman login.
     * Jika sudah login, langsung redirect sesuai role.
     */
    public function create(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.login');
    }

    /**
     * Proses login & redirect berdasarkan role.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        return $this->redirectByRole(Auth::user());
    }

    /**
     * Logout — kembali ke halaman login.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    /**
     * Redirect berdasarkan role user.
     */
    private function redirectByRole(User $user): RedirectResponse
{
    switch ($user->role) {
        case 'super_admin':
        case 'superadmin':
        case 'admin':
        case 'admin_lc':
            return redirect()->route('admin.dashboard')
                ->with('success', 'Selamat datang, ' . $user->name . '!');

        default:
            Auth::logout();

            return redirect()->route('login')
                ->withErrors([
                    'email' => 'Anda tidak memiliki akses ke panel admin.'
                ]);
    }
}
}
