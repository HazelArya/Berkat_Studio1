<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    public function index()
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to view your inbox.');
        }

        // Ambil data bookings milik pengguna yang login
        $bookings = Booking::where('user_id', Auth::id())->get();

        // Ambil data dari Tabel Bookings
        // $bookings = Booking::with('package')->get();
        // Render view inbox dengan data bookings
        return view('inbox', compact('bookings'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);

        // Pastikan pengguna hanya bisa mengedit booking mereka sendiri
        if ($booking->user_id !== Auth::id()) {
            return redirect()->route('inbox')->with('error', 'You do not have permission to edit this booking.');
        }

        return view('edit-booking', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Pastikan pengguna hanya bisa mengupdate booking mereka sendiri
        if ($booking->user_id !== Auth::id()) {
            return redirect()->route('inbox')->with('error', 'You do not have permission to update this booking.');
        }

        // Validasi input
        $request->validate([
            'booking_date' => 'required|date|after_or_equal:today',
            'time_slot' => 'required|string|max:255',
        ]);

        // Update data booking
        $booking->update([
            'booking_date' => $request->booking_date,
            'time_slot' => $request->time_slot,
        ]);

        return redirect()->route('inbox')->with('success', 'Booking updated successfully!');
    }
}



