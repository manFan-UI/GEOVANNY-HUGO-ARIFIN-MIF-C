<?php
require "connect.php";
// cek apakah form sudah dikirim dengan tombol bernama 'update'
if (isset($_POST["update"])) {
    // ambil nilai dari input form POST
    $id = $_POST["id"];
    $userMail = $_POST["userMail"];
    $userPass = $_POST["userPass"];
    $userName = $_POST["userName"];
    // buat query SQL untuk meng-update data
    $query = "UPDATE user_detail SET user_password='$userPass', user_fullname='$userName' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    // setelah berhasil, redirect ke halaman home
    header("Location: home.php");
} 
// ambil parameter 'id' dari URL (method GET)
$id = $_GET["id"];
// query untuk mendapatkan baris user yang sesuai
$query = "SELECT * FROM user_detail WHERE id='$id'";
$result = mysqli_query($koneksi, $query);
// membaca hasil sebagai array dan simpan ke variabel lokal
while ($row = mysqli_fetch_array($result)) {
    $id = $row["id"];
    $userMail = $row["user_email"];
    $userPass = $row["user_password"];
    $userName = $row["user_fullname"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>
<body>
<form action="edit.php" method="POST">
  <p><input type="hidden" name="id" value="<?php echo $id; ?>"></p>
  <p>Email : &nbsp;&nbsp;<input type="text" name="userMail" value="<?php echo $userMail; ?>" readonly></p>
  <p>Password : &nbsp;&nbsp;<input type="password" name="userPass" value="<?php echo $userPass; ?>"></p>
  <p>Nama : &nbsp;&nbsp;<input type="text" name="userName" value="<?php echo $userName; ?>"></p>
  <p><input type="submit" name="update" value="Update"></p>
</form>
<p><a href="home.php">Kembali</a></p>

</body>
</html>