@extends('layouts.app')

@section('title', 'Kasir Penjualan')
@section('page-title', 'Kasir')

@section('content')
<div class="pos-container">
    <!-- Left: Transaction Input Form -->
    <div class="md-card">
        <div class="md-card-header">
            <div class="md-card-title">Penjualan</div>
            <a href="{{ route('sales.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
        </div>

        <form action="{{ route('sales.store') }}" method="POST" id="pos-sale-form">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label" for="sale_date">Tanggal</label>
                    <input type="date" id="sale_date" name="sale_date" class="form-input" value="{{ old('sale_date', date('Y-m-d')) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="customer_name">Nama Pelanggan</label>
                    <input type="text" id="customer_name" name="customer_name" class="form-input" value="{{ old('customer_name', 'Pelanggan Umum') }}" placeholder="Pelanggan Umum / Toko">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="sale_product_id">Pilih Produk Garam</label>
                <select id="sale_product_id" name="finished_product_id" class="form-select {{ $errors->has('finished_product_id') ? 'is-invalid' : '' }}" required>
                    <option value="">Pilih Produk Siap Jual</option>
                    @foreach($products as $p)
                        <option value="{{ $p->id }}" data-price="{{ $p->price_per_pack }}" {{ old('finished_product_id') == $p->id ? 'selected' : '' }}>
                            {{ $p->name }} • Stok: {{ number_format($p->stock_packs, 0, ',', '.') }} bks • Rp {{ number_format($p->price_per_pack, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label" for="sale_pack_quantity">Jumlah (Bungkus)</label>
                    <input type="number" id="sale_pack_quantity" name="pack_quantity" class="form-input {{ $errors->has('pack_quantity') ? 'is-invalid' : '' }}" value="{{ old('pack_quantity', 1) }}" min="1" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="sale_price_per_pack">Harga per Bungkus (Rp)</label>
                    <input type="number" step="any" id="sale_price_per_pack" name="price_per_pack" class="form-input {{ $errors->has('price_per_pack') ? 'is-invalid' : '' }}" value="{{ old('price_per_pack', 3500) }}" min="0" required>
                </div>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label" for="sale_paid_amount">Nominal Pembayaran (Rp)</label>
                    <input type="number" step="any" id="sale_paid_amount" name="paid_amount" class="form-input {{ $errors->has('paid_amount') ? 'is-invalid' : '' }}" value="{{ old('paid_amount', 0) }}" min="0" required style="font-size: 16px; font-weight: 700;">
                </div>

                <div class="form-group">
                    <label class="form-label" for="payment_method">Metode Pembayaran</label>
                    <select id="payment_method" name="payment_method" class="form-select">
                        <option value="cash" selected>Tunai (Cash)</option>
                        <option value="transfer">Transfer Bank</option>
                        <option value="qris">QRIS</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="notes">Catatan</label>
                <textarea id="notes" name="notes" rows="2" class="form-textarea" placeholder="Catatan transaksi (opsional)">{{ old('notes') }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="md-btn md-btn-primary" style="padding: 12px 24px; font-size: 14px;">
                    <span>Simpan</span>
                </button>
                <a href="{{ route('sales.index') }}" class="md-btn md-btn-outlined">Batal</a>
            </div>
        </form>
    </div>

    <!-- Right: Summary & Change Calculation Panel -->
    <div class="pos-cart-panel">
        <div style="font-size: 16px; font-weight: 700; color: var(--md-sys-color-on-surface); margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
            <span>Ringkasan Kasir</span>
        </div>

        <div style="background-color: var(--md-sys-color-surface-container-high); border-radius: var(--md-shape-corner-small); padding: 16px; margin-bottom: 18px;">
            <div class="pos-total-row">
                <span style="color: var(--md-sys-color-on-surface-variant);">Standar Berat:</span>
                <strong>300 gram / bungkus</strong>
            </div>
            <div class="pos-total-row">
                <span style="color: var(--md-sys-color-on-surface-variant);">Total Tagihan:</span>
                <strong id="sale_total_display" style="font-size: 18px; color: var(--md-sys-color-primary);">Rp 0</strong>
            </div>
            <div class="pos-total-row" style="margin-top: 8px; border-top: 1px dashed var(--md-sys-color-outline-variant); padding-top: 10px;">
                <span style="color: var(--md-sys-color-on-surface-variant);">Kembalian:</span>
                <strong id="sale_change_display" style="font-size: 16px; color: var(--md-sys-color-success);">Rp 0</strong>
            </div>
        </div>

        <div style="font-size: 12px; color: var(--md-sys-color-on-surface-variant); line-height: 1.5;">
            * Stok barang jadi akan otomatis berkurang setelah transaksi disimpan.<br>
            * Transaksi dicegah apabila stok barang jadi tidak mencukupi.<br>
            * Nota kasir dan faktur formal dapat langsung dicetak setelah transaksi berhasil disimpan.
        </div>
    </div>
</div>
@endsection
