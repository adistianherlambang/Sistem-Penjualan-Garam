<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Garam - Industri Pengolahan &amp; Sistem Distribusi Garam</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Work+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body class="landing-page-body">

    <!-- 100% Full-Width Master Wrapper -->
    <div class="lp-wrapper">
        
        <!-- Header & Navbar (Exact NGC Layout in Blue, Zero Icons) -->
        <header class="ngc-nav-wrap">
            <div class="ngc-top-bar"></div>
            <div class="lp-container">
                <nav class="ngc-navbar">
                    <a href="{{ url('/') }}" class="ngc-brand">
                        <span>POS</span><span class="highlight">Garam</span>
                    </a>

                    <ul class="ngc-nav-links">
                        <li><a href="#home" class="ngc-nav-item active">Home</a></li>
                        <li><a href="#tentang" class="ngc-nav-item">Tentang Kami</a></li>
                        <li><a href="#keunggulan" class="ngc-nav-item">Keunggulan</a></li>
                        <li><a href="#produk" class="ngc-nav-item">Produk</a></li>
                        <li><a href="#kontak" class="ngc-nav-item">Kontak</a></li>
                    </ul>

                    <div>
                        @auth
                            <a href="{{ route('dashboard') }}" class="ngc-btn-cta">
                                <span>Buka Dashboard</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="ngc-btn-cta">
                                <span>Masuk Sistem</span>
                            </a>
                        @endauth
                    </div>
                </nav>
            </div>
        </header>

        <!-- Hero Section (Exact NGC Hero in Blue, Zero Icons) -->
        <section class="ngc-hero-section" id="home">
            <div class="lp-container ngc-hero-inner">
                <div class="ngc-hero-grid">
                    
                    <!-- Left Hero Content -->
                    <div class="ngc-hero-text">
                        <span class="ngc-hero-badge">Solusi Garam Industri &amp; Konsumsi Berkualitas</span>
                        <h1 class="ngc-hero-title">
                            POS <span class="blue-grad">Garam</span>
                        </h1>
                        <p class="ngc-hero-subtitle">
                            “Perusahaan Industri Garam Kredibel, Berpengalaman dan Terpercaya”
                        </p>

                        <div class="ngc-hero-actions">
                            <a href="#kontak" class="ngc-btn-primary">
                                <span>Hubungi Kami</span>
                            </a>
                            <a href="#produk" class="ngc-btn-outline">
                                <span>Produk Kami</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Hero Media (Real Authentic Photo) -->
                    <div class="ngc-hero-media">
                        <div class="ngc-hero-frame">
                            <img src="{{ asset('images/hero_real.png') }}" alt="Sentra Fasilitas dan Pengolahan Garam" class="ngc-hero-img">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Trust / Partner Badges Marquee Strip -->
            <div class="ngc-marquee-strip">
                <div class="lp-container">
                    <div class="ngc-marquee-label">Dipercaya Berbagai Sektor Industri &amp; Distribusi Nasional</div>
                    <div class="ngc-trust-grid">
                        <div class="ngc-trust-chip">Industri Makanan &amp; Minuman</div>
                        <div class="ngc-trust-chip">Industri Pakan &amp; Perikanan</div>
                        <div class="ngc-trust-chip">Industri Kimia, Tekstil &amp; Kulit</div>
                        <div class="ngc-trust-chip">Water Treatment &amp; Sanitasi</div>
                        <div class="ngc-trust-chip">Distribusi Retail &amp; Pasar Konsumsi</div>
                        <div class="ngc-trust-chip">Kemitraan Petani Garam Lokal</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 1: Tentang Perusahaan (Exact NGC About Layout, Zero Icons) -->
        <section class="ngc-about-section" id="tentang">
            <div class="lp-container">
                
                <!-- Section Header -->
                <div class="ngc-section-header">
                    <span class="ngc-pill-tag">Tentang Perusahaan</span>
                    <h2 class="ngc-section-title">Tentang Kami</h2>
                    <div class="ngc-divider-center"></div>
                    <p class="ngc-section-desc">
                        Mengenal lebih dalam sentra pengolahan dan sistem manajemen garam yang berkomitmen pada kualitas dan profesionalisme
                    </p>
                </div>

                <!-- Two Column Split Row -->
                <div class="ngc-split-row">
                    <div class="ngc-split-col">
                        <div class="ngc-about-card">
                            <img src="{{ asset('images/about_real.png') }}" alt="Gedung Fasilitas Pergudangan Garam" class="ngc-about-img">
                        </div>
                    </div>

                    <div class="ngc-split-col">
                        <span class="ngc-split-badge">Berkomitmen pada Kualitas</span>
                        <h3 class="ngc-split-title">Sentra Pengolahan &amp; Distribusi Garam</h3>
                        <div class="ngc-divider-left"></div>
                        <p class="ngc-split-text">
                            POS Garam mengintegrasikan pengolahan garam modern dengan pemilihan bahan baku berkualitas tinggi, proses pemurnian kristal higienis berstandar mutu nasional, serta tata kelola pencatatan stok dan kasir terpadu dari hulu ke hilir.
                        </p>
                        <a href="#kontak" class="ngc-btn-primary">
                            <span>Konsultasi Sekarang &rarr;</span>
                        </a>
                    </div>
                </div>

                <!-- 4 Metrics / Features Cards Grid -->
                <div class="ngc-metrics-grid" id="keunggulan">
                    <div class="ngc-metric-card">
                        <div class="ngc-metric-number">01</div>
                        <h4 class="ngc-metric-title">Jenis Industri</h4>
                        <p class="ngc-metric-desc">Spesialis dalam pengolahan garam industri dan konsumsi modern.</p>
                    </div>

                    <div class="ngc-metric-card">
                        <div class="ngc-metric-number">02</div>
                        <h4 class="ngc-metric-title">Produk Unggulan</h4>
                        <p class="ngc-metric-desc">Garam industri &amp; konsumsi beryodium berkualitas tinggi.</p>
                    </div>

                    <div class="ngc-metric-card">
                        <div class="ngc-metric-number">03</div>
                        <h4 class="ngc-metric-title">Standar Mutu</h4>
                        <p class="ngc-metric-desc">Kepatuhan standar mutu pangan nasional, SNI, dan kebersihan tinggi.</p>
                    </div>

                    <div class="ngc-metric-card">
                        <div class="ngc-metric-number">04</div>
                        <h4 class="ngc-metric-title">Kapasitas Pasokan</h4>
                        <p class="ngc-metric-desc">Kapasitas pasokan konsisten mencapai puluhan ribu ton per tahun.</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- Section 2: Produk & Ragam Pengolahan (Exact NGC Blog/Products Layout in Blue, Zero Icons) -->
        <section class="ngc-products-section" id="produk">
            <div class="lp-container">
                
                <div class="ngc-section-header">
                    <h2 class="ngc-section-title">Produk &amp; Layanan Terpadu</h2>
                    <p class="ngc-section-desc">
                        Pilihan garam berkualitas prima dan solusi manajemen distribusi untuk berbagai kebutuhan industri
                    </p>
                </div>

                <div class="ngc-products-grid">
                    
                    <!-- Left: Large Featured Product Card -->
                    <div class="ngc-feat-card">
                        <img src="{{ asset('images/product_ghb.png') }}" alt="Garam Halus Industri" class="ngc-feat-img">
                        <div class="ngc-feat-meta">
                            <span>Karung 50kg &amp; Jumbo Bag</span>
                            <span class="ngc-meta-dot"></span>
                            <span>Kadar NaCl &ge; 98%</span>
                        </div>
                        <h3 class="ngc-feat-title">Garam Halus Industri Beryodium (GHB) &amp; Non-Yodium (GHA)</h3>
                        <p class="ngc-feat-desc">
                            Garam murni dengan kadar NaCl tinggi dan kadar air terkontrol ketat untuk industri biskuit, mie instan, bumbu makanan, margarin, dan pakan ternak. Kemurnian kristal tinggi dengan jaminan kelancaran pasokan.
                        </p>
                    </div>

                    <!-- Right: Stack of 3 List Cards -->
                    <div class="ngc-stack-list">
                        
                        <a href="#kontak" class="ngc-stack-item">
                            <img src="{{ asset('images/product_pack.png') }}" alt="Garam Konsumsi" class="ngc-stack-thumb">
                            <div class="ngc-stack-info">
                                <h4 class="ngc-stack-title">Garam Dapur &amp; Meja Beryodium (250g - 300g)</h4>
                                <p class="ngc-stack-desc">Kemasan konsumsi keluarga dengan fortifikasi KIO3 standar mutu nasional, putih bersih, halus, dan higienis.</p>
                                <span class="ngc-stack-tag">Konsumsi Kemasan &bull; SNI</span>
                            </div>
                        </a>

                        <a href="#kontak" class="ngc-stack-item">
                            <img src="{{ asset('images/processing_real.png') }}" alt="Garam Krosok" class="ngc-stack-thumb">
                            <div class="ngc-stack-info">
                                <h4 class="ngc-stack-title">Garam Krosok Pilihan (GKP/GKL)</h4>
                                <p class="ngc-stack-desc">Kristal alami untuk industri penyamakan kulit, pengawetan hasil laut, water treatment, dan kimia.</p>
                                <span class="ngc-stack-tag">Bahan Baku Industri &bull; Alami</span>
                            </div>
                        </a>

                        <a href="{{ route('login') }}" class="ngc-stack-item">
                            <img src="{{ asset('images/hero_real.png') }}" alt="Sistem Kasir" class="ngc-stack-thumb">
                            <div class="ngc-stack-info">
                                <h4 class="ngc-stack-title">Sistem Kasir POS &amp; Monitoring Mutasi Stok</h4>
                                <p class="ngc-stack-desc">Pencatatan garam mentah masuk, hasil kemasan, hingga transaksi kasir toko dan faktur cetak nota otomatis.</p>
                                <span class="ngc-stack-tag">Platform Terpadu &bull; Real-Time</span>
                            </div>
                        </a>

                    </div>

                </div>

            </div>
        </section>

        <!-- Section 3: Call-To-Action Banner (Exact NGC CTA Layout in Blue, Zero Icons) -->
        <section class="ngc-cta-wrap" id="kontak">
            <div class="ngc-cta-box">
                <div class="ngc-cta-content">
                    <div>
                        <h3 class="ngc-cta-title">Butuh Garam Berkualitas untuk Industri Anda?</h3>
                        <p class="ngc-cta-desc">
                            Tim kami siap membantu Anda menemukan produk garam terbaik dan estimasi pasokan sesuai kebutuhan operasional Anda.
                        </p>
                    </div>
                    <div>
                        <a href="#form-konsultasi" class="ngc-btn-white">
                            <span>Konsultasi Sekarang &rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Interactive Consultation Form Card -->
        <div class="ngc-form-wrap" id="form-konsultasi">
            <div class="ngc-form-card">
                <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--lp-gray-900); margin-bottom: 0.5rem;">Formulir Permintaan Penawaran &amp; Konsultasi</h3>
                <p style="font-size: 0.925rem; color: var(--lp-gray-600); margin-bottom: 1.5rem;">Silakan isi formulir berikut untuk mendapatkan rekomendasi produk garam dan penawaran harga terbaik.</p>
                
                <form onsubmit="handleContactSubmit(event)">
                    <div class="ngc-form-grid">
                        <div>
                            <select class="ngc-select" required>
                                <option value="" disabled selected>Pilih Sektor Industri</option>
                                <option value="makanan">Industri Makanan &amp; Minuman</option>
                                <option value="kimia">Industri Kimia &amp; Tekstil</option>
                                <option value="pakan">Industri Pakan &amp; Perikanan</option>
                                <option value="retail">Distributor / Retail Konsumsi</option>
                            </select>
                        </div>
                        <div>
                            <select class="ngc-select" required>
                                <option value="" disabled selected>Kebutuhan Produk</option>
                                <option value="gha">Garam Halus Non-Yodium (GHA)</option>
                                <option value="ghb">Garam Halus Beryodium (GHB)</option>
                                <option value="krosok">Garam Krosok Bahan Baku</option>
                                <option value="konsumsi">Garam Konsumsi 250g/300g</option>
                                <option value="pos">Sistem Kasir &amp; Stok POS</option>
                            </select>
                        </div>
                        <div>
                            <select class="ngc-select" required>
                                <option value="" disabled selected>Estimasi Volume</option>
                                <option value="5ton">&lt; 5 Ton / Pengiriman</option>
                                <option value="25ton">5 - 25 Ton / Pengiriman</option>
                                <option value="kontrak">Kontrak Pasokan Rutin Tahunan</option>
                            </select>
                        </div>
                    </div>

                    <div style="margin-top: 1.25rem;">
                        <textarea class="ngc-input" rows="3" placeholder="Catatan spesifikasi khusus atau pertanyaan tambahan..."></textarea>
                    </div>

                    <div style="margin-top: 1.5rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
                        <button type="submit" class="ngc-btn-primary" style="padding: 0.85rem 2rem;">
                            <span>Kirim Permintaan Konsultasi</span>
                        </button>
                        <div id="contact-alert" style="display: none; font-size: 0.9rem; color: #059669; font-weight: 700;">
                            Terima kasih! Permintaan konsultasi Anda telah kami terima dan tim kami akan segera menghubungi.
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer (Exact NGC Footer Layout in Blue, Zero Icons) -->
        <footer class="ngc-footer">
            <div class="lp-container">
                <div class="ngc-footer-grid">
                    
                    <!-- Col 1: Brand & Info -->
                    <div class="ngc-footer-col1">
                        <div class="ngc-footer-brand">
                            <span>POS</span> Garam
                        </div>
                        <p class="ngc-footer-text">
                            Sistem Manajemen Penjualan, Pergudangan, dan Distribusi Garam Terpadu dengan standar mutu operasional terpercaya.
                        </p>
                        <div>
                            <span class="ngc-footer-cert">Standar Mutu Nasional &bull; SNI &bull; Kualitas Terjamin</span>
                        </div>
                    </div>

                    <!-- Col 2: Navigation Links -->
                    <div class="ngc-footer-subcols">
                        <div>
                            <h4 class="ngc-footer-heading">Perusahaan</h4>
                            <ul class="ngc-footer-links">
                                <li><a href="#tentang" class="ngc-footer-link">Tentang Kami</a></li>
                                <li><a href="#keunggulan" class="ngc-footer-link">Keunggulan Mutu</a></li>
                                <li><a href="#produk" class="ngc-footer-link">Katalog Produk</a></li>
                                <li><a href="#kontak" class="ngc-footer-link">Kontak Pasokan</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="ngc-footer-heading">Produk</h4>
                            <ul class="ngc-footer-links">
                                <li><a href="#produk" class="ngc-footer-link">Garam Industri GHB/GHA</a></li>
                                <li><a href="#produk" class="ngc-footer-link">Garam Krosok Bahan Baku</a></li>
                                <li><a href="#produk" class="ngc-footer-link">Garam Meja Kemasan</a></li>
                                <li><a href="{{ route('login') }}" class="ngc-footer-link">Sistem Kasir POS</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Col 3: Hours -->
                    <div>
                        <h4 class="ngc-footer-heading">Jam Operasional</h4>
                        <ul class="ngc-hours-list">
                            <li class="ngc-hours-row">
                                <span>Senin - Jumat</span>
                                <span>08:00 - 17:00</span>
                            </li>
                            <li class="ngc-hours-row">
                                <span>Sabtu</span>
                                <span>08:00 - 14:00</span>
                            </li>
                            <li class="ngc-hours-row">
                                <span>Minggu</span>
                                <span>Tutup</span>
                            </li>
                        </ul>
                    </div>

                </div>

                <!-- Footer Bottom Bar -->
                <div class="ngc-footer-bottom">
                    <div>
                        &copy; {{ date('Y') }} POS Garam. Hak cipta dilindungi.
                    </div>
                    <div>
                        @auth
                            <a href="{{ route('dashboard') }}" style="color: var(--lp-blue-600); text-decoration: none; font-weight: 600;">
                                Buka Dashboard &rarr;
                            </a>
                        @else
                            <a href="{{ route('login') }}" style="color: var(--lp-blue-600); text-decoration: none; font-weight: 600;">
                                Masuk Sistem POS &rarr;
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <!-- Micro-interactions Script -->
    <script>
        function handleContactSubmit(e) {
            e.preventDefault();
            const alertBox = document.getElementById('contact-alert');
            alertBox.style.display = 'block';
            setTimeout(() => {
                alertBox.style.display = 'none';
            }, 5000);
        }
    </script>
</body>
</html>
