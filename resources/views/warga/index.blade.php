@extends('layouts.guest.app')

@section('title', 'Data Warga')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Data Warga</h2>
        <a href="{{ route('warga.create') }}" class="btn btn-primary shadow-sm px-3">
            + Tambah Warga
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Jika Tidak Ada Data --}}
    @if ($dataWarga->count() === 0)
        <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
            <h5 class="text-muted">
                <i class="bi bi-people"></i> Belum ada data warga
            </h5>
        </div>

    @else

        {{-- Daftar Warga --}}
        <div class="row g-4">
            @foreach ($dataWarga as $warga)
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm h-100 border-0 rounded-4">

                        {{-- Header Card --}}
                        <div class="card-header bg-primary text-white text-center rounded-top-4">
                            <h5 class="mb-0">{{ $warga->nama }}</h5>
                        </div>

                        {{-- Body Card --}}
                        <div class="card-body text-center">

                            {{-- Foto --}}
                           <img 
    src="{{ $warga->foto 
            ? Storage::url($warga->foto) 
            : asset('assets/img/default-avatar.png') }}"
    class="rounded-circle border border-2 shadow-sm mb-3"
    style="width: 50px; height: 50px; object-fit: cover;"
    alt="Foto Warga"
>



                            {{-- Detail --}}
                            <p class="mb-1"><strong>NIK:</strong> {{ $warga->nik }}</p>
                            <p class="mb-1"><strong>Jenis Kelamin:</strong> {{ $warga->jenis_kelamin }}</p>
                            <p class="mb-1">
                                <strong>Tanggal Lahir:</strong>
                                {{ $warga->tanggal_lahir ? \Carbon\Carbon::parse($warga->tanggal_lahir)->format('d-m-Y') : '-' }}
                            </p>
                            <p class="mb-0"><strong>Alamat:</strong> {{ $warga->alamat ?? '-' }}</p>

                        </div>

                        {{-- Footer Card --}}
                        <div class="card-footer bg-light d-flex justify-content-between rounded-bottom-4">

                            <a href="{{ route('warga.show', $warga->id) }}" class="btn btn-info btn-sm">
                                Detail
                            </a>

                            <a href="{{ route('warga.edit', $warga->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('warga.destroy', $warga->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin hapus data?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $dataWarga->links('pagination::bootstrap-5') }}
        </div>

    @endif

</div>
@endsection
