@extends('layouts.guest.app')

@section('title', 'Lembaga Desa Rumbai')

@push('layouts.guest.css')


@section('content')
<section id="lembaga-desa" class="py-5">
  <div class="container" data-aos="fade-up">

    <div class="text-center mb-5">
      <h2 class="section-title">Lembaga Desa Rumbai</h2>
      <p class="text-muted">Berbagai lembaga yang berperan dalam pembangunan dan pelayanan masyarakat di Kelurahan Rumbai, Kota Pekanbaru.</p>
    </div>

    <div class="row g-4">
      {{-- BPD --}}
      <div class="col-md-4 col-sm-6">
        <div class="lembaga-card text-center shadow-sm p-4">
          <i class="bi bi-people lembaga-icon"></i>
          <h5>Badan Permusyawaratan Desa (BPD)</h5>
          <p>Badan yang menampung dan menyalurkan aspirasi masyarakat serta mengawasi pelaksanaan peraturan desa.</p>
        </div>
      </div>

      {{-- LPM --}}
      <div class="col-md-4 col-sm-6">
        <div class="lembaga-card text-center shadow-sm p-4">
          <i class="bi bi-diagram-3 lembaga-icon"></i>
          <h5>Lembaga Pemberdayaan Masyarakat (LPM)</h5>
          <p>Berperan dalam perencanaan, pelaksanaan, dan pengendalian pembangunan yang partisipatif di tingkat desa.</p>
        </div>
      </div>

      {{-- PKK --}}
      <div class="col-md-4 col-sm-6">
        <div class="lembaga-card text-center shadow-sm p-4">
          <i class="bi bi-heart-fill lembaga-icon"></i>
          <h5>PKK (Pemberdayaan Kesejahteraan Keluarga)</h5>
          <p>Meningkatkan kesejahteraan keluarga melalui kegiatan sosial, pendidikan, dan ekonomi produktif.</p>
        </div>
      </div>

      {{-- Karang Taruna --}}
      <div class="col-md-4 col-sm-6">
        <div class="lembaga-card text-center shadow-sm p-4">
          <i class="bi bi-lightning-charge-fill lembaga-icon"></i>
          <h5>Karang Taruna</h5>
          <p>Organisasi kepemudaan yang fokus pada kegiatan sosial, ekonomi, dan pengembangan keterampilan generasi muda desa.</p>
        </div>
      </div>

      {{-- Linmas --}}
      <div class="col-md-4 col-sm-6">
        <div class="lembaga-card text-center shadow-sm p-4">
          <i class="bi bi-shield-check lembaga-icon"></i>
          <h5>LINMAS (Perlindungan Masyarakat)</h5>
          <p>Menjaga keamanan, ketertiban, dan membantu penanggulangan bencana di tingkat desa.</p>
        </div>
      </div>

      {{-- RT/RW --}}
      <div class="col-md-4 col-sm-6">
        <div class="lembaga-card text-center shadow-sm p-4">
          <i class="bi bi-house-door-fill lembaga-icon"></i>
          <h5>RT / RW</h5>
          <p>Unit terkecil pemerintahan desa yang menjadi penghubung langsung antara pemerintah desa dan masyarakat.</p>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection
