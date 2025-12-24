<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'LPM')</title>

  {{-- Favicon --}}
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" />

  {{-- Bootstrap CSS --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  {{-- Bootstrap Icons --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

  {{-- AOS Animation --}}
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

  {{-- Custom CSS --}}
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />

  {{-- Tambahan CSS --}}
  @stack('layouts.guest.css')

  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    .header-spacer {
      height: 75px;
    }

    @media (max-width: 768px) {
      .header-spacer {
        height: 65px;
      }
    }

    /* Floating WhatsApp */
    .whatsapp-float {
      position: fixed;
      bottom: 25px;
      right: 25px;
      width: 60px;
      height: 60px;
      background-color: #25D366;
      color: white;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 32px;
      box-shadow: 2px 2px 10px rgba(0,0,0,0.3);
      z-index: 1200;
      transition: transform 0.2s ease-in-out, background-color 0.3s;
    }

    .whatsapp-float:hover {
      background-color: #20ba5a;
      transform: scale(1.1);
      color: white;
    }

    /* ===== FOOTER ===== */
    .footer {
      background-color: #f8f9fa;
      padding: 40px 0 20px;
      border-top: 1px solid #e4e4e4;
    }

    .footer-photo {
      width: 110px;
      height: 110px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid #0d6efd;
    }

    .footer-social a {
      font-size: 24px;
      color: #0d6efd;
      transition: 0.3s;
    }

    .footer-social a:hover {
      color: #0a58ca;
      transform: translateY(-3px);
    }
  </style>
</head>

<body>

  {{-- Header --}}
  @include('layouts.guest.header')

  {{-- Spacer --}}
  <div class="header-spacer"></div>

  {{-- Main Content --}}
  <main id="main">
    @yield('content')
  </main>
   {{-- FOOTER --}}
<footer class="footer mt-5">
  <div class="container">
    <div class="row gy-4 align-items-center">

      <!-- Profil -->
      <div class="col-md-4 text-center text-md-start">
        <div class="d-flex align-items-center gap-3 justify-content-center justify-content-md-start">
          <img src="{{ asset('assets/img/nesa.png') }}" class="footer-photo">
          <div>
            <h6 class="mb-0 fw-semibold">Vanesya Wilyan</h6>
            <small class="text-muted">Mahasiswa Sistem Informasi</small>
          </div>
        </div>
      </div>

      <!-- Deskripsi -->
      <div class="col-md-4 text-center">
        <p class="mb-1 fw-semibold">Kontak & Media Sosial</p>
        <small class="text-muted">
          Terhubung untuk kolaborasi, diskusi, dan pengembangan diri
        </small>
      </div>

      <!-- Sosial Media -->
      <div class="col-md-4 text-center text-md-end">
        <div class="footer-social d-flex justify-content-center justify-content-md-end gap-3">
          <a href="https://instagram.com/nesyawlyz" target="_blank" aria-label="Instagram">
            <i class="fa-brands fa-instagram"></i>
          </a>
          <a href="https://www.linkedin.com/in/USERNAME_LINKEDIN_KAMU" target="_blank" aria-label="LinkedIn">
            <i class="fa-brands fa-linkedin"></i>
          </a>
          <a href="https://wa.me/628XXXXXXXXXX" target="_blank" aria-label="WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
          </a>
        </div>
      </div>

    </div>

    <hr class="my-4">

    <div class="text-center small text-muted">
      © {{ date('Y') }} Vanesya Wilyan • All Rights Reserved
    </div>
  </div>
</footer>


  {{-- Floating WhatsApp --}}
  <a href="https://wa.me/6281234567890" class="whatsapp-float" target="_blank">
    <i class="bi bi-whatsapp"></i>
  </a>

  {{-- JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init();</script>

  @stack('scripts')

</body>
</html>
