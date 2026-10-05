<header class="topbar bg-[#2563eb]">
    <div class="topbar-left">
        <x-back-button class="topbar-back text-white" :fallback="route(auth()->user()->isAdmin() ? 'dashboard' : 'cashier')" />
        <button type="button" class="icon-button mobile-menu-button text-white" aria-label="Buka navigasi" data-sidebar-open>
            <x-icon name="menu" />
        </button>
        <div>
            <p class="topbar-kicker text-white">MIE AYAM WENGI'57 · {{ auth()->user()->isAdmin() ? 'Administrator' : 'Kasir' }}</p>
            <p class="topbar-date text-white/70">{{ now()->translatedFormat('l, d F Y') }}</p>
        </div>
    </div>
    <div class="topbar-actions">
        <span class="store-status text-white"><span class="bg-green-400"></span> Toko buka</span>
    </div>
</header>
