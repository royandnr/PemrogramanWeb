<?php
require_once __DIR__ . '/../includes/auth.php';
require_login('../login.php');

$page_title       = 'Dashboard Admin — Yann Trip Malang';
$page_description = 'Panel admin Yann Trip Malang.';
$current_page     = 'dashboard';
$base_url         = '../';

$status_valid = ['baru', 'dihubungi', 'dikonfirmasi', 'batal'];
$status_label = [
    'baru'         => 'Baru',
    'dihubungi'    => 'Sudah dihubungi',
    'dikonfirmasi' => 'Dikonfirmasi',
    'batal'        => 'Batal',
];

$notif = $_SESSION['dash_notif'] ?? '';
unset($_SESSION['dash_notif']);
$db_error = '';

// ---------- Proses aksi (ubah status / hapus) ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (!csrf_valid($_POST['csrf_token'] ?? null)) {
            $_SESSION['dash_notif'] = 'Sesi form kedaluwarsa, silakan coba lagi.';
        } else {
            $id     = (int) ($_POST['id'] ?? 0);
            $aksi   = $_POST['aksi'] ?? '';

            if ($aksi === 'status' && in_array($_POST['status'] ?? '', $status_valid, true)) {
                $stmt = db()->prepare('UPDATE booking SET status = ? WHERE id = ?');
                $stmt->execute([$_POST['status'], $id]);
                $_SESSION['dash_notif'] = 'Status booking berhasil diperbarui.';
            } elseif ($aksi === 'hapus') {
                $stmt = db()->prepare('DELETE FROM booking WHERE id = ?');
                $stmt->execute([$id]);
                $_SESSION['dash_notif'] = 'Data booking berhasil dihapus.';
            }
        }
    } catch (PDOException $e) {
        $_SESSION['dash_notif'] = 'Terjadi kesalahan pada database.';
    }
    header('Location: dashboard.php');
    exit;
}

// ---------- Ambil data ----------
$bookings = [];
$stat = ['total' => 0, 'baru' => 0, 'dihubungi' => 0, 'dikonfirmasi' => 0, 'batal' => 0];
$filter = $_GET['status'] ?? '';
if (!in_array($filter, $status_valid, true)) {
    $filter = '';
}

try {
    foreach (db()->query('SELECT status, COUNT(*) AS n FROM booking GROUP BY status') as $row) {
        $stat[$row['status']] = (int) $row['n'];
        $stat['total'] += (int) $row['n'];
    }

    if ($filter !== '') {
        $stmt = db()->prepare('SELECT * FROM booking WHERE status = ? ORDER BY created_at DESC, id DESC');
        $stmt->execute([$filter]);
    } else {
        $stmt = db()->query('SELECT * FROM booking ORDER BY created_at DESC, id DESC');
    }
    $bookings = $stmt->fetchAll();
} catch (PDOException $e) {
    $db_error = 'Database belum tersambung atau tabel booking belum dibuat. Import file database/yanntrip.sql lewat phpMyAdmin.';
}

// Peringatan kalau password admin masih password bawaan (admin123)
$password_default = false;
try {
    $st = db()->prepare('SELECT password FROM admin WHERE id = ? LIMIT 1');
    $st->execute([$_SESSION['admin_id'] ?? 0]);
    $h = $st->fetchColumn();
    $password_default = $h && password_verify('admin123', $h);
} catch (PDOException $e) {
    // abaikan; pesan database sudah ditangani di atas
}

/** Ubah nomor lokal (08xx) jadi format internasional untuk link wa.me */
function nomor_wa(string $nomor): string
{
    $d = preg_replace('/\D/', '', $nomor);
    if (strpos($d, '0') === 0) {
        $d = '62' . substr($d, 1);
    }
    return $d;
}

include __DIR__ . '/../includes/header.php';
?>

  <!-- ===================== DASHBOARD ADMIN ===================== -->
  <header class="header-halaman">
    <div class="container container-sempit">
      <p class="eyebrow">Admin</p>
      <h1>Halo, <?= htmlspecialchars($_SESSION['admin_username'] ?? 'Admin') ?></h1>
      <p class="mt-3 mb-0" style="max-width:55ch; color: rgba(243,238,226,0.8);">Berikut permintaan booking yang masuk dari form di halaman Kontak.</p>
    </div>
  </header>

  <section>
    <div class="container container-sempit">

      <?php if ($notif): ?>
        <div class="notif-sukses mb-4"><?= htmlspecialchars($notif) ?></div>
      <?php endif; ?>
      <?php if ($password_default): ?>
        <div class="notif-error mb-4">
          <strong>Password kamu masih password bawaan (admin123).</strong>
          Siapa pun yang membaca kode di GitHub bisa masuk ke dashboard ini dan melihat data pelanggan.
          <a href="ganti-password.php"><strong>Ganti sekarang &rarr;</strong></a>
        </div>
      <?php endif; ?>
      <?php if ($db_error): ?>
        <div class="notif-error mb-4"><?= htmlspecialchars($db_error) ?></div>
      <?php endif; ?>

      <!-- Statistik -->
      <div class="row g-3 mb-5">
        <div class="col-6 col-md-3">
          <div class="kartu-nilai">
            <p class="mb-1" style="font-size:0.82rem; color: var(--kabut);">Total booking</p>
            <h3 style="font-size:1.9rem;"><?= $stat['total'] ?></h3>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="kartu-nilai">
            <p class="mb-1" style="font-size:0.82rem; color: var(--kabut);">Perlu dihubungi</p>
            <h3 style="font-size:1.9rem; color: var(--emas-dim);"><?= $stat['baru'] ?></h3>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="kartu-nilai">
            <p class="mb-1" style="font-size:0.82rem; color: var(--kabut);">Dikonfirmasi</p>
            <h3 style="font-size:1.9rem;"><?= $stat['dikonfirmasi'] ?></h3>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="kartu-nilai">
            <p class="mb-1" style="font-size:0.82rem; color: var(--kabut);">Batal</p>
            <h3 style="font-size:1.9rem;"><?= $stat['batal'] ?></h3>
          </div>
        </div>
      </div>

      <!-- Filter -->
      <div class="d-flex flex-wrap gap-2 mb-4">
        <a href="dashboard.php" class="chip-filter<?= $filter === '' ? ' aktif' : '' ?>">Semua</a>
        <?php foreach ($status_label as $key => $label): ?>
          <a href="dashboard.php?status=<?= $key ?>" class="chip-filter<?= $filter === $key ? ' aktif' : '' ?>"><?= $label ?></a>
        <?php endforeach; ?>
      </div>

      <!-- Tabel booking -->
      <?php if (!$bookings && !$db_error): ?>
        <div class="kartu-nilai text-center" style="padding:2.5rem 1.5rem;">
          <p class="mb-0" style="color: rgba(34,38,31,0.7);">Belum ada booking<?= $filter ? ' dengan status ini' : '' ?>. Booking baru dari form Kontak akan muncul di sini.</p>
        </div>
      <?php elseif ($bookings): ?>
        <div style="overflow-x:auto;">
          <table class="tabel-jadwal">
            <thead>
              <tr>
                <th>Nama</th>
                <th>WhatsApp</th>
                <th>Paket</th>
                <th>Peserta</th>
                <th>Catatan</th>
                <th>Masuk</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($bookings as $b): ?>
                <tr>
                  <td><?= htmlspecialchars($b['nama']) ?></td>
                  <td data-label="WhatsApp">
                    <a href="https://wa.me/<?= htmlspecialchars(nomor_wa($b['whatsapp'])) ?>" target="_blank" rel="noopener"><?= htmlspecialchars($b['whatsapp']) ?></a>
                  </td>
                  <td data-label="Paket"><?= htmlspecialchars($b['paket']) ?></td>
                  <td data-label="Peserta"><?= (int) $b['jumlah_peserta'] ?> orang</td>
                  <td data-label="Catatan"><?= $b['catatan'] ? nl2br(htmlspecialchars($b['catatan'])) : '<span style="color:var(--kabut);">-</span>' ?></td>
                  <td data-label="Masuk"><?= htmlspecialchars(date('d M Y, H:i', strtotime($b['created_at']))) ?></td>
                  <td data-label="Status"><span class="badge-status s-<?= htmlspecialchars($b['status']) ?>"><?= htmlspecialchars($status_label[$b['status']]) ?></span></td>
                  <td data-label="Aksi">
                    <form method="post" action="dashboard.php" class="form-aksi">
                      <?= csrf_field() ?>
                      <input type="hidden" name="id" value="<?= (int) $b['id'] ?>">
                      <input type="hidden" name="aksi" value="status">
                      <select name="status" class="form-control-otm select-kecil" onchange="this.form.submit()" aria-label="Ubah status">
                        <?php foreach ($status_label as $key => $label): ?>
                          <option value="<?= $key ?>" <?= $b['status'] === $key ? 'selected' : '' ?>><?= $label ?></option>
                        <?php endforeach; ?>
                      </select>
                    </form>
                    <form method="post" action="dashboard.php" class="form-aksi" onsubmit="return confirm('Hapus booking dari <?= htmlspecialchars($b['nama'], ENT_QUOTES) ?>?');">
                      <?= csrf_field() ?>
                      <input type="hidden" name="id" value="<?= (int) $b['id'] ?>">
                      <input type="hidden" name="aksi" value="hapus">
                      <button type="submit" class="tombol-hapus">Hapus</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>

      <div class="mt-5 d-flex flex-wrap gap-2">
        <a href="ganti-password.php" class="btn-otm-outline">Ganti Password</a>
        <a href="../logout.php" class="btn-otm-outline">Logout</a>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
