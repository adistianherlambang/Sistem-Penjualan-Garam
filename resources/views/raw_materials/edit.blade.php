@extends('layouts.app')

@section('title', 'Ubah Barang Mentah')
@section('page-title', 'Ubah')

@section('content')
<div class="md-card" style="max-width: 720px; margin: 0 auto;">
    <div class="md-card-header">
        <div>
            <div class="md-card-title">Ubah Barang Mentah</div>
            <div class="md-card-subtitle">{{ $rawMaterial->name }}</div>
        </div>
        <a href="{{ route('raw-materials.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    </div>

    <form action="{{ route('raw-materials.update', $rawMaterial) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="code">Kode Barang</label>
                <input type="text" id="code" name="code" class="form-input {{ $errors->has('code') ? 'is-invalid' : '' }}" value="{{ old('code', $rawMaterial->code) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="name">Nama Barang</label>
                <input type="text" id="name" name="name" class="form-input {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', $rawMaterial->name) }}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Stok Saat Ini (Hanya Baca)</label>
            <input type="text" class="form-input" value="{{ $rawMaterial->formatted_stock }}" disabled style="background-color: var(--md-sys-color-surface-container-high);">
            <div class="form-hint">Perubahan stok dilakukan melalui transaksi Pembelian atau Produksi</div>
        </div>

        <div class="form-group">
            <label class="form-label" for="min_stock_weight">Batas Minimal</label>
            <div style="display: flex; gap: 8px;">
                <input type="number" step="any" id="min_stock_weight" name="min_stock_weight" class="form-input" value="{{ old('min_stock_weight', $rawMaterial->min_stock_gram / 1000) }}" min="0">
                <select name="min_stock_unit" class="form-select" style="width: 120px;">
                    <option value="kg" selected>kg</option>
                    <option value="ton">ton</option>
                    <option value="gram">gram</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="notes">Catatan</label>
            <textarea id="notes" name="notes" rows="3" class="form-textarea">{{ old('notes', $rawMaterial->notes) }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="md-btn md-btn-primary">
                <span class="material-symbols-outlined">save</span>
                <span>Simpan</span>
            </button>
            <a href="{{ route('raw-materials.index') }}" class="md-btn md-btn-outlined">Batal</a>
        </div>
    </form>
</div>
@endsection
