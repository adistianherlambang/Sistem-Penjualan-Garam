<?php

namespace App\Http\Controllers;

use App\Helpers\WeightFormatter;
use App\Models\FinishedProduct;
use App\Models\Production;
use App\Models\Purchase;
use App\Models\RawMaterial;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function sales(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', now()->toDateString());

        $sales = Sale::with(['items.product', 'user'])
            ->whereBetween('sale_date', [$startDate, $endDate])
            ->latest('sale_date')
            ->get();

        $totalRevenue = $sales->sum('total_amount');
        $totalTransactions = $sales->count();
        $totalPacksSold = DB::table('sale_items')
            ->join('sales', 'sale_items.sale_id', '=', 'sales.id')
            ->whereBetween('sales.sale_date', [$startDate, $endDate])
            ->sum('sale_items.quantity_packs');

        return view('reports.sales', compact('sales', 'startDate', 'endDate', 'totalRevenue', 'totalTransactions', 'totalPacksSold'));
    }

    public function purchases(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', now()->toDateString());

        $purchases = Purchase::with(['supplier', 'rawMaterial', 'user'])
            ->whereBetween('purchase_date', [$startDate, $endDate])
            ->latest('purchase_date')
            ->get();

        $totalSpent = $purchases->sum('total_price');
        $totalWeightGram = $purchases->sum('weight_in_gram');
        $formattedTotalWeight = WeightFormatter::format($totalWeightGram);

        return view('reports.purchases', compact('purchases', 'startDate', 'endDate', 'totalSpent', 'totalWeightGram', 'formattedTotalWeight'));
    }

    public function productions(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', now()->toDateString());

        $productions = Production::with(['rawMaterial', 'finishedProduct', 'user'])
            ->whereBetween('production_date', [$startDate, $endDate])
            ->latest('production_date')
            ->get();

        $totalPacks = $productions->sum('pack_quantity');
        $totalRawGram = $productions->sum('total_raw_used_gram');
        $formattedRawUsed = WeightFormatter::format($totalRawGram);

        return view('reports.productions', compact('productions', 'startDate', 'endDate', 'totalPacks', 'totalRawGram', 'formattedRawUsed'));
    }

    public function stocks()
    {
        $rawMaterials = RawMaterial::orderBy('name')->get();
        $finishedProducts = FinishedProduct::orderBy('name')->get();

        $totalRawGram = $rawMaterials->sum('stock_gram');
        $formattedRawTotal = WeightFormatter::format($totalRawGram);
        $totalPacks = $finishedProducts->sum('stock_packs');

        return view('reports.stocks', compact('rawMaterials', 'finishedProducts', 'formattedRawTotal', 'totalPacks'));
    }

    public function profit(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', now()->toDateString());

        $totalSales = (float) Sale::whereBetween('sale_date', [$startDate, $endDate])->sum('total_amount');

        // Cost of goods sold based on finished product unit cost
        $totalCogs = (float) DB::table('sale_items')
            ->join('sales', 'sale_items.sale_id', '=', 'sales.id')
            ->join('finished_products', 'sale_items.finished_product_id', '=', 'finished_products.id')
            ->whereBetween('sales.sale_date', [$startDate, $endDate])
            ->sum(DB::raw('sale_items.quantity_packs * finished_products.cost_per_pack'));

        $totalPurchases = (float) Purchase::whereBetween('purchase_date', [$startDate, $endDate])->sum('total_price');

        $grossProfit = $totalSales - $totalCogs;
        $profitMargin = $totalSales > 0 ? ($grossProfit / $totalSales) * 100 : 0;

        return view('reports.profit', compact(
            'startDate',
            'endDate',
            'totalSales',
            'totalCogs',
            'totalPurchases',
            'grossProfit',
            'profitMargin'
        ));
    }
}
