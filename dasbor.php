<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] !== "login") {
    header("location:index.php?error=akses");
    exit;
  }
  
include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM laporan ORDER BY id DESC");

// untuk card laporan terbaru
$queryCard = mysqli_query($koneksi, "SELECT * FROM laporan ORDER BY id DESC LIMIT 3");

// total laporan
$totalLaporan = mysqli_query(
    $koneksi,
    "SELECT COUNT(*) AS total FROM laporan"
);
$totalLaporan = mysqli_fetch_assoc($totalLaporan);

// laporan selesai
$totalSelesai = mysqli_query(
    $koneksi,
    "SELECT COUNT(*) AS total 
     FROM laporan 
     WHERE status='Selesai'"
);
$totalSelesai = mysqli_fetch_assoc($totalSelesai);

// laporan diproses
$totalDiproses = mysqli_query(
    $koneksi,
    "SELECT COUNT(*) AS total 
     FROM laporan 
     WHERE status='Proses'"
);
$totalDiproses = mysqli_fetch_assoc($totalDiproses);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <title>E-Lapor</title>
  <style>
  @media (max-width: 768px) {
  table {
    font-size: 12px;
  }

  .table td,
  .table th {
    padding: 6px;
  }

  .badge {
    font-size: 10px;
  }
}
</style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">
      <i class="bi bi-megaphone-fill me-2"></i>
      E-Lapor
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMain">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">
            <i class="bi bi-house-door me-1"></i>
            Beranda
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="form_lapor.php">
            <i class="bi bi-pencil-square me-1"></i>
            Buat Laporan
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#daftar-laporan">
            <i class="bi bi-list-ul me-1"></i>
            Daftar Laporan
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<section class="bg-primary text-white py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <h1 class="fw-bold mb-3">
          Layanan Pengaduan<br>
          Masyarakat Digital
        </h1>
        <p class="mb-4">
          Sampaikan laporan, pengaduan, dan aspirasi anda secara mudah,
          cepat, dan terpercaya.
        </p>
        <a href="form_lapor.php" class="btn btn-warning fw-bold px-4 py-2">
          <i class="bi bi-plus-circle me-2"></i>
          Buat Laporan Sekarang
        </a>
      </div>
      <div class="col-lg-5 text-center d-none d-lg-block">
        <i class="bi bi-file-earmark-text display-1 opacity-50"></i>
      </div>
    </div>
  </div>
</section>

<div class="bg-white border-bottom py-4">
  <div class="container">
    <div class="row text-center">
      <div class="col-4">
        <h2 class="fw-bold text-primary"><?= $totalLaporan['total']; ?></h2>
        <small class="text-muted">Total Laporan</small>
      </div>

      <div class="col-4">
        <h2 class="fw-bold text-success"><?= $totalSelesai['total']; ?></h2>
        <small class="text-muted">Selesai</small>
      </div>

      <div class="col-4">
        <h2 class="fw-bold text-warning"><?= $totalDiproses['total']; ?></h2>
        <small class="text-muted">Diproses</small>
      </div>
    </div>
  </div>
</div>

<div class="container my-5">
  <h3 class="fw-bold mb-4">Laporan Terbaru</h3>
  <div class="row g-4 mb-5">
    <?php
    while ($card = mysqli_fetch_assoc($queryCard)) {

        // badge status
        if ($card['status'] == 'Baru') {
            $badge = 'bg-primary';
        } elseif ($card['status'] == 'Proses') {
            $badge = 'bg-warning text-dark';
        } else {
            $badge = 'bg-success';
        }

        echo '
    <div class="col-md-4">
      <div class="card shadow h-100">
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between mb-3">
            <span class="badge ' . $badge . '">
            ' . $card['status'] . '
            </span>
            <small class="text-muted">
            ' . date('d F Y', strtotime($card['tanggal'])) . '
            </small>
          </div>
          <p class="text-muted">
          ' . substr($card['isi_laporan'], 0, 120) . '
          </p>
          <div class="mt-auto">
            <i class="bi bi-person-circle me-2"></i>
            <small class="text-muted">
            ' . $card['nama_pelapor'] . '
            </small>
          </div>

        </div>
      </div>
    </div>';
    }
    ?>
  </div>

  <h3 class="fw-bold mb-4">Semua Laporan</h3>
  <div class="card shadow">
    <div class="table-responsive">
      <table class="table table-striped table-hover mb-0" id="daftar-laporan">
        <thead class="table-primary">
          <tr>
            <th>Pelapor</th>
            <th>Isi Laporan</th>
            <th>Tanggal</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_assoc($query)) : ?>
            <tr>
              <td><?= $row['nama_pelapor']; ?></td>
              <td><?= $row['isi_laporan']; ?></td>
              <td>
                <?= date('d F Y', strtotime($row['tanggal'])); ?>
              </td>
              <td>
                <?php if($row['status'] == 'Baru') : ?>
                  <span class="badge bg-primary">
                    <?= $row['status']; ?>
                  </span>

                  <?php elseif($row['status'] == 'Proses') : ?>
                    <span class="badge bg-warning text-dark">
                      <?= $row['status']; ?>
                    </span>

                    <?php else : ?>
                      <span class="badge bg-success">
                        <?= $row['status']; ?>
                      </span>
                      <?php endif; ?>
                    </td>
                  </tr>
                  <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<footer class="bg-dark text-white text-center py-4">
  <div class="container">
    <p class="mb-0">
      <i class="bi bi-megaphone-fill me-2 text-warning"></i>
      E-Lapor — Sistem Pengaduan Masyarakat Digital
    </p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>