<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\RawMaterial;
use App\Models\Setting;
use App\Models\Supplier;
use App\Services\InventoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    protected InventoryService $inventoryService;

    public function __construct(InventoryService $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }

    public function index(Request $request)
    {
        $query = Purchase::with(['supplier', 'rawMaterial', 'user'])->latest('purchase_date');

        if ($request->filled('supplier_id')) {
            $query->where('supplier_id', $request->supplier_id);
        }

        if ($request->filled('start_date')) {
            $query->whereDate('purchase_date', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('purchase_date', '<=', $request->end_date);
        }

        $purchases = $query->paginate(15)->withQueryString();
        $suppliers = Supplier::orderBy('name')->get();

        $totalSpent = $query->sum('total_price');

        return view('purchases.index', compact('purchases', 'suppliers', 'totalSpent'));
    }

    public function create()
    {
        $suppliers = Supplier::orderBy('name')->get();
        $rawMaterials = RawMaterial::orderBy('name')->get();
        $autoInvoiceNumber = 'PB-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));

        return view('purchases.create', compact('suppliers', 'rawMaterials', 'autoInvoiceNumber'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'invoice_number' => ['required', 'string', 'max:50', 'unique:purchases,invoice_number'],
            'purchase_date' => ['required', 'date'],
            'supplier_id' => ['required', 'exists:suppliers,id'],
            'raw_material_id' => ['required', 'exists:raw_materials,id'],
            'weight_value' => ['required', 'numeric', 'gt:0'],
            'weight_unit' => ['required', 'in:gram,kg,ton'],
            'price_per_unit' => ['required', 'numeric', 'min:0'],
            'total_price' => ['required', 'numeric', 'min:0'],
            'notes' => ['nullable', 'string'],
        ]);

        $purchase = $this->inventoryService->recordPurchase($validated, (int) Auth::id());

        return redirect()->route('purchases.show', $purchase)->with('success', 'Faktur pembelian berhasil dicatat.');
    }

    public function show(Purchase $purchase)
    {
        $purchase->load(['supplier', 'rawMaterial', 'user']);
        return view('purchases.show', compact('purchase'));
    }

    public function print(Purchase $purchase)
    {
        $purchase->load(['supplier', 'rawMaterial', 'user']);
        $storeName = Setting::get('store_name', 'Garam Berkah Mandiri');
        $storeAddress = Setting::get('store_address', 'Jl. Garam Samudera No. 45, Madura');
        $storePhone = Setting::get('store_phone', '0812-3456-7890');

        return view('purchases.print', compact('purchase', 'storeName', 'storeAddress', 'storePhone'));
    }
}
