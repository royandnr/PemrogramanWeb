<?php
$page_title       = 'Tentang Kami — Yann Trip Malang';
$page_description = 'Profil Yann Trip Malang, tim pemandu lokal, dan nilai-nilai yang kami pegang dalam setiap perjalanan.';
$current_page     = 'tentang';

include 'includes/header.php';
?>

  <!-- ===================== HEADER HALAMAN ===================== -->
  <header class="header-halaman header-foto header-foto-tentang">
    <div class="container container-sempit">
      <p class="eyebrow">Tentang Kami</p>
      <h1>Dibuat oleh orang-orang yang besar di kaki gunung ini</h1>
      <p class="mt-3" style="max-width:55ch; color: rgba(243,238,226,0.8);">Yann Trip Malang berdiri sejak 2019, dimulai dari sekelompok pemandu lokal yang ingin membagikan tempat favorit mereka dengan cara yang aman dan wajar harganya.</p>
    </div>
  </header>

  <!-- ===================== CERITA ===================== -->
  <section>
    <div class="container container-sempit">
      <div class="row g-5 align-items-start">
        <div class="col-lg-6">
          <p class="eyebrow">Cerita kami</p>
          <h2 class="section-judul">Dari rombongan kecil jadi ratusan trip per tahun</h2>
          <p class="mt-3 section-intro">Semua bermula dari lima pemandu yang bosan melihat wisatawan ditipu jip liar dan harga simpang siur di kaki Bromo. Kami mulai membuka trip untuk teman-teman kuliah, lalu perlahan berkembang jadi layanan reguler ke Bromo, Ijen, dan pelosok Malang Raya.</p>
          <p class="section-intro">Hari ini tim kami terdiri dari pemandu, sopir, dan tim logistik yang semuanya berasal dari desa-desa sekitar jalur trip — supaya manfaat perjalanan ini juga kembali ke komunitas lokal.</p>
        </div>
        <div class="col-lg-6">
          <div class="row g-4">
            <div class="col-6">
              <div class="kartu-nilai">
                <h3 style="font-size:1.8rem; font-family: var(--font-judul);">2019</h3>
                <p class="mb-0 mt-1" style="font-size:0.85rem; color: rgba(34,38,31,0.65);">Trip pertama kami ke Bromo</p>
              </div>
            </div>
            <div class="col-6">
              <div class="kartu-nilai">
                <h3 style="font-size:1.8rem; font-family: var(--font-judul);">120+</h3>
                <p class="mb-0 mt-1" style="font-size:0.85rem; color: rgba(34,38,31,0.65);">Trip terlaksana tiap tahun</p>
              </div>
            </div>
            <div class="col-6">
              <div class="kartu-nilai">
                <h3 style="font-size:1.8rem; font-family: var(--font-judul);">18</h3>
                <p class="mb-0 mt-1" style="font-size:0.85rem; color: rgba(34,38,31,0.65);">Pemandu &amp; kru lokal</p>
              </div>
            </div>
            <div class="col-6">
              <div class="kartu-nilai">
                <h3 style="font-size:1.8rem; font-family: var(--font-judul);">8</h3>
                <p class="mb-0 mt-1" style="font-size:0.85rem; color: rgba(34,38,31,0.65);">Rute reguler yang kami jalankan</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <hr class="garis-pembatas container-sempit">

  <!-- ===================== NILAI KAMI ===================== -->
  <section>
    <div class="container container-sempit">
      <p class="eyebrow">Yang kami pegang</p>
      <h2 class="section-judul mb-4">Prinsip di setiap perjalanan</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="kartu-trip">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#B4842E" stroke-width="1.8" style="margin-bottom:0.6rem;"><path d="M12 2 4 5v6c0 5 3.4 8.4 8 10 4.6-1.6 8-5 8-10V5l-8-3z"/></svg>
            <span class="nomor">01</span>
            <h3 style="font-size:1.2rem;">Keselamatan dulu</h3>
            <p>Setiap kendaraan dicek sebelum berangkat, dan setiap pemandu terlatih menangani situasi darurat di jalur pegunungan.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="kartu-trip">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#B4842E" stroke-width="1.8" style="margin-bottom:0.6rem;"><path d="M20 12 12 20 4 12V4h8l8 8Z"/><circle cx="8.5" cy="8.5" r="1.5" fill="#B4842E" stroke="none"/></svg>
            <span class="nomor">02</span>
            <h3 style="font-size:1.2rem;">Harga wajar</h3>
            <p>Kami tidak menaikkan harga saat musim ramai. Peserta lama dan baru membayar dengan tarif yang sama.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="kartu-trip">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#B4842E" stroke-width="1.8" style="margin-bottom:0.6rem;"><path d="M12 22s8-4.5 8-11.5S16 2 12 2 4 3.5 4 10.5 12 22 12 22Z"/><path d="M12 8v7M9 12l3 3 3-3"/></svg>
            <span class="nomor">03</span>
            <h3 style="font-size:1.2rem;">Ramah lingkungan</h3>
            <p>Setiap rombongan membawa kembali sampahnya sendiri, dan kami membatasi jumlah peserta agar jalur tetap terjaga.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== CTA ===================== -->
  <section class="cta-strip py-5">
    <div class="container container-sempit d-flex flex-wrap justify-content-between align-items-center gap-3">
      <h2 class="mb-0" style="font-size:1.6rem;">Ingin ikut trip berikutnya?</h2>
      <a href="paket.php" class="btn-otm">Lihat Paket Trip</a>
    </div>
  </section>

<?php include 'includes/footer.php'; ?>
