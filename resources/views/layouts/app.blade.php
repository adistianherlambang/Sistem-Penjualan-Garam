<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - POS Garam</title>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">
    @stack('styles')
</head>
<body>
    <div class="app-layout">
        <!-- Sidebar Navigation (Uxerflow / Orbit Style) -->
        <aside class="app-drawer" id="app-drawer">
            <!-- Company / Plan Header -->
            <div class="drawer-header">
                <a href="{{ url('/') }}" class="drawer-company-wrap">
                    <div class="drawer-logo-badge">G.</div>
                    <div>
                        <div class="drawer-company-name">Garam Inc.</div>
                        <div class="drawer-company-sub">{{ auth()->user()->isAdmin() ? 'Admin Operasional' : 'Owner Bisnis' }}</div>
                    </div>
                </a>
                <button type="button" class="drawer-collapse-btn" title="Ciutkan" onclick="toggleSidebar()">«</button>
            </div>

            <!-- Search Bar with Shortcut -->
            <div class="drawer-search-wrap">
                <div class="drawer-search-box">
                    <input type="text" placeholder="Search" id="global-search-input">
                    <span class="drawer-search-kbd">⌘ K</span>
                </div>
            </div>

            <!-- Navigation Sections -->
            <div class="drawer-content">
                <div class="drawer-section-title">MAIN MENU</div>

                <a href="{{ route('dashboard') }}" class="drawer-nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Dashboard</span>
                    </div>
                </a>

                <a href="{{ route('finished-products.index') }}" class="drawer-nav-item {{ request()->routeIs('finished-products.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Product</span>
                    </div>
                    <span class="drawer-pill-counter">{{ \App\Models\FinishedProduct::count() }}</span>
                </a>

                <a href="{{ route('sales.index') }}" class="drawer-nav-item {{ request()->routeIs('sales.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Order</span>
                    </div>
                    <span class="drawer-pill-counter">{{ \App\Models\Sale::count() }}</span>
                </a>

                <a href="{{ route('suppliers.index') }}" class="drawer-nav-item {{ request()->routeIs('suppliers.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Customer &amp; Supplier</span>
                    </div>
                </a>

                <div class="drawer-section-title">OPERATIONAL</div>

                <a href="{{ route('raw-materials.index') }}" class="drawer-nav-item {{ request()->routeIs('raw-materials.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Bahan Mentah</span>
                    </div>
                </a>

                <a href="{{ route('productions.index') }}" class="drawer-nav-item {{ request()->routeIs('productions.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Produksi 300g</span>
                    </div>
                </a>

                <a href="{{ route('purchases.index') }}" class="drawer-nav-item {{ request()->routeIs('purchases.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Pembelian</span>
                    </div>
                </a>

                <a href="{{ route('stock-movements.index') }}" class="drawer-nav-item {{ request()->routeIs('stock-movements.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Mutasi Stok</span>
                    </div>
                </a>

                <div class="drawer-section-title">WORKSPACE</div>

                <a href="{{ route('reports.index') }}" class="drawer-nav-item {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Laporan Analitik</span>
                    </div>
                    <span class="drawer-pill-counter">5</span>
                </a>

                @if(auth()->user()->isAdmin())
                <a href="{{ route('settings.index') }}" class="drawer-nav-item {{ request()->routeIs('settings.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Settings</span>
                    </div>
                </a>
                @endif
            </div>

            <!-- Bottom Upgrade & User Footer -->
            <div class="drawer-footer">
                <a href="{{ route('sales.create') }}" class="drawer-upgrade-card">
                    <div class="drawer-upgrade-icon">⚡</div>
                    <div class="drawer-upgrade-text">
                        <div class="drawer-upgrade-title">Kasir POS Siap</div>
                        <div class="drawer-upgrade-sub">Buka Layanan Kasir</div>
                    </div>
                    <span style="color: var(--ux-orange); font-size: 13px; font-weight: 700;">›</span>
                </a>

                <div class="drawer-user-row">
                    <div class="drawer-user-info">
                        <div class="drawer-user-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="drawer-user-name">{{ auth()->user()->name }}</div>
                            <div class="drawer-user-role">{{ auth()->user()->isAdmin() ? 'Administrator' : 'Owner' }}</div>
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="drawer-logout-btn" title="Keluar">Keluar</button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Layout -->
        <div class="app-main">
            <!-- Top App Bar -->
            <header class="app-topbar">
                <div class="topbar-title">@yield('page-title', 'Product')</div>
                <div class="topbar-right">
                    <button type="button" class="topbar-icon-btn" title="Bagikan">↗</button>
                    <button type="button" class="topbar-icon-btn" title="Notifikasi">⚲</button>
                    
                    <!-- Team Avatars Group -->
                    <div class="topbar-avatars-group">
                        <div class="topbar-avatar-bubble" style="background-color: #fef08a;">AD</div>
                        <div class="topbar-avatar-bubble" style="background-color: #fed7aa;">OW</div>
                        <div class="topbar-avatar-bubble topbar-avatar-count">+3</div>
                    </div>

                    <button type="button" class="topbar-icon-btn" title="Tambah Pengguna">+</button>

                    <button type="button" class="ux-btn-outline" style="font-size: 12.5px;">
                        <span>Customize Widget</span>
                    </button>
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
    <script>
        function toggleSidebar() {
            const drawer = document.getElementById('app-drawer');
            if (drawer) {
                drawer.classList.toggle('collapsed');
            }
        }
    </script>
    @stack('scripts')
</body>
</html>
