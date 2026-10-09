<?php
require_once __DIR__ . '/includes/auth.php';

$page_title       = 'Kontak — Yann Trip Malang';
$page_description = 'Hubungi Yann Trip Malang untuk booking paket trip Bromo, Ijen, dan destinasi lainnya.';
$current_page     = 'kontak';

// Daftar paket untuk dropdown sekaligus untuk validasi di server
$daftar_paket = [
    'Bromo Sunrise Trip',
    'Kawah Ijen Blue Fire',
    'Coban Rondo & Batu',
    'Semeru Basecamp Trip',
    'Malang City & Heritage Tour',
    'Lainnya / private trip',
];

$nomor_admin_wa = '628979158187';

/** Hitung panjang teks (aman untuk huruf non-ASCII, tidak wajib ekstensi mbstring) */
function panjang_teks(string $s): int
{
    return function_exists('mb_strlen') ? mb_strlen($s) : (int) preg_match_all('/./us', $s);
}
$errors = [];
$old = ['nama' => '', 'whatsapp' => '', 'paket' => $daftar_paket[0], 'jumlah' => '2', 'catatan' => ''];

// Pesan sukses (dari redirect setelah simpan)
$sukses = $_SESSION['booking_sukses'] ?? null;
unset($_SESSION['booking_sukses']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old['nama']     = trim($_POST['nama'] ?? '');
    $old['whatsapp'] = trim($_POST['whatsapp'] ?? '');
    $old['paket']    = $_POST['paket'] ?? '';
    $old['jumlah']   = trim($_POST['jumlah'] ?? '');
    $old['catatan']  = trim($_POST['catatan'] ?? '');

    if (!csrf_valid($_POST['csrf_token'] ?? null)) {
        $errors[] = 'Sesi form kedaluwarsa, silakan coba kirim lagi.';
    }
    if (panjang_teks($old['nama']) < 3 || panjang_teks($old['nama']) > 100) {
        $errors[] = 'Nama lengkap wajib diisi (minimal 3 huruf).';
    }
    $digits = preg_replace('/\D/', '', $old['whatsapp']);
    if (strlen($digits) < 9 || strlen($digits) > 15) {
        $errors[] = 'Nomor WhatsApp tidak valid.';
    }
    if (!in_array($old['paket'], $daftar_paket, true)) {
        $errors[] = 'Pilih paket yang tersedia.';
    }
    $jumlah = filter_var($old['jumlah'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]);
    if ($jumlah === false) {
        $errors[] = 'Jumlah peserta harus berupa angka 1 sampai 100.';
    }
    if (panjang_teks($old['catatan']) > 1000) {
        $errors[] = 'Catatan terlalu panjang (maksimal 1000 karakter).';
    }

    if (!$errors) {
        try {
            $stmt = db()->prepare(
                'INSERT INTO booking (nama, whatsapp, paket, jumlah_peserta, catatan) VALUES (?, ?, ?, ?, ?)'
            );
            $stmt->execute([
                $old['nama'],
                $digits,
                $old['paket'],
                $jumlah,
                $old['catatan'] !== '' ? $old['catatan'] : null,
            ]);

            $teks = "Halo Yann Trip Malang, saya ingin booking trip.\n\n"
                  . "Nama: {$old['nama']}\n"
                  . "No. WhatsApp: {$old['whatsapp']}\n"
                  . "Paket: {$old['paket']}\n"
                  . "Jumlah peserta: {$jumlah}"
                  . ($old['catatan'] !== '' ? "\nCatatan: {$old['catatan']}" : '');

            $_SESSION['booking_sukses'] = [
                'nama'    => $old['nama'],
                'wa_link' => 'https://wa.me/' . $nomor_admin_wa . '?text=' . rawurlencode($teks),
            ];

            // Post/Redirect/Get: supaya kalau halaman di-refresh, data tidak terkirim dua kali
            header('Location: kontak.php#form-booking');
            exit;
        } catch (PDOException $e) {
            $errors[] = 'Maaf, data belum bisa disimpan saat ini. Silakan hubungi kami langsung lewat WhatsApp.';
        }
    }
}

include 'includes/header.php';
?>

  <!-- ===================== HEADER HALAMAN ===================== -->
  <header class="header-halaman header-foto header-foto-kontak">
    <div class="container container-sempit">
      <p class="eyebrow">Kontak</p>
      <h1>Yuk atur trip kamu</h1>
      <p class="mt-3" style="max-width:55ch; color: rgba(243,238,226,0.8);">Isi form di bawah atau hubungi kami langsung lewat WhatsApp. Tim kami biasanya membalas dalam 1&ndash;2 jam.</p>
    </div>
  </header>

  <!-- ===================== FORM & INFO ===================== -->
  <section>
    <div class="container container-sempit">
      <div class="row g-5">

        <div class="col-lg-7">
          <div class="kotak-kontak">
            <h2 class="mb-4" id="form-booking" style="font-size:1.5rem;">Form Booking</h2>

            <?php if ($sukses): ?>
              <div class="notif-sukses mb-4">
                <strong>Terima kasih, <?= htmlspecialchars($sukses['nama']) ?>!</strong>
                Permintaan booking kamu sudah kami terima. Biar lebih cepat diproses, lanjutkan chat ke WhatsApp kami:
                <div class="mt-3">
                  <a href="<?= htmlspecialchars($sukses['wa_link']) ?>" target="_blank" rel="noopener" class="btn-otm">Lanjut ke WhatsApp</a>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($errors): ?>
              <div class="notif-error mb-4">
                <ul class="mb-0">
                  <?php foreach ($errors as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>

            <form method="post" action="kontak.php#form-booking" novalidate>
              <?= csrf_field() ?>
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="label-otm" for="nama">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control form-control-otm" id="nama" maxlength="100" value="<?= htmlspecialchars($old['nama']) ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="label-otm" for="whatsapp">Nomor WhatsApp</label>
                  <input type="tel" name="whatsapp" class="form-control form-control-otm" id="whatsapp" value="<?= htmlspecialchars($old['whatsapp']) ?>" placeholder="08xxxxxxxxxx" required>
                </div>
                <div class="col-md-6">
                  <label class="label-otm" for="paket">Paket yang Diminati</label>
                  <select name="paket" class="form-control form-control-otm" id="paket">
                    <?php foreach ($daftar_paket as $p): ?>
                      <option value="<?= htmlspecialchars($p) ?>" <?= $old['paket'] === $p ? 'selected' : '' ?>><?= htmlspecialchars($p) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="label-otm" for="jumlah">Jumlah Peserta</label>
                  <input type="number" name="jumlah" min="1" max="100" class="form-control form-control-otm" id="jumlah" value="<?= htmlspecialchars($old['jumlah']) ?>">
                </div>
                <div class="col-12">
                  <label class="label-otm" for="pesan">Catatan Tambahan</label>
                  <textarea name="catatan" class="form-control form-control-otm" id="pesan" rows="4" maxlength="1000" placeholder="Tanggal yang diinginkan, titik jemput, dll."><?= htmlspecialchars($old['catatan']) ?></textarea>
                </div>
              </div>
              <button type="submit" class="btn-otm mt-4">Kirim Permintaan</button>
            </form>
          </div>
        </div>

        <div class="col-lg-5">
          <p class="eyebrow">Info Kontak</p>
          <h2 class="mb-4" style="font-size:1.5rem;">Cara lain menghubungi kami</h2>

          <div class="mb-4">
            <p class="mb-1" style="color: var(--kabut); font-size:0.85rem;">WhatsApp</p>
            <p style="font-size:1.05rem;"><a href="https://wa.me/628979158187" target="_blank" rel="noopener">0897-9158-187</a></p>
          </div>
          <div class="mb-4">
            <p class="mb-1" style="color: var(--kabut); font-size:0.85rem;">Email</p>
            <p style="font-size:1.05rem;">halo@yanntripmalang.id</p>
          </div>
          <div class="mb-4">
            <p class="mb-1" style="color: var(--kabut); font-size:0.85rem;">Kantor</p>
            <p style="font-size:1.05rem;">Jl. Ijen No. 21, Malang, Jawa Timur</p>
          </div>
          <div class="mb-4">
            <p class="mb-1" style="color: var(--kabut); font-size:0.85rem;">Jam Operasional</p>
            <p style="font-size:1.05rem;">Setiap hari, 08.00&ndash;20.00 WIB</p>
          </div>

          <hr class="garis-pembatas my-4">

          <p class="mb-1" style="color: var(--kabut); font-size:0.85rem;">Pertanyaan umum</p>
          <p style="font-size:0.92rem; color: rgba(34,38,31,0.75);">DP booking sebesar 30% dan bisa dibayar lewat transfer bank atau QRIS. Pelunasan dilakukan H-1 sebelum keberangkatan.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ===================== CHECKLIST BARANG BAWAAN ===================== -->
  <section class="pt-0">
    <div class="container container-sempit">
      <div class="kotak-checklist">
        <p class="eyebrow mb-2">Persiapan Trip</p>
        <h3 style="font-size:1.2rem;">Barang yang wajib dibawa</h3>
        <ul>
          <li>Jaket tebal / windbreaker</li>
          <li>Sepatu tertutup, nyaman jalan jauh</li>
          <li>Masker &amp; sarung tangan (untuk trip Bromo/Ijen)</li>
          <li>Obat-obatan pribadi</li>
          <li>Powerbank &amp; charger</li>
          <li>Uang tunai secukupnya</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ===================== FAQ ===================== -->
  <section class="pt-0">
    <div class="container container-sempit">
      <p class="eyebrow">FAQ</p>
      <h2 class="section-judul mb-4">Pertanyaan yang sering ditanyakan</h2>

      <details class="faq-item" open>
        <summary>Bagaimana cara booking trip?</summary>
        <p>Isi form di atas atau chat langsung lewat WhatsApp dengan menyebutkan paket, tanggal, dan jumlah peserta. Tim kami akan konfirmasi ketersediaan tanggal dalam 1&ndash;2 jam.</p>
      </details>
      <details class="faq-item">
        <summary>Berapa DP yang harus dibayar?</summary>
        <p>DP sebesar 30% dari total biaya, bisa ditransfer lewat bank atau QRIS. Pelunasan dilakukan paling lambat H-1 sebelum keberangkatan.</p>
      </details>
      <details class="faq-item">
        <summary>Apakah bisa reschedule atau refund?</summary>
        <p>Reschedule bisa dilakukan maksimal H-3 sebelum keberangkatan tanpa biaya tambahan. Untuk refund, DP tidak dapat dikembalikan tapi bisa dialihkan ke jadwal trip lain.</p>
      </details>
      <details class="faq-item">
        <summary>Apakah cocok untuk anak-anak atau lansia?</summary>
        <p>Untuk trip santai seperti Coban Rondo &amp; Batu atau Malang City Tour, sangat cocok. Untuk trip mendaki seperti Semeru, kami sarankan peserta dalam kondisi fisik sehat dan terbiasa jalan jauh.</p>
      </details>
      <details class="faq-item">
        <summary>Berapa minimal peserta untuk berangkat?</summary>
        <p>Setiap paket punya minimal peserta berbeda (lihat di halaman Paket Trip). Kalau jumlah peserta belum mencukupi, kamu juga bisa request private trip dengan harga khusus.</p>
      </details>
    </div>
  </section>

<?php include 'includes/footer.php'; ?>
