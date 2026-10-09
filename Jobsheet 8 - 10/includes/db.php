<?php
/**
 * includes/db.php
 * Koneksi ke database MySQL menggunakan PDO.
 */

function db_config(): array
{
    return [
        'host' => 'sql208.infinityfree.com',
        'port' => 3306,
        'name' => 'if0_43066685_yanntrip',
        'user' => 'if0_43066685',
        'pass' => 'gsNK3NLFmG'
    ];
}

/**
 * Ambil koneksi database.
 */
function db(): PDO
{
    static $pdo = null;

    if ($pdo === null) {
        $c = db_config();

        $dsn = 'mysql:host=' . $c['host']
             . ';port=' . $c['port']
             . ';dbname=' . $c['name']
             . ';charset=utf8mb4';

        $pdo = new PDO($dsn, $c['user'], $c['pass'], [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    }

    return $pdo;
}