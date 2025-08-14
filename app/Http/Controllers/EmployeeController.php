<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\EmployeeDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\Booking;

use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = User::where('usertype', 'karyawan')->get();
        return view('admin.dashboard', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_karyawan' => 'required|string|max:255',
            'masuk' => 'required|integer|min:0',
            'sakit' => 'required|integer|min:0',
            'izin' => 'required|integer|min:0',
            'gaji' => 'required|numeric|min:0',
            'bulan' => 'required|string|max:255',
        ]);

        EmployeeDetail::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Data karyawan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data EmployeeDetail berdasarkan ID
        $employee = EmployeeDetail::findOrFail($id);
    
        // Tampilkan view edit dengan data karyawan
        return view('admin.edit-karyawan', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data input
        $validated = $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'masuk' => 'required|integer|min:0',
            'sakit' => 'required|integer|min:0',
            'izin' => 'required|integer|min:0',
            'gaji' => 'required|numeric|min:0',
            'bulan' => 'required|string|max:255',
        ]);
    
        // Temukan data EmployeeDetail berdasarkan ID
        $employee = EmployeeDetail::findOrFail($id);
    
        // Perbarui data karyawan
        $employee->update($validated);
    
        // Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'Data karyawan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function storeAttendance(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'status' => 'required|in:masuk,sakit,izin',
        ]);
    
        $bulanSekarang = Carbon::now()->format('F Y');
        $tanggalHariIni = Carbon::now()->toDateString(); // Format "2024-11-26"
    
        $employeeDetail = EmployeeDetail::where('user_id', $user->id)
            ->where('bulan', $bulanSekarang)
            ->first();
    
        if (!$employeeDetail) {
            $employeeDetail = EmployeeDetail::create([
                'user_id' => $user->id,
                'nama_karyawan' => $user->name,
                'masuk' => 0,
                'sakit' => 0,
                'izin' => 0,
                'gaji' => 0,
                'bulan' => $bulanSekarang,
            ]);
        }
    
        // Cek apakah karyawan sudah absen hari ini
        if ($employeeDetail->updated_at->toDateString() === $tanggalHariIni) {
            return redirect()->back()->withErrors(['message' => 'Anda sudah melakukan absensi hari ini!']);
        }
    
        $employeeDetail->increment($validated['status']);
        $employeeDetail->touch(); // Update kolom `updated_at`
    
        return redirect()->back()->with('success', 'Absensi berhasil!');
    }
}