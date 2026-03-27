<?php
// Memanggil file connect.php yang berisi koneksi database
require "connect.php";
// Mengecek apakah variabel GET 'user_fullname' dikirim dari URL
if (isset($_GET["user_fullname"])) {
    $email = $_GET["user_fullname"];
} else {
    // Jika tidak ada, berikan nilai kosong
    $email = "";
}
?>
<html>
<head>
    <title>Home</title>
</head>
<body>
<h1>Selamat Datang <?php echo $email; ?></h1>
<a href="login.php"><input type="submit" value="Login Page"></a>
<table border='1'>
    <tr>
        <td>No</td>
        <td>Email</td>
        <td>Nama</td>
        <td></td>
    </tr>
<?php
// Query untuk mengambil semua data dari tabel user_detail
$query = "SELECT * FROM user_detail";
// Menjalankan query ke database, hasil disimpan di $result
$result = mysqli_query($koneksi, $query);
// Inisialisasi nomor urut mulai dari 1
$no = 1;
// Loop untuk mengambil data satu baris per iterasi
while ($row = mysqli_fetch_array($result)) {

    // Mengakses kolom 'user_email' dari baris data
    $userMail = $row["user_email"];
    // Mengakses kolom 'user_fullname' dari baris data
    $userName = $row["user_fullname"];
    ?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $userMail; ?></td>
        <td><?php echo $userName; ?></td>
        <td><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit |</a>
        <a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
    </tr>
<?php // Tambah nomor urut sebesar 1 untuk iterasi berikutnya

    $no++;
}
?>
</table>
</body>
</html>