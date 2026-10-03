<header class="topbar">
    <div class="topbar-left">
        <x-back-button class="topbar-back" :fallback="route(auth()->user()->isAdmin() ? 'dashboard' : 'cashier')" />
        <button type="button" class="icon-button mobile-menu-button" aria-label="Buka navigasi" data-sidebar-open>
            <x-icon name="menu" />
        </button>
        <div>
            <p class="topbar-kicker">KOPI SENJA · {{ auth()->user()->isAdmin() ? 'Administrator' : 'Kasir' }}</p>
            <p class="topbar-date">{{ now()->translatedFormat('l, d F Y') }}</p>
        </div>
    </div>
    <div class="topbar-actions">
        <span class="store-status"><span></span> Toko buka</span>
        <button type="button" class="icon-button notification-button" aria-label="Notifikasi" data-notifications>
            <x-icon name="bell" />
            <span class="notification-dot"></span>
        </button>
        <span class="topbar-user"><span class="topbar-user-name">{{ auth()->user()->name }}</span> <span class="avatar avatar-small">{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</span></span>
    </div>
</header>
