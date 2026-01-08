@extends('layouts.guest.app')

@section('title', 'Edit Informasi')

@section('content')
<div class="container py-5">

    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                <i class="fa-solid fa-pen-to-square me-2 text-warning"></i>
                Edit Informasi Umum
            </h4>

            <form action="{{ route('informasi_umum.update', $informasi->informasi_id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Judul --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Informasi</label>
                    <input type="text" name="judul"
                           class="form-control @error('judul') is-invalid @enderror"
                           value="{{ old('judul', $informasi->judul) }}">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tanggal --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <input type="date" name="tanggal"
                           class="form-control @error('tanggal') is-invalid @enderror"
                           value="{{ old('tanggal', $informasi->tanggal) }}">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status"
                            class="form-select @error('status') is-invalid @enderror">
                        <option value="aktif"
                            {{ old('status', $informasi->status) == 'aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>
                        <option value="nonaktif"
                            {{ old('status', $informasi->status) == 'nonaktif' ? 'selected' : '' }}>
                            Nonaktif
                        </option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Isi --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Isi Informasi</label>
                    <textarea name="isi" rows="5"
                              class="form-control @error('isi') is-invalid @enderror">{{ old('isi', $informasi->isi) }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('informasi_umum.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-warning text-white">
                        Update
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
