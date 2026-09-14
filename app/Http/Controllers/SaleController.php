<?php

namespace App\Http\Controllers;

use App\Models\FinishedProduct;
use App\Models\Sale;
use App\Models\Setting;
use App\Services\InventoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    protected InventoryService $inventoryService;

    public function __construct(InventoryService $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }

    public function index(Request $request)
    {
        $query = Sale::with(['items.product', 'user'])->latest('sale_date');

        if ($request->filled('start_date')) {
            $query->whereDate('sale_date', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('sale_date', '<=', $request->end_date);
        }

        $sales = $query->paginate(15)->withQueryString();
        $totalRevenue = $query->sum('total_amount');

        return view('sales.index', compact('sales', 'totalRevenue'));
    }

    public function create()
    {
        $products = FinishedProduct::where('stock_packs', '>', 0)->orderBy('name')->get();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sale_date' => ['required', 'date'],
            'customer_name' => ['nullable', 'string', 'max:255'],
            'finished_product_id' => ['required', 'exists:finished_products,id'],
            'pack_quantity' => ['required', 'integer', 'gt:0'],
            'price_per_pack' => ['required', 'numeric', 'min:0'],
            'paid_amount' => ['required', 'numeric', 'min:0'],
            'payment_method' => ['required', 'string', 'in:cash,transfer,qris'],
            'notes' => ['nullable', 'string'],
        ]);

        $sale = $this->inventoryService->recordSale($validated, (int) Auth::id());

        return redirect()->route('sales.show', $sale)->with('success', 'Transaksi penjualan berhasil disimpan.');
    }

    public function show(Sale $sale)
    {
        $sale->load(['items.product', 'user']);
        return view('sales.show', compact('sale'));
    }

    public function printReceipt(Sale $sale)
    {
        $sale->load(['items.product', 'user']);
        $storeName = Setting::get('store_name', 'Garam Berkah Mandiri');
        $storeAddress = Setting::get('store_address', 'Jl. Garam Samudera No. 45, Madura');
        $storePhone = Setting::get('store_phone', '0812-3456-7890');
        $receiptFooter = Setting::get('receipt_footer', 'Terima kasih atas kunjungan Anda.');

        return view('sales.print_receipt', compact('sale', 'storeName', 'storeAddress', 'storePhone', 'receiptFooter'));
    }

    public function printInvoice(Sale $sale)
    {
        $sale->load(['items.product', 'user']);
        $storeName = Setting::get('store_name', 'Garam Berkah Mandiri');
        $storeAddress = Setting::get('store_address', 'Jl. Garam Samudera No. 45, Madura');
        $storePhone = Setting::get('store_phone', '0812-3456-7890');

        return view('sales.print_invoice', compact('sale', 'storeName', 'storeAddress', 'storePhone'));
    }
}
