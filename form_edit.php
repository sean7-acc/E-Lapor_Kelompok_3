<?php
include 'koneksi.php';

// ambil id dari URL
$id = $_GET['id'];

// ambil data berdasarkan id
$query = mysqli_query(
    $koneksi,
    "SELECT * FROM laporan WHERE id='$id'"
);

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Laporan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">
                Edit Laporan
            </h4>
        </div>

        <div class="card-body">

            <form action="proses_update.php" method="POST">

                <!-- kirim id -->
                <input type="hidden"
                       name="id"
                       value="<?= $data['id']; ?>">

                <!-- nama pelapor -->
                <div class="mb-3">
                    <label class="form-label">
                        Nama Pelapor
                    </label>

                    <input
                        type="text"
                        name="nama_pelapor"
                        class="form-control"
                        value="<?= $data['nama_pelapor']; ?>"
                        required>
                </div>

                <!-- isi laporan -->
                <div class="mb-3">
                    <label class="form-label">
                        Isi Laporan
                    </label>

                    <textarea
                        name="isi_laporan"
                        class="form-control"
                        rows="5"
                        required><?= $data['isi_laporan']; ?></textarea>
                </div>

                <!-- status -->
                <div class="mb-3">
                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select">

                        <option value="Baru"
                        <?= $data['status'] == 'Baru' ? 'selected' : ''; ?>>
                            Baru
                        </option>

                        <option value="Proses"
                        <?= $data['status'] == 'Proses' ? 'selected' : ''; ?>>
                            Proses
                        </option>

                        <option value="Selesai"
                        <?= $data['status'] == 'Selesai' ? 'selected' : ''; ?>>
                            Selesai
                        </option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">

                    <a href="dasbor.php"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-warning">
                        Update Data
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>

</body>
</html>