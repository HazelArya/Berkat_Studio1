<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <!-- Informasi Pesanan -->
        <h1 class="text-2xl font-semibold mb-4">Detail Pesanan</h1>
        <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200 mb-6">
            <table class="table w-full table-zebra">
                <tbody>
                    <tr>
                        <th class="px-4 py-2 text-left">Order ID</th>
                        <td class="px-4 py-2">{{ $booking->id }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Package</th>
                        <td class="px-4 py-2">
                            @switch($booking->package_id)
                                @case(1)
                                    Wedding Portrait Package
                                    @break
                                @case(2)
                                    Family Portrait Package
                                    @break
                                @case(3)
                                    Graduation Portrait Package
                                    @break
                                @case(4)
                                    Product Portrait Package
                                    @break
                                @default
                                    Unknown Package
                            @endswitch
                        </td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Booking Date</th>
                        <td class="px-4 py-2">{{ $booking->booking_date }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Time Slot</th>
                        <td class="px-4 py-2">{{ $booking->time_slot }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Harga</th>
                        <td class="px-4 py-2">{{ number_format($booking->price, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Nomor Telepon</th>
                        <td class="flex items-center justify-between mt-4">
                            <!-- Input field for phone number with a max length of 20 characters and numeric only -->
                            <input type="text" id="no_telp" name="no_telp" class="input input-bordered w-full" 
                                value="{{ old('no_telp', $booking->no_telp) }}" 
                                maxlength="20 " 
                                pattern="\d*" 
                                placeholder="Masukkan nomor telepon yang dapat dihubungi">
                                <button onclick="savePhoneNumber()" class="btn btn-primary">Simpan</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
{{-- 
        <div class="flex space-x-4 mt-4">
            <a href="{{ route('send-to-whatsapp') }}" target="_blank">
                <button class="btn btn-primary">Hubungi Saya di WhatsApp</button>
            </a>
        </div> --}}
        
        <!-- Tombol Simpan -->
        {{-- <div class="flex space-x-4">
            <button onclick="savePhoneNumber()" class="btn btn-primary btn-sm btn-outline">Simpan Nomor Telepon</button>
        </div> --}}

         <!-- Tombol Navigasi -->
         <div class="flex space-x-4">
            <!-- Tombol Back -->
            <button onclick="history.back()" class="btn btn-secondary btn-sm btn-outline">Back</button>


        <!-- Tombol Bayar -->
        <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <button id="pay-button" class="btn btn-primary btn-sm btn-outline">Bayar Sekarang</button>
        

        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function () {
                snap.pay("{{ $snap_token }}", {
                    onSuccess: function(result){
                        console.log(result);
                        
                        alert("Pembayaran berhasil!");

                    },
                    onPending: function(result){
                        alert("Pembayaran tertunda.");
                    },
                    onError: function(result){
                        alert("Pembayaran gagal.");
                    }
                });
            };
        </script>
    </div>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <!-- status -->
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function () {
            snap.pay("{{ $snap_token }}", {
                onSuccess: function(result){
                    console.log(result);
                    alert("Pembayaran berhasil!");
                    updateBookingStatus(result.order_id, 'success');
                },
                onPending: function(result){
                    console.log(result);
                    alert("Pembayaran tertunda.");
                    updateBookingStatus(result.order_id, 'failed'); // Update status menjadi failed
                    window.location.href = '/';
                },
                onError: function(result){
                    console.error(result);
                    alert("Pembayaran gagal.");
                }
            });
        };

        function updateBookingStatus(orderId, status) {
            fetch('/payment/update-status', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    order_id: orderId,
                    status: status
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    console.log(`Status booking berhasil diperbarui menjadi ${status}`);
                    if (status === 'success') {
                        window.location.href = '/'; // Redirect ke halaman welcome jika berhasil
                    }
                } else {
                    console.log('Gagal memperbarui status booking');
                }
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
            });
        }
    </script>
    
    <!-- no telphone -->
    <script type="text/javascript">
        // Function to handle saving the phone number
        function savePhoneNumber() {
            var noTelp = document.getElementById('no_telp').value.trim();
            
            if (!noTelp) {
                alert("Mohon masukkan nomor telepon.");
                return;
            }

            // Validasi nomor telepon hanya angka dan maksimal 20 karakter
            if (!/^\d+$/.test(noTelp)) {
                alert("Nomor telepon hanya boleh mengandung angka.");
                return;
            }

            if (noTelp.length > 15) {
                alert("Nomor telepon tidak boleh lebih dari 15 karakter.");
                return;
            }

            // Kirim data ke server untuk menyimpan nomor telepon
            fetch('/update-phone-number', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    booking_id: {{ $booking->id }},
                    no_telp: noTelp
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert("Nomor telepon berhasil disimpan.");
                } else {
                    alert("Gagal menyimpan nomor telepon.");
                }
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
            });
        }

    </script>
</x-app-layout>
