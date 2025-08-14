<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Detail Karyawan: {{ $employees->first()->nama_karyawan }}</h1>

        <div class="mb-6">
            <p><strong>ID:</strong> {{ $employees->first()->id }}</p>
            <p><strong>Nama:</strong> {{ $employees->first()->nama_karyawan }}</p>
            <p><strong>Gaji:</strong> Rp {{ number_format($employees->first()->gaji, 2) }}</p>
            <p><strong>Bulan:</strong> {{ \Carbon\Carbon::parse($month)->format('F Y') }}</p>
        </div>

        <h2 class="text-xl font-semibold mb-4">Data Absensi</h2>

        @php
            $attendancesForMonth = $employees->first()->attendances->filter(function ($attendance) use ($month) {
                return \Carbon\Carbon::parse($attendance->created_at)->format('Y-m') === $month;
            });
        @endphp


        @if ($attendancesForMonth->isEmpty())
            <p class="text-gray-600">Tidak ada data absensi untuk bulan ini.</p>
        @else
            <table class="table-auto w-full border-collapse border border-gray-300 mb-6">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">Tanggal</th>
                        <th class="border px-4 py-2">Absen Masuk</th>
                        <th class="border px-4 py-2">Absen Pulang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendancesForMonth as $attendance)
                        <tr>
                            <td class="border px-4 py-2">{{ $attendance->created_at->format('Y-m-d') }}</td>
                            <td class="border px-4 py-2">{{ $attendance->clock_in }}</td>
                            <td class="border px-4 py-2">{{ $attendance->clock_out }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
