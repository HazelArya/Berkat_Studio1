<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-semibold text-center text-primary mb-6">Edit Booking</h1>

        <form action="{{ route('bookings.update', $booking->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

              <!-- Booking ID (Readonly) -->
              <div>
                <label for="id" class="block font-medium text-gray-700">Booking ID</label>
                <input type="text" id="id" 
                       value="{{ $booking->id }}" 
                       class="input input-bordered w-full bg-gray-100 cursor-not-allowed" readonly>
            </div>

            <!-- Package Information (Readonly) -->
            <div>
                <label for="package" class="block font-medium text-gray-700">Package</label>
                <input type="text" id="package" 
                       value="@switch($booking->package_id)
                                  @case(1) Wedding Portrait Package @break
                                  @case(2) Family Portrait Package @break
                                  @case(3) Graduation Portrait Package @break
                                  @case(4) Product Portrait Package @break
                                  @default Unknown Package
                              @endswitch" 
                       class="input input-bordered w-full bg-gray-100 cursor-not-allowed" readonly>
            </div>
            <!-- Booking Date -->
            <div>
                <label for="booking_date" class="block font-medium text-gray-700">Booking Date</label>
                <input type="date" name="booking_date" id="booking_date" 
                       value="{{ old('booking_date', $booking->booking_date) }}" 
                       class="input input-bordered w-full" required>
            </div>

            <!-- Time Slot -->
            <div>
                <label for="time_slot" class="block font-medium text-gray-700">Time Slot</label>
                <select name="time_slot" id="time_slot" class="select select-bordered w-full" required>
                    <option value="09.00" {{ old('time_slot', $booking->time_slot) == '09.00' ? 'selected' : '' }}>09.00</option>
                    <option value="12.00" {{ old('time_slot', $booking->time_slot) == '12.00' ? 'selected' : '' }}>12.00</option>
                    <option value="15.00" {{ old('time_slot', $booking->time_slot) == '15.00' ? 'selected' : '' }}>15.00</option>
                    <option value="19.00" {{ old('time_slot', $booking->time_slot) == '19.00' ? 'selected' : '' }}>19.00</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="btn btn-primary w-full">Update Booking</button>
            </div>
        </form>
    </div>
</x-app-layout>
