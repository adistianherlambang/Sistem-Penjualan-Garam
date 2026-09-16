@extends('layouts.garam')

@section('title', 'Produk Kami - CV. Banyu Mili Garam Konsumsi Beryodium SNI Lampung Timur')

@section('content')
<section class="illutration_inside_page_top pg_products prelatife" data-bg="{{ asset('asset/images/ptgaram/slide-2.jpg') }}">
  <div class="blocks_int_bottom">
    <div class="prelatife container">
      <div class="ins_text">
        <h1 class="hide hidden">Garam Konsumsi Beryodium SNI - CV. Banyu Mili Kabupaten Lampung Timur</h1>
        <h3 class="c_title">GARAM BANYU MILI</h3>
        <h4>Garam konsumsi beryodium berstandar SNI<br />
untuk kebutuhan keluarga dan pangan berkualitas.</h4>
        <div class="clear divider"></div>
        <div class="tsn_g_bottom"><a href="#product_c1"><img src="{{ asset('asset/images/b_icons_gt_bottom.png') }}" alt="" class="img-responsive center-block"></a></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>

<div class="inside_page">
  <section class="default_sc back-white blocks_section_about_c1 products_cont_1" id="product_c1">
    <div class="prelatife container">
      <div class="insides content-text prelatife text-center">
        <h3 class="s_title_child">PRODUK KAMI</h3>
        <h2>Produk garam konsumsi beryodium berstandar SNI CV. Banyu Mili</h2>
        
        <div class="clear height-40"></div>

        <div class="lists_default_product_dt list_home">
          @if(isset($productsGrouped) && $productsGrouped->isNotEmpty())
            @foreach($productsGrouped as $categoryName => $catProducts)
              <h3 class="names-sub">{{ $categoryName }}</h3>
              <div class="row">
                @foreach($catProducts as $product)
                  <div class="col-md-3 col-sm-6">
                    <div class="items">
                      <div class="pict">
                        <a href="https://api.whatsapp.com/send?phone=628136906089&text=Halo%20CV.%20Banyu%20Mili,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product->name) }}" target="_blank">
                          <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-responsive center-block" style="max-height: 200px; object-fit: contain; margin: 0 auto;">
                        </a>
                      </div>
                      <div class="info">
                        <h5 class="name" style="color: #19387e; font-weight: 700; margin-top: 10px; min-height: 38px;">{{ $product->name }}</h5>
                        <span class="used" style="display: block; font-size: 11px; text-transform: uppercase; color: #888; margin-bottom: 5px;">{{ $product->category }}</span>
                        <p>
                          @if($product->packaging)
                            Produk garam ini tersedia dalam ukuran:<br />
                            <strong>{{ $product->packaging }}</strong>
                          @else
                            Berat standar: {{ $product->weight_per_pack_gram }} gram
                          @endif
                          @if($product->notes)
                            <br /><span style="color: #666; font-size: 12px;">{{ Str::limit($product->notes, 65) }}</span>
                          @endif
                        </p>
                        @if($product->price_per_pack > 0)
                          <div style="font-size: 14px; font-weight: bold; color: #19387e; margin-bottom: 8px;">
                            Rp {{ number_format($product->price_per_pack, 0, ',', '.') }}
                          </div>
                        @endif
                        <div style="margin-top: 8px;">
                          <a href="https://api.whatsapp.com/send?phone=628136906089&text=Halo%20CV.%20Banyu%20Mili,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product->name) }}" target="_blank" class="btn btn-default btn-xs" style="background: #19387e; color: #fff; border-radius: 4px; padding: 5px 12px; font-size: 11px; font-weight: 600;">
                            Pesan via WhatsApp
                          </a>
                        </div>
                        <div class="clear"></div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            @endforeach
          @else
            <div style="padding: 40px 0;">
              <p>Belum ada produk dalam katalog.</p>
            </div>
          @endif
        </div>
        <!-- End list product -->

        <div class="clear height-10"></div>
        <div class="bottoms_inf_products">
          <p>CV. BANYU MILI yang berlokasi di Desa Banjar Rejo, Kabupaten Lampung Timur membuka kemitraan pasokan garam konsumsi beryodium berstandar SNI untuk distributor, agen sembako, maupun pengolahan pangan.</p>
          <p><strong>Silahkan hubungi kami di 08136906089 atau klik tombol di bawah ini.</strong></p>
          <div class="clear height-20"></div>
          <a href="{{ url('/kontak') }}" class="btn btn-default btn_blue_def">HUBUNGI CV. BANYU MILI</a>
          <div class="clear"></div>
        </div>
        <div class="clear height-20"></div>

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
    $('section.illutration_inside_page_top .blocks_int_bottom .ins_text h4, section.default_sc.blocks_section_about_c1.industry_cont_1#industry_c1 .insides h2').find('br').remove();
  }
});
</script>
@endsection
