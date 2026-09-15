@extends('layouts.app')

@section('title', 'Produk & Barang Jadi')
@section('page-title', 'Produk Jadi')

@section('content')
<div class="kpi-grid" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
    <div class="kpi-card">
        <div class="kpi-label">Total Stok Fisik</div>
        <div class="kpi-value">{{ number_format($totalPacks, 0, ',', '.') }} bungkus</div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Jumlah Produk Aktif</div>
        <div class="kpi-value">{{ $products->total() }} SKU</div>
    </div>
</div>

<div class="md-card">
    <div class="md-card-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
        <div class="md-card-title">Katalog Produk & Barang Jadi</div>
        <div style="display: flex; gap: 8px; align-items: center;">
            <a href="{{ url('/produk') }}" target="_blank" class="md-btn md-btn-outlined md-btn-sm">
                <span>Lihat di Web</span>
            </a>
            @if(auth()->user()->isAdmin())
                <a href="{{ route('finished-products.create') }}" class="md-btn md-btn-primary md-btn-sm">
                    <span>+ Tambah Produk</span>
                </a>
            @endif
        </div>
    </div>

    <div class="table-responsive">
        <table class="md-table">
            <thead>
                <tr>
                    <th style="width: 60px;">Foto</th>
                    <th>Kode</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Kemasan</th>
                    <th>Stok</th>
                    <th>Harga Jual</th>
                    <th>Status</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $prod)
                <tr>
                    <td>
                        <img src="{{ $prod->image_url }}" alt="{{ $prod->name }}" style="width: 44px; height: 44px; object-fit: cover; border-radius: 6px; border: 1px solid var(--ux-border);">
                    </td>
                    <td><strong>{{ $prod->code }}</strong></td>
                    <td>
                        <div style="font-weight: 600;">{{ $prod->name }}</div>
                        @if($prod->notes)
                            <small style="color: var(--md-sys-color-on-surface-variant);">{{ Str::limit($prod->notes, 40) }}</small>
                        @endif
                    </td>
                    <td>
                        <span style="display: inline-block; padding: 2px 8px; border-radius: 12px; font-size: 11px; background: #e0f2fe; color: #0369a1; font-weight: 500;">
                            {{ $prod->category ?? 'Garam Konsumsi' }}
                        </span>
                    </td>
                    <td>{{ $prod->packaging ?? ($prod->weight_per_pack_gram . ' gram') }}</td>
                    <td>
                        @if($prod->stock_packs <= $prod->min_stock_packs)
                            <strong style="font-size: 14px; color: #b91c1c;">
                                {{ number_format($prod->stock_packs, 0, ',', '.') }}
                            </strong>
                        @else
                            <strong style="font-size: 14px; color: var(--md-sys-color-secondary);">
                                {{ number_format($prod->stock_packs, 0, ',', '.') }}
                            </strong>
                        @endif
                    </td>
                    <td>Rp {{ number_format($prod->price_per_pack, 0, ',', '.') }}</td>
                    <td>
                        @if($prod->is_active)
                            <span style="color: #15803d; font-weight: 600; font-size: 12px;">Aktif</span>
                        @else
                            <span style="color: #6b7280; font-size: 12px;">Nonaktif</span>
                        @endif
                    </td>
                    <td style="text-align: right; white-space: nowrap;">
                        <a href="{{ route('finished-products.show', $prod) }}" class="md-btn md-btn-outlined md-btn-sm">Detail</a>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('finished-products.edit', $prod) }}" class="md-btn md-btn-text md-btn-sm">Ubah</a>
                            <form action="{{ route('finished-products.destroy', $prod) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="md-btn md-btn-text md-btn-sm" style="color: #dc2626;">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 24px;">Belum ada data barang jadi</td>
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
