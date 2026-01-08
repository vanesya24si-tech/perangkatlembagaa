@extends('layouts.guest.app')

@section('title', 'Data Warga')

@push('styles')
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .card-warga{
        border:0;
        border-radius:16px;
        box-shadow:0 8px 24px rgba(0,0,0,.06);
        transition:.2s ease;
        height:100%;
    }
    .card-warga:hover{
        transform:translateY(-3px);
        box-shadow:0 14px 32px rgba(0,0,0,.10);
    }
    .avatar{
        width:64px;
        height:64px;
        border-radius:50%;
        object-fit:cover;
        border:2px solid #dee2e6;
        background:#f8f9fa;
    }
    .list-clean li{
        padding:.35rem 0;
        font-size:.9rem;
    }
</style>
@endpush

@section('content')
<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data Warga</h4>
            <div class="text-muted">Daftar warga yang tersimpan pada sistem</div>
        </div>
        <a href="{{ route('warga.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Warga
        </a>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- CARD GRID --}}
    <div class="row g-4">
        @forelse($dataWarga as $warga)
            @php
                $foto = $warga->foto
                    ? Storage::url($warga->foto)
                    : asset('assets/img/default-avatar.png');

                $tgl = $warga->tanggal_lahir
                    ? \Carbon\Carbon::parse($warga->tanggal_lahir)->format('d-m-Y')
                    : '-';

                $id = $warga->id ?? $warga->warga_id;
            @endphp

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card card-warga">

                    {{-- HEADER CARD --}}
                    <div class="card-body text-center">
                        <img src="{{ $foto }}" class="avatar mb-2">
                        <h6 class="fw-bold mb-0">{{ $warga->nama }}</h6>
                        <small class="text-muted">NIK: {{ $warga->nik }}</small>
                    </div>

                    <hr class="my-0">

                    {{-- DETAIL --}}
                    <div class="card-body">
                        <ul class="list-unstyled list-clean mb-0">
                            <li><i class="bi bi-gender-ambiguous text-secondary"></i>
                                {{ $warga->jenis_kelamin ?? '-' }}
                            </li>
                            <li><i class="bi bi-calendar-event text-secondary"></i>
                                {{ $tgl }}
                            </li>
                            <li>
                                <i class="bi bi-geo-alt text-secondary"></i>
                                {{ $warga->alamat ?? '-' }}
                            </li>
                        </ul>
                    </div>

                    {{-- FOOTER / ACTION --}}
                    <div class="card-footer bg-white border-0">
                        <div class="d-flex gap-2 justify-content-between">
                            <a href="{{ route('warga.show', $id) }}" class="btn btn-outline-primary btn-sm w-100">
                                <i class="bi bi-eye"></i> Detail
                            </a>

                            <a href="{{ route('warga.edit', $id) }}" class="btn btn-warning btn-sm w-100">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <form action="{{ route('warga.destroy', $id) }}" method="POST" class="form-delete w-100">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm w-100">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center text-muted py-5">
                    <i class="bi bi-people fs-1"></i>
                    <div class="fw-semibold mt-2">Belum ada data warga</div>
                </div>
            </div>
        @endforelse
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $dataWarga->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.form-delete').forEach(form => {
    form.addEventListener('submit', function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Hapus data?',
            text: 'Data tidak bisa dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Ya, hapus'
        }).then((res) => {
            if(res.isConfirmed) form.submit();
        });
    });
});
</script>
@endpush
