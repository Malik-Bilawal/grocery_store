@extends("user.layouts.master-layouts.plain")
<!-- SwiperJS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<title>Grocery Station One | Home </title>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

@push("script")
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endpush

@push("style")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>


    body {
        font-family: 'Inter', sans-serif;
        overflow-x: hidden;
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        height: 80vh;
        min-height: 600px;
        overflow: hidden;
    }

    .hero-section {
  position: relative;
  height: 100vh; /* full height, no bottom gap */
  min-height: 600px;
  overflow: hidden;
}

.hero-slide {
  position: absolute;
  inset: 0;
  opacity: 0;
  transition: opacity 1s ease-in-out;
}

.hero-slide.active-slide {
  opacity: 1;
  z-index: 10;
}



    /* Floating Elements */
    .floating-element {
        position: absolute;
        border-radius: 50%;
        opacity: 0.1;
        z-index: 1;
        animation: float 6s ease-in-out infinite;
    }

    .floating-element-1 {
        width: 120px;
        height: 120px;
        background: var(--primary-color);
        top: 10%;
        left: 5%;
    }

    .floating-element-2 {
        width: 80px;
        height: 80px;
        background: var(--secondary-color);
        top: 70%;
        right: 10%;
        animation-delay: 2s;
    }

    .floating-element-3 {
        width: 60px;
        height: 60px;
        background: var(--accent-color);
        bottom: 20%;
        left: 15%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }


.product-card:hover {
  transform: translateY(-10px);
}


    /* Special Offers Section */
    .offer-section {
        background: var(--gradient-primary);
        border-radius: 30px;
        overflow: hidden;
        position: relative;
    }

    .offer-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23000000' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        opacity: 0.1;
    }

    .offer-content {
        position: relative;
        z-index: 2;
    }

    .group:hover .rounded-full {
  box-shadow: 0 0 25px rgba(249,115,22,0.3), 0 0 50px rgba(249,115,22,0.15);
}


    .offer-badge {
        background: white;
        color: var(--primary-color);
        border-radius: 12px;
        padding: 0.5rem 1rem;
        font-weight: 700;
        display: inline-block;
        margin-bottom: 1rem;
    }

    .countdown-timer {
        display: flex;
        gap: 1rem;
        margin: 1.5rem 0;
    }

    .countdown-item {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 1rem;
        text-align: center;
        min-width: 70px;
    }

    .countdown-value {
        font-size: 1.5rem;
        font-weight: 800;
        display: block;
    }

    .countdown-label {
        font-size: 0.75rem;
        opacity: 0.9;
    }

    /* Carousel Indicators */
    .carousel-indicator {
        width: 12px;
        height: 12px;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .carousel-indicator.active-indicator {
        background: white;
        transform: scale(1.2);
    }

    /* Section Headers */
    .section-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-title {
        font-size: 3rem;
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
    }

    .section-subtitle {
        font-size: 1.25rem;
        color: #6b7280;
        max-width: 600px;
        margin: 0 auto;
    }

    /* Animations */
    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease;
    }

    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--primary-color);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--primary-hover);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .section-title {
            font-size: 2.5rem;
        }
        
        .countdown-timer {
            gap: 0.5rem;
        }
        
        .countdown-item {
            min-width: 60px;
            padding: 0.75rem;
        }
    }
</style>
@endpush

@section("content")
<div class="bg-gray-50 mt-14">
    <!-- Floating Background Elements -->
    <div class="floating-element floating-element-1"></div>
    <div class="floating-element floating-element-2"></div>
    <div class="floating-element floating-element-3"></div>

  <!-- Hero Carousel -->
  <section class="
relative hero-section overflow-hidden shadow-2xl mt-0

w-screen mx-0 rounded-none
h-[40svh] max-h-[40svh]

min-h-[180px] max-h-[220px]

/* TABLET */
sm:h-[70vh] sm:max-h-none sm:mx-4 sm:rounded-[2rem]

/* DESKTOP – full width, keep height and rounded corners */
lg:mx-0 lg:w-full lg:h-[100vh] lg:rounded-[2rem] lg:mt-10
">



@foreach ($heroSliders as $index => $slider)
<div 
    class="hero-slide absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-1000 ease-in-out {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}"
    style="background-image: url('{{ asset('storage/app/public/' . $slider->image) }}')"
    id="slide{{ $index + 1 }}">
</div>

<!-- Gradient Overlay -->
<div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/30 to-black/60"></div>

<!-- CONTENT -->
<!-- ❌ HIDDEN ON MOBILE | ✅ VISIBLE ON TABLET+ -->
<div class="relative z-10 h-full hidden sm:flex items-center text-white">
    <div class="container mx-auto px-6">
        <div class="max-w-3xl" data-aos="fade-right" data-aos-delay="300">

            @if($slider->title)
            <h1 class="text-4xl md:text-7xl font-extrabold leading-snug mb-4"
                style="font-family: 'Poppins', 'Manrope', sans-serif; letter-spacing: -0.5px;">
                <span class="bg-clip-text text-transparent 
                             bg-gradient-to-r from-[var(--primary-color)] via-[var(--secondary-color)]
                             drop-shadow-[0_3px_8px_rgba(0,0,0,0.25)]">
                    {{ $slider->title }}
                </span>
            </h1>
            @endif

            @if($slider->description)
            <p class="text-base md:text-xl leading-relaxed mb-8
                      bg-white/10 backdrop-blur-md p-4 rounded-2xl
                      border border-white/10">
                {{ $slider->description }}
            </p>
            @endif

            @if($slider->button_text && $slider->button_url)
            <a href="{{ $slider->button_url }}" 
               class="inline-flex items-center gap-2
                      bg-gradient-to-r from-[var(--primary-color)] via-[var(--secondary-color)]
                      hover:from-[var(--secondary-color)] hover:to-[var(--primary-color)]
                      text-white px-8 py-3.5 rounded-full
                      font-semibold transition-all duration-300
                      shadow-[0_0_20px_rgba(59,130,246,0.4)]">
                {{ $slider->button_text }}
                <i class="fas fa-arrow-right text-sm"></i>
            </a>
            @endif

        </div>
    </div>
</div>

@endforeach

<!-- Indicators -->
<div class="absolute bottom-3 sm:bottom-6 left-1/2 -translate-x-1/2 flex space-x-2 sm:space-x-3 z-20">
@foreach ($heroSliders as $index => $slider)
<button 
    class="carousel-indicator w-2.5 h-2.5 sm:w-4 sm:h-4 rounded-full border-2 border-white transition-all duration-300 {{ $index === 0 ? 'bg-white scale-110' : 'bg-transparent hover:bg-white/60' }}"
    data-slide="{{ $index + 1 }}">
</button>
@endforeach
</div>

</section>

<style>
  /* --- Carousel Container --- */
  .carousel-container {
    position: relative;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding-top: 4rem;
    padding-bottom: 8rem;
  }

/* --- 3D Scene (UPDATED) --- */
.carousel-scene {
    position: relative;
    width: min(240px, 90vw);
    height: min(320px, 60vw);
    margin: auto;
    perspective: 3000px; /* <--- THIS WAS THE MISSING LINE */
    /* Increased perspective from 3000px to 4000px to 'flatten' the view more */
  }
  /* --- Carousel Ring --- */
  .carousel-ring {
    width: 100%;
    height: 100%;
    position: absolute;
    transform-style: preserve-3d;
    transition: transform 0.8s cubic-bezier(0.76, 0, 0.24, 1);
  }

  /* --- Carousel Panel --- */
  .carousel-panel {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
    background-color: #f3f4f6;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    transition: transform 0.7s ease, opacity 0.7s ease;
  }

  /* Panel image */
  .carousel-panel img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s ease;
  }
  .carousel-panel:hover img {
    transform: scale(1.1);
  }

  /* Category text */
  .carousel-panel h3 {
    position: absolute;
    bottom: -2rem;
    width: 100%;
    text-align: center;
    font-weight: 600;
    color: #1f2937;
    transition: color 0.5s ease;
    padding: 0 0.5rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .carousel-panel:hover h3 {
    color: var(--primary-color);
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .carousel-scene {
      width: min(180px, 90vw);
      height: min(240px, 60vw);
    }
  }

/* Keyframes for the blobs */
@keyframes float {
  0% { transform: translateY(0px) translateX(0px) rotate(0deg); }
  50% { transform: translateY(-20px) translateX(10px) rotate(10deg); }
  100% { transform: translateY(0px) translateX(0px) rotate(0deg); }
}
@keyframes float-delay-3 {
  0% { transform: translateY(0px) translateX(0px) rotate(0deg); }
  50% { transform: translateY(15px) translateX(-10px) rotate(-8deg); }
  100% { transform: translateY(0px) translateX(0px) rotate(0deg); }
}
.animate-float { animation: float 6s ease-in-out infinite; }
.animate-float-delay-3 { animation: float 8s ease-in-out infinite 2s; }
</style>
<section class="relative py-24 bg-gradient-to-b from-gray-50 to-white overflow-hidden">
    <div class="absolute -top-20 -left-20 w-96 h-96 bg-[var(--primary-color)]/10 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[var(--secondary-color)]/10 rounded-full blur-3xl animate-float-delay-3"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                Shop by
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[var(--primary-color)] to-[var(--secondary-color)]">
                    Category
                </span>
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Discover categories that make your shopping simple and stylish.
            </p>
        </div>

        @if(isset($categories) && $categories->count() > 0)
<div class="carousel-container">

    <div class="carousel-scene">
        <div class="carousel-ring">
            @foreach($categories as $category)
                <div class="carousel-panel rounded-2xl overflow-hidden shadow-lg flex flex-col items-center">

                    <!-- Card Image -->
                    <div class="relative w-full h-full cursor-pointer"
                         onclick="window.location='{{ route('product', ['category' => $category->slug]) }}'">

                        @if(!empty($category->image))
                            <img src="{{ asset('storage/app/public/' . $category->image) }}"
                                 alt="{{ $category->name }}"
                                 class="w-full h-full object-cover rounded-t-2xl">
                        @else
                            <div class="flex items-center justify-center w-full h-full bg-gradient-to-br from-[var(--primary-color)]/10 to-[var(--secondary-color)]/10 rounded-t-2xl">
                                <i class="{{ $category->icon_class ?? 'fas fa-apple-alt' }} text-6xl text-[var(--primary-color)]"></i>
                            </div>
                        @endif

                    </div>
<!-- Button Below Card -->
<!-- Button Below Card -->
<button    onclick="applyCategoryAndRedirect({{ $category->id }})"
   class="mt-3 mb-2 inline-flex items-center justify-center px-4 py-2
          bg-gradient-to-r from-[var(--primary-color)] to-[var(--secondary-color)]
          text-white text-sm font-semibold rounded-full shadow
          transition-transform duration-300 hover:scale-105 hover:shadow-md">
    {{ $category->name }}
</button>
<script>
function applyCategoryAndRedirect(categoryId) {
    localStorage.setItem('selectedCategory', categoryId);
    window.location.href = '/product';
}
</script>


                </div>
            @endforeach


                </div>
            </div>

            <div class="flex justify-center gap-4 mt-12">
                <button id="prev-button" class="bg-white/80 backdrop-blur-md shadow-lg rounded-full p-3 hover:bg-white transition">
                    <i class="fas fa-chevron-left text-[var(--primary-color)]"></i>
                </button>
                <button id="next-button" class="bg-white/80 backdrop-blur-md shadow-lg rounded-full p-3 hover:bg-white transition">
                    <i class="fas fa-chevron-right text-[var(--primary-color)]"></i>
                </button>
            </div>
        </div>

        @else
        <div class="text-center py-16" data-aos="zoom-in">
            <p class="text-lg text-gray-500">No categories to display right now.</p>
        </div>
        @endif

        <div class="text-center mt-6 -mb-4">
            <a href="{{ route('category') }}"
               class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[var(--primary-color)] to-[var(--secondary-color)] text-white rounded-full font-semibold shadow-md hover:shadow-lg transition-transform hover:scale-105">
                See More Categories <i class="fas fa-arrow-right text-sm"></i>
            </a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const ring = document.querySelector('.carousel-ring');
  const panels = document.querySelectorAll('.carousel-panel');
  const prevButton = document.getElementById('prev-button');
  const nextButton = document.getElementById('next-button');
  const scene = document.querySelector('.carousel-scene');

  if (!ring || !panels.length || !prevButton || !nextButton || !scene) {
    console.warn('Carousel elements not found. Carousel will not initialize.');
    return;
  }

  const panelCount = panels.length;
  if (panelCount === 0) return;

  const anglePerItem = 360 / panelCount;
  const panelWidth = scene.clientWidth;
  
  let radius;
  
  const baseRadius = Math.round((panelWidth / 2) / Math.tan(Math.PI / panelCount));

  if (panelCount <= 5) {
    radius = baseRadius + 80; 
    scene.style.perspective = '2000px';
  } 
  else if (panelCount <= 8) {
    radius = baseRadius + 100; 
    scene.style.perspective = '4000px'; 
  } 
  else if (panelCount <= 12) {
    radius = baseRadius + 130; 
    scene.style.perspective = '6000px'; 
  } 
  else {
    radius = baseRadius + 150; 
    scene.style.perspective = '8000px'; 
  }

  panels.forEach((panel, index) => {
    const rotation = index * anglePerItem;
    panel.style.transform = `rotateY(${rotation}deg) translateZ(${radius}px)`;
  });

  let currentAngle = 0;

  const rotateRing = (angle) => {
    ring.style.transform = `rotateY(${angle}deg)`;
  }

  prevButton.addEventListener('click', () => {
    currentAngle += anglePerItem;
    rotateRing(currentAngle);
  });

  nextButton.addEventListener('click', () => {
    currentAngle -= anglePerItem;
    rotateRing(currentAngle);
  });
});
</script>
    <!-- Featured Products -->
    <!-- Featured Products -->
    <section class="relative py-24 bg-gradient-to-b from-gray-50 via-white to-gray-50 overflow-hidden">
  <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(249,115,22,0.06),transparent_60%)]"></div>

  <div class="container mx-auto px-6 relative z-10">
    <div class="text-center mb-16" data-aos="fade-up">
      <h2 class="text-4xl font-bold mb-4">Featured Products</h2> <p class="text-gray-500 text-lg max-w-2xl mx-auto">
        Discover our most popular and highly-rated grocery items.
      </p>
    </div>

    @if(isset($products) && $products->isNotEmpty())

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
        
        @foreach($products as $product)
        
          @include('user.components.home-product-cards', ['product' => $product])
          
        @endforeach
        
      </div>

    @else

      <div class="text-center text-gray-500" data-aos="fade-up">
        <p>No products found at this time.</p>
      </div>
      
    @endif

  </div>
</section>


    <!-- Special Offers -->
    @if($activeSale)
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="offer-section p-12" data-aos="zoom-in">
                <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                    <!-- Content -->
                    <div class="offer-content text-white lg:w-1/2">
                        <span class="offer-badge">Limited Time Offer</span>
                        <h2 class="text-4xl lg:text-5xl font-bold mb-4">{{ $activeSale->name }}</h2>
                        <p class="text-xl mb-6 opacity-90">{{ $activeSale->description }}</p>

                        <!-- Discount Badge -->
                        <div class="flex items-center gap-4 mb-6">
                            <div class="bg-white text-[var(--primary-color)] font-bold py-2 px-4 rounded-xl text-2xl">
                                <span>{{ $activeSale->discount_percent }}</span>% OFF
                            </div>
                            <span class="text-xl font-semibold">On Selected Items</span>
                        </div>

                        <!-- Countdown Timer -->
                        <div class="countdown-timer" id="countdown">
                            <!-- Countdown will be populated by JavaScript -->
                        </div>

                        <a href="{{ route('product') }}"
                           class="bg-[var(--secondary-color)] text-[var(--text-on-secondary)] font-bold py-4 px-8 rounded-xl hover:bg-[var(--secondary-hover)] transition transform hover:-translate-y-1 inline-flex items-center gap-2">
                           Shop the Sale
                           <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Visual -->
                    <div class="lg:w-1/2 flex justify-center">
                        <div class="relative" data-aos="zoom-in" data-aos-delay="500">
                            <div class="w-80 h-80 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                <i class="fas fa-gift text-white text-8xl"></i>
                            </div>
                            <div class="absolute -top-4 -right-4 w-24 h-24 bg-[var(--secondary-color)] rounded-full flex items-center justify-center">
                                <span class="text-[var(--text-on-secondary)] font-bold text-xl">Sale</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Countdown Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const countdownElement = document.getElementById('countdown');
        const saleEndTime = new Date("{{ \Carbon\Carbon::parse($activeSale->ends_at)->timezone('Asia/Karachi')->format('Y-m-d H:i:s') }}").getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = saleEndTime - now;

            if (distance <= 0) {
                countdownElement.innerHTML = `
                    <div class="countdown-item">
                        <span class="countdown-value">0</span>
                        <span class="countdown-label">Days</span>
                    </div>
                    <div class="countdown-item">
                        <span class="countdown-value">0</span>
                        <span class="countdown-label">Hours</span>
                    </div>
                    <div class="countdown-item">
                        <span class="countdown-value">0</span>
                        <span class="countdown-label">Minutes</span>
                    </div>
                    <div class="countdown-item">
                        <span class="countdown-value">0</span>
                        <span class="countdown-label">Seconds</span>
                    </div>
                `;
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            countdownElement.innerHTML = `
                <div class="countdown-item">
                    <span class="countdown-value">${days}</span>
                    <span class="countdown-label">Days</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-value">${hours}</span>
                    <span class="countdown-label">Hours</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-value">${minutes}</span>
                    <span class="countdown-label">Minutes</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-value">${seconds}</span>
                    <span class="countdown-label">Seconds</span>
                </div>
            `;
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    });
    </script>
    @endif
</div>
@endsection

@push("script")
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.hero-slide');
    const indicators = document.querySelectorAll('.carousel-indicator');
    let currentSlide = 0;
    let slideInterval = 5000; // 5 seconds
    let slideTimer = setInterval(nextSlide, slideInterval);

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.opacity = (i === index) ? '1' : '0';
            slide.style.zIndex = (i === index) ? '10' : '0';
        });

        indicators.forEach((indicator, i) => {
            if(i === index) {
                indicator.classList.add('bg-white', 'scale-110');
                indicator.classList.remove('bg-transparent', 'hover:bg-white/60');
            } else {
                indicator.classList.remove('bg-white', 'scale-110');
                indicator.classList.add('bg-transparent', 'hover:bg-white/60');
            }
        });

        currentSlide = index;
    }

    function nextSlide() {
        let nextIndex = (currentSlide + 1) % slides.length;
        showSlide(nextIndex);
    }

    // Indicator click
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            showSlide(index);
            clearInterval(slideTimer);
            slideTimer = setInterval(nextSlide, slideInterval);
        });
    });

    // Pause on hover
    const heroSection = document.querySelector('.hero-section');
    heroSection.addEventListener('mouseenter', () => clearInterval(slideTimer));
    heroSection.addEventListener('mouseleave', () => {
        slideTimer = setInterval(nextSlide, slideInterval);
    });

    // Show first slide initially
    showSlide(0);
});
</script>

@endpush