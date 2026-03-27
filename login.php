<?php
// Memanggil file connect.php untuk koneksi database
require "connect.php";

// Mengecek apakah form telah disubmit (tombol submit ditekan)
if (isset($_POST["submit"])) {
    // Mengambil nilai email dari form
    $email = $_POST["email"];
    // Mengambil nilai password dari form
    $password = $_POST["password"];

    // Mengecek apakah email dan password tidak kosong (trim menghilangkan spasi)
    if (!empty(trim($email)) && !empty(trim($password))) {
        // Query untuk mencari data user berdasarkan email
        $query = "SELECT * FROM user_detail WHERE user_email = '$email'";
        // Menjalankan query ke database
        $result = mysqli_query($koneksi, $query);
        // Menghitung jumlah baris hasil query (cek user ada atau tidak)
        $num = mysqli_num_rows($result);

        // Jika user ditemukan (jumlah baris > 0)
        if ($num != 0) {
            // Loop untuk mengambil data user dari hasil query
            while ($row = mysqli_fetch_array($result)) {
                // Mengakses masing-masing kolom dari tabel user_detail
                $id = $row["id"];
                $userVal = $row["user_email"];
                $passVal = $row["user_password"];
                $username = $row["user_fullname"];
                $level = $row["user_level"];
            }

            // Membandingkan email dan password yang diinput dengan yang ada di database
            if ($userVal == $email && $passVal == $password) {
                // Jika cocok, redirect ke halaman home
                header("Location: home.php");
                exit();
            } else {
                // Jika tidak cocok, tampilkan error
                $error = "User atau password salah!";
                header("Location: login.php");
            }
            // Jika user tidak ditemukan (jumlah baris = 0)
        } else {
            $error = "User tidak ditemukan!";
            header("Location: login.php");
        }
        // Jika email atau password kosong tampilkan perintah seperti ini
    } else {
        $error = "Email dan password tidak boleh kosong!";
        echo $error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
</head>
<body>
  <form action="login.php" method="POST">
    <p>Email   &nbsp; : <input type="text" name="email" placeholder="Email" required></p>
    <p>Password : <input type="password" name="password" placeholder="Password" required></p>
    <button type="submit" name="submit">Sign In</button>
  </form>
</body>
</html>
