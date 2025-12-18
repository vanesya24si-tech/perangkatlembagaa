@extends('layouts.guest.app')

@section('title', 'Detail Lembaga Desa')

@section('content')
<div class="container py-4">

    <a href="{{ route('lembaga.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card shadow-lg rounded-4 border-0">
        <div class="card-header bg-primary text-white py-4">
            <h3 class="mb-0">{{ $lembaga->nama_lembaga }}</h3>
        </div>

        <div class="card-body p-4">

            @if($lembaga->media->first())
                <div class="mb-4 text-center">
                    <img src="{{ asset($lembaga->media->first()->file_url) }}" class="rounded shadow" width="200">
                </div>
            @endif

            <p><strong>Deskripsi:</strong><br> {{ $lembaga->deskripsi ?? '-' }}</p>

            <p><strong>Kontak:</strong> {{ $lembaga->kontak ?? '-' }}</p>

        </div>
    </div>

</div>
@endsection
