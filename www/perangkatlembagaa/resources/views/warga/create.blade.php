@extends('layouts.guest.app')

@section('title', 'Tambah Warga')

@push('styles')
<style>
    .card-soft{
        border:0;
        border-radius:16px;
        box-shadow:0 10px 28px rgba(0,0,0,.06);
    }
    .page-head{
        display:flex;
        flex-wrap:wrap;
        align-items:end;
        justify-content:space-between;
        gap:1rem;
        margin-bottom:1rem;
    }
    .page-head h4{
        margin:0;
        font-weight:800;
        letter-spacing:.2px;
    }
    .page-head .sub{
        color:rgba(0,0,0,.55);
        margin-top:.25rem;
        font-size:.95rem;
    }
    .section-title{
        font-weight:800;
        font-size:1rem;
        margin-bottom:.2rem;
    }
    .section-sub{
        color:rgba(0,0,0,.55);
        font-size:.9rem;
        margin:0;
    }
    .photo-box{
        border:1px dashed rgba(0,0,0,.18);
        border-radius:14px;
        padding:14px;
        background:rgba(0,0,0,.02);
    }
    .photo-preview{
        width:100%;
        max-width:220px;
        aspect-ratio:1/1;
        border-radius:14px;
        object-fit:cover;
        border:1px solid rgba(0,0,0,.08);
        display:none;
    }
    .btn-icon{
        display:inline-flex;
        align-items:center;
        gap:.5rem;
    }
</style>
@endpush

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="page-head">
        <div>
            <h4>Tambah Data Warga</h4>
            <div class="sub">Isi data dengan benar, lalu simpan.</div>
        </div>
        <a href="{{ route('warga.index') }}" class="btn btn-outline-secondary btn-icon">
            <span>←</span><span>Kembali</span>
        </a>
    </div>

    {{-- Error server --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <div class="fw-semibold mb-2">Ada input yang perlu diperbaiki:</div>
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('warga.store') }}" method="POST" enctype="multipart/form-data" id="wargaForm">
        @csrf

        <div class="row g-3">

            {{-- Form utama --}}
            <div class="col-lg-8">
                <div class="card card-soft">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="section-title">Data Utama</div>
                            <p class="section-sub">Lengkapi identitas warga sesuai dokumen resmi.</p>
                        </div>

                        @include('warga.form')

                        <hr class="my-4">

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success btn-icon" id="btnSubmit">
                                <span>💾</span><span>Simpan</span>
                            </button>
                            <a href="{{ route('warga.index') }}" class="btn btn-secondary btn-icon">
                                <span>✖</span><span>Batal</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Foto --}}
            <div class="col-lg-4">
                <div class="card card-soft">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="section-title">Foto</div>
                            <p class="section-sub">Opsional. Preview otomatis.</p>
                        </div>

                        <div class="photo-box">
                            <img id="photoPreview" class="photo-preview mb-3" alt="Preview Foto">

                            <label class="form-label fw-semibold" for="fotoInput">Upload Foto</label>
                            <input type="file" name="foto" id="fotoInput" class="form-control" accept="image/*">

                            <div class="mt-2 small text-muted">
                                Disarankan JPG/PNG.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Preview foto sederhana
    const fotoInput = document.getElementById('fotoInput');
    const preview = document.getElementById('photoPreview');

    fotoInput.addEventListener('change', () => {
        const file = fotoInput.files?.[0];
        if (!file) {
            preview.src = '';
            preview.style.display = 'none';
            return;
        }
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    });
});
</script>
@endpush
