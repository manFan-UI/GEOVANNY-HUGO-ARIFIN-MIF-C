<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Bootstrap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="card shadow-lg border-0 rounded-4 col-lg-6 col-md-8 col-12">
    <div class="card-body p-4">

      <h3 class="text-center mb-4 fw-bold">Form Pendaftaran</h3>

      <form method="POST" action="">
        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama lengkap">
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email">
        </div>

        <div class="mb-3">
          <label class="form-label">No HP</label>
          <input type="tel" id="noHp" name="noHp" class="form-control" placeholder="08xxxxxxxxxx">
        </div>

        <div class="mb-3">
          <label class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat"></textarea>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="JK" name="JK">
              <option selected disabled>Pilih</option>
              <option>Laki-laki</option>
              <option>Perempuan</option>
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tglLahir" name="tglLahir">
          </div>
        </div>

        <div class="d-grid mt-3">
          <button class="btn btn-primary btn-lg rounded-3">
            Kirim Data
          </button>
        </div>
        <div class="d-grid mt-3">
        <button class="btn btn-primary btn-lg rounded-3"><a href="belajar.php" style="color:white;text-decoration:none;">
            Kembali ke halaman pertama</a>
          </button>
          </div>
      </form>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['noHp'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['JK'];
    $tgl_lahir = $_POST['tglLahir'];

    echo "<h2>Data Mahasiswa</h2>";
    echo "Nama Lengkap : $nama <br>";
    echo "Email : $email <br>";
    echo "No.Hp : $no_hp <br>";
    echo "Alamat : $alamat <br>";
    echo "Jenis Kelamin : $jk <br>";
    echo "Tanggal Lahir : $tgl_lahir ";

}
?>