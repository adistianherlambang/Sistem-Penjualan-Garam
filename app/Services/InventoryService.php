<?php

namespace App\Services;

use App\Helpers\WeightFormatter;
use App\Models\FinishedProduct;
use App\Models\Purchase;
use App\Models\Production;
use App\Models\RawMaterial;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class InventoryService
{
    /**
     * Record a raw material purchase transaction and update stock.
     */
    public function recordPurchase(array $data, int $userId): Purchase
    {
        $weightInGram = (int) round(WeightFormatter::toGrams((float) $data['weight_value'], $data['weight_unit']));

        if ($weightInGram <= 0) {
            throw ValidationException::withMessages([
                'weight_value' => 'Berat barang harus lebih besar dari 0.',
            ]);
        }

        return DB::transaction(function () use ($data, $weightInGram, $userId) {
            $rawMaterial = RawMaterial::lockForUpdate()->findOrFail($data['raw_material_id']);

            $stockBefore = $rawMaterial->stock_gram;
            $stockAfter = $stockBefore + $weightInGram;

            // Generate invoice number if not provided
            $invoiceNumber = $data['invoice_number'] ?? ('PB-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4)));

            $purchase = Purchase::create([
                'invoice_number' => $invoiceNumber,
                'purchase_date' => $data['purchase_date'] ?? now()->toDateString(),
                'supplier_id' => $data['supplier_id'],
                'raw_material_id' => $rawMaterial->id,
                'weight_value' => $data['weight_value'],
                'weight_unit' => $data['weight_unit'],
                'weight_in_gram' => $weightInGram,
                'price_per_unit' => $data['price_per_unit'] ?? 0,
                'total_price' => $data['total_price'] ?? 0,
                'notes' => $data['notes'] ?? null,
                'created_by' => $userId,
            ]);

            // Update raw material stock
            $rawMaterial->update([
                'stock_gram' => $stockAfter,
            ]);

            // Record movement
            StockMovement::create([
                'movement_date' => now(),
                'item_type' => 'raw_material',
                'item_id' => $rawMaterial->id,
                'transaction_type' => 'Barang Masuk',
                'reference_number' => $invoiceNumber,
                'quantity_delta' => $weightInGram,
                'unit' => 'gram',
                'stock_before' => $stockBefore,
                'stock_after' => $stockAfter,
                'notes' => 'Pembelian dari supplier: ' . ($purchase->supplier->name ?? '-'),
                'created_by' => $userId,
            ]);

            return $purchase;
        });
    }

    /**
     * Record production process: converts raw material (grams) into finished packs (300g per pack).
     * Standard: 1 bungkus = 300 gram.
     * Formula: raw material used = pack_quantity * 300.
     */
    public function recordProduction(array $data, int $userId): Production
    {
        $packQuantity = (int) $data['pack_quantity'];
        if ($packQuantity <= 0) {
            throw ValidationException::withMessages([
                'pack_quantity' => 'Jumlah bungkus produksi harus lebih besar dari 0.',
            ]);
        }

        $weightPerPack = 300; // Standar 300 gram
        $totalRawUsedGram = $packQuantity * $weightPerPack;

        return DB::transaction(function () use ($data, $packQuantity, $weightPerPack, $totalRawUsedGram, $userId) {
            $rawMaterial = RawMaterial::lockForUpdate()->findOrFail($data['raw_material_id']);
            $finishedProduct = FinishedProduct::lockForUpdate()->findOrFail($data['finished_product_id']);

            // Validate stock availability
            if ($rawMaterial->stock_gram < $totalRawUsedGram) {
                $neededFormatted = WeightFormatter::format($totalRawUsedGram);
                $availableFormatted = WeightFormatter::format($rawMaterial->stock_gram);
                throw ValidationException::withMessages([
                    'pack_quantity' => "Stok barang mentah tidak mencukupi untuk produksi {$packQuantity} bungkus. Dibutuhkan {$neededFormatted}, tersedia {$availableFormatted}.",
                ]);
            }

            $rawStockBefore = $rawMaterial->stock_gram;
            $rawStockAfter = $rawStockBefore - $totalRawUsedGram;

            $finStockBefore = $finishedProduct->stock_packs;
            $finStockAfter = $finStockBefore + $packQuantity;

            $prodNumber = 'PR-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));

            $production = Production::create([
                'production_number' => $prodNumber,
                'production_date' => $data['production_date'] ?? now()->toDateString(),
                'raw_material_id' => $rawMaterial->id,
                'finished_product_id' => $finishedProduct->id,
                'pack_quantity' => $packQuantity,
                'weight_per_pack_gram' => $weightPerPack,
                'total_raw_used_gram' => $totalRawUsedGram,
                'notes' => $data['notes'] ?? null,
                'created_by' => $userId,
            ]);

            // Update stocks
            $rawMaterial->update(['stock_gram' => $rawStockAfter]);
            $finishedProduct->update(['stock_packs' => $finStockAfter]);

            // 1. Movement: Raw Material deduction
            StockMovement::create([
                'movement_date' => now(),
                'item_type' => 'raw_material',
                'item_id' => $rawMaterial->id,
                'transaction_type' => 'Produksi',
                'reference_number' => $prodNumber,
                'quantity_delta' => -$totalRawUsedGram,
                'unit' => 'gram',
                'stock_before' => $rawStockBefore,
                'stock_after' => $rawStockAfter,
                'notes' => "Digunakan untuk produksi {$packQuantity} bungkus",
                'created_by' => $userId,
            ]);

            // 2. Movement: Finished Product addition
            StockMovement::create([
                'movement_date' => now(),
                'item_type' => 'finished_product',
                'item_id' => $finishedProduct->id,
                'transaction_type' => 'Produksi',
                'reference_number' => $prodNumber,
                'quantity_delta' => $packQuantity,
                'unit' => 'bungkus',
                'stock_before' => $finStockBefore,
                'stock_after' => $finStockAfter,
                'notes' => "Hasil produksi {$packQuantity} bungkus garam",
                'created_by' => $userId,
            ]);

            return $production;
        });
    }

    /**
     * Record a sale transaction of finished packs and deduct finished stock.
     */
    public function recordSale(array $data, int $userId): Sale
    {
        $packQuantity = (int) $data['pack_quantity'];
        if ($packQuantity <= 0) {
            throw ValidationException::withMessages([
                'pack_quantity' => 'Jumlah bungkus penjualan harus lebih dari 0.',
            ]);
        }

        $paidAmount = (float) $data['paid_amount'];

        return DB::transaction(function () use ($data, $packQuantity, $paidAmount, $userId) {
            $finishedProduct = FinishedProduct::lockForUpdate()->findOrFail($data['finished_product_id']);

            // Validate finished goods stock
            if ($finishedProduct->stock_packs < $packQuantity) {
                throw ValidationException::withMessages([
                    'pack_quantity' => "Stok barang jadi tidak mencukupi. Tersedia {$finishedProduct->stock_packs} bungkus, diminta {$packQuantity} bungkus.",
                ]);
            }

            $pricePerPack = (float) ($data['price_per_pack'] ?? $finishedProduct->price_per_pack);
            $totalAmount = $pricePerPack * $packQuantity;

            if ($paidAmount < $totalAmount) {
                $deficit = number_format($totalAmount - $paidAmount, 0, ',', '.');
                throw ValidationException::withMessages([
                    'paid_amount' => "Pembayaran kurang sebesar Rp {$deficit}.",
                ]);
            }

            $changeAmount = $paidAmount - $totalAmount;
            $txNumber = 'PJ-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));

            $finStockBefore = $finishedProduct->stock_packs;
            $finStockAfter = $finStockBefore - $packQuantity;

            $sale = Sale::create([
                'transaction_number' => $txNumber,
                'sale_date' => $data['sale_date'] ?? now()->toDateString(),
                'customer_name' => $data['customer_name'] ?? 'Pelanggan Umum',
                'total_amount' => $totalAmount,
                'paid_amount' => $paidAmount,
                'change_amount' => $changeAmount,
                'payment_method' => $data['payment_method'] ?? 'cash',
                'notes' => $data['notes'] ?? null,
                'created_by' => $userId,
            ]);

            SaleItem::create([
                'sale_id' => $sale->id,
                'finished_product_id' => $finishedProduct->id,
                'quantity_packs' => $packQuantity,
                'price_per_pack' => $pricePerPack,
                'subtotal' => $totalAmount,
            ]);

            // Update finished stock
            $finishedProduct->update(['stock_packs' => $finStockAfter]);

            // Record movement
            StockMovement::create([
                'movement_date' => now(),
                'item_type' => 'finished_product',
                'item_id' => $finishedProduct->id,
                'transaction_type' => 'Penjualan',
                'reference_number' => $txNumber,
                'quantity_delta' => -$packQuantity,
                'unit' => 'bungkus',
                'stock_before' => $finStockBefore,
                'stock_after' => $finStockAfter,
                'notes' => "Penjualan kepada " . ($data['customer_name'] ?? 'Pelanggan Umum'),
                'created_by' => $userId,
            ]);

            return $sale;
        });
    }
}
