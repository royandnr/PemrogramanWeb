CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS booking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    whatsapp VARCHAR(20) NOT NULL,
    paket VARCHAR(100) NOT NULL,
    jumlah_peserta INT NOT NULL DEFAULT 1,
    catatan TEXT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'baru',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT chk_booking_status
        CHECK (status IN ('baru', 'dihubungi', 'dikonfirmasi', 'batal'))
);

INSERT INTO admin (username, password)
VALUES (
    'admin',
    '$2y$10$O0D.Omyq.cWYoaQl87dVHu4uaBSxOGarjEIajXN9NtUw4cfoWU2xi'
)
ON DUPLICATE KEY UPDATE username = username;