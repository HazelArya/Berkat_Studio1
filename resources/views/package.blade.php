<title>Package-Studio Photo Berkat</title>
<x-app-layout>
    
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
                <h2 class="text-5xl font-bold">Enter a world of <em>Photos</em> &amp; Amazing <em>Awards</em></h2>
                <p class="py-6">
                    SnapX Photography is a professional website template with 5 different HTML pages for maximum customizations. It is free for commercial usage. This Bootstrap v5.1.3 CSS layout is provided by TemplateMo Free CSS Templates.
                </p>
                <div class="flex justify-center gap-4">
                    <a href="contests.html" class="btn btn-primary">Explore SnapX Contest</a>
                    <a href="https://youtube.com/templatemo" target="_blank" class="btn btn-secondary">
                        <i class="fa fa-play"></i> Watch Our Video Now
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        @foreach($package as $index => $p)
        <div class="col-md-12 mb-4">
            <div class="card package-card position-relative">
                <!-- Image with 3/4 width -->
                <img src="{{ asset($p->image) }}" class="card-img-top package-image" alt="{{ $p->title }}">
                <div class="overlay d-flex align-items-center justify-content-end">
                    <div class="card-body package-info">
                        <h5 class="card-title text-left">{{ $p->title }}</h5>
                        <p class="card-text-left"><strong>Rating:</strong> {{ $p->rating }}</p>

                        <h6>Deskripsi:</h6>
                        <div class="class-scroll">
                            <div class="class-container">
                                <div class="class-item">
                                    <strong>Reguler:</strong>
                                    <p>{{ $p->description_reguler }}</p>
                                    <p><strong>Harga:</strong> ${{ number_format($p->price_reguler, 2) }}</p>
                                </div>
                                <div class="class-item">
                                    <strong>VIP:</strong>
                                    <p>{{ $p->description_vip }}</p>
                                    <p><strong>Harga:</strong> ${{ number_format($p->price_vip, 2) }}</p>
                                </div>
                                <div class="class-item">
                                    <strong>VVIP:</strong>
                                    <p>{{ $p->description_vvip }}</p>
                                    <p><strong>Harga:</strong> ${{ number_format($p->price_vvip, 2) }}</p>
                                </div>
                            </div>
                        </div>

                         <!-- Open the modal using ID.showModal() method -->
                <button class="btn btn-primary" onclick="document.getElementById('bookingModal-{{ $p->id }}').showModal()" aria-label="Book {{ $p->title }}">
                    Book Now
                </button>
                
            </div>
        </div>
    </div>
</div>

<!-- Booking Modal -->
<dialog id="bookingModal-{{ $p->id }}" class="modal">
    <div class="modal-box">
        <h5 class="modal-title">Book {{ $p->title }}</h5>
        <form method="POST" action="{{ route('booking.store') }}">
            @csrf
            <input type="hidden" name="package_id" value="{{ $p->id }}">

            <div class="mb-3">
                <label for="bookingDate" class="form-label">Booking Date</label>
                <input type="date" class="form-control" id="bookingDate" name="booking_date" required>
            </div>

            <div class="mb-3">
                <label for="timeSlot" class="form-label">Time Slot</label>
                <select class="form-control" id="timeSlot" name="time_slot" required>
                    <option value="morning">Morning</option>
                    <option value="afternoon">Afternoon</option>
                    <option value="evening">Evening</option>
                </select>
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
@endforeach

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
</x-app-layout>
