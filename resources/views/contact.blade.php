@extends('layouts.garam')

@section('title', 'Hubungi Kami - CV. Banyu Mili Garam Konsumsi Beryodium SNI Lampung Timur')

@section('content')
<section class="illutration_inside_page_top pg_industri prelatife" data-bg="{{ asset('asset/images/ptgaram/about-hero.jpg') }}">
  <div class="blocks_int_bottom">
    <div class="prelatife container">
      <div class="ins_text">
        <h1 class="hide hidden">Contact Us - CV. Banyu Mili Garam Konsumsi Beryodium SNI Lampung Timur</h1>
        <h3 class="c_title">HUBUNGI KAMI</h3>
        <h4>Tim layanan pelanggan kami akan<br />
selalu siap membantu anda.</h4>
        <div class="clear divider"></div>
        <div class="tsn_g_bottom"><a href="#"><img src="{{ asset('asset/images/b_icons_gt_bottom.png') }}" alt="" class="img-responsive center-block"></a></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>

<div class="inside_page">
  <section class="default_sc back-white blocks_section_about_c1 page_contact" id="contact_c1">
    <div class="prelatife container">
      <div class="insides content-text prelatife text-center">
        <div class="clear height-25"></div>
        <div class="tops_info">
          <p>
            Hotline Layanan & Pemasaran: <strong><a href="tel:08136906089" style="color: #003ea9; font-size: 24px;">08136906089</a></strong>
          </p>
          <p>
            WhatsApp Resmi: <strong><a href="https://wa.me/628136906089" target="_blank" style="color: #128c7e; font-size: 18px;"><i class="fa fa-whatsapp"></i> Chat WhatsApp (08136906089)</a></strong>
          </p>
          <p>
            Email: <a href="mailto:info@banyumili.co.id"><strong>info@banyumili.co.id</strong></a>
          </p>
          <div class="clear"></div>
        </div>

        <div class="clear height-50"></div>
        <div class="clear height-30"></div>
        <div class="middles_info">
          <div class="row">
            <div class="col-md-6">
              <div class="item">
                <img src="{{ asset('asset/images/ptgaram/about-facility-1.jpg') }}" alt="" class="img-responsive center-block">
                <div class="clear height-45"></div>
                <h2>KANTOR & LAYANAN</h2>
                <address>Desa Banjar Rejo<br />
Kabupaten Lampung Timur, Lampung, Indonesia.<br />
Telepon / WhatsApp:<br />
<a href="tel:08136906089"><strong>08136906089</strong></a><br />
Email: <a href="mailto:info@banyumili.co.id">info@banyumili.co.id</a></address>
                <div class="clear"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="item">
                <img src="{{ asset('asset/images/ptgaram/about-facility-2.jpg') }}" alt="" class="img-responsive center-block">
                <div class="clear height-45"></div>
                <h2>PABRIK PENGOLAHAN</h2>
                <address>Desa Banjar Rejo<br />
Kabupaten Lampung Timur, Lampung, Indonesia.<br />
Fasilitas Pemurnian & Pengemasan Garam Konsumsi Beryodium SNI</address>
                <div class="clear"></div>
              </div>
            </div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear height-30"></div>


        <div class="clear"></div>
      </div>
    </div>
  </section>

  <div class="clear"></div>
</div>



    <script type="text/javascript">
	$(function(){
		var swidth = $(window).width();
		if (swidth <= 767){
		$(
			'section.illutration_inside_page_top .blocks_int_bottom .ins_text h4, section.default_sc.blocks_section_about_c1.industry_cont_1#industry_c1 .insides h2, section.default_sc.blocks_section_blog_c1#blog_c1 .insides.middles_content .lefts_cont.detail_blog h2'
		).find('br').remove();
		}
	});
</script>
@endsection
