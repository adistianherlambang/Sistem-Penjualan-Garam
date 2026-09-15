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
            <!-- Company Header -->
            <div class="drawer-header">
                <a href="{{ url('/') }}" class="drawer-company-wrap">
                    <div class="drawer-logo-badge">BM</div>
                    <div>
                        <div class="drawer-company-name">CV BANYU MILI</div>
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

            <!-- Navigation Sections (Short 1-2 Word Titles, Zero Subtitles) -->
            <div class="drawer-content">
                <div class="drawer-section-title">MENU</div>

                <a href="{{ route('dashboard') }}" class="drawer-nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Dashboard</span>
                    </div>
                </a>

                <a href="{{ route('finished-products.index') }}" class="drawer-nav-item {{ request()->routeIs('finished-products.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Produk Jadi</span>
                    </div>
                    <span class="drawer-pill-counter">{{ \App\Models\FinishedProduct::count() }}</span>
                </a>

                @if(auth()->user()->isAdmin())
                <a href="{{ route('articles.index') }}" class="drawer-nav-item {{ request()->routeIs('articles.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Berita & Artikel</span>
                    </div>
                    <span class="drawer-pill-counter">{{ \App\Models\Article::count() }}</span>
                </a>
                @endif

                <a href="{{ route('sales.index') }}" class="drawer-nav-item {{ request()->routeIs('sales.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Penjualan</span>
                    </div>
                    <span class="drawer-pill-counter">{{ \App\Models\Sale::count() }}</span>
                </a>

                <a href="{{ route('suppliers.index') }}" class="drawer-nav-item {{ request()->routeIs('suppliers.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Supplier</span>
                    </div>
                </a>

                <div class="drawer-section-title">OPERASIONAL</div>

                <a href="{{ route('raw-materials.index') }}" class="drawer-nav-item {{ request()->routeIs('raw-materials.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Stok Mentah</span>
                    </div>
                </a>

                <a href="{{ route('productions.index') }}" class="drawer-nav-item {{ request()->routeIs('productions.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Produksi</span>
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

                <div class="drawer-section-title">SISTEM</div>

                <a href="{{ route('reports.index') }}" class="drawer-nav-item {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Laporan</span>
                    </div>
                    <span class="drawer-pill-counter">5</span>
                </a>

                @if(auth()->user()->isAdmin())
                <a href="{{ route('settings.index') }}" class="drawer-nav-item {{ request()->routeIs('settings.*') ? 'active' : '' }}">
                    <div class="drawer-nav-left">
                        <span>Pengaturan</span>
                    </div>
                </a>
                @endif
            </div>

            <!-- Bottom User & POS Footer (Zero Subtitles, Zero Icons, Royal Blue Tone) -->
            <div class="drawer-footer">
                <a href="{{ route('sales.create') }}" class="drawer-upgrade-card">
                    <div class="drawer-upgrade-text">
                        <div class="drawer-upgrade-title">Kasir POS</div>
                    </div>
                    <span class="ux-btn-outline" style="font-size: 11px; padding: 2px 8px; border-color: var(--ux-primary); color: var(--ux-primary);">Buka</span>
                </a>

                <div class="drawer-user-row">
                    <div class="drawer-user-info">
                        <div class="drawer-user-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="drawer-user-name">{{ auth()->user()->name }}</div>
                            <div class="drawer-user-role">{{ auth()->user()->isAdmin() ? 'Admin' : 'Owner' }}</div>
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
            <!-- Top App Bar (Zero Icons, Royal Blue Tone) -->
            <header class="app-topbar">
                <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
                <div class="topbar-right">
                    @yield('topbar-actions')

                    <div class="topbar-avatars-group">
                        <div class="topbar-avatar-bubble" style="background-color: #dbeafe; color: #1e40af;">AD</div>
                        <div class="topbar-avatar-bubble" style="background-color: #e0e7ff; color: #3730a3;">OW</div>
                    </div>

                    <a href="{{ url('/') }}" class="ux-btn-outline" style="font-size: 12px; text-decoration: none;">
                        <span>Landing</span>
                    </a>
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
