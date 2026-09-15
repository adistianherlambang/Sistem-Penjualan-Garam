@extends('layouts.garam')

@section('title', 'Berita & Artikel - Pabrik Garam Industri & Konsumsi CV. Banyu Mili')

@section('content')
<section class="inside_page outer-middle-content">
  <section class="default_sc back-white blocks_section_about_c1 industry_cont_1" id="industry_c1">
    <div class="prelatife container">
      <div class="insides">
        <div class="tops-page-titles">
          <!-- <h2>BERITA & ARTIKEL</h2> -->
          <div class="row">
            <div class="col-md-4">
                            <h2 class="sb-title">BERITA & ARTIKEL</h2>
                          </div>
            <div class="col-md-8">
                <form class="form-inline box-fitlers" id="form-select" action="{{ url('/berita') }}" method="get">
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exampleInputName2">KATEGORI &nbsp;</label>
                                                    <select name="category" id="" class="form-control select-change">
                          <option value="">SEMUA</option>
                                                    <option value="berita" >Berita</option>
                                                    <option value="artikel" >Artikel</option>
                                                    <option value="resep" >Resep</option>
                                                    </select>
                        </div>                      
                    </div>
                  </div>

                  <div class="clear"></div>
                </form>
                <script type="text/javascript">
                  $('.select-change').on('change', function() {
                    $('#form-select').submit();
                  })
                </script>
            </div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="contents content-text">
          <div class="clear height-45"></div>

          <div class="lists-default-articles">
            <div class="row default">
                            <div class="col-md-4 col-sm-6">
                <div class="items">
                  <div class="picture"><a href="/blog/detail/2725"><img src="{{ asset('asset/images/ptgaram/slide-3.jpg') }}" alt="" class="img-responsive"></a></div>
                  <div class="info">
                    <span class="cat">15 September, 2026</span>
                    <h4 class="title-blog"><a href="/blog/detail/2725">CV. Banyu Mili Kembangkan Industri Garam untuk Menjawab Kebutuhan Pasar Nasional</a></h4>
                    <p>
	 www.garam.co.id.Surabaya,15 September 2026-Perkembangan kebutuhan garam di Indonesia terus menga...</p>
                  </div>
                </div>
              </div>
                            <div class="col-md-4 col-sm-6">
                <div class="items">
                  <div class="picture"><a href="/blog/detail/2724"><img src="{{ asset('asset/images/ptgaram/slide-3.jpg') }}" alt="" class="img-responsive"></a></div>
                  <div class="info">
                    <span class="cat">14 September, 2026</span>
                    <h4 class="title-blog"><a href="/blog/detail/2724">Garam Berkualitas dan Industri Masa Depan: Strategi CV. Banyu Mili Menatap Peluang</a></h4>
                    <p>
	 www.garam.co.id.Surabaya,14 September 2026-Industri pengolahan garam nasional terus bergerak men...</p>
                  </div>
                </div>
              </div>
                            <div class="col-md-4 col-sm-6">
                <div class="items">
                  <div class="picture"><a href="/blog/detail/2723"><img src="{{ asset('asset/images/ptgaram/slide-3.jpg') }}" alt="" class="img-responsive"></a></div>
                  <div class="info">
                    <span class="cat">13 September, 2026</span>
                    <h4 class="title-blog"><a href="/blog/detail/2723">Ketepatan Produksi Menjadi Kekuatan CV. Banyu Mili dalam Menjawab Kebutuhan Industri</a></h4>
                    <p>
	 www.garam.co.id.Surabaya,13 September 2026-Perkembangan industri pengolahan garam di Indonesia t...</p>
                  </div>
                </div>
              </div>
                            <div class="col-md-4 col-sm-6">
                <div class="items">
                  <div class="picture"><a href="/blog/detail/2722"><img src="{{ asset('asset/images/ptgaram/slide-3.jpg') }}" alt="" class="img-responsive"></a></div>
                  <div class="info">
                    <span class="cat">12 September, 2026</span>
                    <h4 class="title-blog"><a href="/blog/detail/2722">Menjaga Mutu di Tengah Perubahan Industri, CV. Banyu Mili Memperkuat Arah Bisnis</a></h4>
                    <p>
	 www.garam.co.id.Surabaya,12 September 2026-Perubahan kebutuhan pasar dan semakin dinamisnya pers...</p>
                  </div>
                </div>
              </div>
                            <div class="col-md-4 col-sm-6">
                <div class="items">
                  <div class="picture"><a href="/blog/detail/2721"><img src="{{ asset('asset/images/ptgaram/slide-3.jpg') }}" alt="" class="img-responsive"></a></div>
                  <div class="info">
                    <span class="cat">11 September, 2026</span>
                    <h4 class="title-blog"><a href="/blog/detail/2721">CV. Banyu Mili Membaca Peluang Baru di Tengah Perkembangan Industri Garam</a></h4>
                    <p>
	 www.garam.co.id.Surabaya,11 September 2026-Perkembangan industri pengolahan garam nasional yang ...</p>
                  </div>
                </div>
              </div>
                            <div class="col-md-4 col-sm-6">
                <div class="items">
                  <div class="picture"><a href="/blog/detail/2720"><img src="{{ asset('asset/images/ptgaram/slide-3.jpg') }}" alt="" class="img-responsive"></a></div>
                  <div class="info">
                    <span class="cat">10 September, 2026</span>
                    <h4 class="title-blog"><a href="/blog/detail/2720">CV. Banyu Mili Membangun Masa Depan Industri Garam melalui Kualitas dan Keandalan</a></h4>
                    <p>
	  www.garam.co.id.Surabaya,10 September 2026-Industri pengolahan garam terus menghadapi perkemban...</p>
                  </div>
                </div>
              </div>
                            <div class="col-md-4 col-sm-6">
                <div class="items">
                  <div class="picture"><a href="/blog/detail/2719"><img src="{{ asset('asset/images/ptgaram/slide-3.jpg') }}" alt="" class="img-responsive"></a></div>
                  <div class="info">
                    <span class="cat">09 September, 2026</span>
                    <h4 class="title-blog"><a href="/blog/detail/2719">Membaca Masa Depan Industri Garam: Langkah CV. Banyu Mili Membangun Daya Saing</a></h4>
                    <p>
	 www.garam.co.id.Surabaya,9 September 2026-Industri pengolahan garam nasional memasuki fase yang ...</p>
                  </div>
                </div>
              </div>
                            <div class="col-md-4 col-sm-6">
                <div class="items">
                  <div class="picture"><a href="/blog/detail/2718"><img src="{{ asset('asset/images/ptgaram/slide-3.jpg') }}" alt="" class="img-responsive"></a></div>
                  <div class="info">
                    <span class="cat">08 September, 2026</span>
                    <h4 class="title-blog"><a href="/blog/detail/2718">Menjaga Kualitas Hari Ini, Membangun Kepercayaan untuk Masa Depan CV. Banyu Mili</a></h4>
                    <p>
	 www.garam.co.id.Surabaya,8 September 2026-Kualitas bukan sekadar ukuran dari sebuah produk, mela...</p>
                  </div>
                </div>
              </div>
                            <div class="col-md-4 col-sm-6">
                <div class="items">
                  <div class="picture"><a href="/blog/detail/2717"><img src="{{ asset('asset/images/ptgaram/slide-3.jpg') }}" alt="" class="img-responsive"></a></div>
                  <div class="info">
                    <span class="cat">07 September, 2026</span>
                    <h4 class="title-blog"><a href="/blog/detail/2717">Membangun Produk, Menjaga Kepercayaan: Strategi CV. Banyu Mili Bertumbuh</a></h4>
                    <p>
	  www.garam.co.id.Surabaya,7 September 2026-Persaingan industri pengolahan garam yang semakin din...</p>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <ul class="pagination" id="yw0"><li class="first hidden"><a href="{{ url('/berita') }}">&lt;&lt; First</a></li>
<li class="previous hidden"><a href="{{ url('/berita') }}">&lt; Previous</a></li>
<li class="page active"><a href="{{ url('/berita') }}">1</a></li>
<li class="page"><a href="{{ url('/berita') }}/Blog_page/2">2</a></li>
<li class="page"><a href="{{ url('/berita') }}/Blog_page/3">3</a></li>
<li class="page"><a href="{{ url('/berita') }}/Blog_page/4">4</a></li>
<li class="page"><a href="{{ url('/berita') }}/Blog_page/5">5</a></li>
<li class="page"><a href="{{ url('/berita') }}/Blog_page/6">6</a></li>
<li class="page"><a href="{{ url('/berita') }}/Blog_page/7">7</a></li>
<li class="page"><a href="{{ url('/berita') }}/Blog_page/8">8</a></li>
<li class="page"><a href="{{ url('/berita') }}/Blog_page/9">9</a></li>
<li class="page"><a href="{{ url('/berita') }}/Blog_page/10">10</a></li>
<li class="next"><a href="{{ url('/berita') }}/Blog_page/2">Next &gt;</a></li>
<li class="last"><a href="{{ url('/berita') }}/Blog_page/294">Last &gt;&gt;</a></li></ul>
          <div class="more-articles text-center hide hidden">
            <a href="#" class="btn btn-default">LIHAT LEBIH BANYAK</a>
            <div class="clear"></div>
          </div>

          <div class="clear height-50"></div>
          <div class="clear"></div>
        </div>

        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </section>

</section>


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
