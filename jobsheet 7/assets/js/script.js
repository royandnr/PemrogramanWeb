// =========================================================
// Yann Trip Malang — interaksi umum
// =========================================================

document.addEventListener("DOMContentLoaded", function () {
  // Tahun otomatis di footer
  var tahunEl = document.querySelectorAll(".tahun-sekarang");
  tahunEl.forEach(function (el) {
    el.textContent = new Date().getFullYear();
  });

  // Tandai menu aktif berdasarkan file halaman saat ini
  var path = window.location.pathname.split("/").pop() || "index.html";
  document.querySelectorAll(".navbar-otm .nav-link").forEach(function (link) {
    var href = link.getAttribute("href");
    if (href === path) {
      link.classList.add("active");
    }
  });

  // Form kontak -> buka WhatsApp dengan pesan terisi otomatis
  var formKontak = document.getElementById("form-kontak");
  if (formKontak) {
    formKontak.addEventListener("submit", function (e) {
      e.preventDefault();
      var nama = document.getElementById("nama").value.trim();
      var whatsapp = document.getElementById("whatsapp").value.trim();
      var paket = document.getElementById("paket").value;
      var jumlah = document.getElementById("jumlah").value;
      var catatan = document.getElementById("pesan").value.trim();
      var pesanEl = document.getElementById("pesan-status");

      if (nama.length < 3 || whatsapp.length < 8) {
        pesanEl.textContent =
          "Mohon lengkapi nama dan nomor WhatsApp dengan benar.";
        pesanEl.className = "mt-3 text-danger";
        return;
      }

      var teks =
        "Halo Yann Trip Malang, saya ingin booking trip.\n\n" +
        "Nama: " + nama + "\n" +
        "No. WhatsApp: " + whatsapp + "\n" +
        "Paket: " + paket + "\n" +
        "Jumlah peserta: " + jumlah +
        (catatan ? "\nCatatan: " + catatan : "");

      var nomorAdmin = "628979158187";
      var link = "https://wa.me/" + nomorAdmin + "?text=" + encodeURIComponent(teks);

      pesanEl.textContent =
        "Membuka WhatsApp untuk mengirim permintaan booking kamu...";
      pesanEl.className = "mt-3 text-success";

      window.open(link, "_blank");
      formKontak.reset();
    });
  }
});
