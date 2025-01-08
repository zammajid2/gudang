<?php
include 'koneksi.php';

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM data_babaran WHERE pengambil LIKE '%$search%' OR model LIKE '%$search%' OR penjahit LIKE '%$search%'";
} else {
    $query = "SELECT * FROM data_babaran";
}

$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Cari Data</h1>
    <form method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan pengambil, model, atau penjahit" value="<?= isset($search) ? $search : '' ?>">
        <button type="submit" class="btn btn-primary mt-2">Cari</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Pengambil</th>
                <th>Model</th>
                <th>Penjahit</th>
                <!-- Kolom lain -->
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['pengambil']}</td>
                    <td>{$row['model']}</td>
                    <td>{$row['penjahit']}</td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
