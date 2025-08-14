<!-- resources/views/portfolio.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>

    <!-- Header Image with Text Overlay -->
    <div class="relative w-full h-96 bg-cover bg-center" style="background-image: url('{{ asset('header-image.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-4xl text-white font-bold">Unforgettable Memories</h1>
        </div>
    </div>

    <!-- Portfolio Gallery -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Photo Item 1 -->
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ asset('pernikahan_1.jpg') }}" alt="Wedding Photo 1" class="w-full h-64 object-cover">
                </div>

                <!-- Photo Item 2 -->
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ asset('pernikahan.jpg') }}" alt="Wedding Photo 2" class="w-full h-64 object-cover">
                </div>

                <!-- Photo Item 3 -->
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ asset('keluarga.jpg') }}" alt="Family Photo 3" class="w-full h-64 object-cover">
                </div>

                <!-- Photo Item 4 -->
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ asset('kelulusan.webp') }}" alt="Graduation Photo 4" class="w-full h-64 object-cover">
                </div>

                <!-- Photo Item 5 -->
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ asset('kelulusan_1.jpg') }}" alt="Graduation Photo 5" class="w-full h-64 object-cover">
                </div>

                <!-- Photo Item 6 -->
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ asset('product.jpg') }}" alt="Product Photo 6" class="w-full h-64 object-cover">
                </div>

            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer footer-center bg-base-200 text-base-content rounded p-10">
        <nav class="grid grid-flow-col gap-4">
          <a href="{{ route('aboutus') }}" class="link link-hover">About us</a>
          <a href="{{ route('portofolio') }}" class="link link-hover">portofolio</a>
          {{-- <a class="link link-hover">Jobs</a>
          <a class="link link-hover">Press kit</a> --}}
        </nav>
        <nav>
          <div class="grid grid-flow-col gap-4">
            <a href="https://x.com/HazelAryaW" target="_blank" rel="noopener noreferrer">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                class="fill-current">
                <path
                  d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
              </svg>
            </a>
            <a href="https://www.instagram.com/berkatjaya_photography/?hl=en" target="_blank" rel="noopener noreferrer">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                class="fill-current">
                <path 
                d="M12 2.163c3.204 0 3.584.012 4.85.07 1.17.054 1.97.24 2.427.411a4.92 4.92 0 0 1 1.775 1.15 4.92 4.92 0 0 1 1.15 1.775c.171.457.357 1.257.411 2.427.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.054 1.17-.24 1.97-.411 2.427a4.92 4.92 0 0 1-1.15 1.775 4.92 4.92 0 0 1-1.775 1.15c-.457.171-1.257.357-2.427.411-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.054-1.97-.24-2.427-.411a4.92 4.92 0 0 1-1.775-1.15 4.92 4.92 0 0 1-1.15-1.775c-.171-.457-.357-1.257-.411-2.427-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.054-1.17.24-1.97.411-2.427a4.92 4.92 0 0 1 1.15-1.775 4.92 4.92 0 0 1 1.775-1.15c.457-.171 1.257-.357 2.427-.411 1.266-.058 1.646-.07 4.85-.07m0-2.163C8.756 0 8.345.014 7.052.072 5.757.13 4.667.347 3.743.693 2.779 1.051 2.051 1.5 1.5 2.051c-.551.551-1 1.279-1.358 2.243-.346.924-.564 2.014-.622 3.309C.014 8.345 0 8.756 0 12s.014 3.655.072 4.948c.058 1.295.276 2.385.622 3.309.358.964.807 1.692 1.358 2.243.551.551 1.279 1 2.243 1.358.924.346 2.014.564 3.309.622C8.345 23.986 8.756 24 12 24s3.655-.014 4.948-.072c1.295-.058 2.385-.276 3.309-.622.964-.358 1.692-.807 2.243-1.358.551-.551 1-1.279 1.358-2.243.346-.924.564-2.014.622-3.309.058-1.293.072-1.704.072-4.948s-.014-3.655-.072-4.948c-.058-1.295-.276-2.385-.622-3.309-.358-.964-.807-1.692-1.358-2.243-.551-.551-1.279-1-2.243-1.358-.924-.346-2.014-.564-3.309-.622C15.655.014 15.244 0 12 0zM12 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a3.999 3.999 0 1 1 0-8 3.999 3.999 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0-2.882 0 1.44 1.44 0 0 0 2.882 0z" />
              </svg>
            </a>
            {{-- <a href="https://www.youtube.com/@hazelwidikdo270" target="_blank" rel="noopener noreferrer">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                class="fill-current">
                <path
                  d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
              </svg>
            </a> --}}
            <a href="https://www.facebook.com/profile.php?id=100080334614738" target="_blank" rel="noopener noreferrer">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                class="fill-current">
                <path
                  d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
              </svg>
            </a>
          </div>
        </nav>
        <aside>
          {{-- class="py-16 text-center text-sm text-black dark:text-white/70"> --}}
        &copy; {{ date('Y') }} Studio Photo Berkat. All rights reserved.
        </aside>
      </footer>
</x-app-layout>
