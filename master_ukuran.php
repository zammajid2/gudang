<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ukuran = $_POST['ukuran'];
    $query = "INSERT INTO master_ukuran (ukuran) VALUES ('$ukuran')";
    mysqli_query($koneksi, $query);
    header('Location: master_ukuran.php');
}

$result = mysqli_query($koneksi, "SELECT * FROM master_ukuran");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Ukuran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Master Ukuran</h1>

    <!-- Form Tambah Data -->
    <div class="card shadow-sm p-4 mb-4">
        <form method="POST" action="">
            <div class="mb-3">
                <label for="ukuran" class="form-label">Ukuran</label>
                <input type="text" name="ukuran" id="ukuran" class="form-control" placeholder="Masukkan ukuran" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <!-- Tabel Data -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Ukuran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['ukuran']); ?></td>
                <td>
                    <a href="hapus_ukuran.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
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
