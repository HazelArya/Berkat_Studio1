<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Nama paket
            $table->string('image'); // Lokasi gambar
            $table->decimal('rating', 2, 1); // Rating (misalnya 4.5)
            $table->string('class'); // class yang mau diambil (reguler, vip, vvip)
            $table->string('description'); // Deskripsi
            $table->string('price'); // Harga
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('packages');
    }
}


<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PackageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/packages', [PackageController::class, 'index']);


// {{-- @section('content')
//     <section class="featured-items py-8" id="featured-items">
//         <div class="container mx-auto">
//             <!-- Class Selector Buttons -->
//             <div class="mb-4">
//                 <button class="class-btn" data-class="reguler">Reguler</button>
//                 <button class="class-btn" data-class="vip">VIP</button>
//                 <button class="class-btn" data-class="vvip">VVIP</button>
//             </div>
    
//             <div class="owl-carousel owl-theme">
//                 <div class="carousel w-full space-x-2">
//                     @forelse($packages as $package)
//                         <div class="carousel-item relative w-1/3"
//                             data-package="{{ $package->id }}"
//                             data-price-reguler="{{ $package->price_reguler }}"
//                             data-price-vip="{{ $package->price_vip }}"
//                             data-price-vvip="{{ $package->price_vvip }}"
//                             data-description-reguler="{{ $package->description_reguler }}"
//                             data-description-vip="{{ $package->description_vip }}"
//                             data-description-vvip="{{ $package->description_vvip }}">
//                             <div class="card bg-base-100 shadow-xl group">
//                                 <figure>
//                                     <img src="{{ asset($package->image) }}" alt="{{ $package->title }}">
//                                 </figure>
//                                 <div class="card-body absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity">
//                                     <h4 class="card-title text-white">
//                                         {{ $package->title }} - <span class="class-name">{{ ucfirst($package->class) }}</span>
//                                         <div class="rating rating-sm">
//                                             @for ($i = 0; $i < floor($package->rating); $i++)
//                                                 <input type="radio" name="rating-{{ $package->id }}" class="mask mask-star-2 bg-yellow-400" checked />
//                                             @endfor
//                                             @if ($package->rating - floor($package->rating) >= 0.5)
//                                                 <input type="radio" name="rating-{{ $package->id }}" class="mask mask-star-2 bg-yellow-400" />
//                                             @endif
//                                             <span>({{ $package->rating ?? 'N/A' }})</span>
//                                         </div>
//                                     </h4>
//                                     <ul class="text-sm text-white">
//                                         <li><span class="font-bold">Description:</span> <span class="description">{{ $package->{'description_' . $package->class} ?? 'N/A' }}</span></li>
//                                         <li><span class="font-bold">Price:</span> $<span class="price">{{ $package->{'price_' . $package->class} ?? 'N/A' }}</span></li>
//                                     </ul>
//                                 </div>
//                             </div>
//                         </div>
//                     @empty
//                         <p>No packages available.</p>
//                     @endforelse
//                 </div>
//             </div>
//         </div>
//     </section>
    
//     @section('scripts')
//     <script>
//     document.addEventListener('DOMContentLoaded', function () {
//         const classButtons = document.querySelectorAll('.class-btn');
//         const packages = document.querySelectorAll('.carousel-item');
    
//         classButtons.forEach(button => {
//             button.addEventListener('click', function () {
//                 const selectedClass = this.dataset.class;
    
//                 packages.forEach(packageItem => {
//                     const priceElement = packageItem.querySelector('.price');
//                     const descriptionElement = packageItem.querySelector('.description');
//                     const classNameElement = packageItem.querySelector('.class-name');
    
//                     // Update the class name display
//                     classNameElement.textContent = capitalizeFirstLetter(selectedClass);
    
//                     // Update price and description based on the selected class
//                     const price = packageItem.dataset['price' + capitalizeFirstLetter(selectedClass)] || 'N/A';
//                     const description = packageItem.dataset['description' + capitalizeFirstLetter(selectedClass)] || 'N/A';
    
//                     priceElement.textContent = price;
//                     descriptionElement.textContent = description;
//                 });
//             });
//         });
    
//         function capitalizeFirstLetter(string) {
//             return string.charAt(0).toUpperCase() + string.slice(1);
//         }
//     });
//     </script>
//     @endsection --}}


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Nama paket
            $table->string('image'); // Lokasi gambar
            $table->decimal('rating', 2, 1); // Rating (misalnya 4.5)
            $table->enum('class', ['reguler', 'vip', 'vvip']); // Jenis class
            // Menyimpan deskripsi dan harga untuk setiap jenis class
            $table->text('description_reguler'); // Deskripsi untuk reguler
            $table->text('description_vip'); // Deskripsi untuk vip
            $table->text('description_vvip'); // Deskripsi untuk vvip
            $table->decimal('price_reguler', 10, 2); // Harga untuk reguler
            $table->decimal('price_vip', 10, 2); // Harga untuk vip
            $table->decimal('price_vvip', 10, 2); // Harga untuk vvip
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('packages');
    }
}

buatkan saya view package.blade.php nya berdasarkan database diatas