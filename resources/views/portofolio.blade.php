<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Portofolio Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Ini Halaman Portofolio!") }}
                </div>

                <div class="p-6 text-gray-900">
                    <div class="card bg-base-1000 shadow-xl">
                    {{ __("List Hasil dari Pemotretan") }}
                    <h2> Kategori Pernikahan</h2>
                    <div class="card card-side bg-base-100 shadow-xl">
                        <img src="{{ asset('pernikahan.jpg') }}" alt="Foto Keluarga" class="w-1/2 rounded-lg shadow-2xl"
                        alt="Photo Family"/>
                    </div>
                    <p>Abadikan momen indah pernikahan tradisional dengan detail yang menawan. </p>
                    </div>

                    <div class="p-6 text-gray-900">
                        {{ __("Kategori Graduation") }}
                        <img src="{{ asset('graduation.jpg') }}" alt="Foto Keluarga" class="w-1/2 rounded-lg shadow-2xl"
                        alt="Photo Family"/>
                        <p>Dokumentasikan acara perusahaan Anda dengan profesional dan elegan. </p>
                    </div>

                    <div class="p-6 text-gray-900">
                        {{ __("Kategori Barang") }}
                        <img src="{{ asset('product.jpg') }}" alt="Foto Keluarga" class="w-1/2 rounded-lg shadow-2xl"
                        alt="Photo Family"/>
                        <p>Tingkatkan nilai produk Anda dengan foto produk berkualitas tinggi. </p>
                    </div>

                    <div class="p-6 text-gray-900">
                        {{ __("Kategori Family") }}
                        <img src="{{ asset('family.jpg') }}" alt="Foto Keluarga" class="w-1/2 rounded-lg shadow-2xl"
                        alt="Photo Family"/>
                        <p>Ciptakan kenangan keluarga yang abadi dengan potret yang penuh kehangatan. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</x-app-layout>
