<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktur Pembelian - {{ $purchase->invoice_number }}</title>
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">
    <style>
        body {
            background-color: #f1f5f9;
            padding: 30px;
            font-family: 'Roboto', sans-serif;
        }
        .invoice-box {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 36px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            border-bottom: 2px solid #0f172a;
            padding-bottom: 20px;
            margin-bottom: 24px;
        }
        .store-title {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
        }
        .store-sub {
            font-size: 13px;
            color: #475569;
            margin-top: 4px;
        }
        .invoice-meta {
            text-align: right;
        }
        .invoice-title {
            font-size: 20px;
            font-weight: 700;
            color: #1e3a8a;
        }
        .meta-text {
            font-size: 13px;
            color: #334155;
            margin-top: 3px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 28px;
        }
        .info-card {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 16px;
        }
        .info-heading {
            font-size: 12px;
            font-weight: 600;
            color: #64748b;
            margin-bottom: 6px;
        }
        .info-content {
            font-size: 13.5px;
            color: #0f172a;
            line-height: 1.5;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 28px;
        }
        .invoice-table th {
            background-color: #f1f5f9;
            border-bottom: 2px solid #cbd5e1;
            padding: 12px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
        }
        .invoice-table td {
            border-bottom: 1px solid #e2e8f0;
            padding: 12px;
            font-size: 13.5px;
        }
        .signature-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-top: 48px;
            text-align: center;
        }
        .signature-line {
            border-top: 1px solid #94a3b8;
            margin-top: 70px;
            font-size: 13px;
            font-weight: 600;
        }
        .print-bar {
            max-width: 800px;
            margin: 0 auto 20px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        @media print {
            body {
                background: #fff;
                padding: 0;
            }
            .print-bar {
                display: none;
            }
            .invoice-box {
                border: none;
                box-shadow: none;
                padding: 0;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="print-bar no-print">
        <a href="{{ route('purchases.show', $purchase) }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
        <button onclick="window.print()" class="md-btn md-btn-primary md-btn-sm">
            <span class="material-symbols-outlined">print</span>
            <span>Cetak</span>
        </button>
    </div>

    <div class="invoice-box">
        <div class="invoice-header">
            <div>
                <div class="store-title">{{ $storeName }}</div>
                <div class="store-sub">{{ $storeAddress }}<br>Telepon: {{ $storePhone }}</div>
            </div>
            <div class="invoice-meta">
                <div class="invoice-title">Faktur Pembelian</div>
                <div class="meta-text">No: <strong>{{ $purchase->invoice_number }}</strong></div>
                <div class="meta-text">Tanggal: {{ $purchase->purchase_date->format('d F Y') }}</div>
            </div>
        </div>

        <div class="info-grid">
            <div class="info-card">
                <div class="info-heading">Pemasok / Supplier</div>
                <div class="info-content">
                    <strong>{{ $purchase->supplier->name }}</strong><br>
                    {{ $purchase->supplier->address ?? 'Alamat tidak dicatat' }}<br>
                    Telepon: {{ $purchase->supplier->phone ?? '-' }}
                </div>
            </div>
            <div class="info-card">
                <div class="info-heading">Penerima Barang</div>
                <div class="info-content">
                    <strong>{{ $storeName }}</strong><br>
                    Petugas: {{ $purchase->user->name ?? 'Admin' }}<br>
                    Unit Masuk: Gudang Bahan Mentah
                </div>
            </div>
        </div>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th style="width: 40px;">No</th>
                    <th>Nama Barang Mentah</th>
                    <th>Input Berat</th>
                    <th>Satuan Tampilan</th>
                    <th>Harga Satuan</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <strong>{{ $purchase->rawMaterial->name }}</strong><br>
                        <span style="font-size: 11.5px; color: #64748b;">Kode: {{ $purchase->rawMaterial->code }}</span>
                    </td>
                    <td>{{ $purchase->weight_value }} {{ $purchase->weight_unit }}</td>
                    <td><strong>{{ $purchase->formatted_weight }}</strong></td>
                    <td>Rp {{ number_format($purchase->price_per_unit, 0, ',', '.') }}</td>
                    <td style="text-align: right; font-weight: 700;">Rp {{ number_format($purchase->total_price, 0, ',', '.') }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: right; font-weight: 700; font-size: 14px; border-top: 2px solid #cbd5e1;">Total Tagihan:</td>
                    <td style="text-align: right; font-weight: 700; font-size: 16px; color: #1e3a8a; border-top: 2px solid #cbd5e1;">
                        Rp {{ number_format($purchase->total_price, 0, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>

        @if($purchase->notes)
        <div style="font-size: 13px; color: #475569; margin-bottom: 24px;">
            <strong>Catatan:</strong> {{ $purchase->notes }}
        </div>
        @endif

        <div class="signature-grid">
            <div>
                <div style="font-size: 13px; color: #64748b;">Diserahkan oleh (Pemasok)</div>
                <div class="signature-line">{{ $purchase->supplier->name }}</div>
            </div>
            <div>
                <div style="font-size: 13px; color: #64748b;">Diterima oleh (Gudang)</div>
                <div class="signature-line">{{ $purchase->user->name ?? 'Petugas Gudang' }}</div>
            </div>
        </div>
    </div>
</body>
</html>
