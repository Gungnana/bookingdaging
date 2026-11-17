<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Penggilingan Daging Bu Heni'))</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
    <header class="navbar">
        <div class="container navbar-inner">
            <a href="{{ url('/') }}" class="brand">
                <span>Penggilingan Daging Bu Heni</span>
                <span class="brand-sub">Jl. Pulau Bangka No. 44, Pedungan, Denpasar</span>
            </a>

            <button type="button" class="nav-toggle" data-nav-toggle aria-expanded="false" aria-label="Menu navigasi">
                Menu
            </button>

            <nav class="nav-links" data-nav-links>
                <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                @if (Route::has('layanan.publik'))
                    <a href="{{ route('layanan.publik') }}" class="nav-link {{ request()->routeIs('layanan.publik') ? 'active' : '' }}">Layanan &amp; Tarif</a>
                @endif

                @auth
                    @if (auth()->user()->role === 'admin' && Route::has('admin.dashboard'))
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">Panel Admin</a>
                    @elseif (auth()->user()->role === 'pelanggan')
                        @if (Route::has('pelanggan.reservasi.create'))
                            <a href="{{ route('pelanggan.reservasi.create') }}" class="nav-link {{ request()->routeIs('pelanggan.reservasi.create') ? 'active' : '' }}">Buat Reservasi</a>
                        @endif
                        @if (Route::has('pelanggan.antrean.index'))
                            <a href="{{ route('pelanggan.antrean.index') }}" class="nav-link {{ request()->routeIs('pelanggan.antrean.*') ? 'active' : '' }}">Status Antrean</a>
                        @endif
                        @if (Route::has('pelanggan.reservasi.index'))
                            <a href="{{ route('pelanggan.reservasi.index') }}" class="nav-link {{ request()->routeIs('pelanggan.reservasi.index') ? 'active' : '' }}">Riwayat</a>
                        @endif
                    @endif

                    @if (Route::has('logout'))
                        <form action="{{ route('logout') }}" method="POST" class="nav-actions">
                            @csrf
                            <button type="submit" class="btn btn-outline btn-sm">Keluar ({{ auth()->user()->name }})</button>
                        </form>
                    @endif
                @else
                    <div class="nav-actions">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="btn btn-outline btn-sm">Masuk</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Daftar</a>
                        @endif
                    </div>
                @endauth
            </nav>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <x-alert />
            @yield('content')
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div><strong>Penggilingan Daging Bu Heni</strong> &mdash; Jl. Pulau Bangka No. 44, Pedungan, Denpasar</div>
            <div>Jam Operasional: Setiap hari, 04.00&ndash;11.00 WITA</div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
