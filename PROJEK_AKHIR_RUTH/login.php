<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users2 where username = '$username'";
    $result = mysqli_query($koneksi, $query);
    $user2 = mysqli_fetch_assoc($result);

    if($user2 && password_verify($password, $user2['password'])){
        $_SESSION['Full_name'] = $user2['Full_name'];
        $_SESSION['username'] = $user2['username'];
        $_SESSION['sebagai']=$user2['sebagai'];

        if($_SESSION['sebagai']=='Owner' or $_SESSION['sebagai']=='Admin'){
            header("location: tabel.php");
        }
    } else{
        echo"<script>alert('Username atau password salah!');</script>";
    }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="icon" type="image/png" href="favicon.jpg"> 
    <title>LOGIN</title>
</head>
<body class="body1">
    <div class="container1">
        <h1>LOGIN</h1>
        <form method="POST" action="login.php">
            <table>
                <tr>
                    <td><label for="username">Masukkan username: </label></td>
                    <td><input type="text" name="username" placeholder="username" required></td>
                </tr>
                <tr>
                    <td><label for="password">Masukkan password: </label></td>
                    <td><input type="password" name="password" placeholder="password" required></td>
                </tr>
                <tr>
                    <td><button type="submit" name="login">Login</button></td>
                    <td><button><a href="landing_page.php">Kembali</a></button></td>
                </tr>
                <tr>
                    <td><p>Belum membuat akun?, silahkan buat akun <a href="register.php">disini</a></p></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>