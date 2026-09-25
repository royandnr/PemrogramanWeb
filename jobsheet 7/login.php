<?php
require_once __DIR__ . '/includes/auth.php';

// Kalau sudah login, langsung lempar ke dashboard
if (is_logged_in()) {
    header('Location: admin/dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Username dan password wajib diisi.';
    } elseif (attempt_login($username, $password)) {
        header('Location: admin/dashboard.php');
        exit;
    } else {
        $error = 'Username atau password salah.';
    }
}

$page_title       = 'Login Admin — Yann Trip Malang';
$page_description = 'Halaman login khusus admin Yann Trip Malang.';
$current_page     = '';

include 'includes/header.php';
?>

  <!-- ===================== LOGIN ADMIN ===================== -->
  <section style="min-height: 70vh; display:flex; align-items:center;">
    <div class="container container-sempit">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="kotak-kontak">
            <p class="eyebrow mb-2">Khusus Admin</p>
            <h2 class="mb-4" style="font-size:1.5rem;">Masuk ke Dashboard</h2>

            <?php if ($error): ?>
              <p class="mb-3" style="color:#B4842E; font-weight:600; font-size:0.9rem;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <form method="post" action="login.php" novalidate>
              <div class="mb-3">
                <label class="label-otm" for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control form-control-otm" required autofocus>
              </div>
              <div class="mb-3">
                <label class="label-otm" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-otm" required>
              </div>
              <button type="submit" class="btn-otm mt-2 w-100">Masuk</button>
            </form>

            <p class="mt-4 mb-0" style="font-size:0.78rem; color: rgba(34,38,31,0.5);">Demo: username <code>admin</code> / password <code>admin123</code> — ganti setelah database admin sudah aktif.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include 'includes/footer.php'; ?>
