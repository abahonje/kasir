<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading d-flex align-items-center">
                <img src="/img/admin.png" alt="" width="45" class="rounded-circle me-2">
                <div class="person">
                    <h6 class="m-0 text-light">{{ auth()->user()->nama_lengkap }}</h6>
                    <span>{{ auth()->user()->level }}</span>
                </div>
            </div>
            <div class="sb-sidenav-menu-heading">ADMINISTRATOR</div>
            <a class="nav-link {{ Str::startsWith(request()->path(), 'dashboard') ? 'active' : '' }}" href="/dashboard">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            @can('isAdmin')
            <a class="nav-link {{ Str::startsWith(request()->path(), 'user') ? 'active' : '' }}" href="/user">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                Data User
            </a>
            @endcan
            <div class="sb-sidenav-menu-heading">DATA MASTER</div>
            @can('isAdmin')
            <a class="nav-link {{ Str::startsWith(request()->path(), 'supplier') ? 'active' : '' }}" href="/supplier">
                <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                Supplier
            </a>
            <a class="nav-link {{ Str::startsWith(request()->path(), 'jenis') ? 'active' : '' }}" href="/jenis">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-layer-group"></i></div>
                Jenis Barang
            </a>
            @endcan
            <a class="nav-link {{ Str::startsWith(request()->path(), 'barang') ? 'active' : '' }}" href="/barang">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-database"></i></div>
                Barang
            </a>
            @can('isAdmin')
            <a class="nav-link {{ Str::startsWith(request()->path(), 'persediaan') ? 'active' : '' }}" href="/persediaan">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-warehouse"></i></div>
                Persediaan
            </a>
            @endcan
            <div class="sb-sidenav-menu-heading">KASIR</div>
            <a class="nav-link {{ Str::startsWith(request()->path(), 'penjualan') ? 'active' : '' }} mb-5" href="/penjualan">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Penjualan
            </a>
        </div>
    </div>
</nav>
