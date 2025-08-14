<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <!-- Title Section -->
        <h1 class="text-3xl font-semibold text-center text-primary mb-6">Your Bookings</h1>

        <!-- No bookings message -->
        @if($bookings->isEmpty())
            <div class="alert alert-info shadow-lg mb-6">
                <div>
                    <span>You have no bookings yet.</span>
                </div>
            </div>
        @else
            <!-- Booking Table -->
            <div class="overflow-x-auto shadow-xl rounded-lg border border-gray-200">
                <table class="table w-full table-zebra">
                    <!-- Table Header -->
                    <thead>
                        <tr class="text-white bg-primary">
                            <th class="text-center py-2 px-4">Order ID</th>
                            <th class="text-center py-2 px-4">Package</th>
                            <th class="text-center py-2 px-4">Booking Date</th>
                            <th class="text-center py-2 px-4">Time Slot</th>
                            <th class="text-center py-2 px-4">Harga</th>
                            <th class="text-center py-2 px-4">Status</th>
                            <th class="text-center py-2 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr class="hover:bg-gray-100">
                                <td class="text-center py-2 px-4">{{ $booking->id }}</td>
                                <td class="text-center py-2 px-4">
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
                                <td class="text-center py-2 px-4">{{ $booking->booking_date }}</td>
                                <td class="text-center py-2 px-4">{{ $booking->time_slot }}</td>
                                <td class="text-center py-2 px-4">{{ number_format($booking->price, 0, ',', '.') }}</td>
                                <td class="text-center py-2 px-4">
                                    @if($booking->status === 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($booking->status === 'success')
                                        <span class="badge badge-success">Success</span>
                                    @elseif($booking->status === 'failed')
                                        <span class="badge badge-error">Failed</span>
                                    @else
                                        <span class="badge badge-secondary">Unknown</span>
                                    @endif
                                </td>
                                
                                <td class="text-center py-2 px-4">
                                    @if($booking->status !== 'failed')
                                        <!-- Action Buttons when status is not 'failed' -->
                                        @if($booking->status !== 'success')
                                            <!-- Show Edit and Pay buttons when status is not 'success' or 'failed' -->
                                            <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary btn-sm btn-outline">Edit</a>
                                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline btn-error">Delete</button>
                                            </form>
                                            <a href="{{ route('payment.create', $booking->id) }}" class="btn btn-success btn-sm btn-outline">Pay</a>
                                        @else
                                            <!-- Message when status is success -->
                                            <span class="text-green-500 font-semibold">Anda sudah melakukan pembayaran</span>
                                        @endif
                                    @else
                                        <!-- Show only Delete button when status is 'failed' -->
                                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline btn-error">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
