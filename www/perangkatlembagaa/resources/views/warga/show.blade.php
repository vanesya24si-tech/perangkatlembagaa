@extends('layouts.guest.app')

@section('title', 'Detail Warga')

@section('content')
<div class="container py-4">

    <a href="{{ route('warga.index') }}" class="btn btn-secondary mb-3">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>

    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

        <div class="card-header bg-primary text-white py-4 text-center">
            <h3 class="fw-bold mb-2">{{ $warga->nama }}</h3>
            <small class="opacity-75">ID: {{ $warga->warga_id }}</small>
        </div>

        <div class="card-body p-4">
            
            {{-- Foto Warga --}}
            <div class="text-center mb-4">
                <img
                    src="{{ $warga->foto ? asset('storage/' . $warga->foto) : asset('assets/img/default-avatar.png') }}"
                    class="foto-warga"
                >
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <strong>NIK:</strong>
                    <div>{{ $warga->nik }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>No KK:</strong>
                    <div>{{ $warga->no_kk ?? '-' }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Jenis Kelamin:</strong>
                    <div>{{ $warga->jenis_kelamin }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Tanggal Lahir:</strong>
                    <div>{{ $warga->tanggal_lahir ? $warga->tanggal_lahir->format('d-m-Y') : '-' }}</div>
                </div>

                <div class="col-md-12 mb-3">
                    <strong>Alamat:</strong>
                    <div>{{ $warga->alamat }}</div>
                </div>
            </div>
        </div>

    </div>

</div>

{{-- CSS FOTO --}}
<style>
    .foto-warga {
        width: 80px;     /* <<< kecil */
        height: 80px;    /* <<< kecil */
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #e3f2fd;
        box-shadow: 0px 3px 8px rgba(0,0,0,0.12);
    }
</style>
@endsection
