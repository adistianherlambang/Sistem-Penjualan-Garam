@extends('layouts.app')

@section('title', 'Laporan Pembelian')
@section('page-title', 'Laporan Pembelian')

@section('topbar-actions')
    <a href="{{ route('reports.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    <button onclick="window.print()" class="md-btn md-btn-primary md-btn-sm no-print">
        <span class="material-symbols-outlined">print</span>
        <span>Cetak</span>
    </button>
@endsection

@section('content')
<div class="kpi-grid">
    <div class="kpi-card">
        <div class="kpi-icon-box primary">
            <span class="material-symbols-outlined">shopping_cart</span>
        </div>
        <div>
            <div class="kpi-label">Total Pembelian</div>
            <div class="kpi-value">Rp {{ number_format($totalSpent, 0, ',', '.') }}</div>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-icon-box secondary">
            <span class="material-symbols-outlined">warehouse</span>
        </div>
        <div>
            <div class="kpi-label">Total Berat Masuk</div>
            <div class="kpi-value">{{ $formattedTotalWeight }}</div>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-icon-box info">
            <span class="material-symbols-outlined">receipt_long</span>
        </div>
        <div>
            <div class="kpi-label">Jumlah Faktur</div>
            <div class="kpi-value">{{ $purchases->count() }} faktur</div>
        </div>
    </div>
</div>

<div class="md-card">
    <div class="md-card-header no-print">
        <div>
            <div class="md-card-title">Filter Periode</div>
            <div class="md-card-subtitle">Pilih rentang tanggal transaksi</div>
        </div>
    </div>

    <form action="{{ route('reports.purchases') }}" method="GET" class="no-print" style="display: flex; gap: 12px; margin-bottom: 24px; flex-wrap: wrap;">
        <input type="date" name="start_date" class="form-input" style="width: 170px;" value="{{ $startDate }}">
        <input type="date" name="end_date" class="form-input" style="width: 170px;" value="{{ $endDate }}">
        <button type="submit" class="md-btn md-btn-primary md-btn-sm">Tampilkan</button>
    </form>

    <div class="table-responsive">
        <table class="md-table">
            <thead>
                <tr>
                    <th>Nomor Faktur</th>
                    <th>Tanggal</th>
                    <th>Supplier</th>
                    <th>Barang Mentah</th>
                    <th>Berat</th>
                    <th>Harga Beli</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse($purchases as $p)
                <tr>
                    <td><strong>{{ $p->invoice_number }}</strong></td>
                    <td>{{ $p->purchase_date->format('d/m/Y') }}</td>
                    <td>{{ $p->supplier->name ?? '-' }}</td>
                    <td>{{ $p->rawMaterial->name ?? '-' }}</td>
                    <td><strong>{{ $p->formatted_weight }}</strong></td>
                    <td>Rp {{ number_format($p->price_per_unit, 0, ',', '.') }}</td>
                    <td style="text-align: right; font-weight: 700;">
                        Rp {{ number_format($p->total_price, 0, ',', '.') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 24px;">Tidak ada data pembelian pada periode ini</td>
                </tr>
                @endforelse
            </tbody>
            @if($purchases->count() > 0)
            <tfoot>
                <tr>
                    <td colspan="6" style="text-align: right; font-weight: 700; border-top: 2px solid var(--md-sys-color-outline);">TOTAL PEMBELIAN:</td>
                    <td style="text-align: right; font-weight: 700; font-size: 15px; color: var(--md-sys-color-primary); border-top: 2px solid var(--md-sys-color-outline);">
                        Rp {{ number_format($totalSpent, 0, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
            @endif
        </table>
    </div>
</div>
@endsection
