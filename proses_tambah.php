<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

// Ambil data dari form
$tanggal_ambil = $_POST['tanggal_ambil'];
$pengambil = $_POST['pengambil'];
$ukuran = $_POST['ukuran'];
$jumlah = $_POST['jumlah'];

// Query untuk menyimpan data ke database
$query = "INSERT INTO data_babaran (tanggal_ambil, pengambil, ukuran, jumlah) 
          VALUES ('$tanggal_ambil', '$pengambil', '$ukuran', '$jumlah')";
$result = mysqli_query($koneksi, $query);

// Redirect ke halaman index jika berhasil
if ($result) {
    header('Location: index.php');
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>
