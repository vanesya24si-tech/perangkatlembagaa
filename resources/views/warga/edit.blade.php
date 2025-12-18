@extends('layouts.guest.app')

@section('title', 'Edit Warga')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0" style="font-weight: 600;">Edit Data Warga</h2>
        <a href="{{ route('warga.index') }}" class="btn btn-outline-secondary px-3">
            ← Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4">

            <form action="{{ route('warga.update', $warga) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Form Input (Include) --}}
                @include('warga.form', ['warga' => $warga])

                {{-- Upload Foto --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Upload Foto Profil</label>
                    <input type="file" name="foto" class="form-control">

                  @if(!empty($warga->foto))
<div class="mt-3">
    <p class="fw-semibold mb-1">Foto Saat Ini:</p>
    <img src="{{ Storage::url($warga->foto) }}"
         alt="Foto Warga"
         class="rounded shadow-sm border"
         style="width: 130px; height: 130px; object-fit: cover;">
</div>
@endif

                </div>

                {{-- Buttons --}}
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('warga.index') }}" class="btn btn-outline-secondary px-4 py-2">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary px-4 py-2">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
