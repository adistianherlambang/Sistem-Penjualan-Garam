@extends('layouts.app')

@section('title', 'Ubah Berita / Artikel')
@section('page-title', 'Ubah Berita')

@section('content')
<div class="md-card" style="max-width: 860px; margin: 0 auto;">
    <div class="md-card-header">
        <div class="md-card-title">Ubah Berita: {{ Str::limit($article->title, 45) }}</div>
        <a href="{{ route('articles.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    </div>

    <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label" for="title">Judul Berita / Artikel *</label>
            <input type="text" id="title" name="title" class="form-input {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="category">Kategori *</label>
                <select id="category" name="category" class="form-input" required>
                    <option value="Berita" {{ old('category', $article->category) == 'Berita' ? 'selected' : '' }}>Berita</option>
                    <option value="Artikel" {{ old('category', $article->category) == 'Artikel' ? 'selected' : '' }}>Artikel</option>
                    <option value="Resep" {{ old('category', $article->category) == 'Resep' ? 'selected' : '' }}>Resep</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="published_at">Tanggal Terbit</label>
                <input type="date" id="published_at" name="published_at" class="form-input" value="{{ old('published_at', optional($article->published_at)->format('Y-m-d')) }}">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="image">Foto Utama / Banner Artikel</label>
            <div style="display: flex; gap: 16px; align-items: flex-start; margin-bottom: 8px;">
                <img id="image-preview" src="{{ $article->image_url }}" alt="{{ $article->title }}" style="width: 140px; height: 90px; object-fit: cover; border-radius: 6px; border: 1px solid var(--ux-border);">
                <div style="flex: 1;">
                    <input type="file" id="image" name="image" class="form-input" accept="image/*" onchange="previewArticleImage(this)">
                    <div class="form-hint">Pilih gambar baru jika ingin mengganti gambar artikel. Format: JPG, PNG, WEBP (Maksimal 4MB).</div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="excerpt">Ringkasan Singkat (Excerpt)</label>
            <textarea id="excerpt" name="excerpt" rows="2" class="form-textarea">{{ old('excerpt', $article->excerpt) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="content">Isi Lengkap Artikel *</label>
            <textarea id="content" name="content" rows="12" class="form-textarea {{ $errors->has('content') ? 'is-invalid' : '' }}" required>{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom: 24px;">
            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $article->is_published) ? 'checked' : '' }}>
                <span><strong>Terbitkan Sekarang</strong> (Status Tayang di Website Publik)</span>
            </label>
        </div>

        <div class="form-actions">
            <button type="submit" class="md-btn md-btn-primary">
                <span>Simpan Perubahan</span>
            </button>
            <a href="{{ route('articles.index') }}" class="md-btn md-btn-outlined">Batal</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
function previewArticleImage(input) {
    const previewImage = document.getElementById('image-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection
