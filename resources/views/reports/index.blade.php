@extends('layouts.app')

@section('title', 'Laporan')
@section('page-title', 'Laporan')

@section('content')
<div class="md-card">
    <div class="md-card-header">
        <div class="md-card-title">Laporan</div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
        <!-- Laporan Penjualan -->
        <a href="{{ route('reports.sales') }}" style="text-decoration: none; color: inherit;">
            <div class="md-card" style="margin-bottom: 0; height: 100%; transition: border-color 0.15s ease;" onmouseover="this.style.borderColor='var(--ux-primary)'" onmouseout="this.style.borderColor='var(--ux-border)'">
                <div style="font-size: 16px; font-weight: 700; color: var(--ux-text-heading); margin-bottom: 8px;">Penjualan</div>
                <p style="font-size: 13px; color: var(--ux-text-muted); line-height: 1.5;">
                    Rekapitulasi omzet penjualan garam kemasan, jumlah transaksi kasir, dan volume penjualan harian.
                </p>
            </div>
        </a>

        <!-- Laporan Pembelian -->
        <a href="{{ route('reports.purchases') }}" style="text-decoration: none; color: inherit;">
            <div class="md-card" style="margin-bottom: 0; height: 100%; transition: border-color 0.15s ease;" onmouseover="this.style.borderColor='var(--ux-primary)'" onmouseout="this.style.borderColor='var(--ux-border)'">
                <div style="font-size: 16px; font-weight: 700; color: var(--ux-text-heading); margin-bottom: 8px;">Pembelian</div>
                <p style="font-size: 13px; color: var(--ux-text-muted); line-height: 1.5;">
                    Rekap penerimaan kristal garam dari supplier, total tonase/kilogram, dan total biaya pengadaan.
                </p>
            </div>
        </a>

        <!-- Laporan Produksi -->
        <a href="{{ route('reports.productions') }}" style="text-decoration: none; color: inherit;">
            <div class="md-card" style="margin-bottom: 0; height: 100%; transition: border-color 0.15s ease;" onmouseover="this.style.borderColor='var(--ux-primary)'" onmouseout="this.style.borderColor='var(--ux-border)'">
                <div style="font-size: 16px; font-weight: 700; color: var(--ux-text-heading); margin-bottom: 8px;">Produksi</div>
                <p style="font-size: 13px; color: var(--ux-text-muted); line-height: 1.5;">
                    Pemantauan hasil output produksi bungkus dan rasio bahan baku mentah yang digunakan.
                </p>
            </div>
        </a>

        <!-- Laporan Stok -->
        <a href="{{ route('reports.stocks') }}" style="text-decoration: none; color: inherit;">
            <div class="md-card" style="margin-bottom: 0; height: 100%; transition: border-color 0.15s ease;" onmouseover="this.style.borderColor='var(--ux-primary)'" onmouseout="this.style.borderColor='var(--ux-border)'">
                <div style="font-size: 16px; font-weight: 700; color: var(--ux-text-heading); margin-bottom: 8px;">Stok</div>
                <p style="font-size: 13px; color: var(--ux-text-muted); line-height: 1.5;">
                    Status terkini saldo barang mentah (gram/kg/ton) dan barang jadi (bungkus) terhadap batas aman.
                </p>
            </div>
        </a>

        <!-- Laporan Laba Rugi -->
        <a href="{{ route('reports.profit') }}" style="text-decoration: none; color: inherit;">
            <div class="md-card" style="margin-bottom: 0; height: 100%; transition: border-color 0.15s ease;" onmouseover="this.style.borderColor='var(--ux-primary)'" onmouseout="this.style.borderColor='var(--ux-border)'">
                <div style="font-size: 16px; font-weight: 700; color: var(--ux-text-heading); margin-bottom: 8px;">Laba Rugi</div>
                <p style="font-size: 13px; color: var(--ux-text-muted); line-height: 1.5;">
                    Perhitungan pendapatan kotor penjualan dikurangi HPP dan estimasi margin laba bersih.
                </p>
            </div>
        </a>
    </div>
</div>
@endsection
