@extends('layouts.app')

@section('title', 'Tambah Barang Mentah')
@section('page-title', 'Tambah')

@section('content')
<div class="md-card" style="max-width: 720px; margin: 0 auto;">
    <div class="md-card-header">
        <div>
            <div class="md-card-title">Barang Mentah Baru</div>
            <div class="md-card-subtitle">Input data garam mentah</div>
        </div>
        <a href="{{ route('raw-materials.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    </div>

    <form action="{{ route('raw-materials.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="code">Kode Barang</label>
                <input type="text" id="code" name="code" class="form-input {{ $errors->has('code') ? 'is-invalid' : '' }}" value="{{ old('code', 'RM-' . sprintf('%03d', \App\Models\RawMaterial::count() + 1)) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="name">Nama Barang</label>
                <input type="text" id="name" name="name" class="form-input {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Contoh: Garam Kristal Kasar" required>
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="initial_weight">Stok Awal</label>
                <div style="display: flex; gap: 8px;">
                    <input type="number" step="any" id="initial_weight" name="initial_weight" class="form-input" value="{{ old('initial_weight', 0) }}" min="0">
                    <select name="initial_unit" class="form-select" style="width: 120px;">
                        <option value="kg" selected>kg</option>
                        <option value="ton">ton</option>
                        <option value="gram">gram</option>
                    </select>
                </div>
                <div class="form-hint">Disimpan dalam gram secara internal</div>
            </div>

            <div class="form-group">
                <label class="form-label" for="min_stock_weight">Batas Minimal</label>
                <div style="display: flex; gap: 8px;">
                    <input type="number" step="any" id="min_stock_weight" name="min_stock_weight" class="form-input" value="{{ old('min_stock_weight', 10) }}" min="0">
                    <select name="min_stock_unit" class="form-select" style="width: 120px;">
                        <option value="kg" selected>kg</option>
                        <option value="ton">ton</option>
                        <option value="gram">gram</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="notes">Catatan</label>
            <textarea id="notes" name="notes" rows="3" class="form-textarea" placeholder="Karakteristik garam, kadar air, dll.">{{ old('notes') }}</textarea>
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
