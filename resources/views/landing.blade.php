<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Garam - Industri Pengolahan &amp; Sistem Distribusi Garam</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Work Sans"', '"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        primary: '#2563eb',
                        secondary: '#3b82f6',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body class="landing-page-body bg-white text-gray-700">

    <div class="lp-master-wrapper w-full min-h-screen flex flex-col">

        <!-- Navbar (Exact layout of Niaga Garam Cemerlang with Blue Accent) -->
        <nav class="w-full z-50 transition-all duration-300 fixed top-0 bg-white/95 backdrop-blur-sm border-b border-gray-100">
            <div class="h-0.5 w-full bg-gradient-to-r from-blue-500 via-blue-800 to-blue-500"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
                <div class="flex justify-between items-center">
                    <div>
                        <a aria-label="logo" class="flex items-center space-x-2" href="{{ url('/') }}">
                            <span class="font-extrabold text-gray-800 transition-all duration-300 text-xl tracking-tight">POS <span class="text-blue-600">Garam</span></span>
                        </a>
                    </div>
                    <div class="hidden lg:flex items-center space-x-1 lg:space-x-4">
                        <div class="relative group">
                            <a class="py-2 px-3 text-blue-600 font-bold transition duration-300 relative inline-flex items-center" href="#home">
                                Home
                                <span class="absolute left-0 bottom-0 w-full h-0.5 bg-blue-600"></span>
                            </a>
                        </div>
                        <div class="relative group">
                            <a class="py-2 px-3 text-gray-700 font-medium hover:text-blue-600 transition duration-300 relative inline-flex items-center" href="#tentang">
                                Tentang Kami
                            </a>
                        </div>
                        <div class="relative group">
                            <a class="py-2 px-3 text-gray-700 font-medium hover:text-blue-600 transition duration-300 relative inline-flex items-center" href="#keunggulan">
                                Keunggulan
                            </a>
                        </div>
                        <div class="relative group">
                            <a class="py-2 px-3 text-gray-700 font-medium hover:text-blue-600 transition duration-300 relative inline-flex items-center" href="#produk">
                                Produk
                            </a>
                        </div>
                        <div class="relative group">
                            <a class="py-2 px-3 text-gray-700 font-medium hover:text-blue-600 transition duration-300 relative inline-flex items-center" href="#kontak">
                                Kontak
                            </a>
                        </div>
                        <div class="ml-2">
                            @auth
                                <a class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white px-4 py-2 rounded-lg font-medium transition-all duration-300 inline-block text-sm" href="{{ route('dashboard') }}">
                                    Buka Dashboard
                                </a>
                            @else
                                <a class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white px-4 py-2 rounded-lg font-medium transition-all duration-300 inline-block text-sm" href="{{ route('login') }}">
                                    Masuk Sistem
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="flex-grow">
            <main>

                <!-- Hero Section (Exact NGC Hero with Blue Gradient & Real Photo) -->
                <div class="bg-gradient-to-tr from-background via-sky-50 to-sky-100 overflow-hidden pt-28" id="home">
                    <div class="pt-24 md:pt-32 pb-16 xl:max-w-7xl mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
                        <div class="relative lg:flex lg:items-center lg:gap-12">
                            
                            <!-- Left: Hero Text -->
                            <div class="text-center lg:text-left md:mt-12 lg:mt-0 sm:w-10/12 md:w-2/3 sm:mx-auto lg:mr-auto lg:w-6/12">
                                <h1 class="text-gray-900 font-bold text-4xl md:text-5xl lg:text-6xl xl:text-6xl leading-tight">
                                    POS Garam<!-- --> <span class="text-blue-600 bg-clip-text bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400 inline-block">Berkualitas</span>
                                </h1>
                                <p class="mt-4 text-gray-600 text-lg max-w-xl mx-auto lg:mx-0 font-medium leading-relaxed">
                                    “Perusahaan Industri Garam Kredibel, Berpengalaman dan Terpercaya”
                                </p>
                                <div class="mt-8 flex flex-wrap sm:flex-nowrap gap-3 md:gap-4 justify-center lg:justify-start">
                                    <div>
                                        <a class="w-full sm:w-auto group relative flex items-center justify-center gap-2 rounded-lg px-6 py-3 font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 transition-all duration-300" href="#kontak">
                                            <span>Hubungi Kami</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="w-full sm:w-auto group flex items-center justify-center gap-2 rounded-lg px-6 py-3 font-semibold text-blue-600 border-2 border-blue-500/20 bg-white hover:border-blue-500/40 hover:bg-blue-50/50 transition-colors duration-300" href="#produk">
                                            <span>Produk Kami</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Right: Hero Visual -->
                            <div class="relative w-full lg:w-7/12 mt-12 lg:mt-0 lg:-mr-16">
                                <div class="relative z-10">
                                    <div class="rounded-lg overflow-hidden border border-blue-100 bg-white p-2">
                                        <img alt="POS Garam Fasilitas" width="1300" height="768" class="rounded-lg w-full h-auto transform transition-transform duration-300 hover:scale-105" src="{{ asset('images/hero_real.png') }}">
                                    </div>
                                    <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-blue-500/10 rounded-full blur-2xl"></div>
                                    <div class="absolute -top-5 -left-5 w-24 h-24 bg-sky-500/10 rounded-full blur-xl"></div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Client / Trust Strip -->
                    <div class="w-full pt-10 pb-16">
                        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                            <p class="text-center text-xs font-semibold tracking-wider text-gray-400 uppercase mb-6">Dipercaya Berbagai Sektor Industri &amp; Distribusi Nasional</p>
                            <div class="flex flex-wrap justify-center items-center gap-3 md:gap-4">
                                <div class="px-5 py-2.5 bg-white border border-gray-200 rounded-full text-sm font-semibold text-gray-700">Industri Makanan &amp; Minuman</div>
                                <div class="px-5 py-2.5 bg-white border border-gray-200 rounded-full text-sm font-semibold text-gray-700">Industri Perikanan &amp; Pakan</div>
                                <div class="px-5 py-2.5 bg-white border border-gray-200 rounded-full text-sm font-semibold text-gray-700">Industri Kimia &amp; Tekstil</div>
                                <div class="px-5 py-2.5 bg-white border border-gray-200 rounded-full text-sm font-semibold text-gray-700">Water Treatment &amp; Penyamakan</div>
                                <div class="px-5 py-2.5 bg-white border border-gray-200 rounded-full text-sm font-semibold text-gray-700">Distribusi Retail Konsumsi</div>
                                <div class="px-5 py-2.5 bg-white border border-gray-200 rounded-full text-sm font-semibold text-gray-700">Kemitraan Petani Garam</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Tentang Kami (Exact NGC Section 0) -->
                <section class="py-16 md:py-24" id="tentang">
                    <div class="container mx-auto px-4 sm:px-6 max-w-7xl">
                        
                        <!-- Header -->
                        <div class="text-center mb-16">
                            <span class="inline-block px-3 py-1 text-sm font-medium text-blue-600 bg-blue-100 rounded-full mb-3">Tentang Perusahaan</span>
                            <h2 class="text-4xl md:text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-500 mb-3 leading-tight">Tentang Kami</h2>
                            <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-blue-400 mx-auto mb-6 rounded-full leading-tight"></div>
                            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">Mengenal lebih dalam perusahaan garam yang berkomitmen pada kualitas dan profesionalisme</p>
                        </div>

                        <!-- 2 Columns Flex -->
                        <div class="flex flex-col md:flex-row items-center gap-10 md:gap-16 lg:gap-20">
                            
                            <!-- Left: Image -->
                            <div class="w-full md:w-1/2">
                                <div class="rounded-2xl overflow-hidden border border-gray-200 relative">
                                    <img alt="Gedung Pengolahan Garam" width="600" height="450" class="object-cover w-full h-[400px]" src="{{ asset('images/about_real.png') }}">
                                    <div class="absolute bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black/40 to-transparent opacity-70"></div>
                                </div>
                            </div>

                            <!-- Right: Text Content -->
                            <div class="w-full md:w-1/2 pt-8 md:pt-0">
                                <span class="inline-block bg-blue-100 text-blue-700 text-sm font-semibold px-4 py-2 rounded-full mb-6">🎉 Berkomitmen pada Kualitas</span>
                                <h3 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 leading-tight">POS Garam</h3>
                                <div class="w-16 h-1 bg-blue-600 rounded-full mb-6"></div>
                                <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-8">
                                    POS Garam adalah perusahaan yang bergerak dalam bidang pengolahan garam modern dengan bahan baku berkualitas tinggi dan proses yang terstandarisasi. Menghadirkan produk garam terbaik dengan jaminan mutu pangan, kontinuitas pasokan terjaga, serta dukungan platform kasir dan stok terintegrasi.
                                </p>
                                <a href="#kontak" class="group bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white font-semibold py-3.5 px-8 rounded-lg transition-all duration-300 ease-in-out inline-block">
                                    Explore Perusahaan Kami &rarr;
                                </a>
                            </div>

                        </div>

                        <!-- 4 Feature Cards Grid (Exact NGC Grid) -->
                        <div class="mt-24 max-w-7xl mx-auto px-4" id="keunggulan">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                                
                                <div class="rounded-xl border border-gray-100 hover:border-blue-500/30 bg-white p-6 transition-all duration-300">
                                    <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 text-blue-600 font-bold text-lg">01</div>
                                    <h3 class="mb-2 text-lg font-semibold text-gray-900">Jenis Industri</h3>
                                    <p class="text-sm text-gray-500">Spesialis dalam pengolahan garam modern.</p>
                                </div>

                                <div class="rounded-xl border border-gray-100 hover:border-blue-500/30 bg-white p-6 transition-all duration-300">
                                    <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 text-blue-600 font-bold text-lg">02</div>
                                    <h3 class="mb-2 text-lg font-semibold text-gray-900">Produk Unggulan</h3>
                                    <p class="text-sm text-gray-500">Garam industri &amp; konsumsi berkualitas tinggi.</p>
                                </div>

                                <div class="rounded-xl border border-gray-100 hover:border-blue-500/30 bg-white p-6 transition-all duration-300">
                                    <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 text-blue-600 font-bold text-lg">03</div>
                                    <h3 class="mb-2 text-lg font-semibold text-gray-900">Sertifikasi</h3>
                                    <p class="text-sm text-gray-500">SNI, BPOM RI, ISO, Halal Mutu Pangan.</p>
                                </div>

                                <div class="rounded-xl border border-gray-100 hover:border-blue-500/30 bg-white p-6 transition-all duration-300">
                                    <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 text-blue-600 font-bold text-lg">04</div>
                                    <h3 class="mb-2 text-lg font-semibold text-gray-900">Kapasitas Produksi</h3>
                                    <p class="text-sm text-gray-500">Mencapai 150.000 ton per tahun.</p>
                                </div>

                            </div>
                        </div>

                    </div>
                </section>

                <!-- Section: Produk & Wawasan (Exact NGC Section 1: 1 Big Card + 3 Stack Cards) -->
                <section class="bg-white border-t border-gray-100" id="produk">
                    <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-12 lg:py-20">
                        <div class="flex flex-col items-center">
                            
                            <div class="mb-8 max-w-[800px] text-center md:mb-12 lg:mb-16">
                                <h2 class="mb-4 text-3xl font-extrabold leading-tight md:text-5xl lg:text-6xl text-gray-900">
                                    Produk <span class="text-blue-600">&amp;</span> Layanan
                                </h2>
                                <p class="mx-auto mt-4 max-w-[628px] text-lg text-gray-600 md:text-xl">
                                    Tetap terkini dengan produk dan wawasan pengolahan garam berkualitas
                                </p>
                            </div>

                            <div class="grid w-full gap-8 lg:grid-cols-12">
                                
                                <!-- Left Featured Card (lg:col-span-7) -->
                                <div class="group relative lg:col-span-7">
                                    <div class="overflow-hidden rounded-2xl border border-gray-200 transition-all duration-300">
                                        <img alt="Garam Halus Industri" width="1200" height="800" class="h-64 w-full object-cover transition-transform duration-300 group-hover:scale-105 sm:h-80" src="{{ asset('images/product_ghb.png') }}">
                                    </div>
                                    <div class="mt-4 space-y-2">
                                        <div class="flex items-center text-sm text-gray-500 font-medium">
                                            <time>Pasokan Rutin Industri</time>
                                            <span class="mx-2 h-1 w-1 rounded-full bg-current"></span>
                                            <span>Karung 50kg &amp; Jumbo Bag</span>
                                        </div>
                                        <a class="block text-2xl font-bold leading-tight transition-colors duration-300 hover:text-blue-600" href="#kontak">
                                            Garam Halus Industri Beryodium (GHB) &amp; Non-Yodium (GHA)
                                        </a>
                                        <p class="text-gray-600 line-clamp-2">
                                            Sebagai bagian dari komitmen kami dalam menghadirkan garam bermutu tinggi, produk garam industri kami memiliki kadar NaCl &ge; 98% dengan kontrol kelembaban presisi untuk biskuit, mie instan, bumbu, dan pakan.
                                        </p>
                                    </div>
                                </div>

                                <!-- Right 3 Stack Cards (lg:col-span-5) -->
                                <div class="space-y-8 lg:space-y-6 lg:col-span-5">
                                    
                                    <article class="group flex gap-4 transition-colors duration-300 hover:bg-blue-50/40 rounded-xl p-3 border border-gray-200">
                                        <div class="relative h-24 w-24 flex-shrink-0 overflow-hidden rounded-lg">
                                            <img alt="Garam Konsumsi" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110" src="{{ asset('images/product_pack.png') }}">
                                        </div>
                                        <div class="flex flex-1 flex-col justify-between">
                                            <div>
                                                <a class="text-lg font-semibold leading-tight transition-colors duration-300 hover:text-blue-600 line-clamp-2" href="#kontak">
                                                    Garam Dapur &amp; Meja Beryodium Standar 250g - 300g
                                                </a>
                                                <p class="mt-1 text-xs text-gray-500 line-clamp-2">
                                                    Kemasan konsumsi keluarga dengan fortifikasi KIO3 standar nasional SNI, higienis, putih bersih, dan siap edar.
                                                </p>
                                            </div>
                                            <div class="mt-1 flex items-center text-xs text-gray-500 font-medium">
                                                <span>Konsumsi Kemasan</span>
                                                <span class="mx-2">•</span>
                                                <time>SNI Resmi</time>
                                            </div>
                                        </div>
                                    </article>

                                    <article class="group flex gap-4 transition-colors duration-300 hover:bg-blue-50/40 rounded-xl p-3 border border-gray-200">
                                        <div class="relative h-24 w-24 flex-shrink-0 overflow-hidden rounded-lg">
                                            <img alt="Garam Krosok" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110" src="{{ asset('images/processing_real.png') }}">
                                        </div>
                                        <div class="flex flex-1 flex-col justify-between">
                                            <div>
                                                <a class="text-lg font-semibold leading-tight transition-colors duration-300 hover:text-blue-600 line-clamp-2" href="#kontak">
                                                    Garam Krosok Pilihan (Bahan Baku &amp; Pengawetan)
                                                </a>
                                                <p class="mt-1 text-xs text-gray-500 line-clamp-2">
                                                    Kristal alami kualitas pilihan untuk industri penyamakan kulit, pengawetan hasil laut, water treatment, dan kimia.
                                                </p>
                                            </div>
                                            <div class="mt-1 flex items-center text-xs text-gray-500 font-medium">
                                                <span>Bahan Baku</span>
                                                <span class="mx-2">•</span>
                                                <time>Kadar Terjaga</time>
                                            </div>
                                        </div>
                                    </article>

                                    <article class="group flex gap-4 transition-colors duration-300 hover:bg-blue-50/40 rounded-xl p-3 border border-gray-200">
                                        <div class="relative h-24 w-24 flex-shrink-0 overflow-hidden rounded-lg">
                                            <img alt="Sistem Kasir POS" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110" src="{{ asset('images/hero_real.png') }}">
                                        </div>
                                        <div class="flex flex-1 flex-col justify-between">
                                            <div>
                                                <a class="text-lg font-semibold leading-tight transition-colors duration-300 hover:text-blue-600 line-clamp-2" href="{{ route('login') }}">
                                                    Sistem Kasir POS &amp; Manajemen Mutasi Stok Real-Time
                                                </a>
                                                <p class="mt-1 text-xs text-gray-500 line-clamp-2">
                                                    Pencatatan garam mentah masuk, konversi kemasan 300g, hingga faktur kasir cepat real-time.
                                                </p>
                                            </div>
                                            <div class="mt-1 flex items-center text-xs text-gray-500 font-medium">
                                                <span>Platform Terpadu</span>
                                                <span class="mx-2">•</span>
                                                <time>Otomatis</time>
                                            </div>
                                        </div>
                                    </article>

                                </div>

                            </div>

                            <div class="mt-12 text-center">
                                <a class="inline-block" href="#kontak">
                                    <button class="cursor-pointer whitespace-nowrap rounded-md font-semibold bg-gradient-to-r from-blue-600 to-blue-500 text-white hover:from-blue-700 hover:to-blue-600 px-8 py-4 text-base transition-all duration-300 border-none">
                                        Konsultasi Seluruh Produk &rarr;
                                    </button>
                                </a>
                            </div>

                        </div>
                    </div>
                </section>

                <!-- Section: Call-to-Action Banner (Exact NGC Section 2 with Blue Gradient) -->
                <section class="px-4" id="kontak">
                    <div class="relative my-16 isolate overflow-hidden bg-gradient-to-br from-blue-600 via-blue-500 to-indigo-600 p-8 sm:p-12 w-full max-w-[1200px] mx-auto rounded-2xl border border-blue-400/30">
                        <div class="absolute right-0 top-0 h-32 w-32 -translate-y-1/2 translate-x-1/2 rounded-full bg-blue-400/30 blur-3xl"></div>
                        <div class="text-center md:text-left">
                            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                                <div class="space-y-4 max-w-2xl">
                                    <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white leading-tight">
                                        Butuh Garam Berkualitas untuk Industri Anda?
                                    </h3>
                                    <p class="text-blue-100 text-lg sm:text-xl">
                                        Tim ahli kami siap membantu Anda menemukan produk garam terbaik sesuai kebutuhan
                                    </p>
                                </div>
                                <a class="group relative flex-shrink-0 inline-flex items-center justify-center gap-2 text-blue-600 bg-white hover:bg-gray-50 px-8 py-4 text-lg font-semibold rounded-xl transition-all duration-300" href="#form-konsultasi">
                                    <span>Konsultasi Sekarang &rarr;</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Interactive Consultation Form Card -->
                <div class="max-w-[1200px] mx-auto px-4 mb-20" id="form-konsultasi">
                    <div class="bg-white border border-gray-200 rounded-2xl p-8 md:p-10">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Formulir Permintaan Pasokan &amp; Konsultasi</h3>
                        <p class="text-gray-600 mb-6 text-sm">Isi spesifikasi kebutuhan garam Anda dan tim kami akan segera menghubungi Anda dengan penawaran resmi.</p>
                        <form onsubmit="handleContactSubmit(event)">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Sektor Industri</label>
                                    <select class="w-full p-3 bg-white border border-gray-200 rounded-lg text-sm text-gray-700 outline-none focus:border-blue-600" required>
                                        <option value="" disabled selected>Pilih Sektor Industri</option>
                                        <option value="makanan">Industri Makanan &amp; Minuman</option>
                                        <option value="kimia">Industri Kimia &amp; Tekstil</option>
                                        <option value="pakan">Industri Pakan &amp; Perikanan</option>
                                        <option value="distributor">Distributor / Retail</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Kebutuhan Produk</label>
                                    <select class="w-full p-3 bg-white border border-gray-200 rounded-lg text-sm text-gray-700 outline-none focus:border-blue-600" required>
                                        <option value="" disabled selected>Pilih Produk</option>
                                        <option value="gha">Garam Industri GHA (Non-Yodium)</option>
                                        <option value="ghb">Garam Industri GHB (Beryodium)</option>
                                        <option value="krosok">Garam Krosok Mentah</option>
                                        <option value="konsumsi">Garam Konsumsi 250g/300g</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Volume Pasokan</label>
                                    <select class="w-full p-3 bg-white border border-gray-200 rounded-lg text-sm text-gray-700 outline-none focus:border-blue-600" required>
                                        <option value="" disabled selected>Pilih Estimasi Tonase</option>
                                        <option value="5ton">&lt; 5 Ton / Pengiriman</option>
                                        <option value="25ton">5 - 25 Ton / Pengiriman</option>
                                        <option value="kontrak">Kontrak Pasokan Rutin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Catatan Kebutuhan</label>
                                <textarea rows="3" class="w-full p-3 bg-white border border-gray-200 rounded-lg text-sm text-gray-700 outline-none focus:border-blue-600" placeholder="Sebutkan spesifikasi kadar NaCl, kemasan, atau lokasi pengiriman..."></textarea>
                            </div>
                            <div class="mt-6 flex flex-wrap items-center justify-between gap-4">
                                <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 text-white font-semibold px-8 py-3.5 rounded-lg border-none cursor-pointer">
                                    Kirim Permintaan Konsultasi
                                </button>
                                <div id="contact-alert" style="display: none;" class="text-sm font-bold text-emerald-600">
                                    Terima kasih! Permintaan konsultasi Anda telah kami terima dan akan segera diproses.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </main>
        </div>

        <!-- Footer (Exact NGC Footer with Blue Accent) -->
        <footer class="bg-white border-t border-gray-200 pt-12 pb-0 text-gray-700">
            <div class="mx-auto max-w-7xl px-6 pb-8 pt-20 lg:px-8 relative">
                
                <!-- Back to top button -->
                <div class="absolute left-1/2 -top-7 transform -translate-x-1/2 z-30">
                    <a href="#home" aria-label="Back to top" class="w-14 h-14 flex items-center justify-center rounded-full bg-gradient-to-br from-blue-600 to-blue-500 text-white border-4 border-white font-bold text-xl hover:scale-105 transition-all duration-300 text-white no-underline">
                        &uarr;
                    </a>
                </div>

                <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 px-6">
                    
                    <!-- Col 1: Brand -->
                    <div class="space-y-6 flex flex-col justify-between">
                        <div class="flex items-center gap-3">
                            <span class="text-xl font-extrabold tracking-wide text-gray-900">POS <span class="text-blue-600">Garam</span></span>
                        </div>
                        <p class="text-sm leading-6 text-gray-600 max-w-xs">
                            Sentra Industri Pengolahan, Pergudangan, dan Distribusi Garam Terpadu dengan standar mutu operasional terpercaya.
                        </p>
                        <div>
                            <span class="inline-block px-3 py-1 bg-blue-50 text-blue-700 rounded-md text-xs font-semibold border border-blue-100">
                                Sertifikasi SNI &bull; Standar Mutu Nasional &bull; Halal
                            </span>
                        </div>
                    </div>

                    <!-- Col 2: Navigation Links -->
                    <div class="grid grid-cols-2 gap-10">
                        <div>
                            <h3 class="text-base font-semibold text-gray-900 mb-4">Perusahaan</h3>
                            <ul class="space-y-3 list-none p-0 m-0">
                                <li><a class="text-sm leading-6 text-gray-600 hover:text-blue-600 transition-colors duration-200" href="#tentang">Tentang Kami</a></li>
                                <li><a class="text-sm leading-6 text-gray-600 hover:text-blue-600 transition-colors duration-200" href="#keunggulan">Keunggulan Mutu</a></li>
                                <li><a class="text-sm leading-6 text-gray-600 hover:text-blue-600 transition-colors duration-200" href="#produk">Katalog Produk</a></li>
                                <li><a class="text-sm leading-6 text-gray-600 hover:text-blue-600 transition-colors duration-200" href="#kontak">Kontak</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-base font-semibold text-gray-900 mb-4">Produk</h3>
                            <ul class="space-y-3 list-none p-0 m-0">
                                <li><a class="text-sm leading-6 text-gray-600 hover:text-blue-600 transition-colors duration-200" href="#produk">Garam Industri GHB</a></li>
                                <li><a class="text-sm leading-6 text-gray-600 hover:text-blue-600 transition-colors duration-200" href="#produk">Garam Non-Yodium GHA</a></li>
                                <li><a class="text-sm leading-6 text-gray-600 hover:text-blue-600 transition-colors duration-200" href="#produk">Garam Konsumsi</a></li>
                                <li><a class="text-sm leading-6 text-gray-600 hover:text-blue-600 transition-colors duration-200" href="{{ route('login') }}">Sistem Kasir POS</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Col 3: Hours -->
                    <div>
                        <h3 class="text-base font-semibold text-gray-900 mb-4">Jam Operasional</h3>
                        <ul class="space-y-3 list-none p-0 m-0">
                            <li>
                                <dl class="space-y-1 text-sm text-gray-600">
                                    <div class="flex justify-between max-w-xs">
                                        <dt>Senin - Jumat</dt>
                                        <dd>08:00 - 17:00</dd>
                                    </div>
                                    <div class="flex justify-between max-w-xs">
                                        <dt>Sabtu</dt>
                                        <dd>08:00 - 14:00</dd>
                                    </div>
                                    <div class="flex justify-between max-w-xs">
                                        <dt>Minggu</dt>
                                        <dd>Tutup</dd>
                                    </div>
                                </dl>
                            </li>
                        </ul>
                    </div>

                </div>

                <!-- Footer Bottom -->
                <div class="mt-16 border-t border-gray-200 pt-8 flex flex-col md:flex-row justify-between items-center px-6">
                    <p class="text-xs leading-5 text-gray-500">&copy; {{ date('Y') }} POS Garam. All rights reserved.</p>
                    <div class="mt-4 md:mt-0">
                        @auth
                            <a class="text-sm font-semibold text-blue-600 hover:text-blue-700" href="{{ route('dashboard') }}">Buka Dashboard &rarr;</a>
                        @else
                            <a class="text-sm font-semibold text-blue-600 hover:text-blue-700" href="{{ route('login') }}">Login Sistem POS &rarr;</a>
                        @endauth
                    </div>
                </div>

            </div>
        </footer>

    </div>

    <!-- Script for interactive elements -->
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
