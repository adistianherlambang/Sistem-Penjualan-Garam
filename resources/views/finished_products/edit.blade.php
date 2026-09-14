@extends('layouts.app')

@section('title', 'Ubah Barang Jadi')
@section('page-title', 'Ubah')

@section('content')
<div class="md-card" style="max-width: 720px; margin: 0 auto;">
    <div class="md-card-header">
        <div>
            <div class="md-card-title">Ubah Barang Jadi</div>
            <div class="md-card-subtitle">{{ $finishedProduct->name }}</div>
        </div>
        <a href="{{ route('finished-products.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    </div>

    <form action="{{ route('finished-products.update', $finishedProduct) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="code">Kode Produk</label>
                <input type="text" id="code" name="code" class="form-input {{ $errors->has('code') ? 'is-invalid' : '' }}" value="{{ old('code', $finishedProduct->code) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="name">Nama Produk</label>
                <input type="text" id="name" name="name" class="form-input {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', $finishedProduct->name) }}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Stok Saat Ini (Hanya Baca)</label>
            <input type="text" class="form-input" value="{{ number_format($finishedProduct->stock_packs, 0, ',', '.') }} bungkus" disabled style="background-color: var(--md-sys-color-surface-container-high);">
            <div class="form-hint">Perubahan stok dilakukan melalui transaksi Produksi atau Penjualan</div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="price_per_pack">Harga Jual per Bungkus (Rp)</label>
                <input type="number" step="any" id="price_per_pack" name="price_per_pack" class="form-input {{ $errors->has('price_per_pack') ? 'is-invalid' : '' }}" value="{{ old('price_per_pack', $finishedProduct->price_per_pack) }}" min="0" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="cost_per_pack">Harga Pokok per Bungkus (Rp)</label>
                <input type="number" step="any" id="cost_per_pack" name="cost_per_pack" class="form-input" value="{{ old('cost_per_pack', $finishedProduct->cost_per_pack) }}" min="0">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="min_stock_packs">Batas Minimal Stok (Bungkus)</label>
            <input type="number" id="min_stock_packs" name="min_stock_packs" class="form-input" value="{{ old('min_stock_packs', $finishedProduct->min_stock_packs) }}" min="0">
        </div>

        <div class="form-group">
            <label class="form-label" for="notes">Catatan</label>
            <textarea id="notes" name="notes" rows="3" class="form-textarea">{{ old('notes', $finishedProduct->notes) }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="md-btn md-btn-primary">
                <span class="material-symbols-outlined">save</span>
                <span>Simpan</span>
            </button>
            <a href="{{ route('finished-products.index') }}" class="md-btn md-btn-outlined">Batal</a>
        </div>
    </form>
</div>
@endsection
