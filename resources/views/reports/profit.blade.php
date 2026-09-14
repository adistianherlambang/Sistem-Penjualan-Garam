@extends('layouts.app')

@section('title', 'Laba Rugi')
@section('page-title', 'Laba Rugi')

@section('topbar-actions')
    <a href="{{ route('reports.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    <button onclick="window.print()" class="md-btn md-btn-primary md-btn-sm no-print">
        <span>Cetak</span>
    </button>
@endsection

@section('content')
<div class="kpi-grid">
    <div class="kpi-card">
        <div>
            <div class="kpi-label">Laba Kotor</div>
            <div class="kpi-value">Rp {{ number_format($grossProfit, 0, ',', '.') }}</div>
        </div>
    </div>

    <div class="kpi-card">
        <div>
            <div class="kpi-label">Margin Keuntungan</div>
            <div class="kpi-value">{{ number_format($profitMargin, 1, ',', '.') }}%</div>
        </div>
    </div>

    <div class="kpi-card">
        <div>
            <div class="kpi-label">Total Omzet Penjualan</div>
            <div class="kpi-value">Rp {{ number_format($totalSales, 0, ',', '.') }}</div>
        </div>
    </div>
</div>

<div class="md-card">
    <div class="md-card-header no-print">
        <div>
            <div class="md-card-title">Filter Periode Analisis</div>
            <div class="md-card-subtitle">Rentang waktu kalkulasi laba</div>
        </div>
    </div>

    <form action="{{ route('reports.profit') }}" method="GET" class="no-print" style="display: flex; gap: 12px; margin-bottom: 24px; flex-wrap: wrap;">
        <input type="date" name="start_date" class="form-input" style="width: 170px;" value="{{ $startDate }}">
        <input type="date" name="end_date" class="form-input" style="width: 170px;" value="{{ $endDate }}">
        <button type="submit" class="md-btn md-btn-primary md-btn-sm">Hitung</button>
    </form>

    <div style="max-width: 680px; margin: 0 auto; background-color: var(--md-sys-color-surface-container-high); border-radius: var(--md-shape-corner-medium); padding: 24px; border: 1px solid var(--md-sys-color-outline-variant);">
        <div style="font-size: 16px; font-weight: 700; margin-bottom: 16px; border-bottom: 1px solid var(--md-sys-color-outline); padding-bottom: 10px;">
            Rincian Laba Kotor (Gross Profit)
        </div>

        <div style="display: flex; justify-content: space-between; padding: 10px 0; font-size: 14px;">
            <span>Total Pendapatan Penjualan:</span>
            <strong>Rp {{ number_format($totalSales, 0, ',', '.') }}</strong>
        </div>

        <div style="display: flex; justify-content: space-between; padding: 10px 0; font-size: 14px; color: var(--md-sys-color-error);">
            <span>Harga Pokok Penjualan (HPP):</span>
            <strong>- Rp {{ number_format($totalCogs, 0, ',', '.') }}</strong>
        </div>

        <div style="display: flex; justify-content: space-between; padding: 14px 0; font-size: 16px; font-weight: 700; border-top: 2px solid var(--md-sys-color-outline); color: var(--md-sys-color-success);">
            <span>Estimasi Laba Kotor:</span>
            <span>Rp {{ number_format($grossProfit, 0, ',', '.') }}</span>
        </div>

        <div style="margin-top: 20px; padding-top: 14px; border-top: 1px dashed var(--md-sys-color-outline); font-size: 13px; color: var(--md-sys-color-on-surface-variant);">
            * Total pengadaan pembelian bahan mentah pada periode ini: <strong>Rp {{ number_format($totalPurchases, 0, ',', '.') }}</strong><br>
            * Margin dihitung dari: (Laba Kotor ÷ Total Penjualan) × 100%
        </div>
    </div>
</div>
@endsection
