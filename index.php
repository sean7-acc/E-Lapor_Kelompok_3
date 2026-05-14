<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <title>E-Lapor</title>
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
        <h2 class="fw-bold text-primary">4</h2>
        <small class="text-muted">Total Laporan</small>
      </div>

      <div class="col-4">
        <h2 class="fw-bold text-success">2</h2>
        <small class="text-muted">Selesai</small>
      </div>

      <div class="col-4">
        <h2 class="fw-bold text-warning">1</h2>
        <small class="text-muted">Diproses</small>
      </div>
    </div>
  </div>
</div>

<div class="container my-5">
  <h3 class="fw-bold mb-4">Laporan Terbaru</h3>
  <div class="row g-4 mb-5">

    <div class="col-md-4">
      <div class="card shadow h-100">
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between mb-3">
            <span class="badge bg-primary">Baru</span>
            <small class="text-muted">12 April 2026</small>
          </div>
          <p class="text-muted">
            Apa penyebab antrian menjadi panjang? Apakah ada pembatasan kuota bbm untuk wilayah palangkaraya? tolong solusinya! sangat rentan terjadi kekacauan jika terus berlanjut, dampaknya masyarakat disekitarnya (area pom) juga akan terkena dampaknya, tolong secara ditindak lanjutin untuk menyelesaikan permasalahan ini!
          </p>
          <div class="mt-auto">
            <i class="bi bi-person-circle me-2"></i>
            <small class="text-muted">Apriyanto Tagu Bore</small>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow h-100">
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between mb-3">
            <span class="badge bg-warning text-dark">Diproses</span>
            <small class="text-muted">10 April 2026</small>
          </div>
          <p class="text-muted">
            Tolong dibersihkan tumpahan solar di jalan lingkar luar.
          </p>
          <div class="mt-auto">
            <i class="bi bi-person-circle me-2"></i>
            <small class="text-muted">Andreano Tuah</small>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow h-100">
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between mb-3">
            <span class="badge bg-success">Selesai</span>
            <small class="text-muted">30 Maret 2026</small>
          </div>
          <p class="text-muted">
            Tolong dikondisikan, di jalan garuda induk banyak pengendara motor ugal-ugalan saat masuk jam malam.
          </p>
          <div class="mt-auto">
            <i class="bi bi-person-circle me-2"></i>
            <small class="text-muted">Sean Joses Emanuel</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <h3 class="fw-bold mb-4">Semua Laporan</h3>
  <div class="card shadow">
    <div class="table-responsive">
      <table class="table table-striped table-hover mb-0" id="daftar-laporan">
        <thead class="table-primary">
          <tr>
            <th>No</th>
            <th>Pelapor</th>
            <th>Isi Laporan</th>
            <th>Tanggal</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Apriyanto Tagu Bore</td>
            <td>Apa penyebab antrian menjadi panjang? Apakah ada pembatasan kuota bbm untuk wilayah palangkaraya? tolong solusinya! sangat rentan terjadi kekacauan jika terus berlanjut, dampaknya masyarakat disekitarnya (area pom) juga akan terkena dampaknya, tolong secara ditindak lanjutin untuk menyelesaikan permasalahan ini!</td>
            <td>12 April 2026</td>
            <td>
              <span class="badge bg-primary">Baru</span>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Andreano Tuah</td>
            <td>Tolong dibersihkan tumpahan solar di jalan lingkar luar.</td>
            <td>10 April 2026</td>
            <td>
              <span class="badge bg-warning text-dark">Proses</span>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>Sean Joses Emanuel</td>
            <td>Tolong dikondisikan, di jalan garuda induk banyak pengendara motor ugal-ugalan saat masuk jam malam.</td>
            <td>30 Maret 2026</td>
            <td>
              <span class="badge bg-success">Selesai</span>
            </td>
          </tr>
          <tr>
            <td>4</td>
            <td>Joe Gamaniel Dinata</td>
            <td>Lampu rambu lalu lintas di jalan garuda induk sudah tidak berfungsi selama 5 hari, tolong diselesaikan!</td>
            <td>19 Maret 2026</td>
            <td>
              <span class="badge bg-success">Selesai</span>
            </td>
          </tr>
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
</body>
</html>