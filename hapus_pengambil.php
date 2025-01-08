<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM master_pengambil WHERE id = $id";
mysqli_query($koneksi, $query);
header('Location: master_pengambil.php');
?>
