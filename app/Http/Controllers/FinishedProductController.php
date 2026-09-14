<?php

namespace App\Http\Controllers;

use App\Models\FinishedProduct;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FinishedProductController extends Controller
{
    public function index()
    {
        $products = FinishedProduct::latest()->paginate(10);
        $totalPacks = (int) FinishedProduct::sum('stock_packs');

        return view('finished_products.index', compact('products', 'totalPacks'));
    }

    public function show(FinishedProduct $finishedProduct)
    {
        $productions = $finishedProduct->productions()->with('rawMaterial')->latest()->take(10)->get();
        $saleItems = $finishedProduct->saleItems()->with('sale')->latest()->take(10)->get();
        $movements = StockMovement::where('item_type', 'finished_product')
            ->where('item_id', $finishedProduct->id)
            ->latest('movement_date')
            ->paginate(15);

        return view('finished_products.show', compact('finishedProduct', 'productions', 'saleItems', 'movements'));
    }

    public function create()
    {
        return view('finished_products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:50', 'unique:finished_products,code'],
            'name' => ['required', 'string', 'max:255'],
            'initial_packs' => ['nullable', 'integer', 'min:0'],
            'price_per_pack' => ['required', 'numeric', 'min:0'],
            'cost_per_pack' => ['nullable', 'numeric', 'min:0'],
            'min_stock_packs' => ['nullable', 'integer', 'min:0'],
            'notes' => ['nullable', 'string'],
        ]);

        $initialPacks = (int) ($validated['initial_packs'] ?? 0);

        DB::transaction(function () use ($validated, $initialPacks) {
            $product = FinishedProduct::create([
                'code' => $validated['code'],
                'name' => $validated['name'],
                'weight_per_pack_gram' => 300, // Standar 300 gram per bungkus
                'stock_packs' => $initialPacks,
                'price_per_pack' => $validated['price_per_pack'],
                'cost_per_pack' => $validated['cost_per_pack'] ?? 0,
                'min_stock_packs' => $validated['min_stock_packs'] ?? 0,
                'notes' => $validated['notes'] ?? null,
            ]);

            if ($initialPacks > 0) {
                StockMovement::create([
                    'movement_date' => now(),
                    'item_type' => 'finished_product',
                    'item_id' => $product->id,
                    'transaction_type' => 'Penyesuaian',
                    'reference_number' => 'STOK-AWAL',
                    'quantity_delta' => $initialPacks,
                    'unit' => 'bungkus',
                    'stock_before' => 0,
                    'stock_after' => $initialPacks,
                    'notes' => 'Saldo awal stok barang jadi',
                    'created_by' => Auth::id(),
                ]);
            }
        });

        return redirect()->route('finished-products.index')->with('success', 'Data barang jadi berhasil disimpan.');
    }

    public function edit(FinishedProduct $finishedProduct)
    {
        return view('finished_products.edit', compact('finishedProduct'));
    }

    public function update(Request $request, FinishedProduct $finishedProduct)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:50', 'unique:finished_products,code,' . $finishedProduct->id],
            'name' => ['required', 'string', 'max:255'],
            'price_per_pack' => ['required', 'numeric', 'min:0'],
            'cost_per_pack' => ['nullable', 'numeric', 'min:0'],
            'min_stock_packs' => ['nullable', 'integer', 'min:0'],
            'notes' => ['nullable', 'string'],
        ]);

        $finishedProduct->update([
            'code' => $validated['code'],
            'name' => $validated['name'],
            'price_per_pack' => $validated['price_per_pack'],
            'cost_per_pack' => $validated['cost_per_pack'] ?? 0,
            'min_stock_packs' => $validated['min_stock_packs'] ?? 0,
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->route('finished-products.index')->with('success', 'Data barang jadi berhasil diperbarui.');
    }
}
