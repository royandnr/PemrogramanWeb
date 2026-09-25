<?php
/**
 * includes/header.php
 * -------------------------------------------------------
 * Dipanggil di paling atas tiap halaman. Sebelum include ini,
 * halaman pemanggil boleh mengisi variabel-variabel berikut:
 *
 *   $page_title        (wajib)   judul tab browser
 *   $page_description  (wajib)   meta description
 *   $current_page       (wajib)   'index' | 'paket' | 'galeri' | 'tentang' | 'kontak'
 *   $og_title           (opsional) judul untuk share ke medsos
 *   $og_description     (opsional)
 *   $og_image           (opsional)
 * -------------------------------------------------------
 */

require_once __DIR__ . '/auth.php';

$current_page = $current_page ?? '';
$base_url     = $base_url ?? ''; // isi '../' kalau file pemanggil ada di dalam subfolder (mis. admin/)

/**
 * Helper kecil untuk menandai menu yang sedang aktif.
 */
function nav_active(string $page, string $current): string
{
    return $page === $current ? ' active' : '';
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($page_title ?? 'Yann Trip Malang') ?></title>
  <meta name="description" content="<?= htmlspecialchars($page_description ?? '') ?>">
  <?php if (!empty($og_title)): ?>
  <meta property="og:title" content="<?= htmlspecialchars($og_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($og_description ?? '') ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?= htmlspecialchars($og_image ?? '') ?>">
  <?php endif; ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600;700&family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $base_url ?>assets/css/style.css" rel="stylesheet">
</head>
<body>

  <!-- ===================== NAVBAR ===================== -->
  <nav class="navbar navbar-otm navbar-expand-lg">
    <div class="container container-sempit">
      <a class="brand" href="<?= $base_url ?>index.php">Yann<span>Trip</span>.Malang</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navMenu">
        <div class="d-flex flex-lg-row flex-column align-items-lg-center mt-3 mt-lg-0">
          <a class="nav-link<?= nav_active('index', $current_page) ?>" href="<?= $base_url ?>index.php">Beranda</a>
          <a class="nav-link<?= nav_active('paket', $current_page) ?>" href="<?= $base_url ?>paket.php">Paket Trip</a>
          <a class="nav-link<?= nav_active('galeri', $current_page) ?>" href="<?= $base_url ?>galeri.php">Galeri</a>
          <a class="nav-link<?= nav_active('tentang', $current_page) ?>" href="<?= $base_url ?>tentang.php">Tentang Kami</a>
          <?php if (is_logged_in()): ?>
            <a class="nav-link<?= nav_active('dashboard', $current_page) ?>" href="<?= $base_url ?>admin/dashboard.php">Dashboard</a>
            <a class="nav-link" href="<?= $base_url ?>logout.php">Logout</a>
          <?php else: ?>
            <a class="nav-link" href="<?= $base_url ?>login.php">Login Admin</a>
          <?php endif; ?>
          <a class="btn-otm ms-lg-4 mt-3 mt-lg-0 d-inline-block text-center<?= nav_active('kontak', $current_page) ?>" href="<?= $base_url ?>kontak.php">Booking Sekarang</a>
        </div>
      </div>
    </div>
  </nav>
