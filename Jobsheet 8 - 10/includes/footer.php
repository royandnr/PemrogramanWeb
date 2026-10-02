<?php
/**
 * includes/footer.php
 * -------------------------------------------------------
 * Halaman pemanggil boleh mengisi variabel berikut sebelum
 * include ini (semua opsional, sudah ada default-nya):
 *
 *   $bar_aksi_href   link tombol kedua di bar aksi HP (default: paket.php)
 *   $bar_aksi_label  teks tombol kedua di bar aksi HP (default: "Lihat Paket")
 * -------------------------------------------------------
 */

$bar_aksi_href  = $bar_aksi_href ?? 'paket.php';
$bar_aksi_label = $bar_aksi_label ?? 'Lihat Paket';
$base_url       = $base_url ?? '';
$wa_link = 'https://wa.me/628979158187?text=Halo%20Yann%20Trip%20Malang%2C%20saya%20ingin%20tanya-tanya%20soal%20trip.';
?>
  <!-- ===================== FOOTER ===================== -->
  <footer>
    <div class="container container-sempit">
      <div class="row g-4">
        <div class="col-md-4">
          <h5>Yann<span style="color:#D9A441;">Trip</span>.Malang</h5>
          <p class="mt-2" style="font-size:0.9rem;">Jasa open trip &amp; private trip di sekitar Malang Raya, Bromo, dan Ijen sejak 2019.</p>
        </div>
        <div class="col-md-4">
          <h5>Tautan</h5>
          <ul class="list-unstyled mt-2" style="font-size:0.9rem;">
            <li class="mb-2"><a href="<?= $base_url ?>paket.php">Paket Trip</a></li>
            <li class="mb-2"><a href="<?= $base_url ?>galeri.php">Galeri</a></li>
            <li class="mb-2"><a href="<?= $base_url ?>tentang.php">Tentang Kami</a></li>
            <li class="mb-2"><a href="<?= $base_url ?>kontak.php">Kontak</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Kontak</h5>
          <ul class="list-unstyled mt-2" style="font-size:0.9rem;">
            <li class="mb-2">WhatsApp: <a href="https://wa.me/628979158187" target="_blank" rel="noopener">0897-9158-187</a></li>
            <li class="mb-2">Email: halo@yanntripmalang.id</li>
            <li class="mb-2">Jl. Ijen No. 21, Malang</li>
            <li class="mb-2">Instagram: <a href="https://instagram.com/yanntripmalang" target="_blank" rel="noopener">@yanntripmalang</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bawah text-center">
        &copy; <span class="tahun-sekarang"></span> Yann Trip Malang. Semua hak dilindungi.
      </div>
    </div>
  </footer>

  <div class="bar-aksi-hp">
    <div class="row-aksi">
      <a href="<?= htmlspecialchars($wa_link) ?>" class="aksi-wa" target="_blank" rel="noopener">Chat WhatsApp</a>
      <a href="<?= $base_url . htmlspecialchars($bar_aksi_href) ?>" class="aksi-paket"><?= htmlspecialchars($bar_aksi_label) ?></a>
    </div>
  </div>

  <a href="<?= htmlspecialchars($wa_link) ?>" class="wa-mengambang" target="_blank" rel="noopener" aria-label="Chat WhatsApp">
    <svg viewBox="0 0 32 32" fill="white" xmlns="http://www.w3.org/2000/svg"><path d="M16 4C9.373 4 4 8.94 4 15c0 3.11 1.44 5.92 3.78 7.93L6.5 28l5.4-2.02A13.6 13.6 0 0 0 16 26c6.627 0 12-4.94 12-11S22.627 4 16 4z"/></svg>
  </a>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
  <script src="<?= $base_url ?>assets/js/script.js"></script>
</body>
</html>
