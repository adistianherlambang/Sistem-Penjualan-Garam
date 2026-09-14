<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Suppliers
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // 2. Raw Materials (Bahan Mentah - Gram as base unit)
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->unsignedBigInteger('stock_gram')->default(0); // Satuan dasar internal: GRAM
            $table->unsignedBigInteger('min_stock_gram')->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // 3. Finished Products (Barang Jadi - Satuan Bungkus, 1 bungkus = 300 gram)
        Schema::create('finished_products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->unsignedInteger('weight_per_pack_gram')->default(300); // Standar 300 gram
            $table->unsignedInteger('stock_packs')->default(0); // Satuan bungkus
            $table->decimal('price_per_pack', 12, 2)->default(0);
            $table->decimal('cost_per_pack', 12, 2)->default(0);
            $table->unsignedInteger('min_stock_packs')->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // 4. Purchases (Pembelian Barang Mentah)
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->date('purchase_date');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('restrict');
            $table->foreignId('raw_material_id')->constrained('raw_materials')->onDelete('restrict');
            $table->decimal('weight_value', 12, 3); // Nilai yang diinput
            $table->string('weight_unit', 10); // 'gram', 'kg', 'ton'
            $table->unsignedBigInteger('weight_in_gram'); // Hasil konversi ke gram
            $table->decimal('price_per_unit', 14, 2)->default(0);
            $table->decimal('total_price', 14, 2)->default(0);
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        // 5. Productions (Proses Produksi Garam Bungkus)
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->string('production_number')->unique();
            $table->date('production_date');
            $table->foreignId('raw_material_id')->constrained('raw_materials')->onDelete('restrict');
            $table->foreignId('finished_product_id')->constrained('finished_products')->onDelete('restrict');
            $table->unsignedInteger('pack_quantity'); // Jumlah bungkus yang diproduksi
            $table->unsignedInteger('weight_per_pack_gram')->default(300);
            $table->unsignedBigInteger('total_raw_used_gram'); // pack_quantity * weight_per_pack_gram
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        // 6. Sales (Transaksi Penjualan)
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number')->unique();
            $table->date('sale_date');
            $table->string('customer_name')->nullable();
            $table->decimal('total_amount', 14, 2)->default(0);
            $table->decimal('paid_amount', 14, 2)->default(0);
            $table->decimal('change_amount', 14, 2)->default(0);
            $table->string('payment_method', 30)->default('cash');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        // 7. Sale Items (Rincian Produk Penjualan)
        Schema::create('sale_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->constrained('sales')->onDelete('cascade');
            $table->foreignId('finished_product_id')->constrained('finished_products')->onDelete('restrict');
            $table->unsignedInteger('quantity_packs');
            $table->decimal('price_per_pack', 12, 2);
            $table->decimal('subtotal', 14, 2);
            $table->timestamps();
        });

        // 8. Stock Movements (Riwayat Pergerakan Stok Mentah & Jadi)
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->dateTime('movement_date');
            $table->string('item_type', 30); // 'raw_material' atau 'finished_product'
            $table->unsignedBigInteger('item_id');
            $table->string('transaction_type', 30); // 'Barang Masuk', 'Produksi', 'Penjualan', 'Penyesuaian'
            $table->string('reference_number')->nullable();
            $table->bigInteger('quantity_delta'); // Negatif jika berkurang, positif jika bertambah
            $table->string('unit', 15); // 'gram' atau 'bungkus'
            $table->bigInteger('stock_before');
            $table->bigInteger('stock_after');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index(['item_type', 'item_id']);
        });

        // 9. Settings (Pengaturan Profil Toko & Nota)
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('stock_movements');
        Schema::dropIfExists('sale_items');
        Schema::dropIfExists('sales');
        Schema::dropIfExists('productions');
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('finished_products');
        Schema::dropIfExists('raw_materials');
        Schema::dropIfExists('suppliers');
    }
};
