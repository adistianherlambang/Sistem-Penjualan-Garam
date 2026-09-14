@extends('layouts.app')

@section('title', 'Detail Penjualan')
@section('page-title', 'Detail')

@section('topbar-actions')
    <a href="{{ route('sales.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    <a href="{{ route('sales.receipt', $sale) }}" target="_blank" class="md-btn md-btn-secondary md-btn-sm">
        <span class="material-symbols-outlined">receipt</span>
        <span>Nota</span>
    </a>
    <a href="{{ route('sales.invoice', $sale) }}" target="_blank" class="md-btn md-btn-primary md-btn-sm">
        <span class="material-symbols-outlined">description</span>
        <span>Faktur</span>
    </a>
@endsection

@section('content')
<div class="md-card" style="max-width: 780px; margin: 0 auto;">
    <div class="md-card-header">
        <div>
            <div class="md-card-title">Transaksi: {{ $sale->transaction_number }}</div>
            <div class="md-card-subtitle">Tanggal: {{ $sale->sale_date->format('d F Y') }}</div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; padding-bottom: 20px; border-bottom: 1px solid var(--md-sys-color-outline-variant); margin-bottom: 20px;">
        <div>
            <div style="font-size: 12px; color: var(--md-sys-color-on-surface-variant);">Pelanggan:</div>
            <div style="font-size: 16px; font-weight: 700; margin-top: 4px;">{{ $sale->customer_name ?? 'Pelanggan Umum' }}</div>
            <div style="font-size: 13px; color: var(--md-sys-color-on-surface-variant); margin-top: 2px;">
                Metode Pembayaran: {{ ucfirst($sale->payment_method) }}
            </div>
        </div>
        <div style="text-align: right;">
            <div style="font-size: 12px; color: var(--md-sys-color-on-surface-variant);">Kasir:</div>
            <div style="font-weight: 600; margin-top: 4px;">{{ $sale->user->name ?? 'Admin' }}</div>
            <div style="font-size: 12px; color: var(--md-sys-color-on-surface-variant); margin-top: 2px;">
                {{ $sale->created_at->format('d/m/Y H:i') }}
            </div>
        </div>
    </div>

    <div class="table-responsive" style="margin-bottom: 20px;">
        <table class="md-table">
            <thead>
                <tr>
                    <th>Produk Garam</th>
                    <th>Kemasan</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th style="text-align: right;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sale->items as $item)
                <tr>
                    <td><strong>{{ $item->product->name }}</strong></td>
                    <td>{{ $item->product->weight_per_pack_gram }} gram</td>
                    <td>Rp {{ number_format($item->price_per_pack, 0, ',', '.') }}</td>
                    <td><strong>{{ number_format($item->quantity_packs, 0, ',', '.') }} bungkus</strong></td>
                    <td style="text-align: right; font-weight: 700;">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: right; font-weight: 700; border-top: 2px solid var(--md-sys-color-outline);">Total Tagihan:</td>
                    <td style="text-align: right; font-weight: 700; font-size: 16px; color: var(--md-sys-color-primary); border-top: 2px solid var(--md-sys-color-outline);">
                        Rp {{ number_format($sale->total_amount, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right; border-top: none;">Jumlah Bayar:</td>
                    <td style="text-align: right; font-weight: 600; border-top: none;">Rp {{ number_format($sale->paid_amount, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right; border-top: none; font-weight: 700;">Kembalian:</td>
                    <td style="text-align: right; font-weight: 700; color: var(--md-sys-color-success); border-top: none;">
                        Rp {{ number_format($sale->change_amount, 0, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    @if($sale->notes)
    <div style="padding: 12px; background-color: var(--md-sys-color-surface-container-high); border-radius: var(--md-shape-corner-small); margin-bottom: 24px;">
        <div style="font-weight: 600; font-size: 12px;">Catatan:</div>
        <div style="font-size: 13px;">{{ $sale->notes }}</div>
    </div>
    @endif

    <div style="display: flex; justify-content: flex-end; gap: 12px;">
        <a href="{{ route('sales.receipt', $sale) }}" target="_blank" class="md-btn md-btn-secondary">
            <span class="material-symbols-outlined">receipt</span>
            <span>Cetak Nota</span>
        </a>
        <a href="{{ route('sales.invoice', $sale) }}" target="_blank" class="md-btn md-btn-primary">
            <span class="material-symbols-outlined">description</span>
            <span>Cetak Faktur</span>
        </a>
    </div>
</div>
@endsection
