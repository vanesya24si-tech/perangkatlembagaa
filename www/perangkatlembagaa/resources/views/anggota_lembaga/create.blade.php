@extends('layouts.guest.app')

@section('title', 'Tambah Anggota Lembaga')

@section('content')
    <div class="container py-4">

        <h2 class="fw-bold mb-4">Tambah Anggota Lembaga</h2>

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error:</strong>
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('anggota-lembaga.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Lembaga</label>
                <select name="lembaga_id" class="form-control" required>
                    <option value="">-- Pilih Lembaga --</option>
                    @foreach ($lembagas as $lem)
                        <option value="{{ $lem->lembaga_id }}">{{ $lem->nama_lembaga }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Warga</label>
                <select name="warga_id" class="form-control" required>
                    <option value="">-- Pilih Warga --</option>
                    @foreach ($wargas as $w)
                        <option value="{{ $w->id }}">{{ $w->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <select name="jabatan_id" class="form-control" required>
                    <option value="">-- Pilih Jabatan --</option>
                    @foreach ($jabatans as $jab)
                        <option value="{{ $jab->jabatan_id }}">
                            {{ $jab->nama_jabatan }} ({{ $jab->lembaga->nama_lembaga }})
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" name="tgl_mulai" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Selesai</label>
                <input type="date" name="tgl_selesai" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('anggota-lembaga.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>

        </form>

    </div>
@endsection
