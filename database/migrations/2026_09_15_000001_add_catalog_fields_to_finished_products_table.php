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
        Schema::table('finished_products', function (Blueprint $table) {
            $table->string('category')->default('Garam Konsumsi')->after('name');
            $table->string('packaging')->nullable()->after('weight_per_pack_gram');
            $table->string('image')->nullable()->after('notes');
            $table->boolean('is_active')->default(true)->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('finished_products', function (Blueprint $table) {
            $table->dropColumn(['category', 'packaging', 'image', 'is_active']);
        });
    }
};
