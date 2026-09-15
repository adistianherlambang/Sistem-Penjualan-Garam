<?php

namespace Tests\Feature;

use App\Models\FinishedProduct;
use App\Models\Purchase;
use App\Models\Production;
use App\Models\RawMaterial;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteCoverageTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;
    protected User $owner;
    protected Supplier $supplier;
    protected RawMaterial $rawMaterial;
    protected FinishedProduct $finishedProduct;
    protected Purchase $purchase;
    protected Production $production;
    protected Sale $sale;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create([
            'name' => 'Admin Sistem',
            'email' => 'admin@posgaram.com',
            'role' => 'admin',
        ]);

        $this->owner = User::factory()->create([
            'name' => 'Owner Sistem',
            'email' => 'owner@posgaram.com',
            'role' => 'owner',
        ]);

        $this->supplier = Supplier::create([
            'name' => 'PT Garam Samudera',
            'phone' => '0811223344',
            'address' => 'Kalianget, Sumenep',
        ]);

        $this->rawMaterial = RawMaterial::create([
            'code' => 'RM-01',
            'name' => 'Garam Kristal Kasar',
            'stock_gram' => 50000000, // 50 ton
            'min_stock_gram' => 5000000,
        ]);

        $this->finishedProduct = FinishedProduct::create([
            'code' => 'FG-01',
            'name' => 'Garam Konsumsi 300g',
            'weight_per_pack_gram' => 300,
            'stock_packs' => 300,
            'price_per_pack' => 3500,
            'cost_per_pack' => 2000,
        ]);

        $this->purchase = Purchase::create([
            'invoice_number' => 'PB-20260914-001',
            'purchase_date' => now()->toDateString(),
            'supplier_id' => $this->supplier->id,
            'raw_material_id' => $this->rawMaterial->id,
            'weight_value' => 5,
            'weight_unit' => 'ton',
            'weight_in_gram' => 5000000,
            'price_per_unit' => 1200000,
            'total_price' => 6000000,
            'created_by' => $this->admin->id,
        ]);

        $this->production = Production::create([
            'production_number' => 'PR-20260914-001',
            'production_date' => now()->toDateString(),
            'raw_material_id' => $this->rawMaterial->id,
            'finished_product_id' => $this->finishedProduct->id,
            'pack_quantity' => 100,
            'weight_per_pack_gram' => 300,
            'total_raw_used_gram' => 30000,
            'created_by' => $this->admin->id,
        ]);

        $this->sale = Sale::create([
            'transaction_number' => 'PJ-20260914-001',
            'sale_date' => now()->toDateString(),
            'customer_name' => 'Toko Barokah',
            'total_amount' => 70000,
            'paid_amount' => 100000,
            'change_amount' => 30000,
            'payment_method' => 'cash',
            'created_by' => $this->admin->id,
        ]);

        SaleItem::create([
            'sale_id' => $this->sale->id,
            'finished_product_id' => $this->finishedProduct->id,
            'quantity_packs' => 20,
            'price_per_pack' => 3500,
            'subtotal' => 70000,
        ]);
    }

    public function test_public_routes(): void
    {
        $this->get(route('landing'))->assertOk()->assertSee('Garam');
        $this->get(route('login'))->assertOk()->assertSee('Masuk');
    }

    public function test_all_admin_navigation_routes(): void
    {
        $this->actingAs($this->admin);

        $routes = [
            route('dashboard'),
            route('raw-materials.index'),
            route('raw-materials.create'),
            route('raw-materials.show', $this->rawMaterial),
            route('raw-materials.edit', $this->rawMaterial),
            route('finished-products.index'),
            route('finished-products.create'),
            route('finished-products.show', $this->finishedProduct),
            route('finished-products.edit', $this->finishedProduct),
            route('suppliers.index'),
            route('suppliers.create'),
            route('suppliers.edit', $this->supplier),
            route('purchases.index'),
            route('purchases.create'),
            route('purchases.show', $this->purchase),
            route('purchases.print', $this->purchase),
            route('productions.index'),
            route('productions.create'),
            route('productions.show', $this->production),
            route('sales.index'),
            route('sales.create'),
            route('sales.show', $this->sale),
            route('sales.receipt', $this->sale),
            route('sales.invoice', $this->sale),
            route('stock-movements.index'),
            route('reports.index'),
            route('reports.sales'),
            route('reports.purchases'),
            route('reports.productions'),
            route('reports.stocks'),
            route('reports.profit'),
            route('settings.index'),
        ];

        foreach ($routes as $url) {
            $response = $this->get($url);
            $this->assertEquals(200, $response->status(), "Route {$url} failed with status {$response->status()}");
        }
    }
}
