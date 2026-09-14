@extends('layouts.app')

@section('title', 'Tambah Barang Jadi')
@section('page-title', 'Tambah')

@section('content')
<div class="md-card" style="max-width: 720px; margin: 0 auto;">
    <div class="md-card-header">
        <div class="md-card-title">Tambah Produk</div>
        <a href="{{ route('finished-products.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    </div>

    <form action="{{ route('finished-products.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="code">Kode Produk</label>
                <input type="text" id="code" name="code" class="form-input {{ $errors->has('code') ? 'is-invalid' : '' }}" value="{{ old('code', 'FG-' . sprintf('%03d', \App\Models\FinishedProduct::count() + 1)) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="name">Nama Produk</label>
                <input type="text" id="name" name="name" class="form-input {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Contoh: Garam Dapur Beryodium 300g" required>
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label">Standar Berat Kemasan</label>
                <input type="text" class="form-input" value="300 gram per bungkus" disabled style="background-color: var(--md-sys-color-surface-container-high);">
                <div class="form-hint">Standar produk jadi POS Garam: 300 gram</div>
            </div>

            <div class="form-group">
                <label class="form-label" for="initial_packs">Stok Awal (Bungkus)</label>
                <input type="number" id="initial_packs" name="initial_packs" class="form-input" value="{{ old('initial_packs', 0) }}" min="0">
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="price_per_pack">Harga Jual per Bungkus (Rp)</label>
                <input type="number" step="any" id="price_per_pack" name="price_per_pack" class="form-input {{ $errors->has('price_per_pack') ? 'is-invalid' : '' }}" value="{{ old('price_per_pack', 3500) }}" min="0" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="cost_per_pack">Harga Pokok per Bungkus (Rp)</label>
                <input type="number" step="any" id="cost_per_pack" name="cost_per_pack" class="form-input" value="{{ old('cost_per_pack', 2000) }}" min="0">
                <div class="form-hint">Digunakan untuk estimasi laba kotor</div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="min_stock_packs">Batas Minimal Stok (Bungkus)</label>
            <input type="number" id="min_stock_packs" name="min_stock_packs" class="form-input" value="{{ old('min_stock_packs', 20) }}" min="0">
        </div>

        <div class="form-group">
            <label class="form-label" for="notes">Catatan</label>
            <textarea id="notes" name="notes" rows="3" class="form-textarea">{{ old('notes') }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="md-btn md-btn-primary">
                <span>Simpan</span>
            </button>
            <a href="{{ route('finished-products.index') }}" class="md-btn md-btn-outlined">Batal</a>
        </div>
    </form>
</div>
@endsection
