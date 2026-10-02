-- =========================================================
-- Database Yann Trip Malang (PostgreSQL)
-- Cara pakai:
--  - Neon: buka SQL Editor di dashboard Neon, tempel isi file ini, Run.
--  - psql lokal: psql "URL_KONEKSI_KAMU" -f database/yanntrip.sql
-- =========================================================

-- ---------------------------------------------------------
-- Tabel admin: akun yang boleh masuk ke dashboard
-- ---------------------------------------------------------
CREATE TABLE IF NOT EXISTS admin (
  id         SERIAL PRIMARY KEY,
  username   VARCHAR(50)  NOT NULL UNIQUE,
  password   VARCHAR(255) NOT NULL,         -- disimpan dalam bentuk hash, bukan teks asli
  created_at TIMESTAMPTZ  NOT NULL DEFAULT now()
);

-- ---------------------------------------------------------
-- Tabel booking: permintaan booking dari form di halaman Kontak
-- ---------------------------------------------------------
CREATE TABLE IF NOT EXISTS booking (
  id              SERIAL PRIMARY KEY,
  nama            VARCHAR(100) NOT NULL,
  whatsapp        VARCHAR(20)  NOT NULL,
  paket           VARCHAR(100) NOT NULL,
  jumlah_peserta  INTEGER      NOT NULL DEFAULT 1,
  catatan         TEXT         NULL,
  status          VARCHAR(20)  NOT NULL DEFAULT 'baru'
                   CHECK (status IN ('baru','dihubungi','dikonfirmasi','batal')),
  created_at      TIMESTAMPTZ  NOT NULL DEFAULT now()
);

-- ---------------------------------------------------------
-- Akun admin awal  ->  username: admin | password: admin123
-- (Segera ganti password ini lewat halaman "Ganti Password" setelah online!)
-- ---------------------------------------------------------
INSERT INTO admin (username, password)
VALUES ('admin', '$2y$10$O0D.Omyq.cWYoaQl87dVHu4uaBSxOGarjEIajXN9NtUw4cfoWU2xi')
ON CONFLICT (username) DO NOTHING;
