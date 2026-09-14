@extends('layouts.app')

@section('title', 'Laporan Produksi')
@section('page-title', 'Laporan Produksi')

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
        <div class="kpi-icon-box info">
            <span class="material-symbols-outlined">precision_manufacturing</span>
        </div>
        <div>
            <div class="kpi-label">Hasil Produksi</div>
            <div class="kpi-value">{{ number_format($totalPacks, 0, ',', '.') }} bungkus</div>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-icon-box primary">
            <span class="material-symbols-outlined">warehouse</span>
        </div>
        <div>
            <div class="kpi-label">Mentah Terpakai</div>
            <div class="kpi-value">{{ $formattedRawUsed }}</div>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-icon-box secondary">
            <span class="material-symbols-outlined">tag</span>
        </div>
        <div>
            <div class="kpi-label">Jumlah Batch</div>
            <div class="kpi-value">{{ $productions->count() }} batch</div>
        </div>
    </div>
</div>

<div class="md-card">
    <div class="md-card-header no-print">
        <div>
            <div class="md-card-title">Filter Periode</div>
            <div class="md-card-subtitle">Pilih rentang tanggal produksi</div>
        </div>
    </div>

    <form action="{{ route('reports.productions') }}" method="GET" class="no-print" style="display: flex; gap: 12px; margin-bottom: 24px; flex-wrap: wrap;">
        <input type="date" name="start_date" class="form-input" style="width: 170px;" value="{{ $startDate }}">
        <input type="date" name="end_date" class="form-input" style="width: 170px;" value="{{ $endDate }}">
        <button type="submit" class="md-btn md-btn-primary md-btn-sm">Tampilkan</button>
    </form>

    <div class="table-responsive">
        <table class="md-table">
            <thead>
                <tr>
                    <th>Nomor Batch</th>
                    <th>Tanggal</th>
                    <th>Bahan Mentah</th>
                    <th>Barang Jadi</th>
                    <th>Hasil Bungkus</th>
                    <th>Total Mentah Digunakan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productions as $prod)
                <tr>
                    <td><strong>{{ $prod->production_number }}</strong></td>
                    <td>{{ $prod->production_date->format('d/m/Y') }}</td>
                    <td>{{ $prod->rawMaterial->name ?? '-' }}</td>
                    <td>{{ $prod->finishedProduct->name ?? '-' }}</td>
                    <td>
                        <strong style="color: var(--md-sys-color-secondary);">
                            {{ number_format($prod->pack_quantity, 0, ',', '.') }} bungkus
                        </strong>
                    </td>
                    <td><strong>{{ $prod->formatted_raw_used }}</strong></td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 24px;">Tidak ada data produksi pada periode ini</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
