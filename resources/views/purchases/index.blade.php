@extends('layouts.app')

@section('title', 'Pembelian')
@section('page-title', 'Pembelian')

@section('topbar-actions')
    @if(auth()->user()->isAdmin())
        <a href="{{ route('purchases.create') }}" class="md-btn md-btn-primary md-btn-sm">
            <span>Tambah</span>
        </a>
    @endif
@endsection

@section('content')
<div class="kpi-grid" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
    <div class="kpi-card">
        <div>
            <div class="kpi-label">Total Pembelian</div>
            <div class="kpi-value">Rp {{ number_format($totalSpent, 0, ',', '.') }}</div>
        </div>
    </div>
</div>

<div class="md-card">
    <div class="md-card-header">
        <div>
            <div class="md-card-title">Daftar Faktur Pembelian</div>
            <div class="md-card-subtitle">Transaksi penerimaan barang mentah</div>
        </div>
    </div>

    <!-- Filter Bar -->
    <form action="{{ route('purchases.index') }}" method="GET" style="display: flex; gap: 12px; margin-bottom: 20px; flex-wrap: wrap;">
        <select name="supplier_id" class="form-select" style="width: 220px;">
            <option value="">Semua Supplier</option>
            @foreach($suppliers as $s)
                <option value="{{ $s->id }}" {{ request('supplier_id') == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
            @endforeach
        </select>
        <input type="date" name="start_date" class="form-input" style="width: 170px;" value="{{ request('start_date') }}">
        <input type="date" name="end_date" class="form-input" style="width: 170px;" value="{{ request('end_date') }}">
        <button type="submit" class="md-btn md-btn-outlined md-btn-sm">Filter</button>
        @if(request()->hasAny(['supplier_id', 'start_date', 'end_date']))
            <a href="{{ route('purchases.index') }}" class="md-btn md-btn-text md-btn-sm">Reset</a>
        @endif
    </form>

    <div class="table-responsive">
        <table class="md-table">
            <thead>
                <tr>
                    <th>Faktur</th>
                    <th>Tanggal</th>
                    <th>Supplier</th>
                    <th>Barang</th>
                    <th>Berat</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($purchases as $purchase)
                <tr>
                    <td><strong>{{ $purchase->invoice_number }}</strong></td>
                    <td>{{ $purchase->purchase_date->format('d/m/Y') }}</td>
                    <td>{{ $purchase->supplier->name ?? '-' }}</td>
                    <td>{{ $purchase->rawMaterial->name ?? '-' }}</td>
                    <td>
                        <strong>{{ $purchase->formatted_weight }}</strong>
                        <span style="font-size: 11px; color: var(--md-sys-color-on-surface-variant);">
                            ({{ $purchase->weight_value }} {{ $purchase->weight_unit }})
                        </span>
                    </td>
                    <td>Rp {{ number_format($purchase->price_per_unit, 0, ',', '.') }}</td>
                    <td><strong>Rp {{ number_format($purchase->total_price, 0, ',', '.') }}</strong></td>
                    <td style="text-align: right;">
                        <a href="{{ route('purchases.show', $purchase) }}" class="md-btn md-btn-outlined md-btn-sm">Detail</a>
                        <a href="{{ route('purchases.print', $purchase) }}" target="_blank" class="md-btn md-btn-text md-btn-sm">Cetak</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 24px;">Belum ada data pembelian</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $purchases->links() }}
    </div>
</div>
@endsection
