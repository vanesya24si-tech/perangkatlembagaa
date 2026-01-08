@extends('layouts.guest.app')

@section('title', 'Informasi Umum')

@section('content')
<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">
            <i class="fa-solid fa-circle-info me-2 text-primary"></i>
            Informasi Umum
        </h3>

        {{-- Tombol tambah informasi (hanya login) --}}
        @auth
        <a href="{{ route('informasi_umum.create') }}" class="btn btn-primary rounded-pill">
            <i class="fa-solid fa-plus me-1"></i> Tambah Informasi
        </a>
        @endauth
    </div>

    {{-- Info kecil --}}
    <p class="text-muted mb-4 text-center">
        Halaman ini menampilkan informasi terbaru yang dapat dibaca oleh seluruh pengguna.
    </p>

    @forelse ($informasi as $item)
        <div class="card mb-4 shadow-sm border-0 rounded-4">
            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="fw-semibold mb-0">
                        {{ $item->judul }}
                    </h5>
                    <span class="badge bg-light text-dark">
                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                    </span>
                </div>

                <hr>

                <p class="mb-0 text-secondary">
                    {{ $item->isi }}
                </p>

            </div>
        </div>
    @empty
        <div class="alert alert-info text-center rounded-4 shadow-sm">
            <i class="fa-solid fa-circle-exclamation me-1"></i>
            Belum ada informasi yang tersedia.
        </div>
    @endforelse

</div>
@endsection
