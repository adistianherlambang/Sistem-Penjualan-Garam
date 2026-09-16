@extends('layouts.garam')

@section('title', 'Hubungi Kami - Pabrik Garam Industri & Konsumsi CV. Banyu Mili')

@section('content')
<section class="illutration_inside_page_top pg_industri prelatife" data-bg="{{ asset('asset/images/ptgaram/about-hero.jpg') }}">
  <div class="blocks_int_bottom">
    <div class="prelatife container">
      <div class="ins_text">
        <h1 class="hide hidden">Contact Us - Pabrik Garam Industri & Konsumsi CV. Banyu Mili Surabaya</h1>
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
	                                    Hotline Sales dan Marketing  <strong><a href="Oky 08138288177" <strong=""><herf rina="" 0811984376"="" href="Oky 0813 828 8177 " <="" a=""></herf></a></strong>
</p>
<p email<br="">
</p>
<p>
	 <a href="Oky 08138288177" <strong=""> </a><a href="mailto:info@banyumili.co.id"><strong>info@banyumili.co.id</strong></a>
</p>          <div class="clear"></div>
        </div>

        <div class="clear height-50"></div>
        <div class="clear height-50"></div>
        <div class="clear height-10"></div>
        <div class="middles_info">
          <div class="row">
                        <div class="col-md-6">
              <div class="item">
                <img src="{{ asset('asset/images/ptgaram/about-facility-1.jpg') }}" alt="" class="img-responsive center-block">
                <div class="clear height-45"></div>
                <h2>OFFICE</h2>
                <address>Perum Graha Family Blok M – 62<br />
Surabaya 60226, Jawa Timur. Indonesia.<br />
Telepon.<br />
Atik <a href="tel:+6285100477522">+62 851-0047-7522</a><br />
Tuti <a href="tel:+628113181167">+62 811-3181-167</a><br />
Rinawati <a href="tel:+62811984376">+62 811-984-376</a><br />
Elsa <a href="tel:+6281333370415">+62 813-3337-0415</a></address>
                <p><i class="fa fa-map-marker"></i><br />
                  <a target="_blank" href="https://goo.gl/maps/AMzjzHxAJ7r">VIEW ON GOOGLE MAP</a></p>
                <div class="clear"></div>
              </div>
            </div>
                        <div class="col-md-6">
              <div class="item">
                <img src="{{ asset('asset/images/ptgaram/about-facility-2.jpg') }}" alt="" class="img-responsive center-block">
                <div class="clear height-45"></div>
                <h2>FACTORY</h2>
                <address>Jl. Kalianak Barat No.60, Kalianak<br />
Surabaya 60183, Jawa Timur, Indonesia.</address>
                <p><i class="fa fa-map-marker"></i><br />
                  <a target="_blank" href="https://goo.gl/maps/FznhjeGimQM2">VIEW ON GOOGLE MAP</a></p>
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
