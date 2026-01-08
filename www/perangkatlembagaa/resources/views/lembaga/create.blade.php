@extends('layouts.guest.app')

@section('title', 'Tambah Lembaga Desa')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">Tambah Lembaga Desa</h2>

    <form action="{{ route('lembaga.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Lembaga</label>
            <input type="text" name="nama_lembaga" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Kontak</label>
            <input type="text" name="kontak" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Logo Lembaga</label>
            <input type="file" name="logo" class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('lembaga.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>

    </form>

</div>
@endsection
