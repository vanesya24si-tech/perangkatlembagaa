@extends('layouts.guest.app')

@section('title', 'Data Lembaga Desa')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold"><i class="fa-solid fa-building me-2"></i>Data Lembaga Desa</h2>

        <a href="{{ route('lembaga.create') }}" class="btn btn-primary px-4">
            <i class="fa-solid fa-plus me-1"></i> Tambah Lembaga
        </a>
    </div>

    <div class="row g-4">
        @forelse($lembagas as $l)
        <div class="col-md-4 col-sm-6">

            <div class="card shadow rounded-4 overflow-hidden">
                <div class="card-header p-0 bg-light" style="height: 160px; overflow:hidden;">
                    @if($l->media->first())
                        <img src="{{ asset($l->media->first()->file_url) }}" class="w-100 h-100" style="object-fit:cover;">
                    @else
                        <div class="d-flex justify-content-center align-items-center h-100 text-muted">
                            Tidak ada logo
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <h5 class="fw-bold">{{ $l->nama_lembaga }}</h5>
                    <p class="text-muted mb-1">{{ Str::limit($l->deskripsi, 100) }}</p>
                    <p class="mb-1"><strong>Kontak:</strong> {{ $l->kontak ?? '-' }}</p>
                </div>

                <div class="card-footer bg-white d-flex justify-content-between">
                    <a href="{{ route('lembaga.show', $l->lembaga_id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('lembaga.edit', $l->lembaga_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('lembaga.destroy', $l->lembaga_id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Yakin hapus lembaga ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>

            </div>

        </div>
        @empty
        <div class="text-center py-5 text-muted">Belum ada data lembaga</div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $lembagas->links() }}
    </div>
</div>
@endsection
