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
      <div class="carousel relative" style="width: 100%; height: 500px;">
        <!-- Slide 1 -->
          <div id="slide1" class="carousel-item relative">
            <img src="{{ asset('Pernikahan1.jpg') }}" alt="Foto Pernikahan" class="w-full" />
            <div class="absolute top-1/2 left-0 right-0 z-10 flex items-center justify-center">
              <div class="bg-black bg-opacity-50 text-white text-center px-6 py-12 w-full">
                <h1 class="text-3xl font-bold uppercase">Selamat Datang di Studio Berkat</h1>
                <p class="text-sm italic mt-2">Experience Elegant Perfection</p>
              </div>
              <div class="absolute left-5 right-5 top-0 flex -translate-y-1/2 transform justify-between">
                <button class="btn btn-circle" onclick="showSlide('slide4')">❮</button>
                <button class="btn btn-circle" onclick="showSlide('slide2')">❯</button>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div id="slide2" class="carousel-item relative">
            <img src="{{ asset('family.jpg') }}" alt="Foto Pernikahan" class="w-full" />
            <div class="absolute top-1/2 left-0 right-0 z-10 flex items-center justify-center">
              <div class="bg-black bg-opacity-50 text-white text-center px-6 py-12 w-full">
                <h1 class="text-3xl font-bold uppercase">Selamat Datang di Studio Berkat</h1>
                <p class="text-sm italic mt-2">Experience Elegant Perfection</p>
              </div>
              <div class="absolute left-5 right-5 top-0 flex -translate-y-1/2 transform justify-between">
                <button class="btn btn-circle" onclick="showSlide('slide1')">❮</button>
                <button class="btn btn-circle" onclick="showSlide('slide3')">❯</button>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div id="slide3" class="carousel-item relative">
            <img src="{{ asset('graduation.jpg') }}" alt="Foto Pernikahan" class="w-full" />
            <div class="absolute top-1/2 left-0 right-0 z-10 flex items-center justify-center">
              <div class="bg-black bg-opacity-50 text-white text-center px-6 py-12 w-full">
                <h1 class="text-3xl font-bold uppercase">Selamat Datang di Studio Berkat</h1>
                <p class="text-sm italic mt-2">Experience Elegant Perfection</p>
              </div>
              <div class="absolute left-5 right-5 top-0 flex -translate-y-1/2 transform justify-between">
                <button class="btn btn-circle" onclick="showSlide('slide2')">❮</button>
                <button class="btn btn-circle" onclick="showSlide('slide4')">❯</button>
              </div>
            </div>
          </div>

          <!-- Slide 4 -->
          <div id="slide4" class="carousel-item relative">
            <img src="{{ asset('product.jpg') }}" alt="Foto Pernikahan" class="w-full" />
            <div class="absolute top-1/2 left-0 right-0 z-10 flex items-center justify-center">
              <div class="bg-black bg-opacity-50 text-white text-center px-6 py-12 w-full">
                <h1 class="text-3xl font-bold uppercase">Selamat Datang di Studio Berkat</h1>
                <p class="text-sm italic mt-2">Experience Elegant Perfection</p>
              </div>
              <div class="absolute left-5 right-5 top-0 flex -translate-y-1/2 transform justify-between">
                <button class="btn btn-circle" onclick="showSlide('slide3')">❮</button>
                <button class="btn btn-circle" onclick="showSlide('slide1')">❯</button>
              </div>
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
                <img src="{{ asset('Pernikahan.jpg') }}" alt="Foto Pernikahan" class="w-1/2 rounded-lg shadow-2xl"/>
                <div class="card-body">
                  <h2 class="card-title">Pernikahan Modern</h2>
                  <p class="mt-2">Abadikan momen indah pernikahan tradisional dengan detail yang menawan.</p><br>
                  <div class="card-actions justify-end">
                    @auth
                    <a href="{{ route('package') }}" class="btn btn-primary">Book Now</a>
                    @else
                    <a href="{{ route('login') }}" class="btn" style="color: rgb(219, 75, 185); background: transparent; box-shadow: none; margin-left: 20px;">Login to Book</a>
                    @endauth
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
                  <div class="card-actions center justify-end">
                    @auth
                       <a href="{{ route('package') }}" class="btn btn-primary">Book Now</a>
                    @else
                    <a href="{{ route('login') }}" class="btn" style="color: rgb(219, 75, 185); background: transparent; box-shadow: none; margin-left: 20px;">Login to Book</a>
                    @endauth
                  </div>
                </div>
              </div>
            </div>

            <!-- Foto 3 -->
            <div class="card card-side bg-base-100 shadow-xl">
            <div class="flex items-center">
              <img src="{{ asset('graduation.jpg') }}" alt="Foto Graduation" class="w-1/2 rounded-lg shadow-2xl"/>
              <div class="card-body">
                <h2 class="card-title">Acara Graduation</h2>
                <p class="mt-2">Dokumentasikan acara perusahaan Anda dengan profesional dan elegan.</p><br>
                <div class="card-actions justify-end">
                  @auth
                     <a href="{{ route('package') }}" class="btn btn-primary">Book Now</a>
                  @else
                    <a href="{{ route('login') }}" class="btn" style="color: rgb(219, 75, 185); background: transparent; box-shadow: none; margin-left: 20px;">Login to Book</a>
                  @endauth
                </div>
              </div>
            </div>
          </div>

            <!-- Foto 4 -->
            <div class="card card-side bg-base-100 shadow-xl">
            <div class="flex items-center">
              <img src="{{ asset('product.jpg') }}" alt="Foto Produk" class="w-1/2 rounded-lg shadow-2xl"/>
              <div class="card-body">
                <h2 class="card-title">Pemotretan Produk</h2>
                <p class="mt-2">Tingkatkan nilai produk Anda dengan foto produk berkualitas tinggi.</p><br>
                <div class="card-actions justify-end">
                  @auth
                     <a href="{{ route('package') }}" class="btn btn-primary">Book Now</a>
                  @else
                  <a href="{{ route('login') }}" class="btn" style="color: rgb(219, 75, 185); background: transparent; box-shadow: none; margin-left: 20px;">Login to Book</a>
                  @endauth
                </div>
              </div>
            </div>
          </div>
          </section>

          <!-- Additional sections -->
          <!-- Reviews Section -->
          <div class="hero bg-base-5 h-screen-75 mt-10">
            <div class="hero-content text-center">
              <div class="max-w-5xl mx-auto">
                <h1 class="text-5xl font-bold">Apa Kata Mereka</h1>
                <p class="py-6">
                  Berikut Merupakan Review dari Beberapa Customer Kami.
                </p>

                <!-- Reviews Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
                  <!-- Review 1 -->
                  <div class="review-card bg-white shadow-md rounded-lg p-6">
                    <div class="flex items-center mb-4">
                      <img src="https://via.placeholder.com/150" alt="John Doe" class="w-12 h-12 rounded-full mr-4">
                      <div>
                        <h3 class="font-semibold">John Doe</h3>
                        <div class="flex text-yellow-500">★★★★☆</div>
                      </div>
                    </div>
                    <p class="text-gray-600">Pelayanan sangat baik dan hasil foto sangat memuaskan!</p>
                  </div>

                  <!-- Review 2 -->
                  <div class="review-card bg-white shadow-md rounded-lg p-6">
                    <div class="flex items-center mb-4">
                      <img src="https://via.placeholder.com/150" alt="Jane Smith" class="w-12 h-12 rounded-full mr-4">
                      <div>
                        <h3 class="font-semibold">Jane Smith</h3>
                        <div class="flex text-yellow-500">★★★★★</div>
                      </div>
                    </div>
                    <p class="text-gray-600">Tempat ini sangat direkomendasikan! Foto pernikahan kami luar biasa.</p>
                  </div>

                  <!-- Review 3 -->
                  <div class="review-card bg-white shadow-md rounded-lg p-6">
                    <div class="flex items-center mb-4">
                      <img src="https://via.placeholder.com/150" alt="Michael Johnson" class="w-12 h-12 rounded-full mr-4">
                      <div>
                        <h3 class="font-semibold">Michael Johnson</h3>
                        <div class="flex text-yellow-500">★★★★★</div>
                      </div>
                    </div>
                    <p class="text-gray-600">Pengalaman yang luar biasa, fotografernya sangat profesional.</p>
                  </div>

                  <!-- Review 4 -->
                  <div class="review-card bg-white shadow-md rounded-lg p-6">
                    <div class="flex items-center mb-4">
                      <img src="https://via.placeholder.com/150" alt="Alice Brown" class="w-12 h-12 rounded-full mr-4">
                      <div>
                        <h3 class="font-semibold">Alice Brown</h3>
                        <div class="flex text-yellow-500">★★★☆☆</div>
                      </div>
                    </div>
                    <p class="text-gray-600">Hasil fotonya bagus, tapi pengiriman agak terlambat.</p>
                  </div>

                  <!-- Review 5 -->
                  <div class="review-card bg-white shadow-md rounded-lg p-6">
                    <div class="flex items-center mb-4">
                      <img src="https://via.placeholder.com/150" alt="David Wilson" class="w-12 h-12 rounded-full mr-4">
                      <div>
                        <h3 class="font-semibold">David Wilson</h3>
                        <div class="flex text-yellow-500">★★★★★</div>
                      </div>
                    </div>
                    <p class="text-gray-600">Tim sangat profesional dan ramah. Akan kembali lagi!</p>
                  </div>

                  <!-- Review 6 -->
                  <div class="review-card bg-white shadow-md rounded-lg p-6">
                    <div class="flex items-center mb-4">
                      <img src="https://via.placeholder.com/150" alt="Emily Davis" class="w-12 h-12 rounded-full mr-4">
                      <div>
                        <h3 class="font-semibold">Emily Davis</h3>
                        <div class="flex text-yellow-500">★★★★☆</div>
                      </div>
                    </div>
                    <p class="text-gray-600">Pengalaman luar biasa dengan hasil foto yang luar biasa pula.</p>
                  </div>
                </div>

                <!-- Call to Action -->
                <div class="mt-10">
                  <a href="{{ route('register') }}" class="btn btn-primary">
                    Get Started
                  </a>
                </div>
              </div>
            </div>
          </div>


          {{-- <div class="hero bg-base-200 min-h-screen mt-10">
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
          </div> --}}

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
        </main>
      </div>
    </body>
    {{-- <a href="https://wa.me/6281290797698?text=Halo%20saya%20tertarik%20dengan%20layanan%20Anda" target="_blank">
      <button class="btn btn-primary">Hubungi Saya di WhatsApp</button>
  </a> --}}
  </x-app-layout>
</html>
