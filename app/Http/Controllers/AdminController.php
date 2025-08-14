<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\EmployeeDetail;
use App\Models\User;
use App\Models\Salary;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Daftar Booking sudah ada di fungsi index
    public function index()
    {
        $bookings = Booking::all();
        $users = User::all(); // Tambahkan untuk tabel Data User
        $salaries = Salary::all(); // Tambahkan untuk tabel Penggajian Karyawan
        $reports = Report::all(); // Tambahkan untuk tabel Laporan
        $karyawan = EmployeeDetail::all(); // Ambil data EmployeeDetail
        $successfulBookings = Booking::where('status', 'success')->get();
        
        return view('admin.dashboard', compact('bookings', 'users', 'salaries', 'reports', 'karyawan', 'successfulBookings'));
    }

    // Edit Booking sudah ada
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.edit-booking', compact('booking'));
    }

    // Update Booking sudah ada
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'booking_date' => 'required|date',
            'time_slot' => 'required|string|max:255',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Booking berhasil diperbarui!');
    }

    // Delete Booking sudah ada
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Booking berhasil dihapus!');
    }

    // Fungsi untuk mengedit Data User
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit-user', compact('user'));
    }

    // Fungsi untuk mengupdate Data User
    public function updateUser(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'usertype' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Data user berhasil diperbarui!');
    }

    // Fungsi untuk menghapus Data User
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data user berhasil dihapus!');
    }

    // Fungsi untuk menampilkan penggajian karyawan
    public function editSalary($id)
    {
        $salary = Salary::findOrFail($id);
        return view('admin.edit-salary', compact('salary'));
    }

    // Fungsi untuk menampilkan laporan
    public function editReport($id)
    {
        $report = Report::findOrFail($id);
        return view('admin.edit-report', compact('report'));
    }

    
    // Fungsi untuk menampilkan halaman laporan
    public function showReportPage()
    {
        // Mengambil data karyawan
        $karyawan = EmployeeDetail::all();

        // Mengambil data booking
        $bookings = Booking::with('package')->get();

        // Mengambil data penggajian
        $salaries = Salary::all();

        // Mengambil data laporan umum
        $reports = Report::all();

        // Mengirim data ke view
        return view('admin.report', compact('karyawan', 'bookings', 'salaries', 'reports'));
    }

    public function sendToWhatsApp($id)
    {
        $user = Auth::user();

        // Pastikan user sudah login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengirim pesan WhatsApp.');
        }

        // Ambil detail pemesanan berdasarkan ID
        $booking = Booking::with('package')->find($id);

        if (!$booking) {
            return redirect()->back()->with('error', 'Detail pemesanan tidak ditemukan.');
        }

        // Ambil nomor telepon dari kolom no_telp pada tabel bookings
        $adminPhone = $booking->no_telp;

        if (!$adminPhone) {
            return redirect()->back()->with('error', 'Nomor telepon tidak ditemukan untuk booking ini.');
        }

        // Detail pesan yang akan dikirim
        $message = urlencode("Halo {$booking->customer_name}, berikut adalah detail pesanan Anda:
        - Order Id: {$booking->id}
        - Paket: {$booking->package->title}
        - Tanggal: {$booking->booking_date}
        - Waktu: {$booking->time_slot}
        - Harga: Rp " . number_format($booking->price, 0, ',', '.'));

        // Redirect ke WhatsApp dengan pesan
        return redirect("https://wa.me/{$adminPhone}?text={$message}");
    }    
}
