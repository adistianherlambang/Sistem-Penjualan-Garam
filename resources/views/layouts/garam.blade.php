<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Pabrik Garam Industri & Konsumsi CV. Banyu Mili')</title>

    <meta name="language" content="id" />
    <meta name="keywords" content="Pabrik Garam Industri & Konsumsi CV. Banyu Mili, Garam Beryodium, Garam Konsumsi, Garam Industri, Garam Halus, Garam Kasar">
    <meta name="description" content="CV. Banyu Mili adalah Pabrik Garam Industri berkualitas yang berdedikasi melayani pelanggan dengan memberikan produk dan layanan terbaik.">

    <link rel="icon" type="image/png" href="{{ asset('asset/images/favicon.png') }}" />

    <!-- Google Fonts: Rubik & Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:wght@300;400;500;700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <!-- Bootstrap 3 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/js/bootstrap-3/css/bootstrap.min.css') }}" />

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/font-awesome-4.2.0/css/font-awesome.min.css') }}" />

    <!-- Core Stylesheets from garam.co.id -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/screen.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/comon.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.deory.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/pager.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/media.style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/animate.css') }}" />

    <!-- jQuery & Bootstrap Scripts -->
    <script type="text/javascript" src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/bootstrap-3/js/bootstrap.js') }}"></script>

    <style>
        body { font-family: Rubik, sans-serif; }
        .head .in_header { padding-top: 15px; }
        .menu-sheader-datals ul li a { font-size: 24px; font-weight: 500; }
        .header-affixs { position: fixed; top: -100px; transition: top 0.3s ease; }
        .header-affixs.affix { top: 0 !important; visibility: visible !important; }
        .bxsl_tx_fcs h2 { font-weight: 700; text-shadow: 0 2px 10px rgba(0,0,0,0.6); }
        .bxsl_tx_fcs h4 { font-family: 'Playfair Display', serif; font-size: 26px; line-height: 1.3; text-shadow: 0 2px 8px rgba(0,0,0,0.6); margin-bottom: 20px; color: #fff; }
        .bxsl_tx_fcs p { font-size: 16px; line-height: 1.6; text-shadow: 0 2px 6px rgba(0,0,0,0.6); margin-bottom: 25px; }
        .btns_more_fcs { background: #003ea9; color: #fff !important; padding: 12px 28px; font-weight: 600; text-decoration: none !important; display: inline-block; letter-spacing: 1px; }
        .btns_more_fcs:hover { background: #002d7a; color: #fff !important; }
        .carousel.fade .item { height: 100vh; min-height: 550px; background-size: cover; background-position: center center; }
        .carousel.fade .item::before { content: ""; position: absolute; top:0; left:0; right:0; bottom:0; background: rgba(10, 30, 60, 0.45); }
        .carousel-caption { bottom: 20%; z-index: 10; }
        .block_list_used_sals_defHome .items img { width: 100%; height: 380px; object-fit: cover; }
        .lists_default_product_dt .items .pict img { width: 100%; height: 260px; object-fit: cover; border-radius: 4px; }
        .staff-login-link { display: inline-block; margin-left: 15px; padding: 6px 14px; background: #003ea9; color: #fff !important; border-radius: 3px; font-size: 13px; font-weight: 600; text-transform: uppercase; }
        .staff-login-link:hover { background: #002d7a; text-decoration: none; }
        .btn_blue_def { background-color: #003ea9; color: #fff; border: 0; padding: 12px 26px; font-weight: 600; text-transform: uppercase; display: inline-block; }
        .btn_blue_def:hover { background-color: #002d7a; color: #fff; text-decoration: none; }
    </style>
    @stack('styles')
</head>
<body>

<div class="outers_back_headers">
  <header class="head">
    <div class="visible-lg visible-md">
      <div class="in_header">
        <div class="prelatife container">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="d-inline lgo_webHeaders">
                <a href="{{ url('/') }}"><img src="{{ asset('asset/images/logo_webs_header.png') }}" alt="CV. Banyu Mili" class="img-responsive"></a>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="text-right rights_block_topRght_menu" style="margin-top: 15px;">
                <a href="javascript:;" class="nav_showMenu showmenu_barresponsive" title="Buka Menu"></a>
                <div class="clear"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="visible-sm visible-xs">
      <nav class="navbar navbar-default" style="background: rgba(0, 62, 169, 0.95); border: none; border-radius: 0;">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="border-color: #fff;">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar" style="background-color: #fff;"></span>
              <span class="icon-bar" style="background-color: #fff;"></span>
              <span class="icon-bar" style="background-color: #fff;"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
              <img src="{{ asset('asset/images/logo_webs_header_res.png') }}" alt="CV. Banyu Mili" class="img-responsive" style="max-height: 40px; filter: brightness(0) invert(1);">
            </a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ url('/') }}" style="color:#fff;">HOME</a></li>
              <li><a href="{{ url('/produk') }}" style="color:#fff;">GARAM BANYU MILI</a></li>
              <li><a href="{{ url('/tentang-kami') }}" style="color:#fff;">TENTANG KAMI</a></li>
              <li><a href="{{ url('/industri') }}" style="color:#fff;">INDUSTRI</a></li>
              <li><a href="{{ url('/berita') }}" style="color:#fff;">BERITA & ARTIKEL</a></li>
              <li><a href="{{ url('/kontak') }}" style="color:#fff;">HUBUNGI KAMI</a></li>
              <li><a href="{{ route('login') }}" style="color:#ffdd59; font-weight: bold;"><i class="fa fa-lock"></i> LOGIN OPERASIONAL</a></li>
            </ul>
            <div class="clear height-10"></div>
          </div>
        </div>
      </nav>
      <div class="clear"></div>
    </div>

    <div class="clear"></div>
  </header>
</div>

<!-- Sticky Affix Navbar -->
<section id="myAffix" class="header-affixs affix-top">
  <div class="clear height-5"></div>
  <div class="prelatife container">
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="lgo-web-web_affix" style="margin-top: 10px;">
          <a href="{{ url('/') }}">
            <img src="{{ asset('asset/images/logo_webs_header_res.png') }}" alt="CV. Banyu Mili" class="img-responsive d-inline">
          </a>
        </div>
      </div>
      <div class="col-md-9 col-sm-9">
        <div class="text-right"> 
          <div class="clear height-20"></div>
          <div class="menu-taffix">
            <ul class="list-inline">
              <li><a href="{{ url('/') }}">HOME</a></li>
              <li><a href="{{ url('/produk') }}">GARAM BANYU MILI</a></li>
              <li><a href="{{ url('/tentang-kami') }}">TENTANG KAMI</a></li>
              <li><a href="{{ url('/industri') }}">INDUSTRI</a></li>
              <li><a href="{{ url('/berita') }}">BERITA & ARTIKEL</a></li>
              <li><a href="{{ url('/kontak') }}">HUBUNGI KAMI</a></li>
              <li><a href="{{ route('login') }}" class="staff-login-link"><i class="fa fa-lock"></i> LOGIN</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</section>

<!-- Full-screen Slide Overlay Menu -->
<div class="outer-blok-black-menuresponss-hides">
  <div class="prelatife container">
    <div class="clear height-45"></div>
    <div class="fright">
      <div class="hidesmenu-frightd"><a href="javascript:;" class="closemrespobtn"><img src="{{ asset('asset/images/back-bt-shidemenuw.png') }}" alt="Tutup Menu"></a></div>
    </div>
    <div class="clear height-50"></div><div class="height-30"></div>
    <div class="menu-sheader-datals">
      <ul class="list-unstyled">
        <li><a href="{{ url('/') }}">HOME</a></li>
        <li><a href="{{ url('/produk') }}">GARAM BANYU MILI</a></li>
        <li><a href="{{ url('/tentang-kami') }}">TENTANG KAMI</a></li>
        <li><a href="{{ url('/industri') }}">INDUSTRI</a></li>
        <li><a href="{{ url('/berita') }}">BERITA & ARTIKEL</a></li>
        <li><a href="{{ url('/kontak') }}">HUBUNGI KAMI</a></li>
        <li style="margin-top: 20px;"><a href="{{ route('login') }}" style="color: #ffdd59; font-size: 20px;"><i class="fa fa-lock"></i> MASUK SISTEM OPERASIONAL</a></li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>

<div class="clear"></div>

<!-- Main Content Yield -->
@yield('content')

<!-- Footer -->
<footer class="foot">
	<div class="prelatife container"> 
		<div class="clear height-50"></div>

		<div class="insides_footer">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="sub_ftr">
						<ul class="list-unstyled">
							<li><a href="{{ url('/') }}">HOME</a></li>
							<li><a href="{{ url('/produk') }}">GARAM BANYU MILI</a></li>
							<li><a href="{{ url('/tentang-kami') }}">TENTANG KAMI</a></li>
							<li><a href="{{ url('/industri') }}">INDUSTRI</a></li>
							<li><a href="{{ url('/berita') }}">BERITA & ARTIKEL</a></li>
							<li><a href="{{ url('/kontak') }}">HUBUNGI KAMI</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="sub_ftr bloc_address">
						<div class="bc_address">
							<span>FACTORY & OFFICE</span>
							<address>
							Jl. Kalianak Barat Nomer 60<br>
							Kota Surabaya, Jawa Timur 60183.<br>
							Indonesia.
							</address>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="sub_ftr">
						<span>OUR HOTLINE</span>
						<div class="clear"></div>
						<dl class="dl-horizontal">
              <dd>
                <ul>
                  <li><a href="https://wa.me/6285100477522" target="_blank">Layanan +62 851-0047-7522</a></li>
                  <li><a href="https://wa.me/628113181167" target="_blank">Pemasaran +62 811-3181-167</a></li>
                  <li><a href="https://wa.me/62811984376" target="_blank">Industri +62 811-984-376</a></li>
                  <li><a href="https://wa.me/6283854734316" target="_blank">Distribusi +62 838-5473-4316</a></li>
                  <li><a href="https://wa.me/6281333370415" target="_blank">Kemitraan +62 813-3337-0415</a></li>
                </ul>
              </dd>
						  <div class="clear"></div>
						  <dt><i class="fa fa-envelope"></i></dt>
						  <dd><a href="mailto:info@banyumili.co.id">INFO@PTGARAM.CO.ID</a></dd>
						  <div class="clear"></div>
						</dl>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
						<div class="sub_ftr socmed_footer">
							<span>OUR SOCIAL MEDIA</span>
							<div class="clear"></div>
							<a target="_blank" href="https://instagram.com" title="Instagram"><i class="fa fa-instagram"></i></a>&nbsp;&nbsp;
							<a target="_blank" href="https://facebook.com" title="Facebook"><i class="fa fa-facebook-square"></i></a>
						</div>
				</div>
			</div>
			<div class="clear height-10"></div>
			<div class="clear"></div>
		</div>
	</div>

	<div class="back-cream">
			<div class="lines_grey"></div>
			<div class="clear height-15"></div>

		<div class="prelatife container">
			<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="t-copyrights">Copyright &copy; {{ date('Y') }}, CV BANYU MILI - Garam Meja, garam konsumsi berkualitas sejak 1970.
					<br><small>Portal Resmi & Sistem Manajemen CV. Banyu Mili.</small>
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
					<div class="lgo_footers text-right">
						<a href="{{ url('/') }}"><img src="{{ asset('asset/images/logo_webs_footernl.png') }}" alt="CV. Banyu Mili" class="img-responsive"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<!-- Floating WhatsApp Action -->
<div class="float_callwa_contact">
	<a target="_blank" href="https://wa.me/628113181167?text=Halo%20CV%20BANYU%20MILI,%20saya%20ingin%20mendapatkan%20informasi%20mengenai%20produk%20garam%20dan%20kerjasama." title="Hubungi Kami via WhatsApp">
    <img src="{{ asset('asset/images/whatsapp-512.png') }}" alt="WhatsApp Contact" class="img img-responsive">
  </a>
</div>

<!-- Back to Top Button -->
<div id="back-top" class="t-backtop">
  <div class="clear height-5"></div>
  <a href="#top" title="Kembali ke atas"><i class="fa fa-chevron-up"></i></a>
</div>

<script type="text/javascript">
$(function(){
  // Menu Overlay Toggle
  $(document).on('click', 'a.showmenu_barresponsive', function(e) {
    e.preventDefault();
    $('.outer-blok-black-menuresponss-hides').slideDown(350);
  });
  $(document).on('click', 'a.closemrespobtn', function(e) {
    e.preventDefault();
    $('.outer-blok-black-menuresponss-hides').slideUp(250);
  });

  // Sticky Navbar Scroll
  var $affix = $('#myAffix');
  var $win = $(window);
  var $backTop = $('#back-top');

  function checkScroll() {
    var top = $win.scrollTop();
    if (top > 400) {
      $affix.addClass('affix').removeClass('affix-top');
      $backTop.fadeIn(200);
    } else {
      $affix.removeClass('affix').addClass('affix-top');
      $backTop.fadeOut(200);
    }
  }

  $win.on('scroll', checkScroll);
  checkScroll();

  $backTop.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 600);
  });
});
</script>
@stack('scripts')
</body>
</html>
