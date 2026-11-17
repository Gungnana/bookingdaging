<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - Penggilingan Daging Bu Heni')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body class="admin-shell">
    <header class="admin-topbar">
        <div style="display: flex; align-items: center; gap: 0.75rem;">
            <button type="button" class="nav-toggle admin-menu-btn" data-sidebar-toggle aria-label="Menu admin">
                Menu
            </button>
            <a href="{{ Route::has('admin.dashboard') ? route('admin.dashboard') : url('/') }}" class="brand">
                <span>Admin Bu Heni</span>
            </a>
        </div>

        <div style="display: flex; align-items: center; gap: 0.5rem;">
            @auth
                <span class="text-muted" style="font-size: 0.85rem;">{{ auth()->user()->name }}</span>
                @if (Route::has('logout'))
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline btn-sm">Keluar</button>
                    </form>
                @endif
            @endauth
        </div>
    </header>

    <div class="admin-body">
        <aside class="admin-sidebar" data-admin-sidebar>
            <nav class="admin-sidebar-nav">
                @if (Route::has('admin.dashboard'))
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                @endif

                <div class="sidebar-section">Antrean &amp; Master</div>
                @if (Route::has('admin.reservasi.index'))
                    <a href="{{ route('admin.reservasi.index') }}" class="nav-link {{ request()->routeIs('admin.reservasi.*') ? 'active' : '' }}">Reservasi &amp; Antrean</a>
                @endif
                @if (Route::has('admin.pelanggan.index'))
                    <a href="{{ route('admin.pelanggan.index') }}" class="nav-link {{ request()->routeIs('admin.pelanggan.*') ? 'active' : '' }}">Data Pelanggan</a>
                @endif
                @if (Route::has('admin.layanan.index'))
                    <a href="{{ route('admin.layanan.index') }}" class="nav-link {{ request()->routeIs('admin.layanan.*') ? 'active' : '' }}">Layanan &amp; Tarif</a>
                @endif
                @if (Route::has('admin.barang.index'))
                    <a href="{{ route('admin.barang.index') }}" class="nav-link {{ request()->routeIs('admin.barang.*') ? 'active' : '' }}">Barang Dagangan</a>
                @endif
                @if (Route::has('admin.karyawan.index'))
                    <a href="{{ route('admin.karyawan.index') }}" class="nav-link {{ request()->routeIs('admin.karyawan.*') ? 'active' : '' }}">Data Karyawan</a>
                @endif

                <div class="sidebar-section">Keuangan &amp; Gaji</div>
                @if (Route::has('admin.transaksi.index'))
                    <a href="{{ route('admin.transaksi.index') }}" class="nav-link {{ request()->routeIs('admin.transaksi.*') ? 'active' : '' }}">Pemasukan</a>
                @endif
                @if (Route::has('admin.pengeluaran.index'))
                    <a href="{{ route('admin.pengeluaran.index') }}" class="nav-link {{ request()->routeIs('admin.pengeluaran.*') ? 'active' : '' }}">Pengeluaran</a>
                @endif
                @if (Route::has('admin.laporan.index'))
                    <a href="{{ route('admin.laporan.index') }}" class="nav-link {{ request()->routeIs('admin.laporan.*') ? 'active' : '' }}">Laporan Keuangan</a>
                @endif
                @if (Route::has('admin.penggajian.index'))
                    <a href="{{ route('admin.penggajian.index') }}" class="nav-link {{ request()->routeIs('admin.penggajian.*') ? 'active' : '' }}">Penggajian</a>
                @endif

                <div class="sidebar-section">Sistem</div>
                @if (Route::has('admin.pengaturan.edit'))
                    <a href="{{ route('admin.pengaturan.edit') }}" class="nav-link {{ request()->routeIs('admin.pengaturan.*') ? 'active' : '' }}">Pengaturan Slot</a>
                @endif
                <a href="{{ url('/') }}" class="nav-link">Halaman Publik</a>
            </nav>
        </aside>

        <main class="admin-main">
            <x-alert />
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
