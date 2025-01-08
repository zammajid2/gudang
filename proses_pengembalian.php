<?php
include 'koneksi.php';

$id = $_POST['id'];
$tanggal_kembali = $_POST['tanggal_kembali'];
$pengembali = $_POST['pengembali'];
$rincian_ukuran = $_POST['rincian_ukuran'];
$model = $_POST['model'];
$penjahit = $_POST['penjahit'];

// Proses file upload untuk motif
$motif = null;
if ($_FILES['motif']['name'] != '') {
    $motif = 'uploads/' . $_FILES['motif']['name'];
    move_uploaded_file($_FILES['motif']['tmp_name'], $motif);
}

// Query untuk update data
$query = "UPDATE data_babaran 
          SET tanggal_kembali = '$tanggal_kembali', 
              pengembali = '$pengembali', 
              rincian_ukuran = '$rincian_ukuran', 
              motif = '$motif', 
              model = '$model', 
              penjahit = '$penjahit' 
          WHERE id = $id";

$result = mysqli_query($koneksi, $query);

if ($result) {
    header('Location: index.php');
} else {
    echo "Gagal menyimpan data pengembalian: " . mysqli_error($koneksi);
}
?>
