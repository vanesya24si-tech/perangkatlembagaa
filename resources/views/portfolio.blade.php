@extends('layouts.guest.app')

@section('title', 'Informasi Umum Desa Rumbai')

@push('layouts.css')


@section('content')
<section id="informasi-umum" class="py-5">
  <div class="container" data-aos="fade-up">

    <div class="text-center mb-5">
      <h2 class="section-title">Informasi Umum Desa Rumbai</h2>
      <p class="text-muted">Gambaran umum wilayah, potensi, dan kondisi sosial masyarakat Desa Rumbai.</p>
    </div>

    <div class="row g-4">

      {{-- Profil Wilayah --}}
      <div class="col-md-6">
        <div class="info-card shadow-sm p-4">
          <h5>Profil Wilayah</h5>
          <p>Desa Rumbai terletak di Kecamatan Rumbai, Kota Pekanbaru, dengan luas wilayah sekitar <strong>350 hektar</strong>. Wilayah ini terdiri dari 10 RW dan 30 RT yang tersebar di dua dusun.</p>
        </div>
      </div>

      {{-- Batas Wilayah --}}
      <div class="col-md-6">
        <div class="info-card shadow-sm p-4">
          <h5>Batas Wilayah</h5>
          <p>
            Utara: Desa Umban Sari<br>
            Selatan: Kelurahan Rumbai Bukit<br>
            Barat: Sungai Siak<br>
            Timur: Kelurahan Palas
          </p>
        </div>
      </div>

      {{-- Demografi --}}
      <div class="col-md-6">
        <div class="info-card shadow-sm p-4">
          <h5>Demografi</h5>
          <p>Jumlah penduduk Desa Rumbai sebanyak <strong>7.520 jiwa</strong> dengan 2.130 kepala keluarga. Sebagian besar penduduk bekerja di sektor jasa, perdagangan, dan industri.</p>
        </div>
      </div>

      {{-- Potensi Desa --}}
      <div class="col-md-6">
        <div class="info-card shadow-sm p-4">
          <h5>Potensi Desa</h5>
          <p>Desa Rumbai memiliki potensi besar di bidang <strong>UMKM, pertanian perkotaan, dan pariwisata sungai</strong>. Pemerintah desa aktif mendorong ekonomi kreatif dan digitalisasi layanan masyarakat.</p>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection
