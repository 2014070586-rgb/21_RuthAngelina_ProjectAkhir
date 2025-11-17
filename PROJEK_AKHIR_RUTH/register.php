<?php
include "koneksi.php";

if(isset($_POST['register'])){
    $Full_name=$_POST['Full_name'];
    $username=$_POST['username'];
    $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email=$_POST['email'];
    $sebagai=$_POST['sebagai'];

    $query="INSERT INTO users2(Full_name, username, password, email, sebagai) VALUES('$Full_name', '$username', '$password', '$email', '$sebagai')";
    $result=mysqli_query($koneksi, $query);

    if($result){
        echo "<script>alert('Registrasi berhasil! Silahkan login.');
        window.location='login.php';</script>";
    } else{
        echo "Gagal mendaftar!";
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
    <title>REGISTER</title>
</head>
<body class="body1">
    <div class="container1">
        <h1>FORM REGISTER</h1>
        <form method="POST" action="register.php">
            <table>
                <tr>
                    <td><label for="Full_name">Masukkan nama: </label></td>
                    <td><input type="text" name="Full_name" placeholder="Full_name" required></td>
                </tr>
                <tr>
                    <td><label for="username">Masukkan username: </label></td>
                    <td><input type="text" name="username" placeholder="username" required></td>
                </tr>
                <tr>
                    <td><label for="password">Masukkan password: </label></td>
                    <td><input type="password" name="password" placeholder="password" required></td>
                </tr>
                <tr>
                    <td><label for="email">Masukkan alamat email: </label></td>
                    <td><input type="email" name="email" placeholder="email" required></td>
                </tr>
                <tr>
                    <td><label for="sebagai">Daftar sebagai: </label></td>
                    <td>
                        <select id="sebagai" name="sebagai">
                            <option value="" disabled selected>-- Pilih Status --</option>
                            <option value="Owner">Owner</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button type="submit" name="register">simpan</button></td>
                    <td><button><a href="landing_page.php">Kembali</a></button></td>
                </tr>
                <tr>
                    <td><p>Sudah memiliki akun? Silahkan login <a href="login.php">disini!</a></p></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>