@extends('layouts.app')

@section('title', 'Penggilingan Daging Bu Heni - Reservasi Antrean')

@section('content')
    <section class="hero">
        <h1>Sistem Reservasi Antrean Penggilingan Daging Bu Heni</h1>
        <p style="margin: 0 0 1.25rem; opacity: 0.95; max-width: 65ch;">
            Pesan antrean penggilingan daging lebih mudah dan teratur tanpa menunggu lama di lokasi.
            Buka setiap hari pukul <strong>04.00&ndash;11.00 WITA</strong> di Jl. Pulau Bangka No. 44, Pedungan, Denpasar.
        </p>
        <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
            @auth
                @if (auth()->user()->role === 'pelanggan' && Route::has('pelanggan.reservasi.create'))
                    <a href="{{ route('pelanggan.reservasi.create') }}" class="btn btn-outline" style="background: #fff; color: var(--primary); border-color: #fff;">
                        Buat Reservasi Sekarang
                    </a>
                @elseif (auth()->user()->role === 'admin' && Route::has('admin.dashboard'))
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline" style="background: #fff; color: var(--primary); border-color: #fff;">
                        Buka Dashboard Admin
                    </a>
                @endif
            @else
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline" style="background: #fff; color: var(--primary); border-color: #fff;">
                        Daftar Pelanggan
                    </a>
                @endif
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn btn-outline" style="color: #fff; border-color: rgba(255,255,255,0.6); background: transparent;">
                        Masuk Akun
                    </a>
                @endif
            @endauth
        </div>
    </section>

    <div class="grid grid-3">
        <div class="card">
            <h2 class="card-title">1. Pilih Layanan &amp; Berat</h2>
            <p class="text-muted" style="margin: 0;">
                Pilih penggilingan saja atau paket lengkap (giling + bumbu + tepung) dan masukkan berat daging dalam kg.
            </p>
        </div>
        <div class="card">
            <h2 class="card-title">2. Tentukan Jam Kedatangan</h2>
            <p class="text-muted" style="margin: 0;">
                Tersedia setiap hari pukul 04.00&ndash;11.00 WITA dengan sistem antrean berurutan (FCFS).
            </p>
        </div>
        <div class="card">
            <h2 class="card-title">3. Pantau Status &amp; Bayar di Lokasi</h2>
            <p class="text-muted" style="margin: 0;">
                Pantau nomor antrean Anda secara langsung dan lakukan pembayaran langsung di tempat setelah penimbangan.
            </p>
        </div>
    </div>
@endsection
