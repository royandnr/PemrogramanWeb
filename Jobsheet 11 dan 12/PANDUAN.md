# PANDUAN LENGKAP: Download → GitHub → Online (Neon + Render, gratis, PostgreSQL)

Ditulis untuk pemula, ikuti berurutan. Tampilan Neon/Render/GitHub bisa sedikit
berbeda dari yang dijelaskan karena mereka sering memperbarui tampilannya, tapi
nama menu-menunya umumnya tetap sama.

Tips: kalau file ini dibuka di VS Code, tekan `Ctrl + Shift + V` supaya tampil rapi.

---

## Gambaran besar (baca dulu, 1 menit)

```
[ZIP dari Claude] --> [Komputermu] --> [GitHub] --> [Render] (website online, otomatis)
                                                         |
                                            tersambung ke
                                                         v
                                                     [Neon] (database PostgreSQL)
```

- **GitHub** = tempat menyimpan kode.
- **Render** = tempat website berjalan di internet. **Otomatis ambil kode dari GitHub**
  setiap kamu `push` -- beda dengan hosting lain yang perlu upload manual.
- **Neon** = tempat database PostgreSQL berjalan, terpisah dari Render.
- Kenapa dipisah jadi dua layanan? Karena Render bagus untuk menjalankan website,
  dan Neon khusus untuk database PostgreSQL gratis selamanya. Keduanya saling
  terhubung lewat satu baris teks yang disebut **connection string**.

Total waktu: sekitar 45-75 menit untuk pertama kali.

---

## TAHAP 1 -- Download dan ekstrak file

1. Download file **`yanntrip-malang-postgres.zip`** dari chat.
2. Klik kanan -> **Extract All...** -> pilih lokasi (Desktop/Documents) -> **Extract**.
3. Buka folder hasil ekstrak, pastikan file-file ini **langsung** kelihatan di dalamnya:

```
yanntrip-php/
|-- index.php
|-- paket.php, galeri.php, tentang.php, kontak.php
|-- login.php, logout.php
|-- Dockerfile        (baru, untuk Render)
|-- PANDUAN.md         (file ini)
|-- README.md
|-- .gitignore
|-- admin/
|-- assets/
|-- database/          (isinya yanntrip.sql, versi PostgreSQL)
`-- includes/
```

**Awas folder ganda** -- kalau jadi `yanntrip-php/yanntrip-php/...`, pakai yang paling dalam.
Folder ini kita sebut **"folder proyek"**.

---

## TAHAP 2 -- Siapkan akun GitHub

1. Daftar di **github.com** kalau belum punya akun, verifikasi email.
2. Install **GitHub Desktop** dari desktop.github.com.
3. Buka GitHub Desktop -> **Sign in to GitHub.com** -> login.

---

## TAHAP 3 -- Daftar Neon dan buat database PostgreSQL

1. Buka **neon.tech** -> **Sign Up** (bisa langsung pakai akun GitHub/Google, lebih cepat).
2. Setelah masuk dashboard, klik **Create a project** (atau sudah otomatis dibuatkan satu
   project pertama saat mendaftar).
3. Isi **Project name**, misalnya `yanntrip`. Database name boleh dibiarkan `neondb`.
   Klik **Create Project**.
4. Di halaman project, cari bagian **Connection string** (biasanya langsung tampil di
   dashboard, atau menu **Connect**). Bentuknya seperti ini:

   ```
   postgresql://neondb_owner:AbCd1234XyZ@ep-cool-forest-12345.ap-southeast-1.aws.neon.tech/neondb?sslmode=require
   ```

5. **Salin seluruh baris itu** dan simpan sementara di Notepad. Ini akan dipakai 2 kali:
   di komputermu (Tahap 5) dan di Render (Tahap 8).

   PERINGATAN: Connection string ini isinya password database. Jangan dikirim ke siapa pun,
   jangan di-screenshot untuk dibagikan, dan jangan dimasukkan ke GitHub.

---

## TAHAP 4 -- Buat tabelnya di Neon

1. Masih di dashboard Neon, cari menu **SQL Editor** di sidebar kiri.
2. Buka file **`database/yanntrip.sql`** dari folder proyek pakai Notepad/VS Code,
   **salin semua isinya**.
3. Tempel ke SQL Editor Neon, lalu klik **Run**.
4. Cek di menu **Tables** (sidebar kiri): harus muncul 2 tabel, **`admin`** dan **`booking`**.
5. Klik tabel `admin` -> **Data** -> harus ada 1 baris dengan `username` = `admin`.

Database kamu sudah siap, sekarang isinya 1 akun admin dan tabel booking kosong.

---

## TAHAP 5 -- Buat file pengaturan database (untuk coba di komputer sendiri)

Langkah ini supaya kamu bisa coba website-nya jalan dulu di komputer sebelum online.

1. Masuk ke folder **`includes`** di folder proyek.
2. **Salin** file `config.local.example.php`, ganti nama salinannya jadi
   **`config.local.php`**. Pastikan ekstensinya `.php`, bukan `.php.txt`
   (di Windows: File Explorer -> tab **View** -> centang **File name extensions**).
3. Buka `config.local.php`, isi dari connection string Neon tadi. Connection string
   formatnya `postgresql://USER:PASSWORD@HOST/NAMA_DB?sslmode=require` -- pecah jadi begini:

```php
<?php
return [
    'host'    => 'ep-cool-forest-12345.ap-southeast-1.aws.neon.tech', // bagian setelah @
    'port'    => 5432,
    'name'    => 'neondb',           // bagian setelah host, sebelum ?
    'user'    => 'neondb_owner',     // bagian sebelum :
    'pass'    => 'AbCd1234XyZ',      // bagian setelah : sampai sebelum @
    'sslmode' => 'require',
];
```

4. Simpan. File ini **otomatis diabaikan Git** (lewat `.gitignore`), jadi aman.

---

## TAHAP 6 -- Coba jalankan di komputer dengan XAMPP

Kamu **tidak perlu install PostgreSQL** di komputer -- PHP di komputermu langsung
terhubung ke database Neon yang sudah online di internet.

1. Buka XAMPP Control Panel -> **Start** di **Apache** saja (MySQL tidak dipakai lagi).
2. Salin folder proyek ke `C:\xampp\htdocs\yanntrip-php\`.
3. Buka `http://localhost/yanntrip-php/index.php` -- website harus tampil.
4. Coba kirim booking di halaman **Kontak**.
5. Buka `http://localhost/yanntrip-php/login.php` -> login `admin` / `admin123` ->
   cek booking tadi muncul di dashboard.

Kalau semua berhasil, datamu sudah betulan tersimpan di Neon (bukan di komputermu),
jadi langkah berikutnya tinggal menaruh kodenya online.

---

## TAHAP 7 -- Commit dan push ke GitHub

### 7a. Masukkan folder proyek ke GitHub Desktop
1. **File -> Add local repository...** -> **Choose...** -> pilih folder proyek.
2. Kalau diminta, klik **create a repository** -> biarkan isian bawaan -> **Create Repository**.

### 7b. Periksa dulu (PENTING)
Di daftar perubahan GitHub Desktop:
- HARUS ADA: semua `.php`, `Dockerfile`, `database/yanntrip.sql`, `includes/config.local.example.php`
- TIDAK BOLEH ADA: `includes/config.local.php` (berisi password Neon-mu)

### 7c. Commit lalu Publish
1. Kolom **Summary** (kiri bawah): tulis `Versi PostgreSQL Yann Trip Malang`.
2. Klik **Commit to main**.
3. Klik **Publish repository** (bar biru di atas) -> beri nama, misal `yanntrip-malang`
   -> centang **Keep this code private** kalau tidak ingin publik -> **Publish repository**.
4. Cek di github.com, pastikan file-filenya sudah ada (dan `config.local.php` **tidak** ada).

---

## TAHAP 8 -- Daftar Render dan hubungkan ke GitHub

1. Buka **render.com** -> **Get Started** -> daftar, paling gampang pakai **Sign up with GitHub**
   (otomatis tersambung, tidak perlu setting ulang nanti).
2. Di dashboard Render, klik **New** -> **Web Service**.
3. Pilih **Build and deploy from a Git repository** -> klik **Connect** di repo
   `yanntrip-malang` yang tadi kamu buat. (Kalau repo tidak muncul, klik
   **Configure account** untuk memberi Render izin membaca repo itu.)
4. Isi pengaturan:
   - **Name**: bebas, misalnya `yanntrip-malang`
   - **Region**: pilih yang paling dekat (misalnya Singapore)
   - **Branch**: `main`
   - **Runtime**: pilih **Docker** (Render akan otomatis mengenali `Dockerfile` di repo-mu)
   - **Instance Type**: pilih **Free**
5. **Jangan klik Create dulu** -- scroll ke bagian **Environment Variables**, lanjut ke Tahap 9.

---

## TAHAP 9 -- Sambungkan ke database Neon

Masih di halaman pengaturan yang sama (sebelum klik Create):

1. Di bagian **Environment Variables**, klik **Add Environment Variable**.
2. **Key**: ketik `DATABASE_URL`
3. **Value**: tempel **connection string Neon** yang kamu salin di Tahap 3, persis apa adanya.
4. Klik **Create Web Service**.

Render akan mulai mem-build Dockerfile-nya dan menjalankan website-mu. Proses pertama
biasanya 2-5 menit -- kamu bisa melihat prosesnya berjalan di tab **Logs**.

---

## TAHAP 10 -- Buka websitemu dan tes

1. Setelah status jadi **Live** (ada tulisan hijau), klik link di bagian atas halaman
   (bentuknya `https://yanntrip-malang.onrender.com` atau serupa).
2. Cek berurutan:
   - Beranda tampil lengkap dengan gambar & warna.
   - Buka halaman Paket, Galeri, Tentang, Kontak.
   - Di **Kontak**, kirim booking percobaan -> muncul "Terima kasih...".
   - Buka `alamat-websitemu/login.php` -> login `admin` / `admin123`.
   - Booking tadi muncul di dashboard (ini database yang **sama** dengan yang kamu
     pakai saat tes di XAMPP tadi, jadi booking dari percobaan lokal juga akan kelihatan).
3. **Segera ganti password admin** (klik tombol **Ganti Password** di dashboard).

### Catatan soal paket gratis Render
Web service gratis Render akan "tidur" kalau tidak ada yang mengakses selama beberapa
saat, dan baru bangun lagi (perlu beberapa puluh detik) saat ada yang membuka website-mu.
Ini normal untuk paket gratis dan cukup untuk keperluan tugas kuliah.

---

## TAHAP 11 -- Kalau ada masalah

| Gejala | Kemungkinan penyebab | Solusi |
|---|---|---|
| Build gagal, log menyebut `Dockerfile` | File `Dockerfile` tidak ikut ter-push ke GitHub | Cek di github.com apakah `Dockerfile` ada di root repo |
| "Pengaturan database belum diisi" | `DATABASE_URL` belum diisi di Render | Tahap 9: Settings service -> Environment -> tambahkan `DATABASE_URL` |
| `SQLSTATE[08006]` / connection refused | Connection string salah ketik, atau project Neon lama tidak dipakai | Cek ulang connection string; buka dashboard Neon untuk membangunkan project |
| Tabel `admin`/`booking` tidak ada | Tahap 4 belum dijalankan atau Run belum diklik | Ulangi Tahap 4 |
| Halaman tampil polos tanpa warna | Folder `assets` tidak ikut ter-commit | Cek di GitHub, folder `assets/css/style.css` harus ada |
| Render menampilkan "Deploy failed" | Lihat tab **Logs** di Render, biasanya pesan errornya jelas (nama file, baris) | Perbaiki errornya di komputer, commit, push lagi -- Render auto-deploy ulang |
| Login lokal (XAMPP) gagal tersambung | `config.local.php` belum dibuat / salah isi | Ulangi Tahap 5, pastikan tidak ada spasi tambahan |

---

## TAHAP 12 -- Kalau nanti mengubah sesuatu di website

Berbeda dengan hosting manual, di sini **cukup satu langkah**:

1. Edit file di komputer.
2. GitHub Desktop -> tulis **Summary** -> **Commit to main** -> **Push origin**.
3. Selesai -- Render otomatis mendeteksi perubahan di GitHub dan mem-build ulang
   website-mu dalam beberapa menit. Tidak perlu upload manual.

---

## Catatan keamanan (singkat)

- Repo **Private** lebih aman. Kalau harus Public, pastikan password admin sudah diganti
  dari `admin123`.
- **Jangan pernah** commit `includes/config.local.php` atau menempel connection string
  Neon langsung di kode manapun -- selalu lewat Environment Variable (Render) atau
  `config.local.php` (lokal, dan sudah diabaikan Git).
- Kalau connection string Neon sempat terlihat orang lain, buka dashboard Neon ->
  reset password database, lalu perbarui di Render (Environment Variables) dan
  `config.local.php`.

Selesai! Kalau ada langkah yang tidak cocok dengan tampilan di layarmu, catat pesan
error atau screenshot, lalu tanyakan.
