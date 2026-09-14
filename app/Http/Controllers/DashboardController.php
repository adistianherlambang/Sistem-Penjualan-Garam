<?php

namespace App\Http\Controllers;

use App\Helpers\WeightFormatter;
use App\Models\FinishedProduct;
use App\Models\Production;
use App\Models\Purchase;
use App\Models\RawMaterial;
use App\Models\Sale;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Raw material stock summary (in base grams)
        $totalRawStockGram = (int) RawMaterial::sum('stock_gram');
        $formattedRawStock = WeightFormatter::format($totalRawStockGram);

        // 2. Finished goods stock summary (in packs)
        $totalFinishedPacks = (int) FinishedProduct::sum('stock_packs');

        // 3. Today's sales
        $today = now()->toDateString();
        $todaySalesCount = Sale::whereDate('sale_date', $today)->count();
        $todayRevenue = (float) Sale::whereDate('sale_date', $today)->sum('total_amount');

        // 4. This month's metrics
        $startOfMonth = now()->startOfMonth()->toDateString();
        $monthSalesRevenue = (float) Sale::whereDate('sale_date', '>=', $startOfMonth)->sum('total_amount');
        $monthPurchasesTotal = (float) Purchase::whereDate('purchase_date', '>=', $startOfMonth)->sum('total_price');
        $monthProductionPacks = (int) Production::whereDate('production_date', '>=', $startOfMonth)->sum('pack_quantity');

        // 5. Estimated gross profit this month (Revenue - COGS)
        $monthCostOfGoods = (float) DB::table('sale_items')
            ->join('sales', 'sale_items.sale_id', '=', 'sales.id')
            ->join('finished_products', 'sale_items.finished_product_id', '=', 'finished_products.id')
            ->whereDate('sales.sale_date', '>=', $startOfMonth)
            ->sum(DB::raw('sale_items.quantity_packs * finished_products.cost_per_pack'));

        $estimatedGrossProfit = $monthSalesRevenue - $monthCostOfGoods;

        // 6. Recent activities
        $recentSales = Sale::latest()->take(5)->get();
        $recentProductions = Production::with(['rawMaterial', 'finishedProduct'])->latest()->take(5)->get();
        $recentPurchases = Purchase::with(['supplier', 'rawMaterial'])->latest()->take(5)->get();
        $recentMovements = StockMovement::latest()->take(6)->get();

        // 7. Last 7 days sales trend for lightweight chart
        $dailySales = Sale::selectRaw('sale_date, SUM(total_amount) as total, COUNT(*) as count')
            ->whereDate('sale_date', '>=', now()->subDays(6)->toDateString())
            ->groupBy('sale_date')
            ->orderBy('sale_date')
            ->get();

        return view('dashboard.index', compact(
            'totalRawStockGram',
            'formattedRawStock',
            'totalFinishedPacks',
            'todaySalesCount',
            'todayRevenue',
            'monthSalesRevenue',
            'monthPurchasesTotal',
            'monthProductionPacks',
            'estimatedGrossProfit',
            'recentSales',
            'recentProductions',
            'recentPurchases',
            'recentMovements',
            'dailySales'
        ));
    }
}
