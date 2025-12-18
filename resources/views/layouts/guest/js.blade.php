{{-- JS includes --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  // Inisialisasi AOS (jika menggunakan)
  document.addEventListener('DOMContentLoaded', function () {
    if (window.AOS) {
      AOS.init();
    }
  });
</script>

{{-- Main JS (pastikan file ada di public/assets/js/main.js) --}}
<script src="{{ asset('assets/js/main.js') }}"></script>
