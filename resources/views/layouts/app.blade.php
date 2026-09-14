<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem') - POS Garam</title>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">
    @stack('styles')
</head>
<body>
    <div class="app-layout">
        <!-- Navigation Drawer (Zero Icons) -->
        <aside class="app-drawer">
            <div class="drawer-header">
                <a href="{{ url('/') }}" style="text-decoration: none;">
                    <div class="app-title">Garam.</div>
                    <div class="app-subtitle">Sistem POS &amp; Inventori</div>
                </a>
            </div>

            <div class="drawer-content">
                <div class="drawer-section-title">Menu Utama</div>

                <a href="{{ route('dashboard') }}" class="drawer-nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span>Dashboard</span>
                </a>

                <div class="drawer-section-title">Inventori</div>

                <a href="{{ route('raw-materials.index') }}" class="drawer-nav-item {{ request()->routeIs('raw-materials.*') ? 'active' : '' }}">
                    <span>Barang Mentah</span>
                </a>

                <a href="{{ route('finished-products.index') }}" class="drawer-nav-item {{ request()->routeIs('finished-products.*') ? 'active' : '' }}">
                    <span>Barang Jadi</span>
                </a>

                <a href="{{ route('stock-movements.index') }}" class="drawer-nav-item {{ request()->routeIs('stock-movements.*') ? 'active' : '' }}">
                    <span>Mutasi Stok</span>
                </a>

                <div class="drawer-section-title">Operasional</div>

                <a href="{{ route('suppliers.index') }}" class="drawer-nav-item {{ request()->routeIs('suppliers.*') ? 'active' : '' }}">
                    <span>Supplier</span>
                </a>

                <a href="{{ route('purchases.index') }}" class="drawer-nav-item {{ request()->routeIs('purchases.*') ? 'active' : '' }}">
                    <span>Pembelian</span>
                </a>

                <a href="{{ route('productions.index') }}" class="drawer-nav-item {{ request()->routeIs('productions.*') ? 'active' : '' }}">
                    <span>Produksi</span>
                </a>

                <a href="{{ route('sales.index') }}" class="drawer-nav-item {{ request()->routeIs('sales.*') ? 'active' : '' }}">
                    <span>Penjualan</span>
                </a>

                <div class="drawer-section-title">Analitik &amp; Laporan</div>

                <a href="{{ route('reports.index') }}" class="drawer-nav-item {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                    <span>Laporan</span>
                </a>

                @if(auth()->user()->isAdmin())
                <div class="drawer-section-title">Sistem</div>

                <a href="{{ route('settings.index') }}" class="drawer-nav-item {{ request()->routeIs('settings.*') ? 'active' : '' }}">
                    <span>Pengaturan</span>
                </a>
                @endif
            </div>

            <div class="drawer-footer">
                <div class="user-card">
                    <div class="user-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="user-info">
                        <div class="user-name">{{ auth()->user()->name }}</div>
                        <div class="user-role-badge {{ auth()->user()->isAdmin() ? 'role-admin' : 'role-owner' }}">
                            {{ auth()->user()->isAdmin() ? 'Admin' : 'Owner' }}
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn" title="Keluar">
                            <span>Keluar</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="app-main">
            <!-- App Bar -->
            <header class="app-topbar">
                <div class="topbar-left">
                    <button type="button" id="menu-toggle-btn" class="md-btn md-btn-text md-btn-sm" style="display: none;">
                        <span>Menu</span>
                    </button>
                    <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
                </div>
                <div class="topbar-right">
                    @yield('topbar-actions')
                </div>
            </header>

            <!-- Page Body -->
            <main class="page-content">
                @if(session('success'))
                    <div class="md-alert md-alert-success">
                        <div>{{ session('success') }}</div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="md-alert md-alert-error">
                        <div>
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('js/material.js') }}"></script>
    @stack('scripts')
</body>
</html>
