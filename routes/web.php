<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinishedProductController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\SupplierController;
use App\Models\Article;
use App\Models\FinishedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public Routes - CV. Banyu Mili Website
Route::get('/', function () {
    $featuredProducts = FinishedProduct::where('is_active', true)->take(4)->get();
    $latestArticles = Article::where('is_published', true)->latest('published_at')->take(4)->get();
    return view('landing', compact('featuredProducts', 'latestArticles'));
})->name('landing');

Route::get('/home/index', function () {
    $featuredProducts = FinishedProduct::where('is_active', true)->take(4)->get();
    $latestArticles = Article::where('is_published', true)->latest('published_at')->take(4)->get();
    return view('landing', compact('featuredProducts', 'latestArticles'));
});

Route::get('/produk', function () {
    $products = FinishedProduct::where('is_active', true)->latest()->get();
    $productsGrouped = $products->groupBy('category');
    return view('product', compact('products', 'productsGrouped'));
})->name('public.products');

Route::get('/home/productlanding', function () {
    $products = FinishedProduct::where('is_active', true)->latest()->get();
    $productsGrouped = $products->groupBy('category');
    return view('product', compact('products', 'productsGrouped'));
});

Route::get('/tentang-kami', function () {
    return view('about');
})->name('public.about');
Route::get('/home/about', function () {
    return view('about');
});

Route::get('/industri', function () {
    return view('industry');
})->name('public.industry');
Route::get('/home/industry', function () {
    return view('industry');
});

Route::get('/berita', function (Request $request) {
    $query = Article::where('is_published', true);
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }
    $articles = $query->latest('published_at')->paginate(9)->withQueryString();
    return view('blog', compact('articles'));
})->name('public.blog');

Route::get('/blog/index', function (Request $request) {
    $query = Article::where('is_published', true);
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }
    $articles = $query->latest('published_at')->paginate(9)->withQueryString();
    return view('blog', compact('articles'));
});

Route::get('/home/blogs', function (Request $request) {
    $query = Article::where('is_published', true);
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }
    $articles = $query->latest('published_at')->paginate(9)->withQueryString();
    return view('blog', compact('articles'));
});

// Single Article Detail Route
Route::get('/berita/{slug}', function ($slug) {
    $article = Article::where('slug', $slug)->orWhere('id', $slug)->firstOrFail();
    $recentArticles = Article::where('is_published', true)
        ->where('id', '!=', $article->id)
        ->latest('published_at')
        ->take(5)
        ->get();
    return view('blog_detail', compact('article', 'recentArticles'));
})->name('public.blog.detail');

Route::get('/blog/detail/{id}', function ($id) {
    $article = Article::where('id', $id)->orWhere('slug', $id)->firstOrFail();
    $recentArticles = Article::where('is_published', true)
        ->where('id', '!=', $article->id)
        ->latest('published_at')
        ->take(5)
        ->get();
    return view('blog_detail', compact('article', 'recentArticles'));
});

Route::get('/kontak', function () {
    return view('contact');
})->name('public.contact');
Route::get('/home/contact', function () {
    return view('contact');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated Routes (Admin & Owner)
Route::middleware(['auth', 'role:admin,owner'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Monitoring: Raw Materials
    Route::get('/raw-materials', [RawMaterialController::class, 'index'])->name('raw-materials.index');
    Route::get('/raw-materials/{rawMaterial}', [RawMaterialController::class, 'show'])->name('raw-materials.show');

    // Monitoring: Finished Products
    Route::get('/finished-products', [FinishedProductController::class, 'index'])->name('finished-products.index');
    Route::get('/finished-products/{finishedProduct}', [FinishedProductController::class, 'show'])->name('finished-products.show');

    // Monitoring: Suppliers
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');

    // Monitoring & Invoices: Purchases
    Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases.index');
    Route::get('/purchases/{purchase}', [PurchaseController::class, 'show'])->name('purchases.show');
    Route::get('/purchases/{purchase}/print', [PurchaseController::class, 'print'])->name('purchases.print');

    // Monitoring: Productions
    Route::get('/productions', [ProductionController::class, 'index'])->name('productions.index');
    Route::get('/productions/{production}', [ProductionController::class, 'show'])->name('productions.show');

    // Monitoring & Receipts: Sales
    Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
    Route::get('/sales/{sale}', [SaleController::class, 'show'])->name('sales.show');
    Route::get('/sales/{sale}/receipt', [SaleController::class, 'printReceipt'])->name('sales.receipt');
    Route::get('/sales/{sale}/invoice', [SaleController::class, 'printInvoice'])->name('sales.invoice');

    // Monitoring: Stock Movements
    Route::get('/stock-movements', [StockMovementController::class, 'index'])->name('stock-movements.index');

    // Reports & Profit Analysis
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
        Route::get('/sales', [ReportController::class, 'sales'])->name('sales');
        Route::get('/purchases', [ReportController::class, 'purchases'])->name('purchases');
        Route::get('/productions', [ReportController::class, 'productions'])->name('productions');
        Route::get('/stocks', [ReportController::class, 'stocks'])->name('stocks');
        Route::get('/profit', [ReportController::class, 'profit'])->name('profit');
    });
});

// Admin-Only Operational Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Raw Material CRUD
    Route::get('/raw-materials-create', [RawMaterialController::class, 'create'])->name('raw-materials.create');
    Route::post('/raw-materials', [RawMaterialController::class, 'store'])->name('raw-materials.store');
    Route::get('/raw-materials/{rawMaterial}/edit', [RawMaterialController::class, 'edit'])->name('raw-materials.edit');
    Route::put('/raw-materials/{rawMaterial}', [RawMaterialController::class, 'update'])->name('raw-materials.update');

    // Finished Product CRUD
    Route::get('/finished-products-create', [FinishedProductController::class, 'create'])->name('finished-products.create');
    Route::post('/finished-products', [FinishedProductController::class, 'store'])->name('finished-products.store');
    Route::get('/finished-products/{finishedProduct}/edit', [FinishedProductController::class, 'edit'])->name('finished-products.edit');
    Route::put('/finished-products/{finishedProduct}', [FinishedProductController::class, 'update'])->name('finished-products.update');
    Route::delete('/finished-products/{finishedProduct}', [FinishedProductController::class, 'destroy'])->name('finished-products.destroy');

    // Articles / Berita & Konten CRUD
    Route::resource('articles', ArticleController::class)->except(['show']);

    // Supplier CRUD
    Route::get('/suppliers-create', [SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

    // Purchase Operations
    Route::get('/purchases-create', [PurchaseController::class, 'create'])->name('purchases.create');
    Route::post('/purchases', [PurchaseController::class, 'store'])->name('purchases.store');

    // Production Operations
    Route::get('/productions-create', [ProductionController::class, 'create'])->name('productions.create');
    Route::post('/productions', [ProductionController::class, 'store'])->name('productions.store');

    // Sales POS Operations
    Route::get('/sales-create', [SaleController::class, 'create'])->name('sales.create');
    Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');

    // Store Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});
