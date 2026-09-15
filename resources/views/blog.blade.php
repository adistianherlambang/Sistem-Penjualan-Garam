@extends('layouts.garam')

@section('title', 'Berita & Artikel - Pabrik Garam Industri & Konsumsi CV. Banyu Mili')

@push('styles')
<style>
  /* Blog Page Typography & Layout */
  .blog-hero-section {
    background: #fff;
    padding: 35px 0 60px;
  }
  .blog-header-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    padding-bottom: 24px;
    border-bottom: 2px solid #003ea9;
    margin-bottom: 35px;
  }
  .blog-header-left h1.blog-main-title {
    font-family: 'Playfair Display', serif;
    font-size: 32px;
    font-weight: 700;
    color: #003ea9;
    margin: 0 0 6px 0;
    line-height: 1.2;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  .blog-header-left p.blog-sub-title {
    font-family: Rubik, sans-serif;
    font-size: 14px;
    color: #64748b;
    margin: 0;
  }
  .blog-filter-wrap {
    display: inline-flex;
    align-items: center;
    gap: 12px;
  }
  .blog-filter-label {
    font-family: Rubik, sans-serif;
    font-size: 13px;
    font-weight: 700;
    color: #1e293b;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin: 0;
  }
  .blog-select-wrapper {
    position: relative;
    display: inline-block;
  }
  .blog-select-custom {
    height: 40px;
    min-width: 190px;
    padding: 6px 36px 6px 16px;
    border: 1.5px solid #003ea9;
    border-radius: 6px;
    font-family: Rubik, sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #003ea9;
    background-color: #f8fafc;
    cursor: pointer;
    transition: all 0.2s ease;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
  }
  .blog-select-custom:focus {
    background-color: #fff;
    outline: none;
    border-color: #002d7a;
    box-shadow: 0 0 0 3px rgba(0, 62, 169, 0.15);
  }
  .blog-select-arrow {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #003ea9;
    pointer-events: none;
    font-size: 11px;
  }

  /* Grid & Cards (Clean, Uniform, Equal Height) */
  .blog-grid-container {
    display: flex;
    flex-wrap: wrap;
    margin-left: -15px;
    margin-right: -15px;
  }
  .blog-grid-item {
    padding-left: 15px;
    padding-right: 15px;
    margin-bottom: 35px;
    display: flex;
    flex-direction: column;
  }
  .blog-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    width: 100%;
    clear: none !important;
  }
  .blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 14px 30px rgba(0, 62, 169, 0.12);
    border-color: #003ea9;
  }
  .blog-card-thumb {
    position: relative;
    width: 100%;
    height: 220px;
    overflow: hidden;
    background-color: #e2e8f0;
  }
  .blog-card-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }
  .blog-card:hover .blog-card-thumb img {
    transform: scale(1.06);
  }
  .blog-badge-category {
    position: absolute;
    top: 14px;
    left: 14px;
    background-color: #003ea9;
    color: #ffffff;
    font-family: Rubik, sans-serif;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    padding: 5px 12px;
    border-radius: 20px;
    box-shadow: 0 2px 8px rgba(0, 62, 169, 0.35);
  }
  .blog-card-body {
    padding: 22px 20px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    height: auto !important;
    overflow: visible !important;
    clear: none !important;
  }
  .blog-card-meta {
    font-family: Rubik, sans-serif;
    font-size: 12px;
    font-weight: 500;
    color: #0284c7;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 6px;
  }
  .blog-card-title {
    font-family: 'Playfair Display', serif;
    font-size: 19px !important;
    font-weight: 700 !important;
    line-height: 1.4 !important;
    margin: 0 0 12px 0 !important;
    padding: 0 !important;
    height: auto !important;
    overflow: visible !important;
  }
  .blog-card-title a {
    color: #19387e !important;
    text-decoration: none !important;
    transition: color 0.2s ease;
  }
  .blog-card:hover .blog-card-title a {
    color: #003ea9 !important;
  }
  .blog-card-excerpt {
    font-family: Rubik, sans-serif;
    font-size: 14px !important;
    line-height: 1.6 !important;
    color: #4b5563 !important;
    margin: 0 0 20px 0 !important;
    flex-grow: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .blog-card-footer {
    margin-top: auto;
    padding-top: 14px;
    border-top: 1px solid #f1f5f9;
  }
  .blog-readmore-btn {
    font-family: Rubik, sans-serif;
    font-size: 12px;
    font-weight: 700;
    color: #003ea9;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    text-decoration: none !important;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
  }
  .blog-readmore-btn:hover {
    color: #002d7a;
    gap: 10px;
  }

  /* Custom Pagination */
  .blog-pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 25px;
    margin-bottom: 20px;
  }
  .blog-pagination-wrapper .pagination {
    margin: 0;
    display: inline-flex;
    gap: 6px;
  }
  .blog-pagination-wrapper .pagination > li > a,
  .blog-pagination-wrapper .pagination > li > span {
    border-radius: 6px !important;
    border: 1.5px solid #cbd5e1;
    color: #003ea9;
    font-family: Rubik, sans-serif;
    font-size: 13px;
    font-weight: 600;
    padding: 8px 14px;
    background: #fff;
    transition: all 0.2s ease;
  }
  .blog-pagination-wrapper .pagination > .active > a,
  .blog-pagination-wrapper .pagination > .active > span {
    background-color: #003ea9 !important;
    border-color: #003ea9 !important;
    color: #fff !important;
  }
  .blog-pagination-wrapper .pagination > li > a:hover {
    background-color: #eff6ff;
    border-color: #003ea9;
  }

  @media (max-width: 767px) {
    .blog-header-bar {
      flex-direction: column;
      align-items: flex-start;
      gap: 15px;
    }
    .blog-filter-wrap {
      width: 100%;
      justify-content: space-between;
    }
    .blog-select-custom {
      min-width: 150px;
      width: 100%;
    }
  }
</style>
@endpush

@section('content')
<section class="inside_page blog-hero-section">
  <div class="prelatife container">
    <div class="insides">
      <!-- Title & Category Filter Bar -->
      <div class="blog-header-bar">
        <div class="blog-header-left">
          <h1 class="blog-main-title">BERITA & ARTIKEL</h1>
          <p class="blog-sub-title">Wawasan industri garam, kabar perusahaan, dan panduan penggunaan CV. Banyu Mili</p>
        </div>

        <div class="blog-header-right">
          <form class="blog-filter-wrap" id="form-select" action="{{ url('/berita') }}" method="get">
            <label for="category" class="blog-filter-label">Kategori:</label>
            <div class="blog-select-wrapper">
              <select name="category" id="category" class="blog-select-custom" onchange="this.form.submit()">
                <option value="">Semua Kategori</option>
                <option value="Berita" {{ request('category') == 'Berita' ? 'selected' : '' }}>Berita</option>
                <option value="Artikel" {{ request('category') == 'Artikel' ? 'selected' : '' }}>Artikel</option>
                <option value="Resep" {{ request('category') == 'Resep' ? 'selected' : '' }}>Resep</option>
              </select>
              <span class="blog-select-arrow">▼</span>
            </div>
          </form>
        </div>
      </div>

      <!-- Articles Grid -->
      <div class="blog-grid-container">
        @forelse($articles as $art)
          <div class="col-md-4 col-sm-6 blog-grid-item">
            <div class="blog-card">
              <div class="blog-card-thumb">
                <a href="{{ url('/berita/' . $art->slug) }}">
                  <img src="{{ $art->image_url }}" alt="{{ $art->title }}" class="img-responsive">
                </a>
                <span class="blog-badge-category">{{ $art->category }}</span>
              </div>
              <div class="blog-card-body">
                <div class="blog-card-meta">
                  <i class="fa fa-calendar-o"></i> {{ $art->formatted_date }}
                </div>
                <h4 class="blog-card-title">
                  <a href="{{ url('/berita/' . $art->slug) }}" title="{{ $art->title }}">
                    {{ $art->title }}
                  </a>
                </h4>
                <p class="blog-card-excerpt">
                  {{ Str::limit($art->excerpt ?? strip_tags($art->content), 125) }}
                </p>
                <div class="blog-card-footer">
                  <a href="{{ url('/berita/' . $art->slug) }}" class="blog-readmore-btn">
                    <span>Baca Selengkapnya</span>
                    <i class="fa fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="col-xs-12 text-center" style="padding: 70px 0;">
            <i class="fa fa-newspaper-o" style="font-size: 52px; color: #cbd5e1; margin-bottom: 18px; display: block;"></i>
            <h3 style="font-family: 'Playfair Display', serif; color: #1e293b; margin-bottom: 8px;">Tidak Ada Artikel Ditemukan</h3>
            <p style="font-family: Rubik, sans-serif; font-size: 15px; color: #64748b; margin-bottom: 25px;">Belum ada artikel atau berita yang dipublikasikan pada kategori ini.</p>
            <a href="{{ url('/berita') }}" class="btn_blue_def" style="padding: 10px 24px; font-size: 13px; text-decoration: none;">
              Lihat Semua Berita
            </a>
          </div>
        @endforelse
      </div>

      <!-- Pagination -->
      @if($articles->hasPages())
        <div class="blog-pagination-wrapper">
          {{ $articles->links() }}
        </div>
      @endif

    </div>
  </div>
</section>
@endsection
