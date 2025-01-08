<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rincian_ukuran = $_POST['rincian_ukuran'];
    $query = "INSERT INTO master_rincian (rincian_ukuran) VALUES ('$rincian_ukuran')";
    mysqli_query($koneksi, $query);
    header('Location: master_rincian.php');
}

$result = mysqli_query($koneksi, "SELECT * FROM master_rincian");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Rincian Ukuran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Master Rincian Ukuran</h1>

    <!-- Form Tambah Data -->
    <div class="card shadow-sm p-4 mb-4">
        <form method="POST" action="">
            <div class="mb-3">
                <label for="rincian_ukuran" class="form-label">Rincian Ukuran</label>
                <input type="text" name="rincian_ukuran" id="rincian_ukuran" class="form-control" placeholder="Masukkan rincian ukuran" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <!-- Tabel Data -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Rincian Ukuran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['rincian_ukuran']); ?></td>
                <td>
                    <a href="hapus_rincian.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Tombol Kembali -->
    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
