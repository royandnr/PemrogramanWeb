<?php
require_once __DIR__ . '/../includes/auth.php';
require_login('../login.php');

$page_title       = 'Dashboard Admin — Yann Trip Malang';
$page_description = 'Panel admin Yann Trip Malang.';
$current_page      = 'dashboard';
$base_url          = '../';

include __DIR__ . '/../includes/header.php';
?>

  <!-- ===================== DASHBOARD ADMIN ===================== -->
  <header class="header-halaman">
    <div class="container container-sempit">
      <p class="eyebrow">Admin</p>
      <h1>Selamat datang, <?= htmlspecialchars($_SESSION['admin_username'] ?? 'Admin') ?> 👋</h1>
      <p class="mt-3" style="max-width:55ch; color: rgba(243,238,226,0.8);">Ini dashboard sementara. Setelah database sudah tersambung, halaman ini bisa dipakai untuk kelola data paket trip dan jadwal keberangkatan langsung dari sini.</p>
    </div>
  </header>

  <section>
    <div class="container container-sempit">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="kartu-nilai">
            <h3 style="font-size:1.1rem;">Kelola Paket Trip</h3>
            <p class="mt-2 mb-0" style="color: rgba(34,38,31,0.7); font-size:0.9rem;">Tambah, ubah, atau hapus paket trip. <em>(Segera — menunggu database)</em></p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="kartu-nilai">
            <h3 style="font-size:1.1rem;">Kelola Jadwal</h3>
            <p class="mt-2 mb-0" style="color: rgba(34,38,31,0.7); font-size:0.9rem;">Update tanggal keberangkatan &amp; sisa kuota. <em>(Segera — menunggu database)</em></p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="kartu-nilai">
            <h3 style="font-size:1.1rem;">Lihat Pesan Masuk</h3>
            <p class="mt-2 mb-0" style="color: rgba(34,38,31,0.7); font-size:0.9rem;">Rekap permintaan booking dari form kontak. <em>(Segera — menunggu database)</em></p>
          </div>
        </div>
      </div>

      <div class="mt-5">
        <a href="../logout.php" class="btn-otm-outline">Logout</a>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
