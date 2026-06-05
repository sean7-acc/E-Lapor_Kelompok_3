<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | E-Lapor</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
</head>

<body class="bg-primary bg-gradient d-flex align-items-center justify-content-center min-vh-100">

  <div class="card border-0 shadow-lg rounded-4 p-4" style="width: 100%; max-width: 400px;">

    <div class="text-center mb-4">
      <h1 class="fw-bold text-primary mb-1">
        E-<span class="text-warning">Lapor</span>
      </h1>

      <p class="text-muted small mb-0">
        Panel Admin — Masuk untuk melanjutkan
      </p>
    </div>

    <?php if (isset($_GET['error'])): ?>
      <div class="alert alert-danger d-flex align-items-center">
        <i class="bi bi-exclamation-triangle me-2"></i>

        <div>
          <?php
            if ($_GET['error'] === 'wrong') {
              echo 'Username atau password salah!';
            }

            if ($_GET['error'] === 'empty') {
              echo 'Username dan password wajib diisi!';
            }

            if ($_GET['error'] === 'akses') {
              echo 'Anda harus login terlebih dahulu.';
            }
          ?>
        </div>
      </div>
    <?php endif; ?>

    <form action="proses_login.php" method="POST">

      <div class="mb-3">
        <label for="username" class="form-label fw-semibold">
          Username
        </label>

        <div class="input-group">
          <span class="input-group-text">
            <i class="bi bi-person"></i>
          </span>

          <input
            type="text"
            class="form-control"
            id="username"
            name="username"
            placeholder="Masukkan username"
            required>
        </div>
      </div>

      <div class="mb-4">
        <label for="password" class="form-label fw-semibold">
          Password
        </label>

        <div class="input-group">
          <span class="input-group-text">
            <i class="bi bi-lock"></i>
          </span>

          <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            placeholder="Masukkan password"
            required>
        </div>
      </div>

      <button type="submit"
              class="btn btn-primary w-100 fw-bold py-2 rounded-3">

        <i class="bi bi-box-arrow-in-right me-2"></i>
        Masuk
      </button>

    </form>

  </div>

</body>
</html>