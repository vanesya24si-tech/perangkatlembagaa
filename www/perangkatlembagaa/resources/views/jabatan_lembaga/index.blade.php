@extends('layouts.guest.app')

@section('title', 'Jabatan Lembaga')

@push('styles')
<style>
/* =========================
   FIX PAGINATION SVG LARAVEL
   ========================= */
.pagination svg {
    width: 1em !important;
    height: 1em !important;
}

.pagination .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
}

/* =========================
   TABLE STYLE
   ========================= */
.table th, .table td {
    vertical-align: middle;
}

.table thead th {
    background-color: #f8fafc;
    font-weight: 600;
}

.action-btns .btn {
    margin-right: 4px;
}
</style>
@endpush

@section('content')
<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">
            Jabatan Lembaga
        </h4>

        <a href="{{ route('jabatan_lembaga.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Jabatan
        </a>
    </div>

    {{-- ALERT --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-center">
                        <th width="60">No</th>
                        <th>Lembaga</th>
                        <th>Nama Jabatan</th>
                        <th width="100">Level</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($jabatans as $i => $jab)
                        <tr>
                            <td class="text-center">
                                {{ $jabatans->firstItem() + $i }}
                            </td>

                            <td>
                                {{ $jab->lembaga->nama_lembaga ?? '-' }}
                            </td>

                            <td>
                                {{ $jab->nama_jabatan }}
                            </td>

                            <td class="text-center">
                                {{ $jab->level }}
                            </td>

                            <td class="text-center action-btns">
                                <a href="{{ route('jabatan_lembaga.edit', $jab->jabatan_id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('jabatan_lembaga.destroy', $jab->jabatan_id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Hapus jabatan ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Data jabatan belum tersedia
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $jabatans->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
