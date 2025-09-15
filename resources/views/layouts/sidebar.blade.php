<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3 mt-2">
            <h4><b>SICLEAN</b></h4>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Master Data</div>

    <!-- Pelanggan -->
    <li class="nav-item {{ request()->is('admin/pelanggan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.pelanggan.index') }}">
            <i class="fas fa-users"></i>
            <span>Pelanggan</span>
        </a>
    </li>

    <!-- Layanan -->
    <li class="nav-item {{ request()->is('admin/layanan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.layanan.index') }}">
            <i class="fas fa-concierge-bell"></i>
            <span>Layanan</span>
        </a>
    </li>

    <!-- Transaksi -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.transaksi.index') }}">
        <i class="fas fa-fw fa-money-bill-wave"></i>
        <span>Kelola Transaksi</span>
    </a>
</li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Laporan</div>

    <!-- Laporan -->
    <li class="nav-item {{ request()->is('admin/laporan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.laporan.index') }}">
            <i class="fas fa-file-alt"></i>
            <span>Laporan</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
