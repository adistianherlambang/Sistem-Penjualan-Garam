@extends('layouts.app')

@section('title', 'Product & Dashboard')
@section('page-title', 'Product')

@section('content')
<!-- Toolbar Row (Table View, Filter, Sort, Statistics Toggle, Actions) -->
<div class="ux-toolbar-row">
    <div class="ux-toolbar-left">
        <button type="button" class="ux-btn-outline">
            <span>Table View</span>
            <span style="font-size: 10px; color: var(--ux-text-subtle);">▾</span>
        </button>

        <button type="button" class="ux-btn-outline">
            <span>Filter</span>
        </button>

        <button type="button" class="ux-btn-outline">
            <span>Sort</span>
        </button>

        <!-- Show Statistics Toggle Switch (Orange) -->
        <label class="ux-switch-wrap">
            <span>Show Statistics</span>
            <div class="ux-switch">
                <input type="checkbox" id="toggle-stats-checkbox" checked onchange="toggleStatistics(this)">
                <span class="ux-switch-slider"></span>
            </div>
        </label>
    </div>

    <div class="ux-toolbar-right">
        <button type="button" class="ux-btn-outline">
            <span>Customize</span>
        </button>

        <a href="{{ route('reports.sales') }}" class="ux-btn-outline">
            <span>Export</span>
        </a>

        @if(auth()->user()->isAdmin())
            <a href="{{ route('finished-products.create') }}" class="ux-btn-solid-dark">
                <span>+ Add New Product</span>
            </a>
        @else
            <a href="{{ route('reports.index') }}" class="ux-btn-solid-dark">
                <span>Lihat Laporan</span>
            </a>
        @endif
    </div>
</div>

<!-- 4 KPI Stat Cards (Joined Row with Vertical Dividers) -->
<div class="ux-kpi-row" id="kpi-statistics-row">
    <!-- Stat 1: Total Product -->
    <div class="ux-kpi-col">
        <div class="ux-kpi-header">
            <span>Total Product</span>
            <span class="ux-kpi-info-dot" title="Total produk dan kemasan garam siap jual">i</span>
        </div>
        <div class="ux-kpi-value">{{ number_format($totalFinishedPacks, 0, ',', '.') }}</div>
        <div class="ux-kpi-footer">
            <span>vs last month</span>
            <span class="ux-kpi-badge-green">+ 3 product</span>
        </div>
    </div>

    <!-- Stat 2: Product Revenue -->
    <div class="ux-kpi-col">
        <div class="ux-kpi-header">
            <span>Product Revenue</span>
            <span class="ux-kpi-info-dot" title="Total pendapatan penjualan produk">i</span>
        </div>
        <div class="ux-kpi-value">Rp {{ number_format($monthSalesRevenue > 0 ? $monthSalesRevenue : $todayRevenue, 0, ',', '.') }}</div>
        <div class="ux-kpi-footer">
            <span>vs last month</span>
            <span class="ux-kpi-badge-green">+ 9%</span>
        </div>
    </div>

    <!-- Stat 3: Product Sold -->
    <div class="ux-kpi-col">
        <div class="ux-kpi-header">
            <span>Product Sold</span>
            <span class="ux-kpi-info-dot" title="Bungkus garam kemasan yang berhasil terjual">i</span>
        </div>
        <div class="ux-kpi-value">{{ number_format($recentSales->sum('total_amount') > 0 ? 2355 : 40, 0, ',', '.') }}</div>
        <div class="ux-kpi-footer">
            <span>vs last month</span>
            <span class="ux-kpi-badge-green">+ 7%</span>
        </div>
    </div>

    <!-- Stat 4: Avg. Monthly Sales -->
    <div class="ux-kpi-col">
        <div class="ux-kpi-header">
            <span>Avg. Monthly Sales</span>
            <span class="ux-kpi-info-dot" title="Rata-rata penjualan bulanan">i</span>
        </div>
        <div class="ux-kpi-value">Rp {{ number_format($estimatedGrossProfit > 0 ? $estimatedGrossProfit : 140000, 0, ',', '.') }}</div>
        <div class="ux-kpi-footer">
            <span>vs last month</span>
            <span class="ux-kpi-badge-green">+ 5%</span>
        </div>
    </div>
</div>

<!-- Main Data Table (Matching Reference Screenshot) -->
<div class="ux-table-card">
    <div style="overflow-x: auto;">
        <table class="ux-table">
            <thead>
                <tr>
                    <th style="width: 40px;"><input type="checkbox" id="check-all" onclick="toggleSelectAll(this)"></th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Sales</th>
                    <th>Revenue</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Rating</th>
                    <th style="width: 30px; text-align: center;">+</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                <tr>
                    <td><input type="checkbox" class="row-checkbox" onchange="updateSelectedCount()"></td>
                    <td>
                        <div style="font-weight: 700; color: var(--ux-text-heading);">Garam Konsumsi Beryodium #10 - Putih Halus</div>
                        <div style="font-size: 11.5px; color: var(--ux-text-muted);">Standar Kemasan 300g • Kualitas Super</div>
                    </td>
                    <td>Rp 3.500</td>
                    <td>471 pcs</td>
                    <td>Rp 1.648.500</td>
                    <td>100</td>
                    <td><span class="ux-status-pill ux-status-instock">In Stock</span></td>
                    <td><span class="ux-rating-star">★ 5.0</span></td>
                    <td style="text-align: center; color: var(--ux-text-subtle);">···</td>
                </tr>

                <!-- Row 2 (Selected with Peach/Orange Highlight like Reference) -->
                <tr class="selected">
                    <td><input type="checkbox" class="row-checkbox" checked onchange="updateSelectedCount()"></td>
                    <td>
                        <div style="font-weight: 700; color: var(--ux-text-heading);">Garam Dapur Beryodium #10 - Bungkus Ekonomis</div>
                        <div style="font-size: 11.5px; color: var(--ux-text-muted);">Standar Kemasan 300g • Stok Menunggu Produksi</div>
                    </td>
                    <td>Rp 3.500</td>
                    <td>402 pcs</td>
                    <td>Rp 1.407.000</td>
                    <td>0</td>
                    <td><span class="ux-status-pill ux-status-outstock">Out of Stock</span></td>
                    <td><span class="ux-rating-star">★ 5.0</span></td>
                    <td style="text-align: center; color: var(--ux-text-subtle);">···</td>
                </tr>

                <!-- Row 3 -->
                <tr>
                    <td><input type="checkbox" class="row-checkbox" onchange="updateSelectedCount()"></td>
                    <td>
                        <div style="font-weight: 700; color: var(--ux-text-heading);">Garam Meja Kristal Murni #19 - Botol &amp; Bungkus</div>
                        <div style="font-size: 11.5px; color: var(--ux-text-muted);">Standar Kemasan 300g • Refill Pack</div>
                    </td>
                    <td>Rp 3.500</td>
                    <td>455 pcs</td>
                    <td>Rp 1.592.500</td>
                    <td>20</td>
                    <td><span class="ux-status-pill ux-status-restock">Restock</span></td>
                    <td><span class="ux-rating-star">★ 4.9</span></td>
                    <td style="text-align: center; color: var(--ux-text-subtle);">···</td>
                </tr>

                <!-- Row 4 (Selected with Peach/Orange Highlight like Reference) -->
                <tr class="selected">
                    <td><input type="checkbox" class="row-checkbox" checked onchange="updateSelectedCount()"></td>
                    <td>
                        <div style="font-weight: 700; color: var(--ux-text-heading);">Garam Laut Kasar Madura (Bahan Mentah Premium)</div>
                        <div style="font-size: 11.5px; color: var(--ux-text-muted);">Karung 50kg • Kandungan NaCl Tinggi</div>
                    </td>
                    <td>Rp 150.000</td>
                    <td>7 karung</td>
                    <td>Rp 1.050.000</td>
                    <td>12</td>
                    <td><span class="ux-status-pill ux-status-instock">In Stock</span></td>
                    <td><span class="ux-rating-star">★ 4.8</span></td>
                    <td style="text-align: center; color: var(--ux-text-subtle);">···</td>
                </tr>

                <!-- Row 5 -->
                <tr>
                    <td><input type="checkbox" class="row-checkbox" onchange="updateSelectedCount()"></td>
                    <td>
                        <div style="font-weight: 700; color: var(--ux-text-heading);">Garam Khusus Pengawetan Ikan &amp; Industri</div>
                        <div style="font-size: 11.5px; color: var(--ux-text-muted);">Kemasan Karung 25kg</div>
                    </td>
                    <td>Rp 85.000</td>
                    <td>5 karung</td>
                    <td>Rp 425.000</td>
                    <td>0</td>
                    <td><span class="ux-status-pill ux-status-outstock">Out of Stock</span></td>
                    <td><span class="ux-rating-star">★ 4.8</span></td>
                    <td style="text-align: center; color: var(--ux-text-subtle);">···</td>
                </tr>

                <!-- Row 6 -->
                <tr>
                    <td><input type="checkbox" class="row-checkbox" onchange="updateSelectedCount()"></td>
                    <td>
                        <div style="font-weight: 700; color: var(--ux-text-heading);">Garam Gurih Masak Tradisional Madura</div>
                        <div style="font-size: 11.5px; color: var(--ux-text-muted);">Standar Kemasan 300g</div>
                    </td>
                    <td>Rp 3.500</td>
                    <td>120 pcs</td>
                    <td>Rp 420.000</td>
                    <td>3</td>
                    <td><span class="ux-status-pill ux-status-restock">Restock</span></td>
                    <td><span class="ux-rating-star">★ 5.0</span></td>
                    <td style="text-align: center; color: var(--ux-text-subtle);">···</td>
                </tr>

                <!-- Row 7 -->
                <tr>
                    <td><input type="checkbox" class="row-checkbox" onchange="updateSelectedCount()"></td>
                    <td>
                        <div style="font-weight: 700; color: var(--ux-text-heading);">Garam Halus Kristal Super 300g (Batch Pagi)</div>
                        <div style="font-size: 11.5px; color: var(--ux-text-muted);">Hasil Pengolahan Pabrik</div>
                    </td>
                    <td>Rp 3.500</td>
                    <td>200 pcs</td>
                    <td>Rp 700.000</td>
                    <td>20</td>
                    <td><span class="ux-status-pill ux-status-instock">In Stock</span></td>
                    <td><span class="ux-rating-star">★ 4.7</span></td>
                    <td style="text-align: center; color: var(--ux-text-subtle);">···</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Floating Action Bar (Like Reference Screenshot) -->
    <div class="ux-floating-action-bar" id="floating-action-bar">
        <span class="ux-floating-count" id="floating-selected-count">2 Selected</span>
        <button type="button" class="ux-floating-btn" onclick="alert('Kode promo diterapkan')">
            <span>Apply Code</span>
        </button>
        <button type="button" class="ux-floating-btn" onclick="alert('Fitur edit info massal')">
            <span>Edit Info</span>
        </button>
        <button type="button" class="ux-floating-btn danger" onclick="alert('Konfirmasi hapus item terpilih')">
            <span>Delete</span>
        </button>
        <button type="button" class="ux-floating-btn" style="padding: 5px 8px;">···</button>
        <button type="button" class="ux-floating-btn" style="padding: 5px 8px;" onclick="deselectAll()">✕</button>
    </div>

    <!-- Bottom Pagination Bar (Orange Active Pill) -->
    <div class="ux-pagination-row">
        <div class="ux-page-size-wrap">
            <span>Showing per page</span>
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
            <span class="ux-page-num" style="color: var(--ux-text-subtle);">···</span>
            <span class="ux-page-num">25</span>
            <span class="ux-page-num">&gt;</span>
            <span class="ux-page-num">»</span>
        </div>

        <div class="ux-goto-wrap">
            <span>Go to page</span>
            <input type="text" class="ux-goto-input" value="1">
            <span class="ux-goto-btn">Go &gt;</span>
        </div>
    </div>
</div>

<!-- Secondary Operational Grids (Recent Sales & Stock Movements) -->
<div class="ux-secondary-grid">
    <!-- Recent Sales Orders -->
    <div class="md-card">
        <div class="md-card-header">
            <div>
                <div class="md-card-title">Transaksi Penjualan Terkini</div>
                <div class="md-card-subtitle">5 transaksi kasir terbaru</div>
            </div>
            <a href="{{ route('sales.index') }}" class="ux-btn-outline" style="font-size: 12px; padding: 6px 12px;">Lihat Semua</a>
        </div>
        <div style="overflow-x: auto;">
            <table class="ux-table">
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
                        <td style="font-weight: 700; color: var(--ux-text-heading);">Rp {{ number_format($sale->total_amount, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('sales.show', $sale) }}" class="ux-btn-outline" style="font-size: 11.5px; padding: 4px 8px;">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: var(--ux-text-muted); padding: 20px;">Belum ada transaksi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Stock Movements -->
    <div class="md-card">
        <div class="md-card-header">
            <div>
                <div class="md-card-title">Mutasi Stok Gudang</div>
                <div class="md-card-subtitle">Pergerakan keluar masuk stok</div>
            </div>
            <a href="{{ route('stock-movements.index') }}" class="ux-btn-outline" style="font-size: 12px; padding: 6px 12px;">Lihat Semua</a>
        </div>
        <div style="display: flex; flex-direction: column; gap: 10px;">
            @forelse($recentMovements as $movement)
            <div style="display: flex; align-items: center; justify-content: space-between; padding: 12px 14px; background-color: var(--ux-bg); border: 1px solid var(--ux-border); border-radius: 8px;">
                <div>
                    <div style="font-weight: 700; font-size: 13px; color: var(--ux-text-heading);">{{ $movement->item_name }}</div>
                    <div style="font-size: 11.5px; color: var(--ux-text-muted);">
                        {{ $movement->transaction_type }} • {{ $movement->movement_date->format('d/m H:i') }}
                    </div>
                </div>
                <div style="font-weight: 700; font-size: 13.5px; color: {{ $movement->quantity_delta >= 0 ? '#027a48' : '#dc2626' }};">
                    {{ $movement->formatted_delta }}
                </div>
            </div>
            @empty
            <div style="text-align: center; color: var(--ux-text-muted); padding: 20px;">Belum ada mutasi</div>
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
        updateSelectedCount();
    }

    function updateSelectedCount() {
        const checkboxes = document.querySelectorAll('.row-checkbox:checked');
        const count = checkboxes.length;
        const countLabel = document.getElementById('floating-selected-count');
        const floatBar = document.getElementById('floating-action-bar');
        
        // Update row classes
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

        if (countLabel) {
            countLabel.textContent = count + ' Selected';
        }

        if (floatBar) {
            floatBar.style.display = count > 0 ? 'flex' : 'none';
        }
    }

    function deselectAll() {
        document.querySelectorAll('.row-checkbox').forEach(cb => {
            cb.checked = false;
            const tr = cb.closest('tr');
            if (tr) tr.classList.remove('selected');
        });
        const masterCheckbox = document.getElementById('check-all');
        if (masterCheckbox) masterCheckbox.checked = false;
        updateSelectedCount();
    }

    // Initialize row highlighting
    document.addEventListener('DOMContentLoaded', () => {
        updateSelectedCount();
    });
</script>
@endsection
