<x-app-layout>
    <x-slot name="title">
    Dashboard Karyawan
    </x-slot>

    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Manajemen Data</h1>


        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Employee') }}
            </h2>
        </x-slot>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-error">
                        {{ $errors->first('message') }}
                    </div>
                @endif
            <div tabindex="0" class="collapse collapse-arrow border border-gray-200 rounded-box mb-4">
                <input type="checkbox" />
                <div class="collapse-title text-xl font-black text-purple-700">
                    Form absensi
                </div>
                <div class="collapse-content">
                    <div class="overflow-y-auto max-h-96 border rounded-lg">
                        <form action="{{ route('employee.absen') }}" method="POST">
                            @csrf
                
                            <label for="status" class="block text-gray-700 font-medium mb-2">Pilih Status:</label>
                            <select name="status" id="status" class="select select-bordered w-full mb-4" required>
                                <option value="" disabled selected>Pilih status absensi</option>
                                <option value="masuk">Masuk</option>
                                <option value="sakit">Sakit</option>
                                <option value="izin">Izin</option>
                            </select>
            
                            <button type="submit" class="btn btn-primary w-full">Kirim Absensi</button>
                        </form>
                    </div>   
                </div>
                <!-- Form untuk Absen Masuk -->
                <div tabindex="0" class="collapse collapse-arrow border border-gray-200 rounded-box mb-4">
                    <input type="checkbox" />
                    <div class="collapse-title text-xl font-black text-green-600">
                        Form Absen Masuk
                    </div>
                    <div class="collapse-content">
                        <div class="overflow-y-auto max-h-96 border rounded-lg">
                            <form action="{{ route('employee.absen.masuk') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-full">Absen Masuk</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Form untuk Absen Pulang -->
                <div tabindex="0" class="collapse collapse-arrow border border-gray-200 rounded-box mb-4">
                    <input type="checkbox" />
                    <div class="collapse-title text-xl font-black text-blue-600">
                        Form Absen Pulang
                    </div>
                    <div class="collapse-content">
                        <div class="overflow-y-auto max-h-96 border rounded-lg">
                            <form action="{{ route('employee.absen.pulang') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-full">Absen Pulang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>         

            <div tabindex="0" class="collapse collapse-arrow border border-gray-200 rounded-box mb-4">
                <input type="checkbox" />
                <div class="collapse-title text-xl font-black text-red-600">
                    Daftar Booking
                </div>
                <!-- Wrapper for scrollable table -->
                <div class="overflow-y-auto max-h-96 border rounded-lg">
                    <table class="table w-full">
                        <!-- Table Header -->
                        <thead>
                            <tr>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">ID</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Nama Pelanggan</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Tanggal</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Waktu</th>
                                <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr class="hover:bg-gray-100">
                                    <td class="border px-4 py-2">{{ $booking->id }}</td>
                                    <td class="border px-4 py-2">{{ $booking->customer_name }}</td>
                                    <td class="border px-4 py-2">{{ $booking->booking_date }}</td>
                                    <td class="border px-4 py-2">{{ $booking->time_slot }}</td>
                                    <td class="border px-4 py-2">
                                        <div class="flex gap-2">
                                            @if(Auth::user()->usertype === 'admin')
                                                <a href="{{ route('admin.edit', $booking->id) }}" class="btn btn-sm btn-outline btn-primary">Edit</a>
                                            @endif
                                            @if(Auth::user()->usertype === 'karyawan')
                                                <a href="{{ route('karyawan.edit', $booking->id) }}" class="btn btn-sm btn-outline btn-primary">Edit</a>
                                            @endif
        
                                            <form method="POST" action="{{ route('bookings.destroy', $booking->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus booking ini?');">
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

                <!-- Accordion for succesfuly Booking -->
                <div tabindex="0" class="collapse collapse-arrow border border-gray-200 rounded-box mb-4">
                    <input type="checkbox" />
                    <div class="collapse-title text-xl font-black text-black-600">
                        Daftar success Booking  
                    </div>
                    
                    <div class="overflow-y-auto max-h-96 border rounded-lg">
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">ID</th>
                                    <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Nama Pelanggan</th>
                                    <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Tanggal</th>
                                    <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Waktu</th>
                                    <th class="bg-gray-200 text-gray-700 text-left px-4 py-2">Aksi</th>
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
                                            <a href="{{ route('karyawan.sendToWhatsApp', $booking->id) }}" target="_blank" class="btn btn-sm btn-outline btn-primary">
                                                Hubungi di WhatsApp
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
    </x-app-layout>
