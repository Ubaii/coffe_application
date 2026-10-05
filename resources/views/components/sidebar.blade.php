<div class="fixed inset-0 bg-black/30 z-20 hidden" data-sidebar-backdrop></div>
<aside class="fixed top-0 left-0 bottom-0 w-[248px] bg-[#2563eb] text-white flex flex-col z-30 overflow-y-auto p-[23px_16px_15px]" id="app-sidebar" aria-label="Navigasi utama">
    <a class="flex items-center mx-[6px] mb-[28px] text-white" href="{{ route(auth()->user()->isAdmin() ? 'dashboard' : 'cashier') }}">
        <span class="block text-[14px] font-bold text-white tracking-[.08em]">MIE AYAM WENGI'57</span>
    </a>

    <nav class="flex flex-col flex-1 gap-[4px]">
        <p class="text-[10px] font-bold text-white tracking-[.09em] mx-[10px] mb-[5px]">PLATFORM</p>
        @if(auth()->user()->isAdmin())
        <a href="{{ route('dashboard') }}" @class(['flex items-center gap-[11px] text-[13px] text-white py-0 px-[11px] rounded-lg min-h-[36px] hover:bg-white/15', 'bg-white/25 font-semibold' => request()->routeIs('dashboard')])>
            <x-icon name="dashboard" /> <span>Dashboard</span>
        </a>
        @endif
        <a href="{{ route('cashier') }}" @class(['flex items-center gap-[11px] text-[13px] text-white py-0 px-[11px] rounded-lg min-h-[36px] hover:bg-white/15', 'bg-white/25 font-semibold' => request()->routeIs('cashier')])>
            <x-icon name="cashier" /> <span>Kasir</span>
        </a>

        @if(auth()->user()->isAdmin())
        <p class="text-[10px] font-bold text-white tracking-[.09em] mx-[10px] mb-[5px] mt-[17px]">MANAJEMEN</p>
        <a href="{{ route('categories.index') }}" @class(['flex items-center gap-[11px] text-[13px] text-white py-0 px-[11px] rounded-lg min-h-[36px] hover:bg-white/15', 'bg-white/25 font-semibold' => request()->routeIs('categories.*')])>
            <x-icon name="category" /> <span>Kategori</span>
        </a>
        <a href="{{ route('menus.index') }}" @class(['flex items-center gap-[11px] text-[13px] text-white py-0 px-[11px] rounded-lg min-h-[36px] hover:bg-white/15', 'bg-white/25 font-semibold' => request()->routeIs('menus.*')])>
            <x-icon name="coffee" /> <span>Menu</span>
        </a>

        <p class="text-[10px] font-bold text-white tracking-[.09em] mx-[10px] mb-[5px] mt-[17px]">LAPORAN</p>
        <a href="{{ route('transactions.index') }}" @class(['flex items-center gap-[11px] text-[13px] text-white py-0 px-[11px] rounded-lg min-h-[36px] hover:bg-white/15', 'bg-white/25 font-semibold' => request()->routeIs('transactions.index')])>
            <x-icon name="receipt" /> <span>Transaksi</span>
        </a>
        <a href="{{ route('reports.index') }}" @class(['flex items-center gap-[11px] text-[13px] text-white py-0 px-[11px] rounded-lg min-h-[36px] hover:bg-white/15', 'bg-white/25 font-semibold' => request()->routeIs('reports.*')])>
            <x-icon name="chart" /> <span>Laporan Penjualan</span>
        </a>
        @endif
    </nav>

    <div class="border-t border-white/20 mt-[18px] pt-[15px]">
        <div class="flex items-center gap-[10px] py-[6px] px-[8px] pb-[12px]">
            <span class="inline-flex items-center justify-center w-[34px] h-[34px] bg-white text-[#2563eb] text-[12px] font-bold rounded-full">{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</span>
            <span class="flex flex-col gap-[3px] flex-1"><strong class="text-[12px] font-semibold text-white">{{ auth()->user()->name }}</strong><small class="text-[10px] text-white">{{ auth()->user()->isAdmin() ? 'Administrator' : 'Kasir' }}</small></span>
            <x-icon name="chevron" class="w-[15px] h-[15px] text-white" />
        </div>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="flex items-center gap-[11px] text-[13px] text-white py-0 px-[11px] rounded-lg min-h-[34px] hover:bg-white/15 w-full text-left bg-transparent border-0"><x-icon name="logout" /><span>Keluar</span></button>
        </form>
    </div>
</aside>