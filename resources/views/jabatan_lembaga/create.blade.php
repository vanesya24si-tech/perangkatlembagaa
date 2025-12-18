@extends('layouts.guest.app')

@section('title', 'Tambah Jabatan')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">Tambah Jabatan Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jabatan-lembaga.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Lembaga</label>
            <select name="lembaga_id" class="form-control" required>
                <option value="">-- pilih lembaga --</option>
                @foreach ($lembagas as $lem)
                    <option value="{{ $lem->lembaga_id }}">{{ $lem->nama_lembaga }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Jabatan</label>
            <input type="text" name="nama_jabatan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Level</label>
            <input type="number" name="level" class="form-control" required value="1">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('jabatan-lembaga.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>
@endsection
