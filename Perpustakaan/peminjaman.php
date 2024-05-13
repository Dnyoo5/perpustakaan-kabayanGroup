<?php

include 'function.php';
    if(isset($_POST["submit"])) {
        if(pinjam($_POST) > 0) {
            echo "<script>
            alert('data berhasil di tambahkan');
            document.location.href = 'anggota.php';
            </script>";
        } else {
            echo "<script>
            alert('data gagal di tambahkan');
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<nav class="navbar navbar-expand-lg bg-body-tertiary ">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">Perpustakaan</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="data.php">Data Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="peminjaman.php">Peminjaman</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tambah.php">Tambah Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="anggota.php">Anggota</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Keluar</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
      </form>
    </div>
  </div>
</nav>

<h2 style="text-align:center; margin:40px 0;">Data Peminjaman Buku</h2>
    <div style="max-width:900px; margin:auto;">
<form class="row g-3" action="" method="post" enctype="multipart/form-data">
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Buku yang akan pinjam</label>
    <input type="text" class="form-control" id="validationDefault01" name="Buku"  required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Jumlah Buku:</label>
    <input type="text" class="form-control" id="validationDefault01" name="jumlah"  required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Nama Peminjam:</label>
    <input type="text" class="form-control" id="validationDefault02" name="nama" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefaultUsername" class="form-label">Alamat Peminjam:</label>
    <div class="input-group">
      <span class="input-group-text" id="inputGroupPrepend2"></span>
      <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" name="alamat" required>
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationDefault03" class="form-label">No Kontak</label>
    <input type="text" class="form-control" id="validationDefault03" name="kontak" required>
  </div>
  <div class="col-md-6">
    <label for="validationDefault03" class="form-label">Tanggal:</label>
    <input type="text" class="form-control" id="validationDefault03" name="tanggal" value="<?= date("Y/m/d");?>" required>
  </div>
  
 
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="submit">Kirim</button>
    <button type="button" class="btn btn-danger"><a href="admin.php" style="display:block; text-decoration:none; color:white;">Kembali</a></button>
  </div>
</form>
</div>
</body>
</html>