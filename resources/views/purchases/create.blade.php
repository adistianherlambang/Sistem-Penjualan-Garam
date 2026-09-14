@extends('layouts.app')

@section('title', 'Tambah Pembelian')
@section('page-title', 'Tambah')

@section('content')
<div class="md-card" style="max-width: 780px; margin: 0 auto;">
    <div class="md-card-header">
        <div class="md-card-title">Pembelian</div>
        <a href="{{ route('purchases.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    </div>

    <form action="{{ route('purchases.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="invoice_number">Nomor Faktur</label>
                <input type="text" id="invoice_number" name="invoice_number" class="form-input {{ $errors->has('invoice_number') ? 'is-invalid' : '' }}" value="{{ old('invoice_number', $autoInvoiceNumber) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="purchase_date">Tanggal Faktur</label>
                <input type="date" id="purchase_date" name="purchase_date" class="form-input {{ $errors->has('purchase_date') ? 'is-invalid' : '' }}" value="{{ old('purchase_date', date('Y-m-d')) }}" required>
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="supplier_id">Supplier</label>
                <select id="supplier_id" name="supplier_id" class="form-select {{ $errors->has('supplier_id') ? 'is-invalid' : '' }}" required>
                    <option value="">Pilih Supplier</option>
                    @foreach($suppliers as $s)
                        <option value="{{ $s->id }}" {{ old('supplier_id') == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="raw_material_id">Nama Barang Mentah</label>
                <select id="raw_material_id" name="raw_material_id" class="form-select {{ $errors->has('raw_material_id') ? 'is-invalid' : '' }}" required>
                    <option value="">Pilih Barang Mentah</option>
                    @foreach($rawMaterials as $rm)
                        <option value="{{ $rm->id }}" {{ old('raw_material_id') == $rm->id ? 'selected' : '' }}>{{ $rm->name }} (Stok: {{ $rm->formatted_stock }})</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="purchase_weight_value">Berat Barang</label>
                <div style="display: flex; gap: 8px;">
                    <input type="number" step="any" id="purchase_weight_value" name="weight_value" class="form-input {{ $errors->has('weight_value') ? 'is-invalid' : '' }}" value="{{ old('weight_value') }}" placeholder="Contoh: 30" required min="0.001">
                    <select id="purchase_weight_unit" name="weight_unit" class="form-select" style="width: 120px;">
                        <option value="kg" {{ old('weight_unit', 'kg') == 'kg' ? 'selected' : '' }}>kg</option>
                        <option value="ton" {{ old('weight_unit') == 'ton' ? 'selected' : '' }}>ton</option>
                        <option value="gram" {{ old('weight_unit') == 'gram' ? 'selected' : '' }}>gram</option>
                    </select>
                </div>
                <div class="form-hint">Otomatis dikonversi ke satuan dasar gram</div>
            </div>

            <div class="form-group">
                <label class="form-label" for="purchase_price_unit">Harga Beli per Satuan (Rp)</label>
                <input type="number" step="any" id="purchase_price_unit" name="price_per_unit" class="form-input {{ $errors->has('price_per_unit') ? 'is-invalid' : '' }}" value="{{ old('price_per_unit', 0) }}" min="0" required>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="purchase_total_price">Total (Rp)</label>
            <input type="number" step="any" id="purchase_total_price" name="total_price" class="form-input {{ $errors->has('total_price') ? 'is-invalid' : '' }}" value="{{ old('total_price', 0) }}" min="0" required style="font-weight: 700; font-size: 15px;">
        </div>

        <div class="form-group">
            <label class="form-label" for="notes">Catatan</label>
            <textarea id="notes" name="notes" rows="3" class="form-textarea" placeholder="Nomor polisi armada, kualitas garam, dll.">{{ old('notes') }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="md-btn md-btn-primary">
                <span>Simpan</span>
            </button>
            <a href="{{ route('purchases.index') }}" class="md-btn md-btn-outlined">Batal</a>
        </div>
    </form>
</div>
@endsection
