document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formLapor');
  const btnKirim = document.getElementById('btnKirim');
  const inputNama = document.getElementById('nama_pelapor');
  const errorNama = document.getElementById('error-nama');
  if (form && btnKirim) {
    btnKirim.addEventListener('click', function (e) {
 const namaNilai = inputNama ? inputNama.value.trim() : '';

      if (namaNilai === '') {
                if (inputNama) inputNama.classList.add('is-invalid');
        if (errorNama) errorNama.style.display = 'block';
         e.preventDefault();
 if (inputNama) inputNama.focus();
        return;
        } else {
             if (inputNama) inputNama.classList.remove('is-invalid');
        if (errorNama) errorNama.style.display = 'none';
      }
       const konfirmasi = confirm(
        'Apakah Anda yakin data laporan sudah benar?\n\n'
      );
      if (!konfirmasi) {
         e.preventDefault();
      }
    });
     if (inputNama) {
      inputNama.addEventListener('input', function () {
        if (this.value.trim() !== '') {
          this.classList.remove('is-invalid');
          if (errorNama) errorNama.style.display = 'none';
        }
      });
    }

  }

});
