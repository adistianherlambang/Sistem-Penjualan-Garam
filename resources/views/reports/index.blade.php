@extends('layouts.app')

@section('title', 'Laporan')
@section('page-title', 'Laporan')

@section('content')
<div class="md-card">
    <div class="md-card-header">
        <div>
            <div class="md-card-title">Pusat Laporan & Monitoring Bisnis</div>
            <div class="md-card-subtitle">Analitik penjualan, pembelian, produksi, stok, dan laba kotor</div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
        <!-- Laporan Penjualan -->
        <a href="{{ route('reports.sales') }}" style="text-decoration: none; color: inherit;">
            <div class="md-card" style="margin-bottom: 0; height: 100%; transition: transform 0.15s ease, border-color 0.15s ease;" onmouseover="this.style.borderColor='var(--md-sys-color-primary)'" onmouseout="this.style.borderColor='var(--md-sys-color-outline-variant)'">
                <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 12px;">
                    <div class="kpi-icon-box success">
                        <span class="material-symbols-outlined">point_of_sale</span>
                    </div>
                    <div>
                        <div style="font-size: 16px; font-weight: 700;">Laporan Penjualan</div>
                        <div style="font-size: 12.5px; color: var(--md-sys-color-on-surface-variant);">Pendapatan & transaksi</div>
                    </div>
                </div>
                <p style="font-size: 13px; color: var(--md-sys-color-on-surface-variant); line-height: 1.5;">
                    Rekapitulasi penjualan garam kemasan bungkus berdasarkan rentang tanggal dan rincian transaksi kasir.
                </p>
            </div>
        </a>

        <!-- Laporan Pembelian -->
        <a href="{{ route('reports.purchases') }}" style="text-decoration: none; color: inherit;">
            <div class="md-card" style="margin-bottom: 0; height: 100%; transition: transform 0.15s ease, border-color 0.15s ease;" onmouseover="this.style.borderColor='var(--md-sys-color-primary)'" onmouseout="this.style.borderColor='var(--md-sys-color-outline-variant)'">
                <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 12px;">
                    <div class="kpi-icon-box primary">
                        <span class="material-symbols-outlined">shopping_cart</span>
                    </div>
                    <div>
                        <div style="font-size: 16px; font-weight: 700;">Laporan Pembelian</div>
                        <div style="font-size: 12.5px; color: var(--md-sys-color-on-surface-variant);">Pengadaan garam mentah</div>
                    </div>
                </div>
                <p style="font-size: 13px; color: var(--md-sys-color-on-surface-variant); line-height: 1.5;">
                    Rekap penerimaan kristal garam dari supplier, total tonase/kilogram, dan total biaya pengadaan.
                </p>
            </div>
        </a>

        <!-- Laporan Produksi -->
        <a href="{{ route('reports.productions') }}" style="text-decoration: none; color: inherit;">
            <div class="md-card" style="margin-bottom: 0; height: 100%; transition: transform 0.15s ease, border-color 0.15s ease;" onmouseover="this.style.borderColor='var(--md-sys-color-primary)'" onmouseout="this.style.borderColor='var(--md-sys-color-outline-variant)'">
                <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 12px;">
                    <div class="kpi-icon-box info">
                        <span class="material-symbols-outlined">precision_manufacturing</span>
                    </div>
                    <div>
                        <div style="font-size: 16px; font-weight: 700;">Laporan Produksi</div>
                        <div style="font-size: 12.5px; color: var(--md-sys-color-on-surface-variant);">Konversi kemasan 300g</div>
                    </div>
                </div>
                <p style="font-size: 13px; color: var(--md-sys-color-on-surface-variant); line-height: 1.5;">
                    Pemantauan hasil output produksi bungkus dan rasio bahan mentah yang digunakan.
                </p>
            </div>
        </a>

        <!-- Laporan Stok -->
        <a href="{{ route('reports.stocks') }}" style="text-decoration: none; color: inherit;">
            <div class="md-card" style="margin-bottom: 0; height: 100%; transition: transform 0.15s ease, border-color 0.15s ease;" onmouseover="this.style.borderColor='var(--md-sys-color-primary)'" onmouseout="this.style.borderColor='var(--md-sys-color-outline-variant)'">
                <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 12px;">
                    <div class="kpi-icon-box secondary">
                        <span class="material-symbols-outlined">inventory</span>
                    </div>
                    <div>
                        <div style="font-size: 16px; font-weight: 700;">Laporan Stok</div>
                        <div style="font-size: 12.5px; color: var(--md-sys-color-on-surface-variant);">Posisi saldo barang</div>
                    </div>
                </div>
                <p style="font-size: 13px; color: var(--md-sys-color-on-surface-variant); line-height: 1.5;">
                    Status terkini saldo barang mentah (gram/kg/ton) dan barang jadi (bungkus) terhadap batas aman minimal.
                </p>
            </div>
        </a>

        <!-- Laporan Laba Rugi -->
        <a href="{{ route('reports.profit') }}" style="text-decoration: none; color: inherit;">
            <div class="md-card" style="margin-bottom: 0; height: 100%; transition: transform 0.15s ease, border-color 0.15s ease;" onmouseover="this.style.borderColor='var(--md-sys-color-primary)'" onmouseout="this.style.borderColor='var(--md-sys-color-outline-variant)'">
                <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 12px;">
                    <div class="kpi-icon-box success">
                        <span class="material-symbols-outlined">trending_up</span>
                    </div>
                    <div>
                        <div style="font-size: 16px; font-weight: 700;">Laba Rugi</div>
                        <div style="font-size: 12.5px; color: var(--md-sys-color-on-surface-variant);">Ringkasan keuntungan</div>
                    </div>
                </div>
                <p style="font-size: 13px; color: var(--md-sys-color-on-surface-variant); line-height: 1.5;">
                    Perhitungan pendapatan penjualan dikurangi HPP (harga pokok penjualan) dan estimasi margin laba kotor.
                </p>
            </div>
        </a>
    </div>
</div>
@endsection
