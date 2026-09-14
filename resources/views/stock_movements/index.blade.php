@extends('layouts.app')

@section('title', 'Mutasi Stok')
@section('page-title', 'Mutasi Stok')

@section('content')
<div class="md-card">
    <div class="md-card-header">
        <div class="md-card-title">Mutasi Stok</div>
    </div>

    <!-- Filter Form -->
    <form action="{{ route('stock-movements.index') }}" method="GET" style="display: flex; gap: 12px; margin-bottom: 20px; flex-wrap: wrap;">
        <select name="item_type" class="form-select" style="width: 180px;">
            <option value="">Semua Jenis Item</option>
            <option value="raw_material" {{ request('item_type') == 'raw_material' ? 'selected' : '' }}>Barang Mentah</option>
            <option value="finished_product" {{ request('item_type') == 'finished_product' ? 'selected' : '' }}>Barang Jadi</option>
        </select>

        <select name="transaction_type" class="form-select" style="width: 180px;">
            <option value="">Semua Transaksi</option>
            <option value="Barang Masuk" {{ request('transaction_type') == 'Barang Masuk' ? 'selected' : '' }}>Barang Masuk</option>
            <option value="Produksi" {{ request('transaction_type') == 'Produksi' ? 'selected' : '' }}>Produksi</option>
            <option value="Penjualan" {{ request('transaction_type') == 'Penjualan' ? 'selected' : '' }}>Penjualan</option>
            <option value="Penyesuaian" {{ request('transaction_type') == 'Penyesuaian' ? 'selected' : '' }}>Penyesuaian</option>
        </select>

        <input type="date" name="start_date" class="form-input" style="width: 160px;" value="{{ request('start_date') }}">
        <input type="date" name="end_date" class="form-input" style="width: 160px;" value="{{ request('end_date') }}">

        <button type="submit" class="md-btn md-btn-outlined md-btn-sm">Filter</button>
        @if(request()->hasAny(['item_type', 'transaction_type', 'start_date', 'end_date']))
            <a href="{{ route('stock-movements.index') }}" class="md-btn md-btn-text md-btn-sm">Reset</a>
        @endif
    </form>

    <div class="table-responsive">
        <table class="md-table">
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Jenis Item</th>
                    <th>Nama Item</th>
                    <th>Transaksi</th>
                    <th>Referensi</th>
                    <th>Perubahan</th>
                    <th>Saldo Sebelum</th>
                    <th>Saldo Sesudah</th>
                    <th>Keterangan</th>
                    <th>Petugas</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movements as $m)
                <tr>
                    <td>{{ $m->movement_date->format('d/m/Y H:i') }}</td>
                    <td>{{ $m->item_type === 'raw_material' ? 'Barang Mentah' : 'Barang Jadi' }}</td>
                    <td><strong>{{ $m->item_name }}</strong></td>
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
                    <td>
                        @if($m->unit === 'gram')
                            {{ \App\Helpers\WeightFormatter::format($m->stock_before) }}
                        @else
                            {{ number_format($m->stock_before, 0, ',', '.') }} bks
                        @endif
                    </td>
                    <td>
                        <strong>
                            @if($m->unit === 'gram')
                                {{ \App\Helpers\WeightFormatter::format($m->stock_after) }}
                            @else
                                {{ number_format($m->stock_after, 0, ',', '.') }} bks
                            @endif
                        </strong>
                    </td>
                    <td>{{ $m->notes ?? '-' }}</td>
                    <td>{{ $m->user->name ?? 'Sistem' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 24px;">Belum ada riwayat pergerakan stok</td>
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
