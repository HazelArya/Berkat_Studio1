<x-app-layout>
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Edit Data Karyawan</h1>

    <form action="{{ route('employee.update', $employee->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_karyawan" class="block text-sm font-medium text-gray-700">Nama Karyawan</label>
            <input type="text" name="nama_karyawan" id="nama_karyawan" value="{{ old('nama_karyawan', $employee->nama_karyawan) }}" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 @error('nama_karyawan') border-red-500 @enderror">
            @error('nama_karyawan')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="masuk" class="block text-sm font-medium text-gray-700">Masuk</label>
            <input type="number" name="masuk" id="masuk" value="{{ old('masuk', $employee->masuk) }}" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 @error('masuk') border-red-500 @enderror">
            @error('masuk')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="sakit" class="block text-sm font-medium text-gray-700">Sakit</label>
            <input type="number" name="sakit" id="sakit" value="{{ old('sakit', $employee->sakit) }}" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 @error('sakit') border-red-500 @enderror">
            @error('sakit')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="izin" class="block text-sm font-medium text-gray-700">Izin</label>
            <input type="number" name="izin" id="izin" value="{{ old('izin', $employee->izin) }}" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 @error('izin') border-red-500 @enderror">
            @error('izin')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="gaji" class="block text-sm font-medium text-gray-700">Gaji</label>
            <input type="number" name="gaji" id="gaji" value="{{ old('gaji', $employee->gaji) }}" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 @error('gaji') border-red-500 @enderror">
            @error('gaji')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="bulan" class="block text-sm font-medium text-gray-700">Bulan</label>
            <input type="text" name="bulan" id="bulan" value="{{ old('bulan', $employee->bulan) }}" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 @error('bulan') border-red-500 @enderror">
            @error('bulan')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:underline">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
        {{-- <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600">Simpan Perubahan</button> --}}
    </form>
</div>
</x-app-layout>