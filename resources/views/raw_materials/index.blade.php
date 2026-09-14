@extends('layouts.app')

@section('title', 'Barang Mentah')
@section('page-title', 'Barang Mentah')

@section('topbar-actions')
    @if(auth()->user()->isAdmin())
        <a href="{{ route('raw-materials.create') }}" class="md-btn md-btn-primary md-btn-sm">
            <span>Tambah</span>
        </a>
    @endif
@endsection

@section('content')
<div class="kpi-grid" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
    <div class="kpi-card">
        <div class="kpi-label">Stok Mentah</div>
        <div class="kpi-value">{{ $formattedTotalStock }}</div>
    </div>
</div>

<div class="md-card">
    <div class="md-card-header">
        <div class="md-card-title">Stok Mentah</div>
    </div>

    <div class="table-responsive">
        <table class="md-table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Stok Tersedia</th>
                    <th>Stok Minimal</th>
                    <th>Catatan</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rawMaterials as $item)
                <tr>
                    <td><strong>{{ $item->code }}</strong></td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <strong style="font-size: 14px; color: var(--md-sys-color-primary);">
                            {{ $item->formatted_stock }}
                        </strong>
                    </td>
                    <td>
                        {{ \App\Helpers\WeightFormatter::format($item->min_stock_gram) }}
                    </td>
                    <td>{{ $item->notes ?? '-' }}</td>
                    <td style="text-align: right;">
                        <a href="{{ route('raw-materials.show', $item) }}" class="md-btn md-btn-outlined md-btn-sm">Detail</a>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('raw-materials.edit', $item) }}" class="md-btn md-btn-text md-btn-sm">Ubah</a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 24px;">Belum ada data barang mentah</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $rawMaterials->links() }}
    </div>
</div>
@endsection
