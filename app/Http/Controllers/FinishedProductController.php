<?php

namespace App\Http\Controllers;

use App\Models\FinishedProduct;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FinishedProductController extends Controller
{
    public function index()
    {
        $products = FinishedProduct::latest()->paginate(15);
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
            'category' => ['nullable', 'string', 'max:100'],
            'packaging' => ['nullable', 'string', 'max:100'],
            'initial_packs' => ['nullable', 'integer', 'min:0'],
            'price_per_pack' => ['required', 'numeric', 'min:0'],
            'cost_per_pack' => ['nullable', 'numeric', 'min:0'],
            'min_stock_packs' => ['nullable', 'integer', 'min:0'],
            'notes' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $initialPacks = (int) ($validated['initial_packs'] ?? 0);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        DB::transaction(function () use ($validated, $initialPacks, $imagePath, $request) {
            $product = FinishedProduct::create([
                'code' => $validated['code'],
                'name' => $validated['name'],
                'category' => $validated['category'] ?? 'Garam Konsumsi',
                'weight_per_pack_gram' => 300,
                'packaging' => $validated['packaging'] ?? null,
                'stock_packs' => $initialPacks,
                'price_per_pack' => $validated['price_per_pack'],
                'cost_per_pack' => $validated['cost_per_pack'] ?? 0,
                'min_stock_packs' => $validated['min_stock_packs'] ?? 0,
                'notes' => $validated['notes'] ?? null,
                'image' => $imagePath,
                'is_active' => $request->boolean('is_active', true),
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
            'category' => ['nullable', 'string', 'max:100'],
            'packaging' => ['nullable', 'string', 'max:100'],
            'price_per_pack' => ['required', 'numeric', 'min:0'],
            'cost_per_pack' => ['nullable', 'numeric', 'min:0'],
            'min_stock_packs' => ['nullable', 'integer', 'min:0'],
            'notes' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $updateData = [
            'code' => $validated['code'],
            'name' => $validated['name'],
            'category' => $validated['category'] ?? $finishedProduct->category ?? 'Garam Konsumsi',
            'packaging' => $validated['packaging'] ?? null,
            'price_per_pack' => $validated['price_per_pack'],
            'cost_per_pack' => $validated['cost_per_pack'] ?? 0,
            'min_stock_packs' => $validated['min_stock_packs'] ?? 0,
            'notes' => $validated['notes'] ?? null,
            'is_active' => $request->boolean('is_active', true),
        ];

        if ($request->hasFile('image')) {
            if ($finishedProduct->image && Storage::disk('public')->exists($finishedProduct->image)) {
                Storage::disk('public')->delete($finishedProduct->image);
            }
            $updateData['image'] = $request->file('image')->store('products', 'public');
        }

        $finishedProduct->update($updateData);

        return redirect()->route('finished-products.index')->with('success', 'Data barang jadi berhasil diperbarui.');
    }

    public function destroy(FinishedProduct $finishedProduct)
    {
        if ($finishedProduct->productions()->exists() || $finishedProduct->saleItems()->exists()) {
            return redirect()->route('finished-products.index')->withErrors([
                'error' => 'Produk tidak dapat dihapus karena sudah memiliki riwayat produksi atau penjualan. Anda dapat menonaktifkan status produk.'
            ]);
        }

        if ($finishedProduct->image && Storage::disk('public')->exists($finishedProduct->image)) {
            Storage::disk('public')->delete($finishedProduct->image);
        }

        $finishedProduct->delete();

        return redirect()->route('finished-products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
