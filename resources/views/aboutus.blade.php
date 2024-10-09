<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us Page') }}
        </h2>
    </x-slot>
      
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Ini Halaman About Us!") }}
                </div>

                <div class="p-6 text-gray-900">
                    {{ __("Sejarah perusahaan") }}
                </div>

                <div class="p-6 text-gray-900">
                    {{ __("Visi dan Misi") }}
                </div>

                <div class="p-6 text-gray-900">
                    {{ __("Kelebihan dari memilih berlangganan di photo studio kami") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
