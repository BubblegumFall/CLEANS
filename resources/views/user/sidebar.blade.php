<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3 mt-2">
            <h4><b>SICLEAN</b></h4>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('user/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Utama
    </div>

    <!-- Nav Item - Pilih Layanan -->
    <li class="nav-item {{ request()->is('user/layanan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.layanan.index') }}">
            <i class="fas fa-concierge-bell"></i>
            <span>Pilih Layanan</span>
        </a>
    </li>

    <!-- Nav Item - Riwayat Transaksi -->
    <li class="nav-item {{ request()->is('user/transaksi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.transaksi.index') }}">
            <i class="fas fa-exchange-alt"></i>
            <span>Riwayat Transaksi</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
