@extends('layouts.app')

@section('title', 'Detail Batch Produksi')
@section('page-title', 'Detail')

@section('content')
<div class="md-card" style="max-width: 800px; margin: 0 auto;">
    <div class="md-card-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
        <div class="md-card-title">Produksi: {{ $production->production_number }}</div>
        <a href="{{ route('productions.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    </div>

    <div class="kpi-grid">
        <div class="kpi-card">
            <div>
                <div class="kpi-label">Hasil Produksi</div>
                <div class="kpi-value">{{ number_format($production->pack_quantity, 0, ',', '.') }} bungkus</div>
            </div>
        </div>

        <div class="kpi-card">
            <div>
                <div class="kpi-label">Pengurangan Mentah</div>
                <div class="kpi-value">{{ $production->formatted_raw_used }}</div>
            </div>
        </div>

        <div class="kpi-card">
            <div>
                <div class="kpi-label">Standar Kemasan</div>
                <div class="kpi-value">{{ $production->weight_per_pack_gram }} gram / bks</div>
            </div>
        </div>
    </div>

    <div class="table-responsive" style="margin-bottom: 24px;">
        <table class="md-table">
            <thead>
                <tr>
                    <th>Komponen</th>
                    <th>Nama Item</th>
                    <th>Perubahan Stok</th>
                    <th>Detail Perhitungan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Bahan Mentah Digunakan</strong></td>
                    <td>{{ $production->rawMaterial->name }}</td>
                    <td style="color: var(--md-sys-color-error); font-weight: 700;">
                        -{{ $production->formatted_raw_used }}
                    </td>
                    <td>{{ number_format($production->total_raw_used_gram, 0, ',', '.') }} gram ({{ $production->pack_quantity }} × 300g)</td>
                </tr>
                <tr>
                    <td><strong>Barang Jadi Masuk</strong></td>
                    <td>{{ $production->finishedProduct->name }}</td>
                    <td style="color: var(--md-sys-color-success); font-weight: 700;">
                        +{{ number_format($production->pack_quantity, 0, ',', '.') }} bungkus
                    </td>
                    <td>Siap dipasarkan melalui kasir POS</td>
                </tr>
            </tbody>
        </table>
    </div>

    @if($production->notes)
    <div style="padding: 14px; background-color: var(--md-sys-color-surface-container-high); border-radius: var(--md-shape-corner-small); margin-bottom: 20px;">
        <div style="font-weight: 600; font-size: 12.5px; margin-bottom: 4px;">Catatan Produksi:</div>
        <div style="font-size: 13.5px;">{{ $production->notes }}</div>
    </div>
    @endif

    <div style="font-size: 12px; color: var(--md-sys-color-on-surface-variant); text-align: right;">
        Dicatat oleh: {{ $production->user->name ?? 'Admin' }} pada {{ $production->created_at->format('d/m/Y H:i') }}
    </div>
</div>
@endsection
