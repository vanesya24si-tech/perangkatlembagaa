@extends('layouts.guest.app')

@section('title', 'Informasi Umum')

@section('content')
<div class="container py-5">

    <h3 class="fw-bold text-center mb-4">Informasi Umum</h3>

    @forelse ($informasi as $item)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="fw-semibold">{{ $item->judul }}</h5>
                <small class="text-muted">{{ $item->tanggal }}</small>
                <hr>
                <p class="mb-0">{{ $item->isi }}</p>
            </div>
        </div>
    @empty
        <div class="alert alert-info text-center">
            Belum ada informasi yang tersedia.
        </div>
    @endforelse

</div>
@endsection
