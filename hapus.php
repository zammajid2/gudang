<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM data_babaran WHERE id = $id";
    
    if (mysqli_query($koneksi, $query)) {
        header('Location: index.php');
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
