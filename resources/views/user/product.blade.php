@extends("user.layouts.master-layouts.plain")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Grocery Station One | Products </title>

@push("script")
<!-- Bootstrap 5 JS (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@push("style")
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/product.css') }}">

@endpush

@section('content')
<div class="bodyy">
    <!-- Hero Section -->
    <section class="relative overflow-hidden py-28 bg-gradient-to-br from-[var(--primary-color)] via-[var(--secondary-color)] to-orange-500 text-white rounded-t-[16px] md:rounded-t-[24px]">
        <div class="absolute inset-0 bg-black/30 mix-blend-multiply"></div>
        <div class="absolute -top-20 -left-20 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-yellow-300/20 rounded-full blur-[120px]"></div>

        <div class="relative container mx-auto px-6 text-center z-10">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight drop-shadow-lg tracking-tight">
                <span class="block">Discover Our</span>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-white">Popular Products</span>
            </h1>

            <p class="text-lg md:text-xl max-w-3xl mx-auto opacity-90 mb-10">
                We're here to help with any questions about our products, delivery, or your shopping experience.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#products" class="px-8 py-3 rounded-full bg-white text-[var(--primary-color)] font-semibold shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    Explore Now
                </a>
                <a href="{{ route('contact') }}" class="px-8 py-3 rounded-full border border-white/60 text-white font-semibold hover:bg-white/10 hover:backdrop-blur-md transition-all duration-300">
                    Contact Us
                </a>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="block w-full h-32 md:h-40 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="currentColor" d="
                    M0,200 
                    C120,280 240,120 360,200 
                    C480,280 600,120 720,200 
                    C840,280 960,120 1080,200 
                    C1200,280 1320,120 1440,200 
                    L1440,320 
                    L0,320 
                    Z">
                </path>
            </svg>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section" id="products">
        <div class="container">
            <!-- Filter Toggle Button for both mobile and desktop -->
            <button class="filter-toggle-btn" id="filter-toggle-btn">
                <i class="fas fa-filter"></i> Show Filters
            </button>

            <!-- Filter Drawer -->
            <div class="filter-overlay" id="filter-overlay"></div>
            <div class="filter-drawer" id="filter-drawer">
                <div class="filter-drawer-header">
                    <h3 class="filter-drawer-title">Filters</h3>
                    <button class="close-filter-drawer" id="close-filter-drawer">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Categories -->
                <div class="filter-group">
                    <h3 class="filter-title">
                        Categories
                        <button id="clear-categories">Clear</button>
                    </h3>
                    <ul class="category-list">
                        <li class="category-item">
                            <a href="#" class="category-link active" data-id="">
                                <span>ALL CATEGORIES</span>
                                <span class="category-count">{{ $totalProducts }}</span>
                            </a>
                        </li>
                        @foreach($categories as $category)
                        <li class="category-item">
                            <a href="#" class="category-link" data-id="{{ $category->id }}">
                                <span>{{ $category->name }}</span>
                                <span class="category-count">{{ $category->products->count() }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Price Range -->
                <div class="filter-group">
                    <h3 class="filter-title">
                        Price Range
                        <button class="price-reset-btn">Reset</button>
                    </h3>
                    <div class="price-range">
                        <div class="price-inputs">
                            <input type="number" class="price-input min-price" placeholder="Min" value="{{ $minPrice }}">
                            <input type="number" class="price-input max-price" placeholder="Max" value="{{ $maxPrice}}">
                        </div>
                        <button class="filter-btn">Apply Filter</button>
                    </div>
                </div>

                <!-- Customer Rating -->
                <div class="filter-group">
                    <h3 class="filter-title">
                        Customer Rating
                        <button class="rating-reset-btn">Clear</button>
                    </h3>
                    <div class="rating-options">
                        @foreach([5,4,3,2] as $rating)
                        <label class="rating-option">
                            <input type="checkbox" checked class="rating-checkbox" data-rating="{{ $rating }}">
                            <div class="rating-stars">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="{{ $i <= $rating ? 'fas' : 'far' }} fa-star"></i>
                                    @endfor
                            </div>
                            <span class="rating-text">& Up</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <!-- Availability -->
                <div class="filter-group">
                    <h3 class="filter-title">
                        Availability
                        <button class="availability-reset-btn">Clear</button>
                    </h3>
                    <div class="availability-options">
                        <label class="availability-option">
                            <input type="checkbox" class="availability-checkbox"  data-availability="in-stock">
                            <span>In Stock</span>
                        </label>
                        <label class="availability-option">
                            <input type="checkbox" class="availability-checkbox" data-availability="out-of-stock">
                            <span>Out of Stock</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <main class="products-main">
                <div class="products-header">
                    <div class="products-count">
                        Showing <span id="products-count">{{ $products->count() }}</span> products
                    </div>
                    <div class="view-options">
                        <button class="view-btn active" data-view="grid">
                            <i class="fas fa-th"></i>
                        </button>
                        <button class="view-btn" data-view="list">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>

                <div id="products-container" class="products-grid">
                    @include('user.components.product-cards', ['products' => $products])
                </div>

                <!-- Loader -->
                <div id="products-loader" style="display: none;">
                    <div class="loader"></div>
                </div>

                @if ($products->hasMorePages())
                <div class="load-more-container">
                    <button id="load-more-btn" class="load-more-btn">
                        Load More
                    </button>
                </div>
                @endif
            </main>
        </div>
    </section>
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter Drawer Functionality
        const filterToggleBtn = document.getElementById('filter-toggle-btn');
        const filterDrawer = document.getElementById('filter-drawer');
        const filterOverlay = document.getElementById('filter-overlay');
        const closeFilterDrawer = document.getElementById('close-filter-drawer');

        // Toggle filter drawer
        if (filterToggleBtn && filterDrawer) {
            filterToggleBtn.addEventListener('click', function() {
                filterDrawer.classList.add('active');
                filterOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        }

        // Close filter drawer
        if (closeFilterDrawer) {
            closeFilterDrawer.addEventListener('click', closeFilterDrawerHandler);
        }

        if (filterOverlay) {
            filterOverlay.addEventListener('click', closeFilterDrawerHandler);
        }

        function closeFilterDrawerHandler() {
            filterDrawer.classList.remove('active');
            filterOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        // Close drawer on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeFilterDrawerHandler();
            }
        });

        // View options toggle
        const viewButtons = document.querySelectorAll('.view-btn');
        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                viewButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                const viewType = this.dataset.view;
                const productsContainer = document.getElementById('products-container');

                if (productsContainer) {
                    if (viewType === 'list') {
                        productsContainer.classList.add('list-view');
                        productsContainer.classList.remove('grid-view');
                    } else {
                        productsContainer.classList.add('grid-view');
                        productsContainer.classList.remove('list-view');
                    }
                }
            });
        });

        // Filter functionality
        const container = document.getElementById('products-container');
        if (!container) return;

        const ratingCheckboxes = document.querySelectorAll('.rating-checkbox');
        const availabilityCheckboxes = document.querySelectorAll('.availability-checkbox');
        const clearRatingBtn = document.querySelector('.rating-reset-btn');
        const clearAvailabilityBtn = document.querySelector('.availability-reset-btn');
        const clearCategoriesBtn = document.getElementById('clear-categories');
        const priceResetBtn = document.querySelector('.price-reset-btn');
        const filterBtn = document.querySelector('.filter-btn');

        let filters = {
            category_id: '',
            min_price: 0,
            max_price: 100,
            ratings: [],
            availability: ['in-stock'],
            page: 1
        };

        function applyFilters() {
            filters.ratings = Array.from(ratingCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => parseInt(cb.dataset.rating) || null)
                .filter(r => r !== null);

            filters.availability = Array.from(availabilityCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.dataset.availability);

            const minInput = document.querySelector('.min-price');
            const maxInput = document.querySelector('.max-price');
            filters.min_price = parseFloat(minInput.value) || 0;
            filters.max_price = parseFloat(maxInput.value) || 100;

            const activeCategoryLink = document.querySelector('.category-link.active');
            filters.category_id = activeCategoryLink ? activeCategoryLink.dataset.id : "";

            fetchFilteredProducts(filters, 1);
        }

        function fetchFilteredProducts(filters, page = 1) {
            filters.page = page;

            const container = document.getElementById('products-container');
            const loader = document.getElementById('products-loader');
            const loadMoreBtn = document.getElementById('load-more-btn');

            if (loader) loader.style.display = 'block';
            if (page === 1 && container) container.style.display = 'none';
            if (page > 1 && loadMoreBtn) loadMoreBtn.style.display = 'none';

            $.ajax({
                url: '/filter-products',
                method: 'GET',
                data: filters,
                success: function(response) {
                    if (page === 1 && response.total === 0) {
                        if (container) {
                            container.innerHTML = '<p class="text-center" style="margin: 20px;">No products found matching your criteria.</p>';
                            container.style.display = 'block';
                        }
                        if (loadMoreBtn) loadMoreBtn.style.display = 'none';
                        const productsCount = document.getElementById('products-count');
                        if (productsCount) productsCount.textContent = 0;
                        return;
                    }

                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = response.html;
                    const scripts = Array.from(tempDiv.querySelectorAll('script'));
                    const contentNodes = Array.from(tempDiv.children).filter(child => child.tagName.toLowerCase() !== 'script');

                    const reinsertScript = (script) => {
                        const newScript = document.createElement('script');
                        for (let i = 0; i < script.attributes.length; i++) {
                            newScript.setAttribute(script.attributes[i].name, script.attributes[i].value);
                        }
                        newScript.innerHTML = script.innerHTML;
                        document.body.appendChild(newScript);
                    };

                    if (page === 1) container.innerHTML = '';
                    contentNodes.forEach(node => container.appendChild(node));
                    scripts.forEach(script => reinsertScript(script));

                    if (container) container.style.display = 'block';
                    if (loadMoreBtn) {
                        if (response.current_page < response.last_page) {
                            loadMoreBtn.style.display = 'block';
                            loadMoreBtn.onclick = () => fetchFilteredProducts(filters, response.current_page + 1);
                        } else {
                            loadMoreBtn.style.display = 'none';
                        }
                    }

                    const productsCount = document.getElementById('products-count');
                    if (productsCount) productsCount.textContent = response.total || 0;

                    // Close filter drawer after applying filters on mobile
                    if (window.innerWidth < 768) {
                        closeFilterDrawerHandler();
                    }
                },
                error: function(err) {
                    console.error('AJAX Error:', err);
                    if (container) {
                        container.innerHTML = '<p class="text-center text-danger">Error loading products.</p>';
                        container.style.display = 'block';
                    }
                },
                complete: function() {
                    if (loader) loader.style.display = 'none';
                }
            });
        }

        // Event Listeners
        document.querySelectorAll('.category-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.category-link').forEach(item => item.classList.remove('active'));
                this.classList.add('active');
                applyFilters();
            });
        });

        if (priceResetBtn) {
            priceResetBtn.addEventListener('click', function() {
                const minInput = document.querySelector('.min-price');
                const maxInput = document.querySelector('.max-price');
                if (minInput) minInput.value = 0;
                if (maxInput) maxInput.value = 100;
                applyFilters();
            });
        }

        if (filterBtn) {
            filterBtn.addEventListener('click', function() {
                applyFilters();
            });
        }

        ratingCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', applyFilters);
        });

        availabilityCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', applyFilters);
        });

        if (clearRatingBtn) {
            clearRatingBtn.addEventListener('click', function() {
                ratingCheckboxes.forEach(cb => cb.checked = false);
                applyFilters();
            });
        }

        if (clearAvailabilityBtn) {
            clearAvailabilityBtn.addEventListener('click', function() {
                availabilityCheckboxes.forEach(cb => {
                    cb.checked = (cb.dataset.availability === 'in-stock');
                });
                applyFilters();
            });
        }

        if (clearCategoriesBtn) {
            clearCategoriesBtn.addEventListener('click', function() {
                document.querySelectorAll('.category-link').forEach(item => item.classList.remove('active'));
                const allCategoriesLink = document.querySelector('.category-link[data-id=""]');
                if (allCategoriesLink) allCategoriesLink.classList.add('active');
                applyFilters();
            });
        }

        window.addEventListener('load', () => {
  document.querySelector('.products-grid').style.opacity = '1';
});


        // Initial load
        const savedCategory = localStorage.getItem('selectedCategory');
        if (savedCategory) {
            document.querySelectorAll('.category-link').forEach(item => item.classList.remove('active'));
            const autoLink = document.querySelector(`.category-link[data-id="${savedCategory}"]`);
            if (autoLink) {
                autoLink.classList.add('active');
            } else {
                const allCategoriesLink = document.querySelector('.category-link[data-id=""]');
                if (allCategoriesLink) allCategoriesLink.classList.add('active');
            }
            localStorage.removeItem('selectedCategory');
        }

        applyFilters();
    });


    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    }
</script>
@endpush