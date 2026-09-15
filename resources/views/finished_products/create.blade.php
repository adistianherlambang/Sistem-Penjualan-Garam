@extends('layouts.app')

@section('title', 'Tambah Produk & Barang Jadi')
@section('page-title', 'Tambah Produk')

@section('content')
<div class="md-card" style="max-width: 760px; margin: 0 auto;">
    <div class="md-card-header">
        <div class="md-card-title">Tambah Produk Baru</div>
        <a href="{{ route('finished-products.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    </div>

    <form action="{{ route('finished-products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="code">Kode Produk *</label>
                <input type="text" id="code" name="code" class="form-input {{ $errors->has('code') ? 'is-invalid' : '' }}" value="{{ old('code', 'FG-' . sprintf('%03d', \App\Models\FinishedProduct::count() + 1)) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="name">Nama Produk *</label>
                <input type="text" id="name" name="name" class="form-input {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Contoh: GARAM KERAPAN SAPI" required>
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="category">Kategori Produk</label>
                <select id="category" name="category" class="form-input">
                    <option value="Garam Konsumsi" {{ old('category') == 'Garam Konsumsi' ? 'selected' : '' }}>Garam Konsumsi Beryodium</option>
                    <option value="Garam Kasar" {{ old('category') == 'Garam Kasar' ? 'selected' : '' }}>Garam Kasar</option>
                    <option value="Garam Halus" {{ old('category') == 'Garam Halus' ? 'selected' : '' }}>Garam Halus</option>
                    <option value="Garam Industri" {{ old('category') == 'Garam Industri' ? 'selected' : '' }}>Garam Industri</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="packaging">Ukuran Kemasan yang Tersedia</label>
                <input type="text" id="packaging" name="packaging" class="form-input" value="{{ old('packaging') }}" placeholder="Contoh: 25 kg dan 50 kg atau 150 gr, 250 gr, 500 gr">
                <div class="form-hint">Akan ditampilkan pada katalog website publik (/produk)</div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="image">Foto Produk (Katalog Website)</label>
            <input type="file" id="image" name="image" class="form-input" accept="image/*" onchange="previewImage(this)">
            <div class="form-hint">Format: JPG, PNG, WEBP (Maksimal 4MB). Jika dikosongkan akan menggunakan gambar default.</div>
            <div id="image-preview-container" style="margin-top: 10px; display: none;">
                <img id="image-preview" src="#" alt="Preview" style="max-height: 120px; border-radius: 6px; border: 1px solid var(--ux-border);">
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="price_per_pack">Harga Jual per Bungkus/Kemasan (Rp) *</label>
                <input type="number" step="any" id="price_per_pack" name="price_per_pack" class="form-input {{ $errors->has('price_per_pack') ? 'is-invalid' : '' }}" value="{{ old('price_per_pack', 3500) }}" min="0" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="cost_per_pack">Harga Pokok per Bungkus/Kemasan (Rp)</label>
                <input type="number" step="any" id="cost_per_pack" name="cost_per_pack" class="form-input" value="{{ old('cost_per_pack', 2000) }}" min="0">
                <div class="form-hint">Digunakan untuk estimasi laba kotor</div>
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="initial_packs">Stok Awal Fisik (Bungkus/Pack)</label>
                <input type="number" id="initial_packs" name="initial_packs" class="form-input" value="{{ old('initial_packs', 0) }}" min="0">
            </div>

            <div class="form-group">
                <label class="form-label" for="min_stock_packs">Batas Minimal Stok</label>
                <input type="number" id="min_stock_packs" name="min_stock_packs" class="form-input" value="{{ old('min_stock_packs', 20) }}" min="0">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="notes">Deskripsi / Catatan Produk</label>
            <textarea id="notes" name="notes" rows="3" class="form-textarea" placeholder="Deskripsi produk, kegunaan, kadar yodium, dll.">{{ old('notes') }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom: 24px;">
            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                <span><strong>Tampilkan di Katalog Website</strong> (Status Aktif)</span>
            </label>
        </div>

        <div class="form-actions">
            <button type="submit" class="md-btn md-btn-primary">
                <span>Simpan Produk</span>
            </button>
            <a href="{{ route('finished-products.index') }}" class="md-btn md-btn-outlined">Batal</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
function previewImage(input) {
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
