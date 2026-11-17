@if (session('success'))
    <div class="alert alert-success" role="alert">
        <span>{{ session('success') }}</span>
        <button type="button" class="alert-close" data-alert-close aria-label="Tutup">&times;</button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-error" role="alert">
        <span>{{ session('error') }}</span>
        <button type="button" class="alert-close" data-alert-close aria-label="Tutup">&times;</button>
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning" role="alert">
        <span>{{ session('warning') }}</span>
        <button type="button" class="alert-close" data-alert-close aria-label="Tutup">&times;</button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-error" role="alert">
        <div>
            <strong>Terjadi kesalahan validasi:</strong>
            <ul style="margin: 0.35rem 0 0; padding-left: 1.25rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="alert-close" data-alert-close aria-label="Tutup">&times;</button>
    </div>
@endif
