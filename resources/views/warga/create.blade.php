@extends('layouts.guest.app')

@section('title', 'Tambah Warga')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Tambah Data Warga</h2>

    <form action="{{ route('warga.store') }}" method="POST" enctype="multipart/form-data" id="wargaForm">
        @csrf

        @include('warga.form')

        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <!-- Debug container untuk tombol -->
        <div class="mt-4 pt-3 border-top" style="position: relative; z-index: 1000;">
            <button type="submit" class="btn btn-success" 
                    style="position: relative; z-index: 1001; padding: 10px 20px; font-size: 16px; cursor: pointer !important;">
                Simpan
            </button>
            <a href="{{ route('warga.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<style>
/* CSS tambahan untuk memastikan tombol bisa diklik */
#wargaForm .btn-success {
    position: relative !important;
    z-index: 1001 !important;
    cursor: pointer !important;
}

#wargaForm > div:last-child {
    position: relative !important;
    z-index: 1000 !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('wargaForm');
    const submitBtn = form.querySelector('button[type="submit"]');
    
    // Tambahkan event listener untuk debug
    submitBtn.addEventListener('click', function(e) {
        console.log('✅ Tombol Simpan berhasil diklik');
    });
    
    // Cek apakah ada elemen yang menutupi
    const rect = submitBtn.getBoundingClientRect();
    const elementAtCenter = document.elementFromPoint(
        rect.left + rect.width/2,
        rect.top + rect.height/2
    );
    
    if (elementAtCenter !== submitBtn) {
        console.warn('⚠️ Ada elemen lain yang menutupi tombol:', elementAtCenter);
        elementAtCenter.style.pointerEvents = 'none';
    }
    
    console.log('✅ Tombol siap digunakan');
});
</script>
@endsection