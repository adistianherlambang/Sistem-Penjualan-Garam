@extends('layouts.app')

@section('title', 'Tulis Berita / Artikel Baru')
@section('page-title', 'Tulis Berita')

@section('content')
<div class="md-card" style="max-width: 860px; margin: 0 auto;">
    <div class="md-card-header">
        <div class="md-card-title">Buat Publikasi Berita / Artikel Baru</div>
        <a href="{{ route('articles.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    </div>

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="form-label" for="title">Judul Berita / Artikel *</label>
            <input type="text" id="title" name="title" class="form-input {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}" placeholder="Contoh: CV. Banyu Mili Kembangkan Inovasi Garam Industri Nasional" required>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="category">Kategori *</label>
                <select id="category" name="category" class="form-input" required>
                    <option value="Berita" {{ old('category') == 'Berita' ? 'selected' : '' }}>Berita</option>
                    <option value="Artikel" {{ old('category') == 'Artikel' ? 'selected' : '' }}>Artikel</option>
                    <option value="Resep" {{ old('category') == 'Resep' ? 'selected' : '' }}>Resep</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="published_at">Tanggal Terbit</label>
                <input type="date" id="published_at" name="published_at" class="form-input" value="{{ old('published_at', date('Y-m-d')) }}">
                <div class="form-hint">Tanggal yang akan tercantum pada artikel</div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="image">Foto Utama / Banner Artikel</label>
            <input type="file" id="image" name="image" class="form-input" accept="image/*" onchange="previewArticleImage(this)">
            <div class="form-hint">Format: JPG, PNG, WEBP (Maksimal 4MB). Jika dikosongkan akan menggunakan banner default garam.</div>
            <div id="image-preview-container" style="margin-top: 10px; display: none;">
                <img id="image-preview" src="#" alt="Preview" style="max-height: 160px; border-radius: 6px; border: 1px solid var(--ux-border);">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="excerpt">Ringkasan Singkat (Excerpt)</label>
            <textarea id="excerpt" name="excerpt" rows="2" class="form-textarea" placeholder="Ringkasan 1-2 kalimat yang tampil di kartu berita dan hasil pencarian.">{{ old('excerpt') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="content">Isi Lengkap Artikel *</label>
            <textarea id="content" name="content" rows="12" class="form-textarea {{ $errors->has('content') ? 'is-invalid' : '' }}" placeholder="Tulis isi berita atau artikel secara lengkap di sini. Anda dapat menggunakan paragraf..." required>{{ old('content') }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom: 24px;">
            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', '1') == '1' ? 'checked' : '' }}>
                <span><strong>Terbitkan Sekarang</strong> (Status Tayang di Website Publik)</span>
            </label>
        </div>

        <div class="form-actions">
            <button type="submit" class="md-btn md-btn-primary">
                <span>Terbitkan Berita</span>
            </button>
            <a href="{{ route('articles.index') }}" class="md-btn md-btn-outlined">Batal</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
function previewArticleImage(input) {
    const previewContainer = document.getElementById('image-preview-container');
    const previewImage = document.getElementById('image-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewContainer.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection
