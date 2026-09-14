@extends('layouts.app')

@section('title', 'Detail Faktur Pembelian')
@section('page-title', 'Detail')

@section('topbar-actions')
    <a href="{{ route('purchases.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    <a href="{{ route('purchases.print', $purchase) }}" target="_blank" class="md-btn md-btn-primary md-btn-sm">
        <span>Cetak</span>
    </a>
@endsection

@section('content')
<div class="md-card" style="max-width: 800px; margin: 0 auto;">
    <div class="md-card-header">
        <div class="md-card-title">Faktur: {{ $purchase->invoice_number }}</div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; padding-bottom: 20px; border-bottom: 1px solid var(--md-sys-color-outline-variant); margin-bottom: 20px;">
        <div>
            <div style="font-size: 12px; color: var(--md-sys-color-on-surface-variant);">Pemasok (Supplier):</div>
            <div style="font-size: 15px; font-weight: 700; margin-top: 4px;">{{ $purchase->supplier->name }}</div>
            <div style="font-size: 13px; color: var(--md-sys-color-on-surface-variant); margin-top: 2px;">
                {{ $purchase->supplier->phone ?? 'Tanpa telepon' }}<br>
                {{ $purchase->supplier->address ?? 'Tanpa alamat' }}
            </div>
        </div>
        <div style="text-align: right;">
            <div style="font-size: 12px; color: var(--md-sys-color-on-surface-variant);">Pencatat:</div>
            <div style="font-weight: 600; margin-top: 4px;">{{ $purchase->user->name ?? 'Admin' }}</div>
            <div style="font-size: 12px; color: var(--md-sys-color-on-surface-variant); margin-top: 4px;">
                Waktu Input: {{ $purchase->created_at->format('d/m/Y H:i') }}
            </div>
        </div>
    </div>

    <div class="table-responsive" style="margin-bottom: 24px;">
        <table class="md-table">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Input Berat</th>
                    <th>Konversi Gram</th>
                    <th>Harga Satuan</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>{{ $purchase->rawMaterial->name }}</strong></td>
                    <td>{{ $purchase->weight_value }} {{ $purchase->weight_unit }}</td>
                    <td>{{ number_format($purchase->weight_in_gram, 0, ',', '.') }} gram ({{ $purchase->formatted_weight }})</td>
                    <td>Rp {{ number_format($purchase->price_per_unit, 0, ',', '.') }}</td>
                    <td style="text-align: right; font-weight: 700; font-size: 15px;">
                        Rp {{ number_format($purchase->total_price, 0, ',', '.') }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    @if($purchase->notes)
    <div style="margin-bottom: 24px; padding: 12px; background-color: var(--md-sys-color-surface-container-high); border-radius: var(--md-shape-corner-small);">
        <div style="font-weight: 600; font-size: 12.5px; margin-bottom: 4px;">Catatan:</div>
        <div style="font-size: 13px;">{{ $purchase->notes }}</div>
    </div>
    @endif

    <div style="display: flex; justify-content: flex-end; gap: 12px;">
        <a href="{{ route('purchases.print', $purchase) }}" target="_blank" class="md-btn md-btn-primary">
            <span>Cetak</span>
        </a>
    </div>
</div>
@endsection
