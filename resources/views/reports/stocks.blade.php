@extends('layouts.app')

@section('title', 'Laporan Stok')
@section('page-title', 'Laporan Stok')

@section('content')
<div class="kpi-grid">
    <div class="kpi-card">
        <div class="kpi-label">Stok Mentah</div>
        <div class="kpi-value">{{ $formattedRawTotal }}</div>
    </div>

    <div class="kpi-card">
        <div class="kpi-label">Stok Jadi</div>
        <div class="kpi-value">{{ number_format($totalPacks, 0, ',', '.') }} bungkus</div>
    </div>
</div>

<!-- 1. Tabel Stok Bahan Mentah -->
<div class="md-card" style="margin-bottom: 24px;">
    <div class="md-card-header no-print" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
        <div class="md-card-title">Laporan Saldo Stok Garam</div>
        <div style="display: flex; gap: 8px; align-items: center;">
            <a href="{{ route('reports.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
            <button onclick="window.print()" class="md-btn md-btn-primary md-btn-sm no-print">
                <span>Cetak Laporan</span>
            </button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="md-table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Bahan Mentah</th>
                    <th>Stok Tersedia</th>
                    <th>Satuan Dasar (Gram)</th>
                    <th>Batas Minimal</th>
                    <th>Status Stok</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rawMaterials as $rm)
                <tr>
                    <td><strong>{{ $rm->code }}</strong></td>
                    <td>{{ $rm->name }}</td>
                    <td>
                        <strong style="color: var(--md-sys-color-primary); font-size: 14px;">
                            {{ $rm->formatted_stock }}
                        </strong>
                    </td>
                    <td>{{ number_format($rm->stock_gram, 0, ',', '.') }} gram</td>
                    <td>{{ \App\Helpers\WeightFormatter::format($rm->min_stock_gram) }}</td>
                    <td>
                        @if($rm->stock_gram <= $rm->min_stock_gram)
                            <span class="status-indicator" style="color: var(--md-sys-color-error);">
                                <span class="status-dot danger"></span> Menipis
                            </span>
                        @else
                            <span class="status-indicator" style="color: var(--md-sys-color-success);">
                                <span class="status-dot success"></span> Aman
                            </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 20px;">Belum ada data barang mentah</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- 2. Tabel Stok Barang Jadi -->
<div class="md-card">
    <div class="md-card-header">
        <div class="md-card-title">Stok Jadi</div>
    </div>
    <div class="table-responsive">
        <table class="md-table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Produk</th>
                    <th>Kemasan</th>
                    <th>Stok Tersedia</th>
                    <th>Harga Jual</th>
                    <th>Batas Minimal</th>
                    <th>Status Stok</th>
                </tr>
            </thead>
            <tbody>
                @forelse($finishedProducts as $fp)
                <tr>
                    <td><strong>{{ $fp->code }}</strong></td>
                    <td>{{ $fp->name }}</td>
                    <td>{{ $fp->weight_per_pack_gram }} gram</td>
                    <td>
                        <strong style="color: var(--md-sys-color-secondary); font-size: 14px;">
                            {{ number_format($fp->stock_packs, 0, ',', '.') }} bungkus
                        </strong>
                    </td>
                    <td>Rp {{ number_format($fp->price_per_pack, 0, ',', '.') }}</td>
                    <td>{{ number_format($fp->min_stock_packs, 0, ',', '.') }} bungkus</td>
                    <td>
                        @if($fp->stock_packs <= $fp->min_stock_packs)
                            <span class="status-indicator" style="color: var(--md-sys-color-error);">
                                <span class="status-dot danger"></span> Menipis
                            </span>
                        @else
                            <span class="status-indicator" style="color: var(--md-sys-color-success);">
                                <span class="status-dot success"></span> Aman
                            </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 20px;">Belum ada data barang jadi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
