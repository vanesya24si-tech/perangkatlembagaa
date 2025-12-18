@extends('layouts.guest.app')

@section('title', 'Jabatan Lembaga')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between mb-3">
        <h2 class="fw-bold">Jabatan Lembaga</h2>

        <a href="{{ route('jabatan_lembaga.create') }}" class="btn btn-primary">
            + Tambah Jabatan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Lembaga</th>
                <th>Nama Jabatan</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($jabatans as $i => $jab)
                <tr>
                    <td>{{ $i + $jabatans->firstItem() }}</td>
                    <td>{{ $jab->lembaga->nama_lembaga ?? '-' }}</td>
                    <td>{{ $jab->nama_jabatan }}</td>
                    <td>{{ $jab->level }}</td>

                    <td>
                        <a class="btn btn-warning btn-sm"
                           href="{{ route('jabatan_lembaga.edit', $jab->jabatan_id) }}">
                           Edit
                        </a>

                        <form action="{{ route('jabatan_lembaga.destroy', $jab->jabatan_id) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus jabatan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $jabatans->links() }}

</div>
@endsection
