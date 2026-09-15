@extends('layouts.app')

@section('title', 'Manajemen Berita & Artikel')
@section('page-title', 'Berita & Artikel')

@section('topbar-actions')
    <a href="{{ url('/berita') }}" target="_blank" class="md-btn md-btn-outlined md-btn-sm" style="margin-right: 8px;">
        <span>Lihat di Web</span>
    </a>
    <a href="{{ route('articles.create') }}" class="md-btn md-btn-primary md-btn-sm">
        <span>Tulis Berita Baru</span>
    </a>
@endsection

@section('content')
<div class="kpi-grid" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
    <div class="kpi-card">
        <div class="kpi-label">Total Artikel</div>
        <div class="kpi-value">{{ $totalArticles }}</div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Artikel Diterbitkan</div>
        <div class="kpi-value" style="color: #15803d;">{{ $publishedCount }}</div>
    </div>
</div>

<div class="md-card">
    <div class="md-card-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
        <div class="md-card-title">Daftar Publikasi & Berita Perusahaan</div>

        <!-- Filter Form -->
        <form action="{{ route('articles.index') }}" method="GET" style="display: flex; gap: 8px; align-items: center;">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul berita..." class="form-input" style="width: 220px; padding: 6px 12px; font-size: 13px;">
            <select name="category" class="form-input" style="width: 140px; padding: 6px 12px; font-size: 13px;" onchange="this.form.submit()">
                <option value="">Semua Kategori</option>
                <option value="Berita" {{ request('category') == 'Berita' ? 'selected' : '' }}>Berita</option>
                <option value="Artikel" {{ request('category') == 'Artikel' ? 'selected' : '' }}>Artikel</option>
                <option value="Resep" {{ request('category') == 'Resep' ? 'selected' : '' }}>Resep</option>
            </select>
            <button type="submit" class="md-btn md-btn-outlined md-btn-sm">Filter</button>
            @if(request()->hasAny(['q', 'category']))
                <a href="{{ route('articles.index') }}" class="md-btn md-btn-text md-btn-sm">Reset</a>
            @endif
        </form>
    </div>

    <div class="table-responsive">
        <table class="md-table">
            <thead>
                <tr>
                    <th style="width: 70px;">Gambar</th>
                    <th>Judul Berita & Ringkasan</th>
                    <th>Kategori</th>
                    <th>Tanggal Tayang</th>
                    <th>Status</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $art)
                <tr>
                    <td>
                        <img src="{{ $art->image_url }}" alt="{{ $art->title }}" style="width: 60px; height: 42px; object-fit: cover; border-radius: 4px; border: 1px solid var(--ux-border);">
                    </td>
                    <td>
                        <div style="font-weight: 600; font-size: 14px; margin-bottom: 2px;">
                            <a href="{{ url('/berita/' . $art->slug) }}" target="_blank" style="color: var(--md-sys-color-on-surface); text-decoration: none;">
                                {{ $art->title }}
                            </a>
                        </div>
                        <small style="color: var(--md-sys-color-on-surface-variant);">
                            {{ Str::limit($art->excerpt, 85) }}
                        </small>
                    </td>
                    <td>
                        <span style="display: inline-block; padding: 2px 8px; border-radius: 12px; font-size: 11px; background: #e0f2fe; color: #0369a1; font-weight: 500;">
                            {{ $art->category }}
                        </span>
                    </td>
                    <td style="white-space: nowrap; font-size: 13px;">
                        {{ $art->formatted_date }}
                    </td>
                    <td>
                        @if($art->is_published)
                            <span style="color: #15803d; font-weight: 600; font-size: 12px;">Tayang</span>
                        @else
                            <span style="color: #6b7280; font-size: 12px;">Draf</span>
                        @endif
                    </td>
                    <td style="text-align: right; white-space: nowrap;">
                        <a href="{{ url('/berita/' . $art->slug) }}" target="_blank" class="md-btn md-btn-outlined md-btn-sm" title="Preview Halaman">Lihat</a>
                        <a href="{{ route('articles.edit', $art) }}" class="md-btn md-btn-text md-btn-sm">Ubah</a>
                        <form action="{{ route('articles.destroy', $art) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="md-btn md-btn-text md-btn-sm" style="color: #dc2626;">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 32px;">
                        Belum ada berita atau artikel. Klik <strong>Tulis Berita Baru</strong> untuk menerbitkan konten.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $articles->links() }}
    </div>
</div>
@endsection
