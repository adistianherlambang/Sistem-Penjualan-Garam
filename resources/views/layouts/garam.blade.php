<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Pabrik Garam Industri & Konsumsi CV. Banyu Mili')</title>

    <meta name="language" content="id" />
    <meta name="keywords" content="Pabrik Garam Industri & Konsumsi CV. Banyu Mili Surabaya, Garam Beryodium, Garam Konsumsi, Garam Industri, Garam Halus, Garam Kasar">
    <meta name="description" content="CV. Banyu Mili adalah Pabrik Garam Industri berkualitas yang berdedikasi melayani pelanggan dengan memberikan produk dan layanan terbaik.">

    <link rel="Shortcut Icon" href="{{ asset('asset/images/favicon.png') }}" />
    <link rel="icon" type="image/ico" href="{{ asset('asset/images/favicon.png') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/images/favicon.png') }}" />

    <!-- Google Fonts: Rubik & Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:wght@300;400;500;700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <!-- Stylesheets from garam.co.id -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/screen.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/comon.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/font-awesome-4.2.0/css/font-awesome.min.css') }}" />

    <!-- Bootstrap 3 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/js/bootstrap-3/css/bootstrap.min.css') }}" />
    <script type="text/javascript" src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/bootstrap-3/js/bootstrap.js') }}"></script>

    <!-- Custom Css from garam.co.id -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.deory.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/pager.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/media.style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/animate.css') }}" />

    <style>
        /* Exact dimensions & image treatments matching garam.co.id */
        .block_list_used_sals_defHome .items img { width: 100%; height: 380px; object-fit: cover; }
        .lists_default_product_dt .items .pict img { width: 100%; height: 260px; object-fit: cover; }
        .carousel.fade .item { height: 100vh; min-height: 550px; background-size: cover; background-position: center center; }
        .carousel.fade .item::before { content: ""; position: absolute; top:0; left:0; right:0; bottom:0; background: rgba(10, 30, 60, 0.45); }
        .carousel-caption { bottom: 20%; z-index: 10; }
        .bxsl_tx_fcs h2 { font-weight: 700; text-shadow: 0 2px 10px rgba(0,0,0,0.6); }
        .bxsl_tx_fcs h4 { font-family: 'Playfair Display', serif; font-size: 26px; line-height: 1.3; text-shadow: 0 2px 8px rgba(0,0,0,0.6); margin-bottom: 20px; color: #fff; }
        .bxsl_tx_fcs p { font-size: 16px; line-height: 1.6; text-shadow: 0 2px 6px rgba(0,0,0,0.6); margin-bottom: 25px; }
        .btns_more_fcs { background: #003ea9; color: #fff !important; padding: 12px 28px; font-weight: 600; text-decoration: none !important; display: inline-block; letter-spacing: 1px; }
        .btns_more_fcs:hover { background: #002d7a; color: #fff !important; }
        .btn_blue_def { background-color: #003ea9; color: #fff; border: 0; padding: 12px 26px; font-weight: 600; text-transform: uppercase; display: inline-block; }
        .btn_blue_def:hover { background-color: #002d7a; color: #fff; text-decoration: none; }
    </style>
    @stack('styles')
</head>
<body>

<!-- Top Header Outers (Identical to garam.co.id) -->
<div class="outers_back_headers">
  <header class="head">
    <div class="visible-lg visible-md">
      <div class="in_header">
        <div class="prelatife container">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="d-inline lgo_webHeaders">
                <a href="{{ url('/') }}"><img src="{{ asset('asset/images/logo_webs_header.png') }}" alt="CV BANYU MILI" class="img-responsive"></a>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="text-right rights_block_topRght_menu">
                <a href="javascript:;" class="nav_showMenu showmenu_barresponsive" title="Buka Menu"></a>
                <div class="clear"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="visible-sm visible-xs">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
              <img src="{{ asset('asset/images/logo_webs_header_res.png') }}" alt="CV BANYU MILI" class="img-responsive">
            </a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li class="{{ Request::is('/') || Request::is('home/index') ? 'active' : '' }}"><a href="{{ url('/') }}">HOME</a></li>
              <li class="{{ Request::is('produk') || Request::is('home/productlanding') ? 'active' : '' }}"><a href="{{ url('/produk') }}">GARAM BANYU MILI</a></li>
              <li class="{{ Request::is('tentang-kami') || Request::is('home/about') ? 'active' : '' }}"><a href="{{ url('/tentang-kami') }}">TENTANG KAMI</a></li>
              <li class="{{ Request::is('industri') || Request::is('home/industry') ? 'active' : '' }}"><a href="{{ url('/industri') }}">INDUSTRI</a></li>
              <li class="{{ Request::is('berita') || Request::is('blog*') || Request::is('home/blogs') ? 'active' : '' }}"><a href="{{ url('/berita') }}">BERITA & ARTIKEL</a></li>
              <li class="{{ Request::is('kontak') || Request::is('home/contact') ? 'active' : '' }}"><a href="{{ url('/kontak') }}">HUBUNGI KAMI</a></li>
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

<!-- Sticky Affix Navigation Bar (Identical to garam.co.id) -->
<script type="text/javascript">
    $(function(){
      var widths = $(window).width();
      if (widths > 1024){
        $('#myAffix').affix({
          offset: {
            top: 500
          }
        });
      }else{
        $('section#myAffix').hide();
      }
    });
</script>

<section id="myAffix" class="header-affixs affix-top">
  <div class="clear height-5"></div>
  <div class="prelatife container">
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="lgo-web-web_affix">
          <a href="{{ url('/') }}">
            <img src="{{ asset('asset/images/logo_webs_header_res.png') }}" alt="CV BANYU MILI" class="img-responsive d-inline">
          </a>
        </div>
      </div>
      <div class="col-md-9 col-sm-9">
        <div class="text-right"> 
          <div class="clear height-20"></div>
          <div class="menu-taffix">
            <ul class="list-inline">
              <li class="{{ Request::is('/') || Request::is('home/index') ? 'active' : '' }}"><a href="{{ url('/') }}">HOME</a></li>
              <li class="{{ Request::is('produk') || Request::is('home/productlanding') ? 'active' : '' }}"><a href="{{ url('/produk') }}">GARAM BANYU MILI</a></li>
              <li class="{{ Request::is('tentang-kami') || Request::is('home/about') ? 'active' : '' }}"><a href="{{ url('/tentang-kami') }}">TENTANG KAMI</a></li>
              <li class="{{ Request::is('industri') || Request::is('home/industry') ? 'active' : '' }}"><a href="{{ url('/industri') }}">INDUSTRI</a></li>
              <li class="{{ Request::is('berita') || Request::is('blog*') || Request::is('home/blogs') ? 'active' : '' }}"><a href="{{ url('/berita') }}">BERITA & ARTIKEL</a></li>
              <li class="{{ Request::is('kontak') || Request::is('home/contact') ? 'active' : '' }}"><a href="{{ url('/kontak') }}">HUBUNGI KAMI</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</section>

<!-- Fullscreen Responsive Menu Overlay (Identical to garam.co.id) -->
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
      </ul>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>

<script type="text/javascript">
  $(function(){
    // show and hide menu responsive
    $(document).on('click', 'a.showmenu_barresponsive', function() {
      $('.outer-blok-black-menuresponss-hides').slideToggle('slow');
      return false;
    });
    $(document).on('click', 'a.closemrespobtn', function() {
      $('.outer-blok-black-menuresponss-hides').slideUp('slow');
      return false;
    });
  });
</script>

<div class="clear"></div>

<!-- Main Content Yield -->
@yield('content')

<!-- Footer (Identical to garam.co.id) -->
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
					<br><small>Portal Resmi & Sistem Informasi CV BANYU MILI.</small>
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
function initDataBg() {
  $('[data-bg]').each(function(){
    var bg = $(this).attr('data-bg');
    if (bg) {
      $(this).css('background-image', 'url(' + bg + ')');
    }
  });
}
$(document).ready(initDataBg);
initDataBg();

$(function(){
  var $win = $(window);
  var $backTop = $('#back-top');

  $win.scroll(function () {
    if ($win.scrollTop() == 0) {
      $backTop.hide();
    } else if ($win.height() + $win.scrollTop() != $(document).height() || $win.height() + $win.scrollTop() > 500) {
      $backTop.show();
    }
  });

  $backTop.on('click', function (e) {
    e.preventDefault();
    $('body,html').animate({
      scrollTop: 0
    }, 800);
    return false;
  });
});
</script>
@stack('scripts')
</body>
</html>
