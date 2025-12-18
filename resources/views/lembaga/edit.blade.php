@extends('layouts.guest.app')

@section('title', 'Edit Lembaga Desa')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">Edit Lembaga Desa</h2>

    <form action="{{ route('lembaga', $lembaga->lembaga_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Lembaga</label>
            <input type="text" name="nama_lembaga" class="form-control" value="{{ $lembaga->nama_lembaga }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ $lembaga->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Kontak</label>
            <input type="text" name="kontak" class="form-control" value="{{ $lembaga->kontak }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Logo Lembaga</label>
            <input type="file" name="logo" class="form-control">

            @if ($lembaga->media->first())
                <img src="{{ asset($lembaga->media->first()->file_url) }}" width="120" class="mt-2 rounded">
            @endif
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('lembaga.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-warning">Update</button>
        </div>

    </form>

</div>
@endsection
