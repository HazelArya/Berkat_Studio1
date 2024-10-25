<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us Page') }}
        </h2>
    </x-slot>
      
    <div class="py-12 bg-gradient-to-r from-blue-500 to-teal-400 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gradient-to-r from-teal-500 to-blue-500 text-white p-6">
                    <h1 class="text-3xl font-bold text-center">
                        {{ __("About Us") }}
                    </h1>
                </div>
    
                <div class="p-8 text-gray-700 space-y-8">
                    <!-- Sejarah Perusahaan -->
                    <div class="collapse collapse-arrow bg-base-100 rounded-lg shadow" id="section1">
                        <input type="radio" name="accordion" id="toggle1" class="peer hidden" />
                        <label for="toggle1" class="collapse-title text-xl font-semibold cursor-pointer">
                            {{ __("Sejarah Perusahaan") }}
                        </label>
                        <div class="collapse-content text-lg">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla minus labore culpa maiores. 
                                Saepe ratione id cumque quibusdam tempora sed doloremque corporis pariatur similique quia? 
                                Dolor quidem perspiciatis debitis architecto.
                            </p>
                        </div>
                    </div>
    
                    <!-- Visi dan Misi -->
                    <div class="collapse collapse-arrow bg-base-100 rounded-lg shadow" id="section2">
                        <input type="radio" name="accordion" id="toggle2" class="peer hidden" />
                        <label for="toggle2" class="collapse-title text-xl font-semibold cursor-pointer">
                            {{ __("Visi dan Misi") }}
                        </label>
                        <div class="collapse-content text-lg">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla minus labore culpa maiores. 
                                Saepe ratione id cumque quibusdam tempora sed doloremque corporis pariatur similique quia? 
                                Dolor quidem perspiciatis debitis architecto.
                            </p>
                        </div>
                    </div>
    
                    <!-- Kelebihan Berlangganan -->
                    <div class="collapse collapse-arrow bg-base-100 rounded-lg shadow" id="section3">
                        <input type="radio" name="accordion" id="toggle3" class="peer hidden" />
                        <label for="toggle3" class="collapse-title text-xl font-semibold cursor-pointer">
                            {{ __("Kelebihan dari Memilih Berlangganan di Photo Studio Kami") }}
                        </label>
                        <div class="collapse-content text-lg">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla minus labore culpa maiores. 
                                Saepe ratione id cumque quibusdam tempora sed doloremque corporis pariatur similique quia? 
                                Dolor quidem perspiciatis debitis architecto.
                            </p>
                        </div>
                    </div>
                </div>
    
                <div class="p-6 bg-gradient-to-r from-blue-500 to-teal-400 text-center text-white">
                    <h3 class="text-xl font-semibold">
                        {{ __("Hubungi Kami untuk Informasi Lebih Lanjut!") }}
                    </h3>
                    <button class="btn btn-primary mt-4 hover:scale-105 transition-transform duration-200 ease-in-out">
                        Contact Us
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    
</x-app-layout>
