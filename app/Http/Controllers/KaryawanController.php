<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bookings = Booking::all(); // Fetch all bookings
        return view('karyawan.dashboard', ['bookings' => $bookings]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id); // Find booking by id
        return view('karyawan.edit-booking', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'booking_date' => 'required|date',
            'time_slot' => 'required|string|max:255',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($validated);

        return redirect()->route('karyawan.dashboard')->with('success', 'Booking berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('karyawan.dashboard')->with('success', 'Booking berhasil dihapus!');
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
