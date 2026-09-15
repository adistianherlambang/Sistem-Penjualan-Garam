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
        body {
            font-family: Rubik, sans-serif;
            padding-top: 75px !important;
        }

        /* Fixed Top Navigation Bar */
        .main-header-navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 75px;
            background-color: #ffffff;
            border-bottom: 3px solid #19387e;
            z-index: 10000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .main-header-navbar .lgo-web-brand {
            margin-top: 8px;
            max-width: 280px;
        }

        .main-header-navbar .lgo-web-brand img {
            max-height: 58px;
            width: auto;
            display: inline-block;
        }

        .main-header-navbar .menu-taffix {
            text-align: right;
            padding-top: 15px;
        }

        .main-header-navbar .menu-taffix ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: inline-block;
        }

        .main-header-navbar .menu-taffix ul li {
            display: inline-block;
            padding: 5px 10px;
        }

        .main-header-navbar .menu-taffix ul li a {
            font-size: 14px;
            font-weight: 600;
            color: #353535;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: color 0.2s ease;
            position: relative;
            padding-bottom: 4px;
        }

        .main-header-navbar .menu-taffix ul li a:hover,
        .main-header-navbar .menu-taffix ul li.active a {
            color: #003ea9;
            text-decoration: none;
        }

        .main-header-navbar .menu-taffix ul li.active a::after,
        .main-header-navbar .menu-taffix ul li a:hover::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #003ea9;
        }

        .staff-login-btn {
            display: inline-block !important;
            margin-left: 12px;
            padding: 7px 16px !important;
            background: #003ea9 !important;
            color: #ffffff !important;
            border-radius: 4px;
            font-size: 12px !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 6px rgba(0, 62, 169, 0.3);
            transition: all 0.2s ease !important;
        }

        .staff-login-btn::after {
            display: none !important;
        }

        .staff-login-btn:hover {
            background: #002d7a !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(0, 62, 169, 0.4);
            transform: translateY(-1px);
        }

        .nav-burger-btn {
            display: inline-block;
            margin-left: 10px;
            vertical-align: middle;
            background: #f0f4fc;
            padding: 8px 10px;
            border-radius: 4px;
            cursor: pointer;
            color: #003ea9;
            font-size: 16px;
            border: 1px solid #d0e0fc;
            transition: all 0.2s ease;
        }

        .nav-burger-btn:hover {
            background: #003ea9;
            color: #fff;
        }

        /* Mobile navbar header */
        .mobile-header-bar {
            display: none;
            background: #ffffff;
            border-bottom: 3px solid #19387e;
            padding: 10px 15px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10000;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        @media (max-width: 991px) {
            .main-header-navbar { display: none; }
            .mobile-header-bar { display: block; }
            body { padding-top: 65px !important; }
        }

        /* Fullscreen slide overlay menu */
        .outer-blok-black-menuresponss-hides {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999999;
            background-color: rgba(0, 62, 169, 0.97);
            width: 100%;
            height: 100%;
            overflow-y: auto;
        }

        .menu-sheader-datals ul li a {
            font-size: 22px;
            font-weight: 500;
            color: #fff;
            padding: 10px 0;
            display: inline-block;
            transition: color 0.2s ease;
        }

        .menu-sheader-datals ul li a:hover {
            color: #ffdd59;
            text-decoration: none;
        }

        /* Hero Carousel & Typography */
        .bxsl_tx_fcs h2 { font-weight: 700; text-shadow: 0 2px 10px rgba(0,0,0,0.6); }
        .bxsl_tx_fcs h4 { font-family: 'Playfair Display', serif; font-size: 26px; line-height: 1.3; text-shadow: 0 2px 8px rgba(0,0,0,0.6); margin-bottom: 20px; color: #fff; }
        .bxsl_tx_fcs p { font-size: 16px; line-height: 1.6; text-shadow: 0 2px 6px rgba(0,0,0,0.6); margin-bottom: 25px; }
        .btns_more_fcs { background: #003ea9; color: #fff !important; padding: 12px 28px; font-weight: 600; text-decoration: none !important; display: inline-block; letter-spacing: 1px; }
        .btns_more_fcs:hover { background: #002d7a; color: #fff !important; }
        .carousel.fade .item { height: calc(100vh - 75px); min-height: 550px; background-size: cover; background-position: center center; }
        .carousel.fade .item::before { content: ""; position: absolute; top:0; left:0; right:0; bottom:0; background: rgba(10, 30, 60, 0.45); }
        .carousel-caption { bottom: 18%; z-index: 10; }
        .block_list_used_sals_defHome .items img { width: 100%; height: 380px; object-fit: cover; }
        .lists_default_product_dt .items .pict img { width: 100%; height: 260px; object-fit: cover; border-radius: 4px; }
        .btn_blue_def { background-color: #003ea9; color: #fff; border: 0; padding: 12px 26px; font-weight: 600; text-transform: uppercase; display: inline-block; }
        .btn_blue_def:hover { background-color: #002d7a; color: #fff; text-decoration: none; }
    </style>
    @stack('styles')
</head>
<body>

<!-- Desktop Top Navigation Bar (Always Visible at Top & Sticky) -->
<header class="main-header-navbar visible-lg visible-md">
  <div class="prelatife container">
    <div class="row">
      <div class="col-md-3 col-lg-3">
        <div class="lgo-web-brand">
          <a href="{{ url('/') }}">
            <img src="{{ asset('asset/images/logo_webs_header_res.png') }}" alt="CV BANYU MILI" class="img-responsive">
          </a>
        </div>
      </div>
      <div class="col-md-9 col-lg-9">
        <div class="menu-taffix">
          <ul class="list-inline">
            <li class="{{ Request::is('/') || Request::is('home/index') ? 'active' : '' }}"><a href="{{ url('/') }}">HOME</a></li>
            <li class="{{ Request::is('produk') || Request::is('home/productlanding') ? 'active' : '' }}"><a href="{{ url('/produk') }}">GARAM BANYU MILI</a></li>
            <li class="{{ Request::is('tentang-kami') || Request::is('home/about') ? 'active' : '' }}"><a href="{{ url('/tentang-kami') }}">TENTANG KAMI</a></li>
            <li class="{{ Request::is('industri') || Request::is('home/industry') ? 'active' : '' }}"><a href="{{ url('/industri') }}">INDUSTRI</a></li>
            <li class="{{ Request::is('berita') || Request::is('blog*') ? 'active' : '' }}"><a href="{{ url('/berita') }}">BERITA & ARTIKEL</a></li>
            <li class="{{ Request::is('kontak') || Request::is('home/contact') ? 'active' : '' }}"><a href="{{ url('/kontak') }}">HUBUNGI KAMI</a></li>
            <li><a href="{{ route('login') }}" class="staff-login-btn"><i class="fa fa-lock"></i> LOGIN</a></li>
            <li><a href="javascript:;" class="nav-burger-btn showmenu_barresponsive" title="Buka Menu Lengkap"><i class="fa fa-bars"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Mobile Navigation Bar -->
<div class="mobile-header-bar visible-sm visible-xs">
  <div class="container-fluid">
    <div class="row" style="display: flex; align-items: center;">
      <div class="col-xs-8">
        <a href="{{ url('/') }}">
          <img src="{{ asset('asset/images/logo_webs_header_res.png') }}" alt="CV BANYU MILI" style="max-height: 45px; width: auto;">
        </a>
      </div>
      <div class="col-xs-4 text-right">
        <button type="button" class="btn btn-default showmenu_barresponsive" style="background: #003ea9; color: #fff; border: 0; padding: 8px 14px; border-radius: 4px;">
          <i class="fa fa-bars" style="font-size: 18px;"></i>
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Full-screen Slide Overlay Menu -->
<div class="outer-blok-black-menuresponss-hides">
  <div class="prelatife container">
    <div class="clear height-45"></div>
    <div class="fright">
      <div class="hidesmenu-frightd"><a href="javascript:;" class="closemrespobtn" style="color: #fff; font-size: 30px;"><i class="fa fa-times"></i></a></div>
    </div>
    <div class="clear height-50"></div><div class="height-30"></div>
    <div class="menu-sheader-datals text-center">
      <div style="margin-bottom: 30px;">
        <img src="{{ asset('asset/images/logo_webs_footernl.png') }}" alt="CV BANYU MILI" style="max-height: 60px;">
      </div>
      <ul class="list-unstyled">
        <li><a href="{{ url('/') }}">HOME</a></li>
        <li><a href="{{ url('/produk') }}">GARAM BANYU MILI</a></li>
        <li><a href="{{ url('/tentang-kami') }}">TENTANG KAMI</a></li>
        <li><a href="{{ url('/industri') }}">INDUSTRI</a></li>
        <li><a href="{{ url('/berita') }}">BERITA & ARTIKEL</a></li>
        <li><a href="{{ url('/kontak') }}">HUBUNGI KAMI</a></li>
        <li style="margin-top: 25px;"><a href="{{ route('login') }}" style="color: #ffdd59; font-size: 20px; font-weight: 700;"><i class="fa fa-lock"></i> MASUK SISTEM OPERASIONAL</a></li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
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
						  <dd><a href="mailto:info@banyumili.co.id">INFO@BANYUMILI.CO.ID</a></dd>
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
						<a href="{{ url('/') }}"><img src="{{ asset('asset/images/logo_webs_footernl.png') }}" alt="CV BANYU MILI" class="img-responsive"></a>
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
  $(document).on('click', '.showmenu_barresponsive', function(e) {
    e.preventDefault();
    $('.outer-blok-black-menuresponss-hides').fadeIn(250);
  });
  $(document).on('click', '.closemrespobtn', function(e) {
    e.preventDefault();
    $('.outer-blok-black-menuresponss-hides').fadeOut(200);
  });

  // Sticky Navbar shadow effect on scroll
  var $navbar = $('.main-header-navbar');
  var $win = $(window);
  var $backTop = $('#back-top');

  function handleScroll() {
    var top = $win.scrollTop();
    if (top > 50) {
      $navbar.css('box-shadow', '0 4px 20px rgba(0, 0, 0, 0.12)');
      $backTop.fadeIn(200);
    } else {
      $navbar.css('box-shadow', '0 2px 10px rgba(0, 0, 0, 0.08)');
      $backTop.fadeOut(200);
    }
  }

  $win.on('scroll', handleScroll);
  handleScroll();

  $backTop.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 600);
  });
});
</script>
@stack('scripts')
</body>
</html>
