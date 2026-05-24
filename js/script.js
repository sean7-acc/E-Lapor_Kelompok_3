document.addEventListener('DOMContentLoaded', function () {

  const form = document.getElementById('formLapor');
  const btnKirim = document.getElementById('btnKirim');
  const inputNama = document.getElementById('nama_pelapor');
  const errorNama = document.getElementById('error-nama');
  const inputLaporan = document.getElementById('isi_laporan');
  const errorLaporan = document.getElementById('error-laporan');

 
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
