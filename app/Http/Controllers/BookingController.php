<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Model untuk tabel bookings
use App\Models\Package; // Model untuk tabel packages

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'booking_date' => 'required|date',
            'time_slot' => 'required',
            'client_note' => 'nullable|string|max:255',
        ]);

        // Simpan pemesanan ke database
        $booking = new Booking();
        $booking->package_id = $validatedData['package_id'];
        $booking->booking_date = $validatedData['booking_date'];
        $booking->time_slot = $validatedData['time_slot'];
        $booking->client_note = $validatedData['client_note'];
        $booking->save();

        // Redirect atau memberikan respon sukses
        return redirect()->back()->with('success', 'Booking berhasil dilakukan!');
    }
}
