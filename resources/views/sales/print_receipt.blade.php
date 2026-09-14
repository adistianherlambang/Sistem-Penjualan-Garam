<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Penjualan - {{ $sale->transaction_number }}</title>
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">
    <style>
        body {
            background-color: #f1f5f9;
            padding: 20px;
            font-family: 'Roboto', 'Courier New', monospace;
        }
        .receipt-box {
            width: 320px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #e2e8f0;
            font-size: 12.5px;
            color: #000;
        }
        .receipt-header {
            text-align: center;
            border-bottom: 1px dashed #000;
            padding-bottom: 12px;
            margin-bottom: 12px;
        }
        .receipt-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 3px;
        }
        .receipt-sub {
            font-size: 11px;
            color: #333;
        }
        .receipt-meta {
            margin-bottom: 12px;
            border-bottom: 1px dashed #000;
            padding-bottom: 10px;
            font-size: 11.5px;
        }
        .meta-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 3px;
        }
        .receipt-table {
            width: 100%;
            margin-bottom: 12px;
            border-bottom: 1px dashed #000;
            padding-bottom: 10px;
        }
        .receipt-table td {
            padding: 3px 0;
            vertical-align: top;
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 4px;
        }
        .receipt-footer {
            text-align: center;
            margin-top: 16px;
            padding-top: 10px;
            border-top: 1px dashed #000;
            font-size: 11px;
            color: #444;
        }
        .print-btn-wrap {
            width: 320px;
            margin: 0 auto 16px auto;
            display: flex;
            justify-content: space-between;
        }
        @media print {
            body {
                background: #fff;
                padding: 0;
            }
            .print-btn-wrap {
                display: none;
            }
            .receipt-box {
                border: none;
                box-shadow: none;
                padding: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="print-btn-wrap no-print">
        <a href="{{ route('sales.show', $sale) }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
        <button onclick="window.print()" class="md-btn md-btn-primary md-btn-sm">
            <span class="material-symbols-outlined">print</span>
            <span>Cetak</span>
        </button>
    </div>

    <div class="receipt-box">
        <div class="receipt-header">
            <div class="receipt-title">{{ $storeName }}</div>
            <div class="receipt-sub">{{ $storeAddress }}</div>
            <div class="receipt-sub">Telp: {{ $storePhone }}</div>
        </div>

        <div class="receipt-meta">
            <div class="meta-row">
                <span>No: {{ $sale->transaction_number }}</span>
                <span>{{ $sale->sale_date->format('d/m/Y') }}</span>
            </div>
            <div class="meta-row">
                <span>Kasir: {{ $sale->user->name ?? 'Admin' }}</span>
                <span>{{ $sale->created_at->format('H:i') }}</span>
            </div>
            <div class="meta-row">
                <span>Pelanggan:</span>
                <span>{{ $sale->customer_name ?? 'Umum' }}</span>
            </div>
        </div>

        <table class="receipt-table">
            <tbody>
                @foreach($sale->items as $item)
                <tr>
                    <td colspan="2"><strong>{{ $item->product->name }}</strong></td>
                </tr>
                <tr>
                    <td>{{ $item->quantity_packs }} bks × Rp {{ number_format($item->price_per_pack, 0, ',', '.') }}</td>
                    <td style="text-align: right;">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            <div class="total-row" style="font-weight: 700; font-size: 13.5px;">
                <span>TOTAL:</span>
                <span>Rp {{ number_format($sale->total_amount, 0, ',', '.') }}</span>
            </div>
            <div class="total-row">
                <span>Bayar ({{ ucfirst($sale->payment_method) }}):</span>
                <span>Rp {{ number_format($sale->paid_amount, 0, ',', '.') }}</span>
            </div>
            <div class="total-row" style="font-weight: 700;">
                <span>Kembalian:</span>
                <span>Rp {{ number_format($sale->change_amount, 0, ',', '.') }}</span>
            </div>
        </div>

        <div class="receipt-footer">
            <div>{{ $receiptFooter }}</div>
            <div style="margin-top: 4px;">Barang yang sudah dibeli tidak dapat ditukar/dikembalikan</div>
        </div>
    </div>
</body>
</html>
