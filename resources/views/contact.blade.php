@extends('layouts.guest.app')

@section('title', 'Pengaduan Masyarakat Desa Rumbai')

@section('content')
<section id="pengaduan" class="py-5">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">Pengaduan Masyarakat Desa Rumbai</h2>
      <p class="text-muted">
        Sampaikan keluhan, saran, atau laporan Anda demi pelayanan desa yang lebih baik.
      </p>
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
      <div class="alert alert-success text-center">
        {{ session('success') }}
      </div>
    @endif

    {{-- Error validasi --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="row justify-content-center">
      <div class="col-lg-8">

        <div class="card shadow-sm p-4">
          <form action="{{ route('contact.store') }}" 
                method="POST" 
                enctype="multipart/form-data">
            @csrf

            {{-- Nama --}}
            <div class="mb-3">
              <label class="form-label fw-semibold">Nama Lengkap</label>
              <input type="text"
                     name="nama"
                     class="form-control"
                     value="{{ old('nama') }}"
                     required>
            </div>

            {{-- Email --}}
            <div class="mb-3">
              <label class="form-label fw-semibold">Alamat Email</label>
              <input type="email"
                     name="email"
                     class="form-control"
                     value="{{ old('email') }}"
                     required>
            </div>

            {{-- Kategori --}}
            <div class="mb-3">
              <label class="form-label fw-semibold">Kategori Pengaduan</label>
              <select name="kategori" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Pelayanan Publik">Pelayanan Publik</option>
                <option value="Fasilitas Umum">Fasilitas Umum</option>
                <option value="Keamanan">Keamanan</option>
                <option value="Kesehatan">Kesehatan</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>

            {{-- Pesan --}}
            <div class="mb-3">
              <label class="form-label fw-semibold">Isi Pengaduan</label>
              <textarea name="pesan"
                        rows="5"
                        class="form-control"
                        required>{{ old('pesan') }}</textarea>
            </div>

            {{-- MULTIPLE UPLOAD --}}
            <div class="mb-4">
              <label class="form-label fw-semibold">
                Lampiran (Foto / Dokumen)
              </label>
              <input type="file"
                     name="files[]"
                     class="form-control"
                     multiple>
              <small class="text-muted">
                Bisa upload lebih dari satu file (jpg, png, pdf). Maks 2MB per file.
              </small>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary px-4 py-2">
                Kirim Pengaduan
              </button>
            </div>

          </form>
        </div>

      </div>
    </div>

  </div>
</section>
@endsection
