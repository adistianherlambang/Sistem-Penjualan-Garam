<?php

namespace App\Http\Controllers;

use App\Helpers\WeightFormatter;
use App\Models\RawMaterial;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RawMaterialController extends Controller
{
    public function index()
    {
        $rawMaterials = RawMaterial::latest()->paginate(10);
        $totalStockGram = (int) RawMaterial::sum('stock_gram');
        $formattedTotalStock = WeightFormatter::format($totalStockGram);

        return view('raw_materials.index', compact('rawMaterials', 'totalStockGram', 'formattedTotalStock'));
    }

    public function show(RawMaterial $rawMaterial)
    {
        $purchases = $rawMaterial->purchases()->with('supplier')->latest()->take(10)->get();
        $productions = $rawMaterial->productions()->with('finishedProduct')->latest()->take(10)->get();
        $movements = StockMovement::where('item_type', 'raw_material')
            ->where('item_id', $rawMaterial->id)
            ->latest('movement_date')
            ->paginate(15);

        return view('raw_materials.show', compact('rawMaterial', 'purchases', 'productions', 'movements'));
    }

    public function create()
    {
        return view('raw_materials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:50', 'unique:raw_materials,code'],
            'name' => ['required', 'string', 'max:255'],
            'initial_weight' => ['nullable', 'numeric', 'min:0'],
            'initial_unit' => ['nullable', 'in:gram,kg,ton'],
            'min_stock_weight' => ['nullable', 'numeric', 'min:0'],
            'min_stock_unit' => ['nullable', 'in:gram,kg,ton'],
            'notes' => ['nullable', 'string'],
        ]);

        $initialGram = 0;
        if (!empty($validated['initial_weight']) && (float)$validated['initial_weight'] > 0) {
            $unit = $validated['initial_unit'] ?? 'kg';
            $initialGram = (int) round(WeightFormatter::toGrams((float)$validated['initial_weight'], $unit));
        }

        $minStockGram = 0;
        if (!empty($validated['min_stock_weight']) && (float)$validated['min_stock_weight'] > 0) {
            $minUnit = $validated['min_stock_unit'] ?? 'kg';
            $minStockGram = (int) round(WeightFormatter::toGrams((float)$validated['min_stock_weight'], $minUnit));
        }

        DB::transaction(function () use ($validated, $initialGram, $minStockGram) {
            $rawMaterial = RawMaterial::create([
                'code' => $validated['code'],
                'name' => $validated['name'],
                'stock_gram' => $initialGram,
                'min_stock_gram' => $minStockGram,
                'notes' => $validated['notes'] ?? null,
            ]);

            if ($initialGram > 0) {
                StockMovement::create([
                    'movement_date' => now(),
                    'item_type' => 'raw_material',
                    'item_id' => $rawMaterial->id,
                    'transaction_type' => 'Penyesuaian',
                    'reference_number' => 'STOK-AWAL',
                    'quantity_delta' => $initialGram,
                    'unit' => 'gram',
                    'stock_before' => 0,
                    'stock_after' => $initialGram,
                    'notes' => 'Saldo awal stok barang mentah',
                    'created_by' => Auth::id(),
                ]);
            }
        });

        return redirect()->route('raw-materials.index')->with('success', 'Data barang mentah berhasil disimpan.');
    }

    public function edit(RawMaterial $rawMaterial)
    {
        return view('raw_materials.edit', compact('rawMaterial'));
    }

    public function update(Request $request, RawMaterial $rawMaterial)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:50', 'unique:raw_materials,code,' . $rawMaterial->id],
            'name' => ['required', 'string', 'max:255'],
            'min_stock_weight' => ['nullable', 'numeric', 'min:0'],
            'min_stock_unit' => ['nullable', 'in:gram,kg,ton'],
            'notes' => ['nullable', 'string'],
        ]);

        $minStockGram = 0;
        if (!empty($validated['min_stock_weight']) && (float)$validated['min_stock_weight'] > 0) {
            $minUnit = $validated['min_stock_unit'] ?? 'kg';
            $minStockGram = (int) round(WeightFormatter::toGrams((float)$validated['min_stock_weight'], $minUnit));
        }

        $rawMaterial->update([
            'code' => $validated['code'],
            'name' => $validated['name'],
            'min_stock_gram' => $minStockGram,
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->route('raw-materials.index')->with('success', 'Data barang mentah berhasil diperbarui.');
    }
}
