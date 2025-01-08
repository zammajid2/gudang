<?php
include 'koneksi.php';

// Ambil data dari form
$id = $_POST['id'];
$tanggal_ambil = $_POST['tanggal_ambil'];
$pengambil = $_POST['pengambil'];
$ukuran = $_POST['ukuran'];
$jumlah = $_POST['jumlah'];

// Query untuk mengupdate data
$query = "UPDATE data_babaran 
          SET tanggal_ambil = '$tanggal_ambil', 
              pengambil = '$pengambil', 
              ukuran = '$ukuran', 
              jumlah = '$jumlah' 
          WHERE id = $id";

$result = mysqli_query($koneksi, $query);

// Redirect ke halaman index jika berhasil
if ($result) {
    header('Location: index.php');
} else {
    echo "Gagal mengupdate data: " . mysqli_error($koneksi);
}
?>
