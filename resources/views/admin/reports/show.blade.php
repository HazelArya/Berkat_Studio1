<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $report->title }}</h1>
        <p><strong>Laporan Untuk:</strong> {{ $report->date->format('F Y') }}</p>
        <p><strong>Status:</strong> {{ $report->status }}</p>
        <div class="mt-4">
            <a href="{{ route('reports.print', $report->id) }}" class="btn btn-sm btn-success">Cetak Laporan</a>
        </div>

        <div class="mt-4 bg-gray-100 p-4 rounded">
            <p><strong>Laporan Pemesanan </strong></p>
            <div class="overflow-x-auto shadow-xl rounded-lg border border-gray-200">
                <table class="table w-full table-zebra">
                    <thead>
                        <tr class="text-white bg-primary">
                            <th class="text-center py-2 px-4">Order ID</th>
                            <th class="text-center py-2 px-4">Package</th>
                            <th class="text-center py-2 px-4">Booking Date</th>
                            <th class="text-center py-2 px-4">Time Slot</th>
                            <th class="text-center py-2 px-4">Harga</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Total Harga -->
            <div class="mt-4 text-right font-bold">
                <p><strong>Total Pemesanan: </strong>{{ number_format($totalBookings, 0, ',', '.') }} Pemesanan</p>
                <p><strong>Total Pemasukan: </strong>{{ number_format($totalPrice, 0, ',', '.') }}</p>
            </div>
        </div>

        <!-- Data Karyawan -->
        <div class="mt-4 bg-gray-100 p-4 rounded">
            <p><strong>Data Karyawan </strong></p>
           <div class="overflow-x-auto shadow-xl rounded-lg border border-gray-200">
                <table class="table w-full table-zebra">
                <thead>
                    <tr class="text-white bg-primary">
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Nama Karyawan</th>
                        <th>Masuk</th>
                        <th>Sakit</th>
                        <th>Izin</th>
                        <th>Bulan</th>
                        <th>Gaji</th>
                        {{-- <th>Created At</th>
                        <th>Updated At</th> --}}
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($employeeDetails as $detail)
                            <tr>
                                <td>{{ $detail->id }}</td>
                                <td>{{ $detail->user_id }}</td>
                                <td>{{ $detail->nama_karyawan }}</td>
                                <td>{{ $detail->masuk }}</td>
                                <td>{{ $detail->sakit }}</td>
                                <td>{{ $detail->izin }}</td>
                                <td>{{ $detail->bulan }}</td>
                                <td>{{ number_format($detail->gaji, 0, ',', '.') }}</td>
                                {{-- <td>{{ $detail->created_at }}</td>
                                <td>{{ $detail->updated_at }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                <div class="mt-4 text-right font-bold">
                <h3>Total Biaya Penggajian: Rp{{ number_format($totalSalary, 0, ',', '.') }}</h3>
                </div>
        </div>
         <!-- Keuntungan -->
         <div class="mt-4 bg-green-100 p-4 rounded">
            <h3 class="text-xl font-bold text-green-700">Keuntungan</h3>
            <p class="text-lg">
                Total Keuntungan: <span class="text-green-700 font-bold">Rp{{ number_format($totalPrice - $totalSalary, 0, ',', '.') }}</span>
            </p>
        </div>
    </div>
</x-app-layout>
