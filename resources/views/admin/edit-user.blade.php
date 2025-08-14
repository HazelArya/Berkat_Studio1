<x-app-layout>
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Edit Data User</h1>

        <!-- Form Edit User -->
        <form method="POST" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-6">
                <!-- Nama -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Usertype -->
                <div>
                    <label for="usertype" class="block text-sm font-medium text-gray-700">Tipe User</label>
                    <select name="usertype" id="usertype" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 @error('usertype') border-red-500 @enderror">
                        <option value="admin" {{ old('usertype', $user->usertype) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="karyawan" {{ old('usertype', $user->usertype) == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
                        <option value="customer" {{ old('usertype', $user->usertype) == 'customer' ? 'selected' : '' }}>Customer</option>
                    </select>
                    @error('usertype')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:underline">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
