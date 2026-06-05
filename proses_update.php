<?php
// proses_update.php - Eksekusi SQL UPDATE Status Laporan
session_start();

// Proteksi: hanya admin yang bisa akses
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "login") {
    header("location:index.php?error=akses");
    exit;
}

include 'koneksi.php';


$id = $_POST['id'];
$nama = $_POST['nama_pelapor'];
$isi = $_POST['isi_laporan'];
$status = $_POST['status'];

$query = mysqli_query(
    $koneksi,
    "UPDATE laporan SET
    nama_pelapor='$nama',
    isi_laporan='$isi',
    status='$status'
    WHERE id='$id'"
);

if ($query) {
    header("Location: dasbor.php");
} else {
    echo "Gagal update data!";
}
?>