@extends('layouts.guest.app')

@section('title', 'Edit Anggota Lembaga')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">Edit Anggota Lembaga</h2>

    <form action="{{ route('anggota_lembaga.update', $anggota->anggota_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Lembaga</label>
            <select name="lembaga_id" class="form-control">
                @foreach ($lembagas as $lem)
                    <option value="{{ $lem->lembaga_id }}"
                        {{ $anggota->lembaga_id == $lem->lembaga_id ? 'selected' : '' }}>
                        {{ $lem->nama_lembaga }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Warga</label>
            <select name="warga_id" class="form-control">
                @foreach ($wargas as $w)
                    <option value="{{ $w->id }}"
                        {{ $anggota->warga_id == $w->id ? 'selected' : '' }}>
                        {{ $w->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan_id" class="form-control" value="{{ $anggota->jabatan_id }}">
        </div>

        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tgl_mulai" class="form-control" value="{{ $anggota->tgl_mulai }}">
        </div>

        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tgl_selesai" class="form-control" value="{{ $anggota->tgl_selesai }}">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('anggota-lembaga.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-warning">Update</button>
        </div>

    </form>

</div>
@endsection
