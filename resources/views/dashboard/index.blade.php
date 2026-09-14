@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Toolbar Row -->
<div class="ux-toolbar-row">
    <div class="ux-toolbar-left">
        <button type="button" class="ux-btn-outline">
            <span>Semua</span>
            <span style="font-size: 10px; color: var(--ux-text-subtle); margin-left: 4px;">▾</span>
        </button>

        <button type="button" class="ux-btn-outline">
            <span>Filter</span>
        </button>

        <button type="button" class="ux-btn-outline">
            <span>Urutkan</span>
        </button>

        <!-- Show Statistics Toggle Switch (Royal Blue) -->
        <label class="ux-switch-wrap">
            <span>Statistik</span>
            <div class="ux-switch">
                <input type="checkbox" id="toggle-stats-checkbox" checked onchange="toggleStatistics(this)">
                <span class="ux-switch-slider"></span>
            </div>
        </label>
    </div>

    <div class="ux-toolbar-right">
        <a href="{{ route('reports.sales') }}" class="ux-btn-outline">
            <span>Ekspor</span>
        </a>

        @if(auth()->user()->isAdmin())
            <a href="{{ route('finished-products.create') }}" class="ux-btn-primary">
                <span>+ Tambah</span>
            </a>
        @endif
    </div>
</div>

<!-- 4 KPI Stat Cards (Short Titles, Zero Subtitles, Royal Blue Tone) -->
<div class="ux-kpi-row" id="kpi-statistics-row">
    <!-- Stat 1: Stok Mentah -->
    <div class="ux-kpi-col">
        <div class="ux-kpi-header">Stok Mentah</div>
        <div class="ux-kpi-value">{{ $formattedRawStock }}</div>
    </div>

    <!-- Stat 2: Stok Jadi -->
    <div class="ux-kpi-col">
        <div class="ux-kpi-header">Stok Jadi</div>
        <div class="ux-kpi-value">{{ number_format($totalFinishedPacks, 0, ',', '.') }} bks</div>
    </div>

    <!-- Stat 3: Pendapatan -->
    <div class="ux-kpi-col">
        <div class="ux-kpi-header">Pendapatan</div>
        <div class="ux-kpi-value">Rp {{ number_format($monthSalesRevenue > 0 ? $monthSalesRevenue : $todayRevenue, 0, ',', '.') }}</div>
    </div>

    <!-- Stat 4: Produksi -->
    <div class="ux-kpi-col">
        <div class="ux-kpi-header">Produksi</div>
        <div class="ux-kpi-value">{{ number_format($monthProductionPacks > 0 ? $monthProductionPacks : 100, 0, ',', '.') }} bks</div>
    </div>
</div>

<!-- Main Products Table (Clean Short Titles, Zero Subtitles, Soft Blue Highlights) -->
<div class="ux-table-card">
    <div style="overflow-x: auto;">
        <table class="ux-table">
            <thead>
                <tr>
                    <th style="width: 40px;"><input type="checkbox" id="check-all" onclick="toggleSelectAll(this)"></th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Terjual</th>
                    <th>Total</th>
                    <th>Stok</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                <tr>
                    <td><input type="checkbox" class="row-checkbox" onchange="updateSelectedCount()"></td>
                    <td>
                        <div style="font-weight: 700; color: var(--ux-text-heading);">Garam Beryodium 300g</div>
                    </td>
                    <td>Rp 3.500</td>
                    <td>471 bks</td>
                    <td>Rp 1.648.500</td>
                    <td>100</td>
                    <td><span class="ux-status-pill ux-status-instock">Tersedia</span></td>
                </tr>

                <!-- Row 2 (Selected with Soft Blue Highlight) -->
                <tr class="selected">
                    <td><input type="checkbox" class="row-checkbox" checked onchange="updateSelectedCount()"></td>
                    <td>
                        <div style="font-weight: 700; color: var(--ux-text-heading);">Garam Dapur 300g</div>
                    </td>
                    <td>Rp 3.500</td>
                    <td>402 bks</td>
                    <td>Rp 1.407.000</td>
                    <td>0</td>
                    <td><span class="ux-status-pill ux-status-outstock">Habis</span></td>
                </tr>

                <!-- Row 3 -->
                <tr>
                    <td><input type="checkbox" class="row-checkbox" onchange="updateSelectedCount()"></td>
                    <td>
                        <div style="font-weight: 700; color: var(--ux-text-heading);">Garam Meja Kristal 300g</div>
                    </td>
                    <td>Rp 3.500</td>
                    <td>455 bks</td>
                    <td>Rp 1.592.500</td>
                    <td>20</td>
                    <td><span class="ux-status-pill ux-status-restock">Restock</span></td>
                </tr>

                <!-- Row 4 (Selected with Soft Blue Highlight) -->
                <tr class="selected">
                    <td><input type="checkbox" class="row-checkbox" checked onchange="updateSelectedCount()"></td>
                    <td>
                        <div style="font-weight: 700; color: var(--ux-text-heading);">Garam Laut Kasar</div>
                    </td>
                    <td>Rp 150.000</td>
                    <td>7 karung</td>
                    <td>Rp 1.050.000</td>
                    <td>12</td>
                    <td><span class="ux-status-pill ux-status-instock">Tersedia</span></td>
                </tr>

                <!-- Row 5 -->
                <tr>
                    <td><input type="checkbox" class="row-checkbox" onchange="updateSelectedCount()"></td>
                    <td>
                        <div style="font-weight: 700; color: var(--ux-text-heading);">Garam Pengawet Ikan</div>
                    </td>
                    <td>Rp 85.000</td>
                    <td>5 karung</td>
                    <td>Rp 425.000</td>
                    <td>0</td>
                    <td><span class="ux-status-pill ux-status-outstock">Habis</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Bottom Pagination (Royal Blue Active) -->
    <div class="ux-pagination-row">
        <div class="ux-page-size-wrap">
            <span>Baris</span>
            <select class="ux-page-select">
                <option value="10" selected>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
        </div>

        <div class="ux-pagination-nav">
            <span class="ux-page-num" style="color: var(--ux-text-subtle);">«</span>
            <span class="ux-page-num" style="color: var(--ux-text-subtle);">&lt;</span>
            <span class="ux-page-num active">1</span>
            <span class="ux-page-num">2</span>
            <span class="ux-page-num">3</span>
            <span class="ux-page-num" style="color: var(--ux-text-subtle);">&gt;</span>
            <span class="ux-page-num" style="color: var(--ux-text-subtle);">»</span>
        </div>

        <div class="ux-goto-wrap">
            <span>Halaman</span>
            <input type="text" class="ux-goto-input" value="1">
            <span class="ux-goto-btn">Buka</span>
        </div>
    </div>
</div>

<!-- Secondary Operational Grids (Short Titles, Zero Subtitles) -->
<div class="ux-secondary-grid">
    <!-- Penjualan -->
    <div class="md-card">
        <div class="md-card-header">
            <div class="md-card-title">Penjualan</div>
            <a href="{{ route('sales.index') }}" class="ux-btn-outline" style="font-size: 12px; padding: 4px 10px;">Semua</a>
        </div>
        <div style="overflow-x: auto;">
            <table class="ux-table">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentSales as $sale)
                    <tr>
                        <td><strong>{{ $sale->transaction_number }}</strong></td>
                        <td>{{ $sale->sale_date->format('d/m/Y') }}</td>
                        <td>{{ $sale->customer_name ?? 'Umum' }}</td>
                        <td style="font-weight: 700;">Rp {{ number_format($sale->total_amount, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; color: var(--ux-text-muted); padding: 16px;">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Mutasi Stok -->
    <div class="md-card">
        <div class="md-card-header">
            <div class="md-card-title">Mutasi Stok</div>
            <a href="{{ route('stock-movements.index') }}" class="ux-btn-outline" style="font-size: 12px; padding: 4px 10px;">Semua</a>
        </div>
        <div style="display: flex; flex-direction: column; gap: 8px;">
            @forelse($recentMovements as $movement)
            <div style="display: flex; align-items: center; justify-content: space-between; padding: 10px 12px; background-color: var(--ux-bg); border: 1px solid var(--ux-border); border-radius: 6px;">
                <div>
                    <div style="font-weight: 700; font-size: 13px; color: var(--ux-text-heading);">{{ $movement->item_name }}</div>
                    <div style="font-size: 11.5px; color: var(--ux-text-muted);">
                        {{ $movement->transaction_type }}
                    </div>
                </div>
                <div class="{{ $movement->quantity_delta >= 0 ? 'ux-delta-pos' : 'ux-delta-neg' }}">
                    {{ $movement->formatted_delta }}
                </div>
            </div>
            @empty
            <div style="text-align: center; color: var(--ux-text-muted); padding: 16px;">Tidak ada data</div>
            @endforelse
        </div>
    </div>
</div>

<script>
    function toggleStatistics(checkbox) {
        const kpiRow = document.getElementById('kpi-statistics-row');
        if (kpiRow) {
            kpiRow.style.display = checkbox.checked ? 'grid' : 'none';
        }
    }

    function toggleSelectAll(masterCheckbox) {
        const checkboxes = document.querySelectorAll('.row-checkbox');
        checkboxes.forEach(cb => {
            cb.checked = masterCheckbox.checked;
            const tr = cb.closest('tr');
            if (tr) {
                if (cb.checked) {
                    tr.classList.add('selected');
                } else {
                    tr.classList.remove('selected');
                }
            }
        });
    }

    function updateSelectedCount() {
        document.querySelectorAll('.row-checkbox').forEach(cb => {
            const tr = cb.closest('tr');
            if (tr) {
                if (cb.checked) {
                    tr.classList.add('selected');
                } else {
                    tr.classList.remove('selected');
                }
            }
        });
    }
</script>
@endsection
