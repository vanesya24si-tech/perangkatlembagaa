@extends('layouts.app')

@section('title', 'Informasi Umum')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Informasi Umum</h4>
        <a href="{{ route('informasi_umum.create') }}" class="btn btn-primary">
            + Tambah Informasi
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($informasi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>
                    <span class="badge bg-{{ $item->status == 'aktif' ? 'success' : 'secondary' }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('informasi_umum.edit', $item->informasi_id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('informasi_umum.destroy', $item->informasi_id) }}"
                          method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
