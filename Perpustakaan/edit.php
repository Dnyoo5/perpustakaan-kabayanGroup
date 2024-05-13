<?php
session_start();
if(!isset($_SESSION["login"])) {
  header("Location:login.php");
  exit;
}
include 'function.php';

$id = $_GET["id"];
// query data mahasiswa

$query = query("SELECT * FROM buku WHERE id_buku = $id")[0];


if(isset($_POST["submit"])) {

    if(ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di ubah');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal di ubah');
        document.location.href = 'insert.php';
        </script>";
    }


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Data Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h2 style="text-align:center; margin:40px 0;">Ubah Data</h2>
    <div style="max-width:900px; margin:auto;">
<form class="row g-3" action="" method="post"  enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $query["id_buku"];?>">
    <input type="hidden" name="gambarLama" value="<?= $query["gambar"];?>">
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Nama Buku</label>
    <input type="text" class="form-control" id="validationDefault01" name="nama" value="<?= $query["nama"]; ?>" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Kode Buku</label>
    <input type="text" class="form-control" id="validationDefault02" name="kode" value="<?= $query["kode_buku"]; ?>" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefaultUsername" class="form-label">Kategori Buku:</label>
    <div class="input-group">
      <span class="input-group-text" id="inputGroupPrepend2"></span>
      <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" value="<?= $query["kategori_buku"]; ?>" name="kategori" required>
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationDefault03" class="form-label">Stok Buku</label>
    <input type="text" class="form-control" id="validationDefault03" name="stok" value="<?= $query["stok buku"]; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="validationDefault03" class="form-label">Stok Buku</label>
    <input type="text" class="form-control" id="validationDefault03" name="tahun" value="<?= $query["tahun_buku"]; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="validationDefault03" class="form-label">Gambar</label>
    <img src="img/<?= $query["gambar"]; ?>" alt="" width="40px">
    <input type="file" class="form-control" id="validationDefault03" name="gambar">
  </div>
 
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="submit">Ubah Data</button>
    <button type="button" class="btn btn-danger"><a href="index.php" style="display:block; text-decoration:none; color:white;">Kembali</a></button>
  </div>
</form>
</div>
</body>
</html>