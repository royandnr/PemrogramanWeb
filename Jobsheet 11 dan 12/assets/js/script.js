// =========================================================
// Yann Trip Malang — interaksi umum
// (Pengiriman form booking sekarang ditangani PHP di kontak.php)
// =========================================================

document.addEventListener("DOMContentLoaded", function () {
  // Tahun otomatis di footer
  document.querySelectorAll(".tahun-sekarang").forEach(function (el) {
    el.textContent = new Date().getFullYear();
  });
});
