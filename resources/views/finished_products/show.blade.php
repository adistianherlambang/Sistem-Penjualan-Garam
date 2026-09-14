@extends('layouts.app')

@section('title', 'Detail Barang Jadi')
@section('page-title', 'Detail')

@section('topbar-actions')
    <a href="{{ route('finished-products.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    @if(auth()->user()->isAdmin())
        <a href="{{ route('finished-products.edit', $finishedProduct) }}" class="md-btn md-btn-primary md-btn-sm">Ubah</a>
    @endif
@endsection

@section('content')
<div class="kpi-grid">
    <div class="kpi-card">
        <div>
            <div class="kpi-label">Stok Bungkus Tersedia</div>
            <div class="kpi-value">{{ number_format($finishedProduct->stock_packs, 0, ',', '.') }} bungkus</div>
        </div>
    </div>

    <div class="kpi-card">
        <div>
            <div class="kpi-label">Harga Jual</div>
            <div class="kpi-value">Rp {{ number_format($finishedProduct->price_per_pack, 0, ',', '.') }}</div>
        </div>
    </div>

    <div class="kpi-card">
        <div>
            <div class="kpi-label">Berat per Bungkus</div>
            <div class="kpi-value">{{ $finishedProduct->weight_per_pack_gram }} gram</div>
        </div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 24px;">
    <!-- Riwayat Produksi Masuk -->
    <div class="md-card">
        <div class="md-card-header">
            <div class="md-card-title">Produksi</div>
        </div>
        <div class="table-responsive">
            <table class="md-table">
                <thead>
                    <tr>
                        <th>Batch</th>
                        <th>Tanggal</th>
                        <th>Bahan Mentah</th>
                        <th>Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productions as $prod)
                    <tr>
                        <td>
                            <a href="{{ route('productions.show', $prod) }}" style="color: var(--md-sys-color-primary); text-decoration: none; font-weight: 600;">
                                {{ $prod->production_number }}
                            </a>
                        </td>
                        <td>{{ $prod->production_date->format('d/m/Y') }}</td>
                        <td>{{ $prod->rawMaterial->name ?? '-' }}</td>
                        <td><strong>+{{ number_format($prod->pack_quantity, 0, ',', '.') }} bks</strong></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 18px;">Belum ada riwayat produksi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Riwayat Penjualan Keluar -->
    <div class="md-card">
        <div class="md-card-header">
            <div class="md-card-title">Penjualan</div>
        </div>
        <div class="table-responsive">
            <table class="md-table">
                <thead>
                    <tr>
                        <th>Transaksi</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($saleItems as $item)
                    <tr>
                        <td>
                            <a href="{{ route('sales.show', $item->sale) }}" style="color: var(--md-sys-color-primary); text-decoration: none; font-weight: 600;">
                                {{ $item->sale->transaction_number }}
                            </a>
                        </td>
                        <td>{{ $item->sale->sale_date->format('d/m/Y') }}</td>
                        <td>{{ $item->sale->customer_name ?? 'Pelanggan Umum' }}</td>
                        <td style="color: var(--md-sys-color-error); font-weight: 700;">-{{ number_format($item->quantity_packs, 0, ',', '.') }} bks</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 18px;">Belum ada transaksi penjualan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Kartu Stok & Mutasi -->
<div class="md-card">
    <div class="md-card-header">
        <div class="md-card-title">Mutasi Stok</div>
    </div>
    <div class="table-responsive">
        <table class="md-table">
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Transaksi</th>
                    <th>Referensi</th>
                    <th>Perubahan</th>
                    <th>Saldo Akhir</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movements as $m)
                <tr>
                    <td>{{ $m->movement_date->format('d/m/Y H:i') }}</td>
                    <td>
                        <span class="status-indicator">
                            <span class="status-dot {{ $m->quantity_delta >= 0 ? 'success' : 'danger' }}"></span>
                            {{ $m->transaction_type }}
                        </span>
                    </td>
                    <td>{{ $m->reference_number ?? '-' }}</td>
                    <td class="text-bold {{ $m->quantity_delta >= 0 ? 'text-success' : 'text-danger' }}">
                        {{ $m->formatted_delta }}
                    </td>
                    <td><strong>{{ number_format($m->stock_after, 0, ',', '.') }} bungkus</strong></td>
                    <td>{{ $m->notes ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: var(--md-sys-color-on-surface-variant);">Belum ada mutasi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pagination-wrapper">
        {{ $movements->links() }}
    </div>
</div>
@endsection
