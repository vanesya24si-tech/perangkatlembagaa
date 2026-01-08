@extends('layouts.guest.app')

@section('title', 'Data Perangkat Desa')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
/* CARD */
.card-perangkat{
    position:relative;
    border-radius:16px;
    border:1px solid #e5e7eb;
    background:#fff;
    box-shadow:0 8px 24px rgba(0,0,0,.08);
    transition:.25s ease;
    padding-top:70px; /* ruang foto */
}
.card-perangkat:hover{
    transform:translateY(-4px);
    box-shadow:0 14px 32px rgba(0,0,0,.14);
}

/* AVATAR BULAT TENGAH */
.perangkat-avatar{
    position:absolute;
    top:-55px;
    left:50%;
    transform:translateX(-50%);
    width:110px;
    height:110px;
    border-radius:50%;
    background:#f3f4f6;
    border:5px solid #fff;
    box-shadow:0 6px 18px rgba(0,0,0,.15);
    display:flex;
    align-items:center;
    justify-content:center;
    overflow:hidden;
    z-index:10;
}
.perangkat-avatar img{
    width:100%;
    height:100%;
    object-fit:cover;
    border-radius:50%;
}

/* ICON WARNA */
.icon-name{color:#2563eb}
.icon-job{color:#16a34a}
.icon-nip{color:#6366f1}
.icon-phone{color:#f59e0b}
.icon-map{color:#dc2626}
</style>
@endpush

@section('content')
<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">
            <i class="bi bi-people-fill text-primary me-2"></i>
            Data Perangkat Desa
        </h4>

        <a href="{{ route('perangkat.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Perangkat
        </a>
    </div>

    {{-- GRID CARD --}}
    <div class="row g-4">
        @forelse($perangkats as $p)
        <div class="col-md-4 col-sm-6">

            {{-- FORM PER DATA --}}
            <form action="{{ route('perangkat.destroy', $p->perangkat_id) }}"
                  method="POST"
                  onsubmit="return confirm('Yakin hapus perangkat ini?')">
                @csrf
                @method('DELETE')

                <div class="card card-perangkat h-100 text-center">

                    {{-- FOTO BULAT --}}
                    <div class="perangkat-avatar">
                        @if($p->media)
                            <img src="{{ asset($p->media->file_url) }}">
                        @else
                            <i class="bi bi-person-fill fs-2 text-muted"></i>
                        @endif
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        <h6 class="fw-bold mb-2">
                            <i class="bi bi-person-fill icon-name me-1"></i>
                            {{ $p->warga->nama ?? 'Nama tidak tersedia' }}
                        </h6>

                        <p class="mb-1 small">
                            <i class="bi bi-briefcase-fill icon-job me-1"></i>
                            {{ $p->jabatan }}
                        </p>

                        <p class="mb-1 small">
                            <i class="bi bi-person-vcard icon-nip me-1"></i>
                            {{ $p->nip ?? '-' }}
                        </p>

                        <p class="mb-1 small">
                            <i class="bi bi-telephone-fill icon-phone me-1"></i>
                            {{ $p->warga->telp ?? '-' }}
                        </p>

                        <p class="mb-0 small text-muted">
                            <i class="bi bi-geo-alt-fill icon-map me-1"></i>
                            {{ $p->warga->alamat ?? '-' }}
                        </p>

                    </div>

                    {{-- FOOTER --}}
                    <div class="card-footer bg-white d-grid gap-2">

                        <a href="{{ route('perangkat.show', $p->perangkat_id) }}"
                           class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-eye"></i> Detail
                        </a>

                        <a href="{{ route('perangkat.edit', $p->perangkat_id) }}"
                           class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Edit
                        </a>

                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Hapus
                        </button>

                    </div>

                </div>
            </form>

        </div>
        @empty
        <div class="text-center py-5 text-muted">
            Belum ada data perangkat desa
        </div>
        @endforelse
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $perangkats->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
