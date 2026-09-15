@extends('layouts.garam')

@section('title', $article->title . ' - Berita CV. Banyu Mili')

@section('content')
<section class="inside_page outer-middle-content">
  <section class="default_sc back-white blocks_section_blog_c1" id="blog_c1" style="padding-top: 50px; padding-bottom: 70px;">
    <div class="prelatife container">
      <div class="insides middles_content">
        <div class="row">
          <!-- Main Article Content -->
          <div class="col-md-8 col-sm-12">
            <div class="lefts_cont detail_blog">
              <div style="margin-bottom: 15px;">
                <a href="{{ url('/berita') }}" style="color: #19387e; font-size: 13px; font-weight: 600; text-decoration: none;">
                  &larr; KEMBALI KE SEMUA BERITA
                </a>
              </div>

              <span class="cat" style="display: inline-block; font-size: 12px; color: #888; text-transform: uppercase; margin-bottom: 8px; letter-spacing: 1px;">
                {{ $article->formatted_date }} &bull; {{ $article->category }}
              </span>

              <h1 style="font-family: 'Playfair Display', serif; font-size: 28px; line-height: 1.35; color: #19387e; margin-top: 0; margin-bottom: 25px; font-weight: 700;">
                {{ $article->title }}
              </h1>

              @if($article->image)
                <div class="featured-image" style="margin-bottom: 30px;">
                  <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="img-responsive" style="width: 100%; border-radius: 6px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                </div>
              @endif

              <div class="content-text" style="font-size: 16px; line-height: 1.8; color: #333;">
                {!! nl2br(e($article->content)) !!}
              </div>

              <div class="clear height-40"></div>
              <hr style="border-top: 1px solid #e2e8f0; margin: 30px 0;">

              <!-- Share to WhatsApp -->
              <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
                <div>
                  <span style="font-weight: 600; font-size: 14px; color: #19387e;">Bagikan Berita Ini:</span>
                </div>
                <div>
                  <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' - ' . url('/berita/' . $article->slug)) }}" target="_blank" class="btn btn-sm" style="background-color: #25D366; color: #fff; font-weight: 600; border-radius: 4px; padding: 6px 16px;">
                    Bagikan ke WhatsApp
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Sidebar Recent Articles -->
          <div class="col-md-4 col-sm-12">
            <div class="rights_cont sidebar_blog" style="background: #f8fafc; padding: 25px; border-radius: 8px; border: 1px solid #e2e8f0;">
              <h3 style="font-family: 'Playfair Display', serif; font-size: 20px; color: #19387e; margin-top: 0; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #19387e;">
                BERITA TERKINI LAINNYA
              </h3>

              @forelse($recentArticles as $recent)
                <div class="recent-item" style="margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #e2e8f0;">
                  <span style="font-size: 11px; color: #94a3b8; text-transform: uppercase;">
                    {{ $recent->formatted_date }}
                  </span>
                  <h5 style="margin: 5px 0 0 0; font-size: 14px; font-weight: 600; line-height: 1.4;">
                    <a href="{{ url('/berita/' . $recent->slug) }}" style="color: #1e293b; text-decoration: none;">
                      {{ $recent->title }}
                    </a>
                  </h5>
                </div>
              @empty
                <p style="color: #888; font-size: 13px;">Belum ada berita lainnya.</p>
              @endforelse

              <div style="margin-top: 25px; text-align: center;">
                <a href="{{ url('/berita') }}" class="btn btn-default btn_blue_def" style="display: block; font-size: 12px; padding: 10px 15px;">
                  LIHAT SEMUA BERITA
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="clear"></div>
      </div>
    </div>
  </section>
</section>
@endsection
