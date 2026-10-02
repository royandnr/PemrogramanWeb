# Yann Trip Malang (PHP + PostgreSQL)

> Panduan lengkap langkah demi langkah (download -> GitHub -> Neon -> Render) ada di **PANDUAN.md**.

## Ringkasan
- Database: **PostgreSQL** (disarankan: Neon, gratis selamanya)
- Hosting: **Render** (Docker, otomatis deploy dari GitHub)
- Login admin awal: `admin` / `admin123` -> **segera ganti** lewat dashboard setelah online

## Coba di komputer (XAMPP, tanpa install PostgreSQL)
1. Buat database gratis di neon.tech, catat connection string-nya
2. Jalankan `database/yanntrip.sql` lewat SQL Editor di dashboard Neon
3. Salin `includes/config.local.example.php` -> `includes/config.local.php`, isi dari connection string Neon
4. Taruh folder ini di `C:\xampp\htdocs\`, nyalakan Apache saja (MySQL tidak dipakai)
5. Buka `http://localhost/yanntrip-php/index.php`

## Struktur
- `*.php` di root   -> halaman website
- `includes/`       -> header, footer, koneksi database (db.php), login (auth.php)
- `admin/`          -> dashboard & ganti password (khusus admin)
- `assets/`         -> css & js
- `database/`       -> yanntrip.sql (skema PostgreSQL)
- `Dockerfile`      -> dipakai Render untuk menjalankan PHP, tidak perlu diedit
