<?php
/**
 * CONTOH pengaturan database PostgreSQL (Neon) untuk dicoba di komputer sendiri.
 *
 * Cara pakai:
 *   1. Daftar gratis di neon.tech, buat project baru.
 *   2. Di dashboard Neon, salin "Connection string" (yang formatnya
 *      postgresql://user:password@host/namadb?sslmode=require)
 *   3. Salin file ini menjadi  config.local.php  (folder yang sama)
 *   4. Isi field di bawah dari connection string tadi
 *   5. config.local.php JANGAN di-commit ke GitHub (sudah diabaikan lewat .gitignore)
 *
 * Catatan: di Render (hosting online), kamu TIDAK perlu file ini -- cukup isi
 * Environment Variable bernama DATABASE_URL dengan connection string yang sama persis.
 */
return [
    'host'    => 'ep-xxxxxxx.ap-southeast-1.aws.neon.tech',
    'port'    => 5432,
    'name'    => 'neondb',
    'user'    => 'neondb_owner',
    'pass'    => 'password-dari-neon',
    'sslmode' => 'require',
];
