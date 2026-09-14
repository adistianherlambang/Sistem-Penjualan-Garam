@extends('layouts.app')

@section('title', 'Detail Barang Mentah')
@section('page-title', 'Detail')

@section('topbar-actions')
    <a href="{{ route('raw-materials.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    @if(auth()->user()->isAdmin())
        <a href="{{ route('raw-materials.edit', $rawMaterial) }}" class="md-btn md-btn-primary md-btn-sm">Ubah</a>
    @endif
@endsection

@section('content')
<div class="kpi-grid">
    <div class="kpi-card">
        <div class="kpi-icon-box primary">
            <span class="material-symbols-outlined">warehouse</span>
        </div>
        <div>
            <div class="kpi-label">Stok Tersedia</div>
            <div class="kpi-value">{{ $rawMaterial->formatted_stock }}</div>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-icon-box info">
            <span class="material-symbols-outlined">straighten</span>
        </div>
        <div>
            <div class="kpi-label">Satuan Dasar Internal</div>
            <div class="kpi-value">{{ number_format($rawMaterial->stock_gram, 0, ',', '.') }} gram</div>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-icon-box secondary">
            <span class="material-symbols-outlined">notifications</span>
        </div>
        <div>
            <div class="kpi-label">Batas Minimal</div>
            <div class="kpi-value">{{ \App\Helpers\WeightFormatter::format($rawMaterial->min_stock_gram) }}</div>
        </div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 24px;">
    <!-- Riwayat Barang Masuk (Pembelian) -->
    <div class="md-card">
        <div class="md-card-header">
            <div>
                <div class="md-card-title">Riwayat Barang Masuk</div>
                <div class="md-card-subtitle">Pembelian dari supplier</div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="md-table">
                <thead>
                    <tr>
                        <th>Faktur</th>
                        <th>Tanggal</th>
                        <th>Supplier</th>
                        <th>Berat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($purchases as $pur)
                    <tr>
                        <td>
                            <a href="{{ route('purchases.show', $pur) }}" style="color: var(--md-sys-color-primary); text-decoration: none; font-weight: 600;">
                                {{ $pur->invoice_number }}
                            </a>
                        </td>
                        <td>{{ $pur->purchase_date->format('d/m/Y') }}</td>
                        <td>{{ $pur->supplier->name ?? '-' }}</td>
                        <td><strong>{{ $pur->formatted_weight }}</strong></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 18px;">Belum ada riwayat masuk</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Riwayat Penggunaan Produksi -->
    <div class="md-card">
        <div class="md-card-header">
            <div>
                <div class="md-card-title">Riwayat Produksi</div>
                <div class="md-card-subtitle">Pemakaian untuk garam bungkus</div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="md-table">
                <thead>
                    <tr>
                        <th>Batch</th>
                        <th>Tanggal</th>
                        <th>Hasil</th>
                        <th>Mentah Terpakai</th>
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
                        <td>{{ number_format($prod->pack_quantity, 0, ',', '.') }} bks</td>
                        <td><strong>{{ $prod->formatted_raw_used }}</strong></td>
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
</div>

<!-- Kartu Stok & Mutasi Terakhir -->
<div class="md-card">
    <div class="md-card-header">
        <div>
            <div class="md-card-title">Kartu Stok Mutasi</div>
            <div class="md-card-subtitle">Pergerakan stok mentah ini</div>
        </div>
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
                    <td><strong>{{ \App\Helpers\WeightFormatter::format($m->stock_after) }}</strong></td>
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
