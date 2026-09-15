<?php

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
use Illuminate\Support\Facades\Route;

// Public Routes - PT Garam Website (All Pages)
Route::get('/', function () {
    return view('landing');
})->name('landing');
Route::get('/home/index', function () {
    return view('landing');
});

Route::get('/produk', function () {
    return view('product');
})->name('public.products');
Route::get('/home/productlanding', function () {
    return view('product');
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

Route::get('/berita', function () {
    return view('blog');
})->name('public.blog');
Route::get('/blog/index', function () {
    return view('blog');
});
Route::get('/home/blogs', function () {
    return view('blog');
});

Route::get('/kontak', function () {
    return view('contact');
})->name('public.contact');
Route::get('/home/contact', function () {
    return view('contact');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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
