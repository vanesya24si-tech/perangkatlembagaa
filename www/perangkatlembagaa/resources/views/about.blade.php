@extends('layouts.guest.app')

@section('title', 'Data Warga Rumbai')

@section('content')



  <main class="main about-page">

  <!-- Data Warga Section -->
  <section id="about" class="about section py-5">
    <div class="container" data-aos="fade-up">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Data Warga Rumbai</h2>
        <p class="text-muted">Informasi lengkap data kependudukan Kelurahan Rumbai</p>
      </div>

      <div class="row align-items-center gy-4">
        <div class="col-lg-4 text-center">
          <img src="https://bandungbergerak.id/cdn/7/2/8/4/7284_683x468.jpg"
               class="img-fluid rounded shadow-lg" alt="Warga Rumbai">
        </div>
        <div class="col-lg-8">
          <h3 class="fw-semibold">Profil Kelurahan</h3>
          <p class="fst-italic">
            Kelurahan Rumbai di Kecamatan Rumbai, Kota Pekanbaru, Provinsi Riau, memiliki perkembangan penduduk yang signifikan.
          </p>
          <div class="row mt-3">
            <div class="col-lg-6">
              <ul class="list-unstyled">
                <li><i class="bi bi-geo-alt text-primary"></i> <strong>Kode Pos:</strong> 28261</li>
                <li><i class="bi bi-building text-primary"></i> <strong>Kecamatan:</strong> Rumbai</li>
                <li><i class="bi bi-geo text-primary"></i> <strong>Kota:</strong> Pekanbaru</li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul class="list-unstyled">
                <li><i class="bi bi-aspect-ratio text-primary"></i> <strong>Luas:</strong> 15.2 km²</li>
                <li><i class="bi bi-house text-primary"></i> <strong>RT/RW:</strong> 45/12</li>
                <li><i class="bi bi-postcard text-primary"></i> <strong>Kode Wilayah:</strong> 1471011006</li>
              </ul>
            </div>
          </div>
          <p class="mt-3">
            Fasilitas publik lengkap: puskesmas, sekolah, tempat ibadah, dan pusat perbelanjaan.
            Masyarakat multikultural dengan sektor utama perdagangan, jasa, dan industri.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Statistik Section -->
  <section id="stats" class="stats section bg-light py-5">
    <div class="container" data-aos="fade-up">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Statistik Kependudukan</h2>
        <p class="text-muted">Data terbaru jumlah penduduk Kelurahan Rumbai</p>
      </div>

      <div class="row gy-4">
        <div class="col-md-3 col-sm-6">
          <div class="card border-0 shadow-sm text-center p-4 h-100 hover-shadow">
            <h3 class="fw-bold text-primary mb-0">12,543</h3>
            <p class="mt-2 mb-0"><i class="bi bi-people"></i> Total Penduduk</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="card border-0 shadow-sm text-center p-4 h-100 hover-shadow">
            <h3 class="fw-bold text-success mb-0">3,256</h3>
            <p class="mt-2 mb-0"><i class="bi bi-house-heart"></i> Keluarga</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="card border-0 shadow-sm text-center p-4 h-100 hover-shadow">
            <h3 class="fw-bold text-warning mb-0">156</h3>
            <p class="mt-2 mb-0"><i class="bi bi-balloon-heart"></i> Kelahiran</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="card border-0 shadow-sm text-center p-4 h-100 hover-shadow">
            <h3 class="fw-bold text-danger mb-0">89</h3>
            <p class="mt-2 mb-0"><i class="bi bi-person-plus"></i> Pendatang Baru</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Demografi Section -->
  <section id="skills" class="skills section py-5">
    <div class="container" data-aos="fade-up">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Demografi Penduduk</h2>
        <p class="text-muted">Komposisi penduduk berdasarkan kategori utama</p>
      </div>

      <div class="row gy-4">
        <div class="col-lg-6">
          <div class="mb-4">
            <span class="d-flex justify-content-between"><strong>Laki-laki</strong><span>52%</span></span>
            <div class="progress mt-2">
              <div class="progress-bar bg-primary" style="width:52%"></div>
            </div>
          </div>
          <div class="mb-4">
            <span class="d-flex justify-content-between"><strong>Perempuan</strong><span>48%</span></span>
            <div class="progress mt-2">
              <div class="progress-bar bg-pink" style="width:48%"></div>
            </div>
          </div>
          <div class="mb-4">
            <span class="d-flex justify-content-between"><strong>Usia Produktif</strong><span>68%</span></span>
            <div class="progress mt-2">
              <div class="progress-bar bg-success" style="width:68%"></div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="mb-4">
            <span class="d-flex justify-content-between"><strong>Pendidikan SMA+</strong><span>45%</span></span>
            <div class="progress mt-2">
              <div class="progress-bar bg-info" style="width:45%"></div>
            </div>
          </div>
          <div class="mb-4">
            <span class="d-flex justify-content-between"><strong>Bekerja</strong><span>65%</span></span>
            <div class="progress mt-2">
              <div class="progress-bar bg-warning" style="width:65%"></div>
            </div>
          </div>
          <div class="mb-4">
            <span class="d-flex justify-content-between"><strong>Pemilik Rumah</strong><span>75%</span></span>
            <div class="progress mt-2">
              <div class="progress-bar bg-danger" style="width:75%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<style>
  .hover-shadow:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
    box-shadow: 0 8px 16px rgba(0,0,0,0.15);
  }

  .progress-bar {
    transition: width 1s ease-in-out;
  }

  .bg-pink {
    background-color: #e83e8c !important;
  }
</style>


<script>

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize AOS
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });
        }

        // Initialize PureCounter
        if (typeof PureCounter !== 'undefined') {
            new PureCounter();
        }

        // Animate progress bars on scroll
        const progressBars = document.querySelectorAll('.progress-bar');
        const animateProgressBars = () => {
            progressBars.forEach(bar => {
                const value = bar.getAttribute('aria-valuenow');
                bar.style.width = value + '%';
            });
        };

        // Use Intersection Observer to trigger animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateProgressBars();
                }
            });
        }, { threshold: 0.3 });

        const skillsSection = document.querySelector('.skills');
        if (skillsSection) {
            observer.observe(skillsSection);
        }
    });

</script>
@include('layouts.guest.css')

{{-- Bootstrap CSS --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

{{-- AOS Animation Library --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

{{-- Custom Main CSS --}}
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

@endsection
