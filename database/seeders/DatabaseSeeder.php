<?php

namespace Database\Seeders;

use App\Models\FinishedProduct;
use App\Models\Production;
use App\Models\Purchase;
use App\Models\RawMaterial;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Setting;
use App\Models\StockMovement;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Users (Admin & Owner)
        $admin = User::create([
            'name' => 'Admin Operasional',
            'email' => 'admin@posgaram.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        $owner = User::create([
            'name' => 'Owner Bisnis',
            'email' => 'owner@posgaram.com',
            'password' => Hash::make('password123'),
            'role' => 'owner',
        ]);

        // 2. Settings
        Setting::set('store_name', 'CV. Banyu Mili');
        Setting::set('store_address', 'Desa Banjar Rejo, Kabupaten Lampung Timur');
        Setting::set('store_phone', '08136906089');
        Setting::set('receipt_footer', 'Terima kasih atas kepercayaan Anda. Garam Konsumsi Beryodium SNI CV. Banyu Mili.');

        // 3. Suppliers
        $sup1 = Supplier::create([
            'name' => 'PT Garam Samudera Madura',
            'phone' => '0811-2233-4455',
            'address' => 'Kawasan Sentra Garam Kalianget, Sumenep, Madura',
            'notes' => 'Supplier utama kristal garam laut kualitas tinggi',
        ]);

        $sup2 = Supplier::create([
            'name' => 'Koperasi Petani Segara Makmur',
            'phone' => '0812-9988-7766',
            'address' => 'Desa Pinggirpapas, Sumenep, Madura',
            'notes' => 'Kemitraan petani garam lokal',
        ]);

        // 4. Raw Materials (Stok dasar dalam GRAM)
        // 50.000 kg = 50.000.000 gram = 50 ton
        $raw1 = RawMaterial::create([
            'code' => 'RM-01',
            'name' => 'Garam Mentah Kristal Kasar',
            'stock_gram' => 50000000, // 50 ton
            'min_stock_gram' => 5000000, // 5 ton
            'notes' => 'Garam laut kristal putih bersih',
        ]);

        StockMovement::create([
            'movement_date' => now()->subDays(10),
            'item_type' => 'raw_material',
            'item_id' => $raw1->id,
            'transaction_type' => 'Penyesuaian',
            'reference_number' => 'SALDO-AWAL',
            'quantity_delta' => 50000000,
            'unit' => 'gram',
            'stock_before' => 0,
            'stock_after' => 50000000,
            'notes' => 'Saldo awal stok barang mentah',
            'created_by' => $admin->id,
        ]);

        // 5. Finished Products (Standar 300 gram per bungkus)
        $fin1 = FinishedProduct::create([
            'code' => 'FG-01',
            'name' => 'Garam Konsumsi Beryodium 300g',
            'weight_per_pack_gram' => 300,
            'stock_packs' => 300,
            'price_per_pack' => 3500.00,
            'cost_per_pack' => 2000.00,
            'min_stock_packs' => 50,
            'notes' => 'Garam halus konsumsi beryodium 30-80 ppm kemasan 300 gram',
        ]);

        StockMovement::create([
            'movement_date' => now()->subDays(10),
            'item_type' => 'finished_product',
            'item_id' => $fin1->id,
            'transaction_type' => 'Penyesuaian',
            'reference_number' => 'SALDO-AWAL',
            'quantity_delta' => 300,
            'unit' => 'bungkus',
            'stock_before' => 0,
            'stock_after' => 300,
            'notes' => 'Saldo awal stok barang jadi',
            'created_by' => $admin->id,
        ]);

        // 6. Sample Purchase
        // Beli 10 ton garam mentah = 10.000 kg = 10.000.000 gram
        $purchase = Purchase::create([
            'invoice_number' => 'PB-' . date('Ymd') . '-001',
            'purchase_date' => now()->subDays(5)->toDateString(),
            'supplier_id' => $sup1->id,
            'raw_material_id' => $raw1->id,
            'weight_value' => 10,
            'weight_unit' => 'ton',
            'weight_in_gram' => 10000000,
            'price_per_unit' => 1200000, // Rp 1.200.000 per ton
            'total_price' => 12000000,
            'notes' => 'Pengiriman truk armada 1',
            'created_by' => $admin->id,
        ]);

        $raw1Before = $raw1->stock_gram;
        $raw1After = $raw1Before + 10000000;
        $raw1->update(['stock_gram' => $raw1After]);

        StockMovement::create([
            'movement_date' => now()->subDays(5),
            'item_type' => 'raw_material',
            'item_id' => $raw1->id,
            'transaction_type' => 'Barang Masuk',
            'reference_number' => $purchase->invoice_number,
            'quantity_delta' => 10000000,
            'unit' => 'gram',
            'stock_before' => $raw1Before,
            'stock_after' => $raw1After,
            'notes' => 'Pembelian dari PT Garam Samudera Madura',
            'created_by' => $admin->id,
        ]);

        // 7. Sample Production: Produksi 100 bungkus (100 * 300 gram = 30.000 gram = 30 kg)
        $prodPacks = 100;
        $rawUsed = $prodPacks * 300; // 30.000 gram
        $prodNumber = 'PR-' . date('Ymd') . '-001';

        $rawBeforeProd = $raw1->stock_gram;
        $rawAfterProd = $rawBeforeProd - $rawUsed;
        $raw1->update(['stock_gram' => $rawAfterProd]);

        $finBeforeProd = $fin1->stock_packs;
        $finAfterProd = $finBeforeProd + $prodPacks;
        $fin1->update(['stock_packs' => $finAfterProd]);

        Production::create([
            'production_number' => $prodNumber,
            'production_date' => now()->subDays(3)->toDateString(),
            'raw_material_id' => $raw1->id,
            'finished_product_id' => $fin1->id,
            'pack_quantity' => $prodPacks,
            'weight_per_pack_gram' => 300,
            'total_raw_used_gram' => $rawUsed,
            'notes' => 'Proses pengeringan, iodisasi, dan pengemasan batch pagi',
            'created_by' => $admin->id,
        ]);

        StockMovement::create([
            'movement_date' => now()->subDays(3),
            'item_type' => 'raw_material',
            'item_id' => $raw1->id,
            'transaction_type' => 'Produksi',
            'reference_number' => $prodNumber,
            'quantity_delta' => -$rawUsed,
            'unit' => 'gram',
            'stock_before' => $rawBeforeProd,
            'stock_after' => $rawAfterProd,
            'notes' => "Digunakan untuk produksi {$prodPacks} bungkus",
            'created_by' => $admin->id,
        ]);

        StockMovement::create([
            'movement_date' => now()->subDays(3),
            'item_type' => 'finished_product',
            'item_id' => $fin1->id,
            'transaction_type' => 'Produksi',
            'reference_number' => $prodNumber,
            'quantity_delta' => $prodPacks,
            'unit' => 'bungkus',
            'stock_before' => $finBeforeProd,
            'stock_after' => $finAfterProd,
            'notes' => "Hasil produksi {$prodPacks} bungkus garam",
            'created_by' => $admin->id,
        ]);

        // 8. Sample Sales
        // Jual 40 bungkus @ Rp 3.500 = Rp 140.000
        $salePacks = 40;
        $unitPrice = 3500;
        $totalSale = $salePacks * $unitPrice;
        $txNumber = 'PJ-' . date('Ymd') . '-001';

        $finBeforeSale = $fin1->stock_packs;
        $finAfterSale = $finBeforeSale - $salePacks;
        $fin1->update(['stock_packs' => $finAfterSale]);

        $sale = Sale::create([
            'transaction_number' => $txNumber,
            'sale_date' => now()->subDay()->toDateString(),
            'customer_name' => 'Toko Sembako Berkah',
            'total_amount' => $totalSale,
            'paid_amount' => 150000,
            'change_amount' => 10000,
            'payment_method' => 'cash',
            'notes' => 'Pembelian grosir toko',
            'created_by' => $admin->id,
        ]);

        SaleItem::create([
            'sale_id' => $sale->id,
            'finished_product_id' => $fin1->id,
            'quantity_packs' => $salePacks,
            'price_per_pack' => $unitPrice,
            'subtotal' => $totalSale,
        ]);

        StockMovement::create([
            'movement_date' => now()->subDay(),
            'item_type' => 'finished_product',
            'item_id' => $fin1->id,
            'transaction_type' => 'Penjualan',
            'reference_number' => $txNumber,
            'quantity_delta' => -$salePacks,
            'unit' => 'bungkus',
            'stock_before' => $finBeforeSale,
            'stock_after' => $finAfterSale,
            'notes' => 'Penjualan kepada Toko Sembako Berkah',
            'created_by' => $admin->id,
        ]);
    }
}
