<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>

  <title>Form Laporan | E-Lapor</title>
</head>

<body class="bg-light">
<!-- NAVBAR -->
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
          <a class="nav-link" href="index.php">
            <i class="bi bi-house-door me-1"></i>
            Beranda
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="form_lapor.php">
            <i class="bi bi-pencil-square me-1"></i>
            Buat Laporan
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php#daftar-laporan">
            <i class="bi bi-list-ul me-1"></i>
            Daftar Laporan
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- HEADER -->
<section class="bg-primary text-white py-5">
  <div class="container">
    <h2 class="fw-bold mb-2">
      <i class="bi bi-pencil-square me-2"></i>
      Formulir Pengaduan Masyarakat
    </h2>
    <p class="mb-0">
      Isi formulir di bawah ini dengan lengkap dan jelas.
    </p>
  </div>
</section>

<!-- FORM -->
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <!-- ALERT -->
      <div class="alert alert-primary d-flex align-items-start gap-2 mb-4">
        <i class="bi bi-info-circle-fill"></i>
        <div>
          <strong>Petunjuk Pengisian:</strong>
          Pastikan nama pelapor wajib terisi. Isi laporan dengan jelas & sertakan bukti foto agar dapat segera ditindak lanjuti.
        </div>
      </div>

      <!-- CARD -->
      <div class="card shadow border-0">
        <div class="card-body p-4">
          <h4 class="fw-bold text-primary mb-4">
            <i class="bi bi-file-earmark-text me-2"></i>
            Data Laporan
          </h4>

          <form action="proses_lapor.php" method="POST" enctype="multipart/form-data" id="formLapor">
            <!-- NAMA -->
            <div class="mb-4">
              <label class="form-label fw-semibold">
                Nama Pelapor
              </label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="bi bi-person"></i>
                </span>
                <input class="form-control" type="text" id="nama_pelapor" name="nama_pelapor" placeholder="Masukkan nama lengkap Anda">
              </div>
              <div id="error-nama" class="text-danger mt-1" style="display:none;">
                <i class="bi bi-exclamation-circle me-1"></i>Nama pelapor tidak boleh kosong!
              </div>
            </div>
            <!-- ISI LAPORAN -->
            <div class="mb-4">
              <label class="form-label fw-semibold">
                Isi Laporan
              </label>
              <textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="5" placeholder="Jelaskan permasalahan yang ingin dilaporkan dengan detail..." required></textarea>
              <div id="error-laporan" class="text-danger mt-1" style="display:none;">
                <i class="bi bi-exclamation-circle me-1"></i>Minimal 20 karakter!
              </div>
            </div>
            <!-- FILE -->
            <div class="mb-4">
              <label class="form-label fw-semibold">
                Lampiran Foto Bukti
              </label>
              <input class="form-control" type="file" name="foto_bukti" accept="image/*">
              <div class="form-text">
                Format JPG, JPEG atau PNG.
              </div>
            </div>
            <!-- BUTTON -->
            <div class="d-flex justify-content-between border-top pt-4">
              <a href="index.php" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali
              </a>
              <button type="submit" class="btn btn-primary" id="btnKirim">
                <i class="bi bi-send me-2"></i>
                Kirim Laporan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-4 mt-5">
  <div class="container">
    <p class="mb-0">
      <i class="bi bi-megaphone-fill me-2 text-warning"></i>
      E-Lapor — Sistem Pengaduan Masyarakat Digital
    </p>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>