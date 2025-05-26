@extends('components.main')

@section('content')
<div class="beli-desa-page">
    <!-- Hero Section -->
    <div class="hero-section py-4 mb-4" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title"><span>Beli dari Desa</span></h2>
                    <p class="mb-3 fs-6">Temukan produk berkualitas langsung dari tangan pertama para petani dan pengrajin desa. Dukung ekonomi lokal dengan belanja produk asli.</p>
                    <div class="d-flex gap-2">
                        <button id="jelajahi-produk-btn" class="btn btn-primary px-3 rounded-pill shadow" style="font-size: 13px;">Jelajahi Produk</button>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Produk Desa" class="img-fluid rounded-3 shadow" style="transform: rotate(3deg);">
                </div>
            </div>
        </div>
    </div>
    
    <!-- ID untuk target scroll -->
    <div id="produk-section"></div>
    
    @php
    // Ganti paginate dengan get() untuk mengambil semua data
    $products = App\Models\Product::all(); 
    @endphp

    <!-- Filter Section -->
    <div class="container mb-4">
        <div class="row g-3">
            <div class="col-md-5">
                <select id="category-filter" class="form-select rounded-pill shadow-sm" style="font-size: 13px;">
                    <option value="all" selected>Semua Kategori</option>
                    <option value="Hasil Pertanian">Hasil Pertanian</option>
                    <option value="Kerajinan Tangan">Kerajinan Tangan</option>
                    <option value="Makanan Olahan">Makanan Olahan</option>
                    <option value="Minuman">Minuman</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
   
            <div class="col-md-5">
                <div class="input-group shadow-sm">
                    <input type="text" id="search-input" class="form-control rounded-pill" placeholder="Cari produk..." style="font-size: 13px;">
                    <button id="search-button" class="btn btn-primary rounded-pill px-3" type="button" style="font-size: 13px;">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-2 d-grid">
                <button id="reset-filter" class="btn btn-outline-secondary rounded-pill shadow-sm" style="font-size: 13px;">
                    <i class="bi bi-arrow-counterclockwise"></i> Reset
                </button>
            </div>
        </div>
    </div>
    
    @php
        $socialMedia = App\Models\SocialMedia::first(); // Ambil data dari database
    @endphp
    
    <!-- Products Section - Improved -->
    <div class="container mb-4">
        <div class="row g-3 g-md-4" id="product-container">
            @if($products->count() > 0)
                @foreach($products as $product)
                    <div class="col-6 col-md-4 col-lg-4 mb-3 mb-md-4 product-item" data-category="{{ $product->category }}" data-name="{{ strtolower($product->name) }}" data-description="{{ strtolower($product->description) }}" data-location="{{ strtolower($product->location) }}">
                        <div class="card product-card h-100 border-0 rounded-3 overflow-hidden shadow-sm">
                            @if($product->badge)
                                <div class="badge {{ $product->badge_class }} position-absolute m-2" style="font-size: 11px;">{{ $product->badge }}</div>
                            @endif
                            <div class="category-badge">{{ $product->category }}</div>
                            <div class="product-image-container">
                                @php
                                    $imagePath = 'storage/belanja/' . $product->image;
                                    $defaultImage = 'storage/belanja/default-product.jpg';
                                    $imageExists = $product->image && file_exists(public_path($imagePath));
                                @endphp
                                <img src="{{ $imageExists ? asset($imagePath) : asset($defaultImage) }}" 
                                     class="card-img-top" 
                                     alt="{{ $product->name }}" 
                                     loading="lazy">
                                <div class="image-overlay"></div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-1">
                                    <h5 class="card-title mb-0" style="font-size: 15px; font-weight: 600;">{{ $product->name }}</h5>
                                    <div class="d-flex align-items-center" style="font-size: 13px;">
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                        <span>{{ number_format($product->rating, 1) }}</span>
                                    </div>
                                </div>
                                <p class="text-muted mb-2" style="font-size: 12px;"><i class="bi bi-geo-alt-fill me-1"></i>{{ $product->location }}</p>
                                <p class="card-text product-description mb-2" style="font-size: 13px; color: #555;">{{ $product->description }}</p>
                                <div class="product-price-section mt-auto">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="text-primary mb-0" style="font-size: 15px; font-weight: 700;">Rp {{ number_format($product->price) }}</h5>
                                            @if($product->original_price)
                                                <del class="text-muted small" style="font-size: 12px;">Rp {{ number_format($product->original_price) }}</del>
                                            @endif
                                        </div>
                                        @if($socialMedia->active_wa && $socialMedia->link_wa)
                                            <a href="{{ $socialMedia->link_wa }}" target="_blank" class="btn btn-sm btn-primary rounded-pill px-3 btn-hubungi" style="font-size: 12px; white-space: nowrap;">
                                                <i class="bi bi-whatsapp me-1"></i> Beli
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5 no-products-message">
                    <i class="bi bi-search" style="font-size: 3rem; color: #ccc;"></i>
                    <h5 class="mt-3" style="color: #888;">Produk tidak ditemukan</h5>
                    <p class="text-muted">Coba gunakan kata kunci atau kategori yang berbeda</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Pagination -->
    @if($products->count() > 0)
        <div class="container mb-4">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center" id="pagination-container">
                            <!-- Pagination will be inserted here by JavaScript -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    @endif

    <!-- CTA Section -->
    <div class="cta-section py-5 mb-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 12px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center text-white">
                    <h3 class="h5 fw-bold mb-4 display-6" style="font-size: 2rem;">Dukung Produk Lokal Bangsa</h3>
                    <p class="lead mb-4 opacity-90" style="font-size: 1rem;">Dengan membeli produk dari desa, Anda turut membantu meningkatkan kesejahteraan masyarakat pedesaan dan melestarikan kearifan lokal.</p>
                    <button id="belanja-sekarang-btn" class="btn btn-light btn-lg px-4 py-2 fw-bold" style="color: #764ba2; border-radius: 50px; font-size:0.9rem;">
                        Belanja Sekarang <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom CSS */
    .beli-desa-page {
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
    }
    
    .hero-section {
        border-radius: 0 0 20px 20px;
    }
    
    .product-card {
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05);
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .product-image-container {
        position: relative;
        overflow: hidden;
        height: 180px;
        background-color: #f8f9fa;
    }
    
    .product-image-container img {
        object-fit: cover;
        width: 100%;
        height: 100%;
        transition: transform 0.5s ease;
    }
    
    .product-card:hover .product-image-container img {
        transform: scale(1.05);
    }
    
    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to top, rgba(0,0,0,0.2), rgba(0,0,0,0));
    }
    
    .card-body {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        padding: 1rem;
    }
    
    .card-title {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: 3em;
        line-height: 1.5;
        margin-bottom: 0.5rem;
    }
    
    .product-description {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 1rem;
        flex-grow: 1;
    }
    
    .product-price-section {
        margin-top: auto;
    }
    
    .badge {
        z-index: 1;
        font-weight: 500;
        padding: 0.35em 0.65em;
    }
    
    .category-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        font-size: 11px;
        padding: 3px 8px;
        border-radius: 10px;
    }
    
    .cta-section {
        border-radius: 20px;
    }
    
    /* Pagination styling */
    .pagination {
        justify-content: center;
        flex-wrap: wrap;
        gap: 5px;
    }
    
    .page-item {
        margin: 0 2px;
    }
    
    .page-item.active .page-link {
        background-color: #3a7bd5;
        border-color: #3a7bd5;
        color: white;
    }
    
    .page-link {
        color: #3a7bd5;
        font-size: 14px;
        padding: 6px 12px;
        border-radius: 4px !important;
        border: 1px solid #dee2e6;
    }
    
    .page-link:hover {
        background-color: #f0f3f8;
        color: #2a5da3;
    }
    
    .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #f8f9fa;
    }
    
    /* Responsive adjustments */
    @media (max-width: 575.98px) {
        /* Extra small devices (phones) */
        .product-col {
            padding: 0.25rem;
        }
        
        .product-card {
            border-radius: 8px;
        }
        
        .product-image-container {
            height: 140px;
        }
        
        .card-body {
            padding: 0.75rem;
        }
        
        .btn-hubungi {
            padding: 0.25rem 0.5rem;
            font-size: 11px;
        }
        
        .page-link {
            padding: 4px 8px;
            font-size: 13px;
        }
    }
    
    @media (min-width: 576px) and (max-width: 767.98px) {
        /* Small devices (landscape phones) */
        .product-image-container {
            height: 160px;
        }
    }
    
    @media (min-width: 768px) and (max-width: 991.98px) {
        /* Medium devices (tablets) */
        .product-image-container {
            height: 180px;
        }
    }
    
    @media (min-width: 992px) {
        /* Large devices (desktops) */
        .product-image-container {
            height: 200px;
        }
    }
</style>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Konfigurasi pagination
        const config = {
            itemsPerPageDesktop: 12,
            itemsPerPageTablet: 8,
            itemsPerPageMobile: 6,
            currentPage: 1,
            currentCategory: 'all',
            currentSearch: '',
            totalItems: document.querySelectorAll('.product-item').length,
            perPage: function() {
                // Dynamic perPage based on screen size
                if (window.innerWidth >= 992) {
                    return this.itemsPerPageDesktop;
                } else if (window.innerWidth >= 768) {
                    return this.itemsPerPageTablet;
                } else {
                    return this.itemsPerPageMobile;
                }
            },
            get lastPage() {
                return Math.ceil(this.totalItems / this.perPage());
            }
        };

        // DOM Elements
        const categoryFilter = document.getElementById('category-filter');
        const searchInput = document.getElementById('search-input');
        const searchButton = document.getElementById('search-button');
        const resetFilter = document.getElementById('reset-filter');
        const paginationContainer = document.getElementById('pagination-container');
        const productContainer = document.getElementById('product-container');
        const productItems = document.querySelectorAll('.product-item');
        const noProductsMessage = document.querySelector('.no-products-message');
        const jelajahiProdukBtn = document.getElementById('jelajahi-produk-btn');
        const belanjaSekarangBtn = document.getElementById('belanja-sekarang-btn');
        const produkSection = document.getElementById('produk-section');
        
        // Initialize pagination
        filterProducts();
        renderPagination();

        // Event Listeners
        categoryFilter.addEventListener('change', function() {
            config.currentCategory = this.value;
            config.currentPage = 1;
            filterProducts();
            renderPagination();
        });

        searchButton.addEventListener('click', function() {
            config.currentSearch = searchInput.value.toLowerCase();
            config.currentPage = 1;
            filterProducts();
            renderPagination();
        });

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                config.currentSearch = searchInput.value.toLowerCase();
                config.currentPage = 1;
                filterProducts();
                renderPagination();
            }
        });

        resetFilter.addEventListener('click', function() {
            config.currentCategory = 'all';
            config.currentSearch = '';
            config.currentPage = 1;
            categoryFilter.value = 'all';
            searchInput.value = '';
            filterProducts();
            renderPagination();
        });

        // Scroll to products when buttons are clicked
        if (jelajahiProdukBtn) {
            jelajahiProdukBtn.addEventListener('click', function() {
                scrollToProdukSection();
            });
        }

        if (belanjaSekarangBtn) {
            belanjaSekarangBtn.addEventListener('click', function() {
                scrollToProdukSection();
            });
        }

        // Function to scroll to produk section
        function scrollToProdukSection() {
            if (produkSection) {
                window.scrollTo({
                    top: produkSection.offsetTop - 100,
                    behavior: 'smooth'
                });
            } else if (productContainer) {
                // Fallback if produk-section element doesn't exist
                window.scrollTo({
                    top: productContainer.offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        }

        // Handle window resize
        window.addEventListener('resize', function() {
            // Only update if the perPage value changes
            const newPerPage = config.perPage();
            const oldLastPage = config.lastPage;
            
            // Recalculate current page to maintain position
            const firstItemIndex = (config.currentPage - 1) * config.perPage();
            config.currentPage = Math.ceil((firstItemIndex + 1) / newPerPage);
            
            filterProducts();
            
            // Only re-render pagination if the number of pages changed
            if (oldLastPage !== config.lastPage) {
                renderPagination();
            }
        });

        // Fungsi untuk render pagination
        function renderPagination() {
            if (!paginationContainer) return;
            
            paginationContainer.innerHTML = '';
            
            if (config.lastPage <= 1) return;
            
            // Previous button
            const prevLi = document.createElement('li');
            prevLi.className = `page-item ${config.currentPage === 1 ? 'disabled' : ''}`;
            prevLi.innerHTML = `<a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>`;
            prevLi.addEventListener('click', (e) => {
                e.preventDefault();
                if (config.currentPage > 1) {
                    config.currentPage--;
                    filterProducts();
                    renderPagination();
                    window.scrollTo({top: productContainer.offsetTop - 100, behavior: 'smooth'});
                }
            });
            paginationContainer.appendChild(prevLi);
            
            // Page numbers
            const maxVisiblePages = window.innerWidth < 768 ? 3 : 5;
            let startPage = Math.max(1, config.currentPage - Math.floor(maxVisiblePages / 2));
            let endPage = Math.min(config.lastPage, startPage + maxVisiblePages - 1);
            
            // Adjust if we're at the start or end
            if (endPage - startPage + 1 < maxVisiblePages) {
                startPage = Math.max(1, endPage - maxVisiblePages + 1);
            }
            
            // First page and ellipsis
            if (startPage > 1) {
                const firstLi = document.createElement('li');
                firstLi.className = 'page-item';
                firstLi.innerHTML = `<a class="page-link" href="#">1</a>`;
                firstLi.addEventListener('click', (e) => {
                    e.preventDefault();
                    config.currentPage = 1;
                    filterProducts();
                    renderPagination();
                    window.scrollTo({top: productContainer.offsetTop - 100, behavior: 'smooth'});
                });
                paginationContainer.appendChild(firstLi);
                
                if (startPage > 2) {
                    const ellipsisLi = document.createElement('li');
                    ellipsisLi.className = 'page-item disabled';
                    ellipsisLi.innerHTML = `<span class="page-link">...</span>`;
                    paginationContainer.appendChild(ellipsisLi);
                }
            }
            
            // Page numbers
            for (let i = startPage; i <= endPage; i++) {
                const pageLi = document.createElement('li');
                pageLi.className = `page-item ${i === config.currentPage ? 'active' : ''}`;
                pageLi.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                pageLi.addEventListener('click', (e) => {
                    e.preventDefault();
                    config.currentPage = i;
                    filterProducts();
                    renderPagination();
                    window.scrollTo({top: productContainer.offsetTop - 100, behavior: 'smooth'});
                });
                paginationContainer.appendChild(pageLi);
            }
            
            // Last page and ellipsis
            if (endPage < config.lastPage) {
                if (endPage < config.lastPage - 1) {
                    const ellipsisLi = document.createElement('li');
                    ellipsisLi.className = 'page-item disabled';
                    ellipsisLi.innerHTML = `<span class="page-link">...</span>`;
                    paginationContainer.appendChild(ellipsisLi);
                }
                
                const lastLi = document.createElement('li');
                lastLi.className = 'page-item';
                lastLi.innerHTML = `<a class="page-link" href="#">${config.lastPage}</a>`;
                lastLi.addEventListener('click', (e) => {
                    e.preventDefault();
                    config.currentPage = config.lastPage;
                    filterProducts();
                    renderPagination();
                    window.scrollTo({top: productContainer.offsetTop - 100, behavior: 'smooth'});
                });
                paginationContainer.appendChild(lastLi);
            }
            
            // Next button
            const nextLi = document.createElement('li');
            nextLi.className = `page-item ${config.currentPage === config.lastPage ? 'disabled' : ''}`;
            nextLi.innerHTML = `<a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>`;
            nextLi.addEventListener('click', (e) => {
                e.preventDefault();
                if (config.currentPage < config.lastPage) {
                    config.currentPage++;
                    filterProducts();
                    renderPagination();
                    window.scrollTo({top: productContainer.offsetTop - 100, behavior: 'smooth'});
                }
            });
            paginationContainer.appendChild(nextLi);
        }

        function filterProducts() {
            const itemsPerPage = config.perPage();
            const startIndex = (config.currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            
            let visibleItems = 0;
            let totalVisible = 0;
            
            // First pass - count total visible items
            productItems.forEach(item => {
                const category = item.getAttribute('data-category');
                const name = item.getAttribute('data-name');
                const description = item.getAttribute('data-description');
                const location = item.getAttribute('data-location');
                
                const categoryMatch = config.currentCategory === 'all' || category === config.currentCategory;
                const searchMatch = config.currentSearch === '' || 
                                    name.includes(config.currentSearch) || 
                                    description.includes(config.currentSearch) ||
                                    location.includes(config.currentSearch);
                
                if (categoryMatch && searchMatch) {
                    totalVisible++;
                }
            });
            
            config.totalItems = totalVisible;
            
            // Second pass - show/hide items based on pagination
            let currentVisible = 0;
            productItems.forEach(item => {
                const category = item.getAttribute('data-category');
                const name = item.getAttribute('data-name');
                const description = item.getAttribute('data-description');
                const location = item.getAttribute('data-location');
                
                const categoryMatch = config.currentCategory === 'all' || category === config.currentCategory;
                const searchMatch = config.currentSearch === '' || 
                                    name.includes(config.currentSearch) || 
                                    description.includes(config.currentSearch) ||
                                    location.includes(config.currentSearch);
                
                if (categoryMatch && searchMatch) {
                    if (currentVisible >= startIndex && currentVisible < endIndex) {
                        item.style.display = 'block';
                        visibleItems++;
                    } else {
                        item.style.display = 'none';
                    }
                    currentVisible++;
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Show/hide no products message
            if (noProductsMessage) {
                if (totalVisible === 0) {
                    noProductsMessage.style.display = 'block';
                } else {
                    noProductsMessage.style.display = 'none';
                }
            }
            
            // Hide pagination if no products or only one page
            if (paginationContainer) {
                if (totalVisible === 0 || config.lastPage <= 1) {
                    paginationContainer.closest('.container').style.display = 'none';
                } else {
                    paginationContainer.closest('.container').style.display = 'block';
                }
            }
        }
    });
</script>
@endsection