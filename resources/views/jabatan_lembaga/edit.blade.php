@extends('layouts.guest.app')

@section('title', 'Edit Jabatan')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">Edit Jabatan</h2>

    <form action="{{ route('jabatan_lembaga.update', $jabatan->jabatan_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Lembaga</label>
            <select name="lembaga_id" class="form-control" required>
                @foreach ($lembagas as $lem)
                    <option value="{{ $lem->lembaga_id }}"
                        {{ $lem->lembaga_id == $jabatan->lembaga_id ? 'selected' : '' }}>
                        {{ $lem->nama_lembaga }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Jabatan</label>
            <input type="text" name="nama_jabatan" class="form-control"
                   value="{{ $jabatan->nama_jabatan }}" required>
        </div>

        <div class="mb-3">
            <label>Level</label>
            <input type="number" name="level" class="form-control"
                   value="{{ $jabatan->level }}" required>
        </div>

        <button class="btn btn-warning">Update</button>
        <a href="{{ route('jabatan_lembaga.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>
@endsection
