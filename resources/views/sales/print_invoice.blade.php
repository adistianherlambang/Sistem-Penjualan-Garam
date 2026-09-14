<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktur Penjualan - {{ $sale->transaction_number }}</title>
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
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
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
        <a href="{{ route('sales.show', $sale) }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
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
                <div class="invoice-title">Faktur Penjualan</div>
                <div class="meta-text">No: <strong>{{ $sale->transaction_number }}</strong></div>
                <div class="meta-text">Tanggal: {{ $sale->sale_date->format('d F Y') }}</div>
            </div>
        </div>

        <div class="info-grid">
            <div class="info-card">
                <div class="info-heading">Kepada Yth (Pelanggan)</div>
                <div class="info-content">
                    <strong>{{ $sale->customer_name ?? 'Pelanggan Umum' }}</strong><br>
                    Metode Pembayaran: {{ ucfirst($sale->payment_method) }}
                </div>
            </div>
            <div class="info-card">
                <div class="info-heading">Informasi Kasir</div>
                <div class="info-content">
                    Kasir: {{ $sale->user->name ?? 'Admin' }}<br>
                    Waktu: {{ $sale->created_at->format('d/m/Y H:i') }}
                </div>
            </div>
        </div>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th style="width: 40px;">No</th>
                    <th>Nama Produk</th>
                    <th>Standar Kemasan</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th style="text-align: right;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sale->items as $idx => $item)
                <tr>
                    <td>{{ $idx + 1 }}</td>
                    <td>
                        <strong>{{ $item->product->name }}</strong><br>
                        <span style="font-size: 11.5px; color: #64748b;">Kode: {{ $item->product->code }}</span>
                    </td>
                    <td>{{ $item->product->weight_per_pack_gram }} gram / bungkus</td>
                    <td>Rp {{ number_format($item->price_per_pack, 0, ',', '.') }}</td>
                    <td><strong>{{ number_format($item->quantity_packs, 0, ',', '.') }} bungkus</strong></td>
                    <td style="text-align: right; font-weight: 700;">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: right; font-weight: 700; font-size: 14px; border-top: 2px solid #cbd5e1;">Total Tagihan:</td>
                    <td style="text-align: right; font-weight: 700; font-size: 16px; color: #1e3a8a; border-top: 2px solid #cbd5e1;">
                        Rp {{ number_format($sale->total_amount, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: right; border-top: none;">Jumlah Bayar:</td>
                    <td style="text-align: right; font-weight: 600; border-top: none;">Rp {{ number_format($sale->paid_amount, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: right; border-top: none; font-weight: 700;">Kembalian:</td>
                    <td style="text-align: right; font-weight: 700; color: #15803d; border-top: none;">
                        Rp {{ number_format($sale->change_amount, 0, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>

        @if($sale->notes)
        <div style="font-size: 13px; color: #475569; margin-bottom: 24px;">
            <strong>Catatan:</strong> {{ $sale->notes }}
        </div>
        @endif

        <div class="signature-grid">
            <div>
                <div style="font-size: 13px; color: #64748b;">Penerima / Pembeli</div>
                <div class="signature-line">{{ $sale->customer_name ?? 'Pelanggan' }}</div>
            </div>
            <div>
                <div style="font-size: 13px; color: #64748b;">Hormat Kami</div>
                <div class="signature-line">{{ $sale->user->name ?? 'Kasir POS Garam' }}</div>
            </div>
        </div>
    </div>
</body>
</html>
