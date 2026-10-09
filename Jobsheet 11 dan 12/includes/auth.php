<?php
/**
 * includes/auth.php
 * -------------------------------------------------------
 * Menangani session login admin (data admin dari database)
 * dan token CSRF untuk melindungi form.
 * -------------------------------------------------------
 */

require_once __DIR__ . '/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Cek apakah admin sedang login.
 */
function is_logged_in(): bool
{
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

/**
 * Coba login dengan data dari tabel `admin`.
 * Return true kalau berhasil, false kalau username/password salah.
 * Melempar PDOException kalau database belum tersambung.
 */
function attempt_login(string $username, string $password): bool
{
    $stmt = db()->prepare('SELECT id, username, password FROM admin WHERE username = ? LIMIT 1');
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if (!$admin || !password_verify($password, $admin['password'])) {
        return false;
    }

    // Ganti session id supaya lebih aman dari session fixation
    session_regenerate_id(true);
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_id']        = (int) $admin['id'];
    $_SESSION['admin_username']  = $admin['username'];

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

/**
 * Token CSRF: dipasang di setiap form (input hidden) dan dicek saat form dikirim,
 * supaya form tidak bisa disubmit dari website orang lain.
 */
function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars(csrf_token()) . '">';
}

function csrf_valid(?string $token): bool
{
    return is_string($token)
        && isset($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $token);
}
