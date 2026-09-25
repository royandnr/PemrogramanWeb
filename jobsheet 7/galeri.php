<?php
$page_title       = 'Galeri — Yann Trip Malang';
$page_description = 'Galeri ilustrasi destinasi trip Yann Trip Malang: Bromo, Ijen, Coban Rondo, Semeru, dan lainnya.';
$current_page     = 'galeri';

include 'includes/header.php';
?>

  <!-- ===================== HEADER HALAMAN ===================== -->
  <header class="header-halaman header-foto header-foto-galeri">
    <div class="container container-sempit">
      <p class="eyebrow">Galeri</p>
      <h1>Sekilas suasana tiap rute</h1>
      <p class="mt-3" style="max-width:55ch; color: rgba(243,238,226,0.8);">Ilustrasi suasana dari beberapa titik favorit peserta trip kami.</p>
    </div>
  </header>

  <!-- ===================== GRID GALERI ===================== -->
  <section>
    <div class="container container-sempit">
      <div class="row g-3 g-md-4 grid-galeri-hp">
        <div class="col-md-6 col-lg-4">
          <div class="galeri-item">
            <img src="https://commons.wikimedia.org/wiki/Special:FilePath/Bromo%20Tengger%20Semeru%20National%20Park%20Java%20489.jpg?width=800" alt="Pemandangan Gunung Bromo, Jawa Timur" loading="lazy" style="width:100%; height:100%; object-fit:cover;">
            <div class="caption">Bromo &middot; kaldera dan lautan pasir</div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="galeri-item">
            <img src="https://commons.wikimedia.org/wiki/Special:FilePath/Danau%20Belerang%20Ijen.jpg?width=800" alt="Danau kawah Ijen, Banyuwangi" loading="lazy" style="width:100%; height:100%; object-fit:cover;">
            <div class="caption">Kawah Ijen &middot; danau belerang terbesar di dunia</div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="galeri-item">
            <svg viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
              <defs><linearGradient id="g3" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#1F2E23"/><stop offset="100%" stop-color="#2C4433"/>
              </linearGradient></defs>
              <rect width="400" height="300" fill="url(#g3)"/>
              <rect x="185" y="40" width="18" height="260" fill="#EAE3D2" opacity="0.75"/>
              <polygon points="130,300 200,40 270,300" fill="#16221A" opacity="0.4"/>
            </svg>
            <div class="caption">Coban Rondo &middot; air terjun Kota Batu</div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="galeri-item">
            <svg viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
              <defs><linearGradient id="g4" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#0E1A22"/><stop offset="100%" stop-color="#5C7A82"/>
              </linearGradient></defs>
              <rect width="400" height="300" fill="url(#g4)"/>
              <ellipse cx="200" cy="230" rx="150" ry="30" fill="#3B4C42" opacity="0.6"/>
              <polygon points="60,300 200,80 340,300" fill="#16221A"/>
            </svg>
            <div class="caption">Ranu Kumbolo &middot; basecamp Semeru</div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="galeri-item">
            <svg viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
              <defs><linearGradient id="g5" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0%" stop-color="#D9A441"/><stop offset="100%" stop-color="#B4842E"/>
              </linearGradient></defs>
              <rect width="400" height="300" fill="url(#g5)"/>
              <rect x="0" y="210" width="400" height="90" fill="#22261F" opacity="0.75"/>
              <rect x="40" y="150" width="30" height="60" fill="#F3EEE2" opacity="0.85"/>
              <rect x="90" y="130" width="30" height="80" fill="#F3EEE2" opacity="0.7"/>
              <rect x="140" y="160" width="30" height="50" fill="#F3EEE2" opacity="0.9"/>
            </svg>
            <div class="caption">Kayutangan Heritage &middot; Kota Malang</div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="galeri-item">
            <svg viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
              <defs><linearGradient id="g6" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#0E2A33"/><stop offset="100%" stop-color="#5C7A82"/>
              </linearGradient></defs>
              <rect width="400" height="300" fill="url(#g6)"/>
              <rect x="0" y="230" width="400" height="70" fill="#EAE3D2"/>
              <path d="M0,230 Q100,210 200,230 T400,230 V300 H0 Z" fill="#2C4433" opacity="0.6"/>
            </svg>
            <div class="caption">Pantai Balekambang &middot; Malang Selatan</div>
          </div>
        </div>

      </div>
      <p class="mt-4 mb-0" style="font-size:0.78rem; color: rgba(34,38,31,0.5);">Foto Bromo &amp; Ijen: Wikimedia Commons (lisensi bebas). Ilustrasi lainnya: karya sendiri.</p>
    </div>
  </section>

<?php include 'includes/footer.php'; ?>
