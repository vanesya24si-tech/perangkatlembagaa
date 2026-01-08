@extends('layouts.guest.app')

@section('title', 'Daftar Anggota Lembaga')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">
            <i class="fa-solid fa-users me-2"></i>Daftar Anggota Lembaga
        </h2>

        <a href="{{ route('anggota_lembaga.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus me-1"></i> Tambah Anggota
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fa-solid fa-circle-check me-1"></i> {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">

        @forelse ($anggotas as $a)
            <div class="col-md-4">
                <div class="card shadow-sm anggota-card h-100">

                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">{{ $a->warga->nama ?? '-' }}</h5>
                    </div>

                    <div class="card-body">
                        <p><strong>Lembaga:</strong> {{ $a->lembaga->nama_lembaga ?? '-' }}</p>
                        <p><strong>Jabatan:</strong>
                            {{ $a->jabatan->nama_jabatan ?? '-' }}
                        </p>
                        <p><strong>Tgl Mulai:</strong> {{ $a->tgl_mulai ?? '-' }}</p>
                        <p><strong>Tgl Selesai:</strong> {{ $a->tgl_selesai ?? '-' }}</p>
                    </div>

                    <div class="card-footer bg-white d-flex justify-content-between">
                        <a href="{{ route('anggota_lembaga.edit', $a->anggota_id) }}" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <form action="{{ route('anggota_lembaga.destroy', $a->anggota_id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        @empty

            <div class="col-12 text-center py-5 text-muted">
                Belum ada anggota lembaga.
            </div>

        @endforelse

    </div>

    <div class="mt-4">
        {{ $anggotas->links('pagination::bootstrap-5') }}
    </div>

</div>

<style>
.anggota-card {
    border-radius: 14px;
    overflow: hidden;
    transition: 0.3s;
}
.anggota-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.15);
}
</style>

@endsection
