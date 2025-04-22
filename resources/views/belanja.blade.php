@extends('components.main')

@section('content')
<div class="beli-desa-page">
    <!-- Hero Section -->
    <div class="hero-section py-4 mb-4" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="fw-bold mb-3 text-gradient" style="font-size: 2rem; background: linear-gradient(45deg, #3a7bd5, #00d2ff); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Beli dari Desa</h1>
                    <p class="mb-3" style="font-size: 14px; color: #555;">Temukan produk berkualitas langsung dari tangan pertama para petani dan pengrajin desa. Dukung ekonomi lokal dengan belanja produk asli.</p>
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary px-3 rounded-pill shadow" style="font-size: 13px;">Jelajahi Produk</button>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Produk Desa" class="img-fluid rounded-3 shadow" style="transform: rotate(3deg);">
                </div>
            </div>
        </div>
    </div>

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

    <!-- Products Section - Improved -->
    <div class="container mb-4">
        <div class="row g-3 g-md-4" id="product-container">
            <!-- Product cards will be filled by JavaScript -->
        </div>
    </div>

    <!-- Pagination -->
    <div class="container mb-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center" id="pagination" style="font-size: 13px;">
                <!-- Pagination will be filled by JavaScript -->
            </ul>
        </nav>
    </div>

    <!-- CTA Section -->
    <div class="cta-section py-5 mb-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 12px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center text-white">
                    <h3 class="h5 fw-bold mb-4 display-6" style="font-size: 2rem;">Dukung Produk Lokal Bangsa</h3>
                    <p class="lead mb-4 opacity-90" style="font-size: 1rem;">Dengan membeli produk dari desa, Anda turut membantu meningkatkan kesejahteraan masyarakat pedesaan dan melestarikan kearifan lokal.</p>
                    <button class="btn btn-light btn-lg px-4 py-2 fw-bold" style="color: #764ba2; border-radius: 50px; font-size:0.9rem;">
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
        // Data produk dengan kategori
        const products = [
    {
        id: 1,
        name: "Madu Asli Hutan",
        location: "Dari Desa Wonosari, Jawa Tengah",
        description: "Madu murni hasil panen langsung dari hutan dengan kualitas terbaik tanpa campuran bahan pengawet atau pemanis buatan. Diproses secara alami oleh petani lokal.",
        price: 85000,
        originalPrice: 105000,
        rating: 4.8,
        badge: "Diskon 20%",
        badgeClass: "bg-danger",
        image: "https://images.unsplash.com/photo-1587049352851-8d4e89133924?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
        category: "Hasil Pertanian"
    },
    {
        id: 2,
        name: "Keripik Singkong Pedas",
        location: "Dari Desa Sukaraja, Jawa Barat",
        description: "Keripik singkong renyah dengan racikan bumbu pedas khas yang menggugah selera. Dibuat dari singkong pilihan dan diolah secara higienis.",
        price: 15000,
        rating: 4.5,
        image: "https://tse3.mm.bing.net/th?id=OIP.BTjHRRHkJXUz6iGWvJSjJAHaHb&w=200&h=200&c=7",
        category: "Makanan Olahan"
    },
    {
        id: 3,
        name: "Kain Tenun Ikat Flores",
        location: "Dari Desa Sikka, NTT",
        description: "Kain tenun ikat tradisional dengan motif khas Flores yang dibuat secara manual oleh pengrajin berpengalaman. Setiap helai membutuhkan waktu pembuatan 2-3 minggu.",
        price: 350000,
        rating: 4.9,
        badge: "Baru",
        badgeClass: "bg-success",
        image: "https://tse4.mm.bing.net/th?id=OIP.H8mBx9mqKtbBPIr2BjK2VwHaEw&w=200&h=128&c=7",
        category: "Kerajinan Tangan"
    },
    {
        id: 4,
        name: "Kopi Arabika Gayo",
        location: "Dari Desa Takengon, Aceh",
        description: "Kopi arabika khas Gayo dengan aroma yang khas dan rasa yang nikmat. Dipetik dan diproses secara manual oleh petani lokal.",
        price: 120000,
        rating: 4.7,
        image: "https://images.unsplash.com/photo-1511920170033-f8396924c348?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
        category: "Minuman"
    },
    {
        id: 5,
        name: "Gula Aren Organik",
        location: "Dari Desa Ciamis, Jawa Barat",
        description: "Gula aren murni tanpa bahan pengawet dan pemanis buatan, diproses secara tradisional. Cocok untuk minuman dan masakan.",
        price: 45000,
        rating: 4.6,
        image: "https://tse2.mm.bing.net/th?id=OIP.AwkZqXfrPiwBdW5hrVQKJAHaGL&w=395&h=395&c=7",
        category: "Hasil Pertanian"
    },
    {
        id: 6,
        name: "Keramik Kasongan",
        location: "Dari Desa Kasongan, Yogyakarta",
        description: "Keramik tangan dengan motif unik khas Kasongan, dibuat oleh pengrajin berpengalaman. Tahan panas dan cocok untuk dekorasi.",
        price: 175000,
        rating: 4.8,
        badge: "Best Seller",
        badgeClass: "bg-info",
        image: "https://tse3.mm.bing.net/th?id=OIP.AMMQrnk98BepVd2dRXm5AwHaE5&w=200&h=132&c=7",
        category: "Kerajinan Tangan"
    },
    {
        id: 7,
        name: "Minyak Kelapa Murni",
        location: "Dari Desa Kuta, Bali",
        description: "Minyak kelapa murni (VCO) hasil proses dingin tanpa bahan kimia, baik untuk kesehatan dan kecantikan. Diproses secara tradisional.",
        price: 95000,
        rating: 4.7,
        image: "https://tse2.mm.bing.net/th?id=OIP.sc3LWbeeVdz69G_sufrNrgHaJ4&w=474&h=474&c=7",
        category: "Hasil Pertanian"
    },
    {
        id: 8,
        name: "Kerajinan Bambu",
        location: "Dari Desa Penglipuran, Bali",
        description: "Berbagai kerajinan tangan dari bambu berkualitas dengan desain tradisional dan modern. Ramah lingkungan dan tahan lama.",
        price: 250000,
        rating: 4.4,
        image: "https://tse3.mm.bing.net/th?id=OIP.ad54n2tX608_qq95ZJz_sgHaHa&w=200&h=200&c=7",
        category: "Kerajinan Tangan"
    },
    {
        id: 9,
        name: "Beras Organik",
        location: "Dari Desa Cianjur, Jawa Barat",
        description: "Beras organik hasil panen petani lokal tanpa penggunaan pestisida kimia. Lebih sehat dan lebih enak daripada beras biasa.",
        price: 55000,
        rating: 4.6,
        image: "https://tse2.mm.bing.net/th?id=OIP.ppV1Ve2Pn1eGTkxBUeQfywHaHa&w=200&h=200&c=7",
        category: "Hasil Pertanian"
    },
    {
        id: 10,
        name: "Mangga Harum Manis",
        location: "Dari Desa Probolinggo, Jawa Timur",
        description: "Mangga harum manis segar langsung dari kebun. Manis alami tanpa bahan pengawet, dipetik saat matang pohon.",
        price: 35000,
        originalPrice: 45000,
        rating: 4.7,
        badge: "Diskon",
        badgeClass: "bg-danger",
        image: "https://images.unsplash.com/photo-1553279768-865429fa0078?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
        category: "Hasil Pertanian"
    },
    {
        id: 11,
        name: "Sambal Terasi Pedas",
        location: "Dari Desa Rembang, Jawa Tengah",
        description: "Sambal terasi pedas khas Jawa dengan bahan pilihan. Dibuat tanpa pengawet dan MSG, tahan hingga 3 bulan.",
        price: 25000,
        rating: 4.5,
        image: "https://tse1.mm.bing.net/th?id=OIP.yWazt61WWJ8i10PyBZjbWgHaEK&w=266&h=266&c=7",
        category: "Makanan Olahan"
    },
    {
        id: 12,
        name: "Tas Anyaman Rotan",
        location: "Dari Desa Tasikmalaya, Jawa Barat",
        description: "Tas anyaman rotan dengan desain modern dan tradisional. Kuat dan tahan lama, cocok untuk berbagai acara.",
        price: 185000,
        rating: 4.6,
        image: "https://tse1.mm.bing.net/th?id=OIP.e5210V-iJCzdEJVmgTRHXwHaHa&w=474&h=474&c=7",
        category: "Kerajinan Tangan"
    }
];

        // Konfigurasi pagination
        const config = {
            itemsPerPageDesktop: 9,
            itemsPerPageTablet: 6,
            itemsPerPageMobile: 6,
            currentPage: 1,
            currentCategory: 'all',
            currentSearch: ''
        };

        // DOM Elements
        const categoryFilter = document.getElementById('category-filter');
        const searchInput = document.getElementById('search-input');
        const searchButton = document.getElementById('search-button');
        const resetFilter = document.getElementById('reset-filter');

        // Event Listeners
        categoryFilter.addEventListener('change', function() {
            config.currentCategory = this.value;
            config.currentPage = 1;
            renderProducts();
            renderPagination();
        });

        searchButton.addEventListener('click', function() {
            config.currentSearch = searchInput.value.toLowerCase();
            config.currentPage = 1;
            renderProducts();
            renderPagination();
        });

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                config.currentSearch = searchInput.value.toLowerCase();
                config.currentPage = 1;
                renderProducts();
                renderPagination();
            }
        });

        resetFilter.addEventListener('click', function() {
            config.currentCategory = 'all';
            config.currentSearch = '';
            config.currentPage = 1;
            categoryFilter.value = 'all';
            searchInput.value = '';
            renderProducts();
            renderPagination();
        });

        // Fungsi untuk menentukan ukuran layar
        function getScreenSize() {
            if (window.innerWidth <= 575.98) return 'xs';
            if (window.innerWidth <= 767.98) return 'sm';
            if (window.innerWidth <= 991.98) return 'md';
            if (window.innerWidth <= 1199.98) return 'lg';
            return 'xl';
        }

        // Fungsi untuk mendapatkan items per page berdasarkan ukuran layar
        function getItemsPerPage() {
            const size = getScreenSize();
            if (size === 'xs' || size === 'sm') return config.itemsPerPageMobile;
            if (size === 'md') return config.itemsPerPageTablet;
            return config.itemsPerPageDesktop;
        }

        // Fungsi untuk filter produk berdasarkan kategori dan pencarian
        function filterProducts() {
            return products.filter(product => {
                // Filter kategori
                const categoryMatch = config.currentCategory === 'all' || 
                                     product.category === config.currentCategory;
                
                // Filter pencarian
                const searchMatch = config.currentSearch === '' || 
                                  product.name.toLowerCase().includes(config.currentSearch) || 
                                  product.description.toLowerCase().includes(config.currentSearch) ||
                                  product.location.toLowerCase().includes(config.currentSearch);
                
                return categoryMatch && searchMatch;
            });
        }

        // Fungsi untuk render produk
        function renderProducts() {
            const container = document.getElementById('product-container');
            container.innerHTML = '';
            
            const filteredProducts = filterProducts();
            const itemsPerPage = getItemsPerPage();
            const startIndex = (config.currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const paginatedProducts = filteredProducts.slice(startIndex, endIndex);

            // Determine columns based on screen size
            let colClass;
            const size = getScreenSize();
            if (size === 'xs') colClass = 'col-6';
            else if (size === 'sm') colClass = 'col-6 col-sm-3';
            else if (size === 'md') colClass = 'col-6 col-md-4 col-lg-4';
            else colClass = 'col-6 col-md-4 col-lg-4 col-xl-4';

            if (paginatedProducts.length === 0) {
                container.innerHTML = `
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-search" style="font-size: 3rem; color: #ccc;"></i>
                        <h5 class="mt-3" style="color: #888;">Produk tidak ditemukan</h5>
                        <p class="text-muted">Coba gunakan kata kunci atau kategori yang berbeda</p>
                    </div>
                `;
                return;
            }

            paginatedProducts.forEach(product => {
                const col = document.createElement('div');
                col.className = `${colClass} mb-3 mb-md-4`;
                
                const card = `
                    <div class="card product-card h-100 border-0 rounded-3 overflow-hidden shadow-sm">
                        ${product.badge ? `<div class="badge ${product.badgeClass} position-absolute m-2" style="font-size: 11px;">${product.badge}</div>` : ''}
                        <div class="category-badge">${product.category}</div>
                        <div class="product-image-container">
                            <img src="${product.image}" class="card-img-top" alt="${product.name}" loading="lazy">
                            <div class="image-overlay"></div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <h5 class="card-title mb-0" style="font-size: 15px; font-weight: 600;">${product.name}</h5>
                                <div class="d-flex align-items-center" style="font-size: 13px;">
                                    <i class="bi bi-star-fill text-warning me-1"></i>
                                    <span>${product.rating}</span>
                                </div>
                            </div>
                            <p class="text-muted mb-2" style="font-size: 12px;"><i class="bi bi-geo-alt-fill me-1"></i>${product.location}</p>
                            <p class="card-text product-description mb-2" style="font-size: 13px; color: #555;">${product.description}</p>
                            <div class="product-price-section mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="text-primary mb-0" style="font-size: 15px; font-weight: 700;">Rp ${product.price.toLocaleString()}</h5>
                                        ${product.originalPrice ? `<del class="text-muted small" style="font-size: 12px;">Rp ${product.originalPrice.toLocaleString()}</del>` : ''}
                                    </div>
                                    <button class="btn btn-sm btn-primary rounded-pill px-3 btn-hubungi" style="font-size: 12px; white-space: nowrap;">
                                        <i class="bi bi-whatsapp me-1"></i> Beli
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                col.innerHTML = card;
                container.appendChild(col);
            });
        }

        // Fungsi untuk render pagination
        function renderPagination() {
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';
            
            const filteredProducts = filterProducts();
            const itemsPerPage = getItemsPerPage();
            const totalPages = Math.ceil(filteredProducts.length / itemsPerPage);
            
            if (totalPages <= 1) return;
            
            // Previous button
            const prevLi = document.createElement('li');
            prevLi.className = `page-item ${config.currentPage === 1 ? 'disabled' : ''}`;
            prevLi.innerHTML = `
                <a class="page-link rounded-pill mx-1" href="#" aria-label="Previous">
                    <i class="bi bi-chevron-left"></i>
                </a>
            `;
            prevLi.addEventListener('click', (e) => {
                e.preventDefault();
                if (config.currentPage > 1) {
                    config.currentPage--;
                    renderProducts();
                    renderPagination();
                    window.scrollTo({top: 0, behavior: 'smooth'});
                }
            });
            pagination.appendChild(prevLi);
            
            // Page numbers
            const maxVisiblePages = 5;
            let startPage = Math.max(1, config.currentPage - Math.floor(maxVisiblePages / 2));
            let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);
            
            if (endPage - startPage + 1 < maxVisiblePages) {
                startPage = Math.max(1, endPage - maxVisiblePages + 1);
            }
            
            if (startPage > 1) {
                const firstLi = document.createElement('li');
                firstLi.className = 'page-item';
                firstLi.innerHTML = `<a class="page-link rounded-pill mx-1" href="#">1</a>`;
                firstLi.addEventListener('click', (e) => {
                    e.preventDefault();
                    config.currentPage = 1;
                    renderProducts();
                    renderPagination();
                    window.scrollTo({top: 0, behavior: 'smooth'});
                });
                pagination.appendChild(firstLi);
                
                if (startPage > 2) {
                    const ellipsisLi = document.createElement('li');
                    ellipsisLi.className = 'page-item disabled';
                    ellipsisLi.innerHTML = `<span class="page-link rounded-pill mx-1">...</span>`;
                    pagination.appendChild(ellipsisLi);
                }
            }
            
            for (let i = startPage; i <= endPage; i++) {
                const pageLi = document.createElement('li');
                pageLi.className = `page-item ${i === config.currentPage ? 'active' : ''}`;
                pageLi.innerHTML = `<a class="page-link rounded-pill mx-1" href="#">${i}</a>`;
                pageLi.addEventListener('click', (e) => {
                    e.preventDefault();
                    config.currentPage = i;
                    renderProducts();
                    renderPagination();
                    window.scrollTo({top: 0, behavior: 'smooth'});
                });
                pagination.appendChild(pageLi);
            }
            
            if (endPage < totalPages) {
                if (endPage < totalPages - 1) {
                    const ellipsisLi = document.createElement('li');
                    ellipsisLi.className = 'page-item disabled';
                    ellipsisLi.innerHTML = `<span class="page-link rounded-pill mx-1">...</span>`;
                    pagination.appendChild(ellipsisLi);
                }
                
                const lastLi = document.createElement('li');
                lastLi.className = 'page-item';
                lastLi.innerHTML = `<a class="page-link rounded-pill mx-1" href="#">${totalPages}</a>`;
                lastLi.addEventListener('click', (e) => {
                    e.preventDefault();
                    config.currentPage = totalPages;
                    renderProducts();
                    renderPagination();
                    window.scrollTo({top: 0, behavior: 'smooth'});
                });
                pagination.appendChild(lastLi);
            }
            
            // Next button
            const nextLi = document.createElement('li');
            nextLi.className = `page-item ${config.currentPage === totalPages ? 'disabled' : ''}`;
            nextLi.innerHTML = `
                <a class="page-link rounded-pill mx-1" href="#" aria-label="Next">
                    <i class="bi bi-chevron-right"></i>
                </a>
            `;
            nextLi.addEventListener('click', (e) => {
                e.preventDefault();
                if (config.currentPage < totalPages) {
                    config.currentPage++;
                    renderProducts();
                    renderPagination();
                    window.scrollTo({top: 0, behavior: 'smooth'});
                }
            });
            pagination.appendChild(nextLi);
        }

        // Inisialisasi
        renderProducts();
        renderPagination();

        // Handle resize event with debounce
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                renderProducts();
                renderPagination();
            }, 250);
        });
    });
</script>
@endsection