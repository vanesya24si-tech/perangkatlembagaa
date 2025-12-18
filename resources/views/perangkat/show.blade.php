@extends('layouts.guest.app')

@section('title', 'Detail Perangkat Desa')

@section('content')
<div class="container py-4">
    <h2 class="mb-4"><i class="fa-solid fa-user-tie me-2"></i>Detail Perangkat Desa</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong><i class="fa-solid fa-user me-2"></i>Nama:</strong> {{ $perangkat->nama }}</p>
            <p><strong><i class="fa-solid fa-id-card me-2"></i>NIP:</strong> {{ $perangkat->nip ?? '-' }}</p>
            <p><strong><i class="fa-solid fa-briefcase me-2"></i>Jabatan:</strong> {{ $perangkat->jabatan }}</p>
            <p><strong><i class="fa-solid fa-venus-mars me-2"></i>Jenis Kelamin:</strong> {{ $perangkat->jenis_kelamin }}</p>
            <p><strong><i class="fa-solid fa-cake-candles me-2"></i>Tanggal Lahir:</strong>
                {{ $perangkat->tanggal_lahir ? $perangkat->tanggal_lahir->format('d-m-Y') : '-' }}
            </p>
            <p><strong><i class="fa-solid fa-phone me-2"></i>No HP:</strong> {{ $perangkat->no_hp ?? '-' }}</p>
            <p><strong><i class="fa-solid fa-location-dot me-2"></i>Alamat:</strong> {{ $perangkat->alamat ?? '-' }}</p>
        </div>
    </div>

    <div class="mt-3 d-flex justify-content-between">
        <a href="{{ route('perangkat.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
        <a href="{{ route('perangkat.edit', $perangkat) }}" class="btn btn-warning">
            <i class="fa-solid fa-pen-to-square me-1"></i> Edit
        </a>
    </div>
</div>
@endsection
