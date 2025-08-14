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
        // dd($packages);

        // Mengirimkan data ke view
        return view('package', ['package' => $packages]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_date' => ['required', 'date', 'after_or_equal:today'],
            'package_id' => ['required', 'exists:packages,id'],
            // Validasi lainnya
        ]);
    }
}

