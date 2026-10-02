<?php
/**
 * includes/db.php
 * -------------------------------------------------------
 * Koneksi ke database PostgreSQL memakai PDO.
 *
 * Mengambil pengaturan dengan urutan (yang belakang menimpa yang depan):
 *   1. Nilai bawaan di bawah (kosong, cuma contoh)
 *   2. File includes/config.local.php   (JANGAN di-commit ke GitHub)
 *   3. Environment variable DATABASE_URL (format dari Neon/Render, paling disarankan)
 *      atau DB_HOST / DB_PORT / DB_NAME / DB_USER / DB_PASS satu-satu
 *
 * Jadi: di komputer sendiri cukup isi config.local.php dengan connection
 * string dari Neon, dan di Render cukup isi Environment Variable
 * DATABASE_URL -- tidak perlu ubah kode sama sekali.
 * -------------------------------------------------------
 */

function db_config(): array
{
    $cfg = [
        'host'    => '',
        'port'    => 5432,
        'name'    => '',
        'user'    => '',
        'pass'    => '',
        'sslmode' => 'require', // Neon & kebanyakan Postgres cloud mewajibkan SSL
    ];

    $file = __DIR__ . '/config.local.php';
    if (is_file($file)) {
        $local = require $file;
        if (is_array($local)) {
            $cfg = array_merge($cfg, $local);
        }
    }

    // Format connection string: postgresql://user:pass@host:port/namadb?sslmode=require
    $url = getenv('DATABASE_URL');
    if ($url) {
        $parts = parse_url($url);
        if ($parts) {
            $cfg['host'] = $parts['host'] ?? $cfg['host'];
            $cfg['port'] = $parts['port'] ?? $cfg['port'];
            $cfg['name'] = isset($parts['path']) ? ltrim($parts['path'], '/') : $cfg['name'];
            $cfg['user'] = isset($parts['user']) ? rawurldecode($parts['user']) : $cfg['user'];
            $cfg['pass'] = isset($parts['pass']) ? rawurldecode($parts['pass']) : $cfg['pass'];
            if (!empty($parts['query'])) {
                parse_str($parts['query'], $q);
                if (!empty($q['sslmode'])) {
                    $cfg['sslmode'] = $q['sslmode'];
                }
            }
        }
    }

    // Variabel satu-satu (opsional, kalau tidak pakai DATABASE_URL)
    $env = ['host' => 'DB_HOST', 'port' => 'DB_PORT', 'name' => 'DB_NAME', 'user' => 'DB_USER', 'pass' => 'DB_PASS'];
    foreach ($env as $key => $var) {
        $val = getenv($var);
        if ($val !== false && $val !== '') {
            $cfg[$key] = $val;
        }
    }

    return $cfg;
}

/**
 * Ambil koneksi database (dibuat sekali, dipakai ulang).
 * Melempar PDOException kalau database belum siap / pengaturan belum diisi.
 */
function db(): PDO
{
    static $pdo = null;

    if ($pdo === null) {
        $c = db_config();

        if ($c['host'] === '' || $c['name'] === '') {
            throw new PDOException(
                'Pengaturan database belum diisi (lihat includes/config.local.php).'
            );
        }

        // Ambil Endpoint ID dari hostname Neon
        $endpoint = explode('.', $c['host'])[0];

        $dsn = 'pgsql:host=' . $c['host']
             . ';port=' . (int) $c['port']
             . ';dbname=' . $c['name']
             . ';sslmode=' . $c['sslmode']
             . ';options=endpoint%3D' . $endpoint;

        $pdo = new PDO($dsn, $c['user'], $c['pass'], [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    return $pdo;
}