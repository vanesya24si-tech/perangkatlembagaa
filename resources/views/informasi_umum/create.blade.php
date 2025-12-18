@extends('layouts.app')

@section('title', 'Tambah Informasi')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-3">Tambah Informasi Umum</h4>

    <form action="{{ route('informasi_umum.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Judul Informasi</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Isi Informasi</label>
            <textarea name="isi" rows="5" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="text-end">
            <a href="{{ route('informasi_umum.index') }}" class="btn btn-secondary">Kembali</a>
            <button class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
