<?php
include 'koneksi.php';

// Ambil data ID dari URL
$id = $_GET['id'];

// Ambil data berdasarkan ID
$result = mysqli_query($koneksi, "SELECT * FROM data_babaran WHERE id = $id");
$data = mysqli_fetch_assoc($result);

// Ambil data master untuk dropdown
$pengambil = mysqli_query($koneksi, "SELECT * FROM master_pengambil");
$ukuran = mysqli_query($koneksi, "SELECT * FROM master_ukuran");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <h1>Edit Data</h1>
    <form method="POST" action="proses_edit.php">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <div class="mb-3">
            <label for="tanggal_ambil">Tanggal Ambil</label>
            <input type="date" name="tanggal_ambil" id="tanggal_ambil" class="form-control" 
                   value="<?= $data['tanggal_ambil']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="pengambil">Pengambil</label>
            <select name="pengambil" id="pengambil" class="form-control" required>
                <option value="">-- Pilih Pengambil --</option>
                <?php while ($row = mysqli_fetch_assoc($pengambil)): ?>
                    <option value="<?= $row['nama_pengambil']; ?>" 
                        <?= $data['pengambil'] == $row['nama_pengambil'] ? 'selected' : ''; ?>>
                        <?= $row['nama_pengambil']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="ukuran">Ukuran</label>
            <select name="ukuran" id="ukuran" class="form-control" required>
                <option value="">-- Pilih Ukuran --</option>
                <?php while ($row = mysqli_fetch_assoc($ukuran)): ?>
                    <option value="<?= $row['ukuran']; ?>" 
                        <?= $data['ukuran'] == $row['ukuran'] ? 'selected' : ''; ?>>
                        <?= $row['ukuran']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="jumlah">Jumlah</label>
            <input type="text" name="jumlah" id="jumlah" class="form-control" 
                   value="<?= $data['jumlah']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
