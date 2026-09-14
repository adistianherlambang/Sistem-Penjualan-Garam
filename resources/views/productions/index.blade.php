@extends('layouts.app')

@section('title', 'Produksi')
@section('page-title', 'Produksi')

@section('topbar-actions')
    @if(auth()->user()->isAdmin())
        <a href="{{ route('productions.create') }}" class="md-btn md-btn-primary md-btn-sm">
            <span class="material-symbols-outlined">add</span>
            <span>Tambah</span>
        </a>
    @endif
@endsection

@section('content')
<div class="kpi-grid">
    <div class="kpi-card">
        <div class="kpi-icon-box info">
            <span class="material-symbols-outlined">precision_manufacturing</span>
        </div>
        <div>
            <div class="kpi-label">Total Hasil Produksi</div>
            <div class="kpi-value">{{ number_format($totalPacksProduced, 0, ',', '.') }} bungkus</div>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-icon-box primary">
            <span class="material-symbols-outlined">warehouse</span>
        </div>
        <div>
            <div class="kpi-label">Garam Mentah Terpakai</div>
            <div class="kpi-value">{{ $formattedRawUsed }}</div>
        </div>
    </div>
</div>

<div class="md-card">
    <div class="md-card-header">
        <div>
            <div class="md-card-title">Daftar Batch Produksi</div>
            <div class="md-card-subtitle">Konversi garam mentah ke produk jadi kemasan 300g</div>
        </div>
    </div>

    <!-- Filter Bar -->
    <form action="{{ route('productions.index') }}" method="GET" style="display: flex; gap: 12px; margin-bottom: 20px; flex-wrap: wrap;">
        <input type="date" name="start_date" class="form-input" style="width: 170px;" value="{{ request('start_date') }}">
        <input type="date" name="end_date" class="form-input" style="width: 170px;" value="{{ request('end_date') }}">
        <button type="submit" class="md-btn md-btn-outlined md-btn-sm">Filter</button>
        @if(request()->hasAny(['start_date', 'end_date']))
            <a href="{{ route('productions.index') }}" class="md-btn md-btn-text md-btn-sm">Reset</a>
        @endif
    </form>

    <div class="table-responsive">
        <table class="md-table">
            <thead>
                <tr>
                    <th>Nomor Batch</th>
                    <th>Tanggal</th>
                    <th>Bahan Mentah Digunakan</th>
                    <th>Jumlah Bungkus</th>
                    <th>Berat Mentah Terpakai</th>
                    <th>Pencatat</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productions as $production)
                <tr>
                    <td><strong>{{ $production->production_number }}</strong></td>
                    <td>{{ $production->production_date->format('d/m/Y') }}</td>
                    <td>{{ $production->rawMaterial->name ?? '-' }}</td>
                    <td>
                        <strong style="color: var(--md-sys-color-secondary); font-size: 14px;">
                            {{ number_format($production->pack_quantity, 0, ',', '.') }} bungkus
                        </strong>
                    </td>
                    <td><strong>{{ $production->formatted_raw_used }}</strong></td>
                    <td>{{ $production->user->name ?? 'Admin' }}</td>
                    <td style="text-align: right;">
                        <a href="{{ route('productions.show', $production) }}" class="md-btn md-btn-outlined md-btn-sm">Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 24px;">Belum ada data produksi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $productions->links() }}
    </div>
</div>
@endsection
