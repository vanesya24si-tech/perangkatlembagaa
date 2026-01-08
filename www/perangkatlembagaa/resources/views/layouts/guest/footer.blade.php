<footer class="super-footer">
  <div class="footer-glow"></div>

  <div class="container position-relative">
    <div class="row gy-5 align-items-center">

      <!-- PROFILE -->
      <div class="col-md-4 text-center text-md-start" data-aos="fade-right">
        <div class="footer-profile">
          <img src="{{ asset('assets/img/nesa.png') }}" alt="Profile">
          <h5 class="mt-3 mb-1">Vanesya Wilyan</h5>
          <p class="profile-desc">Mahasiswa Sistem Informasi</p>
        </div>
      </div>

      <!-- BIODATA -->
      <div class="col-md-4 text-center" data-aos="zoom-in">
        <h4 class="footer-title">Let’s Connect & Grow 🌱</h4>
        <p class="footer-desc bio-text">
          Lahir di <strong>Duri</strong>, 5 Agustus 2006 <br>
          Mahasiswa <strong>Politeknik Caltex Riau</strong> <br>
          Sistem Informasi • Angkatan <strong>G24</strong> • Kelas <strong>2 SI C</strong>
        </p>
      </div>

      <!-- SOCIAL -->
      <div class="col-md-4 text-center text-md-end" data-aos="fade-left">
        <div class="footer-social">
          <a href="https://instagram.com/nesyawlyz" target="_blank">
            <i class="fa-brands fa-instagram"></i>
          </a>
          <a href="#">
            <i class="fa-brands fa-linkedin-in"></i>
          </a>
          <a href="https://wa.me/6281249165454" target="_blank">
            <i class="fa-brands fa-whatsapp"></i>
          </a>
        </div>
      </div>

    </div>

    <hr class="footer-line">

    <div class="footer-bottom text-center">
      © {{ date('Y') }} <strong>Vanesya Wilyan</strong>
    </div>
  </div>
</footer>
<style>
/* ===== SUPER FOOTER ===== */
.super-footer {
  position: relative;
  background: linear-gradient(135deg, #0d1b2a, #1b263b);
  color: #fff;
  padding: 80px 0 30px;
  overflow: hidden;
}

/* Glow Effect */
.footer-glow {
  position: absolute;
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(13,110,253,0.35), transparent 70%);
  top: -150px;
  right: -150px;
  filter: blur(60px);
}

/* Profile */
.footer-profile img {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  border: 4px solid #0d6efd;
  box-shadow: 0 0 25px rgba(13,110,253,0.6);
  transition: transform 0.4s ease;
}

.footer-profile img:hover {
  transform: scale(1.08) rotate(2deg);
}

.footer-profile h5 {
  font-weight: 600;
}

.profile-desc {
  font-size: 14px;
  color: #cfd9ff;
}

/* Biodata */
.footer-title {
  font-weight: 700;
  letter-spacing: 1px;
}

.footer-desc {
  font-size: 14px;
  line-height: 1.8;
}

.bio-text {
  color: #1e6bff;
}

.bio-text strong {
  color: #0d6efd;
  font-weight: 600;
}

/* Social */
.footer-social a {
  display: inline-flex;
  width: 52px;
  height: 52px;
  align-items: center;
  justify-content: center;
  margin-left: 10px;
  border-radius: 50%;
  background: rgba(255,255,255,0.08);
  color: #fff;
  font-size: 22px;
  transition: all 0.4s ease;
}

.footer-social a:hover {
  background: #0d6efd;
  box-shadow: 0 0 20px rgba(13,110,253,0.9);
  transform: translateY(-6px) scale(1.1);
}

/* Bottom */
.footer-line {
  border-color: rgba(255,255,255,0.15);
  margin: 40px 0 20px;
}

.footer-bottom {
  font-size: 13px;
  color: #bfc9ff;
}

/* Responsive */
@media (max-width: 768px) {
  .footer-social a {
    margin: 0 6px;
  }
}
</style>