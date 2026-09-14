@extends('layouts.app')

@section('title', 'Laporan Penjualan')
@section('page-title', 'Laporan Penjualan')

@section('topbar-actions')
    <a href="{{ route('reports.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    <button onclick="window.print()" class="md-btn md-btn-primary md-btn-sm no-print">
        <span>Cetak</span>
    </button>
@endsection

@section('content')
<div class="kpi-grid">
    <div class="kpi-card">
        <div class="kpi-label">Omzet</div>
        <div class="kpi-value">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
    </div>

    <div class="kpi-card">
        <div class="kpi-label">Transaksi</div>
        <div class="kpi-value">{{ number_format($totalTransactions, 0, ',', '.') }}</div>
    </div>

    <div class="kpi-card">
        <div class="kpi-label">Terjual</div>
        <div class="kpi-value">{{ number_format($totalPacksSold, 0, ',', '.') }} bks</div>
    </div>
</div>

<div class="md-card">
    <div class="md-card-header no-print">
        <div class="md-card-title">Filter</div>
    </div>

    <form action="{{ route('reports.sales') }}" method="GET" class="no-print" style="display: flex; gap: 12px; margin-bottom: 24px; flex-wrap: wrap;">
        <input type="date" name="start_date" class="form-input" style="width: 170px;" value="{{ $startDate }}">
        <input type="date" name="end_date" class="form-input" style="width: 170px;" value="{{ $endDate }}">
        <button type="submit" class="md-btn md-btn-primary md-btn-sm">Tampilkan</button>
    </form>

    <div class="table-responsive">
        <table class="md-table">
            <thead>
                <tr>
                    <th>Nomor Transaksi</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Rincian Produk</th>
                    <th>Jumlah</th>
                    <th>Metode</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sales as $sale)
                <tr>
                    <td><strong>{{ $sale->transaction_number }}</strong></td>
                    <td>{{ $sale->sale_date->format('d/m/Y') }}</td>
                    <td>{{ $sale->customer_name ?? 'Pelanggan Umum' }}</td>
                    <td>
                        @foreach($sale->items as $item)
                            <div>{{ $item->product->name ?? '-' }}</div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($sale->items as $item)
                            <div>{{ number_format($item->quantity_packs, 0, ',', '.') }} bungkus</div>
                        @endforeach
                    </td>
                    <td>{{ ucfirst($sale->payment_method) }}</td>
                    <td style="text-align: right; font-weight: 700;">
                        Rp {{ number_format($sale->total_amount, 0, ',', '.') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 24px;">Tidak ada data penjualan pada periode ini</td>
                </tr>
                @endforelse
            </tbody>
            @if($sales->count() > 0)
            <tfoot>
                <tr>
                    <td colspan="6" style="text-align: right; font-weight: 700; border-top: 2px solid var(--md-sys-color-outline);">TOTAL OMZET:</td>
                    <td style="text-align: right; font-weight: 700; font-size: 15px; color: var(--md-sys-color-primary); border-top: 2px solid var(--md-sys-color-outline);">
                        Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
            @endif
        </table>
    </div>
</div>
@endsection
