<div class="sidebar-backdrop" data-sidebar-backdrop></div>
<aside class="sidebar" id="app-sidebar" aria-label="Navigasi utama">
    <a class="brand-lockup" href="{{ route(auth()->user()->isAdmin() ? 'dashboard' : 'cashier') }}">
        <span class="brand-mark">K</span>
        <span>
            <span class="brand-name">KOPI SENJA</span>
            <span class="brand-subtitle">Coffee Shop Management System</span>
        </span>
    </a>

    <nav class="sidebar-nav">
        <p class="nav-label">PLATFORM</p>
        @if(auth()->user()->isAdmin())
            <a href="{{ route('dashboard') }}" @class(['nav-link', 'active' => request()->routeIs('dashboard')])>
                <x-icon name="dashboard" /> <span>Dashboard</span>
            </a>
        @endif
        <a href="{{ route('cashier') }}" @class(['nav-link', 'active' => request()->routeIs('cashier')])>
            <x-icon name="cashier" /> <span>Kasir</span>
        </a>

        @if(auth()->user()->isAdmin())
            <p class="nav-label nav-label-spaced">MANAJEMEN</p>
            <a href="{{ route('categories.index') }}" @class(['nav-link', 'active' => request()->routeIs('categories.*')])>
                <x-icon name="category" /> <span>Kategori</span>
            </a>
            <a href="{{ route('menus.index') }}" @class(['nav-link', 'active' => request()->routeIs('menus.*')])>
                <x-icon name="coffee" /> <span>Menu</span>
            </a>
            <!-- <a href="{{ route('tables.index') }}" @class(['nav-link', 'active' => request()->routeIs('tables.index')])>
                <x-icon name="table" /> <span>Meja</span>
            </a>
            <a href="{{ route('tables.status') }}" @class(['nav-link', 'active' => request()->routeIs('tables.status')])>
                <x-icon name="eye" /> <span>Status Meja</span>
            </a> -->
            <a href="{{ route('users.index') }}" @class(['nav-link', 'active' => request()->routeIs('users.*')])>
                <x-icon name="category" /> <span>Akun Pegawai</span>
            </a>

            <p class="nav-label nav-label-spaced">LAPORAN</p>
            <a href="{{ route('transactions.index') }}" @class(['nav-link', 'active' => request()->routeIs('transactions.index')])>
                <x-icon name="receipt" /> <span>Transaksi</span>
            </a>
            <a href="{{ route('reports.index') }}" @class(['nav-link', 'active' => request()->routeIs('reports.*')])>
                <x-icon name="chart" /> <span>Laporan Penjualan</span>
            </a>
        @endif
    </nav>

    <div class="sidebar-bottom">
        <div class="profile-row">
            <span class="avatar">{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</span>
            <span class="profile-copy"><strong>{{ auth()->user()->name }}</strong><small>{{ auth()->user()->isAdmin() ? 'Administrator' : 'Kasir' }}</small></span>
            <x-icon name="chevron" />
        </div>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="nav-link logout-link"><x-icon name="logout" /><span>Keluar</span></button>
        </form>
    </div>
</aside>
