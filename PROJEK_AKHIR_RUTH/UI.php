<?php
include "koneksi.php";

if(isset($_POST['simpan_kamar'])){
    $nomor_kamar=$_POST['nomor_kamar'];
    $tipe_kamar=$_POST['tipe_kamar'];
    $bed_size=$_POST['bed_size'];
    $max_occupancy=$_POST['max_occupancy'];
    $price_per_night=$_POST['price_per_night'];
    $status=$_POST['status'];

    $query="INSERT INTO kamar(nomor_kamar, tipe_kamar, bed_size, max_occupancy, price_per_night, status) VALUES('$nomor_kamar', '$tipe_kamar', '$bed_size', '$max_occupancy', '$price_per_night', '$status')";
    $result=mysqli_query($koneksi, $query);

    if($result){
        echo "<script>alert('Data Kamar berhasil disimpan!'); 
              window.location='tabel.php';</script>";
    } else{
        echo "<script>alert('Gagal menyimpan data kamar. Error: " . mysqli_error($koneksi) . "');</script>";
    }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UI</title>
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
    <div class="container3">
        <h1>SELAMAT DATANG ADMIN/OWNER, SILAHKAN MEMASUKKAN DATA DISINI: </h1>
        <form method="POST" action="UI.php">
            <fieldset>
                <legend><b>TAMBAH DATA DISINI: </b></legend>
                <table>
                        <tr>
                            <td><label for="nomor_kamar">nomor kamar: </label></td>
                            <td><input type='text' name='nomor_kamar' placeholder="nomor_kamar"></td>
                        </tr>
                        <tr>
                            <td><label for="tipe_kamar">tipe kamar: </label></td>
                            <td>
                                <select id="tipe_kamar" name="tipe_kamar">
                                <option value="" disabled selected>-- Tipe kamar --</option>
                                <option value="Standard">Standard</option>
                                <option value="Deluxe">Deluxe</option>
                                <option value="Family suite">Family suite</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="bed_size">bed size: </label></td>
                            <td>
                                <select id="bed_size" name="bed_size">
                                <option value="" disabled selected>-- Tipe kasur --</option>
                                <option value="Single">Single</option>
                                <option value="Double">Double</option>
                                <option value="Queen">Queen</option>
                                <option value="King">King</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="max_occupancy">kapasitas maksimal: </label></td>
                            <td><input type='number' name='max_occupancy'></td>
                        </tr>
                        <tr>
                            <td><label for="price_per_night">price_per_night: </label></td>
                            <td><input type='text' name='price_per_night'></td>
                        </tr>
                        <tr>
                            <td><label for="status">status: </label></td>
                            <td>
                                <select id="status" name="status">
                                <option value="" disabled selected>-- Status? --</option>
                                <option value="Available">Available</option>
                                <option value="Occupied">Occupied</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Cleaning">Cleaning</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" name="simpan_kamar">simpan</button></td>
                            <td><button type="submit"><a href="tabel.php">kembali</a></button></td>
                        </tr>
                    </table>
            </fieldset>
        </form>
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