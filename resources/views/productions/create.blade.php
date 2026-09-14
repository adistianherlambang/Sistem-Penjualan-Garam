@extends('layouts.app')

@section('title', 'Catat Produksi')
@section('page-title', 'Tambah')

@section('content')
<div class="md-card" style="max-width: 780px; margin: 0 auto;">
    <div class="md-card-header">
        <div>
            <div class="md-card-title">Pencatatan Hasil Produksi</div>
            <div class="md-card-subtitle">Standar produk jadi: 1 bungkus = 300 gram</div>
        </div>
        <a href="{{ route('productions.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    </div>

    <form action="{{ route('productions.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="production_date">Tanggal Produksi</label>
                <input type="date" id="production_date" name="production_date" class="form-input {{ $errors->has('production_date') ? 'is-invalid' : '' }}" value="{{ old('production_date', date('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="raw_material_id">Bahan Mentah yang Digunakan</label>
                <select id="raw_material_id" name="raw_material_id" class="form-select {{ $errors->has('raw_material_id') ? 'is-invalid' : '' }}" required>
                    <option value="">Pilih Bahan Mentah</option>
                    @foreach($rawMaterials as $rm)
                        <option value="{{ $rm->id }}" {{ old('raw_material_id') == $rm->id ? 'selected' : '' }}>
                            {{ $rm->name }} (Tersedia: {{ $rm->formatted_stock }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="finished_product_id">Barang Jadi yang Dihasilkan</label>
                <select id="finished_product_id" name="finished_product_id" class="form-select {{ $errors->has('finished_product_id') ? 'is-invalid' : '' }}" required>
                    <option value="">Pilih Produk Kemasan</option>
                    @foreach($finishedProducts as $fp)
                        <option value="{{ $fp->id }}" {{ old('finished_product_id') == $fp->id ? 'selected' : '' }}>
                            {{ $fp->name }} (Kemasan {{ $fp->weight_per_pack_gram }}g)
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="pack_quantity">Jumlah Hasil (Bungkus)</label>
                <input type="number" id="pack_quantity" name="pack_quantity" class="form-input {{ $errors->has('pack_quantity') ? 'is-invalid' : '' }}" value="{{ old('pack_quantity') }}" placeholder="Contoh: 80" min="1" required>
            </div>
        </div>

        <!-- Perhitungan Otomatis Material Design Card -->
        <div style="background-color: var(--md-sys-color-surface-container-high); border-radius: var(--md-shape-corner-medium); padding: 18px; margin: 20px 0; border: 1px solid var(--md-sys-color-outline-variant);">
            <div style="font-weight: 600; font-size: 13.5px; margin-bottom: 8px; color: var(--md-sys-color-on-surface);">
                Kalkulasi Pengurangan Bahan Mentah:
            </div>
            <div style="display: flex; align-items: center; justify-content: space-between; font-size: 13.5px;">
                <span>Rumus: Jumlah Bungkus × 300 gram</span>
                <span>Bahan Mentah yang Berkurang: <strong id="raw_used_preview" style="color: var(--md-sys-color-primary); font-size: 16px;">0 gram</strong></span>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="notes">Catatan Produksi</label>
            <textarea id="notes" name="notes" rows="3" class="form-textarea" placeholder="Shift kerja, nomor mesin packing, kondisi kristal, dll.">{{ old('notes') }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="md-btn md-btn-primary">
                <span class="material-symbols-outlined">precision_manufacturing</span>
                <span>Simpan</span>
            </button>
            <a href="{{ route('productions.index') }}" class="md-btn md-btn-outlined">Batal</a>
        </div>
    </form>
</div>
@endsection
