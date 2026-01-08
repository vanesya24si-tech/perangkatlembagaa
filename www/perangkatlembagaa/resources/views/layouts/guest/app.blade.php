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

  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .header-spacer {
      height: 75px;
    }

    @media (max-width: 768px) {
      .header-spacer {
        height: 65px;
      }
    }

    /* ===== BACKGROUND SLIDESHOW (LOGIN & REGISTER ONLY) ===== */
    #bg-slideshow {
      position: fixed;
      inset: 0;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      transition: opacity 1s ease-in-out;
      filter: brightness(60%);
      z-index: 0;
    }

    header, main, footer {
      position: relative;
      z-index: 2;
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

  {{-- BACKGROUND SLIDESHOW (KHUSUS LOGIN & REGISTER) --}}
  @if (Route::is('login') || Route::is('register'))
    <div id="bg-slideshow"></div>
  @endif

  {{-- Header --}}
  @include('layouts.guest.header')

  {{-- Spacer --}}
  <div class="header-spacer"></div>

  {{-- Main Content --}}
  <main id="main">
    @yield('content')
  </main>



  {{-- Floating WhatsApp --}}
  <a href="https://wa.me/6281234567890" class="whatsapp-float" target="_blank">
    <i class="bi bi-whatsapp"></i>
  </a>

  {{-- JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init();</script>

  {{-- BACKGROUND SLIDESHOW SCRIPT --}}
  @if (Route::is('login') || Route::is('register'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const bg = document.getElementById('bg-slideshow');
      if (!bg) return;

      const images = [
        "https://images.unsplash.com/photo-1596495577886-d920f1fb7238",
        "https://images.unsplash.com/photo-1520975916090-3105956dac38",
        "https://images.unsplash.com/photo-1509099836639-18ba1795216d",
        "https://images.unsplash.com/photo-1588072432836-e10032774350"
      ];

      let i = 0;

      function slideBg() {
        bg.style.opacity = 0;
        setTimeout(() => {
          bg.style.backgroundImage = `url('${images[i]}')`;
          bg.style.opacity = 1;
          i = (i + 1) % images.length;
        }, 800);
      }

      slideBg();
      setInterval(slideBg, 6000);
    });
  </script>
  @endif

</body>
</html>
