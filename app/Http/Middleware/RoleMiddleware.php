<?php
// FILE: app/Http/Middleware/RoleMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Cara pakai di route:
     *   ->middleware('role:admin')
     *   ->middleware('role:admin,super_admin')   ← multi role
     */
    public function handle(Request $request, Closure $next, string ...$roles): mixed
    {
        // Belum login
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $userRole = Auth::user()->role;

        // Cek apakah role user ada di daftar yang diizinkan
        if (!in_array($userRole, $roles)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
