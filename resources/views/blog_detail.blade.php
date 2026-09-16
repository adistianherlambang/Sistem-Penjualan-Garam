@extends('layouts.garam')

@section('title', $article->title . ' - Berita CV. Banyu Mili')

@push('styles')
<style>
  .detail-page-wrapper {
    background: #fff;
    padding: 35px 0 70px;
  }
  .detail-page-wrapper .insides {
    padding: 0 20px;
  }
  .detail-breadcrumb-bar {
    margin-bottom: 30px;
    padding-bottom: 14px;
    border-bottom: 1px solid #e2e8f0;
  }
  .detail-back-link {
    font-family: Rubik, sans-serif;
    color: #003ea9;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none !important;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: gap 0.2s ease, color 0.2s ease;
  }
  .detail-back-link:hover {
    color: #002d7a;
    gap: 12px;
  }
  /* Layout Grid with clear gap between left and right sections */
  .detail-article-layout {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 360px;
    gap: 50px;
    align-items: start;
  }
  .detail-main-col {
    min-width: 0;
  }
  .detail-sidebar-col {
    min-width: 0;
  }
  @media (max-width: 991px) {
    .detail-article-layout {
      grid-template-columns: minmax(0, 1fr);
      gap: 40px;
    }
  }
  .detail-article-meta {
    font-family: Rubik, sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #0284c7;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
    letter-spacing: 0.5px;
  }
  .detail-article-badge {
    background: #003ea9;
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    padding: 3px 10px;
    border-radius: 12px;
    letter-spacing: 0.5px;
  }
  .detail-article-title {
    font-family: 'Playfair Display', serif;
    font-size: 32px;
    line-height: 1.35;
    color: #0f172a;
    font-weight: 700;
    margin: 0 0 25px 0;
  }
  .detail-featured-wrap {
    margin-bottom: 35px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    background: #f1f5f9;
  }
  .detail-featured-wrap img {
    width: 100%;
    max-height: 480px;
    object-fit: cover;
  }
  .detail-content-body {
    font-family: Rubik, sans-serif;
    font-size: 16px;
    line-height: 1.85;
    color: #334155;
  }
  .detail-content-body p {
    margin-bottom: 22px;
  }
  .detail-share-box {
    margin-top: 40px;
    padding: 20px 24px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
  }
  .detail-sidebar-card {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 28px 24px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.03);
  }
  .detail-sidebar-heading {
    font-family: 'Playfair Display', serif;
    font-size: 20px;
    font-weight: 700;
    color: #003ea9;
    margin: 0 0 20px 0;
    padding-bottom: 12px;
    border-bottom: 2px solid #003ea9;
  }
  .detail-sidebar-item {
    margin-bottom: 18px;
    padding-bottom: 16px;
    border-bottom: 1px solid #e2e8f0;
  }
  .detail-sidebar-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
  }
  .detail-sidebar-meta {
    font-family: Rubik, sans-serif;
    font-size: 11px;
    font-weight: 600;
    color: #0284c7;
    margin-bottom: 6px;
  }
  .detail-sidebar-title {
    font-family: Rubik, sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: #1e293b;
    line-height: 1.45;
    text-decoration: none !important;
    display: block;
    transition: color 0.2s ease;
  }
  .detail-sidebar-title:hover {
    color: #003ea9;
  }
</style>
@endpush

@section('content')
<section class="inside_page detail-page-wrapper">
  <div class="prelatife container">
    <div class="insides">
      <!-- Breadcrumb -->
      <div class="detail-breadcrumb-bar">
        <a href="{{ url('/berita') }}" class="detail-back-link">
          <i class="fa fa-arrow-left"></i>
          <span>Kembali ke Semua Berita</span>
        </a>
      </div>

      <div class="detail-article-layout">
        <!-- Main Article Column (Kiri) -->
        <div class="detail-main-col">
          <article>
            <div class="detail-article-meta">
              <span class="detail-article-badge">{{ $article->category }}</span>
              <span><i class="fa fa-calendar-o" style="margin-right: 4px;"></i> {{ $article->formatted_date }}</span>
            </div>

            <h1 class="detail-article-title">
              {{ $article->title }}
            </h1>

            @if($article->image)
              <div class="detail-featured-wrap">
                <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="img-responsive">
              </div>
            @endif

            <div class="detail-content-body">
              {!! nl2br(e($article->content)) !!}
            </div>

            <!-- Share Box -->
            <div class="detail-share-box">
              <div style="font-family: Rubik, sans-serif; font-weight: 600; font-size: 14px; color: #1e293b; display: flex; align-items: center; gap: 8px;">
                <i class="fa fa-share-alt" style="color: #003ea9;"></i>
                <span>Bagikan artikel ini:</span>
              </div>
              <div>
                <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' - ' . url('/berita/' . $article->slug)) }}" target="_blank" class="btn btn-sm" style="background-color: #25D366; color: #fff; font-family: Rubik, sans-serif; font-weight: 600; border-radius: 6px; padding: 7px 18px; display: inline-flex; align-items: center; gap: 6px; text-decoration: none;">
                  <i class="fa fa-whatsapp" style="font-size: 15px;"></i>
                  <span>WhatsApp</span>
                </a>
              </div>
            </div>
          </article>
        </div>

        <!-- Sidebar Recent Articles Column (Kanan) -->
        <div class="detail-sidebar-col">
          <aside class="detail-sidebar-card">
            <h3 class="detail-sidebar-heading">
              BERITA TERKINI LAINNYA
            </h3>

            @forelse($recentArticles as $recent)
              <div class="detail-sidebar-item">
                <div class="detail-sidebar-meta">
                  <i class="fa fa-calendar-o"></i> {{ $recent->formatted_date }} &bull; {{ $recent->category }}
                </div>
                <a href="{{ url('/berita/' . $recent->slug) }}" class="detail-sidebar-title">
                  {{ $recent->title }}
                </a>
              </div>
            @empty
              <p style="font-family: Rubik, sans-serif; color: #94a3b8; font-size: 13px;">Belum ada berita lainnya.</p>
            @endforelse

            <div style="margin-top: 25px;">
              <a href="{{ url('/berita') }}" class="btn_blue_def" style="display: block; text-align: center; font-size: 12px; padding: 10px 14px; border-radius: 4px; text-decoration: none;">
                LIHAT SEMUA BERITA
              </a>
            </div>
          </aside>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection
