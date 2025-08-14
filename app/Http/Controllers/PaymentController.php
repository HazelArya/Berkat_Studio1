<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Midtrans\Snap;
use Midtrans\Notification;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Mail\OrderDetailsMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;


class PaymentController extends Controller
{
    public function __construct()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.environment') == 'production';
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createPayment(Booking $booking)
    {
        // Data transaksi untuk Midtrans
        $transaction_details = [
            'order_id' => $booking->id,
            'gross_amount' => $booking->price,
        ];

        // Data pelanggan
        $customer_details = [
            'first_name'    => $booking->customer_name,
            'phone'         => $booking->user->phone,
        ];

        // Dapatkan Snap token dari Midtrans
        $snap_token = Snap::getSnapToken([
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
        ]);

        $booking->update(['snap_token' => $snap_token]);

        // Return Snap token ke view untuk pembayaran
        return view('payment', compact('snap_token', 'booking'));
    }

    public function notification(Request $request)
    {
        try {
            Log::info('Midtrans Callback:', $request->all()); // Log semua data dari Midtrans
            $notif = new \Midtrans\Notification(); // Objek notifikasi Midtrans

            // Ambil data yang relevan
            $orderId = $notif->order_id;
            $transactionStatus = $notif->transaction_status;
            $transactionId = $notif->transaction_id; // Ambil transaction_id dari notifikasi

            // Temukan booking berdasarkan order_id
            $booking = Booking::find($orderId);

            if (!$booking) {
                Log::error('Booking not found for order_id: ' . $orderId);
                return response()->json(['status' => 'error', 'message' => 'Booking not found'], 404);
            }

            // Update database dengan transaction_id
            $status = match ($transactionStatus) {
                'capture', 'settlement' => 'success',
                'pending' => 'pending',
                'deny', 'cancel', 'expire' => 'failed',
                default => 'unknown',
            };

            $booking->update([
                'status' => $status,
                'transaction_id' => $transactionId, // Simpan transaction_id
            ]);

            Log::info('Booking updated', [
                'order_id' => $orderId,
                'status' => $status,
                'transaction_id' => $transactionId,
            ]);

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error('Midtrans Notification Error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Internal Server Error'], 500);
        }
    }


    public function createTransaction($bookingId)
    {
        // Temukan booking berdasarkan ID
        $booking = Booking::findOrFail($bookingId);

        // Konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$isProduction = false; // Set false untuk Sandbox
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Data transaksi
        $transactionDetails = [
            'order_id' => $booking->id,
            'gross_amount' => $booking->price, // Total harga
        ];

        $itemDetails = [
            [
                'id' => $booking->package_id,
                'price' => $booking->price,
                'quantity' => 1,
                'name' => 'Package ' . $booking->package_id,
            ]
        ];

        $customerDetails = [
            'first_name' => $booking->user->name,
            'phone' => $booking->user->phone_number, // Sesuaikan dengan data user
        ];

        $params = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => $customerDetails,
        ];

        // Buat Snap Token
        $snapToken = Snap::getSnapToken($params);

        // Simpan Snap Token ke database
        $booking->update([
            'snap_token' => $snapToken,
            'transaction_id' => $params['transaction_details']['order_id'], // Simpan transaction_id
        ]);

        return response()->json(['snap_token' => $snapToken]);
    }

   
    public function updateBookingStatus(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|integer',
            'status' => 'required|string',
        ]);

        // Temukan booking berdasarkan order_id
        $booking = Booking::find($validated['order_id']);
        if (!$booking) {
            return response()->json(['status' => 'error', 'message' => 'Booking not found'], 404);
        }

        // Perbarui status booking
        $booking->status = $validated['status'];
        $booking->save();

        return response()->json(['status' => 'success']);
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

    // public function sendToWhatsApp()
    // {
    //     $user = Auth::user();

    //     // Pastikan user sudah login
    //     if (!$user) {
    //         return redirect()->route('login')->with('error', 'Anda harus login untuk mengirim pesan WhatsApp.');
    //     }

    //     // Ambil detail pemesanan terakhir user
    //     $booking = Booking::where('user_id', $user->id)->latest()->first();

    //     if (!$booking) {
    //         return redirect()->back()->with('error', 'Tidak ada detail pemesanan yang ditemukan.');
    //     }

    //     // Detail pesan yang akan dikirim
    //     $message = urlencode("Halo {$user->name}, berikut adalah detail pesanan Anda:
    //     - Order Id: {$booking->id}
    //     - Paket: {$booking->package->title}
    //     - Tanggal: {$booking->booking_date}
    //     - Waktu: {$booking->time_slot}
    //     - Harga: Rp {$booking->price}");

    //     // Nomor WhatsApp tujuan
    //     $adminPhone = '6281290797698';

    //     // Redirect ke WhatsApp dengan pesan
    //     return redirect("https://wa.me/{$adminPhone}?text={$message}");
    // }

    // public function sendPaymentConfirmationEmail(Request $request)
    // {
    //     // Ambil booking berdasarkan ID
    //     $booking = Booking::find($request->booking_id);

    //     // Pastikan booking ada
    //     if ($booking) {
    //         // Kirim email dengan menggunakan mailable OrderDetailsMail
    //         Mail::to($booking->email)->send(new OrderDetailsMail($booking));

    //         return response()->json(['status' => 'success']);
    //     }

    //     return response()->json(['status' => 'failed']);
    // }

    // private function sendWhatsAppMessage($booking)
    // {
    //     $phone = '081296010598'; // Nomor WhatsApp Anda
    //     $customerPhone = $booking->no_telp; // Nomor telepon customer
    //     $message = "Halo, pembayaran Anda dengan Order ID {$booking->id} telah berhasil diproses. Terima kasih telah menggunakan layanan kami!";

    //     $response = Http::post("https://api.green-api.com/waInstance" . env('GREEN_API_INSTANCE_ID') . "/SendMessage/" . env('GREEN_API_API_TOKEN'), [
    //         'chatId' => $customerPhone . '@c.us', // Format nomor untuk WhatsApp API
    //         'message' => $message,
    //     ]);

    //     if ($response->successful()) {
    //         Log::info('Pesan WhatsApp berhasil dikirim.');
    //     } else {
    //         Log::error('Gagal mengirim pesan WhatsApp: ' . $response->body());
    //     }
    // }
}

