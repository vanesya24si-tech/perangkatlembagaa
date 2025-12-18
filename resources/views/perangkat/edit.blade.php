@extends('layouts.guest.app')

@section('title', 'Edit Perangkat Desa')

@section('content')
<div class="container py-4">

    <h2 class="mb-4">
        <i class="fa-solid fa-user-pen me-2"></i>
        Edit Perangkat Desa
    </h2>

    <form action="{{ route('perangkat.update', $perangkat->perangkat_id) }}" 
          method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- Warga --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Warga</label>
            <select name="warga_id" class="form-control" required>
                <option value="">-- Pilih Warga --</option>
                @foreach($wargas as $w)
                    <option value="{{ $w->id }}"
                        {{ $perangkat->warga_id == $w->id ? 'selected' : '' }}>
                        {{ $w->nama }} (NIK: {{ $w->nik }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Jabatan --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Jabatan</label>
            <input type="text" name="jabatan" class="form-control"
                   value="{{ old('jabatan', $perangkat->jabatan) }}" required>
        </div>

        {{-- NIP --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">NIP</label>
            <input type="text" name="nip" class="form-control"
                   value="{{ old('nip', $perangkat->nip) }}">
        </div>

        {{-- Kontak --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Kontak</label>
            <input type="text" name="kontak" class="form-control"
                   value="{{ old('kontak', $perangkat->kontak) }}">
        </div>

        {{-- Periode Mulai --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Periode Mulai</label>
            <input type="date" name="periode_mulai" class="form-control"
                   value="{{ old('periode_mulai', $perangkat->periode_mulai) }}">
        </div>

        {{-- Periode Selesai --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Periode Selesai</label>
            <input type="date" name="periode_selesai" class="form-control"
                   value="{{ old('periode_selesai', $perangkat->periode_selesai) }}">
        </div>

        {{-- Foto --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Foto</label>
            <input type="file" name="foto" class="form-control">

            {{-- Tampilkan Foto Lama Jika Ada --}}
            @if(!empty($perangkat->foto))
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$perangkat->foto) }}" 
                         width="120" 
                         class="rounded shadow">
                </div>
            @endif
        </div>

        {{-- Tombol --}}
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('perangkat.index') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
            </a>
            <button type="submit" class="btn btn-warning">
                <i class="fa-solid fa-pen-to-square me-1"></i> Update
            </button>
        </div>

    </form>
</div>
@endsection
