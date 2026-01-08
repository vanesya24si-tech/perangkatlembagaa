@extends('layouts.guest.app')

@section('title', 'Tambah Informasi')

@section('content')
<div class="container py-5">

    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                <i class="fa-solid fa-plus me-2 text-primary"></i>
                Tambah Informasi Umum
            </h4>

            <form action="{{ route('informasi_umum.store') }}" method="POST">
                @csrf

                {{-- Judul --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Informasi</label>
                    <input type="text" name="judul"
                           class="form-control @error('judul') is-invalid @enderror"
                           value="{{ old('judul') }}"
                           placeholder="Masukkan judul informasi">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tanggal --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <input type="date" name="tanggal"
                           class="form-control @error('tanggal') is-invalid @enderror"
                           value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Isi --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Isi Informasi</label>
                    <textarea name="isi" rows="5"
                              class="form-control @error('isi') is-invalid @enderror"
                              placeholder="Tuliskan isi informasi">{{ old('isi') }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('informasi_umum.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
