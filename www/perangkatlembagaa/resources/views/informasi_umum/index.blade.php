@extends('layouts.guest.app')

@section('title', 'Informasi Umum')

@push('styles')
    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    {{-- SweetAlert2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .page-title {
            letter-spacing: .2px;
        }
        .card-soft {
            border: 0;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,.06);
        }
        .table thead th {
            white-space: nowrap;
        }
        .badge-soft {
            padding: .45rem .7rem;
            border-radius: 999px;
            font-weight: 600;
        }
        .badge-soft-success {
            background: rgba(25,135,84,.12);
            color: #198754;
        }
        .badge-soft-secondary {
            background: rgba(108,117,125,.12);
            color: #6c757d;
        }
        .btn-icon {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
        }
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 999px;
            padding: .45rem .9rem;
        }
        .dataTables_wrapper .dataTables_length select {
            border-radius: 999px;
        }
    </style>
@endpush

@section('content')
<div class="container py-4">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <div>
            <h4 class="fw-bold page-title mb-1">Informasi Umum</h4>
            <div class="text-muted">Kelola informasi yang ditampilkan ke publik.</div>
        </div>

        <a href="{{ route('informasi_umum.create') }}" class="btn btn-primary btn-icon">
            <span>+ Tambah Informasi</span>
        </a>
    </div>

    {{-- alert success (akan dibuat jadi toast via JS juga) --}}
    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center justify-content-between mb-3" role="alert">
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card card-soft">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblInformasi" class="table table-hover align-middle nowrap w-100">
                    <thead class="table-dark">
                        <tr>
                            <th style="width:70px">No</th>
                            <th>Judul</th>
                            <th style="width:140px">Tanggal</th>
                            <th style="width:120px">Status</th>
                            <th style="width:170px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($informasi as $item)
                        <tr>
                            <td class="text-muted">{{ $loop->iteration }}</td>
                            <td>
                                <div class="fw-semibold">{{ $item->judul }}</div>
                                {{-- opsional subtitle kecil --}}
                                <div class="text-muted small">ID: {{ $item->informasi_id }}</div>
                            </td>
                            <td>
                                {{-- Kalau tanggal kamu sudah date, bisa format: \Carbon\Carbon::parse($item->tanggal)->format('d M Y') --}}
                                <span class="fw-semibold">{{ $item->tanggal }}</span>
                            </td>
                            <td>
                                @php $aktif = $item->status == 'aktif'; @endphp
                                <span class="badge-soft {{ $aktif ? 'badge-soft-success' : 'badge-soft-secondary' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('informasi_umum.edit', $item->informasi_id) }}"
                                       class="btn btn-warning btn-sm btn-icon">
                                        <span>✏️</span><span>Edit</span>
                                    </a>

                                    <form class="d-inline form-delete"
                                          action="{{ route('informasi_umum.destroy', $item->informasi_id) }}"
                                          method="POST"
                                          data-judul="{{ $item->judul }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-icon">
                                            <span>🗑️</span><span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if(count($informasi) == 0)
                <div class="text-center text-muted py-4">
                    Belum ada data Informasi Umum.
                </div>
            @endif
        </div>
    </div>

</div>
@endsection

@push('scripts')
    {{-- jQuery (wajib buat DataTables) --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- DataTables --}}
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function () {
            // DataTables init
            const table = $('#tblInformasi').DataTable({
                responsive: true,
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                order: [[2, 'desc']], // urutkan berdasarkan kolom tanggal
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data",
                    infoFiltered: "(difilter dari _MAX_ total data)",
                    zeroRecords: "Data tidak ditemukan",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "›",
                        previous: "‹"
                    }
                },
                columnDefs: [
                    { targets: [0, 4], orderable: false }, // No & Aksi tidak ikut sort
                ]
            });

            // SweetAlert confirm delete
            $(document).on('submit', '.form-delete', function (e) {
                e.preventDefault();
                const form = this;
                const judul = $(this).data('judul') || 'data ini';

                Swal.fire({
                    title: 'Hapus data?',
                    html: `Yakin mau hapus <b>${judul}</b>?<br><span class="text-muted">Tindakan ini tidak bisa dibatalkan.</span>`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    confirmButtonColor: '#dc3545'
                }).then((result) => {
                    if (result.isConfirmed) form.submit();
                });
            });

            // Toast sukses (kalau session success ada)
            @if(session('success'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: @json(session('success')),
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true
                });
            @endif
        });
    </script>
@endpush
