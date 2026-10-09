<?php
require_once __DIR__ . '/../includes/auth.php';
require_login('../login.php');

$page_title       = 'Ganti Password — Yann Trip Malang';
$page_description = 'Ganti password admin.';
$current_page     = 'dashboard';
$base_url         = '../';

$errors = [];
$berhasil = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lama   = $_POST['password_lama'] ?? '';
    $baru   = $_POST['password_baru'] ?? '';
    $konfirm = $_POST['konfirmasi'] ?? '';

    if (!csrf_valid($_POST['csrf_token'] ?? null)) {
        $errors[] = 'Sesi form kedaluwarsa, silakan coba lagi.';
    } else {
        try {
            $stmt = db()->prepare('SELECT password FROM admin WHERE id = ? LIMIT 1');
            $stmt->execute([$_SESSION['admin_id'] ?? 0]);
            $hash = $stmt->fetchColumn();

            if (!$hash || !password_verify($lama, $hash)) {
                $errors[] = 'Password lama salah.';
            }
            if (strlen($baru) < 8) {
                $errors[] = 'Password baru minimal 8 karakter.';
            }
            if ($baru !== $konfirm) {
                $errors[] = 'Konfirmasi password tidak sama dengan password baru.';
            }
            if ($baru === 'admin123') {
                $errors[] = 'Password baru tidak boleh sama dengan password bawaan.';
            }

            if (!$errors) {
                $upd = db()->prepare('UPDATE admin SET password = ? WHERE id = ?');
                $upd->execute([password_hash($baru, PASSWORD_DEFAULT), $_SESSION['admin_id']]);
                session_regenerate_id(true);
                $berhasil = true;
            }
        } catch (PDOException $e) {
            $errors[] = 'Terjadi kesalahan pada database.';
        }
    }
}

include __DIR__ . '/../includes/header.php';
?>

  <section style="min-height: 70vh; display:flex; align-items:center;">
    <div class="container container-sempit">
      <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
          <div class="kotak-kontak">
            <p class="eyebrow mb-2">Keamanan</p>
            <h2 class="mb-4" style="font-size:1.5rem;">Ganti Password</h2>

            <?php if ($berhasil): ?>
              <div class="notif-sukses mb-3">Password berhasil diganti. Gunakan password baru saat login berikutnya.</div>
              <a href="dashboard.php" class="btn-otm">Kembali ke Dashboard</a>
            <?php else: ?>
              <?php if ($errors): ?>
                <div class="notif-error mb-3"><ul class="mb-0">
                  <?php foreach ($errors as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?>
                </ul></div>
              <?php endif; ?>

              <form method="post" action="ganti-password.php" novalidate>
                <?= csrf_field() ?>
                <div class="mb-3">
                  <label class="label-otm" for="password_lama">Password lama</label>
                  <input type="password" name="password_lama" id="password_lama" class="form-control form-control-otm" required autofocus>
                </div>
                <div class="mb-3">
                  <label class="label-otm" for="password_baru">Password baru (minimal 8 karakter)</label>
                  <input type="password" name="password_baru" id="password_baru" class="form-control form-control-otm" required>
                </div>
                <div class="mb-3">
                  <label class="label-otm" for="konfirmasi">Ulangi password baru</label>
                  <input type="password" name="konfirmasi" id="konfirmasi" class="form-control form-control-otm" required>
                </div>
                <button type="submit" class="btn-otm w-100 mt-2">Simpan Password Baru</button>
                <p class="mt-3 mb-0"><a href="dashboard.php" style="font-size:0.88rem; color: var(--kabut);">&larr; Batal, kembali ke dashboard</a></p>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
