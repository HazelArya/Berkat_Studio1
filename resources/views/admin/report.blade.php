<x-app-layout>
    <div class="container mx-auto p-6">
        <!-- Cetak Laporan Button -->
        <button class="btn btn-primary mb-4" onclick="window.print()">Cetak Laporan</button>
        
        <h1 class="text-4xl font-semibold mb-8">Laporan Admin</h1>

        <!-- Laporan Karyawan -->
        <div class="card shadow-xl bg-base-100 mb-8">
            <div class="card-header flex justify-between items-center bg-primary text-white p-4 rounded-t-lg">
                <h4 class="text-xl">Laporan Karyawan</h4>
            </div>
            <div class="card-body p-4">
                <table class="table w-full table-zebra">
                    <thead>
                        <tr>
                            <th>Nama Karyawan</th>
                            <th>Kehadiran</th>
                            <th>Sakit</th>
                            <th>Izin</th>
                            <th>Gaji</th>
                            <th>Bulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($karyawan as $employee)
                            <tr>
                                <td>{{ $employee->nama_karyawan }}</td>
                                <td>{{ $employee->masuk }}</td>
                                <td>{{ $employee->sakit }}</td>
                                <td>{{ $employee->izin }}</td>
                                <td>{{ $employee->gaji }}</td>
                                <td>{{ $employee->bulan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Laporan Booking -->
        <div class="card shadow-xl bg-base-100 mb-8">
            <div class="card-header flex justify-between items-center bg-secondary text-white p-4 rounded-t-lg">
                <h4 class="text-xl">Laporan Booking</h4>
            </div>
            <div class="card-body p-4">
                <table class="table w-full table-zebra">
                    <thead>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>Paket</th>
                            <th>Tanggal Booking</th>
                            <th>Kelas Paket</th>
                            <th>Jam Slot</th>
                            <th>Catatan Pelanggan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->customer_name }}</td>
                                <td>{{ $booking->package->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d-m-Y') }}</td>
                                <td>{{ $booking->class }}</td>
                                <td>{{ $booking->time_slot }}</td>
                                <td>{{ $booking->client_note }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Laporan Penggajian -->
        <div class="card shadow-xl bg-base-100 mb-8">
            <div class="card-header flex justify-between items-center bg-accent text-white p-4 rounded-t-lg">
                <h4 class="text-xl">Laporan Penggajian</h4>
            </div>
            <div class="card-body p-4">
                <table class="table w-full table-zebra">
                    <thead>
                        <tr>
                            <th>Nama Karyawan</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Jumlah Gaji</th>
                            <th>Bonus</th>
                            <th>Potongan</th>
                            <th>Status Gaji</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($salaries as $salary)
                            <tr>
                                <td>{{ $salary->employee->nama_karyawan }}</td>
                                <td>{{ \Carbon\Carbon::parse($salary->payment_date)->format('d-m-Y') }}</td>
                                <td>{{ $salary->salary_amount }}</td>
                                <td>{{ $salary->bonus }}</td>
                                <td>{{ $salary->deductions }}</td>
                                <td>{{ $salary->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Laporan Umum -->
        <div class="card shadow-xl bg-base-100 mb-8">
            <div class="card-header flex justify-between items-center bg-neutral text-white p-4 rounded-t-lg">
                <h4 class="text-xl">Laporan Umum</h4>
            </div>
            <div class="card-body p-4">
                <table class="table w-full table-zebra">
                    <thead>
                        <tr>
                            <th>Judul Laporan</th>
                            <th>Status</th>
                            <th>Tanggal Dibuat</th>
                            <th>Isi Laporan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td>{{ $report->title }}</td>
                                <td>{{ $report->status }}</td>
                                <td>{{ \Carbon\Carbon::parse($report->created_at)->format('d-m-Y') }}</td>
                                <td>{{ $report->content }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
