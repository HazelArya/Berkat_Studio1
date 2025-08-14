<x-app-layout>
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Manajemen Data</h1>

        <!-- Accordion for Booking -->
        <div tabindex="0" class="collapse collapse-arrow border border-gray-200 rounded-box mb-4">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-black text-purple-700">
                Daftar Booking
            </div>                                  
            <div class="collapse-content">
                <div class="overflow-y-auto max-h-96 border rounded-lg">
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">ID</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Nama Pelanggan</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Tanggal</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Waktu</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Aksi</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr class="hover:bg-gray-100">
                                    <td class="border px-4 py-2">{{ $booking->id }}</td>
                                    <td class="border px-4 py-2">{{ $booking->customer_name }}</td>
                                    <td class="border px-4 py-2">{{ $booking->booking_date }}</td>
                                    <td class="border px-4 py-2">{{ $booking->time_slot }}</td>
                                    <td class="border px-4 py-2">
                                        <div class="flex gap-2">
                                            <a href="{{ route('admin.edit', $booking->id) }}" class="btn btn-sm btn-outline btn-primary">Edit</a>
                                            <form method="POST" action="{{ route('bookings.destroy', $booking->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus booking ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline btn-error">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

         <!-- Accordion for succesfuly Booking -->
         <div tabindex="0" class="collapse collapse-arrow border border-gray-200 rounded-box mb-4">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-black text-green-600">
                Daftar success Booking  
            </div>
            <div class="collapse-content">
                <div class="overflow-y-auto max-h-96 border rounded-lg">
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">ID</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Nama Pelanggan</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Tanggal</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Waktu</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Aksi</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($successfulBookings as $booking)
                                <tr class="hover:bg-gray-100">
                                    <td class="border px-4 py-2">{{ $booking->id }}</td>
                                    <td class="border px-4 py-2">{{ $booking->customer_name }}</td>
                                    <td class="border px-4 py-2">{{ $booking->booking_date }}</td>
                                    <td class="border px-4 py-2">{{ $booking->time_slot }}</td>
                                    <td class="border px-4 py-2">
                                        <div class="flex gap-2">
                                            <a href="{{ route('admin.edit', $booking->id) }}" class="btn btn-sm btn-outline btn-primary">Edit</a>
                                            <form method="POST" action="{{ route('bookings.destroy', $booking->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus booking ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline btn-error">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.send-to-whatsapp', $booking->id) }}" target="_blank">
                                            <button class="btn btn-sm btn-outline btn-primary">Hubungi customer di WhatsApp</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Accordion for Users -->
        <div tabindex="0" class="collapse collapse-arrow border border-gray-200 rounded-box mb-4">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-black text-red-600">
                Data User
            </div>
            <div class="collapse-content">
                <div class="overflow-y-auto max-h-96 border rounded-lg">
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">ID</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Nama</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Email</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Usertype</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr class="hover:bg-gray-100">
                                    <td class="border px-4 py-2">{{ $user->id }}</td>
                                    <td class="border px-4 py-2">{{ $user->name }}</td>
                                    <td class="border px-4 py-2">{{ $user->email }}</td>
                                    <td class="border px-4 py-2">{{ $user->usertype }}</td>
                                    <td class="border px-4 py-2">
                                        <div class="flex gap-2">
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-outline btn-primary">Edit</a>
                                        <form method="POST" action="{{ route('user.destroy', $user->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline btn-error">Hapus</button>
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Accordion for Payroll -->
        <div tabindex="0" class="collapse collapse-arrow border border-gray-200 rounded-box mb-4">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-black text-blue-600">
                Data Karyawan
            </div>
            <div class="collapse-content">
                <div class="overflow-y-auto max-h-96 border rounded-lg">
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">ID</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Nama Karyawan</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Masuk</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Sakit</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Izin</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Gaji</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Bulan</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($karyawan as $employee)
                            <tr>
                                <td class="border px-4 py-2">{{ $employee->id }}</td>
                                <td class="border px-4 py-2">{{ $employee->nama_karyawan }}</td>
                                <td class="border px-4 py-2">{{ $employee->masuk }}</td>
                                <td class="border px-4 py-2">{{ $employee->sakit }}</td>
                                <td class="border px-4 py-2">{{ $employee->izin }}</td>
                                <td class="border px-4 py-2">Rp {{ number_format($employee->gaji, 2) }}</td>
                                <td class="border px-4 py-2">{{ $employee->bulan }}</td>
                                <td class="border px-4 py-2">
                                    <!-- Tombol Edit -->
                                    <div class="flex gap-2">
                                        <a href="{{ route('employee.edit', $employee->id) }}" 
                                        class="btn btn-sm btn-outline btn-primary">Edit</a>
                                        <a href="{{ route('employee.detail', ['user_id' => $employee->user_id, 'month' => \Carbon\Carbon::parse($employee->bulan)->format('Y-m')]) }}" 
                                            class="btn btn-sm btn-outline btn-primary">
                                             Detail
                                         </a>                                                                              
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Accordion for Reports -->
        <div tabindex="0" class="collapse collapse-arrow border border-gray-200 rounded-box">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-black text-black-700">
                Laporan
            </div>
            
            <div class="collapse-content">
                <!-- Tombol untuk membuat laporan -->
            <button id="create-report-button" class="btn btn-primary btn-sm">
                Create Report
            </button>
                <div class="overflow-y-auto max-h-96 border rounded-lg">
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">ID</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Judul</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Bulan</th>
                                {{-- <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Aksi</th> --}}
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                                <tr class="hover:bg-gray-100">
                                    <td class="border px-4 py-2">{{ $report->id }}</td>
                                    <td class="border px-4 py-2">{{ $report->title }}</td>
                                    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($report->date)->format('d-m-Y') }}</td>
                                    {{-- <td class="border px-4 py-2">{{ $report->status }}</td> --}}
                                    <td>
                                        <a href="{{ route('reports.show', $report->id) }}" class="btn btn-sm btn-primary">Cek Laporan</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Script untuk menangani aksi tombol Create Report -->
            <script type="text/javascript">
                document.getElementById('create-report-button').addEventListener('click', function() {
                    // Kirim permintaan AJAX untuk membuat laporan baru
                    fetch('/create-report', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            alert(data.message); // Laporan berhasil dibuat
                        } else {
                            alert(data.message); // Laporan sudah dibuat untuk bulan ini
                        }
                    })
                    .catch(error => {
                        console.error('Terjadi kesalahan:', error);
                        alert('Gagal membuat laporan.');
                    });
                });
            </script>
        </div>
    </div>
</x-app-layout>
