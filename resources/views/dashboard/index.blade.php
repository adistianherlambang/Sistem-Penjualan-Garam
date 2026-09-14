@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('topbar-actions')
    @if(auth()->user()->isAdmin())
        <a href="{{ route('sales.create') }}" class="md-btn md-btn-primary md-btn-sm">
            <span>Kasir</span>
        </a>
    @endif
@endsection

@section('content')
<!-- KPI Cards Grid (Label 1-2 kata) -->
<div class="kpi-grid">
    <div class="kpi-card">
        <div>
            <div class="kpi-label">Stok Mentah</div>
            <div class="kpi-value">{{ $formattedRawStock }}</div>
        </div>
    </div>

    <div class="kpi-card">
        <div>
            <div class="kpi-label">Stok Jadi</div>
            <div class="kpi-value">{{ number_format($totalFinishedPacks, 0, ',', '.') }} bks</div>
        </div>
    </div>

    <div class="kpi-card">
        <div>
            <div class="kpi-label">Penjualan Hari Ini</div>
            <div class="kpi-value">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</div>
        </div>
    </div>

    <div class="kpi-card">
        <div>
            <div class="kpi-label">Produksi Bulan Ini</div>
            <div class="kpi-value">{{ number_format($monthProductionPacks, 0, ',', '.') }} bks</div>
        </div>
    </div>

    <div class="kpi-card">
        <div>
            <div class="kpi-label">Pembelian Bulan Ini</div>
            <div class="kpi-value">Rp {{ number_format($monthPurchasesTotal, 0, ',', '.') }}</div>
        </div>
    </div>

    <div class="kpi-card">
        <div>
            <div class="kpi-label">Laba Kotor</div>
            <div class="kpi-value">Rp {{ number_format($estimatedGrossProfit, 0, ',', '.') }}</div>
        </div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
    <!-- Sales Activity Table -->
    <div class="md-card">
        <div class="md-card-header">
            <div>
                <div class="md-card-title">Penjualan Terakhir</div>
                <div class="md-card-subtitle">5 transaksi terbaru</div>
            </div>
            <a href="{{ route('sales.index') }}" class="md-btn md-btn-text md-btn-sm">Semua</a>
        </div>

        <div class="table-responsive">
            <table class="md-table">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentSales as $sale)
                    <tr>
                        <td><strong>{{ $sale->transaction_number }}</strong></td>
                        <td>{{ $sale->sale_date->format('d/m/Y') }}</td>
                        <td>{{ $sale->customer_name ?? 'Pelanggan Umum' }}</td>
                        <td>Rp {{ number_format($sale->total_amount, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('sales.show', $sale) }}" class="md-btn md-btn-outlined md-btn-sm">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 24px;">Belum ada transaksi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Stock Movement Summary -->
    <div class="md-card">
        <div class="md-card-header">
            <div>
                <div class="md-card-title">Mutasi Terkini</div>
                <div class="md-card-subtitle">Pergerakan stok terbaru</div>
            </div>
            <a href="{{ route('stock-movements.index') }}" class="md-btn md-btn-text md-btn-sm">Semua</a>
        </div>

        <div style="display: flex; flex-direction: column; gap: 12px;">
            @forelse($recentMovements as $movement)
            <div style="display: flex; align-items: center; justify-content: space-between; padding: 10px; background-color: var(--md-sys-color-surface-container-high); border-radius: var(--md-shape-corner-small);">
                <div>
                    <div style="font-weight: 600; font-size: 13px;">{{ $movement->item_name }}</div>
                    <div style="font-size: 11.5px; color: var(--md-sys-color-on-surface-variant);">
                        {{ $movement->transaction_type }} • {{ $movement->movement_date->format('d/m H:i') }}
                    </div>
                </div>
                <div class="text-bold {{ $movement->quantity_delta >= 0 ? 'text-success' : 'text-danger' }}" style="font-size: 13.5px;">
                    {{ $movement->formatted_delta }}
                </div>
            </div>
            @empty
            <div style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 20px;">Belum ada mutasi</div>
            @endforelse
        </div>
    </div>
</div>

<!-- Production & Purchase Quick Cards -->
<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 20px;">
    <!-- Production Activity -->
    <div class="md-card">
        <div class="md-card-header">
            <div>
                <div class="md-card-title">Produksi Terkini</div>
                <div class="md-card-subtitle">Batch produksi terbaru</div>
            </div>
            <a href="{{ route('productions.index') }}" class="md-btn md-btn-text md-btn-sm">Semua</a>
        </div>
        <div class="table-responsive">
            <table class="md-table">
                <thead>
                    <tr>
                        <th>Batch</th>
                        <th>Hasil</th>
                        <th>Bahan Mentah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentProductions as $prod)
                    <tr>
                        <td>{{ $prod->production_number }}</td>
                        <td><strong>{{ number_format($prod->pack_quantity, 0, ',', '.') }} bungkus</strong></td>
                        <td>{{ $prod->formatted_raw_used }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" style="text-align: center; color: var(--md-sys-color-on-surface-variant);">Belum ada data produksi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Purchase Activity -->
    <div class="md-card">
        <div class="md-card-header">
            <div>
                <div class="md-card-title">Pembelian Terkini</div>
                <div class="md-card-subtitle">Faktur barang mentah datang</div>
            </div>
            <a href="{{ route('purchases.index') }}" class="md-btn md-btn-text md-btn-sm">Semua</a>
        </div>
        <div class="table-responsive">
            <table class="md-table">
                <thead>
                    <tr>
                        <th>Faktur</th>
                        <th>Supplier</th>
                        <th>Berat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentPurchases as $pur)
                    <tr>
                        <td>{{ $pur->invoice_number }}</td>
                        <td>{{ $pur->supplier->name ?? '-' }}</td>
                        <td><strong>{{ $pur->formatted_weight }}</strong></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" style="text-align: center; color: var(--md-sys-color-on-surface-variant);">Belum ada data pembelian</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
