<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Garam - Sistem Penjualan dan Pengolahan Garam</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">
    <style>
        .landing-hero {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, #f8fafc 0%, #e0f2fe 100%);
        }
        .landing-nav {
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 48px;
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid var(--md-sys-color-outline-variant);
        }
        .landing-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 18px;
            font-weight: 700;
            color: var(--md-sys-color-primary);
        }
        .landing-body {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 24px;
        }
        .hero-container {
            max-width: 960px;
            text-align: center;
        }
        .hero-title {
            font-size: 40px;
            font-weight: 700;
            color: var(--md-sys-color-on-surface);
            line-height: 1.2;
            margin-bottom: 20px;
        }
        .hero-desc {
            font-size: 17px;
            color: var(--md-sys-color-on-surface-variant);
            max-width: 720px;
            margin: 0 auto 36px;
            line-height: 1.6;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px;
            margin-top: 48px;
            text-align: left;
        }
        .feature-card {
            background-color: #ffffff;
            padding: 24px;
            border-radius: var(--md-shape-corner-medium);
            border: 1px solid var(--md-sys-color-outline-variant);
            box-shadow: var(--md-elevation-1);
        }
        .feature-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--md-shape-corner-medium);
            background-color: var(--md-sys-color-primary-container);
            color: var(--md-sys-color-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }
        .feature-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--md-sys-color-on-surface);
        }
        .feature-text {
            font-size: 13.5px;
            color: var(--md-sys-color-on-surface-variant);
            line-height: 1.5;
        }
    </style>
</head>
<body class="landing-hero">
    <header class="landing-nav">
        <div class="landing-brand">
            <span class="material-symbols-outlined" style="font-size: 28px;">grain</span>
            <span>POS Garam</span>
        </div>
        <div>
            @auth
                <a href="{{ route('dashboard') }}" class="md-btn md-btn-primary">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span>Dashboard</span>
                </a>
            @else
                <a href="{{ route('login') }}" class="md-btn md-btn-primary">
                    <span class="material-symbols-outlined">login</span>
                    <span>Masuk</span>
                </a>
            @endauth
        </div>
    </header>

    <main class="landing-body">
        <div class="hero-container">
            <h1 class="hero-title">Sistem Point of Sale & Pengolahan Garam</h1>
            <p class="hero-desc">
                Solusi terintegrasi untuk mengelola rantai pasok garam: pencatatan bahan mentah datang, proses produksi kemasan 300 gram, transaksi kasir penjualan, cetak nota/faktur, dan monitoring stok secara real-time.
            </p>

            <div>
                @auth
                    <a href="{{ route('dashboard') }}" class="md-btn md-btn-primary" style="padding: 12px 28px; font-size: 15px;">
                        <span>Buka Aplikasi</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="md-btn md-btn-primary" style="padding: 12px 28px; font-size: 15px;">
                        <span>Masuk ke Sistem</span>
                    </a>
                @endauth
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <span class="material-symbols-outlined">warehouse</span>
                    </div>
                    <div class="feature-title">Bahan Mentah</div>
                    <div class="feature-text">
                        Pencatatan garam mentah dalam gram, kilogram, atau ton dengan konversi presisi dan kartu stok otomatis.
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <span class="material-symbols-outlined">precision_manufacturing</span>
                    </div>
                    <div class="feature-title">Proses Produksi</div>
                    <div class="feature-text">
                        Konversi garam mentah ke produk siap jual (standar 1 bungkus = 300 gram) dengan proteksi anti-stok negatif.
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <span class="material-symbols-outlined">point_of_sale</span>
                    </div>
                    <div class="feature-title">Kasir & Faktur</div>
                    <div class="feature-text">
                        Transaksi cepat penjualan garam bungkus, hitung kembalian otomatis, serta cetak nota dan faktur resmi.
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
