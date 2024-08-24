<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @vite('resources/css/app.css')
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Studio Photo Berkat">
    <title>Studio Photo Berkat</title>
  </head>
  <x-app-layout>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
      <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <main class="mt-6">
          <!-- Carousel -->
          <div class="carousel" style="width: 100%; height: 500px;">
            <!-- Slide 1 -->
            <div id="slide1" class="carousel-item">
              <img src="{{ asset('Pernikahan1.jpg') }}" alt="Foto Pernikahan" class="w-full" />
              <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <button class="btn btn-circle" onclick="showSlide('slide4')">❮</button>
                <button class="btn btn-circle" onclick="showSlide('slide2')">❯</button>
              </div>
            </div>
            <!-- Slide 2 -->
            <div id="slide2" class="carousel-item">
              <img src="{{ asset('family.jpg') }}" alt="Foto Pernikahan" class="w-full" />
              <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <button class="btn btn-circle" onclick="showSlide('slide1')">❮</button>
                <button class="btn btn-circle" onclick="showSlide('slide3')">❯</button>
              </div>
            </div>
            <!-- Slide 3 -->
            <div id="slide3" class="carousel-item">
              <img src="{{ asset('graduation.jpg') }}" alt="Foto Pernikahan" class="w-full" />
              <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <button class="btn btn-circle" onclick="showSlide('slide2')">❮</button>
                <button class="btn btn-circle" onclick="showSlide('slide4')">❯</button>
              </div>
            </div>
            <!-- Slide 4 -->
            <div id="slide4" class="carousel-item">
              <img src="{{ asset('product.jpg') }}" alt="Foto Pernikahan" class="w-full" />
              <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <button class="btn btn-circle" onclick="showSlide('slide3')">❮</button>
                <button class="btn btn-circle" onclick="showSlide('slide1')">❯</button>
              </div>
            </div>
          </div>

          <script>
            // Simpan ID slide yang aktif
            let currentSlide = 'slide1';
          
            function showSlide(slideId) {
              event.preventDefault();
          
              // Hapus kelas 'active' dari slide saat ini
              document.getElementById(currentSlide).classList.remove('active');
          
              // Tambahkan kelas 'active' ke slide yang baru
              document.getElementById(slideId).classList.add('active');
          
              // Perbarui slide saat ini
              currentSlide = slideId;
            }
          
            // Set slide pertama sebagai slide aktif secara default
            document.addEventListener('DOMContentLoaded', () => {
              document.getElementById(currentSlide).classList.add('active');
            });
          </script>

          <style>
            .carousel {
            overflow: hidden; /* Mencegah scroll */
            position: relative;
          }
          .carousel-item {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: opacity 0.5s ease-in-out;
          }
          .carousel-item:not(.active) {
            opacity: 0;
            pointer-events: none; /* Mencegah interaksi pada slide yang tidak aktif */
          }
        </style>


          <!-- Photo descriptions -->
          <section class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Foto 1 -->
            <div class="card card-side bg-base-100 shadow-xl">
            <div class="flex items-center">
              <img src="{{ asset('Pernikahan.jpg') }}" alt="Foto Pernikahan" class="w-1/2 rounded-lg shadow-2xl"
              alt="Photo Preweding"/>
              <div class="card-body">
                <h2 class="card-title">Pernikahan Modern</h2>
                <p class="mt-2">Abadikan momen indah pernikahan tradisional dengan detail yang menawan.</p><br>
                <div class="card-actions justify-end">
                  <button class="btn btn-primary">Book Now</button>
                </div>
              </div>
            </div>
          </div>

            <!-- Foto 2 -->
            <div class="card card-side bg-base-100 shadow-xl">
              <div class="flex items-center">
                <img src="{{ asset('family.jpg') }}" alt="Foto Keluarga" class="w-1/2 rounded-lg shadow-2xl"
                alt="Photo Family"/>
                <div class="card-body">
                  <h2 class="card-title">Potret Keluarga</h2>
                  <p class="mt-2">Ciptakan kenangan keluarga yang abadi dengan potret yang penuh kehangatan.</p><br>
                  <div class="card-actions justify-end">
                    <button class="btn btn-primary">Book Now</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Foto 3 -->
            <div class="card card-side bg-base-100 shadow-xl">
            <div class="flex items-center">
              <img src="{{ asset('graduation.jpg') }}" alt="Foto Graduation" class="w-1/2 rounded-lg shadow-2xl"/>
              <div class="ml-4">
                <h2 class="text-2xl font-bold">Acara Graduation</h2>
                <p class="mt-2">Dokumentasikan acara perusahaan Anda dengan profesional dan elegan.</p><br>
                <div class="card-actions justify-end">
                  <button class="btn btn-primary">Book Now</button>
                </div>
              </div>
            </div>
          </div>

            <!-- Foto 4 -->
            <div class="card card-side bg-base-100 shadow-xl">
            <div class="flex items-center">
              <img src="{{ asset('product.jpg') }}" alt="Foto Produk" class="w-1/2 rounded-lg shadow-2xl"/>
              <div class="ml-4">
                <h2 class="text-2xl font-bold">Pemotretan Produk</h2>
                <p class="mt-2">Tingkatkan nilai produk Anda dengan foto produk berkualitas tinggi.</p><br>
                <div class="card-actions justify-end">
                  <button class="btn btn-primary">Book Now</button>
                </div>
              </div>
            </div>
          </div>
          </section>

          <!-- Additional sections -->
          <div class="hero bg-base-5 h-screen-75 mt-10">
            <div class="hero-content text-center">
              <div class="max-w-md">
                <h1 class="text-5xl font-bold">Hello there</h1>
                <p class="py-6">
                  Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                  quasi. In deleniti eaque aut repudiandae et a id nisi.
                </p>
                <button class="btn btn-primary">Get Started</button>
              </div>
            </div>
          </div>

          <div class="hero bg-base-200 min-h-screen mt-10">
            <div class="hero-content flex-col lg:flex-row">
              <img
                src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
                class="max-w-sm rounded-lg shadow-2xl" />
              <div>
                <h1 class="text-5xl font-bold">Box Office News!</h1>
                <p class="py-6">
                  Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                  quasi. In deleniti eaque aut repudiandae et a id nisi.
                </p>
                <button class="btn btn-primary">Get Started</button>
              </div>
            </div>
          </div>

          <!-- Footer -->
          <footer class="footer footer-center bg-base-200 text-base-content rounded p-10">
            <nav class="grid grid-flow-col gap-4">
              <a class="link link-hover">About us</a>
              <a class="link link-hover">Contact</a>
              <a class="link link-hover">Jobs</a>
              <a class="link link-hover">Press kit</a>
            </nav>
            <nav>
              <div class="grid grid-flow-col gap-4">
                <a>
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
                <a>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    class="fill-current">
                    <path
                      d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
                  </svg>
                </a>
                <a>
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
        </main>
      </div>
    </body>
  </x-app-layout>
</html>
