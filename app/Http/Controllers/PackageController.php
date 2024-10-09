<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package; // Pastikan model Package sudah ada

class PackageController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil semua data dari tabel packages
        $packages = Package::all();

        // Mengirimkan data ke view
        return view('package', ['package' => $packages]);
    }
}

