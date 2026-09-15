@extends('layouts.app')

@section('title', 'Ubah Produk & Barang Jadi')
@section('page-title', 'Ubah Produk')

@section('content')
<div class="md-card" style="max-width: 760px; margin: 0 auto;">
    <div class="md-card-header">
        <div class="md-card-title">Ubah Data Produk: {{ $finishedProduct->name }}</div>
        <a href="{{ route('finished-products.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    </div>

    <form action="{{ route('finished-products.update', $finishedProduct) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="code">Kode Produk *</label>
                <input type="text" id="code" name="code" class="form-input {{ $errors->has('code') ? 'is-invalid' : '' }}" value="{{ old('code', $finishedProduct->code) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="name">Nama Produk *</label>
                <input type="text" id="name" name="name" class="form-input {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', $finishedProduct->name) }}" required>
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="category">Kategori Produk</label>
                <select id="category" name="category" class="form-input">
                    <option value="Garam Konsumsi" {{ old('category', $finishedProduct->category) == 'Garam Konsumsi' ? 'selected' : '' }}>Garam Konsumsi Beryodium</option>
                    <option value="Garam Kasar" {{ old('category', $finishedProduct->category) == 'Garam Kasar' ? 'selected' : '' }}>Garam Kasar</option>
                    <option value="Garam Halus" {{ old('category', $finishedProduct->category) == 'Garam Halus' ? 'selected' : '' }}>Garam Halus</option>
                    <option value="Garam Industri" {{ old('category', $finishedProduct->category) == 'Garam Industri' ? 'selected' : '' }}>Garam Industri</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="packaging">Ukuran Kemasan yang Tersedia</label>
                <input type="text" id="packaging" name="packaging" class="form-input" value="{{ old('packaging', $finishedProduct->packaging) }}" placeholder="Contoh: 25 kg dan 50 kg">
                <div class="form-hint">Akan ditampilkan pada katalog website publik (/produk)</div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="image">Foto Produk (Katalog Website)</label>
            <div style="display: flex; gap: 16px; align-items: flex-start; margin-bottom: 8px;">
                <img id="image-preview" src="{{ $finishedProduct->image_url }}" alt="{{ $finishedProduct->name }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 6px; border: 1px solid var(--ux-border);">
                <div style="flex: 1;">
                    <input type="file" id="image" name="image" class="form-input" accept="image/*" onchange="previewImage(this)">
                    <div class="form-hint">Pilih file baru jika ingin mengganti gambar produk. Format: JPG, PNG, WEBP (Max 4MB).</div>
                </div>
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label">Stok Fisik Saat Ini (Hanya Baca)</label>
                <input type="text" class="form-input" value="{{ number_format($finishedProduct->stock_packs, 0, ',', '.') }} bungkus" disabled style="background-color: var(--md-sys-color-surface-container-high);">
                <div class="form-hint">Perubahan stok dilakukan melalui transaksi Produksi atau Penjualan</div>
            </div>

            <div class="form-group">
                <label class="form-label" for="min_stock_packs">Batas Minimal Stok (Bungkus)</label>
                <input type="number" id="min_stock_packs" name="min_stock_packs" class="form-input" value="{{ old('min_stock_packs', $finishedProduct->min_stock_packs) }}" min="0">
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="price_per_pack">Harga Jual per Bungkus/Kemasan (Rp) *</label>
                <input type="number" step="any" id="price_per_pack" name="price_per_pack" class="form-input {{ $errors->has('price_per_pack') ? 'is-invalid' : '' }}" value="{{ old('price_per_pack', $finishedProduct->price_per_pack) }}" min="0" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="cost_per_pack">Harga Pokok per Bungkus/Kemasan (Rp)</label>
                <input type="number" step="any" id="cost_per_pack" name="cost_per_pack" class="form-input" value="{{ old('cost_per_pack', $finishedProduct->cost_per_pack) }}" min="0">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="notes">Deskripsi / Catatan Produk</label>
            <textarea id="notes" name="notes" rows="3" class="form-textarea">{{ old('notes', $finishedProduct->notes) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom: 24px;">
            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $finishedProduct->is_active) ? 'checked' : '' }}>
                <span><strong>Tampilkan di Katalog Website</strong> (Status Aktif)</span>
            </label>
        </div>

        <div class="form-actions">
            <button type="submit" class="md-btn md-btn-primary">
                <span>Simpan Perubahan</span>
            </button>
            <a href="{{ route('finished-products.index') }}" class="md-btn md-btn-outlined">Batal</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
function previewImage(input) {
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
