{{-- <x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Laporan</h1>
        <div class="overflow-x-auto">
            <table class="table w-full border">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Bulan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                        <tr>
                            <td>{{ $report->id }}</td>
                            <td>{{ $report->title }}</td>
                            <td>{{ $report->date->format('F Y') }}</td>
                            <td>{{ $report->status }}</td>
                            <td>
                                <a href="{{ route('reports.show', $report->id) }}" class="btn btn-sm btn-primary">Cek Laporan</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout> --}}
