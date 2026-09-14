<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Garam - Sistem Penjualan dan Pengolahan Garam</title>
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
                        <span>Garam</span><span class="lp-brand-dot">.</span>
                    </a>

                    <ul class="lp-nav-links">
                        <li><a href="#fitur" class="lp-nav-link">Fitur</a></li>
                        <li><a href="#alur" class="lp-nav-link">Alur Kerja</a></li>
                        <li><a href="#bento" class="lp-nav-link">Produksi</a></li>
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

        <!-- Hero Section (Full Width, Zero Icons) -->
        <section class="lp-hero-section">
            <div class="lp-container">
                <div class="lp-hero">
                    <div class="lp-hero-content">
                        <h1 class="lp-hero-title">Elevate Your Workflow</h1>
                        <p class="lp-hero-desc">
                            Tingkatkan efisiensi alur bisnis garam dari penerimaan bahan mentah, otomasi konversi kemasan 300 gram, kasir penjualan cepat, hingga monitoring analitik secara real-time.
                        </p>
                        <div class="lp-hero-actions">
                            @auth
                                <a href="{{ route('dashboard') }}" class="lp-btn-pill-primary lp-btn-pill-hero">
                                    <span>Buka Dashboard</span>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="lp-btn-pill-primary lp-btn-pill-hero">
                                    <span>Mulai Sekarang</span>
                                </a>
                            @endauth
                            <a href="#alur" class="lp-link-arrow">
                                <span>Pelajari Alur</span>
                            </a>
                        </div>
                    </div>

                    <div class="lp-hero-visual">
                        <img src="{{ asset('images/hero_manager.jpg') }}" alt="Operations Manager" class="lp-hero-img">
                        <div class="lp-hero-gradient-overlay"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3 Feature Columns Section (Numbered 01, 02, 03 - Zero Icons) -->
        <section class="lp-features-section" id="fitur">
            <div class="lp-container">
                <div class="lp-features-trio">
                    <div class="lp-trio-item">
                        <div class="lp-trio-header">
                            <span class="lp-trio-num">01</span>
                            <h3 class="lp-trio-title">Manajemen Stok</h3>
                        </div>
                        <p class="lp-trio-text">
                            Pencatatan akurat bahan mentah dalam gram, kilogram, atau ton dengan konversi otomatis dan kartu stok terperinci.
                        </p>
                    </div>

                    <div class="lp-trio-item">
                        <div class="lp-trio-header">
                            <span class="lp-trio-num">02</span>
                            <h3 class="lp-trio-title">Kolaborasi Alur</h3>
                        </div>
                        <p class="lp-trio-text">
                            Sinkronisasi data langsung antara bagian penerimaan gudang, divisi pengolahan, hingga operator kasir tanpa selisih.
                        </p>
                    </div>

                    <div class="lp-trio-item">
                        <div class="lp-trio-header">
                            <span class="lp-trio-num">03</span>
                            <h3 class="lp-trio-title">Otomasi Produksi</h3>
                        </div>
                        <p class="lp-trio-text">
                            Kalkulasi presisi standar kemasan 300g per bungkus dengan proteksi pencegahan stok minus secara otomatis.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bento Grid Section (Full Width, Zero Icons) -->
        <section class="lp-bento-section" id="bento">
            <div class="lp-container">
                <div class="lp-bento-grid">
                    <!-- Cell 1: Dark Navy Card -->
                    <div class="lp-bento-card lp-bento-dark">
                        <div>
                            <span class="lp-bento-dark-badge">Sistem Terpadu</span>
                            <h4 class="lp-bento-dark-title">Produksi &amp; POS Siap 300g</h4>
                            <p class="lp-bento-dark-desc">
                                Kontrol seluruh alur produksi dan distribusi garam dalam satu platform terintegrasi.
                            </p>
                        </div>
                        <a href="{{ route('login') }}" class="lp-bento-dark-btn">Kelola Sistem</a>
                    </div>

                    <!-- Cell 2: Stacked Imagery -->
                    <div class="lp-bento-stacked">
                        <div class="lp-bento-stack-item">
                            <img src="{{ asset('images/bento_salt.jpg') }}" alt="Quality Inspection" class="lp-bento-stack-img">
                            <div class="lp-stack-caption">Pemeriksaan Kualitas</div>
                        </div>
                        <div class="lp-bento-stack-item">
                            <img src="{{ asset('images/bento_laptop.jpg') }}" alt="Administrasi Operasional" class="lp-bento-stack-img" style="object-position: top center;">
                            <div class="lp-stack-caption">Operasional Gudang</div>
                        </div>
                    </div>

                    <!-- Cell 3: Portrait card -->
                    <div class="lp-bento-card lp-bento-portrait">
                        <img src="{{ asset('images/bento_laptop.jpg') }}" alt="Manajer Produksi" class="lp-bento-portrait-img">
                    </div>

                    <!-- Cell 4: Productivity metric -->
                    <div class="lp-bento-card lp-bento-stat">
                        <div class="lp-stat-label">Peningkatan Efisiensi Kerja</div>
                        <div class="lp-stat-number">30%</div>
                        <div class="lp-stat-subtext">Akurat, Cepat &amp; Otomatis</div>
                    </div>

                    <!-- Cell 5: Tablet POS screen -->
                    <div class="lp-bento-card lp-bento-pos">
                        <img src="{{ asset('images/bento_pos.jpg') }}" alt="Aplikasi POS Garam" class="lp-bento-pos-img">
                    </div>
                </div>
            </div>
        </section>

        <!-- Lower Section: Workflow Accordion & Contact (Zero Icons) -->
        <section class="lp-bottom-section" id="alur">
            <div class="lp-container">
                <div class="lp-bottom-grid">
                    <!-- Left: Workflow List -->
                    <div class="lp-workflow-col">
                        <h3 class="lp-section-title">Alur Sistem</h3>
                        <div class="lp-accordion-list">
                            
                            <div class="lp-accordion-item active" onclick="toggleAccordion(this)">
                                <div class="lp-accordion-header">
                                    <div class="lp-accordion-lead">
                                        <span class="lp-pill-badge">Bahan Mentah</span>
                                        <img src="{{ asset('images/hero_manager.jpg') }}" class="lp-avatar-thumb" alt="Gudang">
                                        <span class="lp-accordion-title">Pencatatan garam mentah (g, kg, ton)</span>
                                    </div>
                                    <span class="lp-accordion-status">Detail</span>
                                </div>
                                <div class="lp-accordion-content">
                                    Pencatatan pengiriman dari petani dan supplier garam dengan otomatisasi konversi satuan berat presisi serta kartu mutasi stok real-time.
                                </div>
                            </div>

                            <div class="lp-accordion-item" onclick="toggleAccordion(this)">
                                <div class="lp-accordion-header">
                                    <div class="lp-accordion-lead">
                                        <span class="lp-pill-badge">Produksi</span>
                                        <img src="{{ asset('images/bento_laptop.jpg') }}" class="lp-avatar-thumb" alt="Pabrik">
                                        <span class="lp-accordion-title">Konversi pengemasan standar 300g</span>
                                    </div>
                                    <span class="lp-accordion-status">Detail</span>
                                </div>
                                <div class="lp-accordion-content">
                                    Proses pencucian, iodisasi, dan pengemasan otomatis dengan rasio standar 1 bungkus = 300 gram dan validasi stok bahan baku.
                                </div>
                            </div>

                            <div class="lp-accordion-item" onclick="toggleAccordion(this)">
                                <div class="lp-accordion-header">
                                    <div class="lp-accordion-lead">
                                        <span class="lp-pill-badge">Barang Jadi</span>
                                        <img src="{{ asset('images/bento_salt.jpg') }}" class="lp-avatar-thumb" alt="Produk">
                                        <span class="lp-accordion-title">Katalog SKU garam siap jual</span>
                                    </div>
                                    <span class="lp-accordion-status">Detail</span>
                                </div>
                                <div class="lp-accordion-content">
                                    Pengelolaan varian garam dapur beryodium, garam halus, serta garam kemasan siap edar lengkap dengan harga jual dan ambang batas minimum stok.
                                </div>
                            </div>

                            <div class="lp-accordion-item" onclick="toggleAccordion(this)">
                                <div class="lp-accordion-header">
                                    <div class="lp-accordion-lead">
                                        <span class="lp-pill-badge">Kasir POS</span>
                                        <img src="{{ asset('images/bento_pos.jpg') }}" class="lp-avatar-thumb" alt="Kasir">
                                        <span class="lp-accordion-title">Transaksi cepat, kembalian &amp; faktur cetak</span>
                                    </div>
                                    <span class="lp-accordion-status">Detail</span>
                                </div>
                                <div class="lp-accordion-content">
                                    Layanan kasir responsif untuk transaksi grosir dan eceran dengan kalkulasi kembalian otomatis dan pencetakan faktur/nota format kasir.
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Right: Let's Talk Form (Zero Icons) -->
                    <div class="lp-contact-col" id="kontak">
                        <h3 class="lp-section-title">Konsultasi Cepat</h3>
                        <form class="lp-contact-form" onsubmit="handleContactSubmit(event)">
                            <div class="lp-select-pill-wrap">
                                <select class="lp-select-pill" required>
                                    <option value="" disabled selected>Pilih Skala Bisnis</option>
                                    <option value="pabrik">Pabrik &amp; Pengolahan Garam</option>
                                    <option value="distributor">Distributor &amp; Gudang Besar</option>
                                    <option value="grosir">Toko Grosir / Eceran</option>
                                </select>
                            </div>

                            <div class="lp-select-pill-wrap">
                                <select class="lp-select-pill" required>
                                    <option value="" disabled selected>Kebutuhan Utama</option>
                                    <option value="pos">Sistem Kasir &amp; Penjualan POS</option>
                                    <option value="produksi">Manajemen Konversi &amp; Pengemasan 300g</option>
                                    <option value="full">Paket Lengkap Terintegrasi</option>
                                </select>
                            </div>

                            <div class="lp-select-pill-wrap">
                                <select class="lp-select-pill" required>
                                    <option value="" disabled selected>Rencana Implementasi</option>
                                    <option value="segera">Segera (Minggu Ini)</option>
                                    <option value="bulan_ini">Bulan Ini</option>
                                    <option value="eksplorasi">Uji Coba &amp; Demo Sistem</option>
                                </select>
                            </div>

                            <button type="submit" class="lp-btn-pill-dark">
                                <span>Kirim Permintaan Demo</span>
                            </button>
                            <div id="contact-alert" style="display: none; font-size: 13.5px; color: #059669; text-align: center; margin-top: 8px;">
                                Terima kasih! Permintaan demo berhasil dikirim.
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
                        <span>&copy; {{ date('Y') }} POS Garam. Hak cipta dilindungi.</span>
                        <span class="lp-status-badge">
                            <span>Sistem Aktif &amp; Terhubung</span>
                        </span>
                    </div>
                    <div>
                        <a href="{{ route('login') }}" style="color: var(--lp-text-muted); text-decoration: none; font-size: 13.5px;">Login Karyawan</a>
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
                window.location.href = "{{ route('login') }}";
            }, 1000);
        }
    </script>
</body>
</html>
