<?php
/**
 * includes/auth.php
 * -------------------------------------------------------
 * Menangani session login admin.
 *
 * CATATAN: Kredensial admin masih hardcode di bawah karena
 * database belum disiapkan. Begitu database sudah ada,
 * ganti bagian $ADMIN_USERS dengan query ke tabel `admin`
 * (SELECT username, password FROM admin WHERE username = ?)
 * lalu cocokkan dengan password_verify() seperti biasa.
 * -------------------------------------------------------
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Username: admin | Password: admin123
// (password di-hash pakai password_hash, JANGAN simpan plain text)
$ADMIN_USERS = [
    'admin' => '$2y$10$5U0lhR5r.RQMFgVEdE.S9.hYeL0oiJ8ddr7vCjTAUEDMbvHTxCQNm',
];

/**
 * Cek apakah admin sedang login.
 */
function is_logged_in(): bool
{
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

/**
 * Coba login. Return true kalau berhasil, false kalau gagal.
 */
function attempt_login(string $username, string $password): bool
{
    global $ADMIN_USERS;

    if (!isset($ADMIN_USERS[$username])) {
        return false;
    }

    if (!password_verify($password, $ADMIN_USERS[$username])) {
        return false;
    }

    // Regenerate session id supaya lebih aman dari session fixation
    session_regenerate_id(true);
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_username']  = $username;

    return true;
}

/**
 * Paksa halaman ini hanya bisa diakses kalau sudah login.
 * Panggil di paling atas halaman admin, sebelum ada output apa pun.
 */
function require_login(string $redirect_to = 'login.php'): void
{
    if (!is_logged_in()) {
        header('Location: ' . $redirect_to);
        exit;
    }
}

/**
 * Logout: hapus semua data session dan hancurkan session-nya.
 */
function do_logout(): void
{
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }

    session_destroy();
}
