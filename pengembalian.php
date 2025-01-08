<?php
include 'koneksi.php';

// Ambil data ID dari URL
$id = $_GET['id'];

// Ambil data berdasarkan ID
$result = mysqli_query($koneksi, "SELECT * FROM data_babaran WHERE id = $id");
$data = mysqli_fetch_assoc($result);

// Ambil data master untuk dropdown
$pengembali = mysqli_query($koneksi, "SELECT * FROM master_pengembali");
$rincian_ukuran = mysqli_query($koneksi, "SELECT * FROM master_ukuran");
$model = mysqli_query($koneksi, "SELECT * FROM master_model");
$penjahit = mysqli_query($koneksi, "SELECT * FROM master_penjahit");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4 text-center">Pengembalian Data</h1>

    <form method="POST" action="proses_pengembalian.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="pengembali" class="form-label">Pengembali</label>
            <select name="pengembali" id="pengembali" class="form-select" required>
                <option value="">-- Pilih Pengembali --</option>
                <?php while ($row = mysqli_fetch_assoc($pengembali)): ?>
                    <option value="<?= $row['nama_pengembali']; ?>"><?= $row['nama_pengembali']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="rincian_ukuran" class="form-label">Rincian Ukuran</label>
            <select name="rincian_ukuran" id="rincian_ukuran" class="form-select" required>
                <option value="">-- Pilih Rincian Ukuran --</option>
                <?php while ($row = mysqli_fetch_assoc($rincian_ukuran)): ?>
                    <option value="<?= $row['ukuran']; ?>"><?= $row['ukuran']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah_kembali" class="form-label">Jumlah Kembali</label>
            <input type="number" name="jumlah_kembali" id="jumlah_kembali" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="motif" class="form-label">Motif</label>
            <input type="file" name="motif" id="motif" class="form-control">
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <select name="model" id="model" class="form-select" required>
                <option value="">-- Pilih Model --</option>
                <?php while ($row = mysqli_fetch_assoc($model)): ?>
                    <option value="<?= $row['model']; ?>"><?= $row['model']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="penjahit" class="form-label">Penjahit</label>
            <select name="penjahit" id="penjahit" class="form-select" required>
                <option value="">-- Pilih Penjahit --</option>
                <?php while ($row = mysqli_fetch_assoc($penjahit)): ?>
                    <option value="<?= $row['nama_penjahit']; ?>"><?= $row['nama_penjahit']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>