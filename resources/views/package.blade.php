<title>Package-Studio Photo Berkat</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Package Page') }}
        </h2>
    </x-slot>

    <div class="hero min-h-screen bg-base-200" style="background-image: url({{ asset('background.jpg') }}); background-size: cover; background-position: center;">

        <div class="diff aspect-[16/9]">
            <div class="diff-item-1">
              <img alt="daisy" src="{{ asset('background.jpg') }}" />
            </div>
            <div class="diff-item-2">
              <img
                alt="daisy"
                src="{{ asset('background_blur.jpg') }}" />
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
    
<h1>Packages</h1>



<div class="container mt-5">
  <h1 class="mb-4">Packages</h1>
  @foreach($package as $p)
  <div class="col-md-4 mb-4">
      <div class="card">
          <img src="{{ asset($p->image) }}" class="card-img-top" alt="{{ $p->title }}">
          <div class="card-body">
              <h5 class="card-title">{{ $p->title }}</h5>
              <p class="card-text"><strong>Rating:</strong> {{ $p->rating }}</p>
              
              <h6>Deskripsi:</h6>
              <p><strong>Reguler:</strong> {{ $p->description_reguler }}</p>
              <p><strong>VIP:</strong> {{ $p->description_vip }}</p>
              <p><strong>VVIP:</strong> {{ $p->description_vvip }}</p>
              
              <h6>Harga:</h6>
              <p><strong>Reguler:</strong> ${{ number_format($p->price_reguler, 2) }}</p>
              <p><strong>VIP:</strong> ${{ number_format($p->price_vip, 2) }}</p>
              <p><strong>VVIP:</strong> ${{ number_format($p->price_vvip, 2) }}</p>
              
              <a href="#" class="btn btn-primary">Book Now</a>
          </div>
      </div>
  </div>
@endforeach
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
