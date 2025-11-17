<?php
include "koneksi.php";

$query="SELECT * FROM kamar ORDER BY nomor_kamar ASC";
$result=mysqli_query($koneksi, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLE</title>
    <link rel="icon" type="image/png" href="favicon.jpg"> 
    <link rel="stylesheet" href="style2.css">
</head>
<body class="body2">
    <header>
        <nav class="admin-navbar">
            <div class="logo">
                <a href="tabel.php"> JW Marriot Admin Panel</a>
            </div>
            <div class="nav-links">
                <a href="tabel.php">Data Kamar</a>
                <a href="UI.php">Tambah Data</a>
                <a href="logout.php" class="btn-logout">Log Out</a>
            </div>
        </nav>
    </header>
    <div class="container2">
        <h1>DATA KAMAR</h1>
        <table border='1'>
            <tr>
                <th>No. Kamar</th>
                <th>Tipe Kamar</th>
                <th>Bed Size</th>
                <th>Kapasitas Maksimal</th>
                <th>Price_per_Night</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
            <?php
                while($data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $data['nomor_kamar'] . "</td>";
                    echo "<td>" . $data['tipe_kamar'] . "</td>";
                    echo "<td>" . $data['bed_size'] . "</td>";
                    echo "<td>" . $data['max_occupancy'] . "</td>";
                    echo "<td>Rp " . number_format($data['price_per_night'], 0, ',', '.') . "</td>"; 
                    echo "<td>" . $data['status'] . "</td>";
                    echo "<td>";
                    echo "<a href='update.php?nomor_kamar=" . $data['nomor_kamar'] . "'>Edit</a>";
                    echo "<a href='hapus.php?nomor_kamar=" . $data['nomor_kamar'] . "'>Hapus</a> | ";
                    echo "</td>";
                    echo "</tr>";
                    }   
            ?>
        </table>
    </div>
    <footer class="main-footer">
        <div class="footer-content">
            <p>&copy; 2025 Tempat Penginapan/hotel(JW Marriot Hotel) - Ruth Angelina @2025. Hak Cipta Dilindungi.</p>
            <div class="social-links">
                <a href="https://www.facebook.com/itz.sagitarius.1">FB</a> | <a href="https://www.instagram.com/ruth.angel28/">IG</a>
            </div>
        </div>
        <div class="footer-address">
             <p>Jl. Embong Malang No. 85-89, Surabaya</p>
        </div>
    </footer>
</body>
</html>