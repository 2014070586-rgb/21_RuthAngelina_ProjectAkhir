<?php

include "koneksi.php";

if(isset($_GET['nomor_kamar'])){
    $nomor_kamar=$_GET['nomor_kamar'];

    $query="DELETE FROM kamar WHERE nomor_kamar='$nomor_kamar'";
    $result=mysqli_query($koneksi, $query);

    if($result){
        echo "<script>alert('Data Kamar " . $nomor_kamar . " berhasil dihapus!'); 
              window.location='tabel.php';</script>";
    } else{
        echo "<script>alert('Gagal menghapus data kamar. Error: " . mysqli_error($koneksi) . "');
              window.location='tabel.php';</script>";
    }
} else{
    header("location: tabel.php");
}
?>