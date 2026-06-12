<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUlasan = 0; // akan diisi setelah model Ulasan dibuat

        return view('admin.dashboard', compact('totalUlasan'));
    }
}
