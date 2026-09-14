<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Niaga Garam Cemerlang - Industri Garam Kredibel &amp; Terpercaya</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body class="landing-page-body">

    <!-- 100% Full-Width Master Wrapper -->
    <div class="lp-wrapper">
        
        <!-- Header & Navbar (Full Width, Zero Icons) -->
        <header class="lp-header-wrap">
            <div class="lp-container">
                <nav class="lp-navbar">
                    <a href="{{ url('/') }}" class="lp-brand">
                        <span>Niaga Garam Cemerlang</span><span class="lp-brand-dot">.</span>
                    </a>

                    <ul class="lp-nav-links">
                        <li><a href="#tentang" class="lp-nav-link">Tentang Kami</a></li>
                        <li><a href="#keunggulan" class="lp-nav-link">Keunggulan</a></li>
                        <li><a href="#produk" class="lp-nav-link">Produk</a></li>
                        <li><a href="#kontak" class="lp-nav-link">Kontak</a></li>
                    </ul>

                    <div>
                        @auth
                            <a href="{{ route('dashboard') }}" class="lp-btn-pill-primary">
                                <span>Buka Dashboard</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="lp-btn-pill-primary">
                                <span>Masuk Sistem</span>
                            </a>
                        @endauth
                    </div>
                </nav>
            </div>
        </header>

        <!-- Hero Section (Full Width, Real Authentic Photo, Zero Icons) -->
        <section class="lp-hero-section">
            <div class="lp-container">
                <div class="lp-hero">
                    <div class="lp-hero-content">
                        <div style="display: inline-block; padding: 6px 14px; background-color: var(--lp-primary-subtle); color: var(--lp-primary); border-radius: 9999px; font-size: 12.5px; font-weight: 700; margin-bottom: 16px; border: 1px solid rgba(79, 117, 255, 0.15);">
                            Perusahaan Industri Garam Kredibel, Berpengalaman dan Terpercaya
                        </div>
                        <h1 class="lp-hero-title">Solusi Garam Industri &amp; Konsumsi Berkualitas</h1>
                        <p class="lp-hero-desc">
                            PT Niaga Garam Cemerlang adalah perusahaan pengolahan garam modern dengan bahan baku pilihan, proses terstandarisasi FSSC 22000, BPOM RI, ISO SNI, dan Halal, serta sistem operasional terintegrasi.
                        </p>
                        <div class="lp-hero-actions">
                            <a href="#kontak" class="lp-btn-pill-primary lp-btn-pill-hero">
                                <span>Konsultasi Sekarang</span>
                            </a>
                            @auth
                                <a href="{{ route('dashboard') }}" class="lp-link-arrow">
                                    <span>Buka Dashboard</span>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="lp-link-arrow">
                                    <span>Masuk Sistem</span>
                                </a>
                            @endauth
                        </div>
                    </div>

                    <div class="lp-hero-visual">
                        <img src="{{ asset('images/hero_real.png') }}" alt="Pabrik dan Fasilitas PT Niaga Garam Cemerlang" class="lp-hero-img">
                        <div class="lp-hero-gradient-overlay"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3 Feature Columns Section (Numbered 01, 02, 03 - Zero Icons) -->
        <section class="lp-features-section" id="keunggulan">
            <div class="lp-container">
                <div class="lp-features-trio">
                    <div class="lp-trio-item">
                        <div class="lp-trio-header">
                            <span class="lp-trio-num">01</span>
                            <h3 class="lp-trio-title">Standar Mutu Resmi</h3>
                        </div>
                        <p class="lp-trio-text">
                            Tersertifikasi FSSC 22000 v6, BPOM RI, ISO SNI 2018, dan Halal untuk menjamin kemurnian serta kepatuhan regulasi keamanan pangan nasional.
                        </p>
                    </div>

                    <div class="lp-trio-item">
                        <div class="lp-trio-header">
                            <span class="lp-trio-num">02</span>
                            <h3 class="lp-trio-title">Kapasitas 150.000 Ton</h3>
                        </div>
                        <p class="lp-trio-text">
                            Kapasitas pasokan mencapai 150.000 ton per tahun dengan kontinuitas pasokan terjamin dan dukungan armada logistik muatan besar hingga 38,4 ton.
                        </p>
                    </div>

                    <div class="lp-trio-item">
                        <div class="lp-trio-header">
                            <span class="lp-trio-num">03</span>
                            <h3 class="lp-trio-title">Pengolahan Modern</h3>
                        </div>
                        <p class="lp-trio-text">
                            Pabrik modern dengan proses pencucian, pengeringan, iodisasi, dan pengemasan presisi mulai dari kemasan 250g-300g hingga jumbo bag 1.200kg.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bento Grid Section (Full Width, Real Photos, Zero Icons) -->
        <section class="lp-bento-section" id="tentang">
            <div class="lp-container">
                <div class="lp-bento-grid">
                    <!-- Cell 1: Dark Navy Card -->
                    <div class="lp-bento-card lp-bento-dark">
                        <div>
                            <span class="lp-bento-dark-badge">Berkomitmen pada Kualitas</span>
                            <h4 class="lp-bento-dark-title">PT Niaga Garam Cemerlang</h4>
                            <p class="lp-bento-dark-desc">
                                Berlokasi di Jl. Raya Cirebon – Tegal Km 11 Astanamukti, Pangenan, Cirebon. Menghadirkan garam berkualitas dengan bahan baku dan proses terstandarisasi.
                            </p>
                        </div>
                        <a href="#kontak" class="lp-bento-dark-btn">Hubungi Kami</a>
                    </div>

                    <!-- Cell 2: Stacked Real Imagery -->
                    <div class="lp-bento-stacked">
                        <div class="lp-bento-stack-item">
                            <img src="{{ asset('images/about_real.png') }}" alt="Gedung Pabrik PT Niaga Garam Cemerlang" class="lp-bento-stack-img">
                            <div class="lp-stack-caption">Gedung Pabrik Cirebon</div>
                        </div>
                        <div class="lp-bento-stack-item">
                            <img src="{{ asset('images/processing_real.png') }}" alt="Fasilitas Pengolahan Garam" class="lp-bento-stack-img">
                            <div class="lp-stack-caption">Fasilitas Pengolahan Modern</div>
                        </div>
                    </div>

                    <!-- Cell 3: Real Industrial Salt Packaging -->
                    <div class="lp-bento-card lp-bento-portrait">
                        <img src="{{ asset('images/product_ghb.png') }}" alt="Produk Garam Halus Industri GHB" class="lp-bento-portrait-img">
                        <div class="lp-stack-caption">Garam Industri Beryodium (GHB)</div>
                    </div>

                    <!-- Cell 4: Productivity metric -->
                    <div class="lp-bento-card lp-bento-stat">
                        <div class="lp-stat-label">Kapasitas Pasokan Garam Tahunan</div>
                        <div class="lp-stat-number">150.000</div>
                        <div class="lp-stat-subtext">Ton / Tahun Industri &amp; Konsumsi</div>
                    </div>

                    <!-- Cell 5: Real Consumer Salt Packaging -->
                    <div class="lp-bento-card lp-bento-pos">
                        <img src="{{ asset('images/product_pack.png') }}" alt="Garam Konsumsi Kemasan" class="lp-bento-pos-img">
                        <div class="lp-stack-caption">Garam Konsumsi Kemasan Higienis</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Lower Section: Products & Consultation Form (Zero Icons) -->
        <section class="lp-bottom-section" id="produk">
            <div class="lp-container">
                <div class="lp-bottom-grid">
                    <!-- Left: Products Catalog Accordion -->
                    <div class="lp-workflow-col">
                        <h3 class="lp-section-title">Katalog Produk Unggulan</h3>
                        <div class="lp-accordion-list">
                            
                            <div class="lp-accordion-item active" onclick="toggleAccordion(this)">
                                <div class="lp-accordion-header">
                                    <div class="lp-accordion-lead">
                                        <span class="lp-pill-badge">Industri Pangan</span>
                                        <span class="lp-accordion-title">Garam Halus Industri (GHA &amp; GHB)</span>
                                    </div>
                                    <span class="lp-accordion-status">Detail</span>
                                </div>
                                <div class="lp-accordion-content">
                                    Garam murni dengan kadar NaCl tinggi untuk industri biskuit, mie instan, bumbu makanan, dan margarin. Tersedia pilihan non-yodium (GHA) dan beryodium (GHB) dalam kemasan karung 25kg, 50kg, dan jumbo bag 1.200kg.
                                </div>
                            </div>

                            <div class="lp-accordion-item" onclick="toggleAccordion(this)">
                                <div class="lp-accordion-header">
                                    <div class="lp-accordion-lead">
                                        <span class="lp-pill-badge">Bahan Baku</span>
                                        <span class="lp-accordion-title">Garam Krosok Premium &amp; Lokal (GKP/GKL)</span>
                                    </div>
                                    <span class="lp-accordion-status">Detail</span>
                                </div>
                                <div class="lp-accordion-content">
                                    Kristal garam alami kualitas pilihan untuk kebutuhan industri penyamakan kulit, pengawetan hasil laut, pakan ternak, water treatment, dan bahan baku industri kimia.
                                </div>
                            </div>

                            <div class="lp-accordion-item" onclick="toggleAccordion(this)">
                                <div class="lp-accordion-header">
                                    <div class="lp-accordion-lead">
                                        <span class="lp-pill-badge">Konsumsi</span>
                                        <span class="lp-accordion-title">Garam Dapur &amp; Meja Beryodium</span>
                                    </div>
                                    <span class="lp-accordion-status">Detail</span>
                                </div>
                                <div class="lp-accordion-content">
                                    Garam kemasan konsumsi keluarga standar 250g dan 300g dengan fortifikasi Iodium (KIO3) terstandarisasi SNI, putih bersih, halus, dan higienis untuk kebutuhan dapur dan meja makan.
                                </div>
                            </div>

                            <div class="lp-accordion-item" onclick="toggleAccordion(this)">
                                <div class="lp-accordion-header">
                                    <div class="lp-accordion-lead">
                                        <span class="lp-pill-badge">Distribusi &amp; POS</span>
                                        <span class="lp-accordion-title">Sistem Penjualan &amp; Kasir Terpadu</span>
                                    </div>
                                    <span class="lp-accordion-status">Detail</span>
                                </div>
                                <div class="lp-accordion-content">
                                    Platform Point of Sale dan monitoring gudang real-time untuk pencatatan penerimaan garam mentah, hasil produksi kemasan, transaksi faktur kasir, hingga mutasi stok tanpa selisih.
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Right: Consultation Form (Zero Icons) -->
                    <div class="lp-contact-col" id="kontak">
                        <h3 class="lp-section-title">Konsultasi Kebutuhan Garam</h3>
                        <p style="font-size: 13.5px; color: var(--lp-text-muted); margin-bottom: 20px; line-height: 1.5;">
                            Butuh garam berkualitas untuk industri Anda? Tim kami siap membantu memberikan spesifikasi produk dan penawaran terbaik.
                        </p>
                        <form class="lp-contact-form" onsubmit="handleContactSubmit(event)">
                            <div class="lp-select-pill-wrap">
                                <select class="lp-select-pill" required>
                                    <option value="" disabled selected>Pilih Sektor Industri</option>
                                    <option value="makanan">Industri Makanan &amp; Minuman</option>
                                    <option value="kimia">Industri Kimia, Farmasi &amp; Tekstil</option>
                                    <option value="pakan">Industri Pakan &amp; Perikanan</option>
                                    <option value="distributor">Distributor / Retail Konsumsi</option>
                                </select>
                            </div>

                            <div class="lp-select-pill-wrap">
                                <select class="lp-select-pill" required>
                                    <option value="" disabled selected>Kebutuhan Produk</option>
                                    <option value="gha">Garam Halus Industri Non-Yodium (GHA)</option>
                                    <option value="ghb">Garam Halus Industri Beryodium (GHB)</option>
                                    <option value="gkp">Garam Krosok Premium (GKP)</option>
                                    <option value="konsumsi">Garam Konsumsi Kemasan 250g/300g</option>
                                    <option value="pos">Sistem Manajemen &amp; Kasir POS</option>
                                </select>
                            </div>

                            <div class="lp-select-pill-wrap">
                                <select class="lp-select-pill" required>
                                    <option value="" disabled selected>Estimasi Volume Kebutuhan</option>
                                    <option value="5ton">&lt; 5 Ton / Pengiriman</option>
                                    <option value="25ton">5 - 25 Ton / Pengiriman</option>
                                    <option value="kontrak">Kontrak Pasokan Rutin Tahunan</option>
                                </select>
                            </div>

                            <button type="submit" class="lp-btn-pill-dark">
                                <span>Kirim Permintaan Konsultasi</span>
                            </button>
                            <div id="contact-alert" style="display: none; font-size: 13.5px; color: #059669; text-align: center; margin-top: 10px; font-weight: 600;">
                                Terima kasih! Tim PT Niaga Garam Cemerlang akan segera menghubungi Anda.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer (Full Width, Zero Icons) -->
        <footer class="lp-footer-section">
            <div class="lp-container">
                <div class="lp-footer">
                    <div class="lp-footer-left">
                        <span>&copy; {{ date('Y') }} PT Niaga Garam Cemerlang - POS Garam. Hak cipta dilindungi.</span>
                        <span class="lp-status-badge">
                            <span>Sertifikasi FSSC 22000 &bull; BPOM RI &bull; SNI &bull; Halal</span>
                        </span>
                    </div>
                    <div>
                        <a href="{{ route('login') }}" style="color: var(--lp-text-muted); text-decoration: none; font-size: 13.5px; font-weight: 600;">Login Sistem POS</a>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <!-- Micro-interactions Script -->
    <script>
        function toggleAccordion(item) {
            const allItems = document.querySelectorAll('.lp-accordion-item');
            const isActive = item.classList.contains('active');
            
            allItems.forEach(el => el.classList.remove('active'));
            
            if (!isActive) {
                item.classList.add('active');
            }
        }

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
