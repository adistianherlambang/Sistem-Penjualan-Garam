<?php

namespace App\Http\Controllers;

use App\Helpers\WeightFormatter;
use App\Models\FinishedProduct;
use App\Models\Production;
use App\Models\RawMaterial;
use App\Services\InventoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductionController extends Controller
{
    protected InventoryService $inventoryService;

    public function __construct(InventoryService $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }

    public function index(Request $request)
    {
        $query = Production::with(['rawMaterial', 'finishedProduct', 'user'])->latest('production_date');

        if ($request->filled('start_date')) {
            $query->whereDate('production_date', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('production_date', '<=', $request->end_date);
        }

        $productions = $query->paginate(15)->withQueryString();
        $totalPacksProduced = $query->sum('pack_quantity');
        $totalRawUsedGram = $query->sum('total_raw_used_gram');
        $formattedRawUsed = WeightFormatter::format($totalRawUsedGram);

        return view('productions.index', compact('productions', 'totalPacksProduced', 'totalRawUsedGram', 'formattedRawUsed'));
    }

    public function create()
    {
        $rawMaterials = RawMaterial::where('stock_gram', '>', 0)->orderBy('name')->get();
        $finishedProducts = FinishedProduct::orderBy('name')->get();

        return view('productions.create', compact('rawMaterials', 'finishedProducts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'production_date' => ['required', 'date'],
            'raw_material_id' => ['required', 'exists:raw_materials,id'],
            'finished_product_id' => ['required', 'exists:finished_products,id'],
            'pack_quantity' => ['required', 'integer', 'gt:0'],
            'notes' => ['nullable', 'string'],
        ]);

        $production = $this->inventoryService->recordProduction($validated, (int) Auth::id());

        return redirect()->route('productions.show', $production)->with('success', 'Produksi berhasil dicatat. Stok otomatis diperbarui.');
    }

    public function show(Production $production)
    {
        $production->load(['rawMaterial', 'finishedProduct', 'user']);
        return view('productions.show', compact('production'));
    }
}
