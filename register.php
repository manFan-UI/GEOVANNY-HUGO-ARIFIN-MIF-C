<?php
// Memanggil file connect.php untuk koneksi database
require "connect.php";
// Mengecek apakah tombol register telah ditekan
if (isset($_POST["register"])) {
    // Mengambil nilai email dari form
    $userEmail = $_POST["email"];
    // Mengambil nilai password dari form
    $userPassword = $_POST["pass"];
    // Mengambil nilai nama lengkap dari form
    $userName = $_POST["name"];

    // Query INSERT untuk memasukkan data user baru ke tabel user_detail
    // id: kosong (auto increment), level: 2 adalah level user biasa
    $query = "INSERT INTO user_detail (id,user_email, user_password,user_fullname,level) VALUES ('','$userEmail', '$userPassword', '$userName',2)";
    // Menjalankan query ke database
    $result = mysqli_query($koneksi, $query);
    // Redirect ke halaman login setelah registrasi berhasil
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
</head>
<body>
  <form action="register.php" method="POST">
    <p>Email &nbsp; : <input type="text" name="email" require></p>
    <p>Password &nbsp; : <input type="text" name="pass" require></p>
    <p>Name &nbsp; : <input type="text" name="name" require></p>
    <button type="submit" name="register">Register</button>
  </form>
  <p><a href="login.php">Login</a></p>
</body>
</html>