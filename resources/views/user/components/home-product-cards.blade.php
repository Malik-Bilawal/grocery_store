<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    once: true // Optional
  });
</script>
@php
  // This @php block is fine here
  $defaultImage = $product->images->where('is_default', 1)->first() ?? $product->images->first();
@endphp

<div class="group product-card relative rounded-3xl"
     data-aos-delay="{{ $loop->index * 100 }}"     data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

  <div class="relative overflow-hidden rounded-t-3xl">
    <div id="carousel-{{ $product->id }}" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2500">

      <div class="carousel-indicators">
        @foreach($product->images as $index => $image)
          <button type="button" data-bs-target="#carousel-{{ $product->id }}"
                  data-bs-slide-to="{{ $index }}"
                  class="{{ $loop->first ? 'active' : '' }}"
                  aria-current="{{ $loop->first ? 'true' : 'false' }}"
                  aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
      </div>

      <div class="carousel-inner rounded-t-3xl">
        @foreach($product->images as $index => $image)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('storage/app/public/' . $image->image_path) }}"
                 class="d-block w-full h-[280px] object-cover transition-all duration-700 ease-in-out"
                 alt="{{ $product->name }}">
          </div>
        @endforeach
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $product->id }}" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-black/40 rounded-full p-2" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $product->id }}" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-black/40 rounded-full p-2" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    @if($product->badge_text ?? false)
      <span class="absolute top-4 left-4 bg-gradient-to-r from-[var(--secondary-color)] to-[var(--primary-color)] text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
        {{ $product->badge_text }}
      </span>
    @endif
  </div>

  <div class="p-6 flex flex-col justify-between">
    <div>
      <div class="text-gray-500 text-sm mb-1">{{ $product->category->name ?? 'Category' }}</div>
      <h3 class="text-lg font-bold text-gray-800 mb-3 line-clamp-2 group-hover:text-[var(--primary-color)] transition-colors">
        {{ $product->name }}
      </h3>

      @php
        $rating = $product->rating ?? 0; // handle nulls safely
        $fullStars = floor($rating);
        $halfStar = ($rating - $fullStars) >= 0.5;
        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
      @endphp

      <div class="flex items-center mb-4">
        <div class="flex text-[var(--secondary-color)] text-sm">
          {{-- Full stars --}}
          @for ($i = 0; $i < $fullStars; $i++)
            <i class="fas fa-star"></i>
          @endfor

          {{-- Half star --}}
          @if ($halfStar)
            <i class="fas fa-star-half-alt"></i>
          @endif

          {{-- Empty stars --}}
          @for ($i = 0; $i < $emptyStars; $i++)
            <i class="far fa-star"></i>
          @endfor
        </div>
        <span class="text-gray-500 text-xs ml-2">({{ number_format($rating, 1) }})</span>
      </div>

      <div class="flex items-center gap-3 mb-5">
        <span class="text-2xl font-bold text-[var(--primary-color)]">
          Rs{{ $product->offer_price ?? $product->price }}
        </span>
        @if($product->offer_price)
          <span class="text-gray-500 text-lg line-through">Rs{{ $product->price }}</span>
          @if($product->offer_price && !empty($product->price) && $product->price > 0)
            @php
              $discount = round((($product->price - $product->offer_price) / $product->price) * 100);
            @endphp
            <span class="text-[var(--secondary-color)] text-xs font-bold bg-[var(--secondary-color)]/10 px-2 py-1 rounded-full">
              {{ $discount }}% OFF
            </span>
          @endif
        @endif
      </div>
    </div>

    <div class="flex gap-3 mt-auto">
      <a href="{{ route('product.show', $product->slug) }}"
         class="flex-1 flex items-center justify-center gap-2 bg-gradient-to-r from-[var(--primary-color)] to-[var(--secondary-color)] text-white font-semibold px-4 py-2.5 rounded-xl shadow-md hover:shadow-lg hover:scale-[1.03] transition-all">
        <i class="fas fa-cart-plus"></i> Add to Cart
      </a>
      <button id="buy_now"
              data-product-id="{{ $product->id }}"
              data-quantity="1"
              data-price="{{ $product->price}}"
              data-weight="{{ $product->weight }}"
              id="buy_now" class="buy-now-btn w-12 h-12 flex items-center justify-center rounded-xl bg-gradient-to-r from-[var(--secondary-color)] to-yellow-400 text-white text-lg shadow-md hover:shadow-lg hover:scale-[1.1] transition-all">
        <i class="fas fa-bolt"></i>
      </button>
    </div>
  </div>
</div>