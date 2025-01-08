<?php
include 'koneksi.php';

// Ambil data master untuk dropdown
$pengambil = mysqli_query($koneksi, "SELECT * FROM master_pengambil");
$ukuran = mysqli_query($koneksi, "SELECT * FROM master_ukuran");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Tambah Data Baru</h1>
    <form method="POST" action="proses_tambah.php" class="border p-4 rounded shadow-sm bg-light">
        <div class="mb-3">
            <label for="tanggal_ambil" class="form-label">Tanggal Ambil</label>
            <input type="date" name="tanggal_ambil" id="tanggal_ambil" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="pengambil" class="form-label">Pengambil</label>
            <select name="pengambil" id="pengambil" class="form-select" required>
                <option value="">-- Pilih Pengambil --</option>
                <?php while ($row = mysqli_fetch_assoc($pengambil)): ?>
                    <option value="<?= $row['nama_pengambil']; ?>"><?= $row['nama_pengambil']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="ukuran" class="form-label">Ukuran</label>
            <select name="ukuran" id="ukuran" class="form-select" required>
                <option value="">-- Pilih Ukuran --</option>
                <?php while ($row = mysqli_fetch_assoc($ukuran)): ?>
                    <option value="<?= $row['ukuran']; ?>"><?= $row['ukuran']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="text" name="jumlah" id="jumlah" class="form-control" required>
        </div>
        <div class="d-flex gap-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
