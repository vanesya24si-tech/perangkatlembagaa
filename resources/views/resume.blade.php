@extends('layouts.guest.app')

@section('title', 'Perangkat Desa Rumbai')


@push('layouts.css')


@endpush

@section('content')
<main class="main about-page">

  <!-- ======= Perangkat Desa Section ======= -->
  <section id="perangkat-desa" class="perangkat-desa section py-5">
    <div class="container" data-aos="fade-up">

      <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Struktur Organisasi & Perangkat Desa</h2>
        <p class="text-muted">Kelurahan Rumbai, Kota Pekanbaru</p>
      </div>

      <div class="org-chart-container">

        <!-- Level 1: Kepala Desa -->
        <div class="org-level" id="level-kades">
          <div class="org-node">
            <div class="perangkat-card shadow-sm">
              <img src="https://randomuser.me/api/portraits/men/11.jpg" alt="Kepala Desa" class="perangkat-img">
              <h5 class="nama">H. Budi Santoso, S.Sos.</h5>
              <p class="jabatan">KEPALA DESA</p>
              <hr>
              <div class="detail">
                <p><strong>NIP:</strong> 197501012005011001</p>
                <p><strong>Kontak:</strong> 0812-xxxx-xxxx</p>
                <p><strong>Periode:</strong> 2020 - 2026</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Garis Penghubung -->
        <div class="connector-line-v"></div>

        <!-- Level 2: Sekretaris Desa -->
        <div class="org-level" id="level-sekdes">
          <div class="org-node">
            <div class="perangkat-card shadow-sm">
              <img src="https://randomuser.me/api/portraits/women/11.jpg" alt="Sekretaris Desa" class="perangkat-img">
              <h5 class="nama">Vanesya Wilyan, S.E.</h5>
              <p class="jabatan">SEKRETARIS DESA</p>
              <hr>
              <div class="detail">
                <p><strong>NIP:</strong> 198203152008012002</p>
                <p><strong>Kontak:</strong> 0813-xxxx-xxxx</p>
                <p><strong>Periode:</strong> 2019 - Sekarang</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Garis Penghubung -->
        <div class="connector-line-v"></div>
        <div class="connector-line-h"></div>
        <div class="connector-line-v-group">
          <div class="connector-line-v-short"></div>
          <div class="connector-line-v-short"></div>
          <div class="connector-line-v-short"></div>
        </div>

        <!-- Level 3: Kaur (Kepala Urusan) -->
        <div class="org-level" id="level-kaur">
          <div class="org-node">
            <div class="perangkat-card shadow-sm">
              <img src="https://randomuser.me/api/portraits/men/12.jpg" alt="Kaur Pemerintahan" class="perangkat-img">
              <h5 class="nama">Thariq Alfayyadh</h5>
              <p class="jabatan">KAUR PEMERINTAHAN</p>
              <div class="detail">
                <p><strong>NIP:</strong> 1985... | <strong>Kontak:</strong> 0812...</p>
              </div>
            </div>
          </div>
          <div class="org-node">
            <div class="perangkat-card shadow-sm">
              <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="Kaur Kesejahteraan" class="perangkat-img">
              <h5 class="nama">Aliyah Rahma</h5>
              <p class="jabatan">KAUR KESEJAHTERAAN</p>
              <div class="detail">
                <p><strong>NIP:</strong> 1988... | <strong>Kontak:</strong> 0813...</p>
              </div>
            </div>
          </div>
          <div class="org-node">
            <div class="perangkat-card shadow-sm">
              <img src="https://randomuser.me/api/portraits/men/14.jpg" alt="Kaur Pelayanan" class="perangkat-img">
              <h5 class="nama">Syabil Aljabbar</h5>
              <p class="jabatan">KAUR PELAYANAN</p>
              <div class="detail">
                <p><strong>NIP:</strong> 1990... | <strong>Kontak:</strong> 0821...</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Garis Penghubung -->
        <div class="connector-line-v"></div>
        <div class="connector-line-h"></div>
        <div class="connector-line-v-group">
          <div class="connector-line-v-short"></div>
          <div class="connector-line-v-short"></div>
        </div>

        <!-- Level 4: Kepala Dusun -->
        <div class="org-level" id="level-kadus">
          <div class="org-node">
            <div class="perangkat-card shadow-sm">
              <img src="https://randomuser.me/api/portraits/men/15.jpg" alt="Kepala Dusun 1" class="perangkat-img">
              <h5 class="nama">Dedi Kurniawan</h5>
              <p class="jabatan">KEPALA DUSUN I</p>
              <div class="detail">
                <p><strong>Wilayah:</strong> RW 01 - RW 05</p>
              </div>
            </div>
          </div>
          <div class="org-node">
            <div class="perangkat-card shadow-sm">
              <img src="https://randomuser.me/api/portraits/men/16.jpg" alt="Kepala Dusun 2" class="perangkat-img">
              <h5 class="nama">M. Yusuf</h5>
              <p class="jabatan">KEPALA DUSUN II</p>
              <div class="detail">
                <p><strong>Wilayah:</strong> RW 06 - RW 10</p>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- .org-chart-container -->

    </div>
  </section><!-- End Perangkat Desa Section -->

</main>
@endsection
