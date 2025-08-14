<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\MidtransTransaction;
use Illuminate\Support\Facades\Log;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class BookingController extends Controller
{
    // Method to display all bookings
    public function index()
    {
        // Fetch bookings with related package information and user data
        $bookings = Booking::with('package', 'user')->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    // Method to store a new booking
    public function store(Request $request)
    {
        try {
            // Ambil user_id dari pengguna yang sedang login
            $user_id = Auth::id(); // Ini mengambil ID pengguna yang sedang login

            // Validasi untuk memeriksa apakah sudah ada booking pada tanggal dan waktu yang sama
            $existingBooking = Booking::where('booking_date', $request->booking_date)
            ->where('time_slot', $request->time_slot)
            ->exists();

            if ($existingBooking) {
                return redirect()->back()->with('error', 'Pemesanan pada tanggal dan waktu tersebut sudah ada. Silakan pilih waktu lain.');
            }

            // Validasi untuk nomor telepon yang tidak wajib
            $request->validate([
                'no_telp' => 'nullable|string|max:15', // nomor telepon tidak wajib diisi
            ]);

            // Simpan booking dengan user_id yang terisi otomatis dan status default
            $booking = Booking::create([
                'package_id' => $request->package_id,
                'user_id' => $user_id,  // Menyimpan ID pengguna yang sedang login
                'customer_name' => $request->customer_name,
                'booking_date' => $request->booking_date,
                'time_slot' => $request->time_slot,
                'client_note' => $request->client_note,
                'price' => $request->price,  // Menambahkan harga yang diinputkan
                'status' => 'pending', // Set default status to 'pending'
                'no_telp' => $request->no_telp,  // Menyimpan nomor telepon jika diisi
            ]);

            // Kirim pesan sukses
            return redirect()->back()->with('success', 'Booking successfully created!');
        } catch (\Exception $e) {
        }
    }

    // Method to update an existing booking
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Validasi data booking, termasuk no_telp yang tidak wajib
        $validatedData = $this->validateBooking($request);

        // Update booking dengan data yang sudah divalidasi
        $booking->update($validatedData);

        // Success message
        return redirect()->back()->with('success', 'Booking successfully updated!');
    }

    // Method to delete a booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        // Success message
        return redirect()->back()->with('success', 'Booking successfully deleted!');
    }

    // Validation method for booking data
    private function validateBooking(Request $request)
    {
        return $request->validate([
            'package_id' => 'required|exists:packages,id', // Ensure the package exists
            'user_id' => 'required|exists:users,id', // Ensure the user exists
            'customer_name' => 'required|string|max:255',
            'booking_date' => 'required|date',
            'time_slot' => 'required|string|max:255',
            'client_note' => 'nullable|string|max:1000', // Optional field with max length
            'price' => 'required|numeric|min:0', // Validate price (should be numeric and not negative)
            'status' => 'nullable|string|in:pending,confirmed,completed', // Validate status (if provided)
            'no_telp' => 'nullable|string|max:20', // Validate nomor telepon jika diisi
        ]);
    }

    public function updateStatusAfterPayment($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        
        // Ubah status menjadi success setelah pembayaran
        $booking->status = 'success';
        $booking->save();
        
        return redirect()->back()->with('success', 'Booking status updated to success!');
    }

    public function updatePhoneNumber(Request $request)
    {
        $validated = $request->validate([
            'no_telp' => 'required|numeric',
            'booking_id' => 'required|exists:bookings,id',
        ]);

        $booking = Booking::find($request->booking_id);
        $booking->no_telp = $request->no_telp;
        $booking->save();

        return response()->json(['status' => 'success']);
    }

    public function sendWhatsAppMessage(Booking $booking)
    {
        $phone = '081296010598'; // Nomor WhatsApp Anda
        $customerPhone = $booking->no_telp; // Nomor telepon customer

        // Format detail pemesanan
        $message = "Halo, berikut adalah detail pemesanan Anda:\n\n";
        // $message .= "Order ID: {$booking->id}\n";
        // $message .= "Paket: " . $this->getPackageName($booking->package_id) . "\n";
        // $message .= "Tanggal Booking: {$booking->booking_date}\n";
        // $message .= "Waktu: {$booking->time_slot}\n";
        // $message .= "Harga: Rp" . number_format($booking->price, 0, ',', '.') . "\n";
        // $message .= "Terima kasih telah menggunakan layanan kami!";

        // Kirim pesan ke API Green API
        $response = Http::post("https://api.green-api.com/waInstance" . env('GREEN_API_INSTANCE_ID') . "/SendMessage/" . env('GREEN_API_API_TOKEN'), [
            'chatId' => $customerPhone . '@c.us', // Format nomor untuk WhatsApp API
            'message' => $message,
        ]);

        if ($response->successful()) {
            Log::info('Pesan WhatsApp berhasil dikirim.');
            return response()->json(['status' => 'success', 'message' => 'Pesan WhatsApp berhasil dikirim.']);
        } else {
            Log::error('Gagal mengirim pesan WhatsApp: ' . $response->body());
            return response()->json(['status' => 'error', 'message' => 'Gagal mengirim pesan WhatsApp.']);
        }
    }

    // Fungsi untuk mendapatkan nama paket berdasarkan ID
    private function getPackageName($packageId)
    {
        switch ($packageId) {
            case 1:
                return 'Wedding Portrait Package';
            case 2:
                return 'Family Portrait Package';
            case 3:
                return 'Graduation Portrait Package';
            case 4:
                return 'Product Portrait Package';
            default:
                return 'Unknown Package';
        }
    }

}
