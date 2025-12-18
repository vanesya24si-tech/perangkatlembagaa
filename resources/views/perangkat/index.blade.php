@extends('layouts.guest.app')

@section('title', 'Data Perangkat Desa')

@push('styles')
<style>
    .fade-in {
        animation: fadeIn .5s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(8px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* CARD */
    .perangkat-card {
        border-radius: 18px;
        overflow: hidden;
        background: #fff;
        transition: .25s;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        padding-top: 20px;
    }
    .perangkat-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.15);
    }

    /* FOTO BULAT */
    .foto-perangkat {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #e3f2fd;
        display: block;
        margin: 0 auto 15px auto;
    }

    .title {
        font-size: 1.15rem;
        font-weight: 700;
        color: #333;
        text-align: center;
        margin-bottom: 10px;
    }

    .info-text {
        font-size: .9rem;
        margin-bottom: 5px;
    }

    .btn-edit {
        background: #fbbf24;
        border: none;
        padding: 6px 14px;
        border-radius: 6px;
        font-weight: 600;
    }
    .btn-edit:hover { background: #f59e0b; }

    .btn-delete {
        background: #ef4444;
        border: none;
        padding: 6px 14px;
        border-radius: 6px;
        font-weight: 600;
        color: #fff;
    }
    .btn-delete:hover { background: #dc2626; }

    .btn-detail {
        background: #38bdf8;
        border: none;
        padding: 6px 14px;
        border-radius: 6px;
        font-weight: 600;
        color: white;
    }
    .btn-detail:hover { background: #0ea5e9; }
</style>
@endpush


@section('content')
<div class="container fade-in py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold"><i class="fa-solid fa-users me-2"></i>Data Perangkat Desa</h2>

        <a href="{{ route('perangkat.create') }}" class="btn btn-primary px-4">
            <i class="fa-solid fa-plus me-1"></i> Tambah Perangkat
        </a>
    </div>

    {{-- GRID LIST --}}
    <div class="row g-4">

        @forelse($perangkats as $p)
        <div class="col-md-4 col-lg-3">

            <div class="perangkat-card p-3">

                {{-- FOTO BULAT --}}
                @if($p->media)
                    <img src="{{ asset($p->media->file_url) }}" class="foto-perangkat">
                @else
                    <img src="{{ asset('assets/img/default-avatar.png') }}" class="foto-perangkat">
                @endif

                {{-- CARD BODY --}}
                <div class="card-body text-center">

                    <div class="title">
                        {{ $p->warga->nama ?? 'Nama tidak tersedia' }}
                    </div>

                    <div class="info-text"><strong>Jabatan:</strong> {{ $p->jabatan }}</div>
                    <div class="info-text"><strong>NIP:</strong> {{ $p->nip ?? '-' }}</div>
                    <div class="info-text"><strong>Kontak:</strong> {{ $p->warga->telp ?? '-' }}</div>
                    <div class="info-text"><strong>Alamat:</strong> {{ $p->warga->alamat ?? '-' }}</div>

                    <hr class="my-3">

                    {{-- BUTTONS --}}
                    <div class="d-flex justify-content-between">

                        <a href="{{ route('perangkat.show', $p->perangkat_id) }}"
                           class="btn-detail btn-sm">
                            Detail
                        </a>

                        <a href="{{ route('perangkat.edit', $p->perangkat_id) }}"
                           class="btn-edit btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('perangkat.destroy', $p->perangkat_id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus perangkat ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete btn-sm">Hapus</button>
                        </form>

                    </div>

                </div>

            </div>

        </div>
        @empty

        <div class="text-center py-5 text-muted">
            Belum ada perangkat desa.
        </div>

        @endforelse

    </div>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $perangkats->links('pagination::bootstrap-4') }}
    </div>

</div>
@endsection
