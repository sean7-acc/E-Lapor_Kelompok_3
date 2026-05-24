// datatable untuk laporan (baru)
$(document).ready(function () {

  $('#daftar-laporan').DataTable({
    pageLength: 5,
    lengthChange: false,
    searching: false,
    info: false
  });

});
document.addEventListener('DOMContentLoaded', function () {

  // Ambil elemen form dan tombol submit
  const form = document.getElementById('formLapor');
  const btnKirim = document.getElementById('btnKirim');
  const inputNama = document.getElementById('nama_pelapor');
  const errorNama = document.getElementById('error-nama');
   // tambah ambil elemen isi laporan (baru)
  const inputLaporan = document.getElementById('isi_laporan');
  const errorLaporan = document.getElementById('error-laporan');

  // Hanya jalankan jika elemen form ada di halaman
  if (form && btnKirim) {

    // === EVENT: Klik tombol submit ===
    btnKirim.addEventListener('click', function (e) {

      // --- Validasi 1: Cek nama pelapor tidak kosong ---
      const namaNilai = inputNama ? inputNama.value.trim() : '';

      if (namaNilai === '') {
        // Tampilkan pesan error
        if (inputNama) inputNama.classList.add('is-invalid');
        if (errorNama) errorNama.style.display = 'block';

        // Cegah form terkirim
        e.preventDefault();

        // Fokus ke field nama
        if (inputNama) inputNama.focus();
        return; // Hentikan eksekusi berikutnya
      } else {
        // Hilangkan error jika sudah terisi
        if (inputNama) inputNama.classList.remove('is-invalid');
        if (errorNama) errorNama.style.display = 'none';
      }

      // validasi isi laporan minimal 20 karakter (baru)
      const laporanNilai = inputLaporan
        ? inputLaporan.value.trim()
        : '';

      if (laporanNilai.length < 20) {

        if (inputLaporan) {
          inputLaporan.classList.add('is-invalid');
          inputLaporan.focus();
        }

        if (errorLaporan) {
          errorLaporan.style.display = 'block';
        }

        e.preventDefault();
        return;

      } else {

        if (inputLaporan) {
          inputLaporan.classList.remove('is-invalid');
        }

        if (errorLaporan) {
          errorLaporan.style.display = 'none';
        }

      }

      // --- Validasi 2: Konfirmasi pengiriman data ---
      const konfirmasi = confirm(
        'Apakah Anda yakin data laporan sudah benar?\n\n'
      );

      if (!konfirmasi) {
        // Pengguna klik Batal — cegah pengiriman
        e.preventDefault();
      }
      // Jika OK, form akan dikirim secara normal ke proses_lapor.php

    });

    // === EVENT: Live validation - hilangkan error saat user mulai mengetik ===
    if (inputNama) {
      inputNama.addEventListener('input', function () {
        if (this.value.trim() !== '') {
          this.classList.remove('is-invalid');
          if (errorNama) errorNama.style.display = 'none';
        }
      });
    }
  }

  // === EVENT: Live validation - hilangkan error saat user mulai mengetik (minimal 20 karakter) baru ===
  if (inputLaporan) {
  inputLaporan.addEventListener('input', function () {
    if (this.value.trim().length >= 20) {
      this.classList.remove('is-invalid');
      if (errorLaporan) {
        errorLaporan.style.display = 'none';
      }
    } else {
      this.classList.add('is-invalid');
      if (errorLaporan) {
        errorLaporan.style.display = 'block';
      }
    }
  });
}


});
$(document).ready(function () {

  $('#daftar-laporan').DataTable({
    pageLength: 5,
    lengthChange: false,
    searching: false,
    info: false
  });

});
