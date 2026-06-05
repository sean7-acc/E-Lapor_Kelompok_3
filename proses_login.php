<?php
session_start();

include 'koneksi.php';

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if (empty($username) || empty($password)) {
    header("location:login.php?error=empty");
    exit;
}

$password_md5 = MD5($password);

$sql  = "SELECT * FROM admin WHERE username='$username' AND password='$password_md5'";
$hasil = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($hasil) === 1) {
    $data_admin = mysqli_fetch_array($hasil);
    $_SESSION['status']   = "login";
    $_SESSION['username'] = $data_admin['username'];
    $_SESSION['id_admin'] = $data_admin['id'];

    header("location:dasbor.php");
    exit;
} else {
    header("location:index.php?error=wrong");
    exit;
}
?>