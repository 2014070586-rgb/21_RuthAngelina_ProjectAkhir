<?php
include "koneksi.php";

if(!isset($_GET['nomor_kamar'])){
    header("location: tabel.php");
}

$nomor_kamar=$_GET['nomor_kamar'];
$query="SELECT * FROM kamar WHERE nomor_kamar='$nomor_kamar'";
$result=mysqli_query($koneksi, $query);
$kamar=mysqli_fetch_assoc($result);

if(!$kamar){
    echo "<script>alert('Data tidak ditemukan!'); window.location='tabel.php';</script>";
}

if(isset($_POST['update_kamar'])){
    $nomor_kamar_new   = $_POST['nomor_kamar'];
    $tipe_kamar_new    = $_POST['tipe_kamar'];
    $bed_size_new      = $_POST['bed_size'];
    $max_occupancy_new = $_POST['max_occupancy'];
    $price_per_night_new = $_POST['price_per_night'];
    $status_new        = $_POST['status'];

    $query_update = "UPDATE kamar SET nomor_kamar='$nomor_kamar_new', tipe_kamar='$tipe_kamar_new', bed_size='$bed_size_new', max_occupancy='$max_occupancy_new', price_per_night='$price_per_night_new', status='$status_new' WHERE nomor_kamar='$nomor_kamar'";
    $result_update = mysqli_query($koneksi, $query_update);

    if($result_update){
        echo "<script>alert('Data Kamar berhasil diupdate!'); 
              window.location='tabel.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data kamar. Error: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="favicon.jpg"> 
    <link rel="stylesheet" href="style2.css">
    <title>EDIT</title>
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
    <div class="container3">
        <h1>EDIT DATA KAMAR: <? echo $kamar['nomor_kamar']; ?></h1>
        <form method="POST" action="update.php?nomor_kamar=<? echo $nomor_kamar; ?>">
            <fieldset>
                <legend><b>UBAH DATA DISINI: </b></legend>
                <table>
                    <tr>
                        <td><label for="nomor_kamar">nomor kamar:</label></td>
                        <td><input type='text' name='nomor_kamar' value="<? echo $kamar['nomor_kamar']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="tipe_kamar">tipe kamar:</label></td>
                        <td><select id="tipe_kamar" name="tipe_kamar">
                                <option value="Standard" <? echo ($kamar['tipe_kamar'] == 'Standard') ? 'selected' : ''; ?>>Standard</option>
                                <option value="Deluxe" <? echo ($kamar['tipe_kamar'] == 'Deluxe') ? 'selected' : ''; ?>>Deluxe</option>
                                <option value="Family suite" <? echo ($kamar['tipe_kamar'] == 'Family suite') ? 'selected' : ''; ?>>Family suite</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="bed_size">tipe kamar:</label></td>
                        <td><select id="bed_size" name="bed_size">
                                <option value="Single" <? echo ($kamar['bed_size'] == 'Single') ? 'selected' : ''; ?>>Single</option>
                                <option value="Double" <? echo ($kamar['bed_size'] == 'Double') ? 'selected' : ''; ?>>Double</option>
                                <option value="Queen" <? echo ($kamar['bed_size'] == 'Queen') ? 'selected' : ''; ?>>Queen</option>
                                <option value="King" <? echo ($kamar['bed_size'] == 'King') ? 'selected' : ''; ?>>King</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="max_occupancy">kapasitas maksimal:</label></td>
                        <td><input type='text' name='max_occupancy' value="<? echo $kamar['max_occupancy']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="price_per_night">price_per_night:</label></td>
                        <td><input type='text' name='price_per_night' value="<? echo $kamar['price_per_night']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="status">status:</label></td>
                        <td><select id="status" name="status">
                                <option value="Available" <? echo ($kamar['status'] == 'Available') ? 'selected' : ''; ?>>Available</option>
                                <option value="Occupied" <? echo ($kamar['status'] == 'Occupied') ? 'selected' : ''; ?>>Occupied</option>
                                <option value="Maintenance" <? echo ($kamar['status'] == 'Maintenance') ? 'selected' : ''; ?>>Maintenance</option>
                                <option value="Cleaning" <? echo ($kamar['status'] == 'Cleaning') ? 'selected' : ''; ?>>Cleaning</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" name="update_kamar">Update Data</button></td>
                        <td><a href="tabel.php"><button type="button">Batal</button></a></td>
                    </tr>
                </table>
            </fieldset>
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