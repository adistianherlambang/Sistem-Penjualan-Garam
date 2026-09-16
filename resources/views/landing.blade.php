@extends('layouts.garam')

@section('title', 'CV. Banyu Mili - Produsen Garam Konsumsi Beryodium SNI Lampung Timur')

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
                    <div class="item active" data-bg="{{ asset('asset/images/ptgaram/slide-1.jpg') }}">
                        <div class="carousel-caption">
                            <div class="prelatife container">
                                <div class="bxsl_tx_fcs">
                                    <div class="texts text-left">
                                        <h2>PRODUSEN GARAM KONSUMSI BERYODIUM BERSTANDAR SNI CV. BANYU MILI</h2>
                                        <h4>Kualitas hidup yang lebih baik dimulai dari konsumsi garam konsumsi beryodium berkualitas pada keseharian keluarga anda</h4>
                                        <p>
                                            CV. Banyu Mili berlokasi di Desa Banjar Rejo, Kabupaten Lampung Timur. Kami berdedikasi memproduksi garam konsumsi beryodium berstandar SNI yang bermutu tinggi, higienis, bersih, dan menyehatkan bagi seluruh keluarga Indonesia.
                                        </p>
                                        <a href="{{ url('/tentang-kami') }}" class="btn btn-link btns_more_fcs">PELAJARI LEBIH LANJUT TENTANG KAMI</a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="item" data-bg="{{ asset('asset/images/ptgaram/slide-2.jpg') }}">
                        <div class="carousel-caption">
                            <div class="prelatife container">
                                <div class="bxsl_tx_fcs">
                                    <div class="texts text-left">
                                        <h2>GARAM KONSUMSI BERYODIUM BERMUTU TINGGI</h2>
                                        <h4>Standar pemurnian higienis dengan jaminan kandungan iodium sesuai SNI</h4>
                                        <p>
                                            Menghadirkan garam meja dan garam dapur beryodium berstandar SNI untuk keluarga Indonesia, diproduksi secara konsisten dengan pengawasan kualitas dan higienitas yang ketat di Lampung Timur.
                                        </p>
                                        <a href="{{ url('/produk') }}" class="btn btn-link btns_more_fcs">LIHAT KATALOG PRODUK GARAM</a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="item" data-bg="{{ asset('asset/images/ptgaram/slide-3.jpg') }}">
                        <div class="carousel-caption">
                            <div class="prelatife container">
                                <div class="bxsl_tx_fcs">
                                    <div class="texts text-left">
                                        <h2>PASOKAN GARAM KONSUMSI BERYODIUM TERPERCAYA</h2>
                                        <h4>Mitra terpercaya kebutuhan garam konsumsi bermutu tinggi untuk wilayah Lampung dan sekitarnya</h4>
                                        <p>
                                            CV. Banyu Mili siap melayani pasokan garam konsumsi beryodium SNI dengan pasokan stabil, kualitas teruji, dan layanan terbaik. Hubungi kontak kami di 08136906089.
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
    <h1 class="hidden hide">GARAM KONSUMSI BERYODIUM SNI CV BANYU MILI</h1>
    <section class="default_sc backs_homesection_1" id="home_c1">
        <div class="prelatife container">
            <div class="insides content-text text-center">
                <div class="top">
                    <h3 class="s_title">GARAM KONSUMSI BERYODIUM</h3>
                    <h4>Produk garam berkualitas berstandar SNI CV. Banyu Mili</h4>
                </div>

                <div class="lists_default_product_dt list_home">
                    <div class="row">
                        @if(isset($featuredProducts) && $featuredProducts->isNotEmpty())
                            @foreach($featuredProducts as $prod)
                                <div class="col-md-3 col-sm-6">
                                    <div class="items">
                                        <div class="pict">
                                            <a href="{{ url('/produk') }}">
                                                <img src="{{ $prod->image_url }}" alt="{{ $prod->name }}" class="img-responsive center-block" style="max-height: 200px; object-fit: contain; margin: 0 auto;">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h5 class="name">{{ $prod->name }}</h5>
                                            <span class="used">{{ $prod->category ?? 'GARAM KONSUMSI BERYODIUM' }}</span>
                                            <p>
                                                @if($prod->notes)
                                                    {{ Str::limit($prod->notes, 65) }}<br /><br />
                                                @endif
                                                @if($prod->packaging)
                                                    Produk garam ini tersedia dalam ukuran:<br />
                                                    {{ $prod->packaging }}
                                                @else
                                                    Kemasan standar: {{ $prod->weight_per_pack_gram }} gram
                                                @endif
                                            </p>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
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
                        @endif
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
                    <a href="{{ url('/industri#makanan') }}" class="items prelatife" style="display: block; cursor: pointer; text-decoration: none; color: inherit;">
                        <img src="{{ asset('asset/images/ptgaram/industry-food.jpg') }}" alt="Garam Industri Makanan" class="img-responsive">
                        <div class="ins_text">
                            <div class="inset info">
                                <span>Garam Industri Untuk</span>
                                <h3>Makanan</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Industry 2: Aneka Industri & Pabrik -->
                <div class="col-md-4 col-sm-6" style="padding: 0;">
                    <a href="{{ url('/industri#pabrik') }}" class="items prelatife" style="display: block; cursor: pointer; text-decoration: none; color: inherit;">
                        <img src="{{ asset('asset/images/ptgaram/industry-factory.jpg') }}" alt="Garam Industri Aneka Industri & Pabrik" class="img-responsive">
                        <div class="ins_text">
                            <div class="inset info">
                                <span>Garam Industri Untuk</span>
                                <h3>Aneka Industri & Pabrik</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Industry 3: Kolam Renang -->
                <div class="col-md-4 col-sm-6" style="padding: 0;">
                    <a href="{{ url('/industri#kolam-renang') }}" class="items prelatife" style="display: block; cursor: pointer; text-decoration: none; color: inherit;">
                        <img src="{{ asset('asset/images/ptgaram/industry-pool.jpg') }}" alt="Garam Industri Kolam Renang" class="img-responsive">
                        <div class="ins_text">
                            <div class="inset info">
                                <span>Garam Industri Untuk</span>
                                <h3>Kolam Renang</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Industry 4: Pengawetan -->
                <div class="col-md-4 col-sm-6" style="padding: 0;">
                    <a href="{{ url('/industri#pengawetan') }}" class="items prelatife" style="display: block; cursor: pointer; text-decoration: none; color: inherit;">
                        <img src="{{ asset('asset/images/ptgaram/industry-preservation.jpg') }}" alt="Garam Industri Pengawetan" class="img-responsive">
                        <div class="ins_text">
                            <div class="inset info">
                                <span>Garam Industri Untuk</span>
                                <h3>Pengawetan</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Industry 5: Pakan Ternak -->
                <div class="col-md-4 col-sm-6" style="padding: 0;">
                    <a href="{{ url('/industri#pakan-ternak') }}" class="items prelatife" style="display: block; cursor: pointer; text-decoration: none; color: inherit;">
                        <img src="{{ asset('asset/images/ptgaram/industry-livestock.jpg') }}" alt="Garam Industri Pakan Ternak" class="img-responsive">
                        <div class="ins_text">
                            <div class="inset info">
                                <span>Garam Industri Untuk</span>
                                <h3>Pakan Ternak</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Industry 6: Perawatan Tubuh -->
                <div class="col-md-4 col-sm-6" style="padding: 0;">
                    <a href="{{ url('/industri#perawatan-tubuh') }}" class="items prelatife" style="display: block; cursor: pointer; text-decoration: none; color: inherit;">
                        <img src="{{ asset('asset/images/ptgaram/industry-spa.jpg') }}" alt="Garam Industri Perawatan Tubuh" class="img-responsive">
                        <div class="ins_text">
                            <div class="inset info">
                                <span>Garam Industri Untuk</span>
                                <h3>Perawatan Tubuh</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Pilar Penopang Usaha Garam -->
    <section class="default_sc blocks_bottoms_about_pillarns" id="about_c2">
        <div class="prelatife container">
            <div class="insides content-text text-center">
                <h2>Pilar penopang usaha garam<br />CV. Banyu Mili</h2>
                <div class="clear height-50"></div>
                <div class="lists_icons_pillars_def">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="items">
                                <div class="pict" style="margin-bottom: 20px;">
                                    <img src="{{ asset('asset/images/ptgaram/icons-pilars-1.jpg') }}" alt="Peladang Garam" class="img-responsive center-block">
                                </div>
                                <div class="info">
                                    <span>PELADANG GARAM</span>
                                    <p>SUMBER KAMI</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="items">
                                <div class="pict" style="margin-bottom: 20px;">
                                    <img src="{{ asset('asset/images/ptgaram/icons-pilars-2.jpg') }}" alt="Sumber Daya Manusia" class="img-responsive center-block">
                                </div>
                                <div class="info">
                                    <span>SUMBER DAYA MANUSIA</span>
                                    <p>KEKUATAN KAMI</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="items">
                                <div class="pict" style="margin-bottom: 20px;">
                                    <img src="{{ asset('asset/images/ptgaram/icons-pilars-3.jpg') }}" alt="Mutu Kualitas Terbaik" class="img-responsive center-block">
                                </div>
                                <div class="info">
                                    <span>MUTU KUALITAS TERBAIK</span>
                                    <p>KENDARAAN KAMI</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="items">
                                <div class="pict" style="margin-bottom: 20px;">
                                    <img src="{{ asset('asset/images/ptgaram/icons-pilars-4.jpg') }}" alt="Kepuasan Konsumen" class="img-responsive center-block">
                                </div>
                                <div class="info">
                                    <span>KEPUASAN KONSUMEN</span>
                                    <p>DESTINASI KAMI</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
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
                    @if(isset($latestArticles) && $latestArticles->isNotEmpty())
                        @foreach($latestArticles as $art)
                            <div class="items">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <span class="dates">{{ optional($art->published_at)->format('d / m / Y') ?? date('d / m / Y') }}</span>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <p><a href="{{ url('/berita/' . $art->slug) }}" style="color: inherit; text-decoration: none;">{{ $art->title }}</a></p>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="text-right">
                                            <div class="links_more_news">
                                                <a href="{{ url('/berita/' . $art->slug) }}"><img src="{{ asset('asset/images/backs_btn_icons_sq_blue.png') }}" alt="Baca Berita" class="img-responsive"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
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
                    @endif
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