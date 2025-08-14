<x-app-layout>
<title>Package-Studio Photo Berkat</title>
{{-- <x-app-layout> --}}
    
    @if(session('error'))
        <div class="flex justify-center gap-1 alert alert-danger border-2 border-red-500 bg-red-100 text-red-700">
            {{ session('error') }}
        </div>
    @endif

    <div class="hero min-h-screen bg-base-200" style="background-image: url({{ asset('background.jpg') }}); background-size: cover; background-position: center;">

        <div class="diff aspect-[16/9]">
            <div class="diff-item-1">
              <img alt="daisy" src="{{ asset('background.jpg') }}" />
            </div>
            <div class="diff-item-2">
              <img alt="daisy" src="{{ asset('background_blur.jpg') }}" />
            </div>
            <div class="diff-resizer"></div>
        </div>

        <div class="hero-content text-center">
            <div class="max-w-xl">
                <div class="max-w-md">
                    <h1 class="mb-5 text-5xl font-bold">Enter a World of Photos &amp; Amazing Awards</h1>
                    <p class="mb-5 text-white">Discover our exclusive packages for every occasion. Choose the class that suits your needs and enjoy the benefits tailored to you.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Get Started</a>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Benefit class -->
    {{-- <div class="hero min-h-screen bg-base-200" style="background-image: url('{{ asset('background.jpg') }}'); background-size: cover; background-position: center;">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Enter a World of Photos &amp; Amazing Awards</h1>
                <p class="mb-5">Discover our exclusive packages for every occasion. Choose the class that suits your needs and enjoy the benefits tailored to you.</p>
                <a class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </div> --}}

    <div class="container mx-auto p-6 flex flex-col items-center">
        <h2 class="text-4xl font-bold text-center mb-8">Our Packages</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl">
            <!-- Reguler Package -->
            <div class="card shadow-xl h-full">
                <div class="card-body flex flex-col justify-between h-[28rem]">
                    <div>
                        <h3 class="text-2xl font-bold">Reguler</h3>
                        <p class="text-gray-500">Affordable photography for everyone.</p>
                        <h4 class="font-bold mt-4">Benefits:</h4>
                        <ul class="list-disc pl-6 text-gray-700">
                            <li>Basic photo editing</li>
                            <li>No prints included</li>
                            <li>Digital copy only</li>
                            <li>Reguler area</li>
                        </ul>
                    </div>
                    <div class="card-actions mt-4">
                        <button class="btn btn-primary w-full">Select Reguler</button>
                    </div>
                </div>
            </div>

            <!-- VIP Package -->
            <div class="card shadow-xl h-full">
                <div class="card-body flex flex-col justify-between h-[28rem]">
                    <div>
                        <h3 class="text-2xl font-bold">VIP</h3>
                        <p class="text-gray-500">Perfect for special occasions.</p>
                        <h4 class="font-bold mt-4">Benefits:</h4>
                        <ul class="list-disc pl-6 text-gray-700">
                            <li>Advanced photo editing</li>
                            <li>10 printed photos</li>
                            <li>Digital copy</li>
                            <li>Medium area</li>
                            <li>Property</li>
                            <li>proper lighting</li>
                        </ul>
                    </div>
                    <div class="card-actions mt-4">
                        <button class="btn btn-secondary w-full">Select VIP</button>
                    </div>
                </div>
            </div>

            <!-- VVIP Package -->
            <div class="card shadow-xl h-full">
                <div class="card-body flex flex-col justify-between h-[28rem]">
                    <div>
                        <h3 class="text-2xl font-bold">VVIP</h3>
                        <p class="text-gray-500">Experience the ultimate luxury.</p>
                        <h4 class="font-bold mt-4">Benefits:</h4>
                        <ul class="list-disc pl-6 text-gray-700">
                            <li>Professional photo editing</li>
                            <li>Premium photo album</li>
                            <li>50 printed photos</li>
                            <li>Digital and framed photo</li>
                            <li>Large area</li>
                            <li>Full Property</li>
                            <li>proper lighting</li>
                        </ul>
                    </div>
                    <div class="card-actions mt-4">
                        <button class="btn btn-accent w-full">Select VVIP</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal sukses -->
    <input type="checkbox" id="success-modal" class="modal-toggle" @if(session('success')) checked @endif />
    <label for="success-modal" class="modal cursor-pointer">
        <div class="modal-box">
            <h2 class="text-xl font-semibold text-green-600">Booking Berhasil!</h2>
            <p>{{ session('success') }}</p>
            <div class="modal-action">
                <label for="success-modal" class="btn btn-success">OK</label>
            </div>
        </div>
    </label>

    <!-- Modal gagal -->
    <input type="checkbox" id="error-modal" class="modal-toggle" @if(session('error')) checked @endif />
    <label for="error-modal" class="modal cursor-pointer">
        <div class="modal-box">
            <h2 class="text-xl font-semibold text-red-600">Booking Gagal!</h2>
            <p>{{ session('error') }}</p>
            <div class="modal-action">
                <label for="error-modal" class="btn btn-error">OK</label>
            </div>
        </div>
    </label>

    <!-- List Package -->
    <div class="container mt-5">
        @foreach($package as $index => $pack)
        <div class="col-md-12 mb-4">
            <div class="card package-card position-relative">
                <!-- Image with 3/4 width -->
                <img src="{{ asset($pack->image) }}" class="card-img-top package-image " alt="{{ $pack->title }}">
                <div class="overlay d-flex align-items-center justify-content-end">
                    <div class="card-body package-info">
                        <div class="container mx-auto p-6 flex flex-col items-center">
                            <h5 class="card-title text-right">{{ $pack->title }}</h5>
                            <div class="flex justify-between w-full">
                                <h6>Deskripsi:</h6>
                                <strong class="text-right"> Rating: {{ $pack->rating }}</strong>
                            </div>
                            {{-- <p class="card-text-left"><strong>Rating:</strong> {{ $pack->rating }}</p> --}}
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-1 max-w-5xl">
                                <!-- Reguler Package -->
                                <div>
                                    <div class="card-body flex flex-col justify-between h-[20rem] border-8 border-gray-900 bg-black bg-opacity-50 rounded-3xl">
                                        <div>
                                            <h3 class="text-2xl font-bold">Reguler</h3>
                                            <p class="text-white">2 jam sesi foto</p>
                                            <p class="text-white">10 edited photos</p>
                                            <p class="text-white">softcopy file</p>
                                            <h4 class="font-bold mt-4">Price:</h4>
                                            <ul class="list-disc pl-6 text-white">
                                                <p> Rp{{ number_format($pack->price_reguler, 0) }}</p>
                                            </ul>
                                        </div>
                                        <div class="card-actions mt-4">
                                            @if(Auth::check())
                                            <!-- Show Book Now button only if user is logged in -->
                                            <button class="btn btn-primary py-1 px-2 text-sm" onclick="document.getElementById('bookingModal-{{ $pack->id }}').showModal()" aria-label="Book {{ $pack->title }}">
                                                Pilih
                                            </button>
                                        @else
                                            <!-- Show a message and redirect to login if the user is not logged in -->
                                            <a href="{{ route('login') }}" class="btn btn-primary">
                                                Pilih
                                            </a>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                    
                                <!-- VIP Package -->
                                <div>
                                    <div class="card-body flex flex-col justify-between h-[20rem] border-8 border-gray-900 bg-black bg-opacity-50 rounded-3xl">
                                        <div>
                                            <h3 class="text-2xl font-bold">VIP</h3>
                                            <p class="text-white">3 jam sesi foto</p>
                                            <p class="text-white">15 edited photos</p>
                                            <p class="text-white">softcopy file</p>
                                            <h4 class="font-bold mt-4">Price:</h4>
                                            <ul class="list-disc pl-6 text-white0">
                                                <p> Rp{{ number_format($pack->price_vip, 0) }}</p>
                                            </ul>
                                        </div>
                                        <div class="card-actions mt-4">
                                            @if(Auth::check())
                                            <!-- Show Book Now button only if user is logged in -->
                                            <button class="btn btn-primary" onclick="document.getElementById('bookingModal-{{ $pack->id }}').showModal()" aria-label="Book {{ $pack->title }}">
                                                Pilih
                                            </button>
                                        @else
                                            <!-- Show a message and redirect to login if the user is not logged in -->
                                            <a href="{{ route('login') }}" class="btn btn-primary">
                                                Pilih
                                            </a>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                    
                                <!-- VVIP Package -->
                                <div>
                                    <div class="card-body flex flex-col justify-between h-[20rem] border-8 border-gray-900 bg-black bg-opacity-50 rounded-3xl">
                                        <div>
                                            <h3 class="text-2xl font-bold">VVIP</h3>
                                            <p class="text-white">4 jam sesi foto</p>
                                            <p class="text-white">20 edited photos</p>
                                            <p class="text-white">softcopy file</p>
                                            <h4 class="font-bold mt-4">Price:</h4>
                                            <ul class="list-disc pl-6 text-white">
                                                <p> Rp{{ number_format($pack->price_vvip, 0) }}</p>
                                            </ul>
                                        </div>
                                        <div class="card-actions mt-4">
                                            @if(Auth::check())
                                            <!-- Show Book Now button only if user is logged in -->
                                            <button class="btn btn-primary" onclick="document.getElementById('bookingModal-{{ $pack->id }}').showModal()" aria-label="Book {{ $pack->title }}">
                                                Pilih
                                            </button>
                                        @else
                                            <!-- Show a message and redirect to login if the user is not logged in -->
                                            <a href="{{ route('login') }}" class="btn btn-primary">
                                                Pilih
                                            </a>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Booking Modal -->
        <dialog id="bookingModal-{{ $pack->id }}" class="modal">
            <div class="modal-box">
                <h5 class="modal-title">Book {{ $pack->title }}</h5>
                <form method="POST" action="{{ route('booking.store') }}">
                    @csrf
                    <input type="hidden" name="package_id" value="{{ $pack->id }}">

                    <div class="mb-3">
                        <label for="customerName" class="form-label">Nama Customer</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="customerName" 
                            name="customer_name" 
                            value="{{ Auth::check() ? Auth::user()->name : '' }}" 
                            placeholder="Masukkan nama customer" 
                            readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="bookingDate-{{ $pack->id }}" class="form-label">Booking Date</label>
                        <input 
                            type="date" 
                            class="form-control" 
                            id="bookingDate-{{ $pack->id }}" 
                            name="booking_date" 
                            min="{{ now()->toDateString() }}" 
                            onchange="updateAvailableTimeSlots({{ $pack->id }})"
                            required>
                            @error('booking_date')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="class-{{ $pack->id }}" class="form-label">Class</label>
                        <select 
                            id="class-{{ $pack->id }}" 
                            name="class" 
                            onchange="updatePrice({{ $pack->id }})" 
                            class="form-control" 
                            required>
                            <option value="reguler" data-price="{{ $pack->price_reguler }}">Reguler</option>
                            <option value="vip" data-price="{{ $pack->price_vip }}">VIP</option>
                            <option value="vvip" data-price="{{ $pack->price_vvip }}">VVIP</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <p id="price-display-{{ $pack->id }}" class="text-lg font-bold text-green-500">
                            Rp {{ number_format($pack->price_reguler, 0, ',', '.') }}
                        </p>
                        <input type="hidden" name="price" id="price-{{ $pack->id }}" value="{{ $pack->price_reguler }}">
                    </div>

                    <div class="mb-3">
                        <label for="timeSlot-{{ $pack->id }}" class="form-label">Time Slot</label>
                        <select class="form-control" id="timeSlot-{{ $pack->id }}" name="time_slot" required>
                            <option value="09:00">09:00</option>
                            <option value="12:00">12:00</option>
                            <option value="15:00">15:00</option>
                            <option value="19:00">19:00</option>
                        </select>
                        @error('booking_time')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="clientNote" class="form-label">Additional Notes</label>
                        <textarea class="form-control" id="clientNote" name="client_note" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Booking</button>
                </form>

                <form method="dialog" class="modal-backdrop">
                    <button class="btn">Close</button>
                </form>
            </div>
        </dialog>

        <script>
            // Function to update price based on class selection
        function updatePrice(packageId) {
            var selectedClass = document.getElementById('class-' + packageId).value;
            var priceDisplay = document.getElementById('price-display-' + packageId);
            var priceInput = document.getElementById('price-' + packageId);

            var price = 0;

            // Get the price data from the options of the select element
            var options = document.getElementById('class-' + packageId).options;

            // Determine price based on selected class
            switch (selectedClass) {
                case 'reguler':
                    price = parseFloat(options[0].getAttribute('data-price'));
                    break;
                case 'vip':
                    price = parseFloat(options[1].getAttribute('data-price'));
                    break;
                case 'vvip':
                    price = parseFloat(options[2].getAttribute('data-price'));
                    break;
            }

            // Update price display and hidden price input field
            priceDisplay.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(price);
            priceInput.value = price;
        }

        </script>
        @endforeach

        <script>
            // Function to update price based on class selection
            function updatePrice(packageId) {
                var selectedClass = document.getElementById('class-' + packageId).value;
                var priceDisplay = document.getElementById('price-display-' + packageId);
                var priceInput = document.getElementById('price-' + packageId);

                var price = 0;

                // Determine price based on selected class
                switch (selectedClass) {
                    case 'reguler':
                        price = parseInt(document.getElementById('class-' + packageId).options[0].getAttribute('data-price'));
                        break;
                    case 'vip':
                        price = parseInt(document.getElementById('class-' + packageId).options[1].getAttribute('data-price'));
                        break;
                    case 'vvip':
                        price = parseInt(document.getElementById('class-' + packageId).options[2].getAttribute('data-price'));
                        break;
                }

                // Update price display and hidden price input field
                priceDisplay.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(price);
                priceInput.value = price;
            }

        function updateAvailableTimeSlots(packId) {
                const dateInput = document.getElementById('bookingDate-' + packId);
                const timeSlotSelect = document.getElementById('timeSlot-' + packId);
                const selectedDate = new Date(dateInput.value);
                const today = new Date();

                // Reset all options
                Array.from(timeSlotSelect.options).forEach(option => {
                    option.disabled = false;
                });

                // Disable past time slots if the selected date is today
                if (selectedDate.toDateString() === today.toDateString()) {
                    const currentTime = today.getHours() + ':' + String(today.getMinutes()).padStart(2, '0');
                    Array.from(timeSlotSelect.options).forEach(option => {
                        if (option.value <= currentTime) {
                            option.disabled = true;
                        }
                    });
                }
            }

        </script>


        <style>
        .package-card {
            position: relative;
            height: 50vh;
            width: 185vh;
            overflow: hidden;
            border-radius: 15px; /* Rounded corners for the card */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
        }

        .package-image {
            width: 100%; /* Full width */
            height: auto; /* Maintain aspect ratio */
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
            backdrop-filter: blur(5px); /* Apply blur effect */
            display: flex;
            flex-direction: column;
            justify-content: center; /* Center vertically */
            align-items: flex-end; /* Align items to the right */
            padding: 20px; /* Add padding */
            border-radius: 15px; /* Match card border radius */
        }

        .package-info {
            color: white; /* Text color for better contrast */
            text-align: right; /* Align text to the right */
        }

        .class-scroll {
            max-height: 150px; /* Limit height for scrolling */
            overflow-y: auto; /* Enable scrolling */
            margin-top: 10px; /* Space above */
            padding: 10px; /* Inner padding */
            border-radius: 10px; /* Rounded corners */
            background: rgba(255, 255, 255, 0.1); /* Light background for readability */
        }

        .class-item {
            margin-bottom: 15px; /* Space between items */
        }

        .card-title, .card-text {
            margin: 0; /* Remove default margins */
        }

        .btn {
            width: 100%; /* Full width for button */
        }

        </style>
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
