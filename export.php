<?php
include 'koneksi.php';

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_babaran.xls");

$query = "SELECT * FROM data_babaran";
$result = mysqli_query($koneksi, $query);
?>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Ambil</th>
            <th>Pengambil</th>
            <th>Ukuran</th>
            <th>Jumlah</th>
            <th>Tanggal Kembali</th>
            <th>Nama Pengembalian</th>
            <th>Rincian Ukuran</th>
            <th>Rincian Jumlah</th>
            <th>Motif</th>
            <th>Model</th>
            <th>Penjahit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$no}</td>
                <td>{$row['tanggal_ambil']}</td>
                <td>{$row['pengambil']}</td>
                <td>{$row['ukuran']}</td>
                <td>{$row['jumlah']}</td>
                <td>{$row['tanggal_kembali']}</td>
                <td>{$row['nama_pengembalian']}</td>
                <td>{$row['rincian_ukuran']}</td>
                <td>{$row['rincian_jumlah']}</td>
                <td>{$row['motif']}</td>
                <td>{$row['model']}</td>
                <td>{$row['penjahit']}</td>
            </tr>";
            $no++;
        }
        ?>
    </tbody>
</table>
