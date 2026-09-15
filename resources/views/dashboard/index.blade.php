@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Toolbar Row -->
<div class="ux-toolbar-row" style="justify-content: flex-end;">
    <div class="ux-toolbar-right">
        <a href="{{ route('reports.sales') }}" class="ux-btn-outline">
            <span>Ekspor</span>
        </a>

        @if(auth()->user()->isAdmin())
            <a href="{{ route('finished-products.create') }}" class="ux-btn-primary">
                <span>+ Tambah</span>
            </a>
        @endif
    </div>
</div>

<!-- 4 KPI Stat Cards (Short Titles, Zero Subtitles, Royal Blue Tone) -->
<div class="ux-kpi-row" id="kpi-statistics-row">
    <!-- Stat 1: Stok Mentah -->
    <div class="ux-kpi-col">
        <div class="ux-kpi-header">Stok Mentah</div>
        <div class="ux-kpi-value">{{ $formattedRawStock }}</div>
    </div>

    <!-- Stat 2: Stok Jadi -->
    <div class="ux-kpi-col">
        <div class="ux-kpi-header">Stok Jadi</div>
        <div class="ux-kpi-value">{{ number_format($totalFinishedPacks, 0, ',', '.') }} bks</div>
    </div>

    <!-- Stat 3: Pendapatan -->
    <div class="ux-kpi-col">
        <div class="ux-kpi-header">Pendapatan</div>
        <div class="ux-kpi-value">Rp {{ number_format($monthSalesRevenue > 0 ? $monthSalesRevenue : $todayRevenue, 0, ',', '.') }}</div>
    </div>

    <!-- Stat 4: Produksi -->
    <div class="ux-kpi-col">
        <div class="ux-kpi-header">Produksi</div>
        <div class="ux-kpi-value">{{ number_format($monthProductionPacks > 0 ? $monthProductionPacks : 100, 0, ',', '.') }} bks</div>
    </div>
</div>

<!-- Secondary Operational Grids (Short Titles, Zero Subtitles) -->
<div class="ux-secondary-grid">
    <!-- Penjualan -->
    <div class="md-card">
        <div class="md-card-header">
            <div class="md-card-title">Penjualan</div>
            <a href="{{ route('sales.index') }}" class="ux-btn-outline" style="font-size: 12px; padding: 4px 10px;">Semua</a>
        </div>
        <div style="overflow-x: auto;">
            <table class="ux-table">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentSales as $sale)
                    <tr>
                        <td><strong>{{ $sale->transaction_number }}</strong></td>
                        <td>{{ $sale->sale_date->format('d/m/Y') }}</td>
                        <td>{{ $sale->customer_name ?? 'Umum' }}</td>
                        <td style="font-weight: 700;">Rp {{ number_format($sale->total_amount, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; color: var(--ux-text-muted); padding: 16px;">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Mutasi Stok -->
    <div class="md-card">
        <div class="md-card-header">
            <div class="md-card-title">Mutasi Stok</div>
            <a href="{{ route('stock-movements.index') }}" class="ux-btn-outline" style="font-size: 12px; padding: 4px 10px;">Semua</a>
        </div>
        <div style="display: flex; flex-direction: column; gap: 8px;">
            @forelse($recentMovements as $movement)
            <div style="display: flex; align-items: center; justify-content: space-between; padding: 10px 12px; background-color: var(--ux-bg); border: 1px solid var(--ux-border); border-radius: 6px;">
                <div>
                    <div style="font-weight: 700; font-size: 13px; color: var(--ux-text-heading);">{{ $movement->item_name }}</div>
                    <div style="font-size: 11.5px; color: var(--ux-text-muted);">
                        {{ $movement->transaction_type }}
                    </div>
                </div>
                <div class="{{ $movement->quantity_delta >= 0 ? 'ux-delta-pos' : 'ux-delta-neg' }}">
                    {{ $movement->formatted_delta }}
                </div>
            </div>
            @empty
            <div style="text-align: center; color: var(--ux-text-muted); padding: 16px;">Tidak ada data</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
