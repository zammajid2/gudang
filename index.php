<?php
session_start(); // Mulai sesi

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, arahkan ke login.php
    header("Location: login.php");
    exit;
}

// Sertakan koneksi database
include 'koneksi.php';

// Inisialisasi variabel pencarian
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query untuk mengambil data
$query = "SELECT * FROM data_babaran";
if (!empty($search)) {
    $query .= " WHERE 
        tanggal_ambil LIKE '%$search%' OR
        pengambil LIKE '%$search%' OR
        ukuran LIKE '%$search%' OR
        jumlah LIKE '%$search%' OR
        tanggal_kembali LIKE '%$search%' OR
        pengembali LIKE '%$search%' OR
        rincian_ukuran LIKE '%$search%' OR
        jumlah_kembali LIKE '%$search%' OR
        model LIKE '%$search%' OR
        penjahit LIKE '%$search%'";
}

$result = mysqli_query($koneksi, $query);

// Debug: Cek apakah query berhasil
if (!$result) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Babaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Data Babaran</h1>

        <!-- Tombol Tambah Data, Master Menu, dan Logout -->
        <div class="mb-3 d-flex justify-content-between">
            <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
            <a href="master_menu.php" class="btn btn-secondary">Master Menu</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>

        <!-- Form Pencarian -->
        <form method="get" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari data..." value="<?= htmlspecialchars($search); ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <!-- Tabel Data -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Tanggal Ambil</th>
                        <th>Pengambil</th>
                        <th>Ukuran</th>
                        <th>Jumlah</th>
                        <th>Tanggal Kembali</th>
                        <th>Pengembali</th>
                        <th>Rincian Ukuran</th>
                        <th>Jumlah Kembali</th>
                        <th>Motif</th>
                        <th>Model</th>
                        <th>Penjahit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['tanggal_ambil']); ?></td>
                            <td><?= htmlspecialchars($row['pengambil']); ?></td>
                            <td><?= htmlspecialchars($row['ukuran']); ?></td>
                            <td><?= htmlspecialchars($row['jumlah']); ?></td>
                            <td><?= htmlspecialchars($row['tanggal_kembali']); ?></td>
                            <td><?= htmlspecialchars($row['pengembali']); ?></td>
                            <td><?= htmlspecialchars($row['rincian_ukuran']); ?></td>
                            <td><?= htmlspecialchars($row['jumlah_kembali']); ?></td>
                            <td>
                                <?php 
                                // Cek apakah file motif ada
                                if (!empty($row['motif']) && file_exists('uploads/' . $row['motif'])): ?>
                                    <img src="uploads/<?= htmlspecialchars($row['motif']); ?>" alt="Motif" class="img-thumbnail" style="width: 100px; height: 100px;">
                                <?php else: ?>
                                    Tidak ada motif atau file tidak ditemukan
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($row['model']); ?></td>
                            <td><?= htmlspecialchars($row['penjahit']); ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                <a href="pengembalian.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">Pengembalian</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>