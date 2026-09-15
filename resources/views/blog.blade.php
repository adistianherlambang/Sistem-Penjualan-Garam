@extends('layouts.garam')

@section('title', 'Berita & Artikel - Pabrik Garam Industri & Konsumsi CV. Banyu Mili')

@section('content')
<section class="inside_page outer-middle-content">
  <section class="default_sc back-white blocks_section_about_c1 industry_cont_1" id="industry_c1">
    <div class="prelatife container">
      <div class="insides">
        <div class="tops-page-titles">
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
                      <select name="category" id="category" class="form-control select-change">
                        <option value="">SEMUA</option>
                        <option value="Berita" {{ request('category') == 'Berita' ? 'selected' : '' }}>Berita</option>
                        <option value="Artikel" {{ request('category') == 'Artikel' ? 'selected' : '' }}>Artikel</option>
                        <option value="Resep" {{ request('category') == 'Resep' ? 'selected' : '' }}>Resep</option>
                      </select>
                    </div>                      
                  </div>
                </div>
                <div class="clear"></div>
              </form>
              <script type="text/javascript">
                $('.select-change').on('change', function() {
                  $('#form-select').submit();
                });
              </script>
            </div>
          </div>
          <div class="clear"></div>
        </div>

        <div class="contents content-text">
          <div class="clear height-45"></div>

          <div class="lists-default-articles">
            <div class="row default">
              @forelse($articles as $art)
                <div class="col-md-4 col-sm-6">
                  <div class="items" style="margin-bottom: 30px;">
                    <div class="picture">
                      <a href="{{ url('/berita/' . $art->slug) }}">
                        <img src="{{ $art->image_url }}" alt="{{ $art->title }}" class="img-responsive" style="width: 100%; height: 210px; object-fit: cover;">
                      </a>
                    </div>
                    <div class="info">
                      <span class="cat">{{ $art->formatted_date }} &bull; {{ $art->category }}</span>
                      <h4 class="title-blog" style="min-height: 48px;">
                        <a href="{{ url('/berita/' . $art->slug) }}" style="color: #19387e;">
                          {{ $art->title }}
                        </a>
                      </h4>
                      <p>
                        {{ Str::limit($art->excerpt ?? strip_tags($art->content), 125) }}
                      </p>
                    </div>
                  </div>
                </div>
              @empty
                <div class="col-xs-12 text-center" style="padding: 50px 0;">
                  <p style="font-size: 16px; color: #777;">Tidak ada artikel pada kategori ini.</p>
                  <a href="{{ url('/berita') }}" class="btn btn-default btn-sm">Lihat Semua Berita</a>
                </div>
              @endforelse
            </div>
          </div>

          <div class="text-center" style="margin-top: 20px;">
            {{ $articles->links() }}
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
    $('section.illutration_inside_page_top .blocks_int_bottom .ins_text h4, section.default_sc.blocks_section_about_c1.industry_cont_1#industry_c1 .insides h2, section.default_sc.blocks_section_blog_c1#blog_c1 .insides.middles_content .lefts_cont.detail_blog h2').find('br').remove();
  }
});
</script>
@endsection
