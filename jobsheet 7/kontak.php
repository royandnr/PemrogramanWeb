<?php
$page_title       = 'Kontak — Yann Trip Malang';
$page_description = 'Hubungi Yann Trip Malang untuk booking paket trip Bromo, Ijen, dan destinasi lainnya.';
$current_page     = 'kontak';

include 'includes/header.php';
?>

  <!-- ===================== HEADER HALAMAN ===================== -->
  <header class="header-halaman header-foto header-foto-kontak">
    <div class="container container-sempit">
      <p class="eyebrow">Kontak</p>
      <h1>Yuk atur trip kamu</h1>
      <p class="mt-3" style="max-width:55ch; color: rgba(243,238,226,0.8);">Isi form di bawah atau hubungi kami langsung lewat WhatsApp. Tim kami biasanya membalas dalam 1&ndash;2 jam.</p>
    </div>
  </header>

  <!-- ===================== FORM & INFO ===================== -->
  <section>
    <div class="container container-sempit">
      <div class="row g-5">

        <div class="col-lg-7">
          <div class="kotak-kontak">
            <h2 class="mb-4" style="font-size:1.5rem;">Form Booking</h2>
            <form id="form-kontak" novalidate>
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="label-otm" for="nama">Nama Lengkap</label>
                  <input type="text" class="form-control form-control-otm" id="nama" required>
                </div>
                <div class="col-md-6">
                  <label class="label-otm" for="whatsapp">Nomor WhatsApp</label>
                  <input type="tel" class="form-control form-control-otm" id="whatsapp" required>
                </div>
                <div class="col-md-6">
                  <label class="label-otm" for="paket">Paket yang Diminati</label>
                  <select class="form-control form-control-otm" id="paket">
                    <option>Bromo Sunrise Trip</option>
                    <option>Kawah Ijen Blue Fire</option>
                    <option>Coban Rondo &amp; Batu</option>
                    <option>Semeru Basecamp Trip</option>
                    <option>Malang City &amp; Heritage Tour</option>
                    <option>Lainnya / private trip</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="label-otm" for="jumlah">Jumlah Peserta</label>
                  <input type="number" min="1" class="form-control form-control-otm" id="jumlah" value="2">
                </div>
                <div class="col-12">
                  <label class="label-otm" for="pesan">Catatan Tambahan</label>
                  <textarea class="form-control form-control-otm" id="pesan" rows="4" placeholder="Tanggal yang diinginkan, titik jemput, dll."></textarea>
                </div>
              </div>
              <button type="submit" class="btn-otm mt-4">Kirim Permintaan</button>
              <p id="pesan-status" class="mt-3"></p>
            </form>
          </div>
        </div>

        <div class="col-lg-5">
          <p class="eyebrow">Info Kontak</p>
          <h2 class="mb-4" style="font-size:1.5rem;">Cara lain menghubungi kami</h2>

          <div class="mb-4">
            <p class="mb-1" style="color: var(--kabut); font-size:0.85rem;">WhatsApp</p>
            <p style="font-size:1.05rem;"><a href="https://wa.me/628979158187" target="_blank" rel="noopener">0897-9158-187</a></p>
          </div>
          <div class="mb-4">
            <p class="mb-1" style="color: var(--kabut); font-size:0.85rem;">Email</p>
            <p style="font-size:1.05rem;">halo@yanntripmalang.id</p>
          </div>
          <div class="mb-4">
            <p class="mb-1" style="color: var(--kabut); font-size:0.85rem;">Kantor</p>
            <p style="font-size:1.05rem;">Jl. Ijen No. 21, Malang, Jawa Timur</p>
          </div>
          <div class="mb-4">
            <p class="mb-1" style="color: var(--kabut); font-size:0.85rem;">Jam Operasional</p>
            <p style="font-size:1.05rem;">Setiap hari, 08.00&ndash;20.00 WIB</p>
          </div>

          <hr class="garis-pembatas my-4">

          <p class="mb-1" style="color: var(--kabut); font-size:0.85rem;">Pertanyaan umum</p>
          <p style="font-size:0.92rem; color: rgba(34,38,31,0.75);">DP booking sebesar 30% dan bisa dibayar lewat transfer bank atau QRIS. Pelunasan dilakukan H-1 sebelum keberangkatan.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ===================== CHECKLIST BARANG BAWAAN ===================== -->
  <section class="pt-0">
    <div class="container container-sempit">
      <div class="kotak-checklist">
        <p class="eyebrow mb-2">Persiapan Trip</p>
        <h3 style="font-size:1.2rem;">Barang yang wajib dibawa</h3>
        <ul>
          <li>Jaket tebal / windbreaker</li>
          <li>Sepatu tertutup, nyaman jalan jauh</li>
          <li>Masker &amp; sarung tangan (untuk trip Bromo/Ijen)</li>
          <li>Obat-obatan pribadi</li>
          <li>Powerbank &amp; charger</li>
          <li>Uang tunai secukupnya</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ===================== FAQ ===================== -->
  <section class="pt-0">
    <div class="container container-sempit">
      <p class="eyebrow">FAQ</p>
      <h2 class="section-judul mb-4">Pertanyaan yang sering ditanyakan</h2>

      <details class="faq-item" open>
        <summary>Bagaimana cara booking trip?</summary>
        <p>Isi form di atas atau chat langsung lewat WhatsApp dengan menyebutkan paket, tanggal, dan jumlah peserta. Tim kami akan konfirmasi ketersediaan tanggal dalam 1&ndash;2 jam.</p>
      </details>
      <details class="faq-item">
        <summary>Berapa DP yang harus dibayar?</summary>
        <p>DP sebesar 30% dari total biaya, bisa ditransfer lewat bank atau QRIS. Pelunasan dilakukan paling lambat H-1 sebelum keberangkatan.</p>
      </details>
      <details class="faq-item">
        <summary>Apakah bisa reschedule atau refund?</summary>
        <p>Reschedule bisa dilakukan maksimal H-3 sebelum keberangkatan tanpa biaya tambahan. Untuk refund, DP tidak dapat dikembalikan tapi bisa dialihkan ke jadwal trip lain.</p>
      </details>
      <details class="faq-item">
        <summary>Apakah cocok untuk anak-anak atau lansia?</summary>
        <p>Untuk trip santai seperti Coban Rondo &amp; Batu atau Malang City Tour, sangat cocok. Untuk trip mendaki seperti Semeru, kami sarankan peserta dalam kondisi fisik sehat dan terbiasa jalan jauh.</p>
      </details>
      <details class="faq-item">
        <summary>Berapa minimal peserta untuk berangkat?</summary>
        <p>Setiap paket punya minimal peserta berbeda (lihat di halaman Paket Trip). Kalau jumlah peserta belum mencukupi, kamu juga bisa request private trip dengan harga khusus.</p>
      </details>
    </div>
  </section>

<?php include 'includes/footer.php'; ?>
