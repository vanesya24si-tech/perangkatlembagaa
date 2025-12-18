@extends('layouts.app')

@section('title', 'Edit Informasi')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-3">Edit Informasi Umum</h4>

    <form action="{{ route('informasi_umum.update', $informasi->informasi_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul Informasi</label>
            <input type="text" name="judul" class="form-control"
                   value="{{ $informasi->judul }}" required>
        </div>

        <div class="mb-3">
            <label>Isi Informasi</label>
            <textarea name="isi" rows="5" class="form-control" required>{{ $informasi->isi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control"
                   value="{{ $informasi->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="aktif" {{ $informasi->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $informasi->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <div class="text-end">
            <a href="{{ route('informasi_umum.index') }}" class="btn btn-secondary">Kembali</a>
            <button class="btn btn-warning">Update</button>
        </div>
    </form>
</div>
@endsection
