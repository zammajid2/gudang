<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pengambil = $_POST['nama_pengambil'];
    $query = "INSERT INTO master_pengambil (nama_pengambil) VALUES ('$nama_pengambil')";
    mysqli_query($koneksi, $query);
    header('Location: master_pengambil.php');
}

$result = mysqli_query($koneksi, "SELECT * FROM master_pengambil");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Pengambil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4 text-center">Master Pengambil</h1>
    <div class="card shadow-sm p-4 mb-4">
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nama_pengambil" class="form-label">Nama Pengambil</label>
                <input type="text" name="nama_pengambil" id="nama_pengambil" class="form-control" placeholder="Masukkan nama pengambil" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Pengambil</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nama_pengambil']); ?></td>
                <td>
                    <a href="hapus_pengambil.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
