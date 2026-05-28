<?php
include 'koneksi.php';

// Cek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data form
    $nama_pelapor = htmlspecialchars($_POST['nama_pelapor']);
    $isi_laporan  = htmlspecialchars($_POST['isi_laporan']);

    // Default nama file
    $namaFile = null;

    // Cek apakah ada file diupload
    if (isset($_FILES['foto_bukti']) && $_FILES['foto_bukti']['error'] == 0) {

        $fileTmp  = $_FILES['foto_bukti']['tmp_name'];
        $fileName = $_FILES['foto_bukti']['name'];
        $fileSize = $_FILES['foto_bukti']['size'];

        // Ambil ekstensi file
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Format yang diizinkan
        $allowed = ['jpg', 'jpeg', 'png'];

        if (in_array($ext, $allowed)) {

            // Nama file unik
            $namaFile = time() . '-' . $fileName;

            // Upload file
            move_uploaded_file(
                $fileTmp,
                "gbr/" . $namaFile
            );

        } else {
            die("Format file tidak valid!");
        }
    }

    // Query simpan ke database
    $query = "INSERT INTO laporan
              (nama_pelapor, isi_laporan, foto_bukti)
              VALUES
              ('$nama_pelapor', '$isi_laporan', '$namaFile')";

    $simpan = mysqli_query($koneksi, $query);

    // Cek berhasil
    if ($simpan) {

        echo "
        <script>
            alert('Laporan berhasil dikirim!');
            window.location='index.php';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Gagal menyimpan laporan!');
            window.history.back();
        </script>
        ";
    }
}
?>