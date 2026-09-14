<?php

namespace Tests\Feature;

use App\Models\FinishedProduct;
use App\Models\RawMaterial;
use App\Models\Supplier;
use App\Models\User;
use App\Services\InventoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class InventoryBusinessLogicTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;
    protected User $owner;
    protected Supplier $supplier;
    protected RawMaterial $rawMaterial;
    protected FinishedProduct $finishedProduct;
    protected InventoryService $service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = app(InventoryService::class);

        $this->admin = User::factory()->create([
            'name' => 'Admin Test',
            'email' => 'admin_test@test.com',
            'role' => 'admin',
        ]);

        $this->owner = User::factory()->create([
            'name' => 'Owner Test',
            'email' => 'owner_test@test.com',
            'role' => 'owner',
        ]);

        $this->supplier = Supplier::create([
            'name' => 'Supplier Test',
            'phone' => '0812345678',
        ]);

        // 30 kg = 30.000 gram
        $this->rawMaterial = RawMaterial::create([
            'code' => 'RM-T1',
            'name' => 'Garam Kristal Test',
            'stock_gram' => 30000,
            'min_stock_gram' => 5000,
        ]);

        $this->finishedProduct = FinishedProduct::create([
            'code' => 'FP-T1',
            'name' => 'Garam Kemasan 300g Test',
            'weight_per_pack_gram' => 300,
            'stock_packs' => 10,
            'price_per_pack' => 3500,
            'cost_per_pack' => 2000,
        ]);
    }

    public function test_production_deducts_raw_material_and_adds_finished_product(): void
    {
        // Produce 80 packs -> 80 * 300g = 24.000g
        // Starting raw: 30.000g -> After: 6.000g (6 kg)
        // Starting finished: 10 bks -> After: 90 bks
        $production = $this->service->recordProduction([
            'production_date' => now()->toDateString(),
            'raw_material_id' => $this->rawMaterial->id,
            'finished_product_id' => $this->finishedProduct->id,
            'pack_quantity' => 80,
            'notes' => 'Test Batch',
        ], $this->admin->id);

        $this->rawMaterial->refresh();
        $this->finishedProduct->refresh();

        $this->assertEquals(6000, $this->rawMaterial->stock_gram);
        $this->assertEquals(90, $this->finishedProduct->stock_packs);
        $this->assertEquals(24000, $production->total_raw_used_gram);

        // Verify stock movements recorded
        $this->assertDatabaseHas('stock_movements', [
            'item_type' => 'raw_material',
            'item_id' => $this->rawMaterial->id,
            'quantity_delta' => -24000,
            'transaction_type' => 'Produksi',
        ]);

        $this->assertDatabaseHas('stock_movements', [
            'item_type' => 'finished_product',
            'item_id' => $this->finishedProduct->id,
            'quantity_delta' => 80,
            'transaction_type' => 'Produksi',
        ]);
    }

    public function test_production_prevents_negative_raw_material_stock(): void
    {
        // Available raw: 30.000g. Requesting 101 packs needs 101 * 300g = 30.300g
        $this->expectException(ValidationException::class);

        $this->service->recordProduction([
            'production_date' => now()->toDateString(),
            'raw_material_id' => $this->rawMaterial->id,
            'finished_product_id' => $this->finishedProduct->id,
            'pack_quantity' => 101,
        ], $this->admin->id);

        // Stock must remain unchanged
        $this->rawMaterial->refresh();
        $this->assertEquals(30000, $this->rawMaterial->stock_gram);
    }

    public function test_sale_deducts_finished_product_stock(): void
    {
        // Available: 10 bks. Sell: 4 bks @ 3500 = 14000. Pay: 20000 -> change: 6000
        $sale = $this->service->recordSale([
            'sale_date' => now()->toDateString(),
            'customer_name' => 'Budi',
            'finished_product_id' => $this->finishedProduct->id,
            'pack_quantity' => 4,
            'price_per_pack' => 3500,
            'paid_amount' => 20000,
            'payment_method' => 'cash',
        ], $this->admin->id);

        $this->finishedProduct->refresh();

        $this->assertEquals(6, $this->finishedProduct->stock_packs);
        $this->assertEquals(14000, $sale->total_amount);
        $this->assertEquals(6000, $sale->change_amount);

        $this->assertDatabaseHas('stock_movements', [
            'item_type' => 'finished_product',
            'item_id' => $this->finishedProduct->id,
            'quantity_delta' => -4,
            'transaction_type' => 'Penjualan',
        ]);
    }

    public function test_sale_prevents_negative_finished_stock(): void
    {
        // Available: 10 bks. Sell: 15 bks -> Must fail
        $this->expectException(ValidationException::class);

        $this->service->recordSale([
            'sale_date' => now()->toDateString(),
            'finished_product_id' => $this->finishedProduct->id,
            'pack_quantity' => 15,
            'paid_amount' => 100000,
        ], $this->admin->id);

        $this->finishedProduct->refresh();
        $this->assertEquals(10, $this->finishedProduct->stock_packs);
    }

    public function test_role_access_control(): void
    {
        // Owner can access dashboard & reports
        $response = $this->actingAs($this->owner)->get(route('dashboard'));
        $response->assertOk();

        $response = $this->actingAs($this->owner)->get(route('reports.profit'));
        $response->assertOk();

        // Owner CANNOT access admin operational create routes
        $response = $this->actingAs($this->owner)->get(route('productions.create'));
        $response->assertForbidden();

        $response = $this->actingAs($this->owner)->get(route('sales.create'));
        $response->assertForbidden();

        $response = $this->actingAs($this->owner)->get(route('raw-materials.create'));
        $response->assertForbidden();

        // Admin CAN access operational create routes
        $response = $this->actingAs($this->admin)->get(route('productions.create'));
        $response->assertOk();

        $response = $this->actingAs($this->admin)->get(route('sales.create'));
        $response->assertOk();
    }
}
