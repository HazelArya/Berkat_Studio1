<x-app-layout>
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Edit Booking</h1>

        <!-- Form Edit Booking -->
        <form method="POST" action="{{ route('karyawan.update', $booking->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="customer_name" class="block text-sm font-medium text-gray-700">Nama Pelanggan</label>
                <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name', $booking->customer_name) }}" class="input input-bordered w-full" required>
            </div>

            <div class="mb-4">
                <label for="booking_date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" id="booking_date" name="booking_date" value="{{ old('booking_date', $booking->booking_date) }}" class="input input-bordered w-full" required>
            </div>

            <div class="mb-4">
                <label for="time_slot" class="block text-sm font-medium text-gray-700">Waktu</label>
                <input type="text" id="time_slot" name="time_slot" value="{{ old('time_slot', $booking->time_slot) }}" class="input input-bordered w-full" required>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-primary w-full">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</x-app-layout>
