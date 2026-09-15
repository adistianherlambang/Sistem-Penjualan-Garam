@extends('layouts.garam')

@section('title', 'Pabrik Garam Industri & Konsumsi CV. Banyu Mili')

@section('content')
<div class="middles_wrapper_cont tops_home">
    <!-- Start FCS Hero Carousel -->
    <div class="fcs-wrapper outers_fcs_wrapper prelatife">
        <div class="prelatife">
            <div id="myCarousel_home" class="carousel homeslide fade">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel_home" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel_home" data-slide-to="1"></li>
                    <li data-target="#myCarousel_home" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="item active" style="background-image: url('{{ asset('asset/images/ptgaram/slide-1.jpg') }}');">
                        <div class="carousel-caption">
                            <div class="prelatife container">
                                <div class="bxsl_tx_fcs">
                                    <div class="texts text-left">
                                        <h2>SELAMAT DATANG DI PABRIK GARAM INDUSTRI CV BANYU MILI</h2>
                                        <h4>Kualitas hidup yang lebih baik dimulai dari konsumsi garam industri berkualitas yang lebih baik pada keseharian anda</h4>
                                        <p>
                                            Pabrik garam industri CV. Banyu Mili memiliki semangat dan misi khusus untuk meningkatkan taraf kesejahteraan masyarakat di Indonesia, melalui kesehatan dan gizi yang lebih baik bagi seluruh konsumen kami. Selamat datang di CV. Banyu Mili.
                                        </p>
                                        <a href="{{ url('/tentang-kami') }}" class="btn btn-link btns_more_fcs">PELAJARI LEBIH LANJUT TENTANG KAMI</a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="item" style="background-image: url('{{ asset('asset/images/ptgaram/slide-2.jpg') }}');">
                        <div class="carousel-caption">
                            <div class="prelatife container">
                                <div class="bxsl_tx_fcs">
                                    <div class="texts text-left">
                                        <h2>PRODUSEN GARAM MEJA & KONSUMSI BERMUTU TINGGI</h2>
                                        <h4>Standar pemurnian higienis dengan kandungan iodium dan kemurnian teruji laboratorium nasional</h4>
                                        <p>
                                            Menghadirkan garam meja beryodium dan garam dapur berstandar mutu tinggi untuk keluarga Indonesia, diproduksi secara konsisten dengan pengawasan kualitas yang ketat.
                                        </p>
                                        <a href="{{ url('/produk') }}" class="btn btn-link btns_more_fcs">LIHAT KATALOG PRODUK GARAM</a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="item" style="background-image: url('{{ asset('asset/images/ptgaram/slide-3.jpg') }}');">
                        <div class="carousel-caption">
                            <div class="prelatife container">
                                <div class="bxsl_tx_fcs">
                                    <div class="texts text-left">
                                        <h2>PASOKAN GARAM INDUSTRI NASIONAL TERPERCAYA</h2>
                                        <h4>Mitra strategis untuk aneka industri makanan, tekstil, pakan ternak, dan manufaktur</h4>
                                        <p>
                                            Kapasitas pasokan puluhan ribu ton per tahun dengan spesifikasi teknis NaCl presisi serta jaminan distribusi tepat waktu ke berbagai kota di Indonesia.
                                        </p>
                                        <a href="{{ url('/kontak') }}" class="btn btn-link btns_more_fcs">KONSULTASI & HUBUNGI KAMI</a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <!-- End FCS Hero Carousel -->

    <!-- Section 1: Garam Konsumsi Beryodium -->
    <h1 class="hidden hide">GARAM KONSUMSI BERYODIUM</h1>
    <section class="default_sc backs_homesection_1" id="home_c1">
        <div class="prelatife container">
            <div class="insides content-text text-center">
                <div class="top">
                    <h3 class="s_title">GARAM KONSUMSI BERYODIUM</h3>
                    <h4>Produk garam berkualitas CV. Banyu Mili</h4>
                </div>

                <div class="lists_default_product_dt list_home">
                    <div class="row">
                        <!-- Product 1 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="items">
                                <div class="pict">
                                    <a href="{{ url('/produk') }}">
                                        <img src="{{ asset('asset/images/ptgaram/product-1.jpg') }}" alt="Garam Meja Beryodium" class="img-responsive center-block">
                                    </a>
                                </div>
                                <div class="info">
                                    <h5 class="name">GARAM KERAPAN SAPI</h5>
                                    <span class="used">GARAM KONSUMSI BERYODIUM</span>
                                    <p>Garam beryodium yang mengandung yodium minimum 30 ppm.<br /><br />
                                    Produk garam ini tersedia dalam ukuran:<br />
                                    150 gr, 200 gr, 250 gr, 500 gr</p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 2 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="items">
                                <div class="pict">
                                    <a href="{{ url('/produk') }}">
                                        <img src="{{ asset('asset/images/ptgaram/product-2.jpg') }}" alt="Garam Sarcil" class="img-responsive center-block">
                                    </a>
                                </div>
                                <div class="info">
                                    <h5 class="name">GARAM SARCIL</h5>
                                    <span class="used">GARAM KONSUMSI BERYODIUM</span>
                                    <p>Garam beryodium yang mengandung yodium minimum 30 ppm.<br /><br />
                                    Produk garam ini tersedia dalam ukuran:<br />
                                    200 gr, 250 gr, 500 gr</p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 3 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="items">
                                <div class="pict">
                                    <a href="{{ url('/produk') }}">
                                        <img src="{{ asset('asset/images/ptgaram/product-3.jpg') }}" alt="Garam Banyu Mili" class="img-responsive center-block">
                                    </a>
                                </div>
                                <div class="info">
                                    <h5 class="name">GARAM BANYU MILI</h5>
                                    <span class="used">GARAM KONSUMSI BERYODIUM</span>
                                    <p>Garam beryodium yang mengandung yodium minimum 30 ppm.<br /><br />
                                    Produk garam ini tersedia dalam ukuran:<br />
                                    250 gr, 500 gr, 1.000 gr</p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 4 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="items">
                                <div class="pict">
                                    <a href="{{ url('/produk') }}">
                                        <img src="{{ asset('asset/images/ptgaram/product-4.jpg') }}" alt="Garam Kemilau" class="img-responsive center-block">
                                    </a>
                                </div>
                                <div class="info">
                                    <h5 class="name">GARAM KEMILAU LOSARANG</h5>
                                    <span class="used">GARAM KONSUMSI BERYODIUM</span>
                                    <p>Garam beryodium yang mengandung yodium minimum 30 ppm.<br /><br />
                                    Produk garam ini tersedia dalam ukuran:<br />
                                    200 gr dan 250 gr</p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ url('/produk') }}" class="btn btn-default btn_blue_def">LIHAT SEMUA PRODUK GARAM BANYU MILI</a>
                <div class="clear"></div>
            </div>
        </div>
    </section>

    <!-- Section 2: Industri -->
    <section class="default_sc backs_homesection_2" id="home_c2">
        <div class="prelatife container">
            <div class="insides text-center">
                <h3 class="s_title">INDUSTRI</h3>
                <h4>Garam hadir di manapun<br />pada kehidupan kita sehari-hari</h4>
                <p>
                    CV. Banyu Mili memproduksi dan mendistribusikan garam berkualitas prima untuk menyokong operasional sektor industri strategis, mulai dari pengolahan makanan, pabrik kimia, water treatment, pengawetan perikanan, hingga peternakan.
                </p>
                <div class="clear"></div>
            </div>
        </div>

        <div class="clear height-15"></div>

        <div class="block_list_used_sals_defHome">
            <div class="row" style="margin: 0;">
                <!-- Industry 1: Makanan -->
                <div class="col-md-4 col-sm-6" style="padding: 0;">
                    <div class="items prelatife" onclick="location.href='{{ url('/industri#makanan') }}';" style="cursor: pointer;">
                        <img src="{{ asset('asset/images/ptgaram/industry-food.jpg') }}" alt="Garam Industri Makanan" class="img-responsive">
                        <div class="ins_text">
                            <div class="inset info">
                                <span>Garam Industri Untuk</span>
                                <h3>Makanan</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Industry 2: Aneka Industri & Pabrik -->
                <div class="col-md-4 col-sm-6" style="padding: 0;">
                    <div class="items prelatife" onclick="location.href='{{ url('/industri#pabrik') }}';" style="cursor: pointer;">
                        <img src="{{ asset('asset/images/ptgaram/industry-factory.jpg') }}" alt="Garam Industri Aneka Industri & Pabrik" class="img-responsive">
                        <div class="ins_text">
                            <div class="inset info">
                                <span>Garam Industri Untuk</span>
                                <h3>Aneka Industri & Pabrik</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Industry 3: Kolam Renang -->
                <div class="col-md-4 col-sm-6" style="padding: 0;">
                    <div class="items prelatife" onclick="location.href='{{ url('/industri#kolam-renang') }}';" style="cursor: pointer;">
                        <img src="{{ asset('asset/images/ptgaram/industry-pool.jpg') }}" alt="Garam Industri Kolam Renang" class="img-responsive">
                        <div class="ins_text">
                            <div class="inset info">
                                <span>Garam Industri Untuk</span>
                                <h3>Kolam Renang</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Industry 4: Pengawetan -->
                <div class="col-md-4 col-sm-6" style="padding: 0;">
                    <div class="items prelatife" onclick="location.href='{{ url('/industri#pengawetan') }}';" style="cursor: pointer;">
                        <img src="{{ asset('asset/images/ptgaram/industry-preservation.jpg') }}" alt="Garam Industri Pengawetan" class="img-responsive">
                        <div class="ins_text">
                            <div class="inset info">
                                <span>Garam Industri Untuk</span>
                                <h3>Pengawetan</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Industry 5: Pakan Ternak -->
                <div class="col-md-4 col-sm-6" style="padding: 0;">
                    <div class="items prelatife" onclick="location.href='{{ url('/industri#pakan-ternak') }}';" style="cursor: pointer;">
                        <img src="{{ asset('asset/images/ptgaram/industry-livestock.jpg') }}" alt="Garam Industri Pakan Ternak" class="img-responsive">
                        <div class="ins_text">
                            <div class="inset info">
                                <span>Garam Industri Untuk</span>
                                <h3>Pakan Ternak</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Industry 6: Perawatan Tubuh -->
                <div class="col-md-4 col-sm-6" style="padding: 0;">
                    <div class="items prelatife" onclick="location.href='{{ url('/industri#perawatan-tubuh') }}';" style="cursor: pointer;">
                        <img src="{{ asset('asset/images/ptgaram/industry-spa.jpg') }}" alt="Garam Industri Perawatan Tubuh" class="img-responsive">
                        <div class="ins_text">
                            <div class="inset info">
                                <span>Garam Industri Untuk</span>
                                <h3>Perawatan Tubuh</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Aneka Berita & Artikel -->
    <section class="default_sc backs_homesection_1 blocks_articles_home" id="home_c1">
        <div class="prelatife container">
            <div class="insides content-text text-center">
                <div class="top">
                    <h3 class="s_title">ANEKA BERITA & ARTIKEL</h3>
                    <h4>Berbagai informasi terkini dan artikel terbaru<br />seputar produk garam CV. Banyu Mili</h4>
                </div>

                <div class="block_list_newsf_default">
                    <!-- News 1 -->
                    <div class="items">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <span class="dates">15 / 09 / 2026</span>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <p>CV. Banyu Mili Kembangkan Industri Garam untuk Menjawab Kebutuhan Pasar Nasional</p>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="text-right">
                                    <div class="links_more_news">
                                        <a href="{{ url('/berita') }}"><img src="{{ asset('asset/images/backs_btn_icons_sq_blue.png') }}" alt="Baca Berita" class="img-responsive"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- News 2 -->
                    <div class="items">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <span class="dates">14 / 09 / 2026</span>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <p>Garam Berkualitas dan Industri Masa Depan: Strategi CV. Banyu Mili Menatap Peluang</p>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="text-right">
                                    <div class="links_more_news">
                                        <a href="{{ url('/berita') }}"><img src="{{ asset('asset/images/backs_btn_icons_sq_blue.png') }}" alt="Baca Berita" class="img-responsive"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- News 3 -->
                    <div class="items">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <span class="dates">13 / 09 / 2026</span>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <p>Ketepatan Produksi Menjadi Kekuatan CV. Banyu Mili dalam Menjawab Kebutuhan Industri</p>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="text-right">
                                    <div class="links_more_news">
                                        <a href="{{ url('/berita') }}"><img src="{{ asset('asset/images/backs_btn_icons_sq_blue.png') }}" alt="Baca Berita" class="img-responsive"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- News 4 -->
                    <div class="items">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <span class="dates">12 / 09 / 2026</span>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <p>Menjaga Mutu di Tengah Perubahan Industri, CV. Banyu Mili Memperkuat Arah Bisnis</p>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="text-right">
                                    <div class="links_more_news">
                                        <a href="{{ url('/berita') }}"><img src="{{ asset('asset/images/backs_btn_icons_sq_blue.png') }}" alt="Baca Berita" class="img-responsive"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clear height-30"></div>
                <div class="text-center views_other_articles">
                    <a href="{{ url('/berita') }}" class="btn btn-default btn_blue_def">LIHAT ARTIKEL LAINNYA</a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
$(function(){
    // Setup carousel full height & auto slide
    $('#myCarousel_home').carousel({
        interval: 6000,
        pause: "hover"
    });

    // Equal height calculation for industry overlay items
    $(window).on('load resize', function(){
        var h = $('.block_list_used_sals_defHome .items').height();
        if (h > 0) {
            $('.block_list_used_sals_defHome .items .ins_text').css('height', h + 'px');
        }
    });
});
</script>
@endpush