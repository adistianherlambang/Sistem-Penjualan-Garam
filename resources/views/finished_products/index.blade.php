@extends('layouts.app')

@section('title', 'Barang Jadi')
@section('page-title', 'Barang Jadi')

@section('topbar-actions')
    @if(auth()->user()->isAdmin())
        <a href="{{ route('finished-products.create') }}" class="md-btn md-btn-primary md-btn-sm">
            <span class="material-symbols-outlined">add</span>
            <span>Tambah</span>
        </a>
    @endif
@endsection

@section('content')
<div class="kpi-grid" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
    <div class="kpi-card">
        <div class="kpi-icon-box secondary">
            <span class="material-symbols-outlined">inventory_2</span>
        </div>
        <div>
            <div class="kpi-label">Total Stok Siap Jual</div>
            <div class="kpi-value">{{ number_format($totalPacks, 0, ',', '.') }} bungkus</div>
        </div>
    </div>
</div>

<div class="md-card">
    <div class="md-card-header">
        <div>
            <div class="md-card-title">Daftar Barang Jadi</div>
            <div class="md-card-subtitle">Garam kemasan siap jual (standar 1 bungkus = 300 gram)</div>
        </div>
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
                    <th>Harga Pokok</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $prod)
                <tr>
                    <td><strong>{{ $prod->code }}</strong></td>
                    <td>{{ $prod->name }}</td>
                    <td>{{ $prod->weight_per_pack_gram }} gram</td>
                    <td>
                        <strong style="font-size: 14px; color: var(--md-sys-color-secondary);">
                            {{ number_format($prod->stock_packs, 0, ',', '.') }} bungkus
                        </strong>
                    </td>
                    <td>Rp {{ number_format($prod->price_per_pack, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($prod->cost_per_pack, 0, ',', '.') }}</td>
                    <td style="text-align: right;">
                        <a href="{{ route('finished-products.show', $prod) }}" class="md-btn md-btn-outlined md-btn-sm">Detail</a>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('finished-products.edit', $prod) }}" class="md-btn md-btn-text md-btn-sm">Ubah</a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 24px;">Belum ada data barang jadi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $products->links() }}
    </div>
</div>
@endsection
