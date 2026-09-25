<?php
$page_title       = 'Yann Trip Malang — Jelajah Bromo, Ijen & Sekitar Malang';
$page_description = 'Yann Trip Malang menyediakan trip terbuka ke Bromo, Kawah Ijen, Coban Rondo, dan destinasi lain di sekitar Malang dengan pemandu berpengalaman.';
$og_title         = 'Yann Trip Malang — Jelajah Bromo, Ijen & Sekitar Malang';
$og_description   = 'Trip terbuka ke Bromo, Kawah Ijen, dan pelosok Malang Raya. Harga transparan, pemandu lokal, grup kecil.';
$og_image         = 'https://commons.wikimedia.org/wiki/Special:FilePath/Bromo%20sunrise%20May2014.jpg?width=1200';
$current_page     = 'index';

include 'includes/header.php';
?>

  <!-- ===================== HERO ===================== -->
  <header class="hero hero-foto">
    <div class="container container-sempit" style="padding-bottom: 4rem;">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <p class="baris-kecil">Yann Trip &amp; Private Trip — Malang, Jawa Timur</p>
          <h1 class="kotak-judul">Lihat matahari terbit dari atap Jawa Timur.</h1>
          <div class="kotak-teks mt-3">
            <p class="lead mb-0">Kami mengatur trip terbuka ke Bromo, Kawah Ijen, dan pelosok Malang Raya — kamu tinggal datang, sisanya biar kami yang urus: transportasi, penginapan, dan pemandu lokal.</p>
          </div>
          <div class="mt-4 d-flex gap-3 flex-wrap">
            <a href="paket.php" class="btn-otm">Lihat Semua Paket</a>
            <a href="https://wa.me/628979158187?text=Halo%20Yann%20Trip%20Malang%2C%20saya%20ingin%20tanya-tanya%20soal%20trip." target="_blank" rel="noopener" class="btn-otm-outline" style="color:#F3EEE2 !important; border-color: rgba(243,238,226,0.6); background: rgba(15,22,17,0.5);">Tanya via WhatsApp</a>
          </div>
          <div class="hero-stats">
            <div>
              <span class="angka">120+</span>
              <span class="label">Trip terlaksana</span>
            </div>
            <div>
              <span class="angka">4.9</span>
              <span class="label">Rating peserta</span>
            </div>
            <div>
              <span class="angka">8</span>
              <span class="label">Rute reguler</span>
            </div>
          </div>
        </div>
      </div>
      <p class="mt-4 mb-0" style="font-size:0.78rem; color: rgba(243,238,226,0.55);">Foto: Gunung Bromo saat sunrise &middot; Wikimedia Commons</p>
    </div>
  </header>

  <!-- ===================== KENAPA IKUT TRIP INI ===================== -->
  <section>
    <div class="container container-sempit">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="kartu-nilai">
            <h3 style="font-size:1.15rem;">Pemandu lokal asli</h3>
            <p class="mt-2 mb-0" style="color: rgba(34,38,31,0.7); font-size:0.92rem;">Tim kami tumbuh besar di kaki Bromo dan Ijen — tahu jalur aman, waktu terbaik, dan cerita di balik setiap tempat.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="kartu-nilai">
            <h3 style="font-size:1.15rem;">Harga transparan</h3>
            <p class="mt-2 mb-0" style="color: rgba(34,38,31,0.7); font-size:0.92rem;">Tidak ada biaya tersembunyi. Semua yang termasuk dan tidak termasuk dijelaskan di awal, sebelum kamu booking.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="kartu-nilai">
            <h3 style="font-size:1.15rem;">Grup kecil, jadwal fleksibel</h3>
            <p class="mt-2 mb-0" style="color: rgba(34,38,31,0.7); font-size:0.92rem;">Maksimal 15 peserta per keberangkatan supaya perjalanan tetap nyaman dan personal.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <hr class="garis-pembatas container-sempit">

  <!-- ===================== PREVIEW PAKET TRIP ===================== -->
  <section>
    <div class="container container-sempit">
      <div class="row align-items-end mb-4">
        <div class="col-lg-8">
          <p class="eyebrow">Rute pilihan</p>
          <h2 class="section-judul">Trip yang paling banyak diminati bulan ini</h2>
        </div>
        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
          <a href="paket.php" class="btn-otm-outline">Lihat semua paket &rarr;</a>
        </div>
      </div>

      <div class="row g-4 geser-aktif-hp">
        <div class="col-md-4">
          <div class="kartu-trip">
            <span class="nomor">01</span>
            <h3>Bromo Sunrise Trip</h3>
            <p class="lokasi">Probolinggo &middot; 2 Hari 1 Malam</p>
            <p>Berangkat tengah malam menuju Penanjakan, saksikan matahari terbit, lalu turun ke lautan pasir dan Kawah Bromo.</p>
            <div class="harga-baris">
              <span class="harga">Rp450rb</span>
              <span class="satuan">/ orang</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="kartu-trip">
            <span class="nomor">02</span>
            <h3>Kawah Ijen Blue Fire</h3>
            <p class="lokasi">Banyuwangi &middot; 2 Hari 1 Malam</p>
            <p>Mendaki dini hari untuk menyaksikan fenomena api biru yang hanya ada di dua tempat di dunia.</p>
            <div class="harga-baris">
              <span class="harga">Rp550rb</span>
              <span class="satuan">/ orang</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="kartu-trip">
            <span class="nomor">03</span>
            <h3>Coban Rondo &amp; Batu</h3>
            <p class="lokasi">Malang &middot; 1 Hari</p>
            <p>Trip santai seputar Kota Batu: air terjun, kebun petik apel, dan berhenti di beberapa spot foto favorit.</p>
            <div class="harga-baris">
              <span class="harga">Rp200rb</span>
              <span class="satuan">/ orang</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== TESTIMONI ===================== -->
  <section class="blok-testimoni">
    <div class="container container-sempit">
      <p class="eyebrow" style="color:#D9A441;">Kata mereka</p>
      <h2 class="mb-5" style="color:#F3EEE2; max-width: 20ch;">Cerita dari peserta trip sebelumnya</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="kartu-testimoni">
            <p>"Pemandunya sabar banget nungguin yang jalannya pelan pas naik ke Penanjakan. View sunrise-nya bikin nangis."</p>
            <div class="baris-nama">
              <div class="avatar-inisial">DA</div>
              <div>
                <p class="nama mb-0">Dinda Ayu</p>
                <p class="asal mb-0">Trip Bromo Sunrise, Agustus 2026</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="kartu-testimoni">
            <p>"Jadwal jelas dari awal, nggak ada biaya dadakan. Rombongan kecil jadi nggak berasa rame-rame kayak rombongan bus."</p>
            <div class="baris-nama">
              <div class="avatar-inisial">RF</div>
              <div>
                <p class="nama mb-0">Rizky Firmansyah</p>
                <p class="asal mb-0">Trip Kawah Ijen, Juli 2026</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="kartu-testimoni">
            <p>"Cocok buat trip kampus. Panitia YannTrip.Malang bantu urus izin dan konsumsi rombongan kami."</p>
            <div class="baris-nama">
              <div class="avatar-inisial">KK</div>
              <div>
                <p class="nama mb-0">Kelompok KKN Undip</p>
                <p class="asal mb-0">Trip Coban Rondo &amp; Batu, Juni 2026</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== CTA ===================== -->
  <section class="cta-strip py-5">
    <div class="container container-sempit d-flex flex-wrap justify-content-between align-items-center gap-3">
      <h2 class="mb-0" style="font-size:1.6rem;">Sudah siap untuk trip berikutnya?</h2>
      <a href="kontak.php" class="btn-otm">Hubungi Kami</a>
    </div>
  </section>

  <!-- ===================== INSTAGRAM ===================== -->
  <section class="pt-0">
    <div class="container container-sempit">
      <div class="row align-items-end mb-4">
        <div class="col-lg-8">
          <p class="eyebrow">Ikuti Kami</p>
          <h2 class="section-judul">Cerita trip terbaru ada di Instagram</h2>
        </div>
        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
          <a href="https://instagram.com/yanntripmalang" target="_blank" rel="noopener" class="btn-otm-outline">@yanntripmalang &rarr;</a>
        </div>
      </div>
      <div class="grid-instagram">
        <div class="ig-item"><img src="https://commons.wikimedia.org/wiki/Special:FilePath/Bromo%20sunrise%20May2014.jpg?width=400" alt="Sunrise Bromo" loading="lazy"></div>
        <div class="ig-item"><img src="https://commons.wikimedia.org/wiki/Special:FilePath/Bromo%20Tengger%20Semeru%20National%20Park%20Java%20489.jpg?width=400" alt="Lautan pasir Bromo" loading="lazy"></div>
        <div class="ig-item"><img src="https://commons.wikimedia.org/wiki/Special:FilePath/Danau%20Belerang%20Ijen.jpg?width=400" alt="Danau kawah Ijen" loading="lazy"></div>
        <div class="ig-item"><img src="https://commons.wikimedia.org/wiki/Special:FilePath/Kawah-Ijen%20Indonesia%20The-sulfur-mine-at-the-floor-of-the-crater-01.jpg?width=400" alt="Pertambangan belerang Ijen" loading="lazy"></div>
      </div>
      <p class="mt-3 mb-0" style="font-size:0.78rem; color: rgba(34,38,31,0.5);">Foto: Wikimedia Commons (lisensi bebas), dipasang sementara — ganti dengan hasil dokumentasi trip kamu sendiri.</p>
    </div>
  </section>

<?php include 'includes/footer.php'; ?>
