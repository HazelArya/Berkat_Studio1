<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function karyawanDashboard()
    {
        return view('karyawan.dashboard');
    }

    public function customerDashboard()
    {
        return view('dashboard');
    }
}
