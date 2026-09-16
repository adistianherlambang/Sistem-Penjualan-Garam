@extends('layouts.app')

@section('title', 'Penjualan')
@section('page-title', 'Penjualan')

@section('content')
<div class="kpi-grid" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
    <div class="kpi-card">
        <div class="kpi-label">Pendapatan</div>
        <div class="kpi-value">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
    </div>
</div>

<div class="md-card">
    <div class="md-card-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
        <div class="md-card-title">Daftar Transaksi Penjualan</div>
        @if(auth()->user()->isAdmin())
            <a href="{{ route('sales.create') }}" class="md-btn md-btn-primary md-btn-sm">
                <span>+ Tambah Transaksi</span>
            </a>
        @endif
    </div>

    <!-- Filter Bar -->
    <form action="{{ route('sales.index') }}" method="GET" style="display: flex; gap: 12px; margin-bottom: 20px; flex-wrap: wrap;">
        <input type="date" name="start_date" class="form-input" style="width: 170px;" value="{{ request('start_date') }}">
        <input type="date" name="end_date" class="form-input" style="width: 170px;" value="{{ request('end_date') }}">
        <button type="submit" class="md-btn md-btn-outlined md-btn-sm">Filter</button>
        @if(request()->hasAny(['start_date', 'end_date']))
            <a href="{{ route('sales.index') }}" class="md-btn md-btn-text md-btn-sm">Reset</a>
        @endif
    </form>

    <div class="table-responsive">
        <table class="md-table">
            <thead>
                <tr>
                    <th>Nomor Transaksi</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sales as $sale)
                <tr>
                    <td><strong>{{ $sale->transaction_number }}</strong></td>
                    <td>{{ $sale->sale_date->format('d/m/Y') }}</td>
                    <td>{{ $sale->customer_name ?? 'Pelanggan Umum' }}</td>
                    <td>
                        @foreach($sale->items as $item)
                            <div>{{ $item->product->name ?? '-' }}</div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($sale->items as $item)
                            <strong>{{ number_format($item->quantity_packs, 0, ',', '.') }} bks</strong>
                        @endforeach
                    </td>
                    <td><strong>Rp {{ number_format($sale->total_amount, 0, ',', '.') }}</strong></td>
                    <td style="text-align: right;">
                        <a href="{{ route('sales.show', $sale) }}" class="md-btn md-btn-outlined md-btn-sm">Detail</a>
                        <a href="{{ route('sales.receipt', $sale) }}" target="_blank" class="md-btn md-btn-text md-btn-sm" title="Nota Kasir">Nota</a>
                        <a href="{{ route('sales.invoice', $sale) }}" target="_blank" class="md-btn md-btn-text md-btn-sm" title="Faktur Formal">Faktur</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 24px;">Belum ada data penjualan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $sales->links() }}
    </div>
</div>
@endsection
