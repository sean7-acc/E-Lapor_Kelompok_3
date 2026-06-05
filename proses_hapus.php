<?php
// hapus.php - Eksekusi SQL DELETE Laporan
session_start();

// Proteksi: hanya admin yang bisa akses
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "login") {
    header("location:index.php?error=akses");
    exit;
}

include 'koneksi.php';

// Tangkap ID dari URL menggunakan $_GET
$id = $_GET['id'];
$id = (int)$id; // Casting ke integer untuk keamanan

// Eksekusi query DELETE
mysqli_query($koneksi, "DELETE FROM laporan WHERE id='$id'");

// Arahkan kembali ke dasbor dengan pesan sukses
header("location:dasbor.php?pesan=hapus");
exit;
?>