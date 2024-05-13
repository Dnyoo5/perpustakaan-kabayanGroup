<?php

session_start();
if(!isset($_SESSION["login"])) {
  header("Location:login.php");
  exit;
}
include 'function.php';
$d=strtotime("tomorrow");

$result = mysqli_query($conn,"SELECT * FROM peminjaman");
// 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Data Buku Yang tersedia</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="admin.php">Perpustakaan</a>
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
<h2 style="text-align:center; margin-top:20px;">Daftar buku yang sedang di pinjam</h2>

<div id="container" style="max-width:1000px; margin:auto;">
<table class="table table-bordered ">
  <thead class="table">
    <th>No</th>
    <th>Buku yang di pinjam</th>
    <th>Jumlah Buku</th>
    <th>Nama Peminjam</th>
    <th>Alamat Peminjam:</th>
    <th>No Kontak:</th>
    <th>Tanggal:</th>
  </thead>
  
 <?php 
    $no=1;
 while($row=mysqli_fetch_assoc($result))  { ?>
 
    <tr class="table-active">
     <td><?= $no ?></td>
     <td><?= $row["buku_dipinjam"]; ?></td>
     <td><?= $row["jumlah"]; ?></td>
     <td><?= $row["nama"];?></td>
     <td><?= $row["alamat"]; ?></td>
     <td><?= $row["kontak"]; ?></td>
     <td><?= date("Y/m/d") ;?> - <?= date("Y-m-d", $d)  ;?></td>
   
    
</tr>
<?php $no++; }?>
</table>



<script src="script.js"></script>
</body>
</html>